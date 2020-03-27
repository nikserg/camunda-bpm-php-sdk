<?php

namespace org\camunda\php\sdk\entity\request;

class HistoricProcessInstanceRequest extends Request
{
    protected $processInstanceId;
    protected $processInstanceBusinessKey;
    protected $superProcessInstanceId;
    protected $processDefinitionId;
    protected $processDefinitionKey;
    protected $processDefinitionKeyNotIn;
    protected $finished;
    protected $unfinished;
    protected $startedBy;
    protected $startedBefore;
    protected $startedAfter;
    protected $finishedBefore;
    protected $finishedAfter;
    protected $variables;
    protected $sortBy;
    protected $sortOrder;
    protected $firstResult;
    protected $maxResults;

    /**
     * @param mixed $finished
     */
    function setFinished($finished)
    {
        $this->finished = $finished;
    }

    /**
     * @return mixed
     */
    function getFinished()
    {
        return $this->finished;
    }

    /**
     * @param mixed $finishedAfter
     */
    function setFinishedAfter($finishedAfter)
    {
        $this->finishedAfter = $finishedAfter;
    }

    /**
     * @return mixed
     */
    function getFinishedAfter()
    {
        return $this->finishedAfter;
    }

    /**
     * @param mixed $finishedBefore
     */
    function setFinishedBefore($finishedBefore)
    {
        $this->finishedBefore = $finishedBefore;
    }

    /**
     * @return mixed
     */
    function getFinishedBefore()
    {
        return $this->finishedBefore;
    }

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
     * @param mixed $processDefinitionId
     */
    function setProcessDefinitionId($processDefinitionId)
    {
        $this->processDefinitionId = $processDefinitionId;
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
     */
    function setProcessDefinitionKey($processDefinitionKey)
    {
        $this->processDefinitionKey = $processDefinitionKey;
    }

    /**
     * @return mixed
     */
    function getProcessDefinitionKey()
    {
        return $this->processDefinitionKey;
    }

    /**
     * @param mixed $processDefinitionKeyNotIn
     */
    function setProcessDefinitionKeyNotIn($processDefinitionKeyNotIn)
    {
        $this->processDefinitionKeyNotIn = $processDefinitionKeyNotIn;
    }

    /**
     * @return mixed
     */
    function getProcessDefinitionKeyNotIn()
    {
        return $this->processDefinitionKeyNotIn;
    }

    /**
     * @param mixed $processInstanceBusinessKey
     */
    function setProcessInstanceBusinessKey($processInstanceBusinessKey)
    {
        $this->processInstanceBusinessKey = $processInstanceBusinessKey;
    }

    /**
     * @return mixed
     */
    function getProcessInstanceBusinessKey()
    {
        return $this->processInstanceBusinessKey;
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
     * @param mixed $startedAfter
     */
    function setStartedAfter($startedAfter)
    {
        $this->startedAfter = $startedAfter;
    }

    /**
     * @return mixed
     */
    function getStartedAfter()
    {
        return $this->startedAfter;
    }

    /**
     * @param mixed $startedBefore
     */
    function setStartedBefore($startedBefore)
    {
        $this->startedBefore = $startedBefore;
    }

    /**
     * @return mixed
     */
    function getStartedBefore()
    {
        return $this->startedBefore;
    }

    /**
     * @param mixed $startedBy
     */
    function setStartedBy($startedBy)
    {
        $this->startedBy = $startedBy;
    }

    /**
     * @return mixed
     */
    function getStartedBy()
    {
        return $this->startedBy;
    }

    /**
     * @param mixed $superProcessInstanceId
     */
    function setSuperProcessInstanceId($superProcessInstanceId)
    {
        $this->superProcessInstanceId = $superProcessInstanceId;
    }

    /**
     * @return mixed
     */
    function getSuperProcessInstanceId()
    {
        return $this->superProcessInstanceId;
    }

    /**
     * @param mixed $unfinished
     */
    function setUnfinished($unfinished)
    {
        $this->unfinished = $unfinished;
    }

    /**
     * @return mixed
     */
    function getUnfinished()
    {
        return $this->unfinished;
    }

    /**
     * @param mixed $variables
     */
    function setVariables($variables)
    {
        $this->variables = $variables;
    }

    /**
     * @return mixed
     */
    function getVariables()
    {
        return $this->variables;
    }
}