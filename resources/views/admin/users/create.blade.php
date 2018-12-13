@extends('admin.layouts.app')


@section('content')


    <div class="bg-image" style="background-image:  url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }}) ">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Admin User</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">New Admin user!</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumb -->
    <div class="bg-body-light border-b">
        <div class="content py-5 text-center">
            <nav class="breadcrumb bg-body-light mb-0">
                <a class="breadcrumb-item" href="">Admin</a>
                <span class="breadcrumb-item active">Create</span>
                <span class="breadcrumb-item active">User</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->


    <div class="content">
        <!-- Bootstrap Design -->
        @include('admin.layouts.success')

        @include('admin.layouts.error')

        <div class="col-md-12">
            <!-- Material (floating) Register -->
            <div class="block block-themed">
                <div class="block-header bg-gd-lake">
                    <h3 class="block-title">Admin</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="{{route('admin.store')}}" method="post" >

                        {{csrf_field()}}

                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material floating">
                                    <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="register3-username" name="name" value="{{ old('name') }}" required autofocus>
                                    <label for="register3-username">Username</label>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material floating">
                                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="register3-email" name="email" value="{{ old('email') }}" required>
                                    <label for="register3-email">Email</label>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material floating">
                                    <input type="password" class="form-control" id="register3-password" name="password" required>
                                    <label for="register3-password">Password</label>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material floating">
                                    <input type="password" class="form-control" id="register3-password2" name="password_confirmation" required>
                                    <label for="register3-password2">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                    <br/>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-success">
                                    <i class="fa fa-plus mr-5"></i> Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Material (floating) Register -->
        </div>


            </div>




@endsection
