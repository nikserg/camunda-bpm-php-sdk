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
    private $requestUrl = '';
    /**
     * @var string
     */
    private $restApiUrl;
    /**
     * @var Request|null
     */
    private $requestObject;
    /**
     * @var string
     */
    private $httpStatusCode = '0';

    function __construct(string $restApiUrl)
    {
        $this->restApiUrl = preg_replace('/\/$/', '', $restApiUrl);
    }

    /**
     * @param Request|null $requestObject
     */
    protected function setRequestObject(Request $requestObject = null)
    {
        $this->requestObject = $requestObject;
    }

    /**
     * @return Request|null
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
     * @param string $httpStatusCode
     */
    function setHttpStatusCode(string $httpStatusCode)
    {
        $this->httpStatusCode = $httpStatusCode;
    }

    /**
     * @return string
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
                $url .= '?' . http_build_query($this->requestObject->serializeToHashMap());
            }
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_COOKIEJAR, './'); // TODO: storing in cwd??
            curl_setopt($ch, CURLOPT_COOKIEFILE, './');
        } else {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->requestMethod);
        }
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
        $errorNumber = curl_errno($ch);
        $errorMessage = curl_error($ch);
        curl_close($ch);
        $this->reset();
        if ($errorNumber != 0) {
            throw new \Exception("HTTP $this->httpStatusCode curl error: " . $errorMessage, $errorNumber);
        }
        if ($this->httpStatusCode == '204') {
            return null;
        } elseif (empty($response)) {
            throw new \Exception("HTTP $this->httpStatusCode with empty response body: " . $errorMessage, $errorNumber);
        }
        if (preg_match('/^[12]0\d/', $this->httpStatusCode)) {
            return $this->assertiveJsonDecode($response);
        }
        $errorData = $this->assertiveJsonDecode($response);
        throw new \Exception("HTTP $this->httpStatusCode error type $errorData->type: $errorData->message");
    }

    /**
     * @param      $json
     * @param bool $assoc
     * @param int  $depth
     * @param int  $options
     * @return mixed
     * @throws \Exception
     */
    function assertiveJsonDecode($json, $assoc = false, $depth = 512, $options = 0)
    {
        $data = json_decode($json, $assoc, $depth, $options);
        if (JSON_ERROR_NONE != json_last_error()) {
            throw new \Exception("Invalid json: " . json_last_error_msg() . "\nSample: $json",
                json_last_error());
        }
        return $data;
    }
}