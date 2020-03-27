<?php

namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\request\JobRequest;
use org\camunda\php\sdk\entity\response\Job;

class JobService extends RequestService
{
    /**
     * Retrieves a job with given id.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/job/get
     *
     * @param string $id Job ID
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\Job $this requested job
     */
    function getJob($id)
    {
        $this->setRequestUrl('/job/' . $id);
        $this->setRequestObject(null);
        return Job::cast($this->execute());
    }

    /**
     * Retrieves a list of jobs
     *
     * @link http://docs.camunda.org/api-references/rest/#!/job/get-query
     * @link http://docs.camunda.org/api-references/rest/#!/job/post-query
     *
     * @param JobRequest $request Filter parameters
     * @param bool       $isPostRequest switch for GET/POST request
     * @throws \Exception
     * @return Job[] List of available jobs
     */
    function getJobs(JobRequest $request, $isPostRequest = false)
    {
        $this->setRequestUrl('/job');
        $this->setRequestObject($request);
        if ($isPostRequest == true) {
            $this->setRequestMethod('POST');
        }
        return Job::castList($this->execute());
    }

    /**
     * Retrieves the amount of jobs
     *
     * @link http://docs.camunda.org/api-references/rest/#!/job/get-query-count
     * @link http://docs.camunda.org/api-references/rest/#!/job/post-query-count
     *
     * @param JobRequest $request Filter parameters
     * @param bool       $isPostRequest switch for GET/POST request
     * @throws \Exception
     * @return int Amount of jobs
     */
    function getCount(JobRequest $request, $isPostRequest = false)
    {
        $this->setRequestUrl('/job/count');
        $this->setRequestObject($request);
        if ($isPostRequest == true) {
            $this->setRequestMethod('POST');
        }
        return $this->execute()->count;
    }

    /**
     * Sets the retries of the job to a given amount
     *
     * @link http://docs.camunda.org/api-references/rest/#!/job/put-set-job-retries
     *
     * @param string     $id job ID
     * @param JobRequest $request amount of retries
     * @throws \Exception
     */
    function setRetries($id, JobRequest $request)
    {
        $this->setRequestUrl('/job/' . $id . '/retries');
        $this->setRequestObject($request);
        $this->setRequestMethod('PUT');
        $this->execute();
    }

    /**
     * executes the given job
     *
     * @link http://docs.camunda.org/api-references/rest/#!/job/post-execute-job
     *
     * @param string $id job ID
     * @throws \Exception
     */
    function executeJob($id)
    {
        $this->setRequestUrl('/job/' . $id . '/execute');
        $this->setRequestObject(null);
        $this->setRequestMethod('POST');
        $this->execute();
    }

    /**
     * Retrieves the corresponding exception stacktrace to the passed job id.
     * Output will be in plain/text
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#job-get-exception-stacktrace
     *
     * @param string $id job ID
     * @throws \Exception
     * @return String
     */
    function getExceptionStacktrace($id)
    {
        $this->setRequestUrl('job/' . $id . '/stacktrace');
        $this->setRequestObject(null);
        return $this->execute();
    }

    /**
     * Updates the due date of a job
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#job-set-job-due-date
     *
     * @param string     $id job ID
     * @param JobRequest $request
     * @throws \Exception
     */
    function setDueDate($id, JobRequest $request)
    {
        $this->setRequestUrl('/job/' . $id . '/duedate');
        $this->setRequestObject($request);
        $this->setRequestMethod('PUT');
        $this->execute();
    }
}