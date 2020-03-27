<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class VariableInstance extends CastHelper
{
    protected $name;
    protected $type;
    protected $value;
    protected $processInstanceId;
    protected $executionId;
    protected $taskId;
    protected $activityInstanceId;

    /**
     * @param mixed $activityInstanceId
     */
    function setActivityInstanceId($activityInstanceId)
    {
        $this->activityInstanceId = $activityInstanceId;
    }

    /**
     * @return mixed
     */
    function getActivityInstanceId()
    {
        return $this->activityInstanceId;
    }

    /**
     * @param mixed $executionId
     */
    function setExecutionId($executionId)
    {
        $this->executionId = $executionId;
    }

    /**
     * @return mixed
     */
    function getExecutionId()
    {
        return $this->executionId;
    }

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
     * @param mixed $taskId
     */
    function setTaskId($taskId)
    {
        $this->taskId = $taskId;
    }

    /**
     * @return mixed
     */
    function getTaskId()
    {
        return $this->taskId;
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