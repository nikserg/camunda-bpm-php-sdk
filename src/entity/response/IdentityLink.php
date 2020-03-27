<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class IdentityLink extends CastHelper
{
    protected $userId;
    protected $groupId;
    protected $type;

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