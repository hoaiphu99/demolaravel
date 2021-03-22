<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $tableName = 'categories';

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'post_id'
    ];
}
