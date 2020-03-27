<?php

namespace org\camunda\php\sdk\entity\request;

class HistoricActivityInstanceRequest extends Request
{
    protected $activityInstanceIds;
    protected $processInstanceId;
    protected $processDefinitionId;
    protected $executionId;
    protected $activityId;
    protected $activityName;
    protected $activityType;
    protected $taskAssignee;
    protected $finished;
    protected $unfinished;
    protected $sortBy;
    protected $sortOrder;
    protected $firstResult;
    protected $maxResults;
    protected $activityInstanceId;

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
     * @param mixed $activityName
     */
    function setActivityName($activityName)
    {
        $this->activityName = $activityName;
    }

    /**
     * @return mixed
     */
    function getActivityName()
    {
        return $this->activityName;
    }

    /**
     * @param mixed $activityType
     */
    function setActivityType($activityType)
    {
        $this->activityType = $activityType;
    }

    /**
     * @return mixed
     */
    function getActivityType()
    {
        return $this->activityType;
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
     * @param mixed $taskAssignee
     */
    function setTaskAssignee($taskAssignee)
    {
        $this->taskAssignee = $taskAssignee;
    }

    /**
     * @return mixed
     */
    function getTaskAssignee()
    {
        return $this->taskAssignee;
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
}