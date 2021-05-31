<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
use App\Models\Post;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\User;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
        $comment = Comment::all();
        return response()->json(['status' => 1, 'data' => CommentResource::collection($comment)]);
    }

    public function getCommentByPost($post_id) {
        $comment = Comment::where(['post_id' => $post_id])->get()->sortDesc();
        return response()->json(['status' => Config::get('siteMsg.success_code'), 'data' => CommentResource::collection($comment)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $comment = Comment::create($request->all());
        // update lai so comment
        $comment = json_decode($comment);
        $post = Post::where(['id' => $comment->post_id])->first();
        $cmt_count = $post->comment_count;
        $post->update(['comment_count' => ++$cmt_count]);

        return response()->json(['status' => 1, 'data' => CommentResource::collection(Comment::all())], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // \App\Models\Comment  $comment
        $comment = Comment::where(['id' => $id])->get();
        //$comment = Comment::find($id);
        return response()->json(['status' => 1, 'data' => CommentResource::collection($comment)], 201);
        //return response()->json(['status' => 1, 'data' => $comment], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        //
        $comment = Comment::where(['id' => $id]);
        $comment->update($request->all());
        return response()->json(['status' => 1, 'data' => CommentResource::collection(Comment::all())], 200);
        /*$comment = Comment::findOrFail($id)->first();
        $comment->update($request->all());
        return response()->json(['status' => 1, 'data' => $comment], 200);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Comment $comment, $id)
    {
        //
        $comment = Comment::where('id', $id)->first();
        $comment->delete();
        return response()->json(['status' => 1, 'message' => 'Delete Successfully!'], 200);
    }
}
