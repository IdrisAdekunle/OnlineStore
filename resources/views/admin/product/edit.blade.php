@extends('admin.layouts.app')

@section('content')

    <div class="bg-image" style="background-image: url({{ URL::asset('/backend/img/photos/photo26@2x.jpg') }}) ">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Product</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">Edit product here!</h2>
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
                <span class="breadcrumb-item active">Edit</span>

            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->
    <div class="content">
        <form action="{{route('product.update',$product->name)}}"  method="post" >

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
                                <label class="col-12" for="ecom-product-name">Name</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="ecom-product-name" name="name" placeholder="Product name" value="{{$product->name}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12">Description</label>
                                <div class="col-12">

                                    <textarea class="form-control" id="js-ckeditor" name="description" placeholder="Description" rows="8">{{$product->description}} </textarea>
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
                                        <input type="text" class="form-control" id="ecom-product-price" name="price" placeholder="Price in Naira.." value="{{$product->price}}" >
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
                                        <input type="checkbox" class="css-control-input"  name="status" {{$product->status == 1 ? 'checked' : '' }}  >
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12">In Stock</label>
                                <div class="col-12">
                                    <label class="css-control css-control-success css-switch">
                                        <input type="checkbox" class="css-control-input"  name="stock" {{$product->stock == 1 ? 'checked' : '' }}  >
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12" for="ecom-product-meta-tags">Available Sizes</label>
                                <div class="col-12">
                                    <input type="text" class="js-tags-input form-control" data-height="34px" id="ecom-product-meta-tags" name="sizes" placeholder="sizes" value="{{implode(',',$product->sizes)}}">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12" for="ecom-product-meta-tags">Available Colors</label>
                                <div class="col-12">

                                    <input type="text" class="js-tags-input form-control" data-height="34px" id="ecom-product-meta-tags" name="colors" placeholder="colors" value="{{implode(',',$product->colors)}}">

                                </div>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </form>
    </div>




@endsection


