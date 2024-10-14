<?php


namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait RequestValidation
{
    use ApiResTypes;

    protected function validateRequest($request, $validationRules): JsonResponse
    {

        $validation = Validator::make($request->all(), $validationRules);  //third param: , $this->messages
        return $this->ValidationError($validation->messages());

    }


    protected function checkValidation(Request $request, array $validationRules): int
    {

        $validation = Validator::make($request->all(), $validationRules);  //third param: , $this->messages
        if ($validation->passes()) {
            return 1;
        }
        return 0;
    }

    protected function checkValidationMultiple(Request $request, array $validationRules, array $validoptional): int
    {

        $validation = Validator::make($request->all(), array_merge($validationRules, $validoptional));  //third param: , $this->messages
        if ($validation->passes()) {
            return 1;
        }
        return 0;
    }


}
