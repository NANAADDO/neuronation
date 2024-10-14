<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\Exercise;
use App\Models\Session;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class AbstractBaseSeeder extends Seeder
{


    public function getActiveID ()
    {
        return Status::where('name', "Active")->first()->id;
    }

    public function getUserID ()
    {
        return User::inRandomOrder()->first()->id;
    }

    public function getSessionID ()
    {
        return Session::inRandomOrder()->first()->id;
    }

    public function getRandomExcerciseID ()
    {
        return Exercise::inRandomOrder()->first()->id;
    }
    public function getRandomCategoryID ()
    {
        return Category::inRandomOrder()->first()->id;
    }
    public function getRandomCourseID ()
    {
        return Course::inRandomOrder()->first()->id;
    }
}
