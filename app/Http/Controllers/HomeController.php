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
        $response = $client->get('post', [
            'headers' => [
                'APIKEY' => Config::get('siteVars.API_KEY'),
            ]
        ]);
        $post = json_decode($response->getBody()->getContents())->data;

        $userId = session()->get('user')->id;
        $response = $client->get('like/user/'.$userId, [
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')]
        ]);
        $likes = json_decode($response->getBody()->getContents())->data;

        for ($i = 0; $i < count($post); $i++) {
            for ($j = 0; $j < count($likes); $j++) {
                if ($likes[$j]->post_id == $post[$i]->id) {
                    $post[$i]->status = 'liked';
                }
                else $post[$i]->status = 'unliked';
            }
        }

        return view('user.index', ['posts' => $post]);
    }

    public function singlePost($id) {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $response = $client->get('post/'.$id, [
            'headers' => [
                'APIKEY' => Config::get('siteVars.API_KEY'),
            ]
        ]);
        $post = json_decode($response->getBody()->getContents())->data[0];

        $response = $client->get('comment/post/'.$id, [
            'headers' => [
                'APIKEY' => Config::get('siteVars.API_KEY'),
            ]
        ]);
        $comments = json_decode($response->getBody()->getContents())->data;

        return view('user.post', ['post' => $post, 'comments' => $comments]);
    }

    public function deletePost($id) {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $response = $client->delete('post/'.$id, [
            'headers' => [
                'APIKEY' => Config::get('siteVars.API_KEY'),
            ]
        ]);

        return redirect(route('index'));
    }

    public function postComment(Request $request) {
        $base_uri = Config::get('siteVars.API_URL');
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->post('comment', [
            'headers' => [
                'APIKEY' => Config::get('siteVars.API_KEY')
            ],
            'form_params' => [
                'content' => $request->get('content'),
                'user_id' => $request->get('user_id'),
                'post_id' => $request->get('post_id'),
            ]
        ]);

        return redirect(route('post.id', ['id' => $request->get('post_id')]));
    }

}
