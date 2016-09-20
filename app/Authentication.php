<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authentication extends Model
{
	protected $table = 'users';

    protected $fillable = [
        'username', 'email', 'password',
    ];

    public function articles(){
	return $this->hasMany('App\Article', 'user_id');
	}

	public function Comments(){
	return $this->hasMany('App\Comment', 'user_id');
	}
}
