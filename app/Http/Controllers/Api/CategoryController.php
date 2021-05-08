<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $category = Category::all();

        return response()->json(['status' => 1, 'data' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return response()->json(['status' => 1, 'data' => $category], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($name)
    {
        $category = Category::where('name', $name)->first();
        if(is_null($category)) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        return response()->json(['status' => 1, 'data' => $category], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $name)
    {
        $category = Category::where('name', $name)->first();
        if(is_null($category)) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        else $category->update($request->all());
        return response()->json(['status' => 1, 'data' => $category], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function showByID($id)
    {
        $category = Category::where('id', $id)->first();
        if(is_null($category)) {
            return response()->json(["message" => "Record not found"], 404);
        }
        return response()->json(['status' => 1, 'data' => $category], 200);
    }

}
