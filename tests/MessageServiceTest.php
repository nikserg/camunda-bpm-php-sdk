<?php


namespace org\camunda\php\tests;

use org\camunda\php\sdk\service\MessageService;

include('../../vendor/autoload.php');

class MessageServiceTest extends \PHPUnit\Framework\TestCase
{
    protected static $restApi;
    protected static $ms;

    public static function setUpBeforeClass(): void
    {
        self::$restApi = 'http://localhost:8080/engine-rest';
        print("\n\nCLASS: " . __CLASS__ . "\n");
        self::$ms = new MessageService(self::$restApi);
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
    public function deliverMessage()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
