<?php

namespace org\camunda\php\sdk\service;

use org\camunda\php\sdk\entity\response\Engine;

class ProcessEngineService extends RequestService
{
    /**
     * Retrieves a list of all available engines
     *
     * @link http://docs.camunda.org/api-references/rest/#!/engine/get-names
     *
     * @throws \Exception
     * @return Engine[]
     */
    function getEngineNames()
    {
        $this->setRequestUrl('/engine');
        $this->setRequestMethod("GET");
        $this->setRequestObject(null);
        return Engine::castList($this->execute());
    }
}