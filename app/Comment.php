<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class Comment extends Model
{
    public function user(){ // should be user 
    	return $this->belongsTo('App\User');
    }

    public function post(){ // should be post
    	return $this->belongsTo('App\Post');
    }
}
