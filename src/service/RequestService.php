<?php

namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\request\Request;

abstract class RequestService
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

    function __construct(string $restApiUrl)
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
    function setHttpStatusCode($httpStatusCode)
    {
        $this->httpStatusCode = $httpStatusCode;
    }

    /**
     * @return mixed
     */
    function getHttpStatusCode()
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
                $url .= '?' . http_build_query($this->requestObject->fieldsFilled());
            }
        }
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_COOKIEJAR, './'); // TODO: wtf?? storing in a source location??
        curl_setopt($ch, CURLOPT_COOKIEFILE, './');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->requestMethod);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (in_array($this->requestMethod, ['POST', 'DELETE', 'PUT',])) {
            $data = new \stdClass;
            if (isset($this->requestObject)) {
                $data = $this->requestObject->serializeToHashMap();
            }
            $dataString = json_encode($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($dataString),
            ]);
        }
        $response = curl_exec($ch);
        $this->httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $this->reset();
        if (!preg_match('/^[12]0[0-9]/', $this->httpStatusCode)) {
            if (empty($response)) {
                $errorData = new \stdClass();
                $errorData->type = "Not found!";
                $errorData->message = "No Message!";
            } else {
                $errorData = json_decode($response);
            }
            throw new \Exception("HTTP $this->httpStatusCode error type $errorData->type: $errorData->message");
        }
        $responseData = json_decode($response);
        return $responseData;
    }
}