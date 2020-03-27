<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class Form extends CastHelper
{
    protected $key;
    protected $contextPath;

    /**
     * @param mixed $contextPath
     */
    function setContextPath($contextPath)
    {
        $this->contextPath = $contextPath;
    }

    /**
     * @return mixed
     */
    function getContextPath()
    {
        return $this->contextPath;
    }

    /**
     * @param mixed $key
     */
    function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    function getKey()
    {
        return $this->key;
    }
}