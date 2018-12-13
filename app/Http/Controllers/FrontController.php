<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Post;
use App\Tag;
use App\BlogCategory;
use Darryldecode\Cart\Cart;
class FrontController extends Controller
{
    public function Homepage(){


        $products = Product::where('status',1)->latest()->get();
        $blogs = Post::where('status',1)->latest()->get()->take(2);


      //  return $blogs;

        return view('frontend.welcome',compact('products','blogs'));


    }

    public function shop(){


        $products = Product::where('status',1)->latest()->paginate(8);

        return view('frontend.shop',compact('products'));


    }

    public function show(Product $product){

       //return $product;

        $interests = Product::where('id','!=',$product->id)->get()->random(3);

        return view('frontend.show',compact('product','interests'));

    }

    public function ChangePassword(Request $request){

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'confirmed|min:8|different:old_password',
        ]);

        if (Hash::check($request->old_password, $request->user()->password)) {

            $request->user()->update($request->only(['password']));


            return back()->withMessage('Password changed');

        } else {

            return back()->withMessage('Password does not match');
        }

    }

    public function blog(){

       // $categories = BlogCategory::where('status',1)->latest()->get();
       // $tags = Tag::all();
        $posts = Post::Where('status', 1)->latest()->paginate(5);

        return view('frontend.blog',compact('posts'));

    }


    public function ShowPost($slug)
    {

        $post = Post::where('slug', $slug)->get()->first();

        //return $post;
        return view('frontend.show_blog_post', compact('post'));


    }

    public function ShowTagPosts(Tag $tag)
    {
        //$tag = Tag::where('name',$tag)->pluck('id');

        // return $tag;
        $posts = $tag->posts()->where('status',1)->latest()->paginate(5);

        return view('frontend.blog', compact('posts'));
    }

    public function ShowCategoryPosts (BlogCategory $blogCategory)
    {
        //$tag = Tag::where('name',$tag)->pluck('id');

        // return $tag;
        $posts = $blogCategory->posts()->where('status',1)->latest()->paginate(5);

        return view('frontend.blog', compact('posts'));
    }

    public function Contact(Request $request){

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:255',
            'message' =>  'required|max:255'
        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'bodymessage' => $request->message,
        );



        return back()->withMessage('message sent');


    }

    }
