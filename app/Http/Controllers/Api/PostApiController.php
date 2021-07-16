<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $post = Post::all()->sortDesc();
        //$post = Post::orderBy(['id' => 'DESC'])->get();

        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'),'data' => PostResource::collection($post)], 200);
    }

    /**
     * Display a listing deleted of the resource.
     *
     * @return JsonResponse
     */
    public function getPostSoftDeleted()
    {
        $post = Post::onlyTrashed()->get()->sortDesc();

        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'),'data' => PostResource::collection($post)], 200);
    }

    /**
     * Display a listing of the resource by userid.
     *
     * @param $userid
     * @return JsonResponse
     */
    public function getPostByUserID($userid)
    {
        $user = User::where(['id' => $userid])->first();
        if($user == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.notExist_msg'), 'data' => null], 200);
        }
        $posts = Post::where(['user_id' => $userid])->get()->sortDesc();

        return response()->json(['status' => 1, 'data' => PostResource::collection($posts)], 200);
    }

    /**
     * Display a listing of the resource by username.
     *
     * @param $username
     * @return JsonResponse
     */
    public function getPostByUser($username)
    {
        $user = User::where(['username' => $username])->first();
        if($user == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.notExist_msg'), 'data' => null], 200);
        }
        $user_id = $user->id;
        $posts = Post::where(['user_id' => $user_id])->get()->sortDesc();

        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => PostResource::collection($posts), 'user' => $user], 200);
    }

    /**
     * Upload Image to Imgur
     *
     * @param $resource
     * @return string
     * @throws GuzzleException
     */
    public function uploadImage($resource) {
        $imgur_client = new Client(['base_uri' => Config::get('siteVars.IMGUR_URL_API')]);
        try {
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
            return $img_link = json_decode($imgur_response->getBody()->getContents())->data->link;

        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
            return "";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws GuzzleException
     */

    public function store(Request $request)
    {
        if ($this->checkExist($request->get('user_id')))
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.invalid_msg'), 'data' => null], 200);

        if ($request->get('content') == null || $request->get('user_id') == null) {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.errInput_msg'), 'data' => null], 200);
        }

        $post = Post::create($request->all());

        $user = User::where(['id' => $request->get('user_id')])->first();
        $postCount = $user->post_count;
        $user->update(['post_count' => ++$postCount]);

        $file = $request->file('image');
        if ($file == null) {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.fileNotExist_msg'), 'data' => null], 200);
        }
        $resource = fopen($file, "r") or die("File upload Problems");

        // Upload truc tiep le heroku (loi moi khi commit se mat het hinh da them truoc do)
        //$type = $file->getClientOriginalExtension();
        //$name = 'post_'.time().'.'.$type;
        //$path = public_path().'/assets/images/';
        //$file->move($path, $name);
        //$base64String = 'data:image/' . $type . ';base64,' . $encode_data;

        $img_link = $this->uploadImage($resource);

        $post->update(['image' => $img_link]);

        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => PostResource::collection([$post])], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        //$post = Post::where(['id' => $id])->get();
        $post = Post::where(['id' => $id])->first();
        if($post == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.notExist_msg'), 'data' => null]);
        }
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => PostResource::collection([$post])], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {

        $post = Post::where(['id' => $id])->first();
        if($post == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.notExist_msg'), 'data' => null], 200);
        }
        if ($request->has('content')) {
            if ($request->get('content') == null)
                return response()->json(['status' => Config::get('siteMsg.fails_code'),
                    'message' => Config::get('siteMsg.errInput_msg'), 'data' => null], 200);
        }

        $post->update($request->all());

        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => PostResource::collection([$post])], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $post = Post::where(['id' => $id])->first();
        if($post == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.notExist_msg'), 'data' => null], 200);
        }
        $user = User::where(['id' => $post->user->id])->first();
        $postCount = --$user->post_count;
        $user->update(['post_count' => $postCount < 0 ? 0 : $postCount]);

        $post->delete();



        return response()->json(['status' => Config::get('siteMsg.success_code'), 'message' => Config::get('siteMsg.success_msg'), 'data' => null], 200);
    }

    /**
     * Remove the specified resource from DB
     *
     * @param  $id
     * @return JsonResponse
     */
    public function forceDestroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        if($post == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.notExist_msg'), 'data' => null], 200);
        }
        $post->forceDelete();
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => null], 200);
    }

    /**
     * Restore the specified resource from DB
     *
     * @param  $id
     * @return JsonResponse
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        if($post == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.notExist_msg'), 'data' => null], 200);
        }
        $post->restore();
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => null], 200);
    }

    public function checkExist($user_id) {
        $user = User::where(['id' => $user_id])->first();
        if($user == null)
        {
            return true;
        }
        return false;
    }

    // Ham nay dung de dem lai so comment cua tat ca bai viet
    public function updateCount(){
        $posts = Post::all();
        $posts = json_decode($posts);
        foreach ($posts as $post) {
            $comments = Comment::where(['post_id' => $post->id])->get();
            $comments = json_decode($comments);
            $cmt_count = count($comments);
            $p = Post::where(['id' => $post->id])->update(['comment_count' => $cmt_count]);
        }
    }

    // Ham nay dung de dem lai so like cua tat ca bai viet
    public function updateLike(){
        $posts = Post::all();
        $posts = json_decode($posts);
        foreach ($posts as $post) {
            $likes = Like::where(['post_id' => $post->id])->get();
            $likes = json_decode($likes);
            $like_count = count($likes);
            $p = Post::where(['id' => $post->id])->update(['like_count' => $like_count]);
        }

        return response()->json(['status' => Config::get('siteMsg.success_code'), 'message' => Config::get('siteMsg.success_msg')]);
    }
}
