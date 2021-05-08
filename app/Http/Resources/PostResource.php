<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
//use App\Http\Resources\UserResource;
//use App\Http\Resources\CategoryResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'user' => new \App\Http\Resources\UserResource($this->user),
            'category' => new \App\Http\Resources\CategoryResource($this->category)
        ];
    }
}
