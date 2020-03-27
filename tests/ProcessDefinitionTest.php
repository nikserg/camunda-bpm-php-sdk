<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\ProcessDefinitionRequest;
use org\camunda\php\sdk\entity\request\ProcessInstanceRequest;
use org\camunda\php\sdk\entity\request\StatisticRequest;
use org\camunda\php\sdk\service\ProcessDefinitionService;
use org\camunda\php\sdk\service\ProcessInstanceService;

include('../vendor/autoload.php');

class ProcessDefinitionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ProcessDefinitionService
     */
    protected static $pds;
    /**
     * @var ProcessInstanceService
     */
    protected static $pis;

    public static function setUpBeforeClass(): void
    {
        self::$pds = new ProcessDefinitionService('http://localhost:8080/engine-rest');
        self::$pis = new ProcessInstanceService('http://localhost:8080/engine-rest');
    }

    /**
     * @throws \Exception
     */
    function testGetSingleProcessDefinition()
    {
        $pdi = self::$pds->getDefinitions(new ProcessDefinitionRequest())[0]->getId();
        $this->assertEquals(false, self::$pds->getDefinition($pdi)->getSuspended());
    }

    /**
     * @throws \Exception
     */
    function testGetProcessDefinitions()
    {
        $this->assertEquals(false,
            self::$pds->getDefinitions(new ProcessDefinitionRequest())[0]->getSuspended());
        $this->markTestIncomplete("Create a better version of this test if we get a rest-service which can deploy some files :)");
    }

    /**
     * @throws \Exception
     */
    function testGetProcessDefinitionCount()
    {
        $this->assertGreaterThan(0, self::$pds->getCount(new ProcessDefinitionRequest()));
    }

    /**
     * @throws \Exception
     */
    function testGetBpmnXml()
    {
        $pdi = self::$pds->getDefinitions(new ProcessDefinitionRequest())[0]->getId();
        $processXml = self::$pds->getBpmn20Xml($pdi);
        $this->assertEquals($pdi, $processXml->id);
        $this->assertGreaterThan(50, strlen($processXml->bpmn20Xml));
    }

    /**
     * @throws \Exception
     */
    function testStartProcessInstance()
    {
        $countPreStart = self::$pis->getCount(new ProcessInstanceRequest());
        foreach (self::$pds->getDefinitions(new ProcessDefinitionRequest()) as $data) {
            if ($data->getKey() == 'invoice') {
                self::$pds->startInstance($data->getId(), new ProcessDefinitionRequest());
            }
        }
        $this->assertGreaterThan($countPreStart, self::$pis->getCount(new ProcessInstanceRequest()));
    }

    /**
     * @throws \Exception
     */
    function testGetProcessInstanceStatistics()
    {
        $is = self::$pds->getProcessInstanceStatistic(new StatisticRequest());
        $this->assertEquals(false, $is[0]->getDefinition()->suspended);
    }

    /**
     * @throws \Exception
     */
    function testGetActivityInstanceStatistics()
    {
        $pdi = self::$pds->getDefinitions(new ProcessDefinitionRequest())[0]->getId();
        $asi = self::$pds->getActivityInstanceStatistic($pdi, new StatisticRequest())[0]->getId();
        $this->assertEquals('UserTask_1', $asi);
    }

    /**
     * @throws \Exception
     */
    function testGetStartFormKey()
    {
        foreach (self::$pds->getDefinitions(new ProcessDefinitionRequest()) as $data) {
            if ($data->getKey() == 'invoice') {
                $this->assertEquals('embedded:app:forms/start-form.html', // invoice start form in distro
                    self::$pds->getStartFormKey($data->getId())->getKey());
            }
        }
        $this->markTestIncomplete("Write a more accurate test!");
    }
}
