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

    public function getPostByUserID($userid)
    {
        $posts = Post::where(['user_id' => $userid])->get();

        return response()->json(['status' => 1, 'data' => PostResource::collection($posts)]);
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
        $decode_data = base64_decode($request->get('image'));
        $file = fopen("assets/images/post.jpg", "w+");
        fwrite($file, $decode_data);
        fclose($file);
        $img_path = "assets/images/post.jpg";
        $type = pathinfo($img_path, PATHINFO_EXTENSION);
        $name = pathinfo($img_path, PATHINFO_FILENAME);
        //$image = file_get_contents($img_path);
        // $image = $request->file('image');
        $newImage = $name."_".$post->id.".".$type;
        $path = "https://project-api-levi.herokuapp.com/assets/images/".$newImage;
        //$image->move(public_path('assets/images'), $newImage);
        Post::where(['id' => $post->id])->update(['image' => $path]);

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
        $post = Post::where(['id' => $id])->first();

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
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(null, 404);
    }
}
