<?php

use Illuminate\Support\Facades\Route;

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

use App\Models\Tasks;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

Route::get('/', function () {
    $tasks = Tasks::orderBy('created_at', 'desc')->get();
    return view('task', [
        'tasks' => $tasks
    ]);
});

Route::get('user', function () {
    return view('task');
});

//Route::post('task', function (Request $req) {
//    $validate = Validator::make($req->all(), [
//        'name' => 'required|max:255'
//    ]);
//
//    if($validate->fails()){
//        return redirect('/')
//            ->withInput()
//            ->withErrors($validate);
//    }
//
//    $task = new Tasks();
//    $task->name = $req->name;
//    $task->save();
//
//    return redirect('/');
//});
//
//Route::delete('task/{task}', function ($id) {
//    Tasks::findOrFail($id)->delete();
//    return redirect('/');
//});
