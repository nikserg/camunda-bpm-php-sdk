<?php

namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\request\ExternalTaskRequest;
use org\camunda\php\sdk\entity\response\ExternalTask;

class ExternalTaskService extends RequestService
{
    /**
     * Retrieves an external task by id, corresponding to the
     * ExternalTask interface in the engine.
     *
     * @param String $id external task id
     * @return \org\camunda\php\sdk\entity\response\ExternalTask
     * @throws \Exception
     */
    public function getExternalTask($id)
    {
        $this->setRequestUrl('/external-task/' . $id);
        $this->setRequestObject(null);
        return ExternalTask::cast($this->execute());
    }

    /**
     * Fetches and locks a specific number of external tasks for execution by
     * a worker. Query can be restricted to specific task topics and for each
     * task topic an individual lock time can be provided.
     *
     * @param ExternalTaskRequest $request
     * @return ExternalTask[]
     * @throws \Exception
     */
    public function fetchAndLockExternalTasks(ExternalTaskRequest $request)
    {
        $this->setRequestUrl('/external-task/' . 'fetchAndLock');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        return ExternalTask::castList($this->execute());
    }

    /**
     * Completes a task and updates process variables.
     *
     * @param                     $id
     * @param ExternalTaskRequest $request
     * @throws \Exception
     */
    public function handleBPMNError($id, ExternalTaskRequest $request)
    {
        $this->setRequestUrl('/external-task/' . $id . '/bpmnError');
        $this->setRequestMethod('POST');
        $this->setRequestObject($request);
        $this->execute();
    }

    /**
     * Completes an external task by id and updates process variables.
     *
     * @param                     $id
     * @param ExternalTaskRequest $request
     * @throws \Exception
     */
    public function completeExternalTask($id, ExternalTaskRequest $request)
    {
        $this->setRequestUrl('/external-task/' . $id . '/complete');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        $this->execute();
    }

    /**
     * Reports a failure to execute an external task by id. A number of
     * retries and a timeout until the task can be retried can be specified.
     * If retries are set to 0, an incident for this task is created.
     *
     * @param                     $id
     * @param ExternalTaskRequest $request
     * @throws \Exception
     */
    public function externalTaskFailed($id, ExternalTaskRequest $request)
    {
        $this->setRequestUrl('/external-task/' . $id . '/failure');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        $this->execute();
    }
}