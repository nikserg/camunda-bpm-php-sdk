<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\service\ProcessEngineService;

class ProcessEngineServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ProcessEngineService
     */
    protected static $pes;

    public static function setUpBeforeClass(): void
    {
        self::$pes = new ProcessEngineService($_ENV['camunda_url']);
    }

    /**
     * @throws \Exception
     */
    function testGetEngineNames()
    {
        $this->assertEquals('default', self::$pes->getEngineNames()[0]->getName());
    }
}
