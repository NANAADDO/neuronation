<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExerciseHistorySeeder extends AbstractBaseSeeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i=1; $i<=40; $i++)
        {
            DB::table('exercise_histories')->insert([
                'session_id' => $this->getSessionID(),
                'exercise_id' => $this->getRandomExcerciseID(),
                'scores' => rand(50, 90),
                'created_at' => Carbon::now()->subDays(rand(0, 80))->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
