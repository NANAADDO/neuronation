<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SessionSeeder extends AbstractBaseSeeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i=1; $i<=50; $i++)
        {
            DB::table('sessions')->insert([
                'name' => Str::random(32),
                'user_id' => $this->getUserID(),
                'status_id' => $this->getActiveID(),
                'created_at' => Carbon::now()->subDays(rand(0, 80))->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
