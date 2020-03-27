<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class HistoricVariableInstance extends CastHelper
{
    protected $name;
    protected $type;
    protected $value;
    protected $processInstanceId;

    /**
     * @param mixed $name
     */
    function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $processInstanceId
     */
    function setProcessInstanceId($processInstanceId)
    {
        $this->processInstanceId = $processInstanceId;
    }

    /**
     * @return mixed
     */
    function getProcessInstanceId()
    {
        return $this->processInstanceId;
    }

    /**
     * @param mixed $type
     */
    function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
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
}