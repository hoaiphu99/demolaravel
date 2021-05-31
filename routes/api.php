<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\LikeController;
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

Route::get('user/{id}', [UserController::class, 'show']);

Route::post('user', [UserController::class, 'store']);

Route::put('user/{id}', [UserController::class, 'update']);

Route::delete('user/{id}', [UserController::class, 'destroy']);

// Post
Route::get('post', [PostController::class, 'index']);

Route::get('post/{id}', [PostController::class, 'show']);

Route::get('post/user/{userid}', [PostController::class, 'getPostByUserID']);

Route::get('post/profile/{username}', [PostController::class, 'getPostByUser']);

Route::post('post', [PostController::class, 'store'])->name('post.created');

Route::put('post/{id}', [PostController::class, 'update']);

Route::delete('post/{id}', [PostController::class, 'destroy']);

Route::get('post/update/count', [PostController::class, 'updateCount']);

// Comment
Route::get('comment', [CommentController::class, 'index']);

Route::get('comment/{id}', [CommentController::class, 'show']);

Route::get('comment/{post_id}', [CommentController::class, 'getCommentByPost']);

Route::post('comment', [CommentController::class, 'store']);

Route::put('comment/{id}', [CommentController::class, 'update']);

Route::delete('comment/{id}', [CommentController::class, 'destroy']);

// Like
Route::get('like', [LikeController::class, 'index']);

Route::post('like', [LikeController::class, 'store']);

Route::put('like/{id}', [LikeController::class, 'update']);

Route::delete('like/{id}', [LikeController::class, 'destroy']);
