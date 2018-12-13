<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $categories = BlogCategory::paginate(3);
        $count_categories = BlogCategory::all()->count();

        return view ('admin.category.index',compact('categories','count_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new BlogCategory();
        $category->name = $request->name;
        $category->save();

        session()->flash('message','category created');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategory $blogcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategory $blogcategory)
    {
        return view('admin.category.edit',compact('blogcategory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogCategory $blogcategory)
    {
        $blogcategory->update($request->all());

        session()->flash('message','category updated');
        return redirect()->route('blogcategory.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $blogcategory)
    {
        $blogcategory->delete();

        session()->flash('message','category deleted');
        return redirect()->route('blogcategory.index');

    }

    public function publish(Request $request,BlogCategory $blogcategory){
        $blogcategory->update($request->all());

        session()->flash('message','category published');
        return redirect()->route('blogcategory.index');


    }
}
