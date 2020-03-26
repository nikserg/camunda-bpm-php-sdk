<?php


namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\request\CredentialsRequest;
use org\camunda\php\sdk\entity\request\ProfileRequest;
use org\camunda\php\sdk\entity\request\Request;
use org\camunda\php\sdk\entity\request\VariableRequest;

class RequestService
{
    /**
     * @var string
     */
    private $requestMethod = "GET";
    /**
     * @var string
     */
    private $requestUrl;
    /**
     * @var string
     */
    private $restApiUrl;
    /**
     * @var Request
     */
    private $requestObject;
    private $httpStatusCode;

    public function __construct(string $restApiUrl)
    {
        $this->restApiUrl = preg_replace('/\/$/', '', $restApiUrl);
    }

    /**
     * @param Request $requestObject
     */
    protected function setRequestObject(Request $requestObject = null)
    {
        $this->requestObject = $requestObject;
    }

    /**
     * @return mixed
     */
    protected function getRequestObject()
    {
        return $this->requestObject;
    }

    /**
     * @param string $requestMethod
     */
    protected function setRequestMethod(string $requestMethod)
    {
        $this->requestMethod = strtoupper($requestMethod);
    }

    /**
     * @return string
     */
    protected function getRequestMethod()
    {
        return $this->requestMethod;
    }

    /**
     * @param string $requestUrl
     */
    protected function setRequestUrl(string $requestUrl)
    {
        $this->requestUrl = $requestUrl;
    }

    /**
     * @return string
     */
    protected function getRequestUrl()
    {
        return $this->requestUrl;
    }

    /**
     * @param mixed $httpStatusCode
     */
    public function setHttpStatusCode($httpStatusCode)
    {
        $this->httpStatusCode = $httpStatusCode;
    }

    /**
     * @return mixed
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    private function reset()
    {
        $this->setRequestObject(null);
        $this->setRequestUrl('');
        $this->setRequestMethod('GET');
    }

    /**
     * executes the rest request
     *
     * @throws \Exception
     * @return mixed server response
     */
    protected function execute()
    {
        if (!function_exists('curl_version')) {
            throw new \Error("Package requires curl extension");
        }
        $url = $this->restApiUrl . $this->requestUrl;
        if ($this->requestMethod == 'GET') {
            if (isset($this->requestObject)) {
                $url .= '?' . http_build_query($this->requestObject->iterateFilled());
            }
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_COOKIEJAR, './');
            curl_setopt($ch, CURLOPT_COOKIEFILE, './');
        } else {
            $ch = curl_init($url);
            if (in_array($this->requestMethod, ['POST', 'DELETE', 'PUT',])) {
                if (isset($this->requestObject)) {
                    $data = [];
                    foreach ($this->requestObject->iterate() AS $index => $value) {
                        if ($value != null && !empty($value)) {
                            // We need to change the Objects of Profile and Credentials into an Array
                            if ($value instanceof ProfileRequest || $value instanceof CredentialsRequest) {
                                $value = $value->iterateFilled();
                            }
                            // Needed for Modifications and Deletions in VariableRequest
                            // Changes Array Data into a new Array if these are instances of VariableRequest
                            if (is_array($value)) {
                                foreach ($value AS $valueIndex => $valueData) {
                                    if ($valueData instanceof VariableRequest) {
                                        $valueData = $valueData->iterateFilled();
                                    }
                                    $value[$valueIndex] = $valueData;
                                }
                            }
                            $data[$index] = $value;
                        }
                    }
                } else {
                    $data = new \stdClass();
                }
                $dataString = json_encode($data);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($dataString),
                ]);
            }
        }
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->requestMethod);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $this->httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if (!preg_match('/^[12]0[0-9]/', $this->httpStatusCode)) {
            if (empty($response)) {
                $error = new \stdClass();
                $error->type = "Not found!";
                $error->message = "No Message!";
            } else {
                $error = json_decode($response);
            }
            throw new \Exception("HTTP $this->httpStatusCode error type $error->type: $error->message");
        }
        $this->reset();
        return json_decode($response);
    }
}