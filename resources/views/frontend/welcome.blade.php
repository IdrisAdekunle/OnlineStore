@extends('frontend.layouts.app')


@section('content')

    <div class="container">
        <div class="col-md-12">
            <div id="main-slider">
                <div class="item">
                    <img src="frontend/img/main-slider1.jpg" alt="" class="img-responsive">
                </div>
                <div class="item">
                    <img class="img-responsive" src="frontend/img/main-slider2.jpg" alt="">
                </div>
                <div class="item">
                    <img class="img-responsive" src="frontend/img/main-slider3.jpg" alt="">
                </div>
                <div class="item">
                    <img class="img-responsive" src="frontend/img/main-slider4.jpg" alt="">
                </div>
            </div>
            <!-- /#main-slider -->
        </div>
    </div>

    <!-- *** ADVANTAGES HOMEPAGE ***
_________________________________________________________ -->
    <div id="advantages">

        <div class="container">
            <div class="same-height-row">
                <div class="col-sm-4">
                    <div class="box same-height clickable">
                        <div class="icon"><i class="fa fa-heart"></i>
                        </div>

                        <h3><a href="#">We love our customers</a></h3>
                        <p>We are known to provide best possible service ever</p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="box same-height clickable">
                        <div class="icon"><i class="fa fa-tags"></i>
                        </div>

                        <h3><a href="#">Best prices</a></h3>
                        <p>You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="box same-height clickable">
                        <div class="icon"><i class="fa fa-thumbs-up"></i>
                        </div>

                        <h3><a href="#">100% satisfaction guaranteed</a></h3>
                        <p>Free returns on everything for 3 months.</p>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /#advantages -->

    <!-- *** ADVANTAGES END *** -->

    <!-- *** HOT PRODUCT SLIDESHOW ***
_________________________________________________________ -->
    <div id="hot">

        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>Hot this week</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="product-slider">
               @foreach($products as $product)

                <div class="item">
                    <div class="product">
                        <div class="flip-container">
                            <div class="flipper">
                                <div class="front">
                                    <a href="">
                                        <img src="{{$product->picture}}" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="back">
                                    <a href="">
                                        <img src="{{$product->picture1}}" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="" class="invisible">
                            <img src="{{$product->picture2}}" alt="" class="img-responsive">
                        </a>
                        <div class="text">
                            <h3><a href="{{route('show',$product->name)}}">{{$product->name}}</a></h3>
                            <p class="price"> {{ '₦'.number_format($product->price,2)}}</p>
                        </div>

                        <!-- /.text -->

                        <div class="ribbon sale">
                            <div class="theribbon">HOT</div>
                            <div class="ribbon-background"></div>
                        </div>
                        <!-- /.ribbon -->

                        <div class="ribbon new">
                            <div class="theribbon">NEW</div>
                            <div class="ribbon-background"></div>
                        </div>
                        <!-- /.ribbon -->

                    </div>

                </div>

                @endforeach

            </div>
            <!-- /.product-slider -->
        </div>
        <!-- /.container -->

    </div>
    <!-- /#hot -->

    <!-- *** HOT END *** -->

    <!-- *** GET INSPIRED ***
_________________________________________________________ -->
    <div class="container" data-animate="fadeInUpBig">
        <div class="col-md-12">
            <div class="box slideshow">
                <h3>Get Inspired</h3>
                <p class="lead">Get the inspiration from our world class designers</p>
                <div id="get-inspired" class="owl-carousel owl-theme">

                    <div class="item">
                        <a href="#">
                            <img src="frontend/img/getinspired1.jpg" alt="Get inspired" class="img-responsive">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- *** GET INSPIRED END *** -->



    @if($blogs->count() == 2)
    <div class="box text-center" data-animate="fadeInUp">
        <div class="container">
            <div class="col-md-12">
                <h3 class="text-uppercase">From our blog</h3>

                <p class="lead">What's new in the world of fashion? <a href="{{url('/blog')}}">Check our blog!</a>
                </p>
            </div>
        </div>
    </div>


    <div class="container">

        <div class="col-md-12" data-animate="fadeInUp">

            <div id="blog-homepage" class="row">
                @foreach($blogs as $blog)
                <div class="col-sm-6">

                    <div class="post">
                        <h4><a href="{{route('show_blog_post',$blog->slug)}}">{{$blog->title}}</a></h4>
                        <p class="author-category">By <a href="#">{{$blog->admin->name}}</a> in <a href="">{{$blog->category->name}}</a>
                        </p>
                        <hr>
                        <p class="intro">{!! substr(strip_tags($blog->description),0,250) !!}{!! strlen(strip_tags($blog->description)) > 250 ? '...' : "" !!}</p>
                        <p class="read-more"><a href="{{route('show_blog_post',$blog->slug)}}" class="btn btn-primary">Continue reading</a>
                        </p>
                    </div>
                </div>

        @endforeach
            </div>
            <!-- /#blog-homepage -->
        </div>
    </div>
    @else


@endif




@endsection
