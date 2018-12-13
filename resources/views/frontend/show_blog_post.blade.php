@extends('frontend.layouts.app')



@section('content')




    <div class="container">

        <div class="col-sm-12">

            <ul class="breadcrumb">

                <li><a href="{{url('/')}}">Home</a>
                </li>
                <li><a href="{{url('/blog')}}">Blog</a>
                </li>
                <li>Blog post</li>
            </ul>
        </div>

        <div class="col-sm-9" id="blog-post">


            <div class="box">

                <h1>{{$post->title}}</h1>

                <p class="author-date">By <a href="#">{{$post->admin->name}}</a> | {{$post->created_at->toFormattedDateString()}}</p>



                <div class="sharethis-inline-share-buttons" ></div>

            <br/>

                <div id="post-content">

                    <p>
                        <img src="{{$post->image}}" class="img-responsive" alt="Example blog post alt">
                    </p>

                    <p>
                        {!! $post->description !!}
                    </p>

                </div>
                <!-- /#post-content -->

                <!-- /#comment-form -->

            </div>
            <!-- /.box -->
        </div>



@include('frontend.layouts.categories_tags')

        <div class="banner">
            <a href="#">
                <img src="{{asset('frontend/img/urbnn.jpg')}}" alt="sales 2014" class="img-responsive">
            </a>
        </div>

    </div>

    @endsection
