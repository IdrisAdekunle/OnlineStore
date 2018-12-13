@extends('frontend.layouts.app')


@section('content')

    <div class="container">

        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a>
                </li>
                <li>My wishlist</li>
            </ul>

        </div>

        <div class="col-md-3">
            <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
          @include('frontend.layouts.side')
            <!-- /.col-md-3 -->

            <!-- *** CUSTOMER MENU END *** -->
        </div>

        <div class="col-md-9" id="wishlist">

            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>Ladies</li>
            </ul>
            @if($products->count())
            <div class="box">
                <h1>My wishlist</h1>
            </div>
            @else

                <div class="box">
                    <h1>No wishlist</h1>
                    <p class="lead"> Sorry you have not added any item </p>
                </div>


                @endif

            @forelse($products->chunk(4) as $items)
                <div class="row products">
                    @foreach($items as $product)
                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="">
                                                <img src="{{$product->picture1}}" alt="" class="img-responsive">
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
                                    <h3><a href="">{{$product->name}}</a></h3>
                                    <p class="price">{{ '₦'.number_format($product->price,2)}}</p>
                                    <p class="buttons">
                                        <a href="{{route('show',$product->name)}}" class="btn btn-default">View detail</a>
                                        <a href="" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>

                            <!-- /.product -->
                        </div>
                    @endforeach
                @empty




                </div>
    @endforelse


        </div>

    </div>

        <div class="pages">

            <ul class="pagination">
                {{$products->links()}}
            </ul>
        </div>





    @endsection
