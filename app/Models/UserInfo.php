<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'userinfo';

    protected $fillable = [
        'name', 'email', 'address', 'password'
    ];

    public $timestamps = true; // this is needed if you're using created_at and updated_at
}
