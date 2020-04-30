<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\CredentialsRequest;
use org\camunda\php\sdk\entity\request\ProfileRequest;
use org\camunda\php\sdk\entity\request\UserRequest;
use org\camunda\php\sdk\entity\response\User;
use org\camunda\php\sdk\service\UserService;

class UserServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var UserService
     */
    protected static $us;

    public static function setUpBeforeClass()
    {
        self::$us = new UserService($_ENV['camunda_url']);
    }

    function setupUserObject($affix = 'One')
    {
        return (new UserRequest())->setProfile(
            (new ProfileRequest())
                ->setId('phpUnitTester' . $affix)
                ->setFirstName('phpUnitTester' . $affix)
                ->setEmail('php@php.com')
        )->setCredentials(
            (new CredentialsRequest())->setPassword('123456')
        );
    }

    /**
     * @throws \Exception
     */
    protected function setUp()
    {
        self::$us->createUser($this->setupUserObject());
        parent::setUp();
    }

    /**
     * @throws \Exception
     */
    function tearDown()
    {
        self::$us->deleteUser('phpUnitTesterOne');
        parent::tearDown();
    }

    /**
     * @throws \Exception
     */
    function testCreateDeleteUser()
    {
        $filteredUser = (new UserRequest())->setId('phpUnitTesterOne');
        $count = self::$us->getCount(new UserRequest());
        $countFiltered = self::$us->getCount($filteredUser);
        self::$us->deleteUser('phpUnitTesterOne');
        $this->assertEquals($count - 1, self::$us->getCount(new UserRequest()));
        $this->assertEquals($countFiltered - 1, self::$us->getCount($filteredUser));
    }

    /**
     * @throws \Exception
     */
    function testGetUserProfile()
    {
        $this->assertEquals('phpUnitTesterOne', self::$us->getProfile('phpUnitTesterOne')->getFirstName());
    }

    /**
     * @throws \Exception
     */
    function testGetUsers()
    {
        $filteredUsers = self::$us->getUsers((new UserRequest())->setFirstName('phpUnitTesterOne'));
        self::assertContainsOnly(User::class, $filteredUsers);
        $this->assertEquals('phpUnitTesterOne', $filteredUsers[0]->getId());
    }

    /**
     * @throws \Exception
     */
    function testGetUserCount()
    {
        $count = self::$us->getCount(new UserRequest());
        $countFiltered = self::$us->getCount((new UserRequest())->setFirstName('phpUnitTesterOne'));
        self::$us->createUser($this->setupUserObject('Two'));
        $this->assertEquals($count + 1, self::$us->getCount(new UserRequest()));
        $this->assertEquals($countFiltered, self::$us->getCount((new UserRequest())->setFirstName('phpUnitTesterOne')));
        self::$us->deleteUser('phpUnitTesterOne');
        $this->assertEquals($count, self::$us->getCount(new UserRequest()));
        $this->assertEquals($countFiltered - 1,
            self::$us->getCount((new UserRequest())->setFirstName('phpUnitTesterOne')));
        self::$us->deleteUser('phpUnitTesterTwo');
        $this->assertEquals($count - 1, self::$us->getCount(new UserRequest()));
        $this->assertEquals($countFiltered - 1,
            self::$us->getCount((new UserRequest())->setFirstName('phpUnitTesterOne')));
    }

    /**
     * @throws \Exception
     */
    function testUpdateUserProfile()
    {
        $this->assertEquals('phpUnitTesterOne', self::$us->getProfile('phpUnitTesterOne')->getFirstName());
        self::$us->updateProfile('phpUnitTesterOne',
            (new ProfileRequest())->setId('phpUnitTesterOne')->setFirstName('John'));
        $this->assertEquals('John', self::$us->getProfile('phpUnitTesterOne')->getFirstName());
    }

    /**
     * @throws \Exception
     */
    function testGetUserResourceOptions()
    {
        $this->assertObjectHasAttribute('method', self::$us->getResourceOption()->getLinks()[0]);
        $this->assertObjectHasAttribute('method', self::$us->getResourceInstanceOption('demo')->getLinks()[0]);
    }
}
