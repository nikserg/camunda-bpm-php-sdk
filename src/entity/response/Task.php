<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class Task extends CastHelper
{
    protected $id;
    protected $key;
    protected $name;
    protected $assignee;
    protected $created;
    protected $due;
    protected $delegationState;
    protected $description;
    protected $executionId;
    protected $owner;
    protected $parentTaskId;
    protected $priority;
    protected $processDefinitionId;
    protected $processInstanceId;
    protected $taskDefinitionId;

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
     * @param mixed $created
     */
    function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $delegationState
     */
    function setDelegationState($delegationState)
    {
        $this->delegationState = $delegationState;
    }

    /**
     * @return mixed
     */
    function getDelegationState()
    {
        return $this->delegationState;
    }

    /**
     * @param mixed $description
     */
    function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $due
     */
    function setDue($due)
    {
        $this->due = $due;
    }

    /**
     * @return mixed
     */
    function getDue()
    {
        return $this->due;
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
     * @param mixed $key
     */
    function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $name
     */
    function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $owner
     */
    function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $parentTaskId
     */
    function setParentTaskId($parentTaskId)
    {
        $this->parentTaskId = $parentTaskId;
    }

    /**
     * @return mixed
     */
    function getParentTaskId()
    {
        return $this->parentTaskId;
    }

    /**
     * @param mixed $priority
     */
    function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return mixed
     */
    function getPriority()
    {
        return $this->priority;
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
     * @param mixed $taskDefinitionId
     */
    function setTaskDefinitionId($taskDefinitionId)
    {
        $this->taskDefinitionId = $taskDefinitionId;
    }

    /**
     * @return mixed
     */
    function getTaskDefinitionId()
    {
        return $this->taskDefinitionId;
    }
}