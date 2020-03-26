<?php
/**
 * Created by IntelliJ IDEA.
 * User: hentschel
 * Date: 26.07.13
 * Time: 09:25
 * To change this template use File | Settings | File Templates.
 */

namespace org\camunda\php\tests;

use org\camunda\php\sdk\entity\request\CredentialsRequest;
use org\camunda\php\sdk\entity\request\ProfileRequest;
use org\camunda\php\sdk\entity\request\TaskRequest;
use org\camunda\php\sdk\entity\request\UserRequest;
use org\camunda\php\sdk\entity\request\IdentityLinksRequest;
use org\camunda\php\sdk\service\TaskService;
use org\camunda\php\sdk\service\UserService;

include('../../vendor/autoload.php');

class TaskServiceTest extends \PHPUnit\Framework\TestCase
{
    protected static $restApi;
    protected static $ts;
    protected static $us;

    public static function setUpBeforeClass(): void
    {
        self::$restApi = 'http://localhost:8080/engine-rest';
        self::$ts = new TaskService(self::$restApi);
        self::$us = new UserService(self::$restApi);
        print("\n\nCLASS: " . __CLASS__ . "\n");
    }

    public static function tearDownAfterClass(): void
    {
        self::$restApi = null;
    }

    /**
     * @test
     */
    public function getSingleTask()
    {
        $tasks = self::$ts->getTasks(new TaskRequest());
        foreach ($tasks AS $task) {
            if (!preg_match('/^waitStates\:.*|^calledProcess:.*/', $task->getProcessDefinitionId())) {
                $this->assertEquals('demo', self::$ts->getTask($task->getId())->getAssignee());
                break;
            }
        };
    }

    //--------------------------  TEST GET TASKS  ----------------------------------------

    /**
     * @test
     */
    public function getTasks()
    {
        $this->assertGreaterThan(0, count(get_object_vars(self::$ts->getTasks(new TaskRequest()))));
        $this->assertGreaterThan(0, count(get_object_vars(self::$ts->getTasks(new TaskRequest(), true))));

        $tr = new TaskRequest();
        $tr->setAssignee('demo');
        $this->assertGreaterThan(0, count(get_object_vars(self::$ts->getTasks($tr, true))));
        $this->assertGreaterThan(0, count(get_object_vars(self::$ts->getTasks($tr))));

        $tasks = self::$ts->getTasks(new TaskRequest());
        foreach ($tasks AS $task) {
            if (!preg_match('/^waitStates\:.*|^calledProcess:.*/', $task->getProcessDefinitionId())) {
                $this->assertEquals('demo', self::$ts->getTask($task->getId())->getAssignee());
                break;
            }
        };
    }

    /**
     * @test
     */
    public function getTaskCount()
    {
        $this->assertGreaterThan(0, self::$ts->getCount(new TaskRequest()));
        $this->assertGreaterThan(0, self::$ts->getCount(new TaskRequest(), true));

        $tr = new TaskRequest();
        $tr->setAssignee('demo');
        $this->assertGreaterThan(0, self::$ts->getCount($tr));
        $this->assertGreaterThan(0, self::$ts->getCount($tr, true));
    }

    /**
     * @test
     */
    public function getFormKey()
    {
        $tasks = self::$ts->getTasks(new TaskRequest());
        foreach ($tasks AS $task) {
            if (!preg_match('/^waitStates\:.*|^calledProcess:.*/', $task->getProcessDefinitionId())) {
                $this->assertEquals('embedded:app:forms/assign-approver.html',
                    self::$ts->getFormKey($task->getId())->getKey());
                break;
            }
        }
    }

    /**
     * @test
     */
    public function claimTask()
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

        $task = self::$ts->getTasks(new TaskRequest())->task_1;
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
     * @test
     */
    public function unclaimTask()
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

        $task = self::$ts->getTasks(new TaskRequest())->task_1;
        $tr = new TaskRequest();
        $tr->setUserId('shentschel');
        self::$ts->unclaimTask($task->getId());

        $this->assertNull(self::$ts->getTask($task->getId())->getAssignee());
        $tr->setUserId('demo');
        self::$ts->claimTask($task->getId(), $tr);
        self::$us->deleteUser('shentschel');

    }

    /**
     * TODO: Needs a good method to deploy processes on the fly with the engine
     *
     * @test
     */
    public function completeTask()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

    }

    /**
     * TODO: Needs a good method to deploy processes on the fly with the engine
     *
     * @test
     */
    public function resolveTask()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

    }

    /**
     * @test
     */
    public function delegateTask()
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

        foreach ($tasks AS $task) {
            if (!preg_match('/^waitStates\:.*/', $task->getProcessDefinitionId())) {
                self::$ts->delegateTask($task->getId(), $tr);
                $this->assertEquals('PENDING', self::$ts->getTask($task->getId())->getDelegationState());
                self::$ts->unclaimTask($task->getId(), $tr);
                $tr->setUserId('demo');
                self::$ts->claimTask($task->getId(), $tr);
                break;
            }
        };

        self::$us->deleteUser('shentschel');
    }

    /**
     * @test
     */
    public function setAssignee()
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

        $task = self::$ts->getTasks(new TaskRequest())->task_1;
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
     * @test
     */
    public function getIdentityLinks()
    {
        $task = self::$ts->getTasks(new TaskRequest())->task_0;
        $ilr = new IdentityLinksRequest();
        $ilr->setType('assignee');
        $ilr->setUserId('demo');

        $il = self::$ts->getIdentityLinks($task->getId(), $ilr)->identityLink_0;
        $this->assertEquals('assignee', $il->getType());
        $this->assertEquals('demo', $il->getUserId());
    }

    /**
     * @test
     */
    public function addIdentityLinks()
    {
        $task = self::$ts->getTasks(new TaskRequest())->task_0;
        $ilr = new IdentityLinksRequest();
        $ilr->setType('candidate');
        $ilr->setGroupId('demo');

        self::$ts->addIdentityLink($task->getId(), $ilr);
        $this->assertGreaterThan(0, count(get_object_vars(self::$ts->getIdentityLinks($task->getId(), $ilr))));
    }

    /**
     * @test
     */
    public function deleteIdentityLinks()
    {
        $task = self::$ts->getTasks(new TaskRequest())->task_0;
        $ilr = new IdentityLinksRequest();
        $ilr->setType('candidate');
        $ilr->setGroupId('demo');

        self::$ts->deleteIdentityLink($task->getId(), $ilr);
        $this->assertEquals(0, count(get_object_vars(self::$ts->getIdentityLinks($task->getId(), $ilr))));
    }
}