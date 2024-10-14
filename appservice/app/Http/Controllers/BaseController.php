<?php

namespace App\Http\Controllers;

use App\Traits\ApiResTypes;
use App\Traits\ControllerJsonResponse;
use App\Traits\RequestValidation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    use ApiResTypes;
    use RequestValidation;
    use ControllerJsonResponse;

    protected $serviceEntity;
    protected $validationRules;


    public function index(): JsonResponse
    {
        $data = $this->serviceEntity->all();
        return $this->onFetch($data);

    }

    public function create(Request $request): JsonResponse
    {
        $data = $request->all();

        if ($this->checkValidation($request, $this->validationRules) == 0) {

            return $this->validateRequest($request, $this->validationRules);
        }
        $response = $this->serviceEntity->create($data);
        return $this->onCreate($response);

    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();

        if ($this->checkValidation($request, $this->validationRules) == 0) {

            return $this->validateRequest($request, $this->validationRules);
        }
        $response = $this->serviceEntity->update($data, $id);

        return $this->onUpdate($response);
    }

    public function show($id): JsonResponse
    {
        $data = $this->serviceEntity->show($id);;
        return $this->onFetch($data);

    }

    public function destroy($id): JsonResponse
    {

        $response = $this->serviceEntity->delete($id);
        return $this->onDelete($response);


    }


}
