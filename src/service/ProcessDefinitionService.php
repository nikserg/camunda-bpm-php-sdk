<?php

namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\request\ProcessDefinitionRequest;
use org\camunda\php\sdk\entity\request\StatisticRequest;
use org\camunda\php\sdk\entity\response\Form;
use org\camunda\php\sdk\entity\response\ProcessDefinition;
use org\camunda\php\sdk\entity\response\ProcessInstance;
use org\camunda\php\sdk\entity\response\Statistic;

class ProcessDefinitionService extends RequestService
{
    /**
     * Retrieves a single process definition according to the
     * ProcessDefinition interface in the engine.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-definition/get
     *
     * @param string $id ID of the requested definition
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\ProcessDefinition $this Requested definition
     */
    function getDefinition($id)
    {
        $this->setRequestUrl('/process-definition/' . $id);
        $this->setRequestObject(null);
        return ProcessDefinition::cast($this->execute());
    }

    /**
     * Retrieves a list of process definitions
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-definition/get-query
     *
     * @param ProcessDefinitionRequest $request filter parameters
     * @throws \Exception
     * @return ProcessDefinition[] list of retrieved process definitions
     */
    function getDefinitions(ProcessDefinitionRequest $request)
    {
        $this->setRequestUrl('/process-definition/');
        $this->setRequestObject($request);
        return ProcessDefinition::castList($this->execute());
    }

    /**
     * Request the number of process definitions that fulfill the query criteria.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-definition/get-query-count
     *
     * @param ProcessDefinitionRequest $request filtered parameters
     * @throws \Exception
     * @return int Amount of jobs
     */
    function getCount(ProcessDefinitionRequest $request)
    {
        $this->setRequestUrl('/process-definition/count');
        $this->setRequestObject($request);
        return $this->execute()->count;
    }

    /**
     * Retrieves the BPMN 2.0 XML of this process definition.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-definition/get-xml
     *
     * @param string $id process definition ID
     * @throws \Exception
     * @return mixed
     */
    function getBpmn20Xml($id)
    {
        $this->setRequestUrl('/process-definition/' . $id . '/xml');
        $this->setRequestObject(null);
        return $this->execute();
    }

    /**
     * Instantiates a given process definition.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-definition/post-start-process-instance
     *
     * @param string                   $id process definition ID
     * @param ProcessDefinitionRequest $request variables
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\ProcessInstance $this started process instance
     */
    function startInstance($id, ProcessDefinitionRequest $request)
    {
        $this->setRequestUrl('/process-definition/' . $id . '/start');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        return ProcessInstance::cast($this->execute());
    }

    /**
     * Instantiates a given process definition.
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-definition/post-start-process-instance
     *
     * @param string                   $key process definition key
     * @param ProcessDefinitionRequest $request variables
     * @throws \Exception
     * @return \org\camunda\php\sdk\entity\response\ProcessInstance $this started process instance
     */
    function startInstanceByKey($key, ProcessDefinitionRequest $request)
    {
        $this->setRequestUrl('/process-definition/key/' . $key . '/start');
        $this->setRequestObject($request);
        $this->setRequestMethod('POST');
        return ProcessInstance::cast($this->execute());
    }

    /**
     * Retrieves process instances statistics
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-definition/get-statistics
     *
     * @param StatisticRequest $request
     * @throws \Exception
     * @return Statistic[] list of process instance statistics
     */
    function getProcessInstanceStatistic(StatisticRequest $request)
    {
        $this->setRequestUrl('/process-definition/statistics');
        $this->setRequestObject($request);
        return Statistic::castList($this->execute());
    }

    /**
     * Get a list of activity instances statistics of the given process definition id
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-definition/get-activity-statistics
     *
     * @param string           $id process definition id
     * @param StatisticRequest $request parameters
     * @throws \Exception
     * @return Statistic[] list of activity instance statistics
     */
    function getActivityInstanceStatistic($id, StatisticRequest $request)
    {
        $this->setRequestUrl('/process-definition/' . $id . '/statistics');
        $this->setRequestObject($request);
        return Statistic::castList($this->execute());
    }

    /**
     * get form key of the start event
     *
     * @link http://docs.camunda.org/api-references/rest/#!/process-definition/get-start-form-key
     * (Prepared for 7.1.0 - context Path will come ;) )
     *
     * @param string $id process definition ID
     * @throws \Exception
     * @return Form start form key
     */
    function getStartFormKey($id)
    {
        $this->setRequestUrl('/process-definition/' . $id . '/startForm');
        $this->setRequestObject(null);
        return Form::cast($this->execute());
    }
}