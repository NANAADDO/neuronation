<?php

namespace App\Http\Middleware;

use App\Traits\ApiResTypes;
use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JwtMiddleware
{
    use ApiResTypes;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        {
            try {
                if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json([ 'error' => 'User not found' ], 401);
                }
            } catch (TokenExpiredException $e) {
                return response()->json([ 'error' => 'Token expired' ], 401);
            } catch (TokenInvalidException $e) {
                return response()->json([ 'error' => 'Token invalid' ], 401);
            } catch (JWTException $e) {
                return response()->json([ 'error' => 'Token error: ' . $e->getMessage() ], 401);
            }

            return $next($request);
        }
    }
}
