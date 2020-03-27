<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\ProcessInstanceRequest;
use org\camunda\php\sdk\entity\request\VariableRequest;
use org\camunda\php\sdk\service\ProcessInstanceService;

include('../vendor/autoload.php');

class ProcessInstanceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ProcessInstanceService
     */
    protected static $pis;

    public static function setUpBeforeClass(): void
    {
        self::$pis = new ProcessInstanceService('http://localhost:8080/engine-rest');
    }

    /**
     * @throws \Exception
     */
    function testGetProcessInstance()
    {
        $pi = self::$pis->getInstances(new ProcessInstanceRequest())[0];
        $spi = self::$pis->getInstance($pi->getId());
        $this->assertEquals($pi->getDefinitionId(), $spi->getDefinitionId());
    }

    /**
     * @throws \Exception
     */
    function testGetProcessInstances()
    {
        $pi = self::$pis->getInstances(new ProcessInstanceRequest())[0];
        $this->assertFalse($pi->getSuspended());
        $pi = self::$pis->getInstances(new ProcessInstanceRequest(), true)[0];
        $this->assertFalse($pi->getSuspended());
    }

    /**
     * @throws \Exception
     */
    function testGetProcessInstanceCount()
    {
        $pi = self::$pis->getCount(new ProcessInstanceRequest());
        $this->assertGreaterThan(0, $pi);
    }

    /**
     * @throws \Exception
     */
    function testGetSingleProcessVariable()
    {
        $pi = self::$pis->getInstances(new ProcessInstanceRequest())[0];
        $piv = new VariableRequest();
        $piv->setValue('testValue')->setType('String');
        self::$pis->putProcessVariable($pi->getId(), 'testVariable', $piv);
        $this->assertNotEmpty(self::$pis->getProcessVariables($pi->getId()));
        $this->assertEquals('testValue', self::$pis->getProcessVariable($pi->getId(), 'testVariable')->getValue());
        self::$pis->deleteProcessVariable($pi->getId(), 'testVariable');
    }

    /**
     * @throws \Exception
     */
    function testPutSingleProcessVariable()
    {
        $pi = self::$pis->getInstances(new ProcessInstanceRequest())[0];
        $piv = new VariableRequest();
        $piv->setValue('testValue')->setType('String');
        self::$pis->putProcessVariable($pi->getId(), 'testVariable', $piv);
        $this->assertNotEmpty(self::$pis->getProcessVariables($pi->getId()));
        $this->assertEquals('testValue', self::$pis->getProcessVariable($pi->getId(), 'testVariable')->getValue());
        self::$pis->deleteProcessVariable($pi->getId(), 'testVariable');
    }

    /**
     * @throws \Exception
     */
    function testDeleteSingleProcessInstance()
    {
        $pi = self::$pis->getInstances(new ProcessInstanceRequest())[0];
        $pvc = count(get_object_vars(self::$pis->getProcessVariables($pi->getId())));
        $piv = new VariableRequest();
        $piv->setValue('testValue')->setType('String');
        self::$pis->putProcessVariable($pi->getId(), 'testVariable', $piv);
        $this->assertEquals($pvc + 1, count(get_object_vars(self::$pis->getProcessVariables($pi->getId()))));
        $this->assertEquals('testValue', self::$pis->getProcessVariable($pi->getId(), 'testVariable')->getValue());
        self::$pis->deleteProcessVariable($pi->getId(), 'testVariable');
        $this->assertEquals($pvc, count(get_object_vars(self::$pis->getProcessVariables($pi->getId()))));
    }

    /**
     * @throws \Exception
     */
    function testGetProcessVariables()
    {
        $pi = self::$pis->getInstances(new ProcessInstanceRequest())[0];
        $pvc = count(get_object_vars(self::$pis->getProcessVariables($pi->getId())));
        $piv = new VariableRequest();
        $piv->setValue('testValue')->setType('String');
        self::$pis->putProcessVariable($pi->getId(), 'testVariable', $piv);
        $this->assertEquals($pvc + 1, count(get_object_vars(self::$pis->getProcessVariables($pi->getId()))));
        self::$pis->deleteProcessVariable($pi->getId(), 'testVariable');
        $this->assertEquals($pvc, count(get_object_vars(self::$pis->getProcessVariables($pi->getId()))));
    }

    /**
     * @throws \Exception
     */
    function testUpdateAndDeleteProcessVariables()
    {
        $pi = self::$pis->getInstances(new ProcessInstanceRequest())[0];
        $piv = new VariableRequest();
        $piv->setValue('testValue')->setType('String');
        self::$pis->putProcessVariable($pi->getId(), 'testVariable', $piv);
        $piv = new VariableRequest();
        $piv->setValue('testValue2')->setType('String');
        self::$pis->putProcessVariable($pi->getId(), 'testVariable2', $piv);
        $piv = new VariableRequest();
        $pm = [];
        $pm['testVariable'] = new VariableRequest();
        $pm['testVariable2'] = new VariableRequest();
        $pm['testVariable']->setValue('newTestValue');
        $pm['testVariable2']->setValue('newTestValue2');
        $piv->setModifications($pm);
        self::$pis->updateOrDeleteProcessVariables($pi->getId(), $piv);
        $this->assertEquals('newTestValue', self::$pis->getProcessVariable($pi->getId(), 'testVariable')->getValue());
        $this->assertEquals('newTestValue2', self::$pis->getProcessVariable($pi->getId(), 'testVariable2')->getValue());
        $pvc = count(get_object_vars(self::$pis->getProcessVariables($pi->getId())));
        $piv = new VariableRequest();
        $pm = ['testVariable', 'testVariable2'];
        $piv->setDeletions($pm);
        self::$pis->updateOrDeleteProcessVariables($pi->getId(), $piv);
        $this->assertEquals($pvc - 2, count(get_object_vars(self::$pis->getProcessVariables($pi->getId()))));
    }

    /**
     * @throws \Exception
     */
    function testGetActivityInstances()
    {
        $pi = self::$pis->getInstances(new ProcessInstanceRequest())[0];
        self::$pis->getActivityInstances($pi->getId(), new ProcessInstanceRequest());
        $this->markTestIncomplete('To be implemented');
    }

    /**
     * @throws \Exception
     */
    function testActivateOrSuspendInstance()
    {
        $processInstances = self::$pis->getInstances(new ProcessInstanceRequest());
        $suspendedFilter = new ProcessInstanceRequest();
        $suspendedFilter->setSuspended("true");
        $countSuspended = self::$pis->getCount($suspendedFilter);
        $suspendedActivator = new ProcessInstanceRequest();
        $suspendedActivator->setSuspended(true);
        self::$pis->activateOrSuspendInstance($processInstances[0]->getId(), $suspendedActivator);
        $this->assertEquals($countSuspended + 1, self::$pis->getCount($suspendedFilter));
        $suspendedActivator->setSuspended(false);
        self::$pis->activateOrSuspendInstance($processInstances[0]->getId(), $suspendedActivator);
        $this->assertEquals($countSuspended, self::$pis->getCount($suspendedFilter));
    }

    /**
     * @throws \Exception
     */
    function testDeleteSingleProcessVariable()
    {
        $processInstance = self::$pis->getInstances(new ProcessInstanceRequest())[0];
        $variables = self::$pis->getProcessVariables($processInstance->getId());
        $this->assertEquals(3, count(get_object_vars($variables)));
        self::$pis->deleteProcessVariable($processInstance->getId(), 'value2');
        $this->assertEquals(2, count(get_object_vars(self::$pis->getProcessVariables($processInstance->getId()))));
        $addProcessVariableRequest = new VariableRequest();
        $addProcessVariableRequest->setValue(1000);
        $addProcessVariableRequest->setType("Integer");
        self::$pis->putProcessVariable($processInstance->getId(), 'value2', $addProcessVariableRequest);
    }
}
