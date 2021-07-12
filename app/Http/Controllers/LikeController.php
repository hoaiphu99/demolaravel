<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Routing\Controller as BaseController;

class LikeController extends Controller
{
    public function getLike() {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->get('like', [
            'headers' => ['APIKEY' => 'VSBG']
        ]);
        return view('admin.like', ['likes' => json_decode($response->getBody())]);
    }

    public function createLike(Request $request) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);

        // $user_id = $request->get('user_id');
        // $post_id = $request->get('post_id');

        // $user_response = $client->get('user/'.$user_id, [
        //     'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')],
        // ]);
        // $data = json_decode($user_response->getBody()->getContents());
        // $status = $data->status;

        // $post_response = $client->get('post/'.$post_id, [
        //     'headers' => ['APIKEY' => Config::get('siteVars.API_KEY')],
        // ]);
        // $data_post = json_decode($post_response->getBody()->getContents());
        // $status_post = $data_post->status;

        // if ($status_post == 1 && $status == 1)
        // {

        // }
        
        $response = $client->post('like', [
            'headers' => [
                'APIKEY' => 'VSBG'
            ],
            'form_params' => [
                'user_id' => $request->get('user_id'),
                'post_id' => $request->get('post_id')
            //    'user_id' => $_POST['user_id'],
            //    'post_id' => $_POST['post_id'],
           ]
        ]);
        $like_exist = json_decode($response->getBody()->getContents());
        $status = $like_exist->status;
        if ($status == 0)
        {
            $id_like = $like_exist->data[0]->id;
            $response = $client->delete('like/'.$id_like, [
                'headers' => [
                    'APIKEY' => 'VSBG'
                ],
             ]);

        }
        //return redirect(route('admin.like'));
        return redirect(route('index'));
    }

    public function deleteLike($id) {
        $base_uri = 'http://project-api-levi.herokuapp.com/api/';
        $client = new Client(['base_uri' => $base_uri]);
        $response = $client->delete('like/'.$id, [
           'headers' => [
               'APIKEY' => 'VSBG'
           ],
            /*'form_params' => [
                'content' => $_POST['content'],
                'user_id' => $_POST['user_id'],
                'post_id' => $_POST['post_id'],
            ]*/
        ]);
        return redirect(route('admin.like'));
    }
}
