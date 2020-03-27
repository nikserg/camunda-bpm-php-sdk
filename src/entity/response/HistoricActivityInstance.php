<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class HistoricActivityInstance extends CastHelper
{
    protected $id;
    protected $parentActivityInstanceId;
    protected $activityId;
    protected $activityName;
    protected $activityType;
    protected $processDefinitionId;
    protected $processInstanceId;
    protected $executionId;
    protected $taskId;
    protected $assignee;
    protected $calledProcessInstanceId;
    protected $startTime;
    protected $endTime;
    protected $durationInMillis;

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
     * @param mixed $assignee
     */
    function setAssignee($assignee)
    {
        $this->assignee = $assignee;
    }

    /**
     * @return mixed
     */
    function getAssignee()
    {
        return $this->assignee;
    }

    /**
     * @param mixed $calledProcessInstanceId
     */
    function setCalledProcessInstanceId($calledProcessInstanceId)
    {
        $this->calledProcessInstanceId = $calledProcessInstanceId;
    }

    /**
     * @return mixed
     */
    function getCalledProcessInstanceId()
    {
        return $this->calledProcessInstanceId;
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
     * @param mixed $parentActivityInstanceId
     */
    function setParentActivityInstanceId($parentActivityInstanceId)
    {
        $this->parentActivityInstanceId = $parentActivityInstanceId;
    }

    /**
     * @return mixed
     */
    function getParentActivityInstanceId()
    {
        return $this->parentActivityInstanceId;
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
     * @param mixed $taskId
     */
    function setTaskId($taskId)
    {
        $this->taskId = $taskId;
    }

    /**
     * @return mixed
     */
    function getTaskId()
    {
        return $this->taskId;
    }
}