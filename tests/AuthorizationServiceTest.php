<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\AuthorizationRequest;
use org\camunda\php\sdk\service\AuthorizationService;

include("../vendor/autoload.php");

class AuthorizationServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var AuthorizationService
     */
    protected static $as;

    public static function setUpBeforeClass(): void
    {
        self::$as = new AuthorizationService('http://localhost:8080/engine-rest');
    }

    /**
     * @throws \Exception
     */
    function testGetAuthorizations()
    {
        $authorizations = self::$as->getAuthorizations(new AuthorizationRequest());
        $this->assertNotEmpty($authorizations);
    }

    /**
     * @throws \Exception
     */
    function testGetSingleAuthorization()
    {
        $authorizations = self::$as->getAuthorizations(new AuthorizationRequest());
        $this->assertEquals('demo', $authorizations[0]->getUserId());
    }

    /**
     * @throws \Exception
     */
    function testCreateAuthorization()
    {
        $createRequest = new AuthorizationRequest();
        $createRequest->setType(1);
        $createRequest->setPermissions(['CREATE', 'READ']);
        $createRequest->setUserId('PHP_UNIT_TESTER_1');
        $createRequest->setResourceId("*");
        $createRequest->setResourceType(1);
        $initialCount = self::$as->getCount(new AuthorizationRequest());
        $createdAuthorization = self::$as->createAuthorization($createRequest);
        $newCount = self::$as->getCount(new AuthorizationRequest());
        $this->assertEquals($initialCount + 1, $newCount);
        self::$as->deleteAuthorization($createdAuthorization->getId());
    }

    /**
     * @throws \Exception
     */
    function testUpdateAuthorization()
    {
        $createRequest = new AuthorizationRequest();
        $createRequest->setType(1);
        $createRequest->setPermissions(['CREATE', 'READ']);
        $createRequest->setUserId('PHP_UNIT_TESTER_1');
        $createRequest->setResourceId("*");
        $createRequest->setResourceType(1);
        $createdAuthorization = self::$as->createAuthorization($createRequest);
        $this->assertEquals('PHP_UNIT_TESTER_1', $createdAuthorization->getUserId());
        $updateRequest = new AuthorizationRequest();
        $updateRequest->setUserId('demo');
        $updateRequest->setResourceType($createdAuthorization->getResourceType());
        $updateRequest->setPermissions($createdAuthorization->getPermissions());
        self::$as->updateAuthorization($createdAuthorization->getId(), $updateRequest);
        $updatedAuthorization = self::$as->getAuthorization($createdAuthorization->getId());
        $this->assertEquals('demo', $updatedAuthorization->getUserId());
        $this->assertEquals('demo', self::$as->getAuthorization($createdAuthorization->getId())->getUserId());
        self::$as->deleteAuthorization($createdAuthorization->getId());
    }

    /**
     * @throws \Exception
     */
    function testDeleteAuthorization()
    {
        $createRequest = new AuthorizationRequest();
        $createRequest->setType(1);
        $createRequest->setPermissions(['CREATE', 'READ']);
        $createRequest->setUserId('PHP_UNIT_TESTER_1');
        $createRequest->setResourceId("*");
        $createRequest->setResourceType(1);
        $countRequest = new AuthorizationRequest();
        $initialCount = self::$as->getCount($countRequest);
        $createdAuthorization = self::$as->createAuthorization($createRequest);
        $this->assertEquals($initialCount + 1, self::$as->getCount($countRequest));
        self::$as->deleteAuthorization($createdAuthorization->getId());
        $this->assertEquals($initialCount, self::$as->getCount($countRequest));
    }

    function testPerformAuthorizationCheck()
    {
        $this->markTestIncomplete(
            'Find a way to test this with a properly authentication. I can\'t get the basic authentication to work with apache Tomcat'
        );
    }

    /**
     * @throws \Exception
     */
    function testGetAuthorizationResourceOptions()
    {
        $createRequest = new AuthorizationRequest();
        $createRequest->setType(1);
        $createRequest->setPermissions(['CREATE', 'READ']);
        $createRequest->setUserId('PHP_UNIT_TESTER_1');
        $createRequest->setResourceId("*");
        $createRequest->setResourceType(1);
        $createdAuthorization = self::$as->createAuthorization($createRequest);
        $mainOption = self::$as->getResourceOption();
        $this->assertObjectHasAttribute('method', $mainOption->getLinks()[0]);
        $instanceOption = self::$as->getResourceInstanceOption($createdAuthorization->getId());
        $this->assertObjectHasAttribute('method', $instanceOption->getLinks()[0]);
        self::$as->deleteAuthorization($createdAuthorization->getId());
    }

    /**
     * @throws \Exception
     */
    function testGetAuthorizationCount()
    {
        $createRequest = new AuthorizationRequest();
        $createRequest->setType(1);
        $createRequest->setPermissions(['CREATE', 'READ']);
        $createRequest->setUserId('PHP_UNIT_TESTER_1');
        $createRequest->setResourceId("*");
        $createRequest->setResourceType(1);
        $initialCount = self::$as->getCount(new AuthorizationRequest());
        $createdAuthorization = self::$as->createAuthorization($createRequest);
        $newCount = self::$as->getCount(new AuthorizationRequest());
        $this->assertEquals($initialCount + 1, $newCount);
        self::$as->deleteAuthorization($createdAuthorization->getId());
        $this->assertEquals($initialCount, self::$as->getCount(new AuthorizationRequest()));
    }
}
