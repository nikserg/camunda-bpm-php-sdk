<?php

namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\request\VariableInstanceRequest;
use org\camunda\php\sdk\entity\response\VariableInstance;

class VariableInstanceService extends RequestService
{
    /**
     * Retrieves all variable instances within given context
     *
     * @link http://docs.camunda.org/api-references/rest/#!/variable-instance/get-query
     * @link http://docs.camunda.org/api-references/rest/#!/variable-instance/post-query
     *
     * @param VariableInstanceRequest $request filter parameters
     * @param bool                    $isPostRequest switch for GET/POST request
     * @throws \Exception
     * @return VariableInstance[] list of variable instances
     */
    function getInstances(VariableInstanceRequest $request, $isPostRequest = false)
    {
        $this->setRequestUrl('/variable-instance');
        $this->setRequestObject($request);
        if ($isPostRequest == true) {
            $this->setRequestMethod('POST');
        }
        return VariableInstance::castList($this->execute());
    }

    /**
     * Retrieves the amount of variable instances
     *
     * @link http://docs.camunda.org/api-references/rest/#!/variable-instance/get-query-count
     * @link http://docs.camunda.org/api-references/rest/#!/variable-instance/post-query-count
     *
     * @param VariableInstanceRequest $request filter parameters
     * @param bool                    $isPostRequest switch for GET/POST request
     * @throws \Exception
     * @return int Amount of variable instances
     */
    function getCount(VariableInstanceRequest $request, $isPostRequest = false)
    {
        $this->setRequestUrl('/variable-instance/count');
        $this->setRequestObject($request);
        if ($isPostRequest == true) {
            $this->setRequestMethod('POST');
        }
        return $this->execute()->count;
    }
}