@extends('frontend.layouts.app')


@section('content')
    <div class="container">

        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="">Home</a>
                </li>
                <li><a href="#">My orders</a>
                </li>
                <li># {{$order->order_no}}</li>
            </ul>

        </div>

        <div class="col-md-3">


           @include('frontend.layouts.side')


        </div>

        <div class="col-md-9" id="customer-order">
            <div class="box">
                <h1>Order #{{$order->order_no}}</h1>
                @if($order->delivered == 0)
                    <p class="lead">Order #{{$order->order_no}} was placed on <strong>{{$order->created_at->toFormattedDateString()}} </strong> and is currently <strong>Being prepared</strong>.</p>
                @else
                    <p class="lead">Order #{{$order->order_no}} was placed on <strong>{{$order->created_at->toFormattedDateString()}} </strong> Has been  <strong>Delivered to your shipping address</strong>.</p>

                @endif

                <p class="text-muted">If you have any questions, please feel free to <a href="{{url('/contact')}}">contact us</a>, our customer service center is working for you 24/7.</p>

                <hr>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th colspan="2">Product</th>
                            <th>Quantity</th>
                            <th>Unit price</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($order->OrderItems as $item)
                        <tr>
                            <td>
                                <a href="#">
                                    <img src="{{$item->picture}}" alt="">
                                </a>
                            </td>
                            <td><a href="#">{{$item->name}}</a>
                            </td>
                            <td>{{$item->pivot->qty}}</td>
                            <td>{{ '₦'.number_format($item->price,2)}}</td>
                            <td>{{ '₦'.number_format($item->pivot->total,2)}}</td>
                        </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="5" class="text-right">Order subtotal</th>
                            <th>{{ '₦'.number_format($subtotal,2)}}</th>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-right">Shipping and handling</th>
                            <th>{{ '₦'.number_format($order->shipping_fee,2)}}</th>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-right">Tax</th>
                            <th>₦0.00</th>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-right">Total</th>
                            <th>{{ '₦'.number_format($order->total,2)}}</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /.table-responsive -->

                <div class="row addresses">
                    <div class="col-md-6">
                        <h2>Invoice address</h2>

                        <p>{{$address->fname}}  &nbsp; {{$address->lname}}
                            <br>{{$address->steet}}
                            <br>{{$address->phone}}
                            <br>{{$address->state}}
                            <br>{{$address->street}}
                            <br>{{auth()->user()->email}}</p>

                    </div>
                    <div class="col-md-6">
                        <h2>Shipping address</h2>

                        <p>{{$address->fname}}&nbsp;{{$address->lname}}
                            <br>{{$address->steet}}
                            <br>{{$address->phone}}
                            <br>{{$address->state}}
                            <br>{{$address->street}}
                            <br>{{auth()->user()->email}}</p>

                    </div>
                </div>

            </div>
        </div>

    </div>





    @endsection
