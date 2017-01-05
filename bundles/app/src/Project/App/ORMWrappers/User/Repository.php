<?php

namespace Project\App\ORMWrappers\User;

class Repository extends \PHPixie\AuthORM\Repositories\Type\Login
{
    protected function loginFields()
    {
         return array('username');
    }
}