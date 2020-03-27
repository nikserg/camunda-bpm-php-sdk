<?php

namespace org\camunda\php\sdk\entity\request;

class IdentityRequest extends Request
{
    protected $userId;

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