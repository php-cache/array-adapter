<?php

/*
 * This file is part of php-cache\array-adapter package.
 *
 * (c) 2015-2015 Aaron Scherer <aequasi@gmail.com>, Tobias Nyholm <tobias.nyholm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Cache\Adapter\PHPArray;

use Cache\Adapter\Common\AbstractCachePool;
use Psr\Cache\CacheItemInterface;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class ArrayCachePool extends AbstractCachePool
{
    /**
     * @type array
     */
    private $cache;

    /**
     * @param array $cache
     */
    public function __construct(array $cache = [])
    {
        $this->cache = $cache;
    }

    protected function fetchObjectFromCache($key)
    {
        if (isset($this->cache[$key])) {
            return $this->cache[$key];
        }

        return false;
    }

    protected function clearAllObjectsFromCache()
    {
        $this->cache = [];

        return true;
    }

    protected function clearOneObjectFromCache($key)
    {
        unset($this->cache[$key]);

        return true;
    }

    protected function storeItemInCache($key, CacheItemInterface $item, $ttl)
    {
        $this->cache[$key] = $item;

        return true;
    }
}
