@extends('frontend.layouts.app')



@section('content')

    <div class="container">

        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>My orders</li>
            </ul>

        </div>

        <div class="col-md-3">
            <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->


                @include('frontend.layouts.side')

            </div>
            <!-- /.col-md-3 -->

            <!-- *** CUSTOMER MENU END *** -->


        <div class="col-md-9" id="customer-orders">
           @if($user_orders->count())
            <div class="box">
                <h1>My orders</h1>

                <p class="lead">Your orders on one place.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                <hr>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_orders as $order)
                        <tr>

                            <th>#{{$order->order_no}}</th>
                            <td>{{$order->created_at->toFormattedDateString()}}</td>
                            <td>{{ '₦'.number_format($order->total,2)}}</td>
                            @if($order->delivered == 0)
                            <td><span class="label label-info">Being prepared</span>
                            </td>
                            @else
                                <td><span class="label label-success">Recieved</span>
                                </td>
                            @endif
                            <td><a href="{{route('show_order',$order->order_no)}}" class="btn btn-primary btn-sm">View</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

               @else
                <div class="box">
                    <h1>My orders</h1>

                    <p class="lead">Your are yet to place any order.</p>
                    <p class="text-muted">If you have any questions, please feel free to <a href="{{url('/contact')}}">contact us</a>, our customer service center is working for you 24/7.</p>

                    <hr>

                </div>


            @endif
        </div>

    </div>




    @endsection
