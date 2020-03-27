<?php

namespace org\camunda\php\sdk\service;

use Exception;
use org\camunda\php\sdk\entity\request\AuthorizationRequest;
use org\camunda\php\sdk\entity\response\Authorization;
use org\camunda\php\sdk\entity\response\ResourceOption;

class AuthorizationService extends RequestService
{
    /**
     * Removes an authorization by id
     * @Link http://docs.camunda.org/latest/api-references/rest/#authorization-delete-authorization
     *
     * @param string $id authorization ID
     * @throws \Exception
     */
    function deleteAuthorization($id)
    {
        $this->setRequestUrl('/authorization/' . $id);
        $this->setRequestObject(null);
        $this->setRequestMethod('DELETE');
        $this->execute();
    }

    /**
     * Retrieves a single authorization by id.
     * @Link http://docs.camunda.org/latest/api-references/rest/#authorization-get-single-authorization
     *
     * @param string $id authorization ID
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\Authorization $this requested authorization
     */
    function getAuthorization($id)
    {
        $this->setRequestUrl('/authorization/' . $id);
        $this->setRequestObject(null);
        return Authorization::cast($this->execute());
    }

    /**
     * Performs an authorization check for the currently authenticated user.
     * @Link http://docs.camunda.org/latest/api-references/rest/#authorization-perform-an-authorization-check
     *
     * @param AuthorizationRequest $request
     * @throws \Exception
     * @return mixed
     */
    function checkAuthorization(AuthorizationRequest $request)
    {
        $checkerArray = [
            0 => 'permissionName',
            1 => 'permissionValue',
            2 => 'resourceName',
            3 => 'resourceType',
        ];
        foreach ($checkerArray as $value) {
            if (empty($request[$value])) {
                throw new Exception("Missing $value parameter");
            }
        }
        $this->setRequestUrl('/authorization/check');
        $this->setRequestObject($request);
        return Authorization::cast($this->execute());
    }

    /**
     * Query for a list of authorizations using a list of parameters. The size of the result set can be retrieved by
     * using the get authorization count method.
     * @Link http://docs.camunda.org/latest/api-references/rest/#authorization-get-authorizations
     *
     * @param AuthorizationRequest $request
     * @throws \Exception
     * @return Authorization[]
     */
    function getAuthorizations(AuthorizationRequest $request)
    {
        $this->setRequestUrl('/authorization');
        $this->setRequestObject($request);
        return Authorization::castList($this->execute());
    }

    /**
     * Query for authorizations using a list of parameters and retrieves the count.
     * @Link http://docs.camunda.org/latest/api-references/rest/#authorization-get-authorizations-count
     *
     * @param AuthorizationRequest $request
     * @throws \Exception
     * @return Integer $this count of authorizations
     */
    function getCount(AuthorizationRequest $request)
    {
        $this->setRequestUrl('/authorization/count');
        $this->setRequestObject($request);
        return $this->execute()->count;
    }

    /**
     * Allows checking for the set of available operations that the currently authenticated user can perform.
     * @Link http://docs.camunda.org/latest/api-references/rest/#authorization-authorization-resource-options
     *
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\ResourceOption
     */
    function getResourceOption()
    {
        $this->setRequestUrl('/authorization');
        $this->setRequestObject(null);
        $this->setRequestMethod('OPTIONS');
        return ResourceOption::cast($this->execute());
    }

    /**
     * Allows checking for the set of available operations that the currently authenticated user can perform.
     * @Link http://docs.camunda.org/latest/api-references/rest/#authorization-authorization-resource-options
     *
     * @param string $id authorization ID
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\ResourceOption
     */
    function getResourceInstanceOption($id)
    {
        $this->setRequestUrl('/authorization/' . $id);
        $this->setRequestObject(null);
        $this->setRequestMethod('OPTIONS');
        return ResourceOption::cast($this->execute());
    }

    /**
     * Creates a new authorization
     * @Link http://docs.camunda.org/latest/api-references/rest/#authorization-create-a-new-authorization
     *
     * @param AuthorizationRequest $request
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\Authorization
     */
    function createAuthorization(AuthorizationRequest $request)
    {
        $this->setRequestUrl('/authorization/create');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        return Authorization::cast($this->execute());
    }

    /**
     * Updates a single authorization.
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#authorization-update-a-single-authorization
     *
     * @param                      $id
     * @param AuthorizationRequest $request
     * @throws \Exception
     */
    function updateAuthorization($id, AuthorizationRequest $request)
    {
        $this->setRequestUrl('/authorization/' . $id);
        $this->setRequestObject($request);
        $this->setRequestMethod('PUT');
        $this->execute();
    }
}