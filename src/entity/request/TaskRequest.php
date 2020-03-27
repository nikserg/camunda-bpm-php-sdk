<?php

namespace org\camunda\php\sdk\entity\request;

class TaskRequest extends Request
{
    protected $processInstanceId;
    protected $processInstanceBusinessKey;
    protected $processDefinitionId;
    protected $processDefinitionKey;
    protected $processDefinitionName;
    protected $executionId;
    protected $assignee;
    protected $owner;
    protected $candidateGroup;
    protected $candidateUser;
    protected $involvedUser;
    protected $unassigned;
    protected $taskDefinitionKey;
    protected $taskDefinitionKeyLike;
    protected $name;
    protected $nameLike;
    protected $description;
    protected $descriptionLike;
    protected $priority;
    protected $maxPriority;
    protected $minPriority;
    protected $due;
    protected $dueAfter;
    protected $dueBefore;
    protected $created;
    protected $createdAfter;
    protected $createdBefore;
    protected $delegationState;
    protected $candidateGroups;
    protected $taskVariables;
    protected $processVariables;
    protected $sortBy;
    protected $sortOrder;
    protected $firstResult;
    protected $maxResults;
    protected $userId;
    protected $variables;
    protected $includeAssignedTasks;

    /**
     * @param mixed $assignee
     * @return $this
     */
    function setAssignee($assignee)
    {
        $this->assignee = $assignee;
        return $this;
    }

    /**
     * @return mixed
     */
    function getAssignee()
    {
        return $this->assignee;
    }

    /**
     * @param mixed $candidateGroup
     * @return $this
     */
    function setCandidateGroup($candidateGroup)
    {
        $this->candidateGroup = $candidateGroup;
        return $this;
    }

    /**
     * @return mixed
     */
    function getCandidateGroup()
    {
        return $this->candidateGroup;
    }

    /**
     * @param mixed $candidateGroups
     * @return $this
     */
    function setCandidateGroups($candidateGroups)
    {
        $this->candidateGroups = $candidateGroups;
        return $this;
    }

    /**
     * @return mixed
     */
    function getCandidateGroups()
    {
        return $this->candidateGroups;
    }

    /**
     * @param mixed $candidateUser
     * @return $this
     */
    function setCandidateUser($candidateUser)
    {
        $this->candidateUser = $candidateUser;
        return $this;
    }

    /**
     * @return mixed
     */
    function getCandidateUser()
    {
        return $this->candidateUser;
    }

    /**
     * @param mixed $created
     * @return $this
     */
    function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $createdAfter
     * @return $this
     */
    function setCreatedAfter($createdAfter)
    {
        $this->createdAfter = $createdAfter;
        return $this;
    }

    /**
     * @return mixed
     */
    function getCreatedAfter()
    {
        return $this->createdAfter;
    }

    /**
     * @param mixed $createdBefore
     * @return $this
     */
    function setCreatedBefore($createdBefore)
    {
        $this->createdBefore = $createdBefore;
        return $this;
    }

    /**
     * @return mixed
     */
    function getCreatedBefore()
    {
        return $this->createdBefore;
    }

    /**
     * @param mixed $delegationState
     * @return $this
     */
    function setDelegationState($delegationState)
    {
        $this->delegationState = $delegationState;
        return $this;
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
     * @return $this
     */
    function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $descriptionLike
     * @return $this
     */
    function setDescriptionLike($descriptionLike)
    {
        $this->descriptionLike = $descriptionLike;
        return $this;
    }

    /**
     * @return mixed
     */
    function getDescriptionLike()
    {
        return $this->descriptionLike;
    }

    /**
     * @param mixed $due
     * @return $this
     */
    function setDue($due)
    {
        $this->due = $due;
        return $this;
    }

    /**
     * @return mixed
     */
    function getDue()
    {
        return $this->due;
    }

    /**
     * @param mixed $dueAfter
     * @return $this
     */
    function setDueAfter($dueAfter)
    {
        $this->dueAfter = $dueAfter;
        return $this;
    }

    /**
     * @return mixed
     */
    function getDueAfter()
    {
        return $this->dueAfter;
    }

    /**
     * @param mixed $dueBefore
     * @return $this
     */
    function setDueBefore($dueBefore)
    {
        $this->dueBefore = $dueBefore;
        return $this;
    }

    /**
     * @return mixed
     */
    function getDueBefore()
    {
        return $this->dueBefore;
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
     * @param mixed $involvedUser
     * @return $this
     */
    function setInvolvedUser($involvedUser)
    {
        $this->involvedUser = $involvedUser;
        return $this;
    }

    /**
     * @return mixed
     */
    function getInvolvedUser()
    {
        return $this->involvedUser;
    }

    /**
     * @param mixed $maxPriority
     * @return $this
     */
    function setMaxPriority($maxPriority)
    {
        $this->maxPriority = $maxPriority;
        return $this;
    }

    /**
     * @return mixed
     */
    function getMaxPriority()
    {
        return $this->maxPriority;
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
     * @param mixed $minPriority
     * @return $this
     */
    function setMinPriority($minPriority)
    {
        $this->minPriority = $minPriority;
        return $this;
    }

    /**
     * @return mixed
     */
    function getMinPriority()
    {
        return $this->minPriority;
    }

    /**
     * @param mixed $name
     * @return $this
     */
    function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $nameLike
     * @return $this
     */
    function setNameLike($nameLike)
    {
        $this->nameLike = $nameLike;
        return $this;
    }

    /**
     * @return mixed
     */
    function getNameLike()
    {
        return $this->nameLike;
    }

    /**
     * @param mixed $owner
     * @return $this
     */
    function setOwner($owner)
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * @return mixed
     */
    function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $priority
     * @return $this
     */
    function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
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
     * @return $this
     */
    function setProcessDefinitionId($processDefinitionId)
    {
        $this->processDefinitionId = $processDefinitionId;
        return $this;
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
     * @return $this
     */
    function setProcessDefinitionKey($processDefinitionKey)
    {
        $this->processDefinitionKey = $processDefinitionKey;
        return $this;
    }

    /**
     * @return mixed
     */
    function getProcessDefinitionKey()
    {
        return $this->processDefinitionKey;
    }

    /**
     * @param mixed $processDefinitionName
     * @return $this
     */
    function setProcessDefinitionName($processDefinitionName)
    {
        $this->processDefinitionName = $processDefinitionName;
        return $this;
    }

    /**
     * @return mixed
     */
    function getProcessDefinitionName()
    {
        return $this->processDefinitionName;
    }

    /**
     * @param mixed $processInstanceBusinessKey
     * @return $this
     */
    function setProcessInstanceBusinessKey($processInstanceBusinessKey)
    {
        $this->processInstanceBusinessKey = $processInstanceBusinessKey;
        return $this;
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
     * @param mixed $processVariables
     * @return $this
     */
    function setProcessVariables($processVariables)
    {
        $this->processVariables = $processVariables;
        return $this;
    }

    /**
     * @return mixed
     */
    function getProcessVariables()
    {
        return $this->processVariables;
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
     * @param mixed $taskDefinitionKey
     * @return $this
     */
    function setTaskDefinitionKey($taskDefinitionKey)
    {
        $this->taskDefinitionKey = $taskDefinitionKey;
        return $this;
    }

    /**
     * @return mixed
     */
    function getTaskDefinitionKey()
    {
        return $this->taskDefinitionKey;
    }

    /**
     * @param mixed $taskDefinitionKeyLike
     * @return $this
     */
    function setTaskDefinitionKeyLike($taskDefinitionKeyLike)
    {
        $this->taskDefinitionKeyLike = $taskDefinitionKeyLike;
        return $this;
    }

    /**
     * @return mixed
     */
    function getTaskDefinitionKeyLike()
    {
        return $this->taskDefinitionKeyLike;
    }

    /**
     * @param mixed $taskVariables
     * @return $this
     */
    function setTaskVariables($taskVariables)
    {
        $this->taskVariables = $taskVariables;
        return $this;
    }

    /**
     * @return mixed
     */
    function getTaskVariables()
    {
        return $this->taskVariables;
    }

    /**
     * @param mixed $unassigned
     * @return $this
     */
    function setUnassigned($unassigned)
    {
        $this->unassigned = $unassigned;
        return $this;
    }

    /**
     * @return mixed
     */
    function getUnassigned()
    {
        return $this->unassigned;
    }

    /**
     * @param mixed $userId
     * @return $this
     */
    function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return mixed
     */
    function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $variables
     * @return $this
     */
    function setVariables($variables)
    {
        $this->variables = $variables;
        return $this;
    }

    /**
     * @return mixed
     */
    function getVariables()
    {
        return $this->variables;
    }

    /**
     * @param boolean $includeAssignedTasks
     * @return $this
     */
    function setIncludeAssignedTasks($includeAssignedTasks)
    {
        $this->includeAssignedTasks = $includeAssignedTasks;
        return $this;
    }

    /**
     * @return boolean
     */
    function getIncludeAssignedTasks()
    {
        return $this->includeAssignedTasks;
    }
}
