<?php

namespace YNAB;

use DateInterval;
use Psr\Cache\CacheItemPoolInterface;
use YNAB\Infrastructure\Configuration;

interface ConfigurationInterface
{
    public function getToken(): string;
    public function isCachingDisabled(): bool;
    public function setCachingDisabled(bool $cachingDisabled): ConfigurationInterface;
    public function getCacheItemPool(): CacheItemPoolInterface;
    public function setCacheItemPool(CacheItemPoolInterface $cacheItemPool): ConfigurationInterface;
    public function getCacheTimeout(): ?DateInterval;
    public function setCacheTimeout(?DateInterval $cacheTimeout): ConfigurationInterface;
}
