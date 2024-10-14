<?php

namespace App\Services;

use App\Repositories\StatusRepository;

class StatusService extends AbstractService
{

    public function __construct(StatusRepository $repository)
    {
        $this->repositoryEntity = $repository;

    }

}
