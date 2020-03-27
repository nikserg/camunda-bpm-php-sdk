<?php

namespace org\camunda\php\sdk\entity\request;

class JobRequest extends Request
{
    protected $jobId;
    protected $processInstanceId;
    protected $executionId;
    protected $withRetriesLeft;
    protected $executable;
    protected $timers;
    protected $messages;
    protected $dueDate;

    /**
     * @param mixed $dueDate
     */
    function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return mixed
     */
    function getDueDate()
    {
        return $this->dueDate;
    }

    protected $dueDates;
    protected $withException;
    protected $sortBy;
    protected $sortOrder;
    protected $firstResult;
    protected $maxResults;

    /**
     * @param mixed $dueDates
     * @return $this
     */
    function setDueDates($dueDates)
    {
        $this->dueDates = $dueDates;
        return $this;
    }

    /**
     * @return mixed
     */
    function getDueDates()
    {
        return $this->dueDates;
    }

    /**
     * @param mixed $executable
     * @return $this
     */
    function setExecutable($executable)
    {
        $this->executable = $executable;
        return $this;
    }

    /**
     * @return mixed
     */
    function getExecutable()
    {
        return $this->executable;
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
     * @param mixed $jobId
     * @return $this
     */
    function setJobId($jobId)
    {
        $this->jobId = $jobId;
        return $this;
    }

    /**
     * @return mixed
     */
    function getJobId()
    {
        return $this->jobId;
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
     * @param mixed $messages
     * @return $this
     */
    function setMessages($messages)
    {
        $this->messages = $messages;
        return $this;
    }

    /**
     * @return mixed
     */
    function getMessages()
    {
        return $this->messages;
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
     * @param mixed $timers
     * @return $this
     */
    function setTimers($timers)
    {
        $this->timers = $timers;
        return $this;
    }

    /**
     * @return mixed
     */
    function getTimers()
    {
        return $this->timers;
    }

    /**
     * @param mixed $withException
     * @return $this
     */
    function setWithException($withException)
    {
        $this->withException = $withException;
        return $this;
    }

    /**
     * @return mixed
     */
    function getWithException()
    {
        return $this->withException;
    }

    /**
     * @param mixed $withRetriesLeft
     * @return $this
     */
    function setWithRetriesLeft($withRetriesLeft)
    {
        $this->withRetriesLeft = $withRetriesLeft;
        return $this;
    }

    /**
     * @return mixed
     */
    function getWithRetriesLeft()
    {
        return $this->withRetriesLeft;
    }
}