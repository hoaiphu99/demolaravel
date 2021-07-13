<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
use App\Models\Post;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\User;

class CommentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        //
        $comments = Comment::all()->sortDesc();
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => CommentResource::collection($comments)]);
    }

    /**
     * Display a listing of the resource.
     * @param  $post_id
     * @return JsonResponse
     */
    public function getCommentsByPost($post_id) {
        $post = Post::where(['id' => $post_id])->first();
        if($post == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.fails_msg'), 'data' => null]);
        }
        $comments = Comment::where(['post_id' => $post_id])->get()->sortDesc();
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => CommentResource::collection($comments)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $comment = Comment::create($request->all());
        
        // update lai so comment
        $post = Post::where(['id' => $comment->post_id])->first();
        $cmt_count = $post->comment_count;
        $post->update(['comment_count' => ++$cmt_count]);

        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => CommentResource::collection([$comment])], 201);
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $comment = Comment::where(['id' => $id])->first();
        if ($comment == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
            'message' => Config::get('siteMsg.fails_msg'), 'data' => null, 201);
        }
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => CommentResource::collection([$comment])], 201);
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
        $comment = Comment::where(['id' => $id])->first();
        $comment->update($request->all());
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => CommentResource::collection([$comment])], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $comment = Comment::where('id', $id)->first();
        $comment->delete();
        $post = Post::where(['id' => $comment->post_id])->first();
        $cmt_count = $post->comment_count;
        $post->update(['comment_count' => --$cmt_count]);
        return response()->json(['status' => Config::get('siteMsg.success_code'), 'message' => Config::get('siteMsg.success_msg'), 'data' => null], 200);
    }
}
