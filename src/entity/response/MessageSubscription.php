<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class MessageSubscription extends CastHelper
{
    protected $id;
    protected $eventType;
    protected $eventName;
    protected $executionId;
    protected $processInstanceId;
    protected $activityId;

    /**
     * @param mixed $activityId
     */
    function setActivityId($activityId)
    {
        $this->activityId = $activityId;
    }

    /**
     * @return mixed
     */
    function getActivityId()
    {
        return $this->activityId;
    }

    /**
     * @param mixed $eventName
     */
    function setEventName($eventName)
    {
        $this->eventName = $eventName;
    }

    /**
     * @return mixed
     */
    function getEventName()
    {
        return $this->eventName;
    }

    /**
     * @param mixed $eventType
     */
    function setEventType($eventType)
    {
        $this->eventType = $eventType;
    }

    /**
     * @return mixed
     */
    function getEventType()
    {
        return $this->eventType;
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
     * @param mixed $id
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    function getId()
    {
        return $this->id;
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
}