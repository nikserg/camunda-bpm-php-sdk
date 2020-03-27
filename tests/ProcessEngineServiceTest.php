<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\service\ProcessEngineService;

include('../vendor/autoload.php');

class ProcessEngineServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ProcessEngineService
     */
    protected static $pes;

    public static function setUpBeforeClass(): void
    {
        self::$pes = new ProcessEngineService('http://localhost:8080/engine-rest');
    }

    /**
     * @throws \Exception
     */
    function testGetEngineNames()
    {
        $this->assertEquals('default', self::$pes->getEngineNames()[0]->getName());
    }
}
