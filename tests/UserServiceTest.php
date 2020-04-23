<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\CredentialsRequest;
use org\camunda\php\sdk\entity\request\ProfileRequest;
use org\camunda\php\sdk\entity\request\UserRequest;
use org\camunda\php\sdk\service\UserService;

class UserServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var UserService
     */
    protected static $us;

    public static function setUpBeforeClass(): void
    {
        self::$us = new UserService($_ENV['camunda_url']);
    }

    /**
     * @throws \Exception
     */
    function testCreateUser()
    {
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userCredentials = new CredentialsRequest();
        $filteredUser = new UserRequest();
        $filteredUser->setId('phpUnitTesterOne');
        $userProfile->setId('phpUnitTesterOne')
            ->setFirstName('phpUnitTesterOne')
            ->setEmail('php@php.com');
        $userCredentials->setPassword('123456');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        $count = self::$us->getCount(new UserRequest());
        $countFiltered = self::$us->getCount($filteredUser);
        self::$us->createUser($user);
        $this->assertEquals($count + 1, self::$us->getCount(new UserRequest()));
        $this->assertEquals($countFiltered + 1, self::$us->getCount($filteredUser));
        self::$us->deleteUser('phpUnitTesterOne');
        $this->assertEquals($count, self::$us->getCount(new UserRequest()));
    }

    /**
     * @throws \Exception
     */
    function testDeleteUser()
    {
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userCredentials = new CredentialsRequest();
        $filteredUser = new UserRequest();
        $filteredUser->setId('phpUnitTesterOne');
        $userProfile->setId('phpUnitTesterOne')
            ->setFirstName('phpUnitTesterOne')
            ->setEmail('php@php.com');
        $userCredentials->setPassword('123456');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        $count = self::$us->getCount(new UserRequest());
        $countFiltered = self::$us->getCount($filteredUser);
        self::$us->createUser($user);
        $this->assertEquals($count + 1, self::$us->getCount(new UserRequest()));
        $this->assertEquals($countFiltered + 1, self::$us->getCount($filteredUser));
        self::$us->deleteUser('phpUnitTesterOne');
        $this->assertEquals($count, self::$us->getCount(new UserRequest()));
        $this->assertEquals($countFiltered, self::$us->getCount($filteredUser));
    }

    /**
     * @throws \Exception
     */
    function testGetUserProfile()
    {
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userCredentials = new CredentialsRequest();
        $filteredUser = new UserRequest();
        $filteredUser->setId('phpUnitTesterOne');
        $userProfile->setId('phpUnitTesterOne')
            ->setFirstName('phpUnitTesterOne')
            ->setEmail('php@php.com');
        $userCredentials->setPassword('123456');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        self::$us->createUser($user);
        $this->assertEquals('phpUnitTesterOne', self::$us->getProfile('phpUnitTesterOne')->getFirstName());
        self::$us->deleteUser('phpUnitTesterOne');
    }

    /**
     * @throws \Exception
     */
    function testGetUsers()
    {
        $filteredUser = new UserRequest();
        $filteredUser->setFirstName('phpUnitTesterOne');
        $userId = self::$us->getCount(new UserRequest());
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userCredentials = new CredentialsRequest();
        $userProfile->setId('phpUnitTesterOne')
            ->setFirstName('phpUnitTesterOne')
            ->setEmail('php@php.com');
        $userCredentials->setPassword('123456');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        self::$us->createUser($user);
        $this->assertEquals('phpUnitTesterOne', self::$us->getUsers(new UserRequest())[$userId]->getId());
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userCredentials = new CredentialsRequest();
        $userProfile->setId('phpUnitTesterTwo')
            ->setFirstName('PHP')
            ->setEmail('PHP_UNIT_SQUAD@CAMUNDA.COM');
        $userCredentials->setPassword('1337-42-23');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        self::$us->createUser($user);
        $this->assertEquals('phpUnitTesterOne', self::$us->getUsers(new UserRequest())[$userId + 1]->getId());
        $this->assertEquals('phpUnitTesterTwo', self::$us->getUsers(new UserRequest())[$userId]->getId());
        $this->assertEquals('phpUnitTesterOne', self::$us->getUsers($filteredUser)[0]->getId());
        $this->assertObjectNotHasAttribute('user_1', self::$us->getUsers($filteredUser));
        self::$us->deleteUser('phpUnitTesterOne');
        self::$us->deleteUser('phpUnitTesterTwo');
    }

    /**
     * @throws \Exception
     */
    function testGetUserCount()
    {
        $filteredUser = new UserRequest();
        $filteredUser->setFirstName('phpUnitTesterOne');
        $count = self::$us->getCount(new UserRequest());
        $countFiltered = self::$us->getCount($filteredUser);
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userCredentials = new CredentialsRequest();
        $userProfile->setId('phpUnitTesterOne')
            ->setFirstName('phpUnitTesterOne')
            ->setEmail('php@php.com');
        $userCredentials->setPassword('123456');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        self::$us->createUser($user);
        $this->assertEquals($count + 1, self::$us->getCount(new UserRequest()));
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userCredentials = new CredentialsRequest();
        $userProfile->setId('jonny1')
            ->setFirstName('John')
            ->setEmail('john.doe@who.com');
        $userCredentials->setPassword('1337-42-23');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        self::$us->createUser($user);
        $this->assertEquals($count + 2, self::$us->getCount(new UserRequest()));
        $this->assertEquals($countFiltered + 1, self::$us->getCount($filteredUser));
        self::$us->deleteUser('phpUnitTesterOne');
        self::$us->deleteUser('jonny1');
        $this->assertEquals($count, self::$us->getCount(new UserRequest()));
    }

    /**
     * @throws \Exception
     */
    function testUpdateUserProfile()
    {
        $filteredUser = new UserRequest();
        $filteredUser->setFirstName('phpUnitTesterOne');
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userProfile->setId('phpUnitTesterOne')
            ->setFirstName('phpUnitTesterOne')
            ->setEmail('php@php.com');
        $user->setProfile($userProfile)->setCredentials((new CredentialsRequest())->setPassword('123456'));
        self::$us->createUser($user);
        $this->assertEquals('phpUnitTesterOne', self::$us->getProfile('phpUnitTesterOne')->getFirstName());
        self::$us->updateProfile('phpUnitTesterOne', (new ProfileRequest())->setId('phpUnitTesterOne')
            ->setFirstName('John')
            ->setEmail('john.doe@who.com'));
        $this->assertEquals('John', self::$us->getProfile('phpUnitTesterOne')->getFirstName());
        self::$us->deleteUser('phpUnitTesterOne');
    }

    /**
     * @throws \Exception
     */
    function testGetUserResourceOptions()
    {
        $mainOption = self::$us->getResourceOption();
        $this->assertObjectHasAttribute('method', $mainOption->getLinks()[0]);
        $instanceOption = self::$us->getResourceInstanceOption('demo');
        $this->assertObjectHasAttribute('method', $instanceOption->getLinks()[0]);
    }
}
