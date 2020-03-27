<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class HistoricActivityStatistic extends CastHelper
{
    protected $id;
    protected $instances;
    protected $canceled;
    protected $finished;
    protected $completeScope;

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

    /**
     * @param mixed $canceled
     * @return $this
     */
    function setCanceled($canceled)
    {
        $this->canceled = $canceled;
        return $this;
    }

    /**
     * @return mixed
     */
    function getCanceled()
    {
        return $this->canceled;
    }

    /**
     * @param mixed $finished
     * @return $this
     */
    function setFinished($finished)
    {
        $this->finished = $finished;
        return $this;
    }

    /**
     * @return mixed
     */
    function getFinished()
    {
        return $this->finished;
    }

    /**
     * @param mixed $completeScope
     * @return $this
     */
    function setCompleteScope($completeScope)
    {
        $this->completeScope = $completeScope;
        return $this;
    }

    /**
     * @return mixed
     */
    function getCompleteScope()
    {
        return $this->completeScope;
    }
}