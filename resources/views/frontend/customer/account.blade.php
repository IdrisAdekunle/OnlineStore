@extends('frontend.layouts.app')


@section('content')

    <div class="container">

        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>My account</li>
            </ul>

        </div>

        <div class="col-md-3">
            <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
          @include('frontend.layouts.side')
            <!-- /.col-md-3 -->

            <!-- *** CUSTOMER MENU END *** -->
        </div>

        <div class="col-md-9">
            <div class="box">
                <h1>My account</h1>
                <p class="lead">Change your your password here.</p>
                <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                <h3>Change password</h3>
                @if ($errors->any())

                    <ul class="alert-danger">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{$error}}
                            </li>
                        @endforeach

                    </ul>

                @endif

                <form action="{{route('change',auth::user()->id)}}" method="post">

                    {{ method_field('PUT') }}

                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password_old">Old password</label>
                                <input type="password" class="form-control" name="old_password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password_1">New password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password_2">Retype new password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                    </div>
                </form>

                <hr>


            </div>
        </div>

    </div>




    @endsection
