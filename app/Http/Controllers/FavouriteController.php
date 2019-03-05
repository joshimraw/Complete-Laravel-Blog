<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function add($id){

    	$user = Auth::user();
    	$isFavourite = $user->favourite_posts()->where('post_id', $id)->count();

    	if($isFavourite == 0){

    		$user->favourite_posts()->attach($id);

    		Toastr::success('Added to favourite list', 'success');
    		return redirect()->back();
    	}else{

    		$user->favourite_posts()->detach($id);

    		Toastr::warning('Remove form favourite', 'warning');
    		return redirect()->back();
    	}
    }
}
