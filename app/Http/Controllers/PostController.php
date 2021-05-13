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


//        $file = $request->file('image');
//        $type = $file->getClientOriginalExtension();
//        $name = 'post_'.time().'.'.$type;
//        $path = public_path().'/assets/images/';
//
//        $file->move($path, $name);
//        //$base64String = 'data:image/' . $type . ';base64,' . $encode_data;
//
//        // Upload hinh anh len Imgur bang API
//        $resource = fopen($file, "r") or die("File upload Problems");

        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->post('post', [
            'headers' => [
                'APIKEY' => 'VSBG'
            ],
            'multipart' => [
                [

                    'name' => 'content',
                    'contents' => $request->input('content'),
                ],
                [
                    'Content-Type' => 'multipart/form-data; boundary=<calculated when request is sent>',
                    'name' => 'image',
                    'contents' => $request->file('image'),
                ],
                [

                    'name' => 'user_id',
                    'contents' => $request->input('user_id'),
                ],
            ],
//            'form_params' => [
//                'content' => $request->input('content'),
//                'image' => $name,
//                'user_id' => $request->input('user_id')
//            ]
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
