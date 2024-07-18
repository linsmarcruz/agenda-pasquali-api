<?php

use App\Exceptions\ClassNotExistsException;
use App\Exceptions\Handler;
use App\Exceptions\InvalidParamsException;
use App\Exceptions\InvalidTransactionException;
use App\Exceptions\InvalidUuidException;
use App\Exceptions\NoNewRecordsException;
use App\Exceptions\NotDataFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $exception, Request $request) {
            function formatReturn(Throwable $exception): array
            {
                return  [
                    'message' => $exception->getMessage(),
                    'status' => isset($exception->status) ? $exception->status : Response::HTTP_INTERNAL_SERVER_ERROR
                ];
            }
            $model = $exception instanceof ModelNotFoundException ? explode('\\', $exception->getModel()) : [];
            $model =  end($model);

            $exceptionMappings = [
                // Framework Exceptions
                RouteNotFoundException::class => ['message' => 'Unauthorized.', 'status' => Response::HTTP_UNAUTHORIZED],
                NotFoundHttpException::class => ['message' => $exception->getMessage(), 'status' => Response::HTTP_NOT_FOUND],
                ModelNotFoundException::class => ['message' => $model . ' - The register has been not found.', 'status' => Response::HTTP_NOT_FOUND],
                QueryException::class => ['message' => 'Database error.', 'status' => Response::HTTP_INTERNAL_SERVER_ERROR],
                // Custom Exceptions
                InvalidUuidException::class => formatReturn($exception),
                NotDataFoundException::class => formatReturn($exception),
                ClassNotExistsException::class => formatReturn($exception),
                NoNewRecordsException::class => formatReturn($exception),
                InvalidParamsException::class => formatReturn($exception),
                InvalidTransactionException::class => formatReturn($exception),
                ValidationException::class => formatReturn($exception),
            ];

            if (array_key_exists(get_class($exception), $exceptionMappings)) {
                $mapping = $exceptionMappings[get_class($exception)];

                $messageError = ['message' => $mapping['message']];

                if (method_exists($exception, 'getIds')) {
                    $messageError['id'] = $exception->getIds()[0];
                }

                return response()->json($messageError, $mapping['status']);
            }

            return response()->json([
                'message' => 'Server Error',
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        });
    })->create();
