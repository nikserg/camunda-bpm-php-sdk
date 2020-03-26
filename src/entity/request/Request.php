<?php


namespace org\camunda\php\sdk\entity\request;


abstract class Request
{
    public function iterate()
    {
        $tmp = [];
        foreach ($this AS $index => $value) {
            $tmp[$index] = $value;
        }
        return $tmp;
    }

    public function iterateFilled()
    {
        $tmp = [];
        foreach ($this AS $index => $value) {
            if (!empty($value)) {
                $tmp[$index] = $value;
            }
        }
        return $tmp;
    }
}