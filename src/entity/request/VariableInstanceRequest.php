<?php

namespace org\camunda\php\sdk\entity\request;

class VariableInstanceRequest extends Request
{
    protected $variableName;
    protected $variableNameLike;
    protected $processInstanceIdIn;
    protected $executionIdIn;
    protected $taskIdIn;
    protected $activityInstanceIdIn;
    protected $variableValues;
    protected $sortBy;
    protected $sortOrder;
    protected $firstResult;
    protected $maxResults;

    /**
     * @param mixed $activityInstanceIdIn
     * @return $this
     */
    function setActivityInstanceIdIn($activityInstanceIdIn)
    {
        $this->activityInstanceIdIn = $activityInstanceIdIn;
        return $this;
    }

    /**
     * @return mixed
     */
    function getActivityInstanceIdIn()
    {
        return $this->activityInstanceIdIn;
    }

    /**
     * @param mixed $executionIdIn
     * @return $this
     */
    function setExecutionIdIn($executionIdIn)
    {
        $this->executionIdIn = $executionIdIn;
        return $this;
    }

    /**
     * @return mixed
     */
    function getExecutionIdIn()
    {
        return $this->executionIdIn;
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
     * @param mixed $processInstanceIdIn
     * @return $this
     */
    function setProcessInstanceIdIn($processInstanceIdIn)
    {
        $this->processInstanceIdIn = $processInstanceIdIn;
        return $this;
    }

    /**
     * @return mixed
     */
    function getProcessInstanceIdIn()
    {
        return $this->processInstanceIdIn;
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
     * @param mixed $taskIdIn
     * @return $this
     */
    function setTaskIdIn($taskIdIn)
    {
        $this->taskIdIn = $taskIdIn;
        return $this;
    }

    /**
     * @return mixed
     */
    function getTaskIdIn()
    {
        return $this->taskIdIn;
    }

    /**
     * @param mixed $variableName
     * @return $this
     */
    function setVariableName($variableName)
    {
        $this->variableName = $variableName;
        return $this;
    }

    /**
     * @return mixed
     */
    function getVariableName()
    {
        return $this->variableName;
    }

    /**
     * @param mixed $variableNameLike
     * @return $this
     */
    function setVariableNameLike($variableNameLike)
    {
        $this->variableNameLike = $variableNameLike;
        return $this;
    }

    /**
     * @return mixed
     */
    function getVariableNameLike()
    {
        return $this->variableNameLike;
    }

    /**
     * @param mixed $variableValues
     * @return $this
     */
    function setVariableValues($variableValues)
    {
        $this->variableValues = $variableValues;
        return $this;
    }

    /**
     * @return mixed
     */
    function getVariableValues()
    {
        return $this->variableValues;
    }
}