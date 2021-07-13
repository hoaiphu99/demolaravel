<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\PostResource;

class CommentResource extends JsonResource
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
            'content' => $this->content,
            'user' => new UserResource($this->user),
            'post' => new PostResource($this->post),
            'created_at' => $this->created_at == null ? $this->created_at : Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at == null ? $this->updated_at : Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
            'deleted_at' => $this->deleted_at == null ? $this->deleted_at : Carbon::parse($this->deleted_at)->format('Y-m-d H:i:s'),
        ];
    }
}
