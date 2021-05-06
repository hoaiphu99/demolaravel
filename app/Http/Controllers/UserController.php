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
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->get('user', [
            'headers' => ['APIKEY' => 'VSBG']
        ]);
        return view('admin.user', ['users' => json_decode($response->getBody())]);
    }

    public function createUser() {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->post('user', [
            'headers' => [
                'APIKEY' => 'VSBG'
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
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->put('user/'.$id, [
           'headers' => [
               'APIKEY' => 'VSBG'
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
