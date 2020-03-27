<?php

namespace org\camunda\php\sdk\entity\request;

class ProfileRequest extends Request
{
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $email;

    /**
     * @param mixed $email
     * @return $this
     */
    function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $firstName
     * @return $this
     */
    function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $lastName
     * @return $this
     */
    function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    function getLastName()
    {
        return $this->lastName;
    }
}