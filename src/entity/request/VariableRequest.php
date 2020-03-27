<?php

namespace org\camunda\php\sdk\entity\request;

class VariableRequest extends Request
{
    protected $value;
    protected $type;
    protected $modifications;
    protected $deletions;

    /**
     * @param mixed $deletions
     * @return $this
     */
    function setDeletions($deletions)
    {
        $this->deletions = $deletions;
        return $this;
    }

    /**
     * @return mixed
     */
    function getDeletions()
    {
        return $this->deletions;
    }

    /**
     * @param mixed $modifications
     * @return $this
     */
    function setModifications($modifications)
    {
        $this->modifications = $modifications;
        return $this;
    }

    /**
     * @return mixed
     */
    function getModifications()
    {
        return $this->modifications;
    }

    /**
     * @param mixed $type
     * @return $this
     */
    function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $value
     * @return VariableRequest
     */
    function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    function getValue()
    {
        return $this->value;
    }
}