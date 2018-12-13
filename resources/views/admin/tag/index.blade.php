@extends('admin.layouts.app')


@section('content')


    <div class="bg-image" style="background-image: url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }}) ">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Tags</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">All tags here!</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Breadcrumb -->
    <div class="bg-body-light border-b">
        <div class="content py-5 text-center">
            <nav class="breadcrumb bg-body-light mb-0">
                <a class="breadcrumb-item" href="">Blog</a>
                <span class="breadcrumb-item active">Tags</span>
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
                            <div class="font-size-h2 font-w700 mb-0 text-info" data-toggle="countTo" data-to="{{$count_tags}}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">All Tags</div>
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
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Top tags</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Top Sellers -->


            <!-- END Out of Stock -->

            <!-- Add Product -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="{{url('/admin/tag/create')}}">
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
                            <div class="font-size-sm font-w600 text-uppercase text-muted">New tag</div>
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

            Tags
        </div>
        <div class="block block-rounded">
            <div class="block-content bg-body-light">
                <!-- Search -->
                <form action="" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Tags..">
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
                        <th class="d-none d-md-table-cell">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($tags as $tag)
                            <td>
                                <a class="font-w600" href="">{{$tag->name}}</a>
                            </td>

                            <td>


                                <a href="{{route('tag.edit',$tag->name)}}"  >   <i class="fa fa-pencil"></i>   </a>


                                &nbsp;

                                <a data-toggle="modal" data-target="#TagModal{{$tag->name}}" >   <i class="fa fa-trash"></i>   </a>

                            </td>

                    </tr>

                    @include('admin.tag.delete')

                    @endforeach
                    </tbody>
                </table>
                <!-- END Products Table -->
            {{ $tags->links() }}

            <!-- END Navigation -->
            </div>
        </div>
        <!-- END Products -->
    </div>






@endsection
