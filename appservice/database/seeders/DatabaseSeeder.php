<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call([CourseSeeder::class,CategorySeeder::class,StatusSeeder::class,
             UserSeeder::class,ExerciseSeeder::class,SessionSeeder::class,ExerciseHistorySeeder::class]);
    }
}
