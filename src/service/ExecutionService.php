<?php

namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\request\ExecutionRequest;
use org\camunda\php\sdk\entity\request\MessageSubscriptionRequest;
use org\camunda\php\sdk\entity\request\VariableRequest;
use org\camunda\php\sdk\entity\response\Execution;
use org\camunda\php\sdk\entity\response\MessageSubscription;
use org\camunda\php\sdk\entity\response\Variable;

class ExecutionService extends RequestService
{
    /**
     * Requests a single execution with a given ID
     *
     * @link http://docs.camunda.org/api-references/rest/#!/execution/get
     *
     * @param string $id ID of requested execution
     * @throws \Exception
     * @return Execution $this requested execution
     */
    function getExecution($id)
    {
        $this->setRequestUrl('/execution/' . $id);
        $this->setRequestObject(null);
        return Execution::cast($this->execute());
    }

    /**
     * Requests a list of Executions
     *
     * @link http://docs.camunda.org/api-references/rest/#!/execution/get-query
     * @link http://docs.camunda.org/api-references/rest/#!/execution/post-query
     *
     * @param \org\camunda\php\sdk\entity\request\ExecutionRequest $request Filter parameters
     * @param bool                                                 $isPostRequest Switch for POST/GET request
     * @throws \Exception
     * @return Execution[] List of all executions
     */
    function getExecutions(ExecutionRequest $request, $isPostRequest = false)
    {
        $this->setRequestUrl('/execution/');
        $this->setRequestObject($request);
        if ($isPostRequest == true) {
            $this->setRequestMethod('POST');
        }
        return Execution::castList($this->execute());
    }

    /**
     * Requests the amount of executions
     *
     * @link http://docs.camunda.org/api-references/rest/#!/execution/get-query-count
     * @link http://docs.camunda.org/api-references/rest/#!/execution/post-query-count
     *
     * @param \org\camunda\php\sdk\entity\request\ExecutionRequest $request Filter parameters
     * @param bool                                                 $isPostRequest Switch for POST/GET request
     * @throws \Exception
     * @return int count of the executions
     */
    function getCount(ExecutionRequest $request, $isPostRequest = false)
    {
        $this->setRequestUrl('/execution/count/');
        $this->setRequestObject($request);
        if ($isPostRequest == true) {
            $this->setRequestMethod('POST');
        }
        return $this->execute()->count;
    }

    /**
     * Requests a single execution variable
     *
     * @link http://docs.camunda.org/api-references/rest/#!/execution/get-local-variable
     *
     * @param string $id ID of the execution which contains the requested variable
     * @param string $variableId ID of the requested variable
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\Variable $this Requested variable
     */
    function getExecutionVariable($id, $variableId)
    {
        $this->setRequestUrl('/execution/' . $id . '/localVariables/' . $variableId);
        $this->setRequestObject(null);
        return Variable::cast($this->execute());
    }

    /**
     * Sets a variable in the context of a given execution.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/execution/put-local-variable
     *
     * @param string          $id The id of the execution to set the variable for.
     * @param string          $variableId The name of the variable to set.
     * @param VariableRequest $request request body
     * @throws \Exception
     */
    function putExecutionVariable($id, $variableId, VariableRequest $request)
    {
        $this->setRequestUrl('/execution/' . $id . '/localVariables/' . $variableId);
        $this->setRequestObject($request);
        $this->setRequestMethod('PUT');
        $this->execute();
    }

    /**
     * Removes a variable in the context of a given execution
     *
     * @link http://docs.camunda.org/api-references/rest/#!/execution/delete-local-variable
     *
     * @param string $id Execution ID
     * @param string $variableId Variable ID
     * @throws \Exception
     */
    function deleteExecutionVariable($id, $variableId)
    {
        $this->setRequestUrl('/execution/' . $id . '/localVariables/' . $variableId);
        $this->setRequestObject(null);
        $this->setRequestMethod('DELETE');
        $this->execute();
    }

    /**
     * Retrieves all variables of a given execution
     *
     * @link http://docs.camunda.org/api-references/rest/#!/execution/get-local-variables
     *
     * @param string $id Execution ID
     * @throws \Exception
     * @return Variable[] List of variables
     */
    function getExecutionVariables($id)
    {
        $this->setRequestUrl('/execution/' . $id . '/localVariables');
        $this->setRequestObject(null);
        return Variable::castMap($this->execute());
    }

    /**
     * Updates or deletes the variables in the context of an execution.
     * Updates precede deletes. So if a variable is updated AND deleted,
     * the deletion overrides the update.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/execution/post-local-variables
     *
     * @param string          $id execution ID
     * @param VariableRequest $request request body with modifications and/or deletions
     * @throws \Exception
     */
    function updateOrDeleteExecutionVariables($id, VariableRequest $request)
    {
        $this->setRequestUrl('/execution/' . $id . '/localVariables');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        $this->execute();
    }

    /**
     * Signals a single execution. Can for example be used to explicitly
     * skip user tasks or signal asynchronous continuations.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/execution/post-signal
     *
     * @param string $id id of the execution
     * @throws \Exception
     */
    function triggerExecution($id)
    {
        $this->setRequestUrl('/execution/' . $id . '/signal');
        $this->setRequestMethod('POST');
        $this->setRequestObject(null);
        $this->execute();
    }

    /**
     * Get a message event subscription for a specific execution and a message name.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/execution/get-message-subscription
     *
     * @param string $id Execution ID
     * @param string $messageName The name of the message that the subscription corresponds to.
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\MessageSubscription $this requested MessageSubscription
     */
    function getMessageEventSubscription($id, $messageName)
    {
        $this->setRequestUrl('/execution/' . $id . '/messageSubscriptions/' . $messageName);
        $this->setRequestObject(null);
        return MessageSubscription::cast($this->execute());
    }

    /**
     * Deliver a message to a specific execution to trigger an existing message
     * event subscription. Inject process variables as the message's payload.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/execution/post-message
     *
     * @param string                     $id The id of the execution to submit the message to.
     * @param string                     $messageName The name of the message that the addressed subscription
     *     corresponds to.
     * @param MessageSubscriptionRequest $request request body
     * @throws \Exception
     */
    function triggerMessageSubscription($id, $messageName, MessageSubscriptionRequest $request)
    {
        $this->setRequestUrl('/execution/' . $id . '/messageSubscriptions/' . $messageName . '/trigger');
        $this->setRequestMethod('POST');
        $this->setRequestObject($request);
        $this->execute();
    }
}