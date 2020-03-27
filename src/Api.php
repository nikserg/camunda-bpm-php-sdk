<?php

namespace org\camunda\php\sdk;

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
}