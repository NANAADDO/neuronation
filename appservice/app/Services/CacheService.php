<?php

namespace App\Services;

use App\Services\Interface\CacheContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheService implements CacheContract
{
    public function setCacheData(string $cacheKey, array $cacheValue, int $cacheExpireTime = 600): void
    {
        Cache::put($cacheKey, $cacheValue, $cacheExpireTime);
    }

    public function getCacheData(string $cacheName): mixed
    {
        return Cache::get($cacheName);
    }

    public function setCacheToForget(string $cacheName): void
    {
        Cache::forget($cacheName);
    }

    public function verifyCacheHasData(string $cacheName): bool
    {
        if (!Cache::has($cacheName)) {

            return false;
        }
        return true;

    }


}
