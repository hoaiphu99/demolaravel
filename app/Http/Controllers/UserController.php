<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class UserController extends Controller
{
    public function getUser() {
        $base_uri = './api/';
        //$base_uri = 'http://localhost:81/WebChiaSeAnh/public/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->get('user', [
            'headers' => ['APIKEY' => 'PHU']
        ]);
        //echo $res->getBody()->getContents();
        //var_dump($res->getBody()->getContents());
        return view('admin.user', ['users' => json_decode($response->getBody())]);
    }

    public function createUser() {
        $base_uri = 'http://127.0.0.1:8000/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->post('user', [
            'headers' => [
                'APIKEY' => 'PHU'
            ],
            'form_params' => [
               'username' => $_POST['username'],
               'password' => $_POST['password'],
               'name' => $_POST['name'],
               'email' => $_POST['email'],
               'phone' => $_POST['phone'],
               'birthday' => $_POST['birthday'],
           ]
        ]);
        return redirect(route('admin.user'));
    }

    public function updateUser($id) {
        $base_uri = 'http://127.0.0.1:8000/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->put('user/'.$id, [
           'headers' => [
               'APIKEY' => 'PHU'
           ],
            'form_params' => [
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'birthday' => $_POST['birthday'],
            ]
        ]);
        return redirect(route('admin.user'));
    }
}
