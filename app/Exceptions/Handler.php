<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

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
        $model = $exception instanceof ModelNotFoundException ? explode('\\', $exception->getModel()) : [];
        $model =  end($model);

        $exceptionMappings = [
            // Framework Exceptions
            RouteNotFoundException::class => ['message' => 'Unauthorized.', 'status' => Response::HTTP_UNAUTHORIZED],
            NotFoundHttpException::class => ['message' => $exception->getMessage(), 'status' => Response::HTTP_NOT_FOUND],
            ModelNotFoundException::class => ['message' => $model . ' - The register has been not found.', 'status' => Response::HTTP_NOT_FOUND],
            QueryException::class => ['message' => 'Database error.', 'status' => Response::HTTP_INTERNAL_SERVER_ERROR],
            // Custom Exceptions
            InvalidUuidException::class => $this->formatReturn($exception),
            NotDataFoundException::class => $this->formatReturn($exception),
            ClassNotExistsException::class => $this->formatReturn($exception),
            NoNewRecordsException::class => $this->formatReturn($exception),
            InvalidParamsException::class => $this->formatReturn($exception),
            InvalidTransactionException::class => $this->formatReturn($exception),
        ];

        if (array_key_exists(get_class($exception), $exceptionMappings)) {
            $mapping = $exceptionMappings[get_class($exception)];

            $messageError = ['message' => $mapping['message']];

            if (method_exists($exception, 'getIds')) {
                $messageError['id'] = $exception->getIds()[0];
            }

            return response()->json($messageError, $mapping['status']);
        }
        
        return ExceptionHandler::render($request, $exception);
    }

    private function formatReturn(Throwable $exception): array
    {
        return  [
            'message' => $exception->getMessage(),
            'status' => method_exists($exception, 'getStatus') ? $exception->getStatus() : null
        ];
    }
}
