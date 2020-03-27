<?php

namespace org\camunda\php\tests;

include('../vendor/autoload.php');

use org\camunda\php\sdk\entity\request\CredentialsRequest;
use org\camunda\php\sdk\entity\request\GroupRequest;
use org\camunda\php\sdk\entity\request\ProfileRequest;
use org\camunda\php\sdk\entity\request\UserRequest;
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

    public static function setUpBeforeClass(): void
    {
        self::$gs = new GroupService('http://localhost:8080/engine-rest');
        self::$us = new UserService('http://localhost:8080/engine-rest');
    }

    /**
     * @throws \Exception
     */
    function testCreateGroup()
    {
        $groupRequest = new GroupRequest();
        $preCount = self::$gs->getCount($groupRequest);
        $groupRequest->setName('testgroup')
            ->setId('PHP_UNIT_TEST_1')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        $groupRequest = new GroupRequest();
        $groupRequest->setName('testgroup2')
            ->setId('PHP_UNIT_TEST_2')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        $this->assertEquals($preCount + 2, self::$gs->getCount(new GroupRequest()));
        self::$gs->deleteGroup('PHP_UNIT_TEST_1');
        self::$gs->deleteGroup('PHP_UNIT_TEST_2');
    }

    /**
     * @throws \Exception
     */
    function testAddGroupMember()
    {
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userCredentials = new CredentialsRequest();
        $userProfile->setId('shentschel')
            ->setFirstName('Stefan')
            ->setLastName('Hentschel')
            ->setEmail('stefan.hentschel@camunda.com');
        $userCredentials->setPassword('123456');
        $user->setProfile($userProfile)
            ->setCredentials($userCredentials);
        self::$us->createUser($user);
        $groupRequest = new GroupRequest();
        $groupRequest->setName('testgroup')
            ->setId('PHP_UNIT_TEST_1')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        $groupRequest = new GroupRequest();
        $groupRequest->setName('testgroup2')
            ->setId('PHP_UNIT_TEST_2')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        self::$gs->addMember('PHP_UNIT_TEST_1', 'shentschel');
        $filteredGroup = new GroupRequest();
        $filteredGroup->setMember('shentschel');
        $this->assertEquals(1, self::$gs->getCount($filteredGroup));
        self::$gs->deleteGroup('PHP_UNIT_TEST_1');
        self::$gs->deleteGroup('PHP_UNIT_TEST_2');
        self::$us->deleteUser('shentschel');
    }

    /**
     * @throws \Exception
     */
    function testDeleteGroup()
    {
        $groupRequest = new GroupRequest();
        $groupRequest->setName('testgroup')
            ->setId('PHP_UNIT_TEST_1')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        $groupRequest = new GroupRequest();
        $groupRequest->setName('testgroup2')
            ->setId('PHP_UNIT_TEST_2')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        $count = self::$gs->getCount(new GroupRequest());
        self::$gs->deleteGroup('PHP_UNIT_TEST_1');
        self::$gs->deleteGroup('PHP_UNIT_TEST_2');
        $this->assertEquals($count - 2, self::$gs->getCount(new GroupRequest()));
    }

    /**
     * @throws \Exception
     */
    function testRemoveGroupMember()
    {
        $user = new UserRequest();
        $userProfile = new ProfileRequest();
        $userCredentials = new CredentialsRequest();
        $userProfile->setId('shentschel')
            ->setFirstName('Stefan')
            ->setLastName('Hentschel')
            ->setEmail('stefan.hentschel@camunda.com');
        $userCredentials->setPassword('123456');
        $user->setProfile($userProfile)
            ->setCredentials($userCredentials);
        self::$us->createUser($user);
        $groupRequest = new GroupRequest();
        $groupRequest->setName('testgroup')
            ->setId('PHP_UNIT_TEST_1')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        $groupRequest = new GroupRequest();
        $groupRequest->setName('testgroup2')
            ->setId('PHP_UNIT_TEST_2')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        self::$gs->addMember('PHP_UNIT_TEST_1', 'shentschel');
        $filteredGroup = new GroupRequest();
        $filteredGroup->setMember('shentschel');
        $this->assertEquals(1, self::$gs->getCount($filteredGroup));
        self::$gs->removeMember('PHP_UNIT_TEST_1', 'shentschel');
        $this->assertEquals(0, self::$gs->getCount($filteredGroup));
        self::$gs->deleteGroup('PHP_UNIT_TEST_1');
        self::$gs->deleteGroup('PHP_UNIT_TEST_2');
        self::$us->deleteUser('shentschel');
    }

    /**
     * @throws \Exception
     */
    function testGetGroup()
    {
        $groupRequest = new GroupRequest();
        $groupRequest->setName('testgroup')
            ->setId('PHP_UNIT_TEST_1')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        $groupRequest = new GroupRequest();
        $groupRequest->setName('testgroup2')
            ->setId('PHP_UNIT_TEST_2')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        $this->assertEquals('testgroup', self::$gs->getGroup('PHP_UNIT_TEST_1')->getName());
        self::$gs->deleteGroup('PHP_UNIT_TEST_2');
        self::$gs->deleteGroup('PHP_UNIT_TEST_1');
    }

    /**
     * @throws \Exception
     */
    function testGetGroups()
    {
        $groupRequest = new GroupRequest();
        $groupRequest->setName('testgroup')
            ->setId('PHP_UNIT_TEST_1')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        $this->assertEquals('PHP_UNIT_TEST_1', self::$gs->getGroups(new GroupRequest())[0]->getId());
        $groupRequest = new GroupRequest();
        $groupRequest->setName('testgroup2')
            ->setId('PHP_UNIT_TEST_2')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        $this->assertEquals('PHP_UNIT_TEST_2', self::$gs->getGroups(new GroupRequest())[0]->getId());
        $filteredGroup = new GroupRequest();
        $filteredGroup->setName('testgroup');
        $this->assertEquals('PHP_UNIT_TEST_1', self::$gs->getGroups($filteredGroup)[0]->getId());
        $this->assertObjectNotHasAttribute('group_1', self::$gs->getGroups($filteredGroup));
        self::$gs->deleteGroup('PHP_UNIT_TEST_2');
        self::$gs->deleteGroup('PHP_UNIT_TEST_1');
    }

    /**
     * @throws \Exception
     */
    function testGetGroupCount()
    {
        $groupRequest = new GroupRequest();
        $initialCount = self::$gs->getCount($groupRequest);
        $groupRequest->setName('testgroup')
            ->setId('PHP_UNIT_TEST_1')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        $this->assertEquals($initialCount + 1, self::$gs->getCount(new GroupRequest()));
        $groupRequest = new GroupRequest();
        $groupRequest->setName('testgroup2')
            ->setId('PHP_UNIT_TEST_2')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        $this->assertEquals($initialCount + 2, self::$gs->getCount(new GroupRequest()));
        $filteredGroup = new GroupRequest();
        $filteredGroup->setName('testgroup');
        $this->assertEquals(1, self::$gs->getCount($filteredGroup));
        self::$gs->deleteGroup('PHP_UNIT_TEST_1');
        self::$gs->deleteGroup('PHP_UNIT_TEST_2');
        $this->assertEquals($initialCount, self::$gs->getCount(new GroupRequest()));
    }

    /**
     * @throws \Exception
     */
    function testUpdateGroup()
    {
        $groupRequest = new GroupRequest();
        $groupRequest->setName('testgroup')
            ->setId('PHP_UNIT_TEST_1')
            ->setType('Organizational Unit');
        self::$gs->createGroup($groupRequest);
        $this->assertEquals('testgroup', self::$gs->getGroup('PHP_UNIT_TEST_1')->getName());
        $update = new GroupRequest();
        $update->setName('Testgroup2')
            ->setId('PHP_UNIT_TEST_1')
            ->setType('Organizational Unit');
        self::$gs->updateGroup('sales', $update);
        $this->assertEquals('Testgroup2', self::$gs->getGroup('PHP_UNIT_TEST_1')->getName());
        self::$gs->deleteGroup('PHP_UNIT_TEST_1');
    }

    /**
     * @throws \Exception
     */
    function testGetGroupResourceOptions()
    {
        $mainOption = self::$gs->getResourceOption();
        $this->assertObjectHasAttribute('method', $mainOption->getLinks()[0]);
        $instanceOption = self::$gs->getResourceInstanceOption('sales');
        $this->assertObjectHasAttribute('method', $instanceOption->getLinks()[0]);
    }
}
