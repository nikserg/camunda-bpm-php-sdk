<?php

namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\request\IdentityRequest;
use org\camunda\php\sdk\entity\response\Identity;

class IdentityService extends RequestService
{
    /**
     * Gets the groups of a user and all users that share a group with the given user.
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#identity-get-a-users-groups
     *
     * @param IdentityRequest $request
     * @return Identity $this
     * @throws \Exception
     */
    function getGroups(IdentityRequest $request)
    {
        $this->setRequestUrl('/identity/groups');
        $this->setRequestObject($request);
        return Identity::cast($this->execute());
    }
}