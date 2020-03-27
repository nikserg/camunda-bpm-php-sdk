<?php

namespace org\camunda\php\sdk\helper;

class CastHelper
{
    /**
     * Transfer props from standard object to a specific one
     *
     * @param \stdClass $object
     * @return $this
     */
    function hydrate(\stdClass $object)
    {
        foreach ($object as $index => $value) {
            $this->$index = $value;
        }
        return $this;
    }

    /**
     * Cast standard object into a specific one
     *
     * @param \stdClass $object
     * @return static
     */
    static function cast(\stdClass $object)
    {
        $instance = new static();
        foreach ($object as $index => $value) {
            $instance->$index = $value;
        }
        return $instance;
    }

    /**
     * Cast standard object into a specific one
     *
     * @param array $list
     * @return static[]
     */
    static function castList(array $list)
    {
        $instances = [];
        foreach ($list as $index => $data) {
            $instances[$index] = static::cast($data);
        }
        return $instances;
    }

    /**
     * Cast standard object into a specific one
     *
     * @param \stdClass $list
     * @return static[] - a <string:static> map of objects
     */
    static function castMap(\stdClass $list)
    {
        $instances = [];
        foreach ($list as $index => $data) {
            $instances[$index] = static::cast($data);
        }
        return $instances;
    }

    /**
     * List of all fields
     *
     * @return array
     */
    function fields()
    {
        $list = [];
        foreach ($this as $key => $value) {
            $list[$key] = $value;
        }
        return $list;
    }

    /**
     * List of all non-empty fields
     *
     * @return array
     */
    function fieldsFilled()
    {
        $list = [];
        foreach ($this as $index => $value) {
            if (!empty($value)) {
                $list[$index] = $value;
            }
        }
        return $list;
    }

    /**
     * Serialize all non-empty fields recursively to a hash map
     *
     * @return array
     */
    function serializeToHashMap()
    {
        $data = [];
        foreach ($this->fieldsFilled() as $prop => $value) {
            if (is_array($value)) {
                foreach ($value as $valueIndex => $valueData) {
                    if ($valueData instanceof CastHelper) {
                        $valueData = $valueData->serializeToHashMap();
                    }
                    $value[$valueIndex] = $valueData;
                }
            }
            if ($value instanceof CastHelper) {
                $value = $value->serializeToHashMap();
            }
            $data[$prop] = $value;
        }
        return $data;
    }
}