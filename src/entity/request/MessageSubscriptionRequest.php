<?php

namespace org\camunda\php\sdk\entity\request;

class MessageSubscriptionRequest extends Request
{
    protected $id;
    protected $eventType;
    protected $eventName;
    protected $executionId;
    protected $processInstanceId;
    protected $activityId;
    protected $createdDate;
    protected $messageName;
    protected $variables;

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
     * @param mixed $createdDate
     * @return $this
     */
    function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * @return mixed
     */
    function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param mixed $eventName
     * @return $this
     */
    function setEventName($eventName)
    {
        $this->eventName = $eventName;
        return $this;
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
     * @return $this
     */
    function setEventType($eventType)
    {
        $this->eventType = $eventType;
        return $this;
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
     * @return $this
     */
    function setExecutionId($executionId)
    {
        $this->executionId = $executionId;
        return $this;
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
     * @return $this
     */
    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $messageName
     * @return $this
     */
    function setMessageName($messageName)
    {
        $this->messageName = $messageName;
        return $this;
    }

    /**
     * @return mixed
     */
    function getMessageName()
    {
        return $this->messageName;
    }

    /**
     * @param mixed $processInstanceId
     * @return $this
     */
    function setProcessInstanceId($processInstanceId)
    {
        $this->processInstanceId = $processInstanceId;
        return $this;
    }

    /**
     * @return mixed
     */
    function getProcessInstanceId()
    {
        return $this->processInstanceId;
    }

    /**
     * @param mixed $variables
     * @return $this
     */
    function setVariables($variables)
    {
        $this->variables = $variables;
        return $this;
    }

    /**
     * @return mixed
     */
    function getVariables()
    {
        return $this->variables;
    }
}