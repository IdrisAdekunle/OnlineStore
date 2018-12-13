@extends('admin.layouts.app')


@section('content')

    <div class="bg-image" style="background-image: url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }}) ">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Dashboard</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">Welcome Admin, you have

                        @if($pending_orders > 1)
                            <a class="text-primary-light link-effect" href="">{{$pending_orders}} pending orders</a>.</h2>
                    @else

                        <a class="text-primary-light link-effect" href="">{{$pending_orders}} pending order</a>.</h2>
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
                <a class="breadcrumb-item" href="">Dashboard</a>
                <span class="breadcrumb-item active">All statistics</span>
                <span class="breadcrumb-item active"></span>
            </nav>
        </div>
    </div>


    <div class="content">
        <!-- Statistics -->
        <!-- CountTo ([data-toggle="countTo"] is initialized in Codebase() -> uiHelperCoreAppearCountTo()) -->
        <!-- For more info and examples you can check out https://github.com/mhuggins/jquery-countTo -->
        <div class="content-heading">
            Statistics <small class="d-none d-sm-inline">Awesome!</small>
        </div>
        <div class="row gutters-tiny">
            <!-- Earnings -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-transparent bg-gd-elegance" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-area-chart text-white-op"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{$sales}}" data-before="₦">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-white-op">Sales</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Earnings -->

            <!-- Orders -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-transparent bg-gd-dusk" href="">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-archive text-white-op"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{$orders_count}}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-white-op">Orders</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Orders -->

            <!-- New Customers -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-transparent bg-gd-sea" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-users text-white-op"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{$customers_count}}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-white-op">Customers</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END New Customers -->


        </div>
        <!-- END Statistics -->

        <!-- Orders Overview -->
        <div class="content-heading">
            Orders <small class="d-none d-sm-inline">Overview</small>
        </div>

            <!-- END Orders Volume Chart -->

        <!-- END Orders Overview -->

        <!-- Latest Orders and Top Products -->
        <div class="row gutters-tiny">
            <!-- Latest Orders -->
            <div class="col-xl-6">
                <h2 class="content-heading">Latest Orders</h2>
                <div class="block block-rounded">
                    <div class="block-content">
                        <table class="table table-borderless table-striped">
                            <thead>
                            <tr>
                                <th style="width: 100px;">ID</th>
                                <th>Status</th>
                                <th class="d-none d-sm-table-cell">Customer</th>
                                <th class="text-right">Value</th>
                            </tr>
                            </thead>
                            <tbody>
@foreach($orders as $order)
                            <tr>
                                <td>
                                    <a class="font-w600" href="">{{$order->order_no}}</a>
                                </td>
                                @if($order->delivered == 0 && $order->processing == 0)
                                    <td>
                                        <span class="badge badge-warning">pending</span>
                                    </td>
                                @endif
                                @if($order->delivered == 0 && $order->processing == 1)
                                    <td>
                                        <span class="badge badge-info">processing</span>
                                    </td>
                                @endif @if($order->delivered == 1 && $order->processing == 1)
                                    <td>
                                        <span class="badge badge-success">completed</span>
                                    </td>
                                @endif
                                @if($order->user_id == NULL)
                                    <td class="d-none d-sm-table-cell">
                                        <a href="">{{$order->guest->fname}} &nbsp; {{$order->guest->lname}} </a>
                                    </td>
                                @else
                                    <td class="d-none d-sm-table-cell">
                                        <a href="">{{$order->user->name}} </a>
                                    </td>

                                    @endif
                                <td class="text-right">
                                    <span class="text-black">{{ '₦'.number_format($order->total,2)}}</span>
                                </td>
                            </tr>
    @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Latest Orders -->

            <!-- Top Products -->
            <div class="col-xl-6">
                <h2 class="content-heading">Top Products</h2>
                <div class="block block-rounded">
                    <div class="block-content">
                        <table class="table table-borderless table-striped">
                            <thead>
                            <tr>
                                <th class="d-none d-sm-table-cell" style="width: 100px;">ID</th>
                                <th>Product</th>
                                <th class="text-center">Orders</th>
                                <th class="d-none d-sm-table-cell text-center">Rating</th>
                            </tr>
                            </thead>
                            <tbody>
@foreach($products as $product)
                            <tr>
                                <td class="d-none d-sm-table-cell">
                                    <a class="font-w600" href="">{{$product->no}}</a>
                                </td>
                                <td>
                                    <a href="">{{$product->name}}</a>
                                </td>
                                <td class="text-center">
                                    <a class="text-gray-dark" href="">{{$product->productOrders()->count()}}</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
@endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Top Products -->
        </div>
        <!-- END Latest Orders and Top Products -->
    </div>


    @endsection
