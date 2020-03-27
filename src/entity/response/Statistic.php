<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class Statistic extends CastHelper
{
    protected $id;
    protected $instances;
    protected $failedJobs;
    protected $definition;
    protected $incidents;

    /**
     * @param mixed $definition
     */
    function setDefinition($definition)
    {
        $this->definition = $definition;
    }

    /**
     * @return mixed
     */
    function getDefinition()
    {
        return $this->definition;
    }

    /**
     * @param mixed $failedJobs
     */
    function setFailedJobs($failedJobs)
    {
        $this->failedJobs = $failedJobs;
    }

    /**
     * @return mixed
     */
    function getFailedJobs()
    {
        return $this->failedJobs;
    }

    /**
     * @param mixed $id
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $incidents
     */
    function setIncidents($incidents)
    {
        $this->incidents = $incidents;
    }

    /**
     * @return mixed
     */
    function getIncidents()
    {
        return $this->incidents;
    }

    /**
     * @param mixed $instances
     */
    function setInstances($instances)
    {
        $this->instances = $instances;
    }

    /**
     * @return mixed
     */
    function getInstances()
    {
        return $this->instances;
    }
}