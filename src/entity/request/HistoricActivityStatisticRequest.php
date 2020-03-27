<?php

namespace org\camunda\php\sdk\entity\request;

class HistoricActivityStatisticRequest extends Request
{
    protected $canceled;
    protected $finished;
    protected $completeScope;
    protected $sortBy;
    protected $sortOrder;

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

    /**
     * @param mixed $sortBy
     * @return $this
     */
    function setSortBy($sortBy)
    {
        $this->sortBy = $sortBy;
        return $this;
    }

    /**
     * @return mixed
     */
    function getSortBy()
    {
        return $this->sortBy;
    }

    /**
     * @param mixed $sortOrder
     * @return $this
     */
    function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @return mixed
     */
    function getSortOrder()
    {
        return $this->sortOrder;
    }
}