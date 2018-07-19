<?php
namespace Wh2Work\LaravelApi\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
/**
 *
 */
trait ApiExceptionTraits
{
    function apiException($request, Exception $exception)
    {
        if($exception instanceof ModelNotFoundException){
            return response([
                'status' => 'error',
                'statusCode' => Response::HTTP_NOT_FOUND,
                "message" => "模型找不到",
            ], Response::HTTP_NOT_FOUND);
        }elseif ($exception instanceof NotFoundHttpException) {
            return response([
                'status' => 'error',
                'statusCode' => Response::HTTP_NOT_FOUND,
                "message" => "路由错误",
            ], Response::HTTP_NOT_FOUND);
        }elseif ($exception instanceof ValidationException){
            return response([
                'status' => 'error',
                'statusCode' => $exception->status,
                "message" => '数据验证错误',
                "errors" => $exception->errors(),
            ], $exception->status);
        }

        return parent::render($request, $exception);
    }
}
