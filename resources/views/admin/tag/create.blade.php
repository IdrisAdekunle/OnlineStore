@extends('admin.layouts.app')


@section('content')


    <div class="bg-image" style="background-image:  url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }}) ">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Tags</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">New Tag!</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumb -->
    <div class="bg-body-light border-b">
        <div class="content py-5 text-center">
            <nav class="breadcrumb bg-body-light mb-0">
                <a class="breadcrumb-item" href="">Blog</a>
                <span class="breadcrumb-item active">Tag</span>
                <span class="breadcrumb-item active">Create</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->


    <div class="content">
        <!-- Bootstrap Design -->
        <h2 class="content-heading">Create tag</h2>
        <div class="row">

            @include('admin.layouts.success')

            @include('admin.layouts.error')

            <div class="col-xl-12">
                <!-- Icon/Text Groups -->
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Tag</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{url('admin/tag')}}" method="POST" >

                            {{ csrf_field()}}

                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                        </div>
                                        <input type="text" class="form-control" id="example-input1-group1" name="name" placeholder="Name" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-alt-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



            </div>





        </div>
    </div>
@endsection
