<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
use App\Tag;
use App\Comment;

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

    public function favourite_to_users(){
    	return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function scopeApproved($query){
        return $query->where('is_approved', '1');
    }

}
