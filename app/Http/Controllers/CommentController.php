<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;

class CommentController extends Controller
{
    public function getComment() {
        $base_uri = Config::get('siteVars.API_URL');
        $client = new Client(['base_uri' => $base_uri]);

        $response = $client->get('comment', [
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')]
        ]);
        $comments = json_decode($response->getBody()->getContents())->data;

        $response = $client->get('comment/deleted', [
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')]
        ]);
        $commentsDeleted = json_decode($response->getBody()->getContents())->data;

        return view('admin.comment', ['comments' => $comments, 'countDeleted' => count($commentsDeleted)]);
    }

    public function getCommentDetail($id) {
        // $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $base_uri = Config::get('siteVars.API_URL');
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->get('comment/detail/'.$id, [
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')]
            // 'headers' => ['APIKEY' => 'VSBG']
        ]);
        return view('admin.comment_update', ['commentDetail' => json_decode($response->getBody())]);
    }

    public function createComment(Request $request) {
        // $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $base_uri = Config::get('siteVars.API_URL');
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->post('comment', [
            // 'headers' => [
            //     'APIKEY' => 'VSBG'
            // ],
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')],
            'form_params' => [
               'content' => $request->get('content'),
               'user_id' => $request->get('user_id'),
               'post_id' => $request->get('post_id'),
           ]
        ]);
        return redirect(route('admin.comment'));
    }

    public function updateComment(Request $request, $id) {
        // $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $base_uri = Config::get('siteVars.API_URL');
        $client = new Client(['base_uri' => $base_uri]);

        $user_id = $request->get('user_id');
        $post_id = $request->get('post_id');

        $user_response = $client->get('user/'.$user_id, [
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')],
            // 'headers' => [
            //     'APIKEY' => 'VSBG'
            // ]
        ]);
        $data = json_decode($user_response->getBody()->getContents());
        $status = $data->status;
        if ($status != 1) {
            $comment_response = $client->get('comment/detail/'.$id, [
                'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')],
                // 'headers' => ['APIKEY' => 'VSBG']
            ]);
            return view('admin.comment_update', ['commentDetail' => json_decode($comment_response->getBody())], ['msg' => 'Mã người dùng không tồn tại!']);
        }

        $post_response = $client->get('post/'.$post_id, [
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')],
            // 'headers' => [
            //     'APIKEY' => 'VSBG'
            // ]
        ]);
        $data_post = json_decode($post_response->getBody()->getContents());
        $status_post = $data_post->status;
        if ($status_post != 1) {
            $comment_response = $client->get('comment/detail/'.$id, [
                'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')],
                // 'headers' => ['APIKEY' => 'VSBG']
            ]);
            return view('admin.comment_update', ['commentDetail' => json_decode($comment_response->getBody())], ['msg_post' => 'Mã bài đăng không tồn tại!']);
        }

        $response = $client->put('comment/'.$id, [
        //    'headers' => [
        //        'APIKEY' => 'VSBG'
        //    ],
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')],
            'form_params' => [
                'content' => $_POST['content'],
                'user_id' => $_POST['user_id'],
                'post_id' => $_POST['post_id'],
            ]
        ]);
        return redirect(route('admin.comment'));
    }

    public function deleteComment($id) {
        $base_uri = Config::get('siteVars.API_URL');
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->delete('comment/'.$id, [
            'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')],

        ]);
        return redirect(route('post.comments'));
    }
}
