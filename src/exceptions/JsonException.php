<?php

namespace org\camunda\php\sdk\exceptions;

use Throwable;

class JsonException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}