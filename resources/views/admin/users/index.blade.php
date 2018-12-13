@extends('admin.layouts.app')

@section('content')


    <div class="bg-image" style="background-image: url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }}) ">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Users </h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">All Admins here!</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Breadcrumb -->
    <div class="bg-body-light border-b">
        <div class="content py-5 text-center">
            <nav class="breadcrumb bg-body-light mb-0">
                <a class="breadcrumb-item" href="">Admin users</a>
                <span class="breadcrumb-item active">All</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->

    <div class="content">
    @include('admin.layouts.success')

    @include('admin.layouts.error')

        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Admins</h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell">Email</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Date</th>
                        <th class="text-center" style="width: 15%;">Reset Password</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin)

                        <tr>
                            <td class="text-center">{{$i++}}</td>
                            <td class="font-w600">{{$admin->name}}</td>
                            <td class="d-none d-sm-table-cell">{{$admin->email}}</td>
                            <td class="d-none d-sm-table-cell">
                                {{$admin->created_at->toFormattedDateString()}}
                            </td>
                            <td class="text-center">
                                <a href="{{route('admin.reset.index',$admin->id)}}" >   <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Reset Password">
                                        <i class="fa fa-unlock"></i>
                                    </button> </a>
                            </td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>





@endsection


