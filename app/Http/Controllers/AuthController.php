<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

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
            return view('user.login', ['msg' => 'Đăng nhập không thành công']);
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

    public function register(Request $request) {
        $base_uri = Config::get('siteVars.API_URL');
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->post('user', [
            'headers' => [
                'APIKEY' => Config::get('siteVars.API_KEY')
            ],
            'form_params' => [
                'username' => $request->get('username'),
                'password' => $request->get('password'),
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'birthday' => '1/1/2000',
                'avatar' => 'https://i.imgur.com/BdtG3S7.jpg'
            ]
        ]);
        $data = json_decode($response->getBody()->getContents());
        $user = $data->data;
        if($user == null)
            return view('user.login', ['msg' => 'Create account unsuccessfully']);
        session()->put('user', $user);
        return redirect(route('index'));
    }

    public function logout() {
        session()->forget('user');
        return redirect(route('index'));
    }
}
