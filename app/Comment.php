<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = 'comments';
     protected $fillable = ['content', 'article_id','user_id'];
  

     public function articles() {

  	 return $this->belongsTo('App\Article', 'article_id');
	}
     
     public function user() {

	 return $this->belongsTo('App\User', 'user_id');
	}
}