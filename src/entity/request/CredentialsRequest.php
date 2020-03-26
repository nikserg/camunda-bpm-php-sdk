<?php


namespace org\camunda\php\sdk\entity\request;

use org\camunda\php\sdk\entity\request\Request;

class CredentialsRequest extends Request
{
    protected $password;

    /**
     * @param mixed $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }


}