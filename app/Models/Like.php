<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $tableName = 'likes';
    public $timestamps = true;

    protected $fillable = [
        'status',
        'user_id',
        'post_id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function post(){
        return $this->belongsTo('App\Models\Post', 'post_id', 'id');
    }
}
