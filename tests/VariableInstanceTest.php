<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\VariableInstanceRequest;
use org\camunda\php\sdk\service\VariableInstanceService;

include('../vendor/autoload.php');

class VariableInstanceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var VariableInstanceService
     */
    protected static $vis;

    public static function setUpBeforeClass(): void
    {
        self::$vis = new VariableInstanceService('http://localhost:8080/engine-rest');
    }

    /**
     * @throws \Exception
     */
    function testGetVariableInstancesWithGet()
    {
        $vi = self::$vis->getInstances(new VariableInstanceRequest());
        foreach ($vi as $data) {
            if ($data->getName() == 'testVariable') {
                $this->assertEquals("testValue", $data->getValue());
            }
        }
        $vi = self::$vis->getInstances(new VariableInstanceRequest(), true);
        foreach ($vi as $data) {
            if ($data->getName() == 'testVariable') {
                $this->assertEquals("testValue", $data->getValue());
            }
        }
        $vir = new VariableInstanceRequest();
        $vir->setVariableName('amount');
        $vi = self::$vis->getInstances($vir, true);
        $this->assertGreaterThan(0, count(get_object_vars($vi)));
    }

    /**
     * @throws \Exception
     */
    function testGetVariableInstancesCountWithGet()
    {
        $vic = self::$vis->getCount(new VariableInstanceRequest());
        $this->assertGreaterThan(0, $vic);
        $vic = self::$vis->getCount(new VariableInstanceRequest(), true);
        $this->assertGreaterThan(0, $vic);
        $vir = new VariableInstanceRequest();
        $vir->setVariableName('amount');
        $vic = self::$vis->getCount($vir, true);
        $this->assertGreaterThan(0, $vic);
        $vir = new VariableInstanceRequest();
        $vir->setVariableName('haha');
        $vic = self::$vis->getCount($vir, true);
        $this->assertEquals(0, $vic);
    }
}
