<?php

namespace org\camunda\php\sdk\entity\request;

class ExternalTaskRequest extends Request
{
    /**
     * The id of the task
     */
    protected $id;
    /**
     * The id of the worker on which behalf tasks are fetched. The returned
     * tasks are locked for that worker and can only be completed when
     * providing the same worker id.
     */
    protected $workerId;
    /**
     * The maximum number of tasks to return.
     */
    protected $maxTasks;
    /**
     * A boolean value, which indicates whether the task should be fetched
     * based on its priority or arbitrarily.
     */
    protected $usePriority;
    /**
     * A JSON array of topic objects for which external tasks should be
     * fetched. The returned tasks may be arbitrarily distributed among
     * these topics.
     */
    protected $topics;
    /**
     * An message indicating the reason of the failure.
     */
    protected $errorMessage;
    /**
     * A detailed error description.
     */
    protected $errorDetails;
    /**
     * A number of how often the task should be retried. Must be >= 0. If
     * this is 0, an incident is created and the task cannot be fetched
     * anymore unless the retries are increased again. The incident's message
     * is set to the errorMessage parameter.
     */
    protected $retries;
    /**
     * A timeout in milliseconds before the external task becomes available
     * again for fetching. Must be >= 0.
     */
    protected $retryTimeout;
    /**
     * A error code that indicates the predefined error. Is used to
     * identify the BPMN error handler.
     */
    protected $errorCode;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return ExternalTaskRequest
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWorkerId()
    {
        return $this->workerId;
    }

    /**
     * @param mixed $workerId
     * @return ExternalTaskRequest
     */
    public function setWorkerId($workerId)
    {
        $this->workerId = $workerId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaxTasks()
    {
        return $this->maxTasks;
    }

    /**
     * @param mixed $maxTasks
     * @return ExternalTaskRequest
     */
    public function setMaxTasks($maxTasks)
    {
        $this->maxTasks = $maxTasks;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsePriority()
    {
        return $this->usePriority;
    }

    /**
     * @param mixed $usePriority
     * @return ExternalTaskRequest
     */
    public function setUsePriority($usePriority)
    {
        $this->usePriority = $usePriority;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTopics()
    {
        return $this->topics;
    }

    /**
     * @param mixed $topics
     * @return ExternalTaskRequest
     */
    public function setTopics($topics)
    {
        $this->topics = $topics;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param mixed $errorMessage
     * @return ExternalTaskRequest
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorDetails()
    {
        return $this->errorDetails;
    }

    /**
     * @param mixed $errorDetails
     * @return ExternalTaskRequest
     */
    public function setErrorDetails($errorDetails)
    {
        $this->errorDetails = $errorDetails;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRetries()
    {
        return $this->retries;
    }

    /**
     * @param mixed $retries
     * @return ExternalTaskRequest
     */
    public function setRetries($retries)
    {
        $this->retries = $retries;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRetryTimeout()
    {
        return $this->retryTimeout;
    }

    /**
     * @param mixed $retryTimeout
     * @return ExternalTaskRequest
     */
    public function setRetryTimeout($retryTimeout)
    {
        $this->retryTimeout = $retryTimeout;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param mixed $errorCode
     * @return ExternalTaskRequest
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
        return $this;
    }
}