@include('f_layout.f_header')
@section("css")

@show

@section('nav')
    This is the master nav.

    <hr>
@show
@section('banner')
    This is the master banner.

@show

<div class="container">
    @yield('content')
</div>
</body>

@include('f_layout.f_footer')
@section("js")

@show