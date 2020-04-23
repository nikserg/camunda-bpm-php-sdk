<?php

namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\request\ProcessInstanceRequest;
use org\camunda\php\sdk\entity\request\VariableRequest;
use org\camunda\php\sdk\entity\response\ProcessInstance;
use org\camunda\php\sdk\entity\response\Variable;

class ProcessInstanceService extends RequestService
{
    /**
     * Retrieves a single instance with given ID
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-instance/get
     *
     * @param string $id Process instance ID
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\ProcessInstance $this requested process instance
     */
    function getInstance($id)
    {
        $this->setRequestUrl('/process-instance/' . $id);
        $this->setRequestObject(null);
        return ProcessInstance::cast($this->execute());
    }

    /**
     * Retrieves all process instances within a given context.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-instance/get-query
     * @link http://docs.camunda.org/api-references/rest/#!/process-instance/post-query
     *
     * @param ProcessInstanceRequest $request filter parameters
     * @param bool                   $isPostRequest switch for GET/POST request
     * @throws \Exception
     * @return ProcessInstance[]
     */
    function getInstances(ProcessInstanceRequest $request, $isPostRequest = false)
    {
        $this->setRequestUrl('/process-instance/');
        $this->setRequestObject($request);
        if ($isPostRequest == true) {
            $this->setRequestMethod('POST');
        }
        return ProcessInstance::castList($this->execute());
    }

    /**
     * Retrieves the amount of process instances within a given context
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-instance/get-query-count
     * @link http://docs.camunda.org/api-references/rest/#!/process-instance/post-query-count
     *
     * @param ProcessInstanceRequest $request filter parameters
     * @param bool                   $isPostRequest switch for GET/POST request
     * @throws \Exception
     * @return int amount of process instances
     */
    function getCount(ProcessInstanceRequest $request, $isPostRequest = false)
    {
        $this->setRequestUrl('/process-instance/count/');
        $this->setRequestObject($request);
        if ($isPostRequest == true) {
            $this->setRequestMethod('POST');
        }
        return $this->execute()->count;
    }

    /**
     * Retrieves the requested variable within a given process instance context
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-instance/get-single-variable
     *
     * @param string $id process instance ID
     * @param string $variableId process variable ID
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\Variable $this requested variable
     */
    function getProcessVariable($id, $variableId)
    {
        $this->setRequestUrl('/process-instance/' . $id . '/variables/' . $variableId);
        $this->setRequestObject(null);
        return Variable::cast($this->execute());
    }

    /**
     * Sets a variable of a given process instance
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-instance/put-single-variable
     *
     * @param string          $id process instance ID
     * @param string          $variableId variable ID
     * @param VariableRequest $request variable properties
     * @throws \Exception
     */
    function putProcessVariable($id, $variableId, VariableRequest $request)
    {
        $this->setRequestUrl('/process-instance/' . $id . '/variables/' . $variableId);
        $this->setRequestObject($request);
        $this->setRequestMethod('PUT');
        $this->execute();
    }

    /**
     * Removes a variable from a given process instance
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-instance/delete-single-variable
     *
     * @param string $id process instance ID
     * @param string $variableId variable ID
     * @throws \Exception
     */
    function deleteProcessVariable($id, $variableId)
    {
        $this->setRequestUrl('/process-instance/' . $id . '/variables/' . $variableId);
        $this->setRequestObject(null);
        $this->setRequestMethod('DELETE');
        $this->execute();
    }

    /**
     * Retrieves all variables within a given process instance
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-instance/get-variables
     *
     * @param string $id process instance ID
     * @throws \Exception
     * @return Variable[] <string:Variable> map of variables
     */
    function getProcessVariables($id)
    {
        $this->setRequestUrl('/process-instance/' . $id . '/variables');
        $this->setRequestObject(null);
        return Variable::castMap($this->execute());
    }

    /**
     * Updates or removes multiple process variables
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-instance/post-variables
     *
     * @param string          $id process instance ID
     * @param VariableRequest $request modification and/or deletion parameters
     * @throws \Exception
     */
    function updateOrDeleteProcessVariables($id, VariableRequest $request)
    {
        $this->setRequestUrl('/process-instance/' . $id . '/variables');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        $this->execute();
    }

    /**
     * Removes a given process instance
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-instance/delete
     *
     * @param string $id process instance ID
     * @throws \Exception
     */
    function deleteInstance($id)
    {
        $this->setRequestUrl('/process-instance/' . $id);
        $this->setRequestObject(null);
        $this->setRequestMethod('DELETE');
        $this->execute();
    }

    /**
     * Activate or suspend a given process instance.
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#process-instance-activatesuspend-process-instance
     *
     * @param string                 $id process instance ID
     * @param ProcessInstanceRequest $request
     * @throws \Exception
     */
    function activateOrSuspendInstance($id, ProcessInstanceRequest $request)
    {
        $this->setRequestUrl('/process-instance/' . $id . '/suspended');
        $this->setRequestObject($request);
        $this->setRequestMethod('PUT');
        $this->execute();
    }
}