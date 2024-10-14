<?php

namespace App\Http\Controllers;


use App\Repositories\LoginRepository;
use App\Services\StatusService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends BaseController
{

    protected $validationRules = [ 'username' => 'required', 'password' => 'required' ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LoginRepository $userAuth)
    {
        $this->serviceEntity = $userAuth;

    }

    public function authenticateUser(Request $request, LoginRepository $userAuth): JsonResponse
    {
        if ($this->checkValidation($request, $this->validationRules) == 0) {

            return $this->validateRequest($request, $this->validationRules);
        }
        return $this->serviceEntity->authenticateUser($request);
    }

}
