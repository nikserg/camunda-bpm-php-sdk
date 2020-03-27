<?php

namespace org\camunda\php\sdk\entity\request;

class IdentityLinksRequest extends Request
{
    protected $userId;
    protected $groupId;
    protected $type;

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
     * @param mixed $groupId
     * @return $this
     */
    function setGroupId($groupId)
    {
        $this->groupId = $groupId;
        return $this;
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
     * @return $this
     */
    function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    function getType()
    {
        return $this->type;
    }
}