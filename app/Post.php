<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
use App\Tag;

class Post extends Model
{
	public function user(){
		return $this->belongsTo('App\User');
	}
    public function category(){
    	return $this->belongsTo('App\Category');
    }
    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }
}
