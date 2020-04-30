<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class Variable extends CastHelper
{
    /**
     * @var string
     */
    protected $type;
    protected $value;
    protected $valueInfo;

    /**
     * @param mixed $type
     */
    function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $value
     */
    function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $valueInfo
     */
    public function setValueInfo($valueInfo)
    {
        $this->valueInfo = $valueInfo;
    }

    /**
     * @return mixed
     */
    public function getValueInfo()
    {
        return $this->valueInfo;
    }
}