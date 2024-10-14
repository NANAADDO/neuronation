<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\BaseRepository;


class categoryRepository extends BaseRepository
{
    public function model()
    {
        return Category::class;
    }

}
