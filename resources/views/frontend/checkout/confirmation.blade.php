@extends('frontend.layouts.app')


@section('content')
    <div class="container">

        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>Order placed</li>
            </ul>


            <div class="row" id="error-page">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="box">

                        <p class="text-center">
                            <img src="{{asset('frontend/img/urbnn.jpg')}}" alt="">
                        </p>

                        <h3>Thank you for Patronizing</h3>
                        <h4 class="text-muted">Your Order has been recieved and its been processed</h4>

                        <p class="buttons"><a href="{{url('/shop')}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Go to shop</a>
                        </p>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.col-md-9 -->
    </div>




@endsection
