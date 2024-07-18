<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\QueryException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {

        if ($exception instanceof AuthorizationException) {
            return response()->view('errors.403', [], 403);
        }
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }
        if ($exception instanceof QueryException) {
            return response()->view('errors.500', [], 500);
        }

        return parent::render($request, $exception);
    }
}
