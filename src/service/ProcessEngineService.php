<?php


namespace org\camunda\php\sdk\service;


use Exception;

class ProcessEngineService extends RequestService
{

    /**
     * Retrieves a list of all available engines
     *
     * @link http://docs.camunda.org/api-references/rest/#!/engine/get-names
     *
     * @throws \Exception
     * @return object List of engines
     */
    public function getEngineNames()
    {
        $this->setRequestUrl('/engine');
        $this->setRequestMethod("GET");
        $this->setRequestObject(null);

        try {
            $prepare = $this->execute();
            $response = [];
            foreach ($prepare AS $index => $data) {
                $response['engine_' . $index] = $data;
            }
            return (object)$response;
        } catch (Exception $e) {
            throw $e;
        }
    }
}