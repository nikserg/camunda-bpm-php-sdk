<?php

namespace org\camunda\php\sdk\entity\request;

class ProcessDefinitionRequest extends Request
{
    protected $name;
    protected $nameLike;
    protected $deploymentId;
    protected $key;
    protected $keyLike;
    protected $category;
    protected $categoryLike;
    protected $ver;
    protected $latest;
    protected $resourceName;
    protected $resourceNameLike;
    protected $startableBy;
    protected $active;
    protected $suspended;
    protected $incidentId;
    protected $incidentType;
    protected $incidentMessage;
    protected $incidentMessageLike;
    protected $sortBy;
    protected $sortOrder;
    protected $firstResult;
    protected $maxResults;
    protected $variables;
    protected $businessKey;
    protected $caseInstanceId;

    /**
     * @return mixed
     */
    function getName()
    {
        return $this->name;
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
    function getNameLike()
    {
        return $this->nameLike;
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
    function getDeploymentId()
    {
        return $this->deploymentId;
    }

    /**
     * @param mixed $deploymentId
     * @return $this
     */
    function setDeploymentId($deploymentId)
    {
        $this->deploymentId = $deploymentId;
        return $this;
    }

    /**
     * @return mixed
     */
    function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     * @return $this
     */
    function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return mixed
     */
    function getKeyLike()
    {
        return $this->keyLike;
    }

    /**
     * @param mixed $keyLike
     * @return $this
     */
    function setKeyLike($keyLike)
    {
        $this->keyLike = $keyLike;
        return $this;
    }

    /**
     * @return mixed
     */
    function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     * @return $this
     */
    function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return mixed
     */
    function getCategoryLike()
    {
        return $this->categoryLike;
    }

    /**
     * @param mixed $categoryLike
     * @return $this
     */
    function setCategoryLike($categoryLike)
    {
        $this->categoryLike = $categoryLike;
        return $this;
    }

    /**
     * @return mixed
     */
    function getVer()
    {
        return $this->ver;
    }

    /**
     * @param mixed $ver
     * @return $this
     */
    function setVer($ver)
    {
        $this->ver = $ver;
        return $this;
    }

    /**
     * @return mixed
     */
    function getLatest()
    {
        return $this->latest;
    }

    /**
     * @param mixed $latest
     * @return $this
     */
    function setLatest($latest)
    {
        $this->latest = $latest;
        return $this;
    }

    /**
     * @return mixed
     */
    function getResourceName()
    {
        return $this->resourceName;
    }

    /**
     * @param mixed $resourceName
     * @return $this
     */
    function setResourceName($resourceName)
    {
        $this->resourceName = $resourceName;
        return $this;
    }

    /**
     * @return mixed
     */
    function getResourceNameLike()
    {
        return $this->resourceNameLike;
    }

    /**
     * @param mixed $resourceNameLike
     * @return $this
     */
    function setResourceNameLike($resourceNameLike)
    {
        $this->resourceNameLike = $resourceNameLike;
        return $this;
    }

    /**
     * @return mixed
     */
    function getStartableBy()
    {
        return $this->startableBy;
    }

    /**
     * @param mixed $startableBy
     * @return $this
     */
    function setStartableBy($startableBy)
    {
        $this->startableBy = $startableBy;
        return $this;
    }

    /**
     * @return mixed
     */
    function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     * @return $this
     */
    function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return mixed
     */
    function getSuspended()
    {
        return $this->suspended;
    }

    /**
     * @param mixed $suspended
     * @return $this
     */
    function setSuspended($suspended)
    {
        $this->suspended = $suspended;
        return $this;
    }

    /**
     * @return mixed
     */
    function getIncidentId()
    {
        return $this->incidentId;
    }

    /**
     * @param mixed $incidentId
     * @return $this
     */
    function setIncidentId($incidentId)
    {
        $this->incidentId = $incidentId;
        return $this;
    }

    /**
     * @return mixed
     */
    function getIncidentType()
    {
        return $this->incidentType;
    }

    /**
     * @param mixed $incidentType
     * @return $this
     */
    function setIncidentType($incidentType)
    {
        $this->incidentType = $incidentType;
        return $this;
    }

    /**
     * @return mixed
     */
    function getIncidentMessage()
    {
        return $this->incidentMessage;
    }

    /**
     * @param mixed $incidentMessage
     * @return $this
     */
    function setIncidentMessage($incidentMessage)
    {
        $this->incidentMessage = $incidentMessage;
        return $this;
    }

    /**
     * @return mixed
     */
    function getIncidentMessageLike()
    {
        return $this->incidentMessageLike;
    }

    /**
     * @param mixed $incidentMessageLike
     * @return $this
     */
    function setIncidentMessageLike($incidentMessageLike)
    {
        $this->incidentMessageLike = $incidentMessageLike;
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
    function getSortOrder()
    {
        return $this->sortOrder;
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
    function getFirstResult()
    {
        return $this->firstResult;
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
    function getMaxResults()
    {
        return $this->maxResults;
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
     * @return VariableRequest[]
     */
    function getVariables()
    {
        return $this->variables;
    }

    /**
     * @param VariableRequest[] $variables
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
    function getBusinessKey()
    {
        return $this->businessKey;
    }

    /**
     * @param mixed $businessKey
     * @return $this
     */
    function setBusinessKey($businessKey)
    {
        $this->businessKey = $businessKey;
        return $this;
    }

    /**
     * @return mixed
     */
    function getCaseInstanceId()
    {
        return $this->caseInstanceId;
    }

    /**
     * @param mixed $caseInstanceId
     * @return $this
     */
    function setCaseInstanceId($caseInstanceId)
    {
        $this->caseInstanceId = $caseInstanceId;
        return $this;
    }
}