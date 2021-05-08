<?php

namespace App\Http\Controllers;

use App\Models\Category;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategoryByName($name) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $res = $client->get('category/'.$name, [
            'headers' => [
                'APIKEY' => 'VSBG'
            ]
        ]);

        return view('admin.category', ['category' => json_decode($res->getBody())]);
    }

    public function updateCategory($id) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);

        $res = $client->put('category/'.$id, [
            'headers' => [
                'APIKEY' => 'VSBG'
            ],
            'json' => [
            'name'=> $_POST['name'],
            'description' => $_POST['description']
        ]]);


        return view('admin.category', ['category' => json_decode($res->getBody())]);
    }

    public function createCategory() {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        var_dump($_POST);
        $res = $client->post('category', [
            'headers' => [
                'APIKEY' => 'VSBG'
            ],
            'json' => [
            'name'=> $_POST['name'],
            'description' => $_POST['description']
        ]]);


        return view('admin.category', ['category' => json_decode($res->getBody())]);
    }
}
