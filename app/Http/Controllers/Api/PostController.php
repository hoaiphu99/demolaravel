<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $post = Post::all()->sortDesc();
        //$post = Post::orderBy(['id' => 'DESC'])->get();

        return response()->json(['status' => 1, 'data' => PostResource::collection($post)]);
    }

    public function getPostByUserID($userid)
    {
        $posts = Post::where(['user_id' => $userid])->get()->sortDesc();

        return response()->json(['status' => 1, 'data' => PostResource::collection($posts)]);
    }

    public function getPostByUser($username)
    {
        $user = User::where(['username' => $username])->first();
        $user_id = $user->id;
        $posts = Post::where(['user_id' => $user_id])->get()->sortDesc();

        return response()->json(['status' => 1, 'data' => PostResource::collection($posts), 'user' => $user]);
    }

//    protected function saveImgBase64($param, $folder)
//    {
//        list($extension, $content) = explode(';', $param);
//        $tmpExtension = explode('/', $extension);
//        preg_match('/.([0-9]+) /', microtime(), $m);
//        $fileName = sprintf('img%s%s.%s', date('YmdHis'), $m[1], $tmpExtension[1]);
//        $content = explode(',', $content)[1];
//        $destinationPath = public_path().'/'.$folder;
//        //Image::make(base64_decode($content))->save($destinationPath.'/'.$fileName);
//        //file_put_contents($destinationPath.'/'.$fileName, base64_decode($content));
//
//        $storage = Storage::disk('local');
//
//        $checkDirectory = $storage->exists($folder);
//
//        if (!$checkDirectory) {
//            $storage->makeDirectory($folder);
//        }
//
//        $storage->put($folder . '/' . $fileName, base64_decode($content), 'local');
//
//        return $fileName;
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(Request $request)
    {
        //$post = Post::create(['content' => 'Test Android', 'image' => 'tmpImage', 'user_id' => 1]);
        $post = Post::create($request->all());
        //$imgur_uri = 'https://api.imgur.com/3/';
        //$imgur_clientID = 'db12bcd4537c063';
        $file = $request->file('image');
        $resource = fopen($file, "r") or die("File upload Problems");

        // Upload truc tiep le heroku (loi moi khi commit se mat het hinh da them truoc do)
        //$type = $file->getClientOriginalExtension();
        //$name = 'post_'.time().'.'.$type;
        //$path = public_path().'/assets/images/';
        //$file->move($path, $name);
        //$base64String = 'data:image/' . $type . ';base64,' . $encode_data;

        // Upload hinh anh len Imgur bang API
        $imgur_client = new Client(['base_uri' => Config::get('siteVars.IMGUR_URL_API')]);
        $imgur_response = $imgur_client->post('image', [
            'headers' => [
                'Authorization' => 'Client-ID '.Config::get('siteVars.IMGUR_CLIENT_ID'),

            ],
            'multipart' => [
                [
                    'Content-Type' => 'multipart/form-data; boundary=<calculated when request is sent>',
                    'name' => 'image',
                    'contents' => $resource,
                ]
            ]
        ]);
        $img_link = json_decode($imgur_response->getBody())->data->link;

        //$link_img = $request->get('image');
        Post::where(['id' => $post->id])->update(['image' => $img_link]);

        return response()->json(['status' => 1, 'data' => PostResource::collection(Post::all())], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $post = Post::where(['id' => $id])->get();

        return response()->json(['status' => 1, 'data' => PostResource::collection($post)], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {

        $post = Post::where(['id' => $id]);
        $post->update($request->all());

        return response()->json(['status' => 1, 'data' => PostResource::collection(Post::all())], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $comment = Comment::where(['post_id' => $id])->get();
        foreach ($comment as $cmt) {
            $cmt->delete();
        }
        $post = Post::where(['id' => $id])->first();
        $post->delete();

        return response()->json(['status' => Config::get('siteMsg.success_code'), 'message' => Config::get('siteMsg.success_msg')]);
    }

    public function updateCount(){
        $posts = Post::all();
        $posts = json_decode($posts);
        foreach ($posts as $post) {
            $comments = Comment::where(['post_id' => $post->id])->get();
            $comments = json_decode($comments);
            $cmt_count = count($comments);
            $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
            $response = $client->put('post/'.$post->id, [
                'headers' => [
                    'APIKEY' => Config::get('siteVars.API_KEY'),
                ],
                'form_params' => [
                    'comment_count' => $cmt_count,
                ]
            ]);

        }
    }
}
