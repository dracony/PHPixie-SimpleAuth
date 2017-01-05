<?php

namespace Project\App;

/**
 * Here you can define wrappers for the ORM to use.
 */
class ORMWrappers extends \PHPixie\ORM\Wrappers\Implementation
{
    protected $databaseEntities = array('user');
    protected $databaseRepositories = array('user');

    public function userEntity($entity)
    {
        return new ORMWrappers\User\Entity($entity);
    }

    public function userRepository($repository)
    {
        return new ORMWrappers\User\Repository($repository);
    }
}