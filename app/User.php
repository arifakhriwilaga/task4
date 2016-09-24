<?php

namespace App;

use App\Http\Requests\UserRequest;
use Cartalyst\Sentinel\Users\EloquentUser as SentinelUser;

class User extends SentinelUser
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'email',
        'username',
        'password',
        'permissions',
    ];

    protected $loginNames = ['username'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments(){
    return $this->hasMany('App\Comment', 'user_id');
    }

    public function articles(){
    return $this->hasMany('App\Article', 'user_id');
    }
}
