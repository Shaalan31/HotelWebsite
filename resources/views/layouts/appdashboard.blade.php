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
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

</head>
<body style="padding-top: 5%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                @if (Route::has('login'))
                    <nav class="navbar navbar-expand-lg  navbar-expand-md navbar-dark fixed-top bg-dark navig-bar">
                        <img class="rounded float-left" src="{{ asset('imgs/logo1.png') }}">&nbsp;
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
                                    <a class="nav-link" href="{{ url('/admin/bookings') }}">Bookings</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link " href="{{ url('/admin/customers') }}">Customers</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link " href="{{ url('/admin/rooms') }}">Rooms</a>
                                </li>
                            </ul>

                                @auth
                                <div class="nav navbar-nav navbar-right">
                                    <li class="nav-item dropdown">
                                        <a href="#" style="color: rgba(255,255,255,.9);" id="dropdown01" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu bg-dark" aria-labelledby="dropdown01" style="text-align: center; padding-right: 100%;">
                                            <a href="{{ route('logout') }}" style="color: rgba(255,255,255,.9);"
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
                            @endauth
                        </div>
                    </nav>
                @endif
                </div>
            </div>
        </div>
        @yield('content')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/script-fn.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>




</body>
</html>
