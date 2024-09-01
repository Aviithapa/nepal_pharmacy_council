<?php

namespace App\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use PDOException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
        $this->reportable(function (Throwable $exception) {
    
            if ($exception instanceof PDOException && $exception->getCode() == 2002) {
                // Display a custom error page for database connection issues
                return response()->view('errors.custom-database-error', [], 500);
            }
    
            if ($exception instanceof QueryException) {
                // Render the same error page for general query exceptions
                return response()->view('errors.custom-database-error', [], 500);
            }
        
    
            if ($exception instanceof HttpException) {
                // For HTTP-related exceptions like 404, 403, etc.
                return response()->view('errors.custom-http-error', [], $exception->getStatusCode());
            }
        });
    }

}
