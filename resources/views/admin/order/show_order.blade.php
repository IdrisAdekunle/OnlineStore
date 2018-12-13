@extends('admin.layouts.app')



@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }})">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">{{$order->order_no}}</h1>
                    @if($order->processing == 0 && $order->delivered == 0)
                        <h2 class="h4 font-w400 text-white-op mb-0">Payment has not be made for this order</h2>
                    @endif

                    @if($order->processing == 1 && $order->delivered == 0)
                        <h2 class="h4 font-w400 text-white-op mb-0">Currently processing..</h2>
                        @endif

                    @if($order->processing == 1 && $order->delivered == 1)
                        <h2 class="h4 font-w400 text-white-op mb-0">Order has been delivered</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Breadcrumb -->
    <div class="bg-body-light border-b">
        <div class="content py-5 text-center">
            <nav class="breadcrumb bg-body-light mb-0">
                <a class="breadcrumb-item" href="{{route('dashboard')}}">Dashboard</a>
                <a class="breadcrumb-item" href="{{route('order.index')}}">Orders</a>
                <span class="breadcrumb-item active">{{$order->order_no}}</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <!-- Progress -->

        @include('admin.layouts.success')

        @include('admin.layouts.error')
        @if($order->delivered == 0)
        <form action="{{route('order.complete',$order->order_no )}}" method="POST" >

            {{ method_field('PUT') }}

            {{ csrf_field()}}

            <input  value="1" name="delivered" class="hidden" >


        <h2 class="content-heading">
            <button type="button" class="btn btn-sm btn-secondary float-right" onclick="form.submit()">
                <i class="fa fa-check text-success mr-5"></i>Complete
            </button>
            Progress
        </h2>

        </form>
        @endif
        <div class="row gutters-tiny">
            <!-- Submitted -->
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded">
                    <div class="block-content block-content-full">
                        <div class="py-20 text-center">
                            <div class="mb-20">
                                <i class="fa fa-check fa-3x text-success"></i>
                            </div>
                            <div class="font-size-sm font-w600 text-uppercase text-success">1. Submitted</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Submitted -->

            <!-- Payment -->
            @if($order->processing == 1)
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded">
                    <div class="block-content block-content-full">
                        <div class="py-20 text-center">
                            <div class="mb-20">
                                <i class="fa fa-check fa-3x text-success"></i>
                            </div>
                            <div class="font-size-sm font-w600 text-uppercase text-success">2. Payment</div>
                        </div>
                    </div>
                </div>
            </div>
            @else

                <div class="col-md-6 col-xl-3">
                    <div class="block block-rounded">
                        <div class="block-content block-content-full">
                            <div class="py-20 text-center">
                                <div class="mb-20">
                                    <i class="fa fa-times fa-3x text-muted"></i>
                                </div>
                                <div class="font-size-sm font-w600 text-uppercase text-muted">2. Payment</div>
                            </div>
                        </div>
                    </div>
                </div>

                @endif
            <!-- END Payment -->

            <!-- Completed -->

            @if($order->delivered == 0)
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded">
                    <div class="block-content block-content-full">
                        <div class="py-20 text-center">
                            <div class="mb-20">
                                <i class="fa fa-times fa-3x text-muted"></i>
                            </div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">3. Completed</div>
                        </div>
                    </div>
                </div>
            </div>

            @else
                <div class="col-md-6 col-xl-3">
                    <div class="block block-rounded">
                        <div class="block-content block-content-full">
                            <div class="py-20 text-center">
                                <div class="mb-20">
                                    <i class="fa fa-check fa-3x text-success"></i>
                                </div>
                                <div class="font-size-sm font-w600 text-uppercase text-success">3. Completed</div>
                            </div>
                        </div>
                    </div>
                </div>

                @endif


            <!-- END Completed -->
        </div>
        <!-- END Progress -->

        <!-- Customer -->
        @if($order->processing == 0)
        <form action="{{route('order.paid',$order->order_no )}}" method="POST" >

            {{ method_field('PUT') }}

            {{ csrf_field()}}
        <h2 class="content-heading">


                <input  value="1" name="processing" class="hidden" >

                <button type="button" class="btn btn-sm btn-secondary float-right" onclick="form.submit()">
                <i class="fa fa-money text-info mr-5"></i>Confirm payment
            </button>

            Customer
        </h2>

        </form>
        @endif
        <div class="row row-deck">
            <!-- Customer's Basic Info -->
            <div class="col-lg-4">
                <a class="block block-rounded block-link-shadow text-center" href="">
                    <div class="block-content bg-gd-dusk">
                        <div class="push">
                            <img class="img-avatar img-avatar-thumb" src="{{asset('backend/img/avatars/avatar15.jpg')}}" alt="">
                        </div>
                        <div class="pull-r-l pull-b py-10 bg-black-op-25">
                           @if($order->user_id == NULL)
                            <div class="font-w600 mb-5 text-white">
                                {{$order->guest->fname}} &nbsp; {{$order->guest->lname}} <i class="fa fa-star text-warning"></i>
                            </div>
                            @else
                                <div class="font-w600 mb-5 text-white">
                                    {{$order->user->name}}   <i class="fa fa-star text-warning"></i>
                                </div>
                               @endif
                            @if($order->user_id == Null)

                            <div class="font-size-sm text-white-op">Guest customer</div>
                       @else

                                   <div class="font-size-sm text-white-op">Registered customer</div>
                            @endif

                        </div>
                    </div>

                    <div class="block-content">
                        <div class="row items-push text-center">
                            @if($order->user_id == Null)

                            <div class="col-6">
                                <div class="mb-5"><i class="si si-bag fa-2x"></i></div>
                                <div class="font-size-sm text-muted">Guest Order</div>
                            </div>
                            @else

                                <div class="col-6">
                                    <div class="mb-5"><i class="si si-bag fa-2x"></i></div>
                                    <div class="font-size-sm text-muted">{{$order->user()->count()}} Orders </div>
                                </div>

                                  @endif

                                @if($order->user_id == Null)
                            <div class="col-6">
                                <div class="mb-5"><i class="si si-basket-loaded fa-2x"></i></div>
                                <div class="font-size-sm text-muted">{{$order->OrderItems()->count()}} Products</div>
                            </div>
                                @else

                                    <div class="col-6">
                                        <div class="mb-5"><i class="si si-basket-loaded fa-2x"></i></div>
                                        <div class="font-size-sm text-muted">{{$user_orders_products}}  Products</div>
                                    </div>

                            @endif


                        </div>
                    </div>
                </a>
            </div>
            <!-- END Customer's Basic Info -->

            <!-- Customer's Past Orders -->
            @if($order->guest_id == NULL)

            <div class="col-lg-8">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Past Orders</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-sm table-striped">
                            <tbody>
                           @forelse($user_past_orders as $user_order)
                            <tr>
                                <td>
                                    <a class="font-w600" href="">{{$user_order->order_no}}</a>
                                </td>
                               @if($user_order->delivered == 1)
                                <td>
                                    <span class="badge badge-success">Completed</span>
                                </td>
                                @else
                                    <td>
                                        <span class="badge badge-info">processing</span>
                                    </td>
                                   @endif
                                <td class="d-none d-sm-table-cell">
                                    2017/10/27                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a href="">{{$user_order->user->name}}</a>
                                </td>
                                <td class="text-right">
                                    <span class="text-black">{{ '₦'.number_format($order->total,2)}}</span>
                                </td>
                            </tr>
                               @empty

                               {{$order->user->name}} has ordered only once


                               @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Customer's Past Orders -->
            @endif
        </div>


        <!-- END Customer -->

        <!-- Addresses -->
        <h2 class="content-heading">Addresses</h2>
        @if($order->user_id == Null)
        <div class="row row-deck gutters-tiny">
            <!-- Billing Address -->
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Billing Address</h3>
                    </div>
                    <div class="block-content">
                        <div class="font-size-lg text-black mb-5">{{$order->guest->fname}} &nbsp; {{$order->guest->lname}} </div>
                        <address>
                            {{$order->guest->street}}<br>
                            {{$order->guest->city}}<br>
                            {{$order->guest->state}}<br><br>
                            <i class="fa fa-phone mr-5"></i>{{$order->guest->phone}}<br>
                            <i class="fa fa-envelope-o mr-5"></i> <a href="javascript:void(0)">{{$order->guest->email}}</a><br>
                            <h6>Payment type: {{$order->payment_type}}</h6>
                        </address>
                    </div>
                </div>
            </div>
            <!-- END Billing Address -->

            <!-- Shipping Address -->
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Shipping Address</h3>
                    </div>
                    <div class="block-content">
                        <div class="font-size-lg text-black mb-5">{{$order->guest->fname}} &nbsp; {{$order->guest->lname}} </div>
                        <address>
                            {{$order->guest->street}}<br>
                            {{$order->guest->city}}<br>
                            {{$order->guest->state}}<br><br>
                            <i class="fa fa-phone mr-5"></i>{{$order->guest->phone}}<br>
                            <i class="fa fa-envelope-o mr-5"></i> <a href="javascript:void(0)">{{$order->guest->email}}</a><br>
                            <h6>Delivery type: {{$order->delivery_type}}</h6>
                        </address>
                    </div>
                </div>
            </div>
            <!-- END Shipping Address -->
        </div>

        @else

            <div class="row row-deck gutters-tiny">
                <!-- Billing Address -->
                <div class="col-md-6">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Billing Address</h3>
                        </div>
                        <div class="block-content">
                            <div class="font-size-lg text-black mb-5">{{$address->fname}} &nbsp; {{$address->fname}} </div>
                            <address>
                                {{$address->street}}<br>
                                {{$address->city}}<br>
                                {{$address->state}}<br><br>
                                <i class="fa fa-phone mr-5"></i>  {{$address->phone}}<br>
                                <i class="fa fa-envelope-o mr-5"></i> <a href="javascript:void(0)">{{$order->user->email}}</a><br>
                                <h6>Payment type: {{$order->payment_type}}</h6>
                            </address>
                        </div>
                    </div>
                </div>
                <!-- END Billing Address -->

                <!-- Shipping Address -->
                <div class="col-md-6">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Shipping Address</h3>
                        </div>
                        <div class="block-content">
                            <div class="font-size-lg text-black mb-5">{{$address->fname}} &nbsp; {{$address->fname}} </div>
                            <address>
                                {{$address->street}}<br>
                                {{$address->city}}<br>
                                {{$address->state}}<br><br>
                                <i class="fa fa-phone mr-5"></i>  {{$address->phone}}<br>
                                <i class="fa fa-envelope-o mr-5"></i> <a href="javascript:void(0)"> {{$order->user->email}}</a><br>
                                <h6>Delivery type: {{$order->delivery_type}}</h6>
                            </address>
                        </div>
                    </div>
                </div>
                <!-- END Shipping Address -->
            </div>

            @endif




        <!-- END Addresses -->



        <!-- Products -->
        <h2 class="content-heading">Products ({{$order->OrderItems()->count()}})</h2>
        <div class="block block-rounded">
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped">
                        <thead>
                        <tr>
                            <th style="width: 100px;">ID</th>
                            <th>Product</th>
                            <th class="text-center">QTY</th>
                            <th class="text-right" >UNIT</th>
                            <th class="text-right" >PRICE</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->OrderItems as $item)
                        <tr>
                            <td>
                                <a class="font-w600" href="">{{$item->no}}</a>
                            </td>
                            <td>
                                <a href="">{{$item->name}}</a>
                            </td>
                            <td class="text-center font-w600">{{$item->pivot->qty}}</td>
                            <td class="text-right">{{ '₦'.number_format($item->price,2)}}</td>
                            <td class="text-right">{{ '₦'.number_format($item->pivot->total,2)}}</td>
                        </tr>
                       @endforeach
                        <tr>
                            <td colspan="5" class="text-right font-w600">Total Price:</td>
                            <td class="text-right">{{ '₦'.number_format($subtotal,2)}}</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right font-w600">Shipping fee:</td>
                            <td class="text-right">{{ '₦'.number_format($order->shipping_fee,2)}}</td>
                        </tr>
                        <tr class="table-success">
                            <td colspan="5" class="text-right font-w600 text-uppercase">Total:</td>
                            <td class="text-right font-w600">{{ '₦'.number_format($order->total,2)}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Products -->
    </div>









    @endsection
