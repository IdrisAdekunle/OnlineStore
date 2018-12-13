@extends('frontend.layouts.app')


@section('content')

    <div class="container">

        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>My addresses</li>
            </ul>

        </div>

        <div class="col-md-3">
            <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->


            @include('frontend.layouts.side')

        </div>
        <!-- /.col-md-3 -->

        <!-- *** CUSTOMER MENU END *** -->


        <div class="col-md-9" id="customer-orders">
            <div class="box">
                <h1>My addresses</h1>

                <p class="lead">All addresses in one place.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="{{url('/contact')}}">contact us</a>, our customer service center is working for you 24/7.</p>

                <hr>

                <div class="content">
                   @foreach($address->chunk(2) as $items)
                    <div class="row">
                   @foreach($items as $address)
                        <div class="col-sm-6">
                            <div class="box shipping-method">
                                @if($address->default == 1)
                                <div class="box-header text-center">
                                    <a href="" ><i class="fa fa-angle-double-down"></i>Shipping/Billing address </a>
                                </div>
                                @else


                                    @endif

                                <h4>{{$address->fname}} &nbsp; {{$address->lname}}  </h4>

                                <p> {{str_limit($address->street,20)}} </p>

                                <div class="box-footer text-center">

                                 <a href="{{route('address.edit',$address->id)}}" ><i class="fa fa-pencil"></i> </a>
                                </div>
                            </div>


                        </div>
                  @endforeach
                    </div>

                    @endforeach

            <button class="fa fa-plus"><a href="{{route('address.create')}}">Add new address </a> </button>

                </div>
            </div>
        </div>

    </div>






@endsection
