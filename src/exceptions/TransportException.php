<?php

namespace org\camunda\php\sdk\exceptions;

use Throwable;

class TransportException extends \Exception
{
    private $httpStatusCode;

    public function __construct(string $httpStatusCode, string $message = "", int $code = 0, Throwable $previous = null)
    {
        $this->httpStatusCode = $httpStatusCode;
        parent::__construct($message, $code, $previous);
    }

    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }
}