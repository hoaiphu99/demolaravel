<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Intervention\Image\Image;
use mysql_xdevapi\Exception;

class PostController extends Controller
{
    public function getPost() {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        try {
            $response = $client->get('post', [
                'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')]
            ]);
        } catch (\Exception $e) {
            return view('errors.404');
        }
        $dropDownUser = $this->dropDownUser();
        return view('admin.post', ['posts' => json_decode($response->getBody()->getContents())->data, 'dropDownUser' => $dropDownUser]);
    }

    public function getPostDetail($id) {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $response = $client->get('post/'.$id, [
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')]
        ]);
        $post = json_decode($response->getBody()->getContents())->data[0];
        $dropDownUser = $this->dropDownUser();
        return view('admin.post_update', ['post' => $post, 'dropDownUser' => $dropDownUser]);
    }

    public function getPostByUser($username) {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        try {
            $response = $client->get('post/profile/'.$username, [
                'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')]
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
        $user_id = $request->input('user_id');
        $user = session()->get('user');
        if($user_id == null) {
            $user_id = $user->id;
        }

        $file = $request->file('image');

        try {
            $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
            $response = $client->post('post', [
                'headers' => [
                    'APIKEY' => Config::get('siteVars.API_KEY')
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

        if($user->utype == 'ADM')
            return redirect(route('admin.post'));
        else
            return redirect(route('index'));

    }

    public function updatePost(Request $request, $id) {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);

        $user_id = $request->get('user_id');
        $user = session()->get('user');
        if($user_id == null) {
            $user_id = $user->id;
        }

        try {
            $response = $client->put('post/'.$id, [
                'headers' => [
                    'APIKEY' => Config::get('siteVars.API_KEY')
                ],
                'form_params' => [
                    'content' => $request->get('content'),
                    'user_id' => $user_id,
                ],
            ]);
        }
        catch (\Exception $e) {
            return view('errors.404');
        }
        $post = json_decode($response->getBody()->getContents())->data[0];
        $dropDownUser = $this->dropDownUser();
        return view('admin.post_update', ['post' => $post, 'dropDownUser' => $dropDownUser, 'msg' => 'Cập nhật thành công']);
    }

    public function deletePost($id) {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $response = $client->delete('post/'.$id, [
           'headers' => [
               'APIKEY' => Config::get('siteVars.API_KEY')
           ],
        ]);
        return redirect(route('admin.post'));
    }

    public function postComments($id) {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $response = $client->get('comment/post/'.$id, [
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')]
        ]);

        $comments = json_decode($response->getBody()->getContents())->data[0];
        return view('admin.post_comments', ['post' => $comments]);
    }

    public function dropDownUser() {
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $response = $client->get('user', [
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')]
        ]);
        return json_decode($response->getBody()->getContents())->data;
    }
}
