<?php


namespace org\camunda\php\sdk\entity\request;


class IdentityRequest extends Request
{
    protected $userId;

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }
}