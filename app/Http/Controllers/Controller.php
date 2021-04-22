<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use GuzzleHttp\Pool;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function testAPI() {
        $url = 'http://localhost:81/WebChiaSeAnh/public/api/user';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, [
        //     'Content-Type: application/json'
        //   ]);
        $res = curl_exec($ch);

        if($e = curl_error($ch)) {
            return;
        }
        else {
            $decoded = json_decode($res);
            return view('admin.user1', ['user' => $decoded]);
        }
        // $response = file_get_contents($url);
        // $response = json_decode($response);
        // return view('admin.user1', ['user' => $response]);
        curl_close($ch);
    }

    public function getUser() {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        //$base_uri = 'http://localhost:81/WebChiaSeAnh/public/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $res = $client->request('GET','user', [
            "headers" => ["API_KEY" => "ABCDE"],
        ]);

        //var_dump($res->getBody()->getContents());
        return view('admin.user', ['user' => json_decode($res->getBody()->getContents())]);
    }

    public function getCategory() {
        $base_uri = './api/';
        $client = new Client(['base_uri' => $base_uri]);
        $res = $client->get('category',[
            'headers' => ['API_KEY' => 'ABCDE']
        ]);

        return view('admin.category', ['category' => json_decode($res->getBody())]);

    }

    public function getPost() {
        $base_uri = './api/';

        $client = new Client(['base_uri' => $base_uri]);
        $res = $client->get('post', [
            'headers' => ['API_KEY' => 'ABCDE']
        ]);

        return view('admin.post', ['post' => json_decode($res->getBody())]);
    }

    public function showCategory($name) {
        $base_uri = 'http://localhost:81/WebChiaSeAnh/public/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $res = $client->get('category/'.$name);

        return view('admin.category', ['category' => json_decode($res->getBody())]);
    }

    public function updateCategory($id) {
        $base_uri = 'http://localhost:81/WebChiaSeAnh/public/api/';
        $client = new Client(['base_uri' => $base_uri]);

        $res = $client->put('category/'.$id, ['json' => [
            'name'=> $_POST['name'],
            'description' => $_POST['description']
        ]]);


        return view('admin.category', ['category' => json_decode($res->getBody())]);
    }

    public function createCategory() {
        $base_uri = 'http://localhost:81/WebChiaSeAnh/public/api/';
        $client = new Client(['base_uri' => $base_uri]);
        var_dump($_POST);
        $res = $client->post('category', ['json' => [
            'name'=> $_POST['name'],
            'description' => $_POST['description']
        ]]);


        return view('admin.category', ['category' => json_decode($res->getBody())]);
    }
}
