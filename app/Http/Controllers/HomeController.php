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

    public function singlePost($id) {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $post_res = $client->get('post/'.$id, [
            'headers' => [
                'APIKEY' => Config::get('siteVars.API_KEY'),
            ]
        ]);

        $comment_res = $client->get('comment/'.$id, [
            'headers' => [
                'APIKEY' => Config::get('siteVars.API_KEY'),
            ]
        ]);

        $post = json_decode($post_res->getBody())->data[0];

        return view('user.post', ['post' => $post, 'comments' => json_decode($comment_res->getBody())]);
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

        return redirect($request->path());
    }

}
