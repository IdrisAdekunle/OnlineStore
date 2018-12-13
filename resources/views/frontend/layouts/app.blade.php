<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.header')


<body>

@include('frontend.layouts.top')

@include('frontend.layouts.navbar')

<div id="all">

    <div id="content">

        @yield('content')

    </div>
@include('frontend.layouts.footer')

</div>

<script src="{{asset('frontend/js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.cookie.js')}}"></script>
<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/js/modernizr.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap-hover-dropdown.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/front.js')}}"></script>
<script src="{{asset('frontend/js/lga.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>



</body>
</html>
