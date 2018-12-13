@extends('frontend.layouts.app')



@section('content')



    <div class="container" style="margin-left: 13%">

        <div class="col-md-9">
            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li><a href="#">Shop</a>
                </li>
                <li>{{$product->name}}</li>
            </ul>

        </div>

            <!-- *** MENUS AND FILTERS END *** -->

        <div class="col-md-9">

            <div class="row" id="productMain">
                <div class="col-sm-6">
                    <div id="mainImage">
                        <img src="{{$product->picture}}" alt="" class="img-responsive">
                    </div>

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
                <div class="col-sm-6">
                    <div class="box">
                        <h1 class="text-center">{{$product->name}}</h1>
                        <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, sizes</a>
                        </p>
                        @if($product->stock == 0)
                            <h6 class="text-center"><b>Available: Out of stock</b></h6>
                        @else
                            <h6 class="text-center"><b>Available: In stock</b></h6>
                        @endif


                        <form action="{{route('add_to_cart',$product->name)}}" id="add-to-cart" method="post">
                            {{ csrf_field() }}
                                <select name="size" class="form-control" style="width: 31%;margin-left: 34%">
                                    <option> size </option>
                                    @foreach($product->sizes as $size)
                                    <option value="{{$size}}"> {{$size}} </option>
                                    @endforeach
                                </select>
                        <br/>
                        <select name="color" class="form-control" style="width: 35%;margin-left: 34%">
                                    <option> color </option>
                                    @foreach($product->colors as $color)
                                    <option value="{{$color}}"> {{$color}} </option>
                                    @endforeach
                                </select>
                        </form>

                        <p class="price">{{ '₦'.number_format($product->price,2)}}</p>

                        <p class="text-center buttons">
                             @if (array_key_exists($product->id,Cart::content()->groupBy('id')->toArray()))

                                <a href="{{route('remove_cart',$product->id)}}"
                     class="btn btn-danger"><i class="fa fa-shopping-cart"></i>Remove from cart</a>


                            @else

                                <a href="#" onclick="event.preventDefault();
                     document.getElementById('add-to-cart')
                             .submit();" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>


                               @endif


                          @guest

                                <a href="#" onclick="event.preventDefault();
                     document.getElementById('product-fav-form')
                             .submit();" class="btn btn-default"><i class="fa fa-heart"></i>Add to wishlist</a>

                        <form id="product-fav-form" class="hidden"
                              action="{{ route('add', $product) }}" method="POST">
                            {{ csrf_field() }}
                        </form>

                        @else

                            @if(!$product->WishlistedBy(Auth::user()))
                            <a href="#" onclick="event.preventDefault();
                     document.getElementById('product-fav-form')
                             .submit();" class="btn btn-default"><i class="fa fa-heart"></i>Add to wishlist</a>

                        <form id="product-fav-form" class="hidden"
                              action="{{ route('add', $product) }}" method="POST">
                            {{ csrf_field() }}
                        </form>

                       @else
                            <a href="#" onclick="event.preventDefault();
                                document.getElementById('product-fav-destroy-{{ $product->id }}')
                                .submit();" class="btn btn-primary">
                                <i class="fa fa-heart-o"></i>Remove from Wishlist
                            </a>

                            <form action="{{ route('remove', $product) }}"
                                  method="POST"
                                  id="product-fav-destroy-{{ $product->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                           @endif

                        @endguest

                    </div>

                    <div class="row" id="thumbs">
                        <div class="col-xs-4">
                            <a href="{{$product->picture}}" class="thumb">
                                <img src="{{$product->picture}}" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="{{$product->picture1}}" class="thumb">
                                <img src="{{$product->picture1}}" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="{{$product->picture2}}" class="thumb">
                                <img src="{{$product->picture2}}" alt="" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>

            </div>


            <div class="box" id="details">
                <p>
                <h4>Product details</h4>
                <p>{!! $product->description !!}</p>

                <h4> Available Sizes</h4>
                <ul>
                    @foreach($product->sizes as $size)
                    <li>{{$size}}</li>
                    @endforeach
                </ul>
                <h4>Available Colors</h4>
                <ul>
                    @foreach($product->colors as $color)
                    <li>{{$color}}</li>
                    @endforeach
                </ul>

                <hr>
                <div class="social">
                    <h4>Show it to your friends</h4>
                    <p>
                        <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </p>
                </div>
            </div>

            <div class="row same-height-row">
                <div class="col-md-3 col-sm-6">
                    <div class="box same-height">
                        <h3>You may also like these products</h3>
                    </div>
                </div>

                @foreach($interests as $interest)
                <div class="col-md-3 col-sm-6">
                    <div class="product same-height">
                        <div class="flip-container">
                            <div class="flipper">
                                <div class="front">
                                    <a href="">
                                        <img src="{{$interest->picture}}" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="back">
                                    <a href="">
                                        <img src="{{$interest->picture1}}" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="" class="invisible">
                            <img src="{{$interest->picture}}" alt="" class="img-responsive">
                        </a>
                        <div class="text">
                            <a href="{{route('show',$interest->name)}}" class="">
                            <h3>{{$interest->name}}</h3>
                            </a>
                            <p class="price">{{ '₦'.number_format($interest->price,2)}}</p>
                        </div>
                    </div>
                    <!-- /.product -->
                </div>

                    @endforeach




</div>

        </div>

    </div>


    @endsection
