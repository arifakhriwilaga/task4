<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     protected $fillable = ['content', 'article_id','author'];
  

     public function article() {

  	 return $this->belongsTo('App\Officer', 'article_id');
	}
     
     public function Authentication() {

	 return $this->belongsTo('App\Authentication', 'user_id');
	}
}