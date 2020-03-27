<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class HistoricProcessInstance extends CastHelper
{
    protected $id;
    protected $superProcessInstanceId;
    protected $processDefinitionId;
    protected $businessKey;
    protected $startTime;
    protected $endTime;
    protected $durationInMillis;
    protected $startUserId;
    protected $startActivityId;
    protected $deleteReason;

    /**
     * @param mixed $businessKey
     */
    function setBusinessKey($businessKey)
    {
        $this->businessKey = $businessKey;
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
     */
    function setDeleteReason($deleteReason)
    {
        $this->deleteReason = $deleteReason;
    }

    /**
     * @return mixed
     */
    function getDeleteReason()
    {
        return $this->deleteReason;
    }

    /**
     * @param mixed $durationInMillis
     */
    function setDurationInMillis($durationInMillis)
    {
        $this->durationInMillis = $durationInMillis;
    }

    /**
     * @return mixed
     */
    function getDurationInMillis()
    {
        return $this->durationInMillis;
    }

    /**
     * @param mixed $endTime
     */
    function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * @return mixed
     */
    function getEndTime()
    {
        return $this->endTime;
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
     * @param mixed $startActivityId
     */
    function setStartActivityId($startActivityId)
    {
        $this->startActivityId = $startActivityId;
    }

    /**
     * @return mixed
     */
    function getStartActivityId()
    {
        return $this->startActivityId;
    }

    /**
     * @param mixed $startTime
     */
    function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startUserId
     */
    function setStartUserId($startUserId)
    {
        $this->startUserId = $startUserId;
    }

    /**
     * @return mixed
     */
    function getStartUserId()
    {
        return $this->startUserId;
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
}