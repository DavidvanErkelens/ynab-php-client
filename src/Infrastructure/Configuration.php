<?php

namespace YNAB\Infrastructure;

use DateInterval;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use YNAB\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    private string $apiToken;
    private bool $cachingDisabled = false;
    private CacheItemPoolInterface $cacheItemPool;
    private ?DateInterval $cacheTimeout;

    public function __construct(string $apiToken)
    {
        $this->apiToken = $apiToken;
        $this->cacheItemPool = new ArrayAdapter();
        $this->cacheTimeout = new DateInterval("PT5M");
    }

    public function getToken(): string
    {
        return $this->apiToken;
    }

    public function isCachingDisabled(): bool
    {
        return $this->cachingDisabled;
    }

    public function setCachingDisabled(bool $cachingDisabled): Configuration
    {
        $this->cachingDisabled = $cachingDisabled;
        return $this;
    }

    public function getCacheItemPool(): CacheItemPoolInterface
    {
        return $this->cacheItemPool;
    }

    public function setCacheItemPool(CacheItemPoolInterface $cacheItemPool): Configuration
    {
        $this->cacheItemPool = $cacheItemPool;
        return $this;
    }

    public function getCacheTimeout(): ?DateInterval
    {
        return $this->cacheTimeout;
    }

    public function setCacheTimeout(?DateInterval $cacheTimeout): Configuration
    {
        $this->cacheTimeout = $cacheTimeout;
        return $this;
    }
}
