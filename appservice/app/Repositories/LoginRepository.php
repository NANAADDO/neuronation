<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\ApiResTypes;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class UserRepository.
 */
class LoginRepository extends BaseRepository
{
    use ApiResTypes;

    /**
     * @return string
     */
    public function model()
    {
        return User::class;
    }


    public function authenticateUser($request): JsonResponse
    {
        $credentials = $request->only('username', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->Unauthorized();
            }
        } catch (JWTException $ex) {

            return $this->InternalServerError();
        }


        return $this->Ok([ "token" => $token ]);

    }

}
