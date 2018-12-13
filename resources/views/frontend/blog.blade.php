@extends('frontend.layouts.app')


@section('content')

    <div class="container">

        <div class="col-sm-12">
            <ul class="breadcrumb">

                <li><a href="index.html">Home</a>
                </li>
                <li>Blog listing</li>
            </ul>
        </div>

        <!-- *** LEFT COLUMN ***
     _________________________________________________________ -->

        <div class="col-sm-9" id="blog-listing">

            @if($posts->count())
                <div class="box">

                <h1>Blog</h1>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p>

            </div>
            @else


                @endif

           @forelse($posts as $post)
            <div class="post">
                <h2><a href="{{route('show_blog_post',$post->slug)}}">{{$post->title}}</a></h2>
                <p class="author-category">By <a href="#"> {{$post->admin->name}}</a> in <a href="">{{$post->category->name}} </a>
                </p>
                <hr>
                <p class="date-comments">
                    <a href=""><i class="fa fa-calendar-o"></i> {{$post->created_at->toFormattedDateString()}} </a>
                    <a href=""><i class="fa fa-comment-o"></i> 8 Comments</a>
                </p>
                <div class="image">
                    <a href="">
                        <img src="{{$post->image}}" class="img-responsive" alt="Example blog post alt">
                    </a>
                </div>
                <p class="intro">{!! substr(strip_tags($post->description),0,250) !!}{!! strlen(strip_tags($post->description)) > 250 ? '...' : "" !!}</p>
                <p class="read-more"><a href="{{route('show_blog_post',$post->slug)}}" class="btn btn-primary">Continue reading</a>
                </p>
            </div>

            @empty
                <div class="box">
                    <h1>No blog posts yet</h1>
                    <p class="lead"> We are doing our best to ensure you get the best posts </p>
                </div>

@endforelse


            <ul class="pager">
                {{$posts->links()}}
            </ul>



        </div>
@if($posts->count())

       @include('frontend.layouts.categories_tags')





            <div class="banner">
                <a href="#">
                    <img src="{{asset('frontend/img/urbnn.jpg')}}" alt="sales 2014" class="img-responsive">
                </a>
            </div>

        </div>

@else





    @endif






@endsection
