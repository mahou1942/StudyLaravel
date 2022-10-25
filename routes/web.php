<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/a', function () {
    return view('a');
});

//Route::any('/homeLogin', 'PostController@create2');
//
//Route::get('/post/create', [PostController::class, 'create']);
//
//Route::get('/post/create2', [PostController::class, 'create2'])->name("koala");
//
//Route::get('/post/create3', [PostController::class, 'create']);
//
//Route::post('/post', [PostController::class, 'store'])->name("koala2");
//
//
//Route::get('/greeting', function () {
//    return 'Hello World';
//});
//
//
//Route::get('/user', [UserController::class, 'index']);
