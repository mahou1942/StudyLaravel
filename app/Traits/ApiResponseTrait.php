<?php

namespace App\Traits;

trait ApiResponseTrait{
    /**
     *
     * @param mixed $message 錯誤訊息
     * @param mixed $status HTTP狀態碼
     * @param mixed|null $code 選填，自定義錯誤編碼
     * @return \Illuminate\Http\Response
     */

    public function errorResponse($message , $status , $code = null){
        $code = $code ?? $status;

        return response()->json(
            [
                'message' => $message,
                'code' => $code
            ],
            $status
        );

    }
}
