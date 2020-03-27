<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class ProcessInstance extends CastHelper
{
    protected $id;
    protected $definitionId;
    protected $businessKey;
    protected $ended;
    protected $suspended;
    protected $links;

    /**
     * @param mixed $businessKey
     */
    function setBusinessKey($businessKey)
    {
        $this->businessKey = $businessKey;
    }

    /**
     * @return mixed
     */
    function getBusinessKey()
    {
        return $this->businessKey;
    }

    /**
     * @param mixed $definitionId
     */
    function setDefinitionId($definitionId)
    {
        $this->definitionId = $definitionId;
    }

    /**
     * @return mixed
     */
    function getDefinitionId()
    {
        return $this->definitionId;
    }

    /**
     * @param mixed $ended
     */
    function setEnded($ended)
    {
        $this->ended = $ended;
    }

    /**
     * @return mixed
     */
    function getEnded()
    {
        return $this->ended;
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
     * @param mixed $links
     */
    function setLinks($links)
    {
        $this->links = $links;
    }

    /**
     * @return mixed
     */
    function getLinks()
    {
        return $this->links;
    }

    /**
     * @param mixed $suspended
     */
    function setSuspended($suspended)
    {
        $this->suspended = $suspended;
    }

    /**
     * @return mixed
     */
    function getSuspended()
    {
        return $this->suspended;
    }
}