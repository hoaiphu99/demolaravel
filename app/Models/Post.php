<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $tableName = 'posts';
    public $timestamps = true;

    protected $fillable = [
        'content',
        'image',
        'comment_count',
        'like_count',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
