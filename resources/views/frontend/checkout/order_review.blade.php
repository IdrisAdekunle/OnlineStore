@extends('frontend.layouts.app')


@section('content')

    <div class="container">

        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>Checkout - Order review</li>
            </ul>
        </div>

        <div class="col-md-9" id="checkout">

            <div class="box">
                <form method="post" action="checkout4.html">


                    <h1>Checkout - Order review</h1>
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
                        <li><a href="{{route('checkout_payment')}}"><i class="fa fa-money"></i><br>Payment Method</a>
                        </li>
                        <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                        </li>
                    </ul>

                    <div class="content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th>size</th>
                                    <th>color</th>
                                    <th colspan="2">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cartItems as $item)
                                    <tr>
                                        <td>
                                            <a href="#">
                                                <img src="{{$item->model->picture}}" alt="">
                                            </a>
                                        </td>
                                        <td><a href="#">{{$item->name}}</a>
                                        </td>
                                        <td>
                                            {{$item->qty}}
                                        </td>
                                        <td>₦{{$item->price}}</td>
                                        <td>{{$item->options->size}}</td>
                                        <td>{{$item->options->color}}</td>
                                        <td>₦{{$item->total}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="6">Total</th>
                                    <th colspan="2">₦{{Cart::total()}}</th>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.content -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{route('checkout_payment')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Payment method</a>
                        </div>
                        <div class="pull-right">
                            <a href="{{route('place_order')}}" class="btn btn-primary"><i class="fa fa-chevron-right"></i>Place order</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col-md-9 -->

        <div class="col-md-3">
            <div class="box" id="order-summary">
                <div class="box-header">
                    <h3>Order summary</h3>
                </div>
                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Order subtotal</td>
                            <th>₦{{Cart::subtotal()}}</th>
                        </tr>
                        <tr>
                            <td>Shipping and handling</td>
                            <th>{{ '₦'.number_format($shipping_fee,2)}}</th>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <th>₦0.00</th>
                        </tr>
                        <tr class="total">
                            <td>Total</td>
                            <th>{{ '₦'.number_format($total,2)}}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>


    </div>

    @endsection
