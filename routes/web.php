<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', [CategoryController::class, 'getCategory'])->name('index');

Route::get('login', function () {
    return view('admin.login');
});
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('/test', [Controller::class, 'testAPI'])->name('index.test');

//Route::get('/category/{name}', [CategoryController::class, 'getCategoryByName'])->where(['name'])->name('category.name');

//Route::post('/category/update/{id}', [Controller::class, 'updateCategory'])->where(['id'])->name('category.update');

//Route::post('/category/create', [Controller::class, 'createCategory'])->name('category.create');

Route::group(['prefix' => 'admin'], function() {
    Route::get('dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    Route::get('user', [UserController::class, 'getUser'])->name('admin.user');
    Route::post('user/create', [UserController::class, 'createUser'])->name('user.create');
    Route::post('user/update/{id}', [UserController::class, 'updateUser'])->where(['id'])->name('user.update');

    Route::get('post', [PostController::class, 'getPost'])->name('admin.post');
    Route::post('post/create', [PostController::class, 'createPost'])->name('post.create');

    Route::get('category', [Controller::class, 'getCategory'])->name('admin.category');
});

// Route::get('/clear-cache', function() {
//     $exitCode = Artisan::call('cache:clear');
//     $exitCode = Artisan::call('config:cache');
//     return 'DONE'; //Return anything
// });
