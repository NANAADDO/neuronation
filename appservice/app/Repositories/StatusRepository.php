<?php

namespace App\Repositories;

use App\Models\Status;
use App\Repositories\BaseRepository;


class StatusRepository extends BaseRepository
{
    public function model()
    {
        return Status::class;
    }

}
