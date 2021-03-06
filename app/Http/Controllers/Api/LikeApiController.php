<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\User;
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
        $like = Like::create($request->all());
        $like->update(['status' => 'liked']);

        $tmpLike = json_decode($like);
        $post = Post::where(['id' => $tmpLike->post_id])->first();
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
        $post = Post::where(['id' => $like->post_id])->first();
        if ($like->status == 'liked') {
            $like->update(['status' => 'unliked']);
            $l_count = --$post->like_count;
            $post->update(['like_count' => $l_count < 0 ? 0 : $l_count]);
        }
        else {
            $like->update(['status' => 'liked']);
            $l_count = $post->like_count;
            $post->update(['like_count' => ++$l_count]);
        }
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => LikeResource::collection([$like])], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function getLikesByPost($id) {
        $post = Post::where(['id' => $id])->first();
        if($post == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.notExist_msg'), 'data' => null]);
        }
        $likes = Like::where(['post_id' => $id, 'status' => 'liked'])->get()->sortDesc();
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => LikeResource::collection($likes)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function getLikesByUser($id) {
        $user = User::where(['id' => $id])->first();
        if($user == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.fails_msg'), 'data' => null]);
        }
        $likes = Like::where(['user_id' => $id, 'status' => 'liked'])->get()->sortDesc();
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
        if ($like == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.fails_msg'), 'data' => null]);
        }
        $like->delete();
        $post = Post::where(['id' => $like->post_id])->first();
        $like_count = --$post->like_count;
        $post->update(['like_count' => $like_count < 0 ? 0 : $like_count]);
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
        $user_id = $request->get('user_id');
        $post_id = $request->get('post_id');

        if ($user_id == null || $post_id == null) {
            return response()->json(['status' => Config::get('siteMsg.invalid_code'),
                'message' => Config::get('siteMsg.errInput_msg'), 'data' => null], 200);
        }
        if ($this->checkExist($user_id, $post_id))
            return response()->json(['status' => Config::get('siteMsg.invalid_code'),
                'message' => Config::get('siteMsg.invalid_msg'), 'data' => null], 200);

        $like = Like::where(['user_id' => $user_id, 'post_id' => $post_id])->first();
        if ($like == null) {
            return $this->store($request);
        }
        else {
            return $this->update($like->id);
        }
    }

    public function checkExist($user_id, $post_id) {
        $user = User::where(['id' => $user_id])->first();
        if($user == null)
        {
            return true;
        }

        $post = Post::where(['id' => $post_id])->first();
        if($post == null)
        {
            return true;
        }
        return false;
    }
}
