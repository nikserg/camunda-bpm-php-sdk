<?php

namespace org\camunda\php\sdk\entity\request;

class ProcessInstanceRequest extends Request
{
    protected $businessKey;
    protected $processDefinitionId;
    protected $processDefinitionKey;
    protected $superProcessInstance;
    protected $subProcessInstance;
    protected $active;
    protected $suspended;
    protected $variables;
    protected $sortBy;
    protected $sortOrder;
    protected $deleteReason;
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
     * @param mixed $deleteReason
     * @return $this
     */
    function setDeleteReason($deleteReason)
    {
        $this->deleteReason = $deleteReason;
        return $this;
    }

    /**
     * @return mixed
     */
    function getDeleteReason()
    {
        return $this->deleteReason;
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
     * @param mixed $subProcessInstance
     * @return $this
     */
    function setSubProcessInstance($subProcessInstance)
    {
        $this->subProcessInstance = $subProcessInstance;
        return $this;
    }

    /**
     * @return mixed
     */
    function getSubProcessInstance()
    {
        return $this->subProcessInstance;
    }

    /**
     * @param mixed $superProcessInstance
     * @return $this
     */
    function setSuperProcessInstance($superProcessInstance)
    {
        $this->superProcessInstance = $superProcessInstance;
        return $this;
    }

    /**
     * @return mixed
     */
    function getSuperProcessInstance()
    {
        return $this->superProcessInstance;
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