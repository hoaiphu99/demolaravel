<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserResource extends JsonResource
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
            'username' => $this->username,
            'password' => $this->password,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'birthday' => $this->birthday,
            'avatar' => $this->avatar,
            'utype' => $this->utype,
            'post_count' => $this->post_count,
            'created_at' => $this->created_at == null ? $this->created_at : Carbon::parse($this->created_at)->locale('vi')->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at == null ? $this->updated_at : Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
            'deleted_at' => $this->deleted_at == null ? $this->deleted_at : Carbon::parse($this->deleted_at)->format('Y-m-d H:i:s'),
        ];
    }
}
