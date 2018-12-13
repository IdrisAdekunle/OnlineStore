<?php

namespace App\Http\Controllers;


use App\BlogCategory;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\support\facades\file;

class PostController extends Controller
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
        $posts = Post::paginate(10);
        return view('admin.post.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = BlogCategory::all();

        return view('admin.post.create',['tags' => $tags,'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // return auth()->user()->name;

        $this->validate($request,[
            'description' => 'required',
            'title'  => 'required',
            'tags'  => 'required',
            'category'  => 'required',

        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->admin_id = auth()->user()->id;
        $post->status = $request->status;
        $post->image = $request->image;
        $post->category_id = $request->category;

        $post->save();

        $post->tags()->attach($request->tags);

        return back()->withMessage('post created');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all()->pluck('name','id');
        // $selected = $post->tags->toArray();
        $categories = BlogCategory::all()->pluck('name','id');
        // return $selected;
        return view('admin.post.edit', compact('post','tags','categories'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
       // return $request->all();

        if(! isset($request->status)){

            $t_all = Tag::all()->pluck('id');

            $post->tags()->detach($t_all);

            $post->tags()->attach($request->tags);

            $post->update(array_merge($request->except(['tags']),['status' => false]));

        }

        else{

            $t_all = Tag::all()->pluck('id');

            $post->tags()->detach($t_all);

            $post->tags()->attach($request->tags);

            $post->update($request->except(['tags']));

        }



        return redirect()->route('post.index')->withMessage('post updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $image_path = 'post images/'.$post->image;
        if(File::exists($image_path)){

            File::delete($image_path);

        }

        return redirect()->route('post.index')->withMessage('post deleted');
    }
}
