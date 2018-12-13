@extends('frontend.layouts.app')




@section('content')

    <div class="container">

        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>Checkout - Payment method</li>
            </ul>
        </div>

        <div class="col-md-9" id="checkout">

            <div class="box">
                <form method="get" action="{{route('checkout_payment_post')}}" id="post-payment">
                    {{csrf_field()}}

                    <h1>Checkout - Payment method</h1>
                    <ul class="nav nav-pills nav-justified">
                        @guest
                            <li><a href="{{route('checkout_address_guest')}}"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                        @else
                            <li><a href="{{route('checkout_address_user')}}"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                        @endguest
                        <li><a href="{{route('checkout_delivery')}}"><i class="fa fa-truck"></i><br>Delivery Method</a>
                        </li>
                        <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                        </li>
                    </ul>

                    <div class="content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4>Paypal</h4>

                                    <p>We like it all.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="payment" value="transfer">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4>Payment gateway</h4>

                                    <p>VISA and Mastercard only.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="payment" value="on_delivery">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4>Cash on delivery</h4>

                                    <p>You pay when you get it.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="payment" value="cash">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.content -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{route('checkout_delivery')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Shipping method</a>
                        </div>
                        <div class="pull-right">
                            <a href="#" onclick="event.preventDefault();
                     document.getElementById('post-payment')
                             .submit();" class="btn btn-primary"><i class="fa fa-chevron-right"></i>Continue to Order review</a>
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
