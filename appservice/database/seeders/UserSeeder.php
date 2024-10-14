<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends AbstractBaseSeeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            'username' => 'brainy_samuel',
            'email' => 'ntowsamuel@gmail.com',
            'password' => Hash::make('password.123'),
            'status_id' => $this->getActiveID(),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }

}
