<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    public function index() {

        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $post_res = $client->get('post', [
            'headers' => [
                'APIKEY' => Config::get('siteVars.API_KEY'),
            ]
        ]);


        return view('user.index', ['posts' => json_decode($post_res->getBody())]);
    }
}
