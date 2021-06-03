<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $user = User::all()->sort();
        //return response()->json($user);
        return response()->json(['status' => 1, 'data' => UserResource::collection($user)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json(['status' => 1, 'data' => UserResource::collection(User::where(['id' => $user->id])->get())], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::where(['id' => $id])->get();
        $user_id = User::where(['id' => $id])->first();
        if($user_id == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'), 'data' => null]);
        }
        return response()->json(['status' => 1, 'data' => UserResource::collection($user)], 201);
        //return response()->json(['status' => 1, 'data' => $user], 201);
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
        $user = User::where(['id' => $id])->first();
        $user->update($request->all());
        return response()->json(['status' => 1, 'data' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return response()->json(['status' => 1, 'data' => null], 200);
    }

    public function getUserWthPostCount() {
        //$user = User::orderBy(['post_count' => 'DESC'])->get();
        $user = User::select('*')->orderByDesc('post_count')->get();
        return response()->json(['status' => 1, 'data' => UserResource::collection($user)]);
    }

    // Ham nay dung de dem lai so post cua tat ca user
    public function updateCount(){
        $users = User::all();
        $users = json_decode($users);
        foreach ($users as $user) {
            $posts = Post::where(['user_id' => $user->id])->get();
            $posts = json_decode($posts);
            $post_count = count($posts);
            User::where(['id' => $user->id])->update(['post_count' => $post_count]);
        }
    }
}
