<?php
/**
 * Created by IntelliJ IDEA.
 * User: hentschel
 * Date: 14.11.13
 * Time: 10:41
 * To change this template use File | Settings | File Templates.
 */

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\IdentityRequest;
use org\camunda\php\sdk\service\IdentityService;

include("../../vendor/autoload.php");

class IdentityServiceTest extends \PHPUnit\Framework\TestCase
{
    protected static $restApi;
    protected static $is;

    public static function setUpBeforeClass(): void
    {
        self::$restApi = 'http://localhost:8080/engine-rest';
        print("\n\nCLASS: " . __CLASS__ . "\n");
        self::$is = new IdentityService(self::$restApi);
    }

    public static function tearDownAfterClass(): void
    {
        self::$restApi = null;
    }

    /**
     * @test
     */
    public function testCanGetGroups()
    {
        $groupRequest = new IdentityRequest();
        $groupRequest->setUserId('demo');

        $groups = self::$is->getGroups($groupRequest);

        $this->assertObjectHasAttribute('id', $groups->getGroups()[0]);

        $this->assertObjectHasAttribute('displayName', $groups->getGroupUsers()[0]);
    }
}
