<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $tableName = 'posts';

    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
        'cate_id'
    ];
}
