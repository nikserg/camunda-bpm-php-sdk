<?php


namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\JobRequest;
use org\camunda\php\sdk\service\JobService;

include('../../vendor/autoload.php');

class JobServiceTest extends \PHPUnit\Framework\TestCase
{
    protected static $restApi;
    protected static $js;

    public static function setUpBeforeClass(): void
    {
        self::$restApi = 'http://localhost:8080/engine-rest';
        print("\n\nCLASS: " . __CLASS__ . "\n");
        self::$js = new JobService(self::$restApi);
    }

    public static function tearDownAfterClass(): void
    {
        self::$restApi = null;
    }

    /**
     * TODO: prepare a better test-Environment than my local tomcat server :(
     *
     * @test
     */
    public function getSingleJob()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * TODO: prepare a better test-Environment than my local tomcat server :(
     *
     * @test
     */
    public function getJobs()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * TODO: prepare a better test-Environment than my local tomcat server :(
     *
     * @test
     */
    public function getJobCount()
    {
        $this->assertNotNull(self::$js->getCount(new JobRequest()));
    }

    /**
     * TODO: prepare a better test-Environment than my local tomcat server :(
     *
     * @test
     */
    public function setJobRetries()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * TODO: prepare a better test-Environment than my local tomcat server :(
     *
     * @test
     */
    public function executeJob()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * TODO: prepare a better test-Environment than my local tomcat server :(
     *
     * @test
     */
    public function getExceptionStacktrace()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * TODO: prepare a better test-Environment than my local tomcat server :(
     *
     * @test
     */
    public function getJobDueDate()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
