<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Category;
use Image;
use Storage;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name'  => 'required',
            'image' => 'required|image',
        ));

        $slug = str_slug($request->name);

        if($request->hasFile('image')){
            $image          = $request->file('image');
            $img_path       = $slug.'-'.uniqid().$image->getClientOriginalExtension();
            $img_location   = public_path('frontend/images/'.$img_path);
            Image::make($image)->resize(275, 185)->save($img_location);
        }else{
            $img_path = 'default-cat.jpeg';
        }

        $cat = new Category;
        $cat->name = $request->name;
        $cat->slug = str_slug($cat->name);
        $cat->image = $img_path;
        $cat->save();

        Toastr::success('Category added successfully', 'Success!');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        Storage::delete($cat->image);

        Toastr::warning('Category has deleted ', 'Deleted!');
        return redirect()->route('admin.category.index');
    }
}
