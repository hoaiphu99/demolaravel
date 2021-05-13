<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comment = Comment::all();
        return response()->json(['status' => 1, 'data' => CommentResource::collection($comment)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $comment = Comment::create($request->all());
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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment, $id)
    {
        //
        $comment = Comment::where('id', $id)->first();
        $comment->delete();
        return response()->json(['status' => 1, 'message' => 'Delete Successfully!'], 200);
    }
}
