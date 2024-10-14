<?php

namespace App\Http\Controllers;


use App\Services\StatusService;

class StatusController extends BaseController
{

    protected $validationRules = [ "name" => "required" ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StatusService $service)
    {
        $this->serviceEntity = $service;
    }


}
