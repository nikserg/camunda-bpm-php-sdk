<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class Job extends CastHelper
{
    protected $id;
    protected $dueDate;
    protected $processInstanceId;
    protected $executionId;
    protected $retries;
    protected $exceptionMessage;

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

    /**
     * @param mixed $exceptionMessage
     */
    function setExceptionMessage($exceptionMessage)
    {
        $this->exceptionMessage = $exceptionMessage;
    }

    /**
     * @return mixed
     */
    function getExceptionMessage()
    {
        return $this->exceptionMessage;
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
     * @param mixed $id
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    function getId()
    {
        return $this->id;
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
     * @param mixed $retries
     */
    function setRetries($retries)
    {
        $this->retries = $retries;
    }

    /**
     * @return mixed
     */
    function getRetries()
    {
        return $this->retries;
    }
}