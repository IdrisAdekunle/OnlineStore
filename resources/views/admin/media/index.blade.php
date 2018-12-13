@extends('admin.layouts.app')



@section('content')
    <div class="bg-image" style="background-image: url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }}) ">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Media</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">Manage files here!</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Breadcrumb -->
    <div class="bg-body-light border-b">
        <div class="content py-5 text-center">
            <nav class="breadcrumb bg-body-light mb-0">
                <a class="breadcrumb-item" href="">Media</a>
                <span class="breadcrumb-item active">FileManager</span>

            </nav>
        </div>
    </div>


    <div class="content">


<iframe src="{{url('/filemanager')}}" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>


</div>







    @endsection
