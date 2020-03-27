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
        $filteredUser->setId('shentschel');
        $userProfile->setId('shentschel')
            ->setFirstName('stefan')
            ->setLastName('hentschel')
            ->setEmail('stefan.hentschel@camunda.com');
        $userCredentials->setPassword('123456');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        $count = self::$us->getCount(new UserRequest());
        $countFiltered = self::$us->getCount($filteredUser);
        self::$us->createUser($user);
        $this->assertEquals($count + 1, self::$us->getCount(new UserRequest()));
        $this->assertEquals($countFiltered + 1, self::$us->getCount($filteredUser));
        self::$us->deleteUser('shentschel');
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
        $filteredUser->setId('shentschel');
        $userProfile->setId('shentschel')
            ->setFirstName('stefan')
            ->setLastName('hentschel')
            ->setEmail('stefan.hentschel@camunda.com');
        $userCredentials->setPassword('123456');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        $count = self::$us->getCount(new UserRequest());
        $countFiltered = self::$us->getCount($filteredUser);
        self::$us->createUser($user);
        $this->assertEquals($count + 1, self::$us->getCount(new UserRequest()));
        $this->assertEquals($countFiltered + 1, self::$us->getCount($filteredUser));
        self::$us->deleteUser('shentschel');
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
        $filteredUser->setId('shentschel');
        $userProfile->setId('shentschel')
            ->setFirstName('stefan')
            ->setLastName('hentschel')
            ->setEmail('stefan.hentschel@camunda.com');
        $userCredentials->setPassword('123456');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        self::$us->createUser($user);
        $this->assertEquals('stefan', self::$us->getProfile('shentschel')->getFirstName());
        self::$us->deleteUser('shentschel');
    }

    /**
     * @throws \Exception
     */
    function testGetUsers()
    {
        $filteredUser = new UserRequest();
        $filteredUser->setFirstName('stefan');
        $userId = self::$us->getCount(new UserRequest());
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userCredentials = new CredentialsRequest();
        $userProfile->setId('shentschel')
            ->setFirstName('stefan')
            ->setLastName('hentschel')
            ->setEmail('stefan.hentschel@camunda.com');
        $userCredentials->setPassword('123456');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        self::$us->createUser($user);
        $this->assertEquals('shentschel', self::$us->getUsers(new UserRequest())[$userId]->getId());
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userCredentials = new CredentialsRequest();
        $userProfile->setId('phpUnitTesterOne')
            ->setFirstName('PHP')
            ->setLastName('UNIT')
            ->setEmail('PHP_UNIT_SQUAD@CAMUNDA.COM');
        $userCredentials->setPassword('1337-42-23');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        self::$us->createUser($user);
        $this->assertEquals('shentschel', self::$us->getUsers(new UserRequest())[$userId + 1]->getId());
        $this->assertEquals('phpUnitTesterOne', self::$us->getUsers(new UserRequest())[$userId]->getId());
        $this->assertEquals('shentschel', self::$us->getUsers($filteredUser)[0]->getId());
        $this->assertObjectNotHasAttribute('user_1', self::$us->getUsers($filteredUser));
        self::$us->deleteUser('shentschel');
        self::$us->deleteUser('phpUnitTesterOne');
    }

    /**
     * @throws \Exception
     */
    function testGetUserCount()
    {
        $filteredUser = new UserRequest();
        $filteredUser->setFirstName('stefan');
        $count = self::$us->getCount(new UserRequest());
        $countFiltered = self::$us->getCount($filteredUser);
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userCredentials = new CredentialsRequest();
        $userProfile->setId('shentschel')
            ->setFirstName('stefan')
            ->setLastName('hentschel')
            ->setEmail('stefan.hentschel@camunda.com');
        $userCredentials->setPassword('123456');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        self::$us->createUser($user);
        $this->assertEquals($count + 1, self::$us->getCount(new UserRequest()));
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userCredentials = new CredentialsRequest();
        $userProfile->setId('jonny1')
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setEmail('john.doe@who.com');
        $userCredentials->setPassword('1337-42-23');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        self::$us->createUser($user);
        $this->assertEquals($count + 2, self::$us->getCount(new UserRequest()));
        $this->assertEquals($countFiltered + 1, self::$us->getCount($filteredUser));
        self::$us->deleteUser('shentschel');
        self::$us->deleteUser('jonny1');
        $this->assertEquals($count, self::$us->getCount(new UserRequest()));
    }

    /**
     * @throws \Exception
     */
    function testUpdateUserProfile()
    {
        $filteredUser = new UserRequest();
        $filteredUser->setFirstName('stefan');
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userCredentials = new CredentialsRequest();
        $userProfile->setId('shentschel')
            ->setFirstName('stefan')
            ->setLastName('hentschel')
            ->setEmail('stefan.hentschel@camunda.com');
        $userCredentials->setPassword('123456');
        $user->setProfile($userProfile)->setCredentials($userCredentials);
        self::$us->createUser($user);
        $this->assertEquals('stefan', self::$us->getProfile('shentschel')->getFirstName());
        $userProfile = new ProfileRequest();
        $userProfile->setId('shentschel')
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setEmail('john.doe@who.com');
        self::$us->updateProfile('shentschel', $userProfile);
        $this->assertEquals('John', self::$us->getProfile('shentschel')->getFirstName());
        self::$us->deleteUser('shentschel');
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
