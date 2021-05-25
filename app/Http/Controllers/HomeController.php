<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    public function index(Request $request) {
//        if(!$request->session()->has('user_id')){
//            return redirect(route('login'));
//        }
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $post_res = $client->get('post', [
            'headers' => [
                'APIKEY' => Config::get('siteVars.API_KEY'),
            ]
        ]);


        return view('user.index', ['posts' => json_decode($post_res->getBody())]);
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
            ]
        ]);
        $data = json_decode($response->getBody()->getContents());
        $user = $data->data;
        if($user == null)
            return view('user.login', ['msg' => 'Create account unsuccessfully']);
        $request->session()->put('user', $user);
        return redirect(route('index'));
    }
}
