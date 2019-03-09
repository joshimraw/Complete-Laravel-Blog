<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($slug)
    {

        $post = Post::where('slug', $slug)->first();
        $randposts = Post::all()->random(3);

        return view('frontend.post', compact('post', 'randposts'));

    }
}

    