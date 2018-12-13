<div class="panel panel-default sidebar-menu">

    <div class="panel-heading">
        <h3 class="panel-title">Customer section</h3>
    </div>

    <div class="panel-body">

        <ul class="nav nav-pills nav-stacked">
            <li class="">
                <a href="{{url('/customer/orders')}}"><i class="fa fa-list"></i> My orders</a>
            </li>
            <li>
                <a href="{{url('/customer/wishlist')}}"><i class="fa fa-heart"></i> My wishlist</a>
            </li>
            <li>
                <a href="{{url('/customer/account')}}"><i class="fa fa-user"></i> My account</a>
            </li>
            <li>
                <a href="{{route('address.index')}}"><i class="fa fa-angle-double-down"></i> My addresses</a>
            </li>
            <li class="">
                <a class="" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" data-hover="dropdown">
                    <i class="fa fa-sign-out"></i>{{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </li>

        </ul>
    </div>

</div>
