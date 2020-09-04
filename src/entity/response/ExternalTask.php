<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class ExternalTask extends CastHelper
{
    /**
     * @var string    The id of the activity that this external task belongs to.
     */
    protected $activityId;
    /**
     * @var string    The id of the activity instance that the external task belongs to.
     */
    protected $activityInstanceId;
    /**
     * @var string    The full error message submitted with the latest reported failure executing this task;
     */
    protected $errorMessage;
    /**
     * @var string    The error details submitted with the latest reported failure executing this task.
     */
    protected $errorDetails;
    /**
     * @var string    The id of the execution that the external task belongs to.
     */
    protected $executionId;
    /**
     * @var string    The id of the external task.
     */
    protected $id;
    /**
     * @var string    The date that the task's most recent lock expires or has expired.
     */
    protected $lockExpirationTime;
    /**
     * @var string    The id of the process definition the external task is defined in.
     */
    protected $processDefinitionId;
    /**
     * @var string    The key of the process definition the external task is defined in.
     */
    protected $processDefinitionKey;
    /**
     * @var string    The id of the process instance the external task belongs to.
     */
    protected $processInstanceId;
    /**
     * @var string    The id of the tenant the external task belongs to.
     */
    protected $tenantId;
    /**
     * @var string    The id of the worker that processes or processed the most recent lock.
     */
    protected $workerId;
    /**
     * The number of retries the task currently has left.
     */
    protected $retries;
    /**
     * A flag indicating whether the external task is suspended or not.
     */
    protected $suspended;
    /**
     * The priority of the external task.
     */
    protected $priority;
    /**
     * @var string    The topic name of the external task.
     */
    protected $topicName;
    /**
     * @var Variable[]   A JSON object containing a property for each of the requested variables. The key is the
     *     variable name, the value is a JSON object of serialized variable values
     */
    protected $variables;

    /**
     * @return mixed
     */
    public function getActivityId()
    {
        return $this->activityId;
    }

    /**
     * @param mixed $activityId
     * @return ExternalTask
     */
    public function setActivityId($activityId)
    {
        $this->activityId = $activityId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActivityInstanceId()
    {
        return $this->activityInstanceId;
    }

    /**
     * @param mixed $activityInstanceId
     * @return ExternalTask
     */
    public function setActivityInstanceId($activityInstanceId)
    {
        $this->activityInstanceId = $activityInstanceId;
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
     * @return ExternalTask
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
     * @return ExternalTask
     */
    public function setErrorDetails($errorDetails)
    {
        $this->errorDetails = $errorDetails;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExecutionId()
    {
        return $this->executionId;
    }

    /**
     * @param mixed $executionId
     * @return ExternalTask
     */
    public function setExecutionId($executionId)
    {
        $this->executionId = $executionId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return ExternalTask
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLockExpirationTime()
    {
        return $this->lockExpirationTime;
    }

    /**
     * @param mixed $lockExpirationTime
     * @return ExternalTask
     */
    public function setLockExpirationTime($lockExpirationTime)
    {
        $this->lockExpirationTime = $lockExpirationTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProcessDefinitionId()
    {
        return $this->processDefinitionId;
    }

    /**
     * @param mixed $processDefinitionId
     * @return ExternalTask
     */
    public function setProcessDefinitionId($processDefinitionId)
    {
        $this->processDefinitionId = $processDefinitionId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProcessDefinitionKey()
    {
        return $this->processDefinitionKey;
    }

    /**
     * @param mixed $processDefinitionKey
     * @return ExternalTask
     */
    public function setProcessDefinitionKey($processDefinitionKey)
    {
        $this->processDefinitionKey = $processDefinitionKey;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProcessInstanceId()
    {
        return $this->processInstanceId;
    }

    /**
     * @param mixed $processInstanceId
     * @return ExternalTask
     */
    public function setProcessInstanceId($processInstanceId)
    {
        $this->processInstanceId = $processInstanceId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTenantId()
    {
        return $this->tenantId;
    }

    /**
     * @param mixed $tenantId
     * @return ExternalTask
     */
    public function setTenantId($tenantId)
    {
        $this->tenantId = $tenantId;
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
     * @return ExternalTask
     */
    public function setWorkerId($workerId)
    {
        $this->workerId = $workerId;
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
     * @return ExternalTask
     */
    public function setRetries($retries)
    {
        $this->retries = $retries;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSuspended()
    {
        return $this->suspended;
    }

    /**
     * @param mixed $suspended
     * @return ExternalTask
     */
    public function setSuspended($suspended)
    {
        $this->suspended = $suspended;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param mixed $priority
     * @return ExternalTask
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTopicName()
    {
        return $this->topicName;
    }

    /**
     * @param mixed $topicName
     * @return ExternalTask
     */
    public function setTopicName($topicName)
    {
        $this->topicName = $topicName;
        return $this;
    }

    /**
     * @return Variable[]
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * @param Variable[] $variables
     * @return ExternalTask
     */
    public function setVariables($variables)
    {
        $this->variables = $variables;
        return $this;
    }
}