<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
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

    public function getUserDetail($id) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        try
        {
            $response = $client->get('user/'.$id, [
                'headers' => ['APIKEY' => 'VSBG']
            ]);
            $user_detail = json_decode($response->getBody());
        }
        catch (\Exception $e) {
            return view('errors.404');
        }

        return view('admin.user_update', ['users' => $user_detail]);
    }

    public function createUser(Request $request) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->post('user', [
            'headers' => [
                'APIKEY' => 'VSBG'
            ],
            'form_params' => [
                'username' => $request->get('username'),
                'password' => $request->get('password'),
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'birthday' => $request->get('birthday'),
                'avatar' => 'https://i.imgur.com/BdtG3S7.jpg'
            //    'username' => $_POST['username'],
            //    'password' => $_POST['password'],
            //    'name' => $_POST['name'],
            //    'email' => $_POST['email'],
            //    'phone' => $_POST['phone'],
            //    'birthday' => $_POST['birthday'],
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

    public function deleteUser($id) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->delete('user/'.$id, [
           'headers' => [
               'APIKEY' => 'VSBG'
           ],
            /*'form_params' => [
                'content' => $_POST['content'],
                'user_id' => $_POST['user_id'],
                'post_id' => $_POST['post_id'],
            ]*/
        ]);
        return redirect(route('admin.user'));
    }
}
