<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
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
            'id' =>$this->id,
            'status' => $this->status,
            'user' => new UserResource($this->user),
            'post' => new PostResource($this->post),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
