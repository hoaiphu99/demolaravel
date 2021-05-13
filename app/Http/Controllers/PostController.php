<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use GuzzleHttp\Psr7;
use Intervention\Image\Image;

class PostController extends Controller
{
    public function getPost() {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->get('post', [
            'headers' => ['APIKEY' => 'VSBG']
        ]);
        return view('admin.post', ['posts' => json_decode($response->getBody())]);
    }

    public function createPost(Request $request) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $data = $request->file('image');
        $type = $data->getClientOriginalExtension();
        $encode_data = base64_encode($data);
        $imgur_uri = 'https://api.imgur.com/3/';
        $upload_to_imgur = new Client(['base_uri' => $imgur_uri]);
        $image = $upload_to_imgur->post('upload', [
            'headers' => [
                'Authorization' => 'Client-ID db12bcd4537c063',
                'Accept' => 'application/json',

            ],
            'multipart' => [
                [
                    'name' => 'image',
                    'contents' => $request->file('image'),
                ]
            ]
        ]);
        dd($image->getBody()->getContents());
        $client = new Client(['base_uri' => $base_uri]);

        $base64String = 'data:image/' . $type . ';base64,' . $encode_data;
//        dd($base64String);
        $response = $client->post('post', [
            'headers' => [
                'APIKEY' => 'VSBG'
            ],
//            'multipart' => [
//                [
//                    'name' => 'title',
//                    'contents' => $request->input('title')
//                ],
//                [
//                    'name' => 'description',
//                    'contents' => $request->input('description')
//                ],
//                [
//                    'name' => 'image',
//                    'contents' => Psr7\Utils::streamFor($request->file('image')->getFilename())
//                ],
//                [
//                    'name' => 'user_id',
//                    'contents' => $request->input('user_id')
//                ],
//                [
//                    'name' => 'cate_id',
//                    'contents' => $request->input('cate_id')
//                ]
//            ]
            'form_params' => [
               'content' => $request->input('content'),
               'image' => $base64String,
               'user_id' => $request->input('user_id')
           ]
        ]);
        return redirect(route('admin.post'));
    }

    public function updatePost($id) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->put('post/'.$id, [
           'headers' => [
               'APIKEY' => 'VSBG'
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
