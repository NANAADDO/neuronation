<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [ 'Puzzle', 'ClockWise', 'ArrowDirection', 'WordForming', 'ShapesMovement',
            'ShapesMovement','LightMovement','PassMovement','CardForming'];

        foreach ($list as $data)
        {
            DB::table('courses')->insert([
                'name' => $data,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);
        }
    }
}
