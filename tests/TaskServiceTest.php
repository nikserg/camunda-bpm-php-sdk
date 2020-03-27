<?php

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\CredentialsRequest;
use org\camunda\php\sdk\entity\request\ProfileRequest;
use org\camunda\php\sdk\entity\request\TaskRequest;
use org\camunda\php\sdk\entity\request\UserRequest;
use org\camunda\php\sdk\entity\request\IdentityLinksRequest;
use org\camunda\php\sdk\service\TaskService;
use org\camunda\php\sdk\service\UserService;

include('../vendor/autoload.php');

class TaskServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var TaskService
     */
    protected static $ts;
    /**
     * @var UserService
     */
    protected static $us;

    public static function setUpBeforeClass(): void
    {
        self::$ts = new TaskService('http://localhost:8080/engine-rest');
        self::$us = new UserService('http://localhost:8080/engine-rest');
    }

    /**
     * @throws \Exception
     */
    function testGetSingleTask()
    {
        $tasks = self::$ts->getTasks(new TaskRequest());
        foreach ($tasks as $task) {
            if (!preg_match('/^waitStates\:.*|^calledProcess:.*/', $task->getProcessDefinitionId())) {
                $this->assertEquals('demo', self::$ts->getTask($task->getId())->getAssignee());
                break;
            }
        };
    }

    /**
     * @throws \Exception
     */
    function testGetTasks()
    {
        $this->assertGreaterThan(0, count(get_object_vars(self::$ts->getTasks(new TaskRequest()))));
        $this->assertGreaterThan(0, count(get_object_vars(self::$ts->getTasks(new TaskRequest(), true))));
        $tr = new TaskRequest();
        $tr->setAssignee('demo');
        $this->assertGreaterThan(0, count(get_object_vars(self::$ts->getTasks($tr, true))));
        $this->assertGreaterThan(0, count(get_object_vars(self::$ts->getTasks($tr))));
        $tasks = self::$ts->getTasks(new TaskRequest());
        foreach ($tasks as $task) {
            if (!preg_match('/^waitStates\:.*|^calledProcess:.*/', $task->getProcessDefinitionId())) {
                $this->assertEquals('demo', self::$ts->getTask($task->getId())->getAssignee());
                break;
            }
        };
    }

    /**
     * @throws \Exception
     */
    function testGetTaskCount()
    {
        $this->assertGreaterThan(0, self::$ts->getCount(new TaskRequest()));
        $this->assertGreaterThan(0, self::$ts->getCount(new TaskRequest(), true));
        $tr = new TaskRequest();
        $tr->setAssignee('demo');
        $this->assertGreaterThan(0, self::$ts->getCount($tr));
        $this->assertGreaterThan(0, self::$ts->getCount($tr, true));
    }

    /**
     * @throws \Exception
     */
    function testGetFormKey()
    {
        $tasks = self::$ts->getTasks(new TaskRequest());
        foreach ($tasks as $task) {
            if (!preg_match('/^waitStates\:.*|^calledProcess:.*/', $task->getProcessDefinitionId())) {
                $this->assertEquals('embedded:app:forms/assign-approver.html',
                    self::$ts->getFormKey($task->getId())->getKey());
                break;
            }
        }
    }

    /**
     * @throws \Exception
     */
    function testClaimTask()
    {
        $ur = new UserRequest();
        $up = new ProfileRequest();
        $uc = new CredentialsRequest();
        $up->setId('shentschel')
            ->setFirstName('Stefan')
            ->setLastName('Hentschel')
            ->setEmail('stefan.hentschel@camunda.com');
        $uc->setPassword('654321');
        $ur->setProfile($up)->setCredentials($uc);
        self::$us->createUser($ur);
        $task = self::$ts->getTasks(new TaskRequest())[1];
        $tr = new TaskRequest();
        $tr->setUserId('shentschel');
        self::$ts->unclaimTask($task->getId());
        self::$ts->claimTask($task->getId(), $tr);
        $this->assertEquals('shentschel', self::$ts->getTask($task->getId())->getAssignee());
        self::$ts->unclaimTask($task->getId());
        self::$ts->getTask($task->getId())->getAssignee();
        $tr->setUserId('demo');
        self::$ts->claimTask($task->getId(), $tr);
        self::$ts->getTask($task->getId())->getAssignee();
        self::$us->deleteUser('shentschel');
    }

    /**
     * @throws \Exception
     */
    function testUnclaimTask()
    {
        $ur = new UserRequest();
        $up = new ProfileRequest();
        $uc = new CredentialsRequest();
        $up->setId('shentschel')
            ->setFirstName('Stefan')
            ->setLastName('Hentschel')
            ->setEmail('stefan.hentschel@camunda.com');
        $uc->setPassword('654321');
        $ur->setProfile($up)->setCredentials($uc);
        self::$us->createUser($ur);
        $task = self::$ts->getTasks(new TaskRequest())[1];
        $tr = new TaskRequest();
        $tr->setUserId('shentschel');
        self::$ts->unclaimTask($task->getId());
        $this->assertNull(self::$ts->getTask($task->getId())->getAssignee());
        $tr->setUserId('demo');
        self::$ts->claimTask($task->getId(), $tr);
        self::$us->deleteUser('shentschel');
    }

    function testCompleteTask()
    {
        $this->markTestIncomplete(
            'Needs a good method to deploy processes on the fly with the engine'
        );
    }

    function testResolveTask()
    {
        $this->markTestIncomplete(
            'Needs a good method to deploy processes on the fly with the engine'
        );
    }

    /**
     * @throws \Exception
     */
    function testDelegateTask()
    {
        $ur = new UserRequest();
        $up = new ProfileRequest();
        $uc = new CredentialsRequest();
        $up->setId('shentschel')
            ->setFirstName('Stefan')
            ->setLastName('Hentschel')
            ->setEmail('stefan.hentschel@camunda.com');
        $uc->setPassword('654321');
        $ur->setProfile($up)->setCredentials($uc);
        self::$us->createUser($ur);
        $tasks = self::$ts->getTasks(new TaskRequest());
        $tr = new TaskRequest();
        $tr->setUserId('shentschel');
        foreach ($tasks as $task) {
            if (!preg_match('/^waitStates\:.*/', $task->getProcessDefinitionId())) {
                self::$ts->delegateTask($task->getId(), $tr);
                $this->assertEquals('PENDING', self::$ts->getTask($task->getId())->getDelegationState());
                self::$ts->unclaimTask($task->getId());
                $tr->setUserId('demo');
                self::$ts->claimTask($task->getId(), $tr);
                break;
            }
        };
        self::$us->deleteUser('shentschel');
    }

    /**
     * @throws \Exception
     */
    function testSetAssignee()
    {
        $ur = new UserRequest();
        $up = new ProfileRequest();
        $uc = new CredentialsRequest();
        $up->setId('shentschel')
            ->setFirstName('Stefan')
            ->setLastName('Hentschel')
            ->setEmail('stefan.hentschel@camunda.com');
        $uc->setPassword('654321');
        $ur->setProfile($up)->setCredentials($uc);
        self::$us->createUser($ur);
        $task = self::$ts->getTasks(new TaskRequest())[1];
        $tr = new TaskRequest();
        $tr->setUserId('shentschel');
        self::$ts->setAssignee($task->getId(), $tr);
        $this->assertEquals('shentschel', self::$ts->getTask($task->getId())->getAssignee());
        $tr = new TaskRequest();
        $tr->setUserId('demo');
        self::$ts->setAssignee($task->getId(), $tr);
        self::$us->deleteUser($up->getId());
    }

    /**
     * @throws \Exception
     */
    function testGetIdentityLinks()
    {
        $task = self::$ts->getTasks(new TaskRequest())[0];
        $ilr = new IdentityLinksRequest();
        $ilr->setType('assignee');
        $ilr->setUserId('demo');
        $il = self::$ts->getIdentityLinks($task->getId(), $ilr)[0];
        $this->assertEquals('assignee', $il->getType());
        $this->assertEquals('demo', $il->getUserId());
    }

    /**
     * @throws \Exception
     */
    function testAddIdentityLinks()
    {
        $task = self::$ts->getTasks(new TaskRequest())[0];
        $ilr = new IdentityLinksRequest();
        $ilr->setType('candidate');
        $ilr->setGroupId('demo');
        self::$ts->addIdentityLink($task->getId(), $ilr);
        $this->assertGreaterThan(0, count(get_object_vars(self::$ts->getIdentityLinks($task->getId(), $ilr))));
    }

    /**
     * @throws \Exception
     */
    function testDeleteIdentityLinks()
    {
        $task = self::$ts->getTasks(new TaskRequest())[0];
        $ilr = new IdentityLinksRequest();
        $ilr->setType('candidate');
        $ilr->setGroupId('demo');
        self::$ts->deleteIdentityLink($task->getId(), $ilr);
        $this->assertEquals(0, count(get_object_vars(self::$ts->getIdentityLinks($task->getId(), $ilr))));
    }
}