<?php


namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\request\CredentialsRequest;
use org\camunda\php\sdk\entity\request\ProfileRequest;
use org\camunda\php\sdk\entity\request\Request;
use org\camunda\php\sdk\entity\request\VariableRequest;
use org\camunda\php\sdk\entity\response\VariableInstance;

class RequestService
{
    private $requestObject;
    private $requestMethod = "GET";
    private $requestUrl;
    private $httpStatusCode;
    private $restApiUrl;

    public function __construct($restApiUrl)
    {
        $this->restApiUrl = $restApiUrl;
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
     * @param mixed $requestMethod
     */
    protected function setRequestMethod($requestMethod)
    {
        $this->requestMethod = $requestMethod;
    }

    /**
     * @return mixed
     */
    protected function getRequestMethod()
    {
        return $this->requestMethod;
    }

    /**
     * @param $requestUrl
     */
    protected function setRequestUrl($requestUrl)
    {
        $this->requestUrl = $requestUrl;
    }

    /**
     * @return mixed
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
        $data = [];
        $url = preg_replace('/\/$/', '', $this->restApiUrl) . $this->requestUrl;
        $method = strtoupper($this->requestMethod);
        if ($method == 'GET') {
            if (isset($this->requestObject)) {
                foreach ($this->requestObject->iterate() AS $index => $value) {
                    if (!empty($value)) {
                        $data[] = $index . '=' . $value;
                    }
                }
            }
            $ch = curl_init($url . '?' . implode('&', $data));
            curl_setopt($ch, CURLOPT_COOKIEJAR, './');
            curl_setopt($ch, CURLOPT_COOKIEFILE, './');
        } else {
            if (isset($this->requestObject)) {
                foreach ($this->requestObject->iterate() AS $index => $value) {
                    if ($value != null && !empty($value)) {
                        // We need to change the Objects of Profile and Credentials into an Array
                        if ($value instanceof ProfileRequest || $value instanceof CredentialsRequest) {
                            $objArray = [];
                            foreach ($value->iterate() AS $i => $d) {
                                if (!empty($d)) {
                                    $objArray[$i] = $d;
                                }
                            }
                            $value = $objArray;
                        }
                        // Needed for Modifications and Deletions in VariableRequest
                        // Changes Array Data into a new Array if these are instances of VariableRequest
                        if (is_array($value)) {
                            foreach ($value AS $valueIndex => $valueData) {
                                if ($valueData instanceof VariableRequest) {
                                    $objArray = [];
                                    foreach ($valueData->iterate() AS $i => $d) {
                                        if (!empty($d)) {
                                            $objArray[$i] = $d;
                                        }
                                    }
                                    $valueData = $objArray;
                                }
                                $value[$valueIndex] = $valueData;
                            }
                        }
                        $data[$index] = $value;
                    }
                }
            }
            if (empty($data)) {
                $data = new \stdClass();
            }
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        switch ($method) {
            case 'DELETE':
            case 'PUT':
            case 'POST':
                $dataString = json_encode($data);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($dataString),
                ]);
                break;
        }
        $request = curl_exec($ch);
        $this->httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if (!preg_match('/(^10|^20)[0-9]/', $this->httpStatusCode)) {
            if (empty($request)) {
                $error = new \stdClass();
                $error->type = "Not found!";
                $error->message = "No Message!";
            } else {
                $error = json_decode($request);
            }
            throw new \Exception("HTTP $this->httpStatusCode\nErrorType: $error->type\nError Message: $error->message");
        }
        $this->reset();
        return json_decode($request);
    }
}