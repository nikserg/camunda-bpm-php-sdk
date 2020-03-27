<?php

namespace org\camunda\php\sdk\entity\response;

use org\camunda\php\sdk\helper\CastHelper;

class Identity extends CastHelper
{
    protected $groups;
    protected $groupUsers;

    /**
     * @param mixed $groupUsers
     */
    function setGroupUsers($groupUsers)
    {
        $this->groupUsers = $groupUsers;
    }

    /**
     * @return mixed
     */
    function getGroupUsers()
    {
        return $this->groupUsers;
    }

    /**
     * @param mixed $groups
     */
    function setGroups($groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return mixed
     */
    function getGroups()
    {
        return $this->groups;
    }
}