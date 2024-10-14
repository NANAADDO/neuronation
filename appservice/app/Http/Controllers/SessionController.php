<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

use App\Services\SessionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SessionController extends BaseController
{

    protected $validationRules = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SessionService $service)
    {
        $this->serviceEntity = $service;
    }


    public function getUserSessionHistoryWithScore(Request $request, $userID): JsonResponse
    {
        $data = $this->serviceEntity->getUserSessionHistoryWithScore($userID);
        return $this->fetch($data);

    }


    public function getUserLastestSessionHistoryWithCategory(Request $request, $userID): JsonResponse
    {
        $data = $this->serviceEntity->getUserLastestSessionHistoryWithCategory($userID);
        return $this->onFetch($data);

    }


}
