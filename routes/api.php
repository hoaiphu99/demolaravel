<?php

use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\Api\LikeApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginApiController;

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
Route::post('login', [LoginApiController::class, 'login'])->name('api.login');

// User
Route::get('user', [UserApiController::class, 'index'])->name('api.admin.user');

Route::get('user/trashed', [UserApiController::class, 'getUserSoftDeleted']);

Route::get('user/{id}', [UserApiController::class, 'show']);

Route::get('user/post/count', [UserApiController::class, 'getUserWthPostCount']);

Route::post('user', [UserApiController::class, 'store']);

Route::post('user/avatar/{id}', [UserApiController::class, 'updateAvatar']);

Route::put('user/{id}', [UserApiController::class, 'update']);

Route::patch('user/{id}/restore', [UserApiController::class, 'restore']);

Route::delete('user/{id}', [UserApiController::class, 'destroy']);

Route::delete('user/{id}/force', [UserApiController::class, 'forceDestroy']);

Route::get('user/update/count', [UserApiController::class, 'updateCount']);

// Post
Route::get('post', [PostApiController::class, 'index']);

Route::get('post/deleted', [PostApiController::class, 'getPostSoftDeleted']);

Route::get('post/{id}', [PostApiController::class, 'show']);

Route::get('post/user/{userid}', [PostApiController::class, 'getPostByUserID']);

Route::get('post/profile/{username}', [PostApiController::class, 'getPostByUser']);

Route::post('post', [PostApiController::class, 'store'])->name('post.created');

Route::put('post/{id}', [PostApiController::class, 'update']);

Route::delete('post/{id}', [PostApiController::class, 'destroy']);

Route::get('post/update/count', [PostApiController::class, 'updateCount']);

Route::get('post/update/like', [PostApiController::class, 'updateLike']);

// Comment
Route::get('comment', [CommentApiController::class, 'index']);

Route::get('comment/deleted', [CommentApiController::class, 'getCommentSoftDeleted']);

Route::get('comment/{id}', [CommentApiController::class, 'show']);

Route::get('comment/post/{post_id}', [CommentApiController::class, 'getCommentsByPost']);

Route::post('comment', [CommentApiController::class, 'store']);

Route::put('comment/{id}', [CommentApiController::class, 'update']);

Route::delete('comment/{id}', [CommentApiController::class, 'destroy']);

// Like
Route::get('like', [LikeApiController::class, 'index']);

Route::post('like/handle-like', [LikeApiController::class, 'handleLike']);

Route::get('like/post/{id}', [LikeApiController::class, 'getLikesByPost']);

Route::get('like/user/{id}', [LikeApiController::class, 'getLikesByUser']);

Route::post('like', [LikeApiController::class, 'store']);

Route::put('like/{id}', [LikeApiController::class, 'update']);

Route::delete('like/{id}', [LikeApiController::class, 'destroy']);
