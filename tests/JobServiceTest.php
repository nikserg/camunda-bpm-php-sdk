<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\JobRequest;
use org\camunda\php\sdk\service\JobService;

class JobServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var JobService
     */
    protected static $js;

    public static function setUpBeforeClass()
    {
        self::$js = new JobService($_ENV['camunda_url']);
    }

    /**
     * @throws \Exception
     */
    function testGetJobCount()
    {
        $this->assertNotNull(self::$js->getCount(new JobRequest()));
    }
}
