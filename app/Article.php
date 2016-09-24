<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['user_id','image','title_image','description_image'];

	public function comments(){
	return $this->hasMany('App\Comment', 'article_id');
	}

     public function user() {

	return $this->belongsTo('App\User', 'user_id');
	}
}
