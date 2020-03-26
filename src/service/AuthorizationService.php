<?php
/**
 * Created by IntelliJ IDEA.
 * User: hentschel
 * Date: 30.10.13
 * Time: 08:46
 * To change this template use File | Settings | File Templates.
 */

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
     * @param String $id authorization ID
     * @throws \Exception
     */
    public function deleteAuthorization($id)
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
     * @param String $id authorization ID
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\Authorization $this requested authorization
     */
    public function getAuthorization($id)
    {
        $authorization = new Authorization();
        $this->setRequestUrl('/authorization/' . $id);
        $this->setRequestObject(null);
        $this->setRequestMethod('GET');
        return $authorization->cast($this->execute());
    }

    /**
     * Performs an authorization check for the currently authenticated user.
     * @Link http://docs.camunda.org/latest/api-references/rest/#authorization-perform-an-authorization-check
     *
     * @param AuthorizationRequest $request
     * @throws \Exception
     * @return mixed
     */
    public function checkAuthorization(AuthorizationRequest $request)
    {
        $checkerArray = [
            0 => 'permissionName',
            1 => 'permissionValue',
            2 => 'resourceName',
            3 => 'resourceType',
        ];
        foreach ($checkerArray AS $value) {
            if (empty($request[$value])) {
                throw new Exception("Missing $value parameter");
            }
        }
        $authorization = new Authorization();
        $this->setRequestUrl('/authorization/check');
        $this->setRequestObject($request);
        $this->setRequestMethod('GET');
        return $authorization->cast($this->execute());
    }

    /**
     * Query for a list of authorizations using a list of parameters. The size of the result set can be retrieved by
     * using the get authorization count method.
     * @Link http://docs.camunda.org/latest/api-references/rest/#authorization-get-authorizations
     *
     * @param AuthorizationRequest $request
     * @throws \Exception
     * @return object
     */
    public function getAuthorizations(AuthorizationRequest $request)
    {
        $this->setRequestUrl('/authorization');
        $this->setRequestObject($request);
        $this->setRequestMethod('GET');
        $prepare = $this->execute();
        $response = [];
        foreach ($prepare AS $index => $data) {
            $authorization = new Authorization();
            $response['authorization_' . $index] = $authorization->cast($data);
        }
        return (object)$response;
    }

    /**
     * Query for authorizations using a list of parameters and retrieves the count.
     * @Link http://docs.camunda.org/latest/api-references/rest/#authorization-get-authorizations-count
     *
     * @param AuthorizationRequest $request
     * @throws \Exception
     * @return Integer $this count of authorizations
     */
    public function getCount(AuthorizationRequest $request)
    {
        $this->setRequestUrl('/authorization/count');
        $this->setRequestObject($request);
        $this->setRequestMethod('GET');
        return $this->execute()->count;
    }

    /**
     * Allows checking for the set of available operations that the currently authenticated user can perform.
     * @Link http://docs.camunda.org/latest/api-references/rest/#authorization-authorization-resource-options
     *
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\ResourceOption
     */
    public function getResourceOption()
    {
        $resourceOptions = new ResourceOption();
        $this->setRequestUrl('/authorization');
        $this->setRequestObject(null);
        $this->setRequestMethod('OPTIONS');
        return $resourceOptions->cast($this->execute());
    }


    /**
     * Allows checking for the set of available operations that the currently authenticated user can perform.
     * @Link http://docs.camunda.org/latest/api-references/rest/#authorization-authorization-resource-options
     *
     * @param String $id authorization ID
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\ResourceOption
     */
    public function getResourceInstanceOption($id)
    {
        $resourceOptions = new ResourceOption();
        $this->setRequestUrl('/authorization/' . $id);
        $this->setRequestObject(null);
        $this->setRequestMethod('OPTIONS');
        return $resourceOptions->cast($this->execute());
    }

    /**
     * Creates a new authorization
     * @Link http://docs.camunda.org/latest/api-references/rest/#authorization-create-a-new-authorization
     *
     * @param AuthorizationRequest $request
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\Authorization
     */
    public function createAuthorization(AuthorizationRequest $request)
    {
        $authorization = new Authorization();
        $this->setRequestUrl('/authorization/create');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        return $authorization->cast($this->execute());
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
    public function updateAuthorization($id, AuthorizationRequest $request)
    {
        $this->setRequestUrl('/authorization/' . $id);
        $this->setRequestObject($request);
        $this->setRequestMethod('PUT');
        $this->execute();
    }
}