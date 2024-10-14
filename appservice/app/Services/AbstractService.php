<?php

namespace App\Services;

use App\Repositories\apartment\StatusRepository;
use App\Services\Interface\ServiceContract;
use Illuminate\Http\Request;

class AbstractService implements ServiceContract
{
    public object $repositoryEntity;
    public CacheService $cacheService;


    public function all(): array
    {

        return $this->repositoryEntity->all();

    }

    public function create(array $request): array
    {
        return $this->repositoryEntity->create($request);
    }

    public function show($id): array
    {
        return $this->repositoryEntity->show($id);
    }

    public function update(array $request, $id): array
    {
        return $this->repositoryEntity->updateById($id, $request);
    }

    public function delete($id): array
    {
        return $this->repositoryEntity->deleteById($id);
    }
}
