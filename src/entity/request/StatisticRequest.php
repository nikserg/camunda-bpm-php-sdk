<?php

namespace org\camunda\php\sdk\entity\request;

class StatisticRequest extends Request
{
    protected $failedJobs;
    protected $incidents;
    protected $incidentsForType;

    /**
     * @param mixed $failedJobs
     * @return $this
     */
    function setFailedJobs($failedJobs)
    {
        $this->failedJobs = $failedJobs;
        return $this;
    }

    /**
     * @return mixed
     */
    function getFailedJobs()
    {
        return $this->failedJobs;
    }

    /**
     * @param mixed $incidents
     * @return $this
     */
    function setIncidents($incidents)
    {
        $this->incidents = $incidents;
        return $this;
    }

    /**
     * @return mixed
     */
    function getIncidents()
    {
        return $this->incidents;
    }

    /**
     * @param mixed $incidentsForType
     * @return $this
     */
    function setIncidentsForType($incidentsForType)
    {
        $this->incidentsForType = $incidentsForType;
        return $this;
    }

    /**
     * @return mixed
     */
    function getIncidentsForType()
    {
        return $this->incidentsForType;
    }
}