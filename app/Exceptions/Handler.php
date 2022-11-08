<?php

namespace App\Exceptions;

use App\Traits\ApiResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponseTrait; // 使用特徵，類似將Trait撰寫的方法貼到這個類別中
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }


    public function render($request , Throwable $exception){

        if($request->expectsJson()){
            // 1.Model 找不到資源
            if($exception instanceof ModelNotFoundException){
                // 呼叫 errorResponse方法(特徵撰寫的方法)
                return $this->errorResponse(
            '找不到資源',
            Response::HTTP_NOT_FOUND
                );
            }
            // 2.網址輸入錯誤
            if($exception instanceof NotFoundHttpException){
                return $this->errorResponse(
            '無法找到此網址',
                    Response::HTTP_NOT_FOUND
                );
            }
            // 3.網址不允許該請求動詞（新增判斷）
            if($exception instanceof MethodNotAllowedHttpException){
                return $this->errorResponse(
                    $exception->getMessage(), //
                    Response::HTTP_METHOD_NOT_ALLOWED
                );
            }
        }

        //執行副類別render的程式
        return parent::render($request , $exception);
    }

}
