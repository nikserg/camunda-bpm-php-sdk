<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class ResourceOption extends CastHelper
{
    protected $links;

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
}