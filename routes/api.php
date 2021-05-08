<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Login
Route::post('login', [AuthController::class, 'login'])->name('api.login');

// User
Route::get('user', [UserController::class, 'index'])->name('api.admin.user');
//Route::get('user', [Controller::class, 'index']);

Route::post('user', [UserController::class, 'store']);

Route::put('user/{id}', [UserController::class, 'update']);

Route::delete('user/{id}', [UserController::class, 'destroy']);

// Post
Route::get('post', 'App\Http\Controllers\Api\PostController@index');

Route::post('post', [PostController::class, 'store'])->name('post.created');

Route::put('post/{post}', 'App\Http\Controllers\Api\PostController@update');

Route::delete('post/{post}', 'App\Http\Controllers\Api\PostController@destroy');

// Category
Route::get('category', 'App\Http\Controllers\Api\CategoryController@index');

Route::get('category/{name}', 'App\Http\Controllers\Api\CategoryController@show');

Route::get('category/{id}', 'App\Http\Controllers\Api\CategoryController@showByID');

Route::post('category', 'App\Http\Controllers\Api\CategoryController@store');

Route::put('category/{id}', 'App\Http\Controllers\Api\CategoryController@update');

Route::delete('category/{category}', 'App\Http\Controllers\Api\CategoryController@destroy');
