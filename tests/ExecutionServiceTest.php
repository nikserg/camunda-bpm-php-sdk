<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\ExecutionRequest;
use org\camunda\php\sdk\entity\request\VariableRequest;
use org\camunda\php\sdk\service\ExecutionService;

class ExecutionServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ExecutionService
     */
    protected static $es;

    public static function setUpBeforeClass(): void
    {
        self::$es = new ExecutionService($_ENV['camunda_url']);
    }

    /**
     * @throws \Exception
     */
    function testGetSingleExecution()
    {
        $ei = self::$es->getExecutions(new ExecutionRequest())[1];
        $this->assertEquals(
            $ei->getProcessInstanceId(),
            self::$es->getExecution($ei->getId())->getProcessInstanceId()
        );
    }

    /**
     * @throws \Exception
     */
    function testGetExecutions()
    {
        $this->assertNotEmpty(self::$es->getExecutions(new ExecutionRequest()));
        $er = new ExecutionRequest();
        $er->setActive(true);
        $this->assertNotEmpty(self::$es->getExecutions($er));
        $this->assertNotEmpty(self::$es->getExecutions(new ExecutionRequest(), true));
        $er = new ExecutionRequest();
        $er->setActive(true);
        $this->assertNotEmpty(self::$es->getExecutions($er, true));
    }

    /**
     * @throws \Exception
     */
    function testGetExecutionCount()
    {
        $eic = self::$es->getCount(new ExecutionRequest());
        $eic2 = count(self::$es->getExecutions(new ExecutionRequest()));
        $this->assertEquals($eic, $eic2);
        $eic = self::$es->getCount(new ExecutionRequest(), true);
        $eic2 = count(self::$es->getExecutions(new ExecutionRequest(), true));
        $this->assertEquals($eic, $eic2);
        $er = new ExecutionRequest();
        $er->setActive(true);
        $eic = self::$es->getCount($er);
        $eic2 = count(self::$es->getExecutions($er));
        $this->assertEquals($eic, $eic2);
    }

    /**
     * @throws \Exception
     */
    function testGetLocalExecutionVariable()
    {
        $ei = self::$es->getExecutions(new ExecutionRequest())[1];
        $ev = new VariableRequest();
        $ev->setValue("testValue")->setType('String');
        self::$es->putExecutionVariable($ei->getId(), 'testVariable', $ev);
        $this->assertEquals('testValue', self::$es->getExecutionVariable($ei->getId(), 'testVariable')->getValue());
        self::$es->deleteExecutionVariable($ei->getId(), 'testVariable');
    }

    /**
     * @throws \Exception
     */
    function testPutLocalExecutionVariable()
    {
        $ei = self::$es->getExecutions(new ExecutionRequest())[1];
        $ev = new VariableRequest();
        $ev->setValue("testValue")->setType('String');
        self::$es->putExecutionVariable($ei->getId(), 'testVariable', $ev);
        $this->assertEquals('testValue', self::$es->getExecutionVariable($ei->getId(), 'testVariable')->getValue());
        self::$es->deleteExecutionVariable($ei->getId(), 'testVariable');
    }

    /**
     * @throws \Exception
     */
    function testDeleteLocalExecutionVariable()
    {
        $ei = self::$es->getExecutions(new ExecutionRequest())[1];
        $ev = new VariableRequest();
        $ev->setValue("testValue")->setType('String');
        self::$es->putExecutionVariable($ei->getId(), 'testVariable', $ev);
        $this->assertEquals('testValue', self::$es->getExecutionVariable($ei->getId(), 'testVariable')->getValue());
        self::$es->deleteExecutionVariable($ei->getId(), 'testVariable');
        try {
            self::$es->getExecutionVariable($ei->getId(), 'testVariable')->getValue();
        } catch (\Exception $ex) {
            $this->assertStringStartsWith('HTTP 404 error', $ex->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    function testGetLocalExecutionVariables()
    {
        $ei = self::$es->getExecutions(new ExecutionRequest())[1];
        $ev = new VariableRequest();
        $ev->setValue("testValue")->setType('String');
        self::$es->putExecutionVariable($ei->getId(), 'testVariable', $ev);
        $this->assertGreaterThan(0, count(self::$es->getExecutionVariables($ei->getId())));
        $this->assertEquals(
            'testValue',
            self::$es->getExecutionVariables($ei->getId())['testVariable']->getValue()
        );
        self::$es->deleteExecutionVariable($ei->getId(), 'testVariable');
    }

    /**
     * @throws \Exception
     */
    function testUpdateAndDeleteExecutionVariables()
    {
        $ei = self::$es->getExecutions(new ExecutionRequest())[1];
        $ev = new VariableRequest();
        $ev->setValue('testValue')->setType('String');
        self::$es->putExecutionVariable($ei->getId(), 'testVariable', $ev);
        $ev = new VariableRequest();
        $ev->setValue('testValue2')->setType('String');
        self::$es->putExecutionVariable($ei->getId(), 'testVariable2', $ev);
        $ev = new VariableRequest();
        $pm = [];
        $pm['testVariable'] = new VariableRequest();
        $pm['testVariable2'] = new VariableRequest();
        $pm['testVariable']->setValue('newTestValue');
        $pm['testVariable2']->setValue('newTestValue2');
        $ev->setModifications($pm);
        self::$es->updateOrDeleteExecutionVariables($ei->getId(), $ev);
        $this->assertEquals('newTestValue', self::$es->getExecutionVariable($ei->getId(), 'testVariable')->getValue());
        $this->assertEquals('newTestValue2',
            self::$es->getExecutionVariable($ei->getId(), 'testVariable2')->getValue());
        $pvc = count(self::$es->getExecutionVariables($ei->getId()));
        $ev = new VariableRequest();
        $pm = ['testVariable', 'testVariable2'];
        $ev->setDeletions($pm);
        self::$es->updateOrDeleteExecutionVariables($ei->getId(), $ev);
        $this->assertEquals($pvc - 2, count(self::$es->getExecutionVariables($ei->getId())));
    }
}
