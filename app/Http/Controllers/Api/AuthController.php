<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        $user = User::where(['username' => $request->get('username')])->first();
        //dd($request->get('password'));

        return response()->json(['status' => 1, 'data' => $user]);
    }
}
