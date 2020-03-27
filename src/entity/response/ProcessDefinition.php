<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class ProcessDefinition extends CastHelper
{
    protected $id;
    protected $key;
    protected $category;
    protected $description;
    protected $name;
    protected $version;
    protected $resource;
    protected $deploymentId;
    protected $diagram;
    protected $suspended;

    /**
     * @param mixed $category
     */
    function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $deploymentId
     */
    function setDeploymentId($deploymentId)
    {
        $this->deploymentId = $deploymentId;
    }

    /**
     * @return mixed
     */
    function getDeploymentId()
    {
        return $this->deploymentId;
    }

    /**
     * @param mixed $description
     */
    function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $diagram
     */
    function setDiagram($diagram)
    {
        $this->diagram = $diagram;
    }

    /**
     * @return mixed
     */
    function getDiagram()
    {
        return $this->diagram;
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
     * @param mixed $key
     */
    function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $name
     */
    function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $resource
     */
    function setResource($resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    function getResource()
    {
        return $this->resource;
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

    /**
     * @param mixed $version
     */
    function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return mixed
     */
    function getVersion()
    {
        return $this->version;
    }
}