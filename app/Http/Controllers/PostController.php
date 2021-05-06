<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use GuzzleHttp\Psr7;

class PostController extends Controller
{
    public function getPost() {
        $base_uri = 'http://127.0.0.1:8000/api/';
        //$base_uri = 'http://localhost:81/WebChiaSeAnh/public/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->get('post', [
            'headers' => ['API_KEY' => 'PHU']
        ]);
        //echo $res->getBody()->getContents();
        //var_dump($res->getBody()->getContents());
        return view('admin.post', ['posts' => json_decode($response->getBody())]);
    }

    public function createPost(Request $request) {
        $base_uri = 'http://127.0.0.1:8000/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->post('post', [
            'headers' => [
                'API_KEY' => 'PHU'
            ],
            'multipart' => [
                [
                    'name' => 'title',
                    'contents' => $request->input('title')
                ],
                [
                    'name' => 'description',
                    'contents' => $request->input('description')
                ],
                [
                    'name' => 'image',
                    'contents' => Psr7\Utils::streamFor($request->file('image')->getFilename())
                ],
                [
                    'name' => 'user_id',
                    'contents' => $request->input('user_id')
                ],
                [
                    'name' => 'cate_id',
                    'contents' => $request->input('cate_id')
                ]
            ]
//            'form_params' => [
//               'title' => $request->input('title'),
//               'description' => $request->input('description'),
//               'image' => $request->file('image'),
//               'user_id' => $request->input('user_id'),
//               'cate_id' => $request->input('cate_id'),
//           ]
        ]);
        return redirect(route('admin.post'));
    }

    public function updatePost($id) {
        $base_uri = 'http://127.0.0.1:8000/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->put('post/'.$id, [
           'headers' => [
               'API_KEY' => 'PHU'
           ],
            'form_params' => [
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'birthday' => $_POST['birthday'],
            ]
        ]);
        return redirect(route('admin.post'));
    }
}
