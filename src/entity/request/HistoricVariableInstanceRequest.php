<?php

namespace org\camunda\php\sdk\entity\request;

class HistoricVariableInstanceRequest extends Request
{
    protected $variableName;
    protected $variableNameLike;
    protected $variableValue;
    protected $processInstanceId;
    protected $sortBy;
    protected $sortOrder;
    protected $firstResult;
    protected $maxResults;

    /**
     * @param mixed $firstResult
     */
    function setFirstResult($firstResult)
    {
        $this->firstResult = $firstResult;
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
     */
    function setMaxResults($maxResults)
    {
        $this->maxResults = $maxResults;
    }

    /**
     * @return mixed
     */
    function getMaxResults()
    {
        return $this->maxResults;
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
     * @param mixed $sortBy
     */
    function setSortBy($sortBy)
    {
        $this->sortBy = $sortBy;
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
     */
    function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * @return mixed
     */
    function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param mixed $variableName
     */
    function setVariableName($variableName)
    {
        $this->variableName = $variableName;
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
     */
    function setVariableNameLike($variableNameLike)
    {
        $this->variableNameLike = $variableNameLike;
    }

    /**
     * @return mixed
     */
    function getVariableNameLike()
    {
        return $this->variableNameLike;
    }

    /**
     * @param mixed $variableValue
     */
    function setVariableValue($variableValue)
    {
        $this->variableValue = $variableValue;
    }

    /**
     * @return mixed
     */
    function getVariableValue()
    {
        return $this->variableValue;
    }
}