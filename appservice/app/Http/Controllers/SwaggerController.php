<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use OpenApi\Generator;

class SwaggerController extends Controller
{
    /**
     * @OA\Info(title="My API", version="1.0")
     */
    public function index()
    {
        $openapi = Generator::scan([ base_path('app') ]);
        return response()->json($openapi, 200);
    }
}
