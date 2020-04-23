<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\HistoricActivityInstanceRequest;
use org\camunda\php\sdk\entity\request\HistoricActivityStatisticRequest;
use org\camunda\php\sdk\entity\request\HistoricProcessInstanceRequest;
use org\camunda\php\sdk\entity\request\HistoricVariableInstanceRequest;
use org\camunda\php\sdk\entity\request\ProcessDefinitionRequest;
use org\camunda\php\sdk\service\HistoryService;
use org\camunda\php\sdk\service\ProcessDefinitionService;

class HistoryServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var HistoryService
     */
    protected static $hs;
    /**
     * @var ProcessDefinitionService
     */
    protected static $pds;

    public static function setUpBeforeClass(): void
    {
        self::$hs = new HistoryService($_ENV['camunda_url']);
        self::$pds = new ProcessDefinitionService($_ENV['camunda_url']);
    }

    /**
     * @throws \Exception
     */
    function testGetActivityInstances()
    {
        $activityInstances = self::$hs->getActivityInstances(new HistoricActivityInstanceRequest());
        $this->assertEmpty($activityInstances[0]->getAssignee());
    }

    /**
     * @throws \Exception
     */
    function testGetActivityInstancesCount()
    {
        $activityInstancesCount = self::$hs->getActivityInstancesCount(new HistoricActivityInstanceRequest());
        $this->assertNotEquals(0, $activityInstancesCount);
        $this->assertNotNull($activityInstancesCount);
        $this->assertNotEmpty($activityInstancesCount);
    }

    /**
     * @throws \Exception
     */
    function testGetProcessInstances()
    {
        $processInstances = self::$hs->getProcessInstances(new HistoricProcessInstanceRequest());
        $this->assertEmpty($processInstances[0]->getStartUserId());
    }

    /**
     * @throws \Exception
     */
    function testGetProcessInstancesCount()
    {
        $processInstancesCount = self::$hs->getProcessInstancesCount(new HistoricProcessInstanceRequest());
        $this->assertNotEquals(0, $processInstancesCount);
        $this->assertNotNull($processInstancesCount);
        $this->assertNotEmpty($processInstancesCount);
    }

    /**
     * @throws \Exception
     */
    function testGetVariableInstances()
    {
        $variableInstance = self::$hs->getVariableInstances(new HistoricVariableInstanceRequest());
        $this->assertNotEmpty($variableInstance[0]->getType());
        $this->assertEquals('String', $variableInstance[0]->getType());
    }

    /**
     * @throws \Exception
     */
    function testGetVariableInstancesCount()
    {
        $variableInstanceCount = self::$hs->getVariableInstances(new HistoricVariableInstanceRequest());
        $this->assertNotEquals(0, $variableInstanceCount);
        $this->assertNotNull($variableInstanceCount);
        $this->assertNotEmpty($variableInstanceCount);
    }

    /**
     * @throws \Exception
     */
    function testGetHistoricActivityStatistics()
    {
        $pdi = self::$pds->getDefinitions(new ProcessDefinitionRequest())[0]->getId();
        $has = self::$hs->getHistoricActivityStatistic($pdi,
            new HistoricActivityStatisticRequest())[0];
        $this->assertNotEmpty('UserTask_1', $has->getId());
    }
}
