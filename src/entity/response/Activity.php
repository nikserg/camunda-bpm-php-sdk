<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class Activity extends CastHelper
{
    protected $id;
    protected $activityId;
    protected $processInstanceId;
    protected $processDefinitionId;
    protected $childActivityInstances;
    protected $childTransitionInstances;
    protected $executionIds;

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
     * @param mixed $childActivityInstances
     */
    function setChildActivityInstances($childActivityInstances)
    {
        $this->childActivityInstances = $childActivityInstances;
    }

    /**
     * @return mixed
     */
    function getChildActivityInstances()
    {
        return $this->childActivityInstances;
    }

    /**
     * @param mixed $childTransitionInstances
     */
    function setChildTransitionInstances($childTransitionInstances)
    {
        $this->childTransitionInstances = $childTransitionInstances;
    }

    /**
     * @return mixed
     */
    function getChildTransitionInstances()
    {
        return $this->childTransitionInstances;
    }

    /**
     * @param mixed $executionIds
     */
    function setExecutionIds($executionIds)
    {
        $this->executionIds = $executionIds;
    }

    /**
     * @return mixed
     */
    function getExecutionIds()
    {
        return $this->executionIds;
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
}