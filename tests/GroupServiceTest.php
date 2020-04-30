<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\CredentialsRequest;
use org\camunda\php\sdk\entity\request\GroupRequest;
use org\camunda\php\sdk\entity\request\ProfileRequest;
use org\camunda\php\sdk\entity\request\UserRequest;
use org\camunda\php\sdk\entity\response\Group;
use org\camunda\php\sdk\service\GroupService;
use org\camunda\php\sdk\service\UserService;

class GroupServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var GroupService
     */
    protected static $gs;
    /**
     * @var UserService
     */
    protected static $us;

    public static function setUpBeforeClass()
    {
        self::$gs = new GroupService($_ENV['camunda_url']);
        self::$us = new UserService($_ENV['camunda_url']);
    }

    /**
     * @throws \Exception
     */
    protected function setUp()
    {
        self::$gs->createGroup((new GroupRequest())
            ->setName('phpUnitTestOne')
            ->setId('phpUnitTestOne')
            ->setType('Organizational Unit'));
        parent::setUp();
    }

    /**
     * @throws \Exception
     */
    function tearDown()
    {
        self::$gs->deleteGroup('phpUnitTestOne');
        parent::tearDown();
    }

    /**
     * @throws \Exception
     */
    function testCreateDeleteGroup()
    {
        $count = self::$gs->getCount(new GroupRequest());
        self::$gs->deleteGroup('phpUnitTestOne');
        $this->assertEquals($count - 1, self::$gs->getCount(new GroupRequest()));
        self::$gs->createGroup((new GroupRequest())
            ->setName('phpUnitTestOne')
            ->setId('phpUnitTestOne')
            ->setType('Organizational Unit'));
        $this->assertEquals($count, self::$gs->getCount(new GroupRequest()));
    }

    /**
     * @throws \Exception
     */
    function testAddRemoveGroupMember()
    {
        self::$us->createUser(
            (new UserRequest())
                ->setProfile((new ProfileRequest())
                    ->setId('phpUnitTesterOne')
                    ->setFirstName('phpUnitTesterOne')
                    ->setEmail('php@php.com')
                )
                ->setCredentials((new CredentialsRequest())->setPassword('123456'))
        );
        self::$gs->addMember('phpUnitTestOne', 'phpUnitTesterOne');
        $this->assertEquals(1, self::$gs->getCount((new GroupRequest())->setMember('phpUnitTesterOne')));
        self::$gs->removeMember('phpUnitTestOne', 'phpUnitTesterOne');
        $this->assertEquals(0, self::$gs->getCount((new GroupRequest())->setMember('phpUnitTesterOne')));
        self::$us->deleteUser('phpUnitTesterOne');
    }

    /**
     * @throws \Exception
     */
    function testGetGroup()
    {
        $this->assertEquals('phpUnitTestOne', self::$gs->getGroup('phpUnitTestOne')->getName());
    }

    /**
     * @throws \Exception
     */
    function testGetGroups()
    {
        $searchResult = self::$gs->getGroups(new GroupRequest());
        $this->assertNotEmpty($searchResult);
        self::assertContainsOnlyInstancesOf(Group::class, $searchResult);
        $searchResult = self::$gs->getGroups((new GroupRequest())->setId('phpUnitTestOne'));
        $this->assertEquals('phpUnitTestOne', $searchResult[0]->getId());
    }

    /**
     * @throws \Exception
     */
    function testGetGroupCount()
    {
        $initialCount = self::$gs->getCount(new GroupRequest());
        self::$gs->createGroup((new GroupRequest())
            ->setName('phpUnitTestTwo')
            ->setId('phpUnitTestTwo')
            ->setType('Organizational Unit'));
        $this->assertEquals($initialCount + 1, self::$gs->getCount(new GroupRequest()));
        $this->assertEquals(1, self::$gs->getCount((new GroupRequest())->setName('phpUnitTestTwo')));
        self::$gs->deleteGroup('phpUnitTestTwo');
        $this->assertEquals($initialCount, self::$gs->getCount(new GroupRequest()));
    }

    /**
     * @throws \Exception
     */
    function testUpdateGroup()
    {
        self::$gs->updateGroup('phpUnitTestOne', (new GroupRequest())
            ->setId('phpUnitTestOne')
            ->setName('phpUnitTestOneUpdated')
            ->setType('Organizational Unit'));
        $this->assertEquals('phpUnitTestOneUpdated', self::$gs->getGroup('phpUnitTestOne')->getName());
    }

    /**
     * @throws \Exception
     */
    function testGetGroupResourceOptions()
    {
        $links = self::$gs->getResourceOption()->getLinks();
        $this->assertObjectHasAttribute('method', $links[0]);
        $links = self::$gs->getResourceInstanceOption('sales')->getLinks();
        $this->assertObjectHasAttribute('method', $links[0]);
    }
}
