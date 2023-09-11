<?php

namespace Tsky\Qywechat\Traits;

use Psr\SimpleCache\CacheInterface;

trait CacheTrait
{
    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * @param CacheInterface $cache
     */
    public function setCache(CacheInterface $cache): void
    {
        $this->cache = $cache;
    }
}
