<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="{{url('/')}}" data-animate-hover="bounce">
                <img src="{{asset('frontend/img/urbnn.jpg')}}" alt="Obaju logo" class="hidden-xs">
                <img src="{{asset('frontend/img/urbnn-small.jpg')}}" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
            </a>
            <div class="navbar-buttons" style="margin-right: 10%">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>

                <a class="btn btn-default navbar-toggle" href="{{route('cart')}}">
                    <i class="fa fa-shopping-cart"></i><span class="hidden-sm"> {{Cart::count()}} </span>
                </a>
            </div>
        </div>


        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class=""><a href="{{url('/')}}"  data-hover="dropdown">Home</a>
                </li>
                <li class="">

                    <a href="{{url('/shop')}}" data-hover="dropdown" data-delay="200">Shop </a>

                </li>
                <li class="">

                    <a href="{{url('/customer/orders')}}" data-hover="dropdown" data-delay="200">Orders </a>

                </li>

                <li class="">
                    <a href="{{url('/blog')}}" data-hover="dropdown" data-delay="200">Blog </a>

                </li>
                <li class="">
                    <a href="{{url('/contact')}}" data-hover="dropdown" data-delay="200">Contact </a>

                </li>
                @guest
                <li class="">
                    <a href="{{route('login')}}"  data-hover="dropdown" data-delay="200">Login</a>
                </li>
                @else
                    <li class="">

                        <a href="{{url('/customer/account')}}"  data-hover="dropdown" data-delay="200"> {{ Auth::user()->name }}</a>

                    </li>

                    <li class="">
                            <a class="" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" data-hover="dropdown">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                    </li>
                @endguest
            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="{{route('cart')}}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm"> {{Cart::count()}} items in cart</span></a>
            </div>


        </div>

    </div>

</div>

