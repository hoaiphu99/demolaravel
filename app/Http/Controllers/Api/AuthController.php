<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{
    public function login(Request $request) {
        $user = User::where(['username' => $request->get('username')])->first();
        //dd($request->get('password'));
        if($user == null)
            return response()->json(['status' => Config::get('siteMsg.fails_code'), 'data' => null]);

        return response()->json(['status' => Config::get('siteMsg.success_code'), 'data' => $user]);
    }
}
