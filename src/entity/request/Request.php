<?php


namespace org\camunda\php\sdk\entity\request;


class Request
{
    public function iterate()
    {
        $tmp = [];
        foreach ($this AS $index => $value) {
            $tmp[$index] = $value;
        }
        return $tmp;
    }
}