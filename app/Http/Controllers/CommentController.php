<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $post){
    	$this->validate($request, array(
    		'comment'	=> 'required'
    	));

    	$comment = new Comment;
    	$comment->post_id = $post;
    	$comment->user_id = Auth::user()->id;
    	$comment->comment = $request->comment;
    	$comment->save();

    	Toastr::success('Comment Added', 'success');
    	return redirect()->back();
    }
}
