<?php

namespace org\camunda\php\sdk\exceptions;

use Throwable;

class CamundaException extends \Exception
{
    private $type;
    private $httpStatusCode;

    public function __construct(
        string $type,
        string $httpStatusCode,
        string $message = "",
        int $code = 0,
        Throwable $previous = null
    ) {
        $this->type = $type;
        $this->httpStatusCode = $httpStatusCode;
        parent::__construct($message, $code, $previous);
    }

    public function getType()
    {
        return $this->type;
    }

    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }
}