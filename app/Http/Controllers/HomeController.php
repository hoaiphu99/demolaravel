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

    public function singlePost($post_id) {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $post_res = $client->get('post/'.$post_id, [
            'headers' => [
                'APIKEY' => Config::get('siteVars.API_KEY'),
            ]
        ]);

        $post = json_decode($post_res->getBody())['data'][0];
        dd($post);
        $comment_res = $client->get('comment/'.$post_id, [
            'headers' => [
                'APIKEY' => Config::get('siteVars.API_KEY'),
            ]
        ]);

        return view('user.post', ['post' => $post, 'comments' => json_decode($comment_res->getBody()->getContents())]);
    }

}
