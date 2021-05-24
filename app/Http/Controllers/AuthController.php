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
        $status = json_decode($response->getBody()->getContents(), true)['status'];

        if ($status != 1) {
            return view('admin.login', ['msg' => 'Đăng nhập không thành công']);
        }
        else {
            return view('admin.dashboard');
        }
    }
}
