@extends('frontend.layouts.app')


@section('content')

    <div class="container">

        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>Checkout - Delivery method</li>
            </ul>
        </div>

        <div class="col-md-9" id="checkout">

            <div class="box">
                <form method="get" action="{{route('checkout_delivery_post')}}" id="delivery-post">
                              {{csrf_field()}}
                    <h1>Checkout - Delivery method</h1>
                    <ul class="nav nav-pills nav-justified">
                        @guest
                        <li><a href="{{route('checkout_address_guest')}}"><i class="fa fa-map-marker"></i><br>Address</a>
                        </li>
                        @else
                            <li><a href="{{route('checkout_address_user')}}"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                            @endguest
                        <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                        </li>
                    </ul>

                    <div class="content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box shipping-method">

                                    <h4>USPS Next Day</h4>

                                    <p>Get it right on next day - fastest option possible.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="delivery_name" value="Next day">
                                        <input  name="delivery_price" value="500" class="hidden">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box shipping-method">

                                    <h4>USPS Next Day</h4>

                                    <p>Get it right on next day - fastest option possible.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="delivery_name" value="Express">
                                        <input type="radio" name="delivery_price" value="1500" class="hidden">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="box shipping-method">

                                    <h4>USPS Next Day</h4>

                                    <p>Get it right on next day - fastest option possible.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="delivery_name" value="Week">
                                        <input type="radio" name="delivery_price" value="2500" class="hidden">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.content -->

                    <div class="box-footer">
                        <div class="pull-left">
                            @guest
                            <a href="{{route('checkout_address_guest')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Addresses</a>
                                @else
                                <a href="{{route('checkout_address_user')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Addresses</a>
                            @endguest
                        </div>
                        <div class="pull-right">
                            <a href="#" onclick="event.preventDefault();
                     document.getElementById('delivery-post')
                             .submit();" class="btn btn-primary"><i class="fa fa-chevron-right"></i>Continue to Payment Method</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col-md-9 -->


@include('frontend.layouts.order_side')

    </div>


    @endsection
