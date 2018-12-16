@extends('layouts.app')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rooms</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <img src="{{ asset('imgs/rooms3.jpg') }}" class="img-fluid" alt="Responsive image">

    <hr>

    <h1 class="text-center display-1">Hotel Rooms</h1>
    <blockquote class="blockquote text-center">
        <p class="mb-0">Explore our rooms' types, price per night and more information</p>
        @auth
            <footer class="blockquote-footer">Book as soon as possible in <cite title="Source Title">Marriott hotel</cite></footer>
        @else
            <footer class="blockquote-footer">Login and Book as soon as possible in <cite title="Source Title">Marriott hotel</cite></footer>
        @endauth
    </blockquote>

    <div class="accordion" id="accordionExample">
        @foreach($allRooms as $room)
            <div class="card">
                <div class="card-header" id="heading{{ $room->id }}">
                    <h5 class="mb-0">
                        @if($loop->iteration == 1)
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $room->id }}" aria-expanded="true" aria-controls="collapse{{ $room->id }}">
                                {{ $room->name }}
                            </button>
                        @else
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $room->id }}" aria-expanded="false" aria-controls="collapse{{ $room->id }}">
                                {{ $room->name }}
                            </button>
                        @endif
                    </h5>
                </div>

                @if($loop->iteration == 1)
                    <div id="collapse{{ $room->id }}" class="collapse show" aria-labelledby="heading{{ $room->id }}" data-parent="#accordionExample">
                        <div class="card-body">
                            {{ $room->description }}
                @else
                    <div id="collapse{{ $room->id }}" class="collapse" aria-labelledby="heading{{ $room->id }}" data-parent="#accordionExample">
                        <div class="card-body">
                            {{ $room->description }}
                @endif
                            <p class="lead">Room Size: {{ $room->size }} Sq. M</p>
                            <p class="lead">Number of Guests: {{ $room->noOfGuests }}</p>
                            <p class="lead">Number of Beds: {{ $room->noOfBeds }}</p>
                            <div clas="d-inline"></div>
                            <span class="badge badge-pill badge-success d-inline">Price &nbsp;
                                <i class="fa fa-dollar"></i>
                            </span>
                            <p class="lead d-inline"> &nbsp; {{ $room->price }}$ per night</p>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>

    <br>
    @auth
        @if(Auth::user()->blocked == false)
            <p class="lead"><a class="btn btn-primary" href="{{ url('/book') }}" role="button" style="margin-left: 2%;">Book Now &raquo;</a></p>
        @else
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" style="margin-left: 2%;" title="You seem to be blocked by the admin. Contact Us as soon as possible!">
                <button class="btn btn-danger" style="pointer-events: none;" type="button" disabled>Book Now &raquo;</button>
            </span>
        @endif
    @endauth

    <!-- Footer -->
    <hr>
    <footer class="container">
        <p>&copy; Mariott Hotel 2018-2019</p>
    </footer>

</body>
</html>
