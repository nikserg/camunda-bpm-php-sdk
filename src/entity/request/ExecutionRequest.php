<?php

namespace org\camunda\php\sdk\entity\request;

class ExecutionRequest extends Request
{
    protected $businessKey;
    protected $processDefinitionId;
    protected $processDefinitionKey;
    protected $processInstanceId;
    protected $activityId;
    protected $signalEventSubscriptionName;
    protected $messageEventSubscriptionName;
    protected $active;
    protected $suspended;
    protected $variables;
    protected $processVariables;
    protected $sortBy;
    protected $sortOrder;
    protected $firstResult;
    protected $maxResults;

    /**
     * @param mixed $active
     * @return $this
     */
    function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return mixed
     */
    function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $suspended
     * @return $this
     */
    function setSuspended($suspended)
    {
        $this->suspended = $suspended;
        return $this;
    }

    /**
     * @return mixed
     */
    function getSuspended()
    {
        return $this->suspended;
    }

    /**
     * @param mixed $activityId
     * @return $this
     */
    function setActivityId($activityId)
    {
        $this->activityId = $activityId;
        return $this;
    }

    /**
     * @return mixed
     */
    function getActivityId()
    {
        return $this->activityId;
    }

    /**
     * @param mixed $businessKey
     * @return $this
     */
    function setBusinessKey($businessKey)
    {
        $this->businessKey = $businessKey;
        return $this;
    }

    /**
     * @return mixed
     */
    function getBusinessKey()
    {
        return $this->businessKey;
    }

    /**
     * @param mixed $firstResult
     * @return $this
     */
    function setFirstResult($firstResult)
    {
        $this->firstResult = $firstResult;
        return $this;
    }

    /**
     * @return mixed
     */
    function getFirstResult()
    {
        return $this->firstResult;
    }

    /**
     * @param mixed $maxResults
     * @return $this
     */
    function setMaxResults($maxResults)
    {
        $this->maxResults = $maxResults;
        return $this;
    }

    /**
     * @return mixed
     */
    function getMaxResults()
    {
        return $this->maxResults;
    }

    /**
     * @param mixed $messageEventSubscriptionName
     * @return $this
     */
    function setMessageEventSubscriptionName($messageEventSubscriptionName)
    {
        $this->messageEventSubscriptionName = $messageEventSubscriptionName;
        return $this;
    }

    /**
     * @return mixed
     */
    function getMessageEventSubscriptionName()
    {
        return $this->messageEventSubscriptionName;
    }

    /**
     * @param mixed $processDefinitionId
     * @return $this
     */
    function setProcessDefinitionId($processDefinitionId)
    {
        $this->processDefinitionId = $processDefinitionId;
        return $this;
    }

    /**
     * @return mixed
     */
    function getProcessDefinitionId()
    {
        return $this->processDefinitionId;
    }

    /**
     * @param mixed $processDefinitionKey
     * @return $this
     */
    function setProcessDefinitionKey($processDefinitionKey)
    {
        $this->processDefinitionKey = $processDefinitionKey;
        return $this;
    }

    /**
     * @return mixed
     */
    function getProcessDefinitionKey()
    {
        return $this->processDefinitionKey;
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
     * @param mixed $processVariables
     * @return $this
     */
    function setProcessVariables($processVariables)
    {
        $this->processVariables = $processVariables;
        return $this;
    }

    /**
     * @return mixed
     */
    function getProcessVariables()
    {
        return $this->processVariables;
    }

    /**
     * @param mixed $signalEventSubscriptionName
     * @return $this
     */
    function setSignalEventSubscriptionName($signalEventSubscriptionName)
    {
        $this->signalEventSubscriptionName = $signalEventSubscriptionName;
        return $this;
    }

    /**
     * @return mixed
     */
    function getSignalEventSubscriptionName()
    {
        return $this->signalEventSubscriptionName;
    }

    /**
     * @param mixed $sortBy
     * @return $this
     */
    function setSortBy($sortBy)
    {
        $this->sortBy = $sortBy;
        return $this;
    }

    /**
     * @return mixed
     */
    function getSortBy()
    {
        return $this->sortBy;
    }

    /**
     * @param mixed $sortOrder
     * @return $this
     */
    function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @return mixed
     */
    function getSortOrder()
    {
        return $this->sortOrder;
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