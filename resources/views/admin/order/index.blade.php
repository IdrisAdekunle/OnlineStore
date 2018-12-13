@extends('admin.layouts.app')



@section('content')



    <div class="bg-image" style="background-image: url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }})">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Orders</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">You are doing great, keep it up!</h2>
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
                <span class="breadcrumb-item active">Orders</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <!-- Statistics -->
        <!-- CountTo ([data-toggle="countTo"] is initialized in Codebase() -> uiHelperCoreAppearCountTo()) -->
        <!-- For more info and examples you can check out https://github.com/mhuggins/jquery-countTo -->
        @include('admin.layouts.success')

        @include('admin.layouts.error')
        <div class="content-heading">
            Statistics <small class="d-none d-sm-inline">Looking good!</small>
        </div>
        <div class="row gutters-tiny">
            <!-- Pending -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-transparent bg-gd-sun" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-spinner fa-spin text-white-op"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{$pending_orders}}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-white-op">Pending</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Pending -->



            <!-- Completed -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-transparent bg-gd-lake" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-check text-white-op"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{$completed_orders}}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-white-op">Completed</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Completed -->

            <!-- All -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-transparent bg-gd-dusk" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-archive text-white-op"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{$orders->count()}}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-white-op">All</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END All -->
        </div>
        <!-- END Statistics -->

        <!-- Orders -->
        <div class="content-heading">
            Orders ({{$orders->count()}})
        </div>

            <div class="block-content block-content-full">
                <!-- Orders Table -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th style="width: 100px;">ID</th>
                        <th>Status</th>
                        <th class="d-none d-sm-table-cell">Submitted</th>
                        <th class="d-none d-sm-table-cell">Products</th>
                        <th class="d-none d-sm-table-cell">Customer</th>
                        <th class="text-right">Value</th>
                    </tr>
                    </thead>
                    <tbody>
          @foreach($orders as $order)
                    <tr>
                        <td>
                            <a class="font-w600" href="{{route('order.show',$order->order_no)}}">{{$order->order_no}}</a>
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
                        <td class="d-none d-sm-table-cell">
                            {{$order->created_at->toFormattedDateString()}} </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">{{$order->OrderItems->count()}}</a>
                        </td>
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
                <!-- END Orders Table -->

                <!-- Navigation -->

                <!-- END Navigation -->
            </div>
        </div>
        <!-- END Orders -->



    @endsection
