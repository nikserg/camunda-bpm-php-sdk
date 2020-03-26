<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\AuthorizationRequest;
use org\camunda\php\sdk\service\AuthorizationService;

include("../vendor/autoload.php");

class AuthorizationServiceTest extends \PHPUnit\Framework\TestCase
{
    protected static $restApi;
    protected static $as;

    public static function setUpBeforeClass(): void
    {
        self::$restApi = 'http://localhost:8080/engine-rest';
        print("\n\nCLASS: " . __CLASS__ . "\n");
        self::$as = new AuthorizationService(self::$restApi);
    }

    public static function tearDownAfterClass(): void
    {
        self::$restApi = null;
    }

    /**
     * @test
     */
    public function getAuthorizations()
    {
        $authorizations = self::$as->getAuthorizations(new AuthorizationRequest());
        $this->assertNotEmpty($authorizations);
    }

    /**
     * @test
     */
    public function getSingleAuthorization()
    {
        $authorizations = self::$as->getAuthorizations(new AuthorizationRequest());
        $singleAuthorization = $authorizations->authorization_0;
        $this->assertEquals('demo', $singleAuthorization->getUserId());
    }

    /**
     * @test
     */
    public function createAuthorization()
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
     * @test
     */
    public function updateAuthorization()
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
     * @test
     */
    public function deleteAuthorization()
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

    /**
     * TODO: Find a way to test this with a properly authentication. I can't get the basic authentication to work with apache Tomcat :-(
     *
     * @test
     */
    public function performAuthorizationCheck()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @test
     */
    public function getAuthorizationResourceOptions()
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
     * @test
     */
    public function getAuthorizationCount()
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
