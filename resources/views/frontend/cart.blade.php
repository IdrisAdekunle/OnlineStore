@extends('frontend.layouts.app')



@section('content')

    <div class="container">

        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>Shopping cart</li>
            </ul>
        </div>

        <div class="col-md-9" id="basket">
@if($cartItems->count())
            <div class="box">



                    <h1>Shopping cart</h1>
                    <p class="text-muted">You currently have {{Cart::count()}} item(s) in your cart.</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2">Product</th>
                                <th>Quantity</th>
                                <th>Unit price</th>
                                <th>size</th>
                                <th>color</th>
                                <th colspan="2">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <a href="#">
                                        <img src="{{$item->model->picture}}" alt="">
                                    </a>
                                </td>
                                <td><a href="#">{{$item->name}}</a>
                                </td>
                                <td>
                                    <form id="update-qty-{{$item->rowId}}"
                                          action="{{ route('update_cart', $item->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="number" value="{{$item->qty}}" name="qty" class="form-control">
                                    </form>
                                </td>
                                <td>₦{{$item->price}}</td>
                                <td>{{$item->options->size}}</td>
                                <td>{{$item->options->color}}</td>
                                <td>₦{{$item->total}}</td>
                                <td><a href="#" onclick="event.preventDefault();
                     document.getElementById('update-qty-{{$item->rowId}}')
                             .submit();" ><i class="fa fa-refresh"></i></a>

                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="6">Total</th>
                                <th colspan="2">₦{{Cart::total()}}</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.table-responsive -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{url('/shop')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                        </div>
                        <div class="pull-right">
                            <a href="{{route('destroy_cart')}}" class="btn btn-default"><i class="fa fa-trash-o"></i> Clear cart items</a>
                            @guest
                            <a href="{{route('checkout_address_guest')}}" class="btn btn-primary"><i class="fa fa-chevron-right"></i> Check out as guest</a>
                            <a href="{{route('checkout_address_user')}}" class="btn btn-primary"><i class="fa fa-chevron-right"></i> Check out as user</a>
                                @else

                                <a href="{{route('checkout_address_user')}}" class="btn btn-primary"><i class="fa fa-chevron-right"></i> Proceed to checkout</a>
                            @endguest
                        </div>
                    </div>



            </div>
            <!-- /.box -->
            @else


                <div class="box">


                        <h1>Shopping cart</h1>
                        <p class="text-muted">You currently have {{Cart::count()}} item(s) in your cart.</p>


                </div>

    @endif

    @if(Cart::content()->count())
           @include('frontend.layouts.interests')

    @endif
        </div>


@if(Cart::content()->count())

       @include('frontend.layouts.order_side')
@endif

    </div>




@endsection
