<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\ProcessDefinitionRequest;
use org\camunda\php\sdk\entity\request\ProcessInstanceRequest;
use org\camunda\php\sdk\entity\request\StatisticRequest;
use org\camunda\php\sdk\entity\request\VariableRequest;
use org\camunda\php\sdk\service\ProcessDefinitionService;
use org\camunda\php\sdk\service\ProcessInstanceService;

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

    public static function setUpBeforeClass()
    {
        self::$pds = new ProcessDefinitionService($_ENV['camunda_url']);
        self::$pis = new ProcessInstanceService($_ENV['camunda_url']);
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
                $pdr = new ProcessDefinitionRequest();
                $pdr->setVariables([
                    'amount'          => (new VariableRequest())->setType('Integer')->setValue(100),
                    'invoiceCategory' => (new VariableRequest())->setType('String')->setValue("Misc"),
                ]);
                self::$pds->startInstance($data->getId(), $pdr);
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
        $pdr = self::$pds->getDefinitions(new ProcessDefinitionRequest());
        $asr = self::$pds->getActivityInstanceStatistic($pdr[0]->getId(), new StatisticRequest());
        $this->assertEquals('approveInvoice', $asr[0]->getId());
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
    }
}
