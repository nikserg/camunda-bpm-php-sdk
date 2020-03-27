<?php

namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\request\GroupRequest;
use org\camunda\php\sdk\entity\response\Group;
use org\camunda\php\sdk\entity\response\ResourceOption;

class GroupService extends RequestService
{
    /**
     * Create a new group
     *
     * @link http://docs.camunda.org/api-references/rest/#!/group/post-create
     *
     * @param GroupRequest $request request body
     * @throws \Exception
     */
    function createGroup(GroupRequest $request)
    {
        $this->setRequestUrl('/group/create');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        $this->execute();
    }

    /**
     * Add a member to a group.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/group/members/put
     *
     * @param string $id Group ID
     * @param string $userId User ID
     * @throws \Exception
     */
    function addMember($id, $userId)
    {
        $this->setRequestUrl('/group/' . $id . '/members/' . $userId);
        $this->setRequestObject(null);
        $this->setRequestMethod('PUT');
        $this->execute();
    }

    /**
     * Removes the group with given ID
     *
     * @link http://docs.camunda.org/api-references/rest/#!/group/delete
     *
     * @param string $id Group ID
     * @throws \Exception
     */
    function deleteGroup($id)
    {
        $this->setRequestUrl('/group/' . $id);
        $this->setRequestObject(null);
        $this->setRequestMethod('DELETE');
        $this->execute();
    }

    /**
     * Revokes the membership of a group
     *
     * @link http://docs.camunda.org/api-references/rest/#!/group/members/delete
     *
     * @param string $id Group ID
     * @param string $userId Member ID
     * @throws \Exception
     */
    function removeMember($id, $userId)
    {
        $this->setRequestUrl('/group/' . $id . '/members/' . $userId);
        $this->setRequestObject(null);
        $this->setRequestMethod('DELETE');
        $this->execute();
    }

    /**
     * Retrieves a group with given id
     *
     * @link http://docs.camunda.org/api-references/rest/#!/group/get
     *
     * @param string $id Group ID
     * @throws \Exception
     * @return Group $this Requested group
     */
    function getGroup($id)
    {
        $this->setRequestUrl('/group/' . $id);
        $this->setRequestObject(null);
        return Group::cast($this->execute());
    }

    /**
     * Retrieves a list of all groups within the given context
     *
     * @link http://docs.camunda.org/api-references/rest/#!/group/get-query
     *
     * @param GroupRequest $request Filter parameters
     * @throws \Exception
     * @return Group[] List of groups
     */
    function getGroups(GroupRequest $request)
    {
        $this->setRequestUrl('/group/');
        $this->setRequestObject($request);
        return Group::castList($this->execute());
    }

    /**
     * Retrieves the amount of Groups within the given context.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/group/get-query-count
     *
     * @param GroupRequest $request Filter parameters
     * @throws \Exception
     * @return int Amount of groups
     */
    function getCount(GroupRequest $request)
    {
        $this->setRequestUrl('/group/count');
        $this->setRequestObject($request);
        return $this->execute()->count;
    }

    /**
     * Updates an existing group.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/group/put-update
     *
     * @param string       $id Group Id
     * @param GroupRequest $request update parameters
     * @throws \Exception
     */
    function updateGroup($id, GroupRequest $request)
    {
        $this->setRequestUrl('/group/' . $id);
        $this->setRequestObject($request);
        $this->setRequestMethod('PUT');
        $this->execute();
    }

    /**
     * allows checking for the set of available operations that the currently authenticated user can perform on the
     * resource
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#group-group-resource-options
     *
     * @throws \Exception
     * @return ResourceOption $this
     */
    function getResourceOption()
    {
        $this->setRequestUrl('/group');
        $this->setRequestObject(null);
        $this->setRequestMethod('OPTIONS');
        return ResourceOption::cast($this->execute());
    }

    /**
     * allows checking for the set of available operations that the currently authenticated user can perform on the
     * resource
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#group-group-resource-options
     *
     * @param string $id group ID
     * @throws \Exception
     * @return ResourceOption $this
     */
    function getResourceInstanceOption($id)
    {
        $this->setRequestUrl('/group/' . $id);
        $this->setRequestObject(null);
        $this->setRequestMethod('OPTIONS');
        return ResourceOption::cast($this->execute());
    }
}