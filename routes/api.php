<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\TypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('animals' , AnimalController::class);

Route::apiResource('types' , TypeController::class);
//上一行程式碼等同以下程式碼 (選一種撰寫即可)
//Route::get('types' , [TypeController::class , 'index']);
//Route::post('types' , [TypeController::class , 'store']);
//Route::get('types/{type}' , [TypeController::class , 'show']);
//Route::patch('types/{type}' , [TypeController::class , 'update'] );
//Route::put('types/{type}' , [TypeController::class , 'update']);
//Route::delete('types/{type}' , [TypeController::class , 'destroy']);

