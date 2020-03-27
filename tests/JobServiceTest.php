<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\JobRequest;
use org\camunda\php\sdk\service\JobService;

include('../vendor/autoload.php');

class JobServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var JobService
     */
    protected static $js;

    public static function setUpBeforeClass(): void
    {
        self::$js = new JobService('http://localhost:8080/engine-rest');
    }

    function testGetSingleJob()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    function testGetJobs()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @throws \Exception
     */
    function testGetJobCount()
    {
        $this->assertNotNull(self::$js->getCount(new JobRequest()));
    }

    function testSetJobRetries()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    function testExecuteJob()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    function testGetExceptionStacktrace()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    function testGetJobDueDate()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
