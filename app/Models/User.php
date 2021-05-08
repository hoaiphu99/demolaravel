<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $tableName = 'users';

    protected $fillable = [
        'username',
        'password',
        'name',
        'email',
        'phone',
        'birthday'
    ];

    public function post() {
        return $this->hasMany('App\Models\Post', 'user_id', 'id');
    }
}
