<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use GuzzleHttp\Psr7;
use Intervention\Image\Image;
use mysql_xdevapi\Exception;

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

    public function getPostDetail($id) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->get('post/'.$id, [
            'headers' => ['APIKEY' => 'VSBG']
        ]);
        return view('admin.post', ['posts' => json_decode($response->getBody())]);
    }

    public function getPostByUser($username) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        try {
            $response = $client->get('post/profile/'.$username, [
                'headers' => ['APIKEY' => 'VSBG']
            ]);
            $posts = json_decode($response->getBody()->getContents());
            $user = $posts->user;
        }
        catch (\Exception $e) {
            return view('errors.404');
        }

//        if ($posts != null)
//            $user = $posts->data[0]->user;
        return view('user.profile', ['posts' => $posts, 'user' => $user]);
    }

    public function createPost(Request $request) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';

        $user_id = $request->input('user_id');
        $user = session()->get('user');
        if($user_id == null) {
            $user_id = $user->id;
        }

        $file = $request->file('image');
//        $type = $file->getClientOriginalExtension();
//        $name = 'post_'.time().'.'.$type;
//        $path = public_path().'/assets/images/';
//
//        $file->move($path, $name);
//        //$base64String = 'data:image/' . $type . ';base64,' . $encode_data;
//
//        // Upload hinh anh len Imgur bang API
//        $resource = fopen($file, "r") or die("File upload Problems");
        try {
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
                        'Content-Type' => 'multipart/form-data',
                        'name' => 'image',
                        'contents' => fopen($file, "r"),
                    ],
                    [

                        'name' => 'user_id',
                        'contents' => $user_id,
                    ],
                ],
//            'form_params' => [
//                'content' => $request->input('content'),
//                'image' => $name,
//                'user_id' => $request->input('user_id')
//            ]
            ]);
        }
        catch (\Exception $e) {
            echo '<script type="text/javascript">alert("Please upload a image!");</script>';
        }

        if($user->utype == 'ADM')
            return redirect(route('admin.post'));
        else
            return redirect(route('index'));

    }

    public function updatePost(Request $request, $id) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';

        $file = $request->file('image');
        try {
            $client = new Client(['base_uri' => $base_uri]);
            $response = $client->put('post/'.$id, [
                'headers' => [
                    'APIKEY' => 'VSBG'
                ],
                'multipart' => [
                    [

                        'name' => 'content',
                        'contents' => $request->input('content'),
                    ],
                    [
                        'Content-Type' => 'multipart/form-data',
                        'name' => 'image',
                        'contents' => fopen($file, "r"),
                    ],
                    [

                        'name' => 'user_id',
                        'contents' => $user_id,
                    ],
                ],
            ]);
        }
        catch (\Exception $e) {
            echo '<script type="text/javascript">alert("Please upload a image!");</script>';
        }

        // $client = new Client(['base_uri' => $base_uri]);
        // $response = $client->put('post/'.$id, [
        //     'headers' => [
        //         'APIKEY' => 'VSBG'
        //     ],
        //     'form_params' => [
        //         'content' => $_POST['username'],
        //         'password' => $_POST['password'],
        //         'name' => $_POST['name'],
        //         'email' => $_POST['email'],
        //         'phone' => $_POST['phone'],
        //         'birthday' => $_POST['birthday'],
        //     ]
        // ]);

        return redirect(route('admin.post'));
    }

    public function deletePost($id) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->delete('post/'.$id, [
           'headers' => [
               'APIKEY' => 'VSBG'
           ],
            /*'form_params' => [
                'content' => $_POST['content'],
                'user_id' => $_POST['user_id'],
                'post_id' => $_POST['post_id'],
            ]*/
        ]);
        return redirect(route('admin.post'));
    }
}
