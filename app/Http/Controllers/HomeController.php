<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->get('post', [
            'headers' => [
                'APIKEY' => env('API_KEY'),
            ]
        ]);

        return view('user.index', ['posts' => json_decode($response->getBody())]);
    }
}
