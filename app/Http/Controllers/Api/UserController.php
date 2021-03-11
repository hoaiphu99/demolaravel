<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Users::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $user = Users::create($request->all());
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Users $users)
    {
        return $users;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        $users->update($request->all());
        return response()->json($users, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Users $users)
    {
        $users->delete();
        return response()->json(null, 204);
    }

    public function userByID($id){
        return response()->json(Users::find($id), 200);
    }
}
