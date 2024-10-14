<?php

namespace App\Services\Interface;

use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

interface CacheContract
{
    public function setCacheData(string $cacheKey, array $cacheValue, int $cacheExpireTime): void;

    public function getCacheData(string $cacheName): mixed;

    public function setCacheToForget(string $cacheName): void;

    public function verifyCacheHasData(string $cacheName): bool;


}
