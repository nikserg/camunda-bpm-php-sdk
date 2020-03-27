<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\service\MessageService;

include('../vendor/autoload.php');

class MessageServiceTest extends \PHPUnit\Framework\TestCase
{
    protected static $ms;

    public static function setUpBeforeClass(): void
    {
        self::$ms = new MessageService('http://localhost:8080/engine-rest');
    }

    function testDeliverMessage()
    {
        $this->markTestIncomplete(
            'prepare a better test-Environment than my local tomcat server :('
        );
    }
}
