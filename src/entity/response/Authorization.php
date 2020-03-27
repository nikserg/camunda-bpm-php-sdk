<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class Authorization extends CastHelper
{
    protected $id;
    protected $type;
    protected $permissions;
    protected $userId;
    protected $groupId;
    protected $resourceType;
    protected $resourceId;
    protected $links;
    protected $count;
    protected $permissionName;
    protected $resourceName;
    protected $isAuthorized;

    /**
     * @param mixed $count
     */
    function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    function getCount()
    {
        return $this->count;
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
     * @param mixed $isAuthorized
     */
    function setIsAuthorized($isAuthorized)
    {
        $this->isAuthorized = $isAuthorized;
    }

    /**
     * @return mixed
     */
    function getIsAuthorized()
    {
        return $this->isAuthorized;
    }

    /**
     * @param mixed $links
     */
    function setLinks($links)
    {
        $this->links = $links;
    }

    /**
     * @return mixed
     */
    function getLinks()
    {
        return $this->links;
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
}