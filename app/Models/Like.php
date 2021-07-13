<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class Like extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
    
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
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function post(){
        return $this->belongsTo('App\Models\Post', 'post_id', 'id');
    }
}
