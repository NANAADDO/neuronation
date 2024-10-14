<?php

namespace App\Services;

use App\constant\CacheKeys;
use App\Repositories\SessionRepository;


class SessionService extends AbstractService
{

    public function __construct(SessionRepository $repository, CacheService $cacheService)
    {
        $this->repositoryEntity = $repository;
        $this->cacheService = $cacheService;
    }

    public function getUserSessionHistoryWithScore($userID): array
    {

        if ($this->cacheService->verifyCacheHasData(CacheKeys::USER_SESSION_HISTORY_WITH_SCORE . $userID)) {
            return $this->cacheService->getCacheData(CacheKeys::USER_SESSION_HISTORY_WITH_SCORE . $userID);
        }
        $data = $this->repositoryEntity->getUserSessionHistoryWithScore($userID);
        $this->cacheService->setCacheData(CacheKeys::USER_SESSION_HISTORY_WITH_SCORE . $userID, $data);
        return $data;

    }

    public function getUserLastestSessionHistoryWithCategory($userID): array
    {

        if ($this->cacheService->verifyCacheHasData(CacheKeys::USER_LATEST_SESSION_WITH_CATEGORY . $userID)) {
            return $this->cacheService->getCacheData(CacheKeys::USER_LATEST_SESSION_WITH_CATEGORY . $userID);
        }

        $data = $this->repositoryEntity->getUserLastestSessionHistoryWithCategory($userID);
        $this->cacheService->setCacheData(CacheKeys::USER_LATEST_SESSION_WITH_CATEGORY . $userID, $data);
        return $data;

    }

}
