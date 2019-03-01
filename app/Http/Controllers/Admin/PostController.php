<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NotifyToSubscriber;

use App\Category;
use App\Subscriber;
use App\Tag;
use App\Post;
use Image;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title'     => 'required',
            'image'     => 'sometimes|image',
            'body'      => 'required',
            'category'  => 'required',
            'tags'      => 'required'
        ));

        $slug    = str_slug($request->title);

        if($request->hasFile('image')){

        $image = $request->file('image');
        $img_name = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        $location = public_path('frontend/post-images/'.$img_name);
        Image::make($image)->resize(550, 340)->save($location);


        }else{

            $img_name = "default.png";

        }
        $post = new Post;
        $post->title        = $request->title;
        $post->slug         = $slug;
        $post->user_id      = Auth::user()->id;
        $post->category_id  = $request->category;
        $post->image        = $img_name;
        $post->body         = $request->body;
        $post->view_count   = '0';
        $post->status       = 1;
        $post->is_approved  = 1;
        // $post->tags()->sync($request->tags, false);

        $post->save();
        $post->tags()->attach($request->tags);

        $subscribers = Subscriber::all();

        foreach($subscribers as $subscriber){

        Notification::route('mail', $subscriber->email)->notify(new NotifyToSubscriber($post));

        }

        Toastr::success('Post added successfully', 'Success');
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post       = Post::find($id);
        $categories = Category::all();
        $tags       = Tag::all(); 

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title'     => 'required',
            'image'     => 'image',
            'body'      => 'required',
            'category'  => 'required',
            'tags'      => 'required'
        ));
        $post = Post::find($id);
        $slug    = str_slug($request->title);

        if($request->hasFile('image')){
        // add new photo
        $image = $request->file('image');
        $img_name = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        $location = public_path('frontend/post-images/'.$img_name);
        Image::make($image)->resize(550, 340)->save($location);

        $old_image_name = $post->image;

        // update the database
        $new_image_name = $img_name;

        // delete the old photo
        Storage::delete($old_image_name);

        }else{

            $img_name = $post->image;

        }
        $post = new Post;
        $post->title        = $request->title;
        $post->slug         = $slug;
        $post->user_id      = Auth::user()->id;
        $post->category_id  = $request->category;
        $post->image        = $new_image_name;
        $post->body         = $request->body;
        $post->view_count   = '0';
        $post->status       = 1;
        $post->is_approved  = 1;
        // $post->tags()->sync($request->tags, false);

        $post->save();
        $post->tags()->sync($request->tags); // sync works only many to many
     

        Toastr::success('Post updated successfully', 'Success');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // $post->tags->detach();

        $post->delete();
        Storage::delete($post->image);
       

        Toastr::success('Post has deleted', 'Deleted!');
        return redirect()->route('admin.post.index');
    }
}
