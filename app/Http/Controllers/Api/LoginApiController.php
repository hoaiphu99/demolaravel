<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Config;

class LoginApiController extends Controller
{
    public function login(Request $request) {
        $user = User::where(['username' => $request->get('username')])->first();
        //dd($request->get('password'));
        if($user == null)
            return response()->json(['status' => Config::get('siteMsg.fails_code'), 'data' => null, 'message' => 'User is null'], 200);

        else {
            if($user->password != $request->get('password'))
                return response()->json(['status' => Config::get('siteMsg.invalid_code'), 'data' => null, 'message' => 'Sai password'], 200);
            else
                return response()->json(['status' => Config::get('siteMsg.success_code'), 'message' => Config::get('siteMsg.success_msg') ,'data' => UserResource::collection([$user])], 200);
        }
    }
}
