<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $post = Post::all();

        return response()->json(['status' => 1, 'data' => PostResource::collection($post)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        $image = $request->file('image');
        $newImage = $image->getFilename().".".$image->getClientOriginalExtension();
        $path = "images/".$newImage;
        $image->move(public_path('images'), $newImage);
        Post::where(['id' => $post->id])->update(['image' => $path]);

        return response()->json(['status' => 1, 'data' => PostResource::collection(Post::all())], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(null, 404);
    }
}
