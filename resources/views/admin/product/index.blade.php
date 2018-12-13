@extends('admin.layouts.app')


@section('content')


    <div class="bg-image" style="background-image: url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }})">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Products</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">You currently have {{$count}} in the catalog!</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Breadcrumb -->
    <div class="bg-body-light border-b">
        <div class="content py-5 text-center">
            <nav class="breadcrumb bg-body-light mb-0">
                <a class="breadcrumb-item" href="#">Dashboard</a>
                <span class="breadcrumb-item active">Products</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <!-- Overview -->
        @include('admin.layouts.success')

        @include('admin.layouts.error')
        <h2 class="content-heading">Overview</h2>
        <div class="row gutters-tiny">
            <!-- All Products -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-circle-o fa-2x text-info-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-info" data-toggle="countTo" data-to="{{$count_all}}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">All Products</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END All Products -->


            <!-- Out of Stock -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-warning fa-2x text-danger-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-danger" data-toggle="countTo" data-to="{{$out_of_stock}}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Out of Stock</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Out of Stock -->

            <!-- Add Product -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="{{url('/admin/product/create')}}">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-archive fa-2x text-success-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-success">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">New Product</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Add Product -->
        </div>
        <!-- END Overview -->

        <!-- Products -->


        <div class="content-heading">
            Products
        </div>

    </div>


        <div class="block-content">
            <!-- Products Table -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                <tr>
                    <th>ID</th>
                    <th class="d-none d-sm-table-cell">Stock</th>
                    <th class="d-none d-sm-table-cell">Status</th>
                    <th class="d-none d-sm-table-cell">Submitted</th>
                    <th>Product</th>
                    <th>Value</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    @foreach($products as $product)
                        <td>
                            <a class="font-w600" href="">{{$product->no}}</a>
                        </td>
                        <td>
                            @if($product->stock == 0)
                                <span class="badge badge-danger">Out of Stock</span>
                            @else
                                <span class="badge badge-success">In Stock</span>
                            @endif
                        </td>
                        <td>
                            @if($product->status == 0)
                                <span class="badge badge-danger">Not Published</span>
                            @else
                                <span class="badge badge-success">Published</span>
                            @endif
                        </td>
                        <td>
                            <a class="font-w600" href="#">   {{$product->created_at->toFormattedDateString()}}       </a>
                        </td>
                        <td>
                            <a class="font-w600" href="#">
                      {{$product->name}}
                            </a>
                        </td>

                        <td>
                            <a class="font-w600" href="#">

                                {{ '₦'.number_format($product->price,2)}}
                            </a>

                        </td>
                        <td>


                            <a href="{{route('product.edit',$product->name)}}"  >   <i class="fa fa-pencil"></i>   </a>


                            &nbsp;

                            <a data-toggle="modal" data-target="#TrashModal{{$product->name}}" >   <i class="fa fa-trash"></i>   </a>



                        </td>

                </tr>

                @include('admin.product.delete')

                @endforeach

                </tbody>
            </table>

          <!-- END Products Table -->

            <!-- Navigation -->

            <!-- END Navigation -->
        </div>

    <!-- END Products -->





@endsection
