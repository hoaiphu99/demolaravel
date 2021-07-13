<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('login', function () {
    return view('user.login');
});

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('register', function () {
    return view('user.register');
});

Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/test', [Controller::class, 'testAPI'])->name('index.test');

Route::get('/post/{id}', [HomeController::class, 'singlePost'])->where(['id'])->name('post.id');

Route::get('/profile/{username}', [PostController::class, 'getPostByUser'])->where(['username'])->name('profile.username');

Route::post('user/create', [UserController::class, 'createUser'])->name('user.create');

Route::post('post/create', [PostController::class, 'createPost'])->name('post.create');

Route::get('post/delete/{id}', [HomeController::class, 'deletePost'])->where(['id'])->name('post.delete.id');

Route::post('comment/create', [HomeController::class, 'postComment'])->name('comment.post');

Route::post('like/create', [LikeController::class, 'createLike'])->name('like.create');

Route::group(['prefix' => 'admin', 'middleware' => 'utype'], function() {
    Route::get('dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    // User
    Route::get('user', [UserController::class, 'getUser'])->name('admin.user');

    Route::get('user/trashed', [UserController::class, 'getUserDeleted'])->name('user.trashed');

    Route::get('user/{id}', [UserController::class, 'getUserDetail'])->Where(['id'])->name('user.detail');

    Route::post('user/update/{id}', [UserController::class, 'updateUser'])->where(['id'])->name('user.update');

    Route::delete('user/delete/{id}', [UserController::class, 'deleteUser'])->where(['id'])->name('user.delete');

    // Post
    Route::get('post', [PostController::class, 'getPost'])->name('admin.post');

    //Route::post('post/create', [PostApiController::class, 'createPost'])->name('post.create');

    Route::get('post/{id}', [PostController::class, 'getPostDetail'])->where(['id'])->name('post.detail');

    Route::post('post/update/{id}', [PostController::class, 'updatePost'])->where(['id'])->name('post.update');

    Route::get('post/comments/{id}', [PostController::class, 'postComments'])->where(['id'])->name('post.comments');

    Route::get('post/likes/{id}', [PostController::class, 'postLikes'])->where(['id'])->name('post.likes');

    Route::delete('post/delete/{id}', [PostController::class, 'deletePost'])->where(['id'])->name('post.delete');

    // Comment
    Route::get('comment', [CommentController::class, 'getComment'])->name('admin.comment');

    Route::post('comment/create', [CommentController::class, 'createComment'])->name('comment.create');

    Route::get('comment/{id}', [CommentController::class, 'getCommentDetail'])->where(['id'])->name('comment.detail');

    Route::post('comment/update/{id}', [CommentController::class, 'updateComment'])->where(['id'])->name('comment.update');

    Route::get('comment/delete/{id}', [CommentController::class, 'deleteComment'])->where(['id'])->name('comment.delete');

    // Like
    Route::get('like', [LikeController::class, 'getLike'])->name('admin.like');

    Route::delete('like/delete/{id}', [LikeController::class, 'deleteLike'])->where(['id'])->name('like.delete');
});

// Route::get('/clear-cache', function() {
//     $exitCode = Artisan::call('cache:clear');
//     $exitCode = Artisan::call('config:cache');
//     return 'DONE'; //Return anything
// });
