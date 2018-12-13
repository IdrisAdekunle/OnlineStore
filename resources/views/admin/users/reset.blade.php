@extends('admin.layouts.app')


@section('content')


    <div class="bg-image" style="background-image:  url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }}) ">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Admin User</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">Reset ( {{$admin->email}} ) password </h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumb -->
    <div class="bg-body-light border-b">
        <div class="content py-5 text-center">
            <nav class="breadcrumb bg-body-light mb-0">
                <a class="breadcrumb-item" href="">Users</a>
                <span class="breadcrumb-item active">{{$admin->name}}</span>
                <span class="breadcrumb-item active">Reset</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->


    <div class="content">


        <div class="col-md-12">
            <!-- Bootstrap Lock -->
            <div class="block block-themed">
                <div class="block-header bg-pulse">
                    <h3 class="block-title">{{$admin->name}}</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content block-content-full text-center bg-pulse-lighter">
                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('backend/img/avatars/avatar1.jpg')}}" alt="">
                </div>
                <div class="block-content">
                    <form action="{{route('admin.reset',$admin->id)}}" method="post" >

                        {{ method_field('PUT') }}

                        {{ csrf_field()}}

                        <div class="form-group row">
                            <label class="col-12" for="lock1-password">Password</label>
                            <div class="col-12">
                                <input type="password" class="form-control" id="lock1-password" name="password" placeholder="Enter your password..">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12" for="lock1-password">Confirm Password</label>
                            <div class="col-12">
                                <input type="password" class="form-control" id="lock1-password" name="password_confirmation" placeholder="Confirm your password..">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-danger">
                                    <i class="fa fa-unlock mr-5"></i> Unlock
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


    </div>






    @endsection
