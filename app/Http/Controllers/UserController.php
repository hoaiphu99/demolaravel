<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class UserController extends Controller
{
    public function getUser() {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $response = $client->get('user', [
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')]
        ]);
        $users = json_decode($response->getBody()->getContents())->data;

        // get number of user deleted
        $response = $client->get('user/trashed', [
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')]
        ]);
        $userDeleted = json_decode($response->getBody()->getContents())->data;

        return view('admin.user', ['users' => $users, 'countDeleted' => count($userDeleted)]);
    }

    public function getUserDeleted() {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $response = $client->get('user/trashed', [
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')]
        ]);
        $userDeleted = json_decode($response->getBody()->getContents())->data;

        return view('admin.user_trashed', ['users' => $userDeleted]);
    }

    public function getUserDetail($id) {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        try
        {
            $response = $client->get('user/'.$id, [
                'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')]
            ]);
            $user_detail = json_decode($response->getBody());
        }
        catch (\Exception $e) {
            return view('errors.404');
        }

        return view('admin.user_update', ['users' => $user_detail]);
    }

    public function createUser(Request $request) {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
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

    public function updateUser(Request $request, $id) {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $response = $client->put('user/'.$id, [
           'headers' => [
               'APIKEY' => Config::get('siteVars.API_KEY')
           ],
            'form_params' => [
                'username' => $request->get('username'),
                'password' => $request->get('password'),
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'birthday' => $request->get('birthday'),
            ],
        ]);
        return redirect(route('admin.user'));
    }

    public function deleteUser($id) {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $response = $client->delete('user/'.$id, [
           'headers' => [
               'APIKEY' => Config::get('siteVars.API_KEY')
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
