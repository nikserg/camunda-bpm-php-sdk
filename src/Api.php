<?php

namespace org\camunda\php\sdk;

use Exception;
use org\camunda\php\sdk\entity\request\VariableRequest;
use org\camunda\php\sdk\helper\DiagramHelper;
use org\camunda\php\sdk\service\AuthorizationService;
use org\camunda\php\sdk\service\ExecutionService;
use org\camunda\php\sdk\service\GroupService;
use org\camunda\php\sdk\service\HistoryService;
use org\camunda\php\sdk\service\IdentityService;
use org\camunda\php\sdk\service\JobService;
use org\camunda\php\sdk\service\MessageService;
use org\camunda\php\sdk\service\ProcessDefinitionService;
use org\camunda\php\sdk\service\ProcessEngineService;
use org\camunda\php\sdk\service\ProcessInstanceService;
use org\camunda\php\sdk\service\TaskService;
use org\camunda\php\sdk\service\UserService;
use org\camunda\php\sdk\service\VariableInstanceService;

class Api
{
    public $diagram;
    public $execution;
    public $group;
    public $job;
    public $message;
    public $processDefinition;
    public $processEngine;
    public $processInstance;
    public $task;
    public $user;
    public $variableInstance;
    public $authorization;
    public $history;
    public $identity;
    protected $restApiUrl;

    function __construct($restApiUrl)
    {
        $this->restApiUrl = $restApiUrl;
        $this->diagram = new DiagramHelper();
        $this->authorization = new AuthorizationService($this->restApiUrl);
        $this->execution = new ExecutionService($this->restApiUrl);
        $this->group = new GroupService($this->restApiUrl);
        $this->history = new HistoryService($this->restApiUrl);
        $this->identity = new IdentityService($this->restApiUrl);
        $this->job = new JobService($this->restApiUrl);
        $this->message = new MessageService($this->restApiUrl);
        $this->processDefinition = new ProcessDefinitionService($this->restApiUrl);
        $this->processEngine = new ProcessEngineService($this->restApiUrl);
        $this->processInstance = new ProcessInstanceService($this->restApiUrl);
        $this->task = new TaskService($this->restApiUrl);
        $this->user = new UserService($this->restApiUrl);
        $this->variableInstance = new VariableInstanceService($this->restApiUrl);
    }

    /**
     * Конвертирует значение PHP в переменную процесса
     *
     * @param $value
     * @return VariableRequest
     * @throws Exception
     */
    function convertValue($value)
    {
        static $typeMap = [
            "boolean" => "Boolean",
            "integer" => "Integer",
            "float"   => "Double",
            "string"  => "String",
            "NULL"    => "Null",
        ];
        $type = gettype($value);
        if (empty($typeMap[$type])) {
            throw new Exception("Process variable binding for type `$type` not supported");
        }
        return (new VariableRequest())->setType($typeMap[$type])->setValue($value);
    }

    /**
     * Convert PHP values to a VariableRequest array
     *
     * @param $values
     * @return VariableRequest[]
     * @throws Exception
     */
    function convertValues(array $values)
    {
        $variables = [];
        foreach ($values as $name => $datum) {
            $variables[$name] = $this->convertValue($datum);
        }
        return $variables;
    }
}