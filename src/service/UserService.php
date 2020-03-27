<?php

namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\request\CredentialsRequest;
use org\camunda\php\sdk\entity\request\ProfileRequest;
use org\camunda\php\sdk\entity\request\UserRequest;
use org\camunda\php\sdk\entity\response\ResourceOption;
use org\camunda\php\sdk\entity\response\User;

class UserService extends RequestService
{
    /**
     * Create a new user
     *
     * @link http://docs.camunda.org/api-references/rest/#!/user/post-create
     *
     * @param UserRequest $request user properties
     * @throws \Exception
     */
    function createUser(UserRequest $request)
    {
        $this->setRequestUrl('/user/create');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        $this->execute();
    }

    /**
     * Removes a User
     *
     * @link http://docs.camunda.org/api-references/rest/#!/user/delete
     *
     * @param string $id user ID
     * @throws \Exception
     */
    function deleteUser($id)
    {
        $this->setRequestUrl('/user/' . $id);
        $this->setRequestObject(null);
        $this->setRequestMethod('DELETE');
        $this->execute();
    }

    /**
     * Retrieves the profile of a given user
     *
     * @link http://docs.camunda.org/api-references/rest/#!/user/get
     *
     * @param string $id user ID
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\User $this requested profile
     */
    function getProfile($id)
    {
        $this->setRequestUrl('/user/' . $id . '/profile');
        $this->setRequestObject(null);
        return User::cast($this->execute());
    }

    /**
     * Retrieves a list of users within a given context
     *
     * @link http://docs.camunda.org/api-references/rest/#!/user/get-query
     *
     * @param UserRequest $request filter parameters
     * @throws \Exception
     * @return User[] list of requested users
     */
    function getUsers(UserRequest $request)
    {
        $this->setRequestUrl('/user/');
        $this->setRequestObject($request);
        return User::castList($this->execute());
    }

    /**
     * Retrieves the amount of users within a given context
     *
     * @link http://docs.camunda.org/api-references/rest/#!/user/get-query-count
     *
     * @param UserRequest $request filter parameters
     * @throws \Exception
     * @return int Amount of users
     */
    function getCount(UserRequest $request)
    {
        $this->setRequestUrl('/user/count');
        $this->setRequestObject($request);
        return $this->execute()->count;
    }

    /**
     * Updates the profile of a given user
     *
     * @link http://docs.camunda.org/api-references/rest/#!/user/put-update-profile
     *
     * @param string         $id user ID
     * @param ProfileRequest $request user properties
     * @throws \Exception
     */
    function updateProfile($id, ProfileRequest $request)
    {
        $this->setRequestUrl('/user/' . $id . '/profile');
        $this->setRequestObject($request);
        $this->setRequestMethod('PUT');
        $this->execute();
    }

    /**
     * update credentials of a single user
     *
     * @link http://docs.camunda.org/api-references/rest/#!/user/put-update-credentials
     *
     * @param string             $id user ID
     * @param CredentialsRequest $request credential properties
     * @throws \Exception
     */
    function updateCredentials($id, CredentialsRequest $request)
    {
        $this->setRequestUrl('/user/' . $id . '/credentials');
        $this->setRequestObject($request);
        $this->setRequestMethod('PUT');
        $this->execute();
    }

    /**
     * allows checking for the set of available operations that the currently authenticated user can perform on the user
     * resource
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#user-user-resource-options
     *
     * @throws \Exception
     * @return ResourceOption $this
     */
    function getResourceOption()
    {
        $this->setRequestUrl('/user');
        $this->setRequestObject(null);
        $this->setRequestMethod('OPTIONS');
        return ResourceOption::cast($this->execute());
    }

    /**
     * allows checking for the set of available operations that the currently authenticated user can perform on the user
     * resource
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#user-user-resource-options
     *
     * @param string $id user ID
     * @throws \Exception
     * @return ResourceOption $this
     */
    function getResourceInstanceOption($id)
    {
        $this->setRequestUrl('/user/' . $id);
        $this->setRequestObject(null);
        $this->setRequestMethod('OPTIONS');
        return ResourceOption::cast($this->execute());
    }
}