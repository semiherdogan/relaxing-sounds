<?php

namespace App\Exceptions;

use App\Webservice\ErrorCodes;
use App\Webservice\Response;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // If api url not found
        if ($exception instanceof NotFoundHttpException) {
            return Response::fail(
                ErrorCodes::METHOD_NOT_EXISTS,
                ErrorCodes::METHOD_NOT_EXISTS_MESSAGE
            );
        }


        if ($exception instanceof MethodNotAllowedHttpException) {
            return Response::fail(
                ErrorCodes::METHOD_NOT_ALLOWED,
                ErrorCodes::METHOD_NOT_ALLOWED_MESSAGE
            );
        }


        return parent::render($request, $exception);
    }
}
