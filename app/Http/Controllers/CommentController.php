<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Routing\Controller as BaseController;

class CommentController extends Controller
{
    public function getComment() {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->get('comment', [
            'headers' => ['APIKEY' => 'VSBG']
        ]);
        return view('admin.comment', ['comments' => json_decode($response->getBody())]);
    }

    public function getDetailComment($id) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->get('comment/'.$id, [
            'headers' => ['APIKEY' => 'VSBG']
        ]);
        return view('admin.comment_update', ['comments' => json_decode($response->getBody())]);
    }

    public function createComment(Request $request) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->post('comment', [
            'headers' => [
                'APIKEY' => 'VSBG'
            ],
            'form_params' => [
               'content' => $request->get('content'),
               'user_id' => $request->get('user_id'),
               'post_id' => $request->get('post_id'),
           ]
        ]);
        return redirect(route('admin.comment'));
    }

    public function updateComment($id) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->put('comment/'.$id, [
           'headers' => [
               'APIKEY' => 'VSBG'
           ],
            'form_params' => [
                'content' => $_POST['content'],
                'user_id' => $_POST['user_id'],
                'post_id' => $_POST['post_id'],
            ]
        ]);
        return redirect(route('admin.comment'));
    }

    public function deleteComment($id) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->delete('comment/'.$id, [
           'headers' => [
               'APIKEY' => 'VSBG'
           ],
            /*'form_params' => [
                'content' => $_POST['content'],
                'user_id' => $_POST['user_id'],
                'post_id' => $_POST['post_id'],
            ]*/
        ]);
        return redirect(route('admin.comment'));
    }
}
