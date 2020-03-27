<?php

namespace org\camunda\php\sdk\entity\request;

class CredentialsRequest extends Request
{
    protected $password;

    /**
     * @param mixed $password
     * @return $this
     */
    function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    function getPassword()
    {
        return $this->password;
    }
}