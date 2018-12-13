@extends('admin.layouts.app')

@section('content')

    <div class="bg-image" style="background-image: url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }}) ">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Posts</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">Create post here!</h2>
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
                     <span class="breadcrumb-item active">Create</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->
    <div class="content">
        @include('admin.layouts.success')

        @include('admin.layouts.error')
        <form action="{{url('admin/post')}}" enctype="multipart/form-data" method="post" >

            {{ csrf_field()}}

        <h2 class="content-heading">Create</h2>
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
                                    <input type="text" class="form-control" id="ecom-product-name" name="title" placeholder="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12">Description</label>
                                <div class="col-12">
                                    <!-- CKEditor (js-ckeditor id is initialized in Codebase() -> uiHelperCkeditor()) -->
                                    <!-- For more info and examples you can check out http://ckeditor.com -->
                                    <textarea class="form-control" id="js-ckeditor" name="description" placeholder="Description" rows="8"></textarea>
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
                                        <input type="checkbox" class="css-control-input" id="ecom-product-published" name="status"  >
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-12" for="example-select2">Tags</label>
                                <div class="col-12">
                                    <!-- Select2 (.js-select2 class is initialized in Codebase() -> uiHelperSelect2()) -->
                                    <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                                    <select class="js-select2 form-control" id="example-select2" name="tags[]" style="width: 100%;" data-placeholder="Choose the best ones!" multiple>

                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-12" for="example-select2">Category</label>
                                <div class="col-12">
                                    <!-- Select2 (.js-select2 class is initialized in Codebase() -> uiHelperSelect2()) -->
                                    <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                                    <select class="js-select2 form-control" id="" name="category" style="width: 100%;" data-placeholder="Choose the best ones!" >

                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                        </div>
                    </div>
                    </div>

                <div class="block block-rounded block-themed">
                    <div class="block-header bg-gd-primary">
                        <h3 class="block-title">Images</h3>
                    </div>
                    <div class="block-content block-content-full">


                        <div class="form-group row" style="margin-left: 10%">

                            <img id="holder" style="margin-top:15px;max-height:100px;">

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="thumbnail" name="image" placeholder="Choose post image here">
                                    <div class="input-group-append">
                                        <button type="button" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-secondary">Choose file</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>




                    </div>
                   </div>

                  </div>
        </form>
              </div>

                <!-- END Status -->

                <!-- END Images -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
    </script>
    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
    <script>
        $('#lfm').filemanager('file', {prefix: route_prefix});

    </script>


    <script>
        $(document).ready(function(){

            // Define function to open filemanager window
            var lfm = function(options, cb) {
                var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                window.SetUrl = cb;
            };


        });

    </script>




    @endsection


