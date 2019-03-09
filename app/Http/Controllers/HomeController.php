<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts      = Post::latest()->approved()->take('5')->get();
        $categories = Category::all();
        $tags       = Tag::all();
        return view('frontend.index', compact('posts', 'categories', 'tags'));
    }

    public function search(Request $request){

        $query  = $request->input('query');
        
        $posts = Post::where('title', 'LIKE', "%$query%")->get();

        return view('frontend.search', compact('posts'));

    }
}
