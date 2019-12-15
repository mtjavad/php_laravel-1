<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
//        if ($exception instanceof ModelNotFoundException) {
//            return $this->MyExceptionHandler($request, $exception);
//        }
//        if ($exception instanceof ValidationException) {
//            return $this->MyExceptionHandler($request, $exception);
//        }
        if ($exception instanceof AuthenticationException) {
            return $this->MyExceptionHandler($request, $exception);
        }
        return parent::render($request, $exception);
    }

    /**
     * @param $request
     * @param Exception $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function MyExceptionHandler($request, Exception $exception)
    {
        if (request()->expectsJson()) {
            return response()->json(['msg'=>'شما اجازه دسترسی ندارید','status'=>'error']);
        } else {
            return parent::render($request, $exception);
        }
    }
}
