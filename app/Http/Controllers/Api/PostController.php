<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
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
        $post = Post::all();

        return response()->json(['status' => 1, 'data' => PostResource::collection($post)]);
    }

    public function getPostByUserID($userid)
    {
        $posts = Post::where(['user_id' => $userid])->get();

        return response()->json(['status' => 1, 'data' => PostResource::collection($posts)]);
    }

    protected function saveImgBase64($param, $folder)
    {
        list($extension, $content) = explode(';', $param);
        $tmpExtension = explode('/', $extension);
        preg_match('/.([0-9]+) /', microtime(), $m);
        $fileName = sprintf('img%s%s.%s', date('YmdHis'), $m[1], $tmpExtension[1]);
        $content = explode(',', $content)[1];
        $destinationPath = public_path().'/'.$folder;
        //Image::make(base64_decode($content))->save($destinationPath.'/'.$fileName);
        //file_put_contents($destinationPath.'/'.$fileName, base64_decode($content));

        $storage = Storage::disk('local');

        $checkDirectory = $storage->exists($folder);

        if (!$checkDirectory) {
            $storage->makeDirectory($folder);
        }

        $storage->put($folder . '/' . $fileName, base64_decode($content), 'local');

        return $fileName;
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
        //$decode_data = base64_decode($request->get('image'));
        $newImage = $this->saveImgBase64($request->input('image'), 'assets/images');
        //$img = $request->file('image');
//        $base64String = 'data:image/' . $img->getClientOriginalExtension() . ';base64,' . base64_encode($img);
//        $arr = explode(';', $base64String);
//        //dd($arr);
//        $tmpExtension = explode('/', $arr[0]);
//        $folder = 'assets/images';
//        $content = explode(',', $arr[1]);
//        $destinationPath = public_path().'/'.$folder;
//        $fileName = 'post_'.$post->id.'.'.$tmpExtension[1];
//        Image::make(base64_decode($content[1]))->save($destinationPath.'/'.$fileName);
        //file_put_contents($destinationPath.'/'.$fileName, base64_decode($content[1]));
        // $image = $request->file('image');
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
