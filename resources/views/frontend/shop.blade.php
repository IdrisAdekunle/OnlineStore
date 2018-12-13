@extends('frontend.layouts.app')


@section('content')


    <div class="container">

        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>Shop</li>
            </ul>

            <div class="box">
                <h1>All products</h1>
                <p>we offer wide selection of the best products we have found and carefully selected worldwide.</p>
            </div>


    @foreach($products->chunk(4) as $items)
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
                            </p>
                        </div>
                        <!-- /.text -->
                    </div>

                    <!-- /.product -->
                </div>
                @endforeach

                </div>
            @endforeach

            </div>




            <div class="pages">

                <ul class="pagination">
                   {{$products->links()}}
                </ul>
            </div>

        </div>




@endsection
