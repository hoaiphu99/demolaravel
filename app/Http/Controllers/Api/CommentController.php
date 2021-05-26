<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

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
        $post_client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $post_response = $post_client->get('post/'.$comment->post_id, [
            'headers' => [
                'APIKEY' => Config::get('siteVars.API_KEY'),
            ]
        ]);
        $post = json_decode($post_response->getBody())->data[0];
        $cmt_count = $post->comment_count++;
        $client = new Client(['base_uri' => Config::get('siteVars.API_URL')]);
        $response = $client->put('post/'.$post->id, [
            'headers' => [
                'APIKEY' => Config::get('siteVars.API_KEY'),
            ],
            'form_params' => [
                'comment_count' => $cmt_count,
            ]
        ]);
        return response()->json(['status' => 1, 'data' => CommentResource::collection(Comment::all())], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
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
