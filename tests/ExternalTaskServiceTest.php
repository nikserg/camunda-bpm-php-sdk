<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\ExecutionRequest;
use org\camunda\php\sdk\entity\request\VariableRequest;
use org\camunda\php\sdk\service\ExecutionService;
use org\camunda\php\sdk\service\ExternalTaskService;

include("../vendor/autoload.php");

class ExternalTaskServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ExternalTaskService
     */
    protected static $ets;

    public static function setUpBeforeClass(): void
    {
        self::$ets = new ExternalTaskService('http://localhost:8080/engine-rest');
    }

    function testGetExternalTask()
    {
        $this->markTestIncomplete('Implement the test');
    }
}
