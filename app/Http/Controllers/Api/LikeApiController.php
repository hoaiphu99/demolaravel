<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Http\Resources\LikeResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;

class LikeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $like = Like::all()->sortDesc();
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => LikeResource::collection($like)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        //
//        $like_find = Like::where(['user_id' => $request->get('user_id'), 'post_id' => $request->get('post_id')])->first();
//        if ($like_find != null)
//        {
//            return response()->json(['status' => Config::get('siteMsg.fails_code'),
//                'message' => Config::get('siteMsg.fails_msg'), 'data' => LikeResource::collection([$like_find])], 201);
//        }

        $like = Like::create($request->all());

        $like = json_decode($like);
        $post = Post::where(['id' => $like->post_id])->first();
        $l_count = $post->like_count;
        $post->update(['like_count' => ++$l_count]);

        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => LikeResource::collection([$like])], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function update($id)
    {
        //
        $like = Like::where(['id' => $id])->first();
        if (json_decode($like)->status == 'liked') {
            $like->update(['status' => 'unliked']);
        }
        else {
            $like->update(['status' => 'liked']);
        }
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => LikeResource::collection([$like])], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  $post_id
     * @return JsonResponse
     */
    public function getLikesByPost($post_id) {
        $likes = Like::where(['post_id' => $post_id])->get()->sortDesc();
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => LikeResource::collection($likes)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        //
        $like = Like::where('id', $id)->first();
        $like->delete();
        $post = Post::where(['id' => $like->post_id])->first();
        $like_count = $post->like_count;
        $post->update(['like_count' => --$like_count]);
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => null], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $request
     * @return JsonResponse
     */
    public function handleLike(Request $request) {
        $temp = Like::where(['user_id' => $request->get('user_id'), 'post_id' => $request->get('post_id')])->first();
        if ($temp == null) {
            $this->store($request);
        }
        else {
            $like = json_decode($temp);
            $this->update($like->id);
        }
    }
}
