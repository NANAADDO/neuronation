<?php

namespace App\Exceptions;

use App\Traits\ApiResTypes;
use Illuminate\Auth\AuthenticationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;
use Illuminate\Http\JsonResponse;

class Handler extends ExceptionHandler
{
    use ApiResTypes;
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [

    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|JsonResponse
     */
    public function render($request, Throwable $exception)
    {
        if  ($exception instanceof UnauthorizedHttpException) {
            return $this->Unauthorized($exception->getMessage());
        }

        if ($request->wantsJson() || $request->is('api/*')) {
            return $this->InternalServerError($exception->getMessage());
        }

        return parent::render($request, $exception);
    }

    /**
     * Handle unauthenticated exceptions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $this->Unauthorized();
    }
}
