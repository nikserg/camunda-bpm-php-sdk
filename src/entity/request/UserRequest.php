<?php

namespace org\camunda\php\sdk\entity\request;

class UserRequest extends Request
{
    protected $id;
    protected $firstName;
    protected $firstNameLike;
    protected $lastName;
    protected $lastNameLike;
    protected $email;
    protected $emailLike;
    protected $memberOfGroup;
    protected $sortBy;
    protected $sortOrder;
    protected $firstResult;
    protected $maxResults;
    protected $password;
    protected $profile;
    protected $credentials;

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
     * @param mixed $emailLike
     * @return $this
     */
    function setEmailLike($emailLike)
    {
        $this->emailLike = $emailLike;
        return $this;
    }

    /**
     * @return mixed
     */
    function getEmailLike()
    {
        return $this->emailLike;
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
     * @param mixed $firstNameLike
     * @return $this
     */
    function setFirstNameLike($firstNameLike)
    {
        $this->firstNameLike = $firstNameLike;
        return $this;
    }

    /**
     * @return mixed
     */
    function getFirstNameLike()
    {
        return $this->firstNameLike;
    }

    /**
     * @param mixed $firstResult
     * @return $this
     */
    function setFirstResult($firstResult)
    {
        $this->firstResult = $firstResult;
        return $this;
    }

    /**
     * @return mixed
     */
    function getFirstResult()
    {
        return $this->firstResult;
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

    /**
     * @param mixed $lastNameLike
     * @return $this
     */
    function setLastNameLike($lastNameLike)
    {
        $this->lastNameLike = $lastNameLike;
        return $this;
    }

    /**
     * @return mixed
     */
    function getLastNameLike()
    {
        return $this->lastNameLike;
    }

    /**
     * @param mixed $maxResults
     * @return $this
     */
    function setMaxResults($maxResults)
    {
        $this->maxResults = $maxResults;
        return $this;
    }

    /**
     * @return mixed
     */
    function getMaxResults()
    {
        return $this->maxResults;
    }

    /**
     * @param mixed $memberOfGroup
     * @return $this
     */
    function setMemberOfGroup($memberOfGroup)
    {
        $this->memberOfGroup = $memberOfGroup;
        return $this;
    }

    /**
     * @return mixed
     */
    function getMemberOfGroup()
    {
        return $this->memberOfGroup;
    }

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

    /**
     * @param mixed $sortBy
     * @return $this
     */
    function setSortBy($sortBy)
    {
        $this->sortBy = $sortBy;
        return $this;
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
     * @return $this
     */
    function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @return mixed
     */
    function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param \org\camunda\php\sdk\entity\request\CredentialsRequest $credentials
     * @return $this
     */
    function setCredentials(CredentialsRequest $credentials)
    {
        $this->credentials = $credentials;
        return $this;
    }

    /**
     * @return \org\camunda\php\sdk\entity\request\CredentialsRequest
     */
    function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * @param \org\camunda\php\sdk\entity\request\ProfileRequest $profile
     * @return $this
     */
    function setProfile(ProfileRequest $profile)
    {
        $this->profile = $profile;
        return $this;
    }

    /**
     * @return \org\camunda\php\sdk\entity\request\ProfileRequest
     */
    function getProfile()
    {
        return $this->profile;
    }
}