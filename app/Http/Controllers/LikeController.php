<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class LikeController extends Controller
{
    public function getLike() {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->get('like', [
            'headers' => ['APIKEY' => 'VSBG']
        ]);
        return view('admin.like', ['likes' => json_decode($response->getBody())]);
    }

    public function createLike() {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->post('like', [
            'headers' => [
                'APIKEY' => 'VSBG'
            ],
            'form_params' => [
               'user_id' => $_POST['user_id'],
               'post_id' => $_POST['post_id'],
           ]
        ]);
        return redirect(route('admin.like'));
    }

    public function deleteLike($id) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->delete('like/'.$id, [
           'headers' => [
               'APIKEY' => 'VSBG'
           ],
            /*'form_params' => [
                'content' => $_POST['content'],
                'user_id' => $_POST['user_id'],
                'post_id' => $_POST['post_id'],
            ]*/
        ]);
        return redirect(route('admin.like'));
    }
}
