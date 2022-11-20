<?php

namespace App\Component\Lock\Impl;

use App\Component\Lock\Lock;
use Predis\Client;
use Symfony\Component\Lock\LockFactory;
use Symfony\Component\Lock\LockInterface;
use Symfony\Component\Lock\Store\RedisStore;

class RedisLockImpl implements Lock
{
    private $store;
    private $factory;

    public function __construct() {
        $this->store = new RedisStore(new Client('tcp://localhost:6379'));
        $this->factory = new LockFactory($this->store);
    }

    public function lock($resourceId) : ?LockInterface {
        $lock = $this->factory->createLock($resourceId);
        if (!$lock->acquire()) {
            return null;
        }
        return $lock;
    }

    public function unlock(LockInterface $lock) {
        $lock->release();
    }
}