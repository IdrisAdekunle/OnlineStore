@extends('admin.layouts.app')


@section('content')


    <div class="bg-image" style="background-image: url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }}) ">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Categories</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">All store categories here!</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Breadcrumb -->
    <div class="bg-body-light border-b">
        <div class="content py-5 text-center">
            <nav class="breadcrumb bg-body-light mb-0">
                <a class="breadcrumb-item" href="">e-Commerce</a>
                <span class="breadcrumb-item active">Categories</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <!-- Overview -->
        <h2 class="content-heading">Overview</h2>
        <div class="row gutters-tiny">
        @include('admin.layouts.success')

        @include('admin.layouts.error')
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
                            <div class="font-size-h2 font-w700 mb-0 text-info" data-toggle="countTo" data-to="{{$count_categories}}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">All Categories</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END All Products -->

            <!-- Top Sellers -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-star fa-2x text-warning-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-warning" data-toggle="countTo" data-to="95">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Top Categories</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Top Sellers -->


            <!-- END Out of Stock -->

            <!-- Add Product -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="{{url('/admin/blogcategory/create')}}">
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
                            <div class="font-size-sm font-w600 text-uppercase text-muted">New category</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Add Product -->
        </div>
        <!-- END Overview -->

        <!-- Products -->
        <div class="content-heading">
            <div class="dropdown float-right">

            </div>

            Categories
        </div>
        <div class="block block-rounded">
            <div class="block-content bg-body-light">
                <!-- Search -->
                <form action="" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Categories..">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END Search -->
            </div>
            <div class="block-content">
                <!-- Products Table -->
                <table class="table table-borderless table-striped">
                    <thead>
                    <tr>

                        <th class="d-none d-sm-table-cell">Name</th>
                        <th class="d-none d-sm-table-cell">Status</th>
                        <th class="d-none d-md-table-cell">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($categories as $category)
                        <td>
                            <a class="font-w600" href="">{{$category->name}}</a>
                        </td>

                        <td class="d-none d-sm-table-cell">
                            @if($category->status == 0)
                            <span class="badge badge-danger">Not published</span>
                            @else
                                <span class="badge badge-success">Published</span>
                            @endif
                        </td>

                        <td>


                            <a data-toggle="modal" data-target="#PublishModal{{$category->name}}" >   <i class="fa fa-check"></i>   </a>

                            &nbsp;

                            <a href="{{route('blogcategory.edit',$category->name)}}"  >   <i class="fa fa-pencil"></i>   </a>


                            &nbsp;

                            <a data-toggle="modal" data-target="#TrashModal{{$category->name}}" >   <i class="fa fa-trash"></i>   </a>

                        </td>

                    </tr>

                    @include('admin.category.trash')
                    @include('admin.category.publish')
@endforeach
                    </tbody>
                </table>
                <!-- END Products Table -->
         {{ $categories->links() }}

                <!-- END Navigation -->
            </div>
        </div>
        <!-- END Products -->
    </div>






@endsection
