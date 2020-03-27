<?php

namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\request\IdentityLinksRequest;
use org\camunda\php\sdk\entity\request\TaskRequest;
use org\camunda\php\sdk\entity\response\Form;
use org\camunda\php\sdk\entity\response\IdentityLink;
use org\camunda\php\sdk\entity\response\Task;

class TaskService extends RequestService
{
    /**
     * Retrieves the task with the given ID
     *
     * @param string $id task id
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\Task $this requested task
     */
    function getTask($id)
    {
        $this->setRequestUrl('/task/' . $id);
        $this->setRequestObject(null);
        return Task::cast($this->execute());
    }

    /**
     * Retrieves a list of tasks within given context
     *
     * @link http://docs.camunda.org/api-references/rest/#!/task/get-query
     * @link http://docs.camunda.org/api-references/rest/#!/task/post-query
     *
     * @param TaskRequest $request filter parameters
     * @param bool        $isPostRequest switch for GET/POST request
     * @throws \Exception
     * @return Task[] list of all Tasks
     */
    function getTasks(TaskRequest $request, $isPostRequest = false)
    {
        $this->setRequestUrl('/task/');
        $this->setRequestObject($request);
        if ($isPostRequest == true) {
            $this->setRequestMethod('POST');
        }
        return Task::castList($this->execute());
    }

    /**
     * Retrieves the amount of tasks within given context
     *
     * @link http://docs.camunda.org/api-references/rest/#!/task/get-query-count
     * @link http://docs.camunda.org/api-references/rest/#!/task/post-query-count
     *
     * @param TaskRequest $request filter parameters
     * @param bool        $isPostRequest switch for GET/POST request
     * @throws \Exception
     * @return int Amount of tasks
     */
    function getCount(TaskRequest $request, $isPostRequest = false)
    {
        $this->setRequestUrl('/task/count/');
        $this->setRequestObject($request);
        if ($isPostRequest == true) {
            $this->setRequestMethod('POST');
        }
        return $this->execute()->count;
    }

    /**
     * Retrieves the form key of the given task
     *
     * @link http://docs.camunda.org/api-references/rest/#!/task/get-form-key
     *
     * @param string $id task ID
     * @throws \Exception
     * @return Form start form object
     */
    function getFormKey($id)
    {
        $this->setRequestUrl('/task/' . $id . '/form');
        $this->setRequestObject(null);
        return Form::cast($this->execute());
    }

    /**
     * Claims a task for a specific user
     *
     * @link http://docs.camunda.org/api-references/rest/#!/task/post-claim
     *
     * @param string                                          $id task id
     * @param \org\camunda\php\sdk\entity\request\TaskRequest $request
     * @throws \Exception
     */
    function claimTask($id, TaskRequest $request)
    {
        $this->setRequestUrl('/task/' . $id . '/claim');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        $this->execute();
    }

    /**
     * Removes claims from a task
     *
     * @link http://docs.camunda.org/api-references/rest/#!/task/post-unclaim
     *
     * @param string $id task id
     * @throws \Exception
     */
    function unclaimTask($id)
    {
        $this->setRequestUrl('/task/' . $id . '/unclaim');
        $this->setRequestMethod('POST');
        $this->setRequestObject(null);
        $this->execute();
    }

    /**
     * Completes a Task and updates process variables
     *
     * @link http://docs.camunda.org/api-references/rest/#!/task/post-complete
     *
     * @param string      $id task ID
     * @param TaskRequest $request variable properties
     * @throws \Exception
     */
    function completeTask($id, TaskRequest $request)
    {
        $this->setRequestUrl('/task/' . $id . '/complete');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        $this->execute();
    }

    /**
     * Resolves a task and update execution variables
     *
     * @link http://docs.camunda.org/api-references/rest/#!/task/post-resolve
     *
     * @param string      $id task ID
     * @param TaskRequest $request variable properties
     * @throws \Exception
     */
    function resolveTask($id, TaskRequest $request)
    {
        $this->setRequestUrl('/task/' . $id . '/resolve');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        $this->execute();
    }

    /**
     * Delegates a task to another user
     *
     * @link http://docs.camunda.org/api-references/rest/#!/task/post-delegate
     *
     * @param string      $id task ID
     * @param TaskRequest $request user properties
     * @throws \Exception
     */
    function delegateTask($id, TaskRequest $request)
    {
        $this->setRequestUrl('/task/' . $id . '/delegate');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        $this->execute();
    }

    /**
     * Change the assignee of a task to a specific user.
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#task-set-assignee
     *
     * @param string      $id Task ID
     * @param TaskRequest $request
     * @throws \Exception
     */
    function setAssignee($id, TaskRequest $request)
    {
        $this->setRequestUrl('/task/' . $id . '/assignee');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        $this->execute();
    }

    /**
     *  Gets the identity links for a task, which are the users and groups that are in some relation to it
     * (including assignee and owner).
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#task-get-identity-links
     *
     * @param string               $id task ID
     * @param IdentityLinksRequest $request
     * @throws \Exception
     * @return IdentityLink[] $this
     */
    function getIdentityLinks($id, IdentityLinksRequest $request)
    {
        $this->setRequestUrl('/task/' . $id . '/identity-links');
        $this->setRequestObject($request);
        return IdentityLink::castList($this->execute());
    }

    /**
     * Adds an identity link to a task. Can be used to link any user or group to a task and specify and relation.
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#task-add-identity-link
     *
     * @param string               $id task ID
     * @param IdentityLinksRequest $request
     * @throws \Exception
     */
    function addIdentityLink($id, IdentityLinksRequest $request)
    {
        $this->setRequestUrl('/task/' . $id . '/identity-links');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        $this->execute();
    }

    /**
     * Removes an identity link from a task.
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#task-delete-identity-link
     *
     * @param string               $id task ID
     * @param IdentityLinksRequest $request
     * @throws \Exception
     */
    function deleteIdentityLink($id, IdentityLinksRequest $request)
    {
        $this->setRequestUrl('/task/' . $id . '/identity-links/delete');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        $this->execute();
    }

    /**
     * Do a fast takeover of the task. So you don't need first to unclaim
     * a task before you can claim it
     *
     * @param string      $id task ID
     * @param TaskRequest $request user properties
     * @throws \Exception
     * @deprecated Use setAssignee() instead
     */
    function takeTask($id, TaskRequest $request)
    {
        $this->unclaimTask($id);
        $this->claimTask($id, $request);
    }
}