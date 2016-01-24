<?php

namespace Cache\Adapter\PHPArray\Tests;

use Cache\Adapter\PHPArray\ArrayCachePool;

trait CreatePoolTrait
{
    private $cacheArray = [];

    public function createCachePool()
    {
        return new ArrayCachePool($this->cacheArray);
    }
}