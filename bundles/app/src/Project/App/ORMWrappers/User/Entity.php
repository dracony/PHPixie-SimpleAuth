<?php

namespace Project\App\ORMWrappers\User;

class Entity extends \PHPixie\AuthORM\Repositories\Type\Login\User
{
    public function passwordHash()
    {
         return $this->passwordHash;
    }
}