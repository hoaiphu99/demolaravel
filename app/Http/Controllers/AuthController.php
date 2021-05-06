<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        $base_uri = 'http://127.0.0.1:8000/api/';
        $username = $request->get('username');
        $password = $request->get('password');
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->post('login', [
            'headers' => [
                'API_KEY' => 'PHU'
            ],
            'form_params' => [
                'username' => $username,
                'password' => $password
            ]
        ]);

        //dd($request->get('username'));
        //return $a = $response->getBody()->getContents();
        return view('admin.user', ['users' => json_decode($response->getBody())]);
    }
}
