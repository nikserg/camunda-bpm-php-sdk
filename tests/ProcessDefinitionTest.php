<?php


namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\ProcessDefinitionRequest;
use org\camunda\php\sdk\entity\request\ProcessInstanceRequest;
use org\camunda\php\sdk\entity\request\StatisticRequest;
use org\camunda\php\sdk\service\ProcessDefinitionService;
use org\camunda\php\sdk\service\ProcessInstanceService;

include('../../vendor/autoload.php');

class ProcessDefinitionTest extends \PHPUnit\Framework\TestCase
{
    protected static $restApi;
    protected static $pds;

    public static function setUpBeforeClass(): void
    {
        self::$restApi = 'http://localhost:8080/engine-rest';
        print("\n\nCLASS: " . __CLASS__ . "\n");
        self::$pds = new ProcessDefinitionService(self::$restApi);
    }

    public static function tearDownAfterClass(): void
    {
        self::$restApi = null;
    }

    public function testGetSingleProcessDefinition()
    {
        $pdi = self::$pds->getDefinitions(new ProcessDefinitionRequest())->definition_0->getId();
        $this->assertEquals(false, self::$pds->getDefinition($pdi)->getSuspended());
    }

    /**
     * TODO: Create a better version of this test if we get a rest-service which can deploy some files :)
     */
    public function testGetProcessDefinitions()
    {
        $this->assertEquals(false,
            self::$pds->getDefinitions(new ProcessDefinitionRequest())->definition_0->getSuspended());
    }

    public function testGetProcessDefinitionCount()
    {
        $this->assertGreaterThan(0, self::$pds->getCount(new ProcessDefinitionRequest()));
    }

    public function testGetBpmnXml()
    {
        $pdi = self::$pds->getDefinitions(new ProcessDefinitionRequest())->definition_0->getId();
        $processXml = self::$pds->getBpmn20Xml($pdi);

        $this->assertEquals($pdi, $processXml->id);
        $this->assertGreaterThan(50, strlen($processXml->bpmn20Xml));
    }

    public function testStartProcessInstance()
    {
        $pis = new ProcessInstanceService(self::$restApi);

        $countPreStart = $pis->getCount(new ProcessInstanceRequest());
        foreach (self::$pds->getDefinitions(new ProcessDefinitionRequest()) AS $data) {
            if ($data->getKey() == 'invoice') {
                self::$pds->startInstance($data->getId(), new ProcessDefinitionRequest());
            }
        }
        $this->assertGreaterThan($countPreStart, $pis->getCount(new ProcessInstanceRequest()));
    }

    public function testGetProcessInstanceStatistics()
    {
        $is = self::$pds->getProcessInstanceStatistic(new StatisticRequest());
        $this->assertEquals(false, $is->statistic_0->getDefinition()->suspended);
    }

    public function testGetActivityInstanceStatistics()
    {
        $pdi = self::$pds->getDefinitions(new ProcessDefinitionRequest())->definition_0->getId();
        $asi = self::$pds->getActivityInstanceStatistic($pdi, new StatisticRequest())->statistic_0->getId();
        $this->assertEquals('UserTask_1', $asi);
    }

    /**
     * TODO: Write a more accurate test!
     * embedded:app:forms/start-form.html - invoice start form in distro
     */
    public function testGetStartFormKey()
    {
        foreach (self::$pds->getDefinitions(new ProcessDefinitionRequest()) AS $data) {
            if ($data->getKey() == 'invoice') {
                $this->assertEquals('embedded:app:forms/start-form.html',
                    self::$pds->getStartFormKey($data->getId())->getKey());
            }
        }
    }
}
