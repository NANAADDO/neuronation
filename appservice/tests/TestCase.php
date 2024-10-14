<?php

namespace Tests;

use App\Models\User;
use Carbon\Carbon;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    public function getCurrentDate()
    {
        return Carbon::now()->format('Y-m-d H:i:s');
    }

    public function getUserToken(){

        $user = User::where('username',"brainy_samuel")->first();
        return  JWTAuth::fromUser($user);


    }

    public function getUserDummyCredentials()
    {
        return ['username' => "brainy_samuel", 'password' => "password.123"];
    }
}
