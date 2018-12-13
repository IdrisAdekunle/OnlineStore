@extends('frontend.layouts.app')




@section('content')


    <div class="container">

        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>Checkout - Address</li>
            </ul>
        </div>

        <div class="col-md-9" id="checkout">

            <div class="box">
                <form method="get" action="{{route('checkout_address_post')}}" id="post-address">
                    {{csrf_field()}}
                    <h1>Checkout</h1>
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                        </li>
                    </ul>

                    <div class="content">

                        @forelse($address->chunk(2) as $items)
                            <div class="row">
                                @foreach($items as $address)
                                    <div class="col-sm-6">
                                        <div class="box shipping-method">
                                            @if($address->default == 1)
                                                <div class="box-header text-center">
                                                    <a href="" ><i class="fa fa-angle-double-down"></i>Shipping/Billing address </a>
                                                </div>
                                            @else


                                            @endif

                                            <h4>{{$address->fname}} &nbsp; {{$address->lname}}  </h4>

                                            <p> {{str_limit($address->street,20)}} </p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="" value="">
                                            </div>
                                        </div>


                                    </div>



                                @endforeach
                            </div>
                            @empty


                                <h5>You Have not added any default shipping address Kindly click <a href="{{url('/address')}}">here</a> to add address and choose a default for your shipping </h5>


                            @endforelse
                    </div>

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{route('cart')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                        </div>
                        @if($address->count())
                        <div class="pull-right">
                            <a href="#" onclick="event.preventDefault();
                     document.getElementById('post-address')
                             .submit();" class="btn btn-primary"><i class="fa fa-chevron-right"></i>Continue to Delivery Method</a>
                        </div>
                            @endif
                    </div>
                </form>
            </div>
            <!-- /.box -->


        </div>

        @include('frontend.layouts.order_side')

    </div>

@endsection
