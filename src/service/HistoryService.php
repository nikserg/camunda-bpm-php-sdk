<?php

namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\request\HistoricActivityInstanceRequest;
use org\camunda\php\sdk\entity\request\HistoricActivityStatisticRequest;
use org\camunda\php\sdk\entity\request\HistoricProcessInstanceRequest;
use org\camunda\php\sdk\entity\request\HistoricVariableInstanceRequest;
use org\camunda\php\sdk\entity\response\HistoricActivityInstance;
use org\camunda\php\sdk\entity\response\HistoricActivityStatistic;
use org\camunda\php\sdk\entity\response\HistoricProcessInstance;
use org\camunda\php\sdk\entity\response\HistoricVariableInstance;

class HistoryService extends RequestService
{
    /**
     * Query for historic activity instances that fulfill the given parameters.
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#history-get-activity-instances-historic
     *
     * @param HistoricActivityInstanceRequest $request
     * @throws \Exception
     * @return HistoricActivityInstance[]
     */
    function getActivityInstances(HistoricActivityInstanceRequest $request)
    {
        $this->setRequestUrl('/history/activity-instance');
        $this->setRequestObject($request);
        return HistoricActivityInstance::castList($this->execute());
    }

    /**
     * Query for the number of historic activity instances that fulfill the given parameters.
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#history-get-activity-instances-count
     *
     * @param HistoricActivityInstanceRequest $request
     * @throws \Exception
     * @return Integer count
     */
    function getActivityInstancesCount(HistoricActivityInstanceRequest $request)
    {
        $this->setRequestUrl('/history/activity-instance/count');
        $this->setRequestObject($request);
        return $this->execute()->count;
    }

    /**
     * Query for historic process instances that fulfill the given parameters.
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#history-get-process-instances
     * @link http://docs.camunda.org/latest/api-references/rest/#history-get-process-instances-post
     *
     * @param HistoricProcessInstanceRequest $request
     * @param bool                           $isPostRequest
     * @throws \Exception
     * @return HistoricProcessInstance[]
     */
    function getProcessInstances(HistoricProcessInstanceRequest $request, $isPostRequest = false)
    {
        $this->setRequestUrl('/history/process-instance');
        $this->setRequestObject($request);
        if ($isPostRequest == true) {
            $this->setRequestMethod('POST');
        }
        return HistoricProcessInstance::castList($this->execute());
    }

    /**
     * Query for the number of historic process instances that fulfill the given parameters.
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#history-get-process-instances-count
     * @link http://docs.camunda.org/latest/api-references/rest/#history-get-process-instances-count-post
     *
     * @param HistoricProcessInstanceRequest $request
     * @param bool                           $isPostRequest
     * @throws \Exception
     * @return mixed
     */
    function getProcessInstancesCount(HistoricProcessInstanceRequest $request, $isPostRequest = false)
    {
        $this->setRequestUrl('/history/process-instance/count');
        $this->setRequestObject($request);
        if ($isPostRequest == true) {
            $this->setRequestMethod('POST');
        }
        return $this->execute()->count;
    }

    /**
     * Query for historic variable instances that fulfill the given parameters.
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#history-get-variable-instances
     * @link http://docs.camunda.org/latest/api-references/rest/#history-get-variable-instances-post
     *
     * @param HistoricVariableInstanceRequest $request
     * @param bool                            $isPostRequest
     * @throws \Exception
     * @return HistoricVariableInstance[]
     */
    function getVariableInstances(HistoricVariableInstanceRequest $request, $isPostRequest = false)
    {
        $this->setRequestUrl('/history/variable-instance');
        $this->setRequestObject($request);
        if ($isPostRequest == true) {
            $this->setRequestMethod('POST');
        }
        return HistoricVariableInstance::castList($this->execute());
    }

    /**
     * Query for the number of historic variable instances that fulfill the given parameters.
     *
     * @link http://docs.camunda.org/latest/api-references/rest/#history-get-variable-instances-count
     * @link http://docs.camunda.org/latest/api-references/rest/#history-get-variable-instances-count-post
     *
     * @param HistoricVariableInstanceRequest $request
     * @param bool                            $isPostRequest
     * @throws \Exception
     * @return mixed
     */
    function getVariableInstancesCount(HistoricVariableInstanceRequest $request, $isPostRequest = false)
    {
        $this->setRequestUrl('/history/variable-instance/count');
        $this->setRequestObject($request);
        if ($isPostRequest == true) {
            $this->setRequestMethod('POST');
        }
        return $this->execute()->count;
    }

    /**
     * Get a list of historic activity instances statistics of the given process definition id
     *
     * @link http://docs.camunda.org/api-references/rest/#history-get-historic-activity-statistics
     *
     * @param string                           $id process definition id
     * @param HistoricActivityStatisticRequest $request parameters
     * @throws \Exception
     * @return HistoricActivityStatistic[] list of historic activity instance statistics
     */
    function getHistoricActivityStatistic($id, HistoricActivityStatisticRequest $request)
    {
        $this->setRequestUrl('/history/process-definition/' . $id . '/statistics');
        $this->setRequestObject($request);
        return HistoricActivityStatistic::castList($this->execute());
    }
}