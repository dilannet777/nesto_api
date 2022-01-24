<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

      /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {


        $userLevelCheck = $exception instanceof \jeremykenedy\LaravelRoles\App\Exceptions\RoleDeniedException ||
        $exception instanceof \jeremykenedy\LaravelRoles\App\Exceptions\RoleDeniedException ||
        $exception instanceof \jeremykenedy\LaravelRoles\App\Exceptions\PermissionDeniedException ||
        $exception instanceof \jeremykenedy\LaravelRoles\App\Exceptions\LevelDeniedException ||
        $exception instanceof \InvalidArgumentException;


        
        if ($this->isHttpException($exception)) {

            return Response::json([

                'errors'   =>  json_decode($exception->getMessage())
            ], 422);
        }

        if ($userLevelCheck) {

            if ($request->expectsJson()) {
                return Response::json(array(
                    'error'    =>  403,
                    'message'   =>  __('auth.unauthorised')
                ), 403);
            }
    
            abort(403);
        }

        return parent::render($request, $exception);
    }

    
}
