@extends('admin.layouts.app')

@section('content')

    <div class="bg-image" style="background-image: url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }}) ">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Product</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">Create a product here!</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Breadcrumb -->
    <div class="bg-body-light border-b">
        <div class="content py-5 text-center">
            <nav class="breadcrumb bg-body-light mb-0">
                <a class="breadcrumb-item" href="">Product</a>
                <span class="breadcrumb-item active">Create</span>

            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->
    <div class="content">
        @include('admin.layouts.success')

        @include('admin.layouts.error')
        <form action="{{url('admin/product')}}" enctype="multipart/form-data" method="post" >

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
                                <label class="col-12" for="ecom-product-name">Name</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="ecom-product-name" name="name" placeholder="Product name">
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

                            <div class="form-group row">
                                <label class="col-12" for="ecom-product-price">Price</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            ₦
                                                        </span>
                                        </div>
                                        <input type="text" class="form-control" id="ecom-product-price" name="price" placeholder="Price in Naira.." >
                                    </div>
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
                                <label class="col-12">In Stock</label>
                                <div class="col-12">
                                    <label class="css-control css-control-success css-switch">
                                        <input type="checkbox" class="css-control-input" id="ecom-product-published" name="stock"  >
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12" for="ecom-product-meta-tags">Available Sizes</label>
                                <div class="col-12">
                                    <input type="text" class="js-tags-input form-control" data-height="34px" id="ecom-product-meta-tags" name="sizes" placeholder="sizes">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12" for="ecom-product-meta-tags">Available Colors</label>
                                <div class="col-12">

                                    <input type="text" class="js-tags-input form-control" data-height="34px" id="ecom-product-meta-tags" name="colors" placeholder="colors">

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
                                        &nbsp;
                                        <img id="holder1" style="margin-top:15px;max-height:100px;">
                                        &nbsp;
                                        <img id="holder2" style="margin-top:15px;max-height:100px;">
                                        &nbsp;


                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="thumbnail" name="picture" placeholder="Choose product image here">
                                                <div class="input-group-append">
                                                    <button type="button" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-secondary">Choose file</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="form-group row" id="fields" style="">
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="thumbnail1" name="picture1" placeholder="Choose product image here">
                                                <div class="input-group-append">
                                                    <button type="button" id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-secondary">Choose file</button>
                                                </div>
                                            </div>
                                        </div>
                                        <br/><br/><br/>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="thumbnail2" name="picture2" placeholder="Choose product image here">
                                                <div class="input-group-append">
                                                    <button type="button" id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-secondary">Choose file</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                            </div>


                        </div>
                </div>      </div>
        </form>
    </div>


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
        $('#lfm1').filemanager('file', {prefix: route_prefix});
        $('#lfm2').filemanager('file', {prefix: route_prefix});

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


