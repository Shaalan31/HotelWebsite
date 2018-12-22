<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Marriott Hotel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blocks.css') }}" rel="stylesheet">

</head>
<body style="padding-top: 5%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                @if (Route::has('login'))
                    <nav class="navbar navbar-expand-lg  navbar-expand-md navbar-light fixed-top bg-light navig-bar">
                        <a class="navbar-brand" href="{{ url('/') }}">Marriott Hotel</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/rooms') }}">Rooms</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link " href="{{ url('/aboutus') }}">About Us</a>
                                </li>
                                @auth
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('/accommodations') }}">Accommodations' Status</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('/book') }}">Book Now</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('/reviews') }}">Reviews</a>
                                    </li>
                            </ul>
                            <div class="nav navbar-nav navbar-right">
                                <li class="nav-item dropdown">
                                    <a href="#" style="color: rgba(0,0,0,.9);" id="dropdown01" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdown01" style="text-align: center;">
                                        <a href="{{ route('logout') }}" style="color: rgba(0,0,0,.9);"
                                           class="dropdown-item"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </div>
                            @else
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/reviews') }}">Reviews</a>
                                </li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="nav-item active">
                                        <a class="nav-link" style="color: rgba(0,0,0,.9);" href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" style="color: rgba(0,0,0,.9);" href="{{ route('register') }}">Register</a>
                                    </li>
                                </ul>
                            @endauth
                        </div>
                    </nav>
                @endif
                </div>
            </div>
        </div>


        {{--<div id="app">--}}
        {{--<nav class="navbar navbar-default navbar-static-top">--}}
        {{--<div class="container">--}}
        {{--<div class="navbar-header">--}}

        {{--<!-- Collapsed Hamburger -->--}}
        {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">--}}
        {{--<span class="sr-only">Toggle Navigation</span>--}}
        {{--<span class="icon-bar"></span>--}}
        {{--<span class="icon-bar"></span>--}}
        {{--<span class="icon-bar"></span>--}}
        {{--</button>--}}

        {{--<!-- Branding Image -->--}}
        {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
        {{--{{ config('app.name', 'Marriott Hotel') }}--}}
        {{--</a>--}}
        {{--</div>--}}

        {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
        {{--<!-- Left Side Of Navbar -->--}}
        {{--<ul class="nav navbar-nav">--}}
        {{--&nbsp;--}}
        {{--</ul>--}}

        {{--<!-- Right Side Of Navbar -->--}}
        {{--<ul class="nav navbar-nav navbar-right">--}}
        {{--<!-- Authentication Links -->--}}
        {{--@guest--}}
        {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
        {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
        {{--@else--}}
        {{--<li class="dropdown">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>--}}
        {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
        {{--</a>--}}

        {{--<ul class="dropdown-menu">--}}
        {{--<li>--}}
        {{--<a href="{{ route('logout') }}"--}}
        {{--onclick="event.preventDefault();--}}
        {{--document.getElementById('logout-form').submit();">--}}
        {{--Logout--}}
        {{--</a>--}}

        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
        {{--{{ csrf_field() }}--}}
        {{--</form>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--@endguest--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</nav>--}}
        {{--</div>--}}

        @yield('content')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/script-fn.js') }}"></script>

</body>
</html>
