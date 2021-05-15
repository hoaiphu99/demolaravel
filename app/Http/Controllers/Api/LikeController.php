<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Http\Resources\LikeResource;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $like = Like::all();
        return response()->json(['status' => 1, 'data' => LikeResource::collection($like)]);
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
        $like = Like::create($request->all());
        return response()->json(['status' => 1, 'data' => LikeResource::collection(Like::all())], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $like = Like::where(['id' => $id]);
        $like->update($request->all());
        return response()->json(['status' => 1, 'data' => LikeResource::collection(Like::all())], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like, $id)
    {
        //
        $like = Like::where('id', $id)->first();
        $like->delete();
        return response()->json(['status' => 1, 'message' => 'Delete Successfully!'], 200);
    }
}