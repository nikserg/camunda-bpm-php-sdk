<?php

namespace org\camunda\php\sdk\entity\request;

class AuthorizationRequest extends Request
{
    protected $id;
    protected $type;
    protected $permissions;
    protected $userId;
    protected $userIdIn;
    protected $groupId;
    protected $groupIdIn;
    protected $resourceType;
    protected $resourceId;
    protected $sortBy;
    protected $sortOrder;
    protected $firstResult;
    protected $maxResults;
    protected $permissionName;
    protected $permissionValue;
    protected $resourceName;

    /**
     * @param mixed $firstResult
     */
    function setFirstResult($firstResult)
    {
        $this->firstResult = $firstResult;
    }

    /**
     * @return mixed
     */
    function getFirstResult()
    {
        return $this->firstResult;
    }

    /**
     * @param mixed $groupId
     */
    function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @return mixed
     */
    function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param mixed $groupIdIn
     */
    function setGroupIdIn($groupIdIn)
    {
        $this->groupIdIn = $groupIdIn;
    }

    /**
     * @return mixed
     */
    function getGroupIdIn()
    {
        return $this->groupIdIn;
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
     * @param mixed $maxResults
     */
    function setMaxResults($maxResults)
    {
        $this->maxResults = $maxResults;
    }

    /**
     * @return mixed
     */
    function getMaxResults()
    {
        return $this->maxResults;
    }

    /**
     * @param mixed $permissionName
     */
    function setPermissionName($permissionName)
    {
        $this->permissionName = $permissionName;
    }

    /**
     * @return mixed
     */
    function getPermissionName()
    {
        return $this->permissionName;
    }

    /**
     * @param mixed $permissionValue
     */
    function setPermissionValue($permissionValue)
    {
        $this->permissionValue = $permissionValue;
    }

    /**
     * @return mixed
     */
    function getPermissionValue()
    {
        return $this->permissionValue;
    }

    /**
     * @param mixed $permissions
     */
    function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * @return mixed
     */
    function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param mixed $resourceId
     */
    function setResourceId($resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * @param mixed $resourceName
     */
    function setResourceName($resourceName)
    {
        $this->resourceName = $resourceName;
    }

    /**
     * @return mixed
     */
    function getResourceName()
    {
        return $this->resourceName;
    }

    /**
     * @param mixed $resourceType
     */
    function setResourceType($resourceType)
    {
        $this->resourceType = $resourceType;
    }

    /**
     * @return mixed
     */
    function getResourceType()
    {
        return $this->resourceType;
    }

    /**
     * @param mixed $sortBy
     */
    function setSortBy($sortBy)
    {
        $this->sortBy = $sortBy;
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
     */
    function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * @return mixed
     */
    function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param mixed $type
     */
    function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $userId
     */
    function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userIdIn
     */
    function setUserIdIn($userIdIn)
    {
        $this->userIdIn = $userIdIn;
    }

    /**
     * @return mixed
     */
    function getUserIdIn()
    {
        return $this->userIdIn;
    }
}