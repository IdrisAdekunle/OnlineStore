@extends('admin.layouts.app')

@section('content')

    <div class="bg-image" style="background-image: url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }}) ">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Posts</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">Edit post</h2>
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
                <span class="breadcrumb-item active">Post</span>
                <span class="breadcrumb-item active">Edit</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->
    <div class="content">
        @include('admin.layouts.success')

        @include('admin.layouts.error')
        <form action="{{route('post.update',$post->slug)}}"  method="post" >


            {{ method_field('PUT') }}

            {{ csrf_field()}}

            <h2 class="content-heading">Edit</h2>
            <div class="row gutters-tiny">
                <!-- Basic Info -->
                <div class="col-md-7">

                    <div class="block block-rounded block-themed">
                        <div class="block-header bg-gd-primary">
                            <h3 class="block-title">Basic Info</h3>
                            <div class="block-options">

                            </div>
                        </div>
                        <div class="block-content block-content-full">

                            <div class="form-group row">
                                <label class="col-12" for="ecom-product-name">Title</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="ecom-product-name" name="title" value="{{$post->title}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12">Description</label>
                                <div class="col-12">
                                    <!-- CKEditor (js-ckeditor id is initialized in Codebase() -> uiHelperCkeditor()) -->
                                    <!-- For more info and examples you can check out http://ckeditor.com -->
                                    <textarea class="form-control" id="js-ckeditor" name="description" placeholder="Description" rows="8">{{$post->description}}</textarea>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
                <!-- END Basic Info -->

                <!-- More Options -->
                <div class="col-md-5">
                    <!-- Status -->

                    <div class="block block-rounded block-themed">
                        <div class="block-header bg-gd-primary">
                            <h3 class="block-title">Status</h3>
                            <div class="block-options">
                                <button type="submit" class="btn btn-sm btn-alt-primary" onclick="form.submit()">
                                    <i class="fa fa-save mr-5"></i>Save
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">

                            <div class="form-group row">
                                <label class="col-12">Published</label>
                                <div class="col-12">
                                    <label class="css-control css-control-success css-switch">
                                        <input type="checkbox" class="css-control-input" id="ecom-product-published" name="status" {{$post->status == 1 ? 'checked' : '' }} >
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-12" for="example-select2">Tags</label>
                                <div class="col-12">

                                    {!! Form::select('tags[]', $tags, $post->tags, [ 'class' => 'js-select2 form-control','id' => 'example-select2', 'multiple' => 'multiple' ]) !!}

                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-12" for="example-select2">Category</label>
                                <div class="col-12">


                                    {!! Form::select('category_id', $categories, $post->category_id, [ 'class' => 'js-select2 form-control','id' => 'example-select2']) !!}


                                </div>
                            </div>
                        </div>
                    </div>






                    </div>
                </div>
        </form>
            </div>



@endsection
