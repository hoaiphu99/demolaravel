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

Route::post('register', [HomeController::class, 'register'])->name('register');

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/test', [Controller::class, 'testAPI'])->name('index.test');

Route::get('/post/{id}', [PostController::class, 'getPostByID'])->where(['id'])->name('post.id');

Route::get('/profile/{username}', [PostController::class, 'getPostByUser'])->where(['username'])->name('profile.username');

Route::post('user/create', [UserController::class, 'createUser'])->name('user.create');

Route::post('post/create', [PostController::class, 'createPost'])->name('post.create');

Route::post('comment/create', [CommentController::class, 'createComment'])->name('comment.create');

Route::post('like/create', [LikeController::class, 'createLike'])->name('like.create');
//Route::post('/category/update/{id}', [Controller::class, 'updateCategory'])->where(['id'])->name('category.update');

//Route::post('/category/create', [Controller::class, 'createCategory'])->name('category.create');

Route::group(['prefix' => 'admin', 'middleware' => 'utype'], function() {
    Route::get('dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    Route::get('user', [UserController::class, 'getUser'])->name('admin.user');

    Route::post('user/update/{id}', [UserController::class, 'updateUser'])->where(['id'])->name('user.update');

    Route::get('post', [PostController::class, 'getPost'])->name('admin.post');
    //Route::post('post/create', [PostController::class, 'createPost'])->name('post.create');

    Route::get('category', [Controller::class, 'getCategory'])->name('admin.category');

    Route::get('comment', [CommentController::class, 'getComment'])->name('admin.comment');

    Route::delete('comment/delete/{id}', [CommentController::class, 'deleteComment'])->where(['id'])->name('comment.delete');

    Route::get('like', [LikeController::class, 'getLike'])->name('admin.like');

    Route::delete('like/delete/{id}', [LikeController::class, 'deleteLike'])->where(['id'])->name('like.delete');
});

// Route::get('/clear-cache', function() {
//     $exitCode = Artisan::call('cache:clear');
//     $exitCode = Artisan::call('config:cache');
//     return 'DONE'; //Return anything
// });
