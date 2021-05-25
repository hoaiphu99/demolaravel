<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $username = $request->get('username');
        $password = $request->get('password');
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->post('login', [
            'headers' => [
                'APIKEY' => 'VSBG'
            ],
            'form_params' => [
                'username' => $username,
                'password' => $password
            ]
        ]);
        $data = json_decode($response->getBody()->getContents());
        $status = $data->status;
        if ($status != 1) {
            return view('admin.login', ['msg' => 'Đăng nhập không thành công']);
        }
        else {
            $user = $data->data;
            $request->session()->put('user', $user);
            if ($user->utype == 'ADM')
                return redirect(route('admin.dashboard'));
            else
                return redirect(route('index'));
        }
    }

    public function logout() {
        session()->forget('user');
        return redirect(route('index'));
    }
}
