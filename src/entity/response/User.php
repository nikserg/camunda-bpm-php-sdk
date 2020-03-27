<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class User extends CastHelper
{
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $email;

    /**
     * @param mixed $email
     */
    function setEmail($email)
    {
        $this->email = $email;
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
     */
    function setFirstName($firstName)
    {
        $this->firstName = $firstName;
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
     * @param mixed $lastName
     */
    function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    function getLastName()
    {
        return $this->lastName;
    }
}