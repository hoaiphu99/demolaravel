<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{
    public function login(Request $request) {
        $username = $request->get('username');
        $password = $request->get('password');
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $response = $client->post('login', [
            'headers' => [
                'Path' => 'login'
            ],
            'form_params' => [
                'username' => $username,
                'password' => $password
            ]
        ]);
        $data = json_decode($response->getBody()->getContents());
        $status = $data->status;
        if ($status != 1) {
            return view('user.login', ['msg' => $data->message]);
        }
        else {
            $user = $data->data[0];
            $request->session()->put('user', $user);
            if ($user->utype == 'ADM')
                return redirect(route('admin.dashboard'));
            else
                return redirect(route('index'));
        }
    }

    public function register(Request $request) {
        $picture = 'https://i.imgur.com/BdtG3S7.jpg';
        $base_uri = Config::get('siteVars.API_URL');
        try
        {
            $client = new Client(['base_uri' => $base_uri]);
            $response = $client->post('user', [
                'headers' => [
                    'APIKEY' => Config::get('siteVars.API_KEY')
                ],
                'json' => [
                    'username' => $request->get('username'),
                    'password' => $request->get('password'),
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'phone' => $request->get('phone'),
                    'birthday' => '1/1/2000',
                    'avatar' => $picture
                ]
            ]);
            $data = json_decode($response->getBody()->getContents());
            if (strcmp($data->data, Config::get('siteMsg.fails_msg') == 0))
            {
                return view('user.register', ['msg' => 'The Username existed!']);
            }
            $user = $data->data;
            if($user == null)
                return view('user.login', ['msg' => 'Create account unsuccessfully']);
            session()->put('user', $user);
            return redirect(route('index'));
        }
        catch(\Exception $e)
        {
            return view('errors.404');
        }
    }

    public function logout() {
        session()->forget('user');
        return redirect(route('index'));
    }
}
