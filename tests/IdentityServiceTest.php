<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\IdentityRequest;
use org\camunda\php\sdk\service\IdentityService;

include("../vendor/autoload.php");

class IdentityServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var IdentityService
     */
    protected static $is;

    public static function setUpBeforeClass(): void
    {
        self::$is = new IdentityService('http://localhost:8080/engine-rest');
    }

    /**
     * @throws \Exception
     */
    function testCanGetGroups()
    {
        $groupRequest = new IdentityRequest();
        $groupRequest->setUserId('demo');
        $groups = self::$is->getGroups($groupRequest);
        $this->assertObjectHasAttribute('id', $groups->getGroups()[0]);
        $this->assertObjectHasAttribute('displayName', $groups->getGroupUsers()[0]);
    }
}
