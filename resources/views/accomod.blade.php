@extends('layouts.app')
        <!doctype html>
        <html lang="{{ app()->getLocale() }}">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>Accommodations - Marriott Hotel</title>
                <!-- Bootstrap core CSS -->
                <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

                <!-- Fonts -->
                <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
            </head>
            <body>

            <img src="{{ asset('imgs/accommodations.jpg') }}" class="img-fluid" alt="Hotel Rooms">

            <h1 class="text-center display-5">Your Accommodations</h1>
            <blockquote class="blockquote text-center">
                <p class="mb-0">Explore your accommodations' details</p>
                <footer class="blockquote-footer">Check Your Pending, Accepted and Rejected Accommodations <cite title="Source Title">Marriott hotel</cite></footer>
            </blockquote>

            <hr>
            <div class="container flex-center">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <div class="accordion" id="accordionExample">

                            <!-- Pending Bookings -->
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Pending Bookings
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                            @foreach($allBookings['pending'] as $booking)
                                                @if(sizeof($allBookings['pending']) % 3 == 0)
                                                    <div class="col-md-4">
                                                @elseif(sizeof($allBookings['pending']) % 2 == 0)
                                                    <div class="col-md-6">
                                                @else
                                                    <div class="col-md-12">
                                                @endif
                                                    <div class="card border-primary mb-3" style="max-width: 18rem;">
                                                        <div class="card-header">Booking {{ $loop->iteration }}</div>
                                                        <div class="card-body">
                                                            <h5 class="card-title"><i class="text-primary fas fa-map-marker-alt"></i> {{ $booking['destination'] }}</h5>
                                                            <p class="card-text lead"><i class="text-primary far fa-clock"></i> PENDING</p>
                                                            <p class="lead"><i class="text-primary far fa-file-alt"></i> {{ $booking['status_description'] }}</p>
                                                            <p class="lead">Start Date {{ $booking['start_date'] }}</p>
                                                            <p class="lead">End Date {{ $booking['end_date'] }}</p>
                                                            <p class="lead"><i class="text-primary fas fa-bed"></i> Rooms</p>
                                                            <ul class="list-group">
                                                                @foreach($booking['rooms'] as $room)
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        {{ $room['room'] }}
                                                                        <span class="badge badge-primary badge-pill">{{ $room['quantity'] }}</span>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Accepted Bookings -->
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Accepted Bookings
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                @foreach($allBookings['accepted'] as $booking)
                                                    @if(sizeof($allBookings['accepted']) % 3 == 0)
                                                        <div class="col-md-4">
                                                    @elseif(sizeof($allBookings['accepted']) % 2 == 0)
                                                       <div class="col-md-6">
                                                    @else
                                                        <div class="col-md-12">
                                                    @endif
                                                        <div class="card border-success mb-3" style="max-width: 18rem;">
                                                            <div class="card-header">Booking {{ $loop->iteration }}</div>
                                                            <div class="card-body">
                                                                <h5 class="card-title"><i class="text-success fas fa-map-marker-alt"></i> {{ $booking['destination'] }}</h5>
                                                                <p class="card-text lead"><i class="text-success far fa-clock"></i> ACCEPTED</p>
                                                                <p class="lead"><i class="text-success far fa-file-alt"></i> {{ $booking['status_description'] }}</p>
                                                                <p class="lead">Start Date {{ $booking['start_date'] }}</p>
                                                                <p class="lead">End Date {{ $booking['end_date'] }}</p>
                                                                <p class="lead"><i class="text-success fas fa-bed"></i> Rooms</p>
                                                                <ul class="list-group">
                                                                    @foreach($booking['rooms'] as $room)
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            {{ $room['room'] }}
                                                                            <span class="badge badge-success badge-pill">{{ $room['quantity'] }}</span>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Rejected Bookings-->
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Rejected Bookings
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                @foreach($allBookings['rejected'] as $booking)
                                                    @if(sizeof($allBookings['rejected']) % 3 == 0)
                                                        <div class="col-md-4">
                                                    @elseif(sizeof($allBookings['rejected']) % 2 == 0)
                                                        <div class="col-md-6">
                                                    @else
                                                        <div class="col-md-12">
                                                    @endif
                                                        <div class="card border-danger mb-3" style="max-width: 18rem;">
                                                            <div class="card-header">Booking {{ $loop->iteration }}</div>
                                                            <div class="card-body">
                                                                <h5 class="card-title"><i class="text-danger fas fa-map-marker-alt"></i> {{ $booking['destination'] }}</h5>
                                                                <p class="card-text lead"><i class="text-danger far fa-clock"></i> REJECTED</p>
                                                                <p class="lead"><i class="text-danger far fa-file-alt"></i> {{ $booking['status_description'] }}</p>
                                                                <p class="lead">Start Date {{ $booking['start_date'] }}</p>
                                                                <p class="lead">End Date {{ $booking['end_date'] }}</p>
                                                                <p class="lead"><i class="text-danger fas fa-bed"></i> Rooms</p>
                                                                <ul class="list-group">
                                                                    @foreach($booking['rooms'] as $room)
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            {{ $room['room'] }}
                                                                            <span class="badge badge-danger badge-pill">{{ $room['quantity'] }}</span>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Finished Bookings -->
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Finished Bookings
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                @foreach($allBookings['finished'] as $booking)
                                                    @if(sizeof($allBookings['finished']) % 3 == 0)
                                                        <div class="col-md-4">
                                                    @elseif(sizeof($allBookings['finished']) % 2 == 0)
                                                       <div class="col-md-6">
                                                    @else
                                                       <div class="col-md-12">
                                                    @endif
                                                           <div class="card border-info mb-3" style="max-width: 18rem;">
                                                               <div class="card-header">Booking {{ $loop->iteration }}</div>
                                                               <div class="card-body">
                                                                   <h5 class="card-title"><i class="text-info fas fa-map-marker-alt"></i> {{ $booking['destination'] }}</h5>
                                                                   <p class="card-text lead"><i class="text-info far fa-clock"></i> FINISHED</p>
                                                                   <p class="lead"><i class="text-info far fa-file-alt"></i> {{ $booking['status_description'] }}</p>
                                                                   <p class="lead">Start Date {{ $booking['start_date'] }}</p>
                                                                   <p class="lead">End Date {{ $booking['end_date'] }}</p>
                                                                   <p class="lead"><i class="text-info fas fa-bed"></i> Rooms</p>
                                                                   <ul class="list-group">
                                                                       @foreach($booking['rooms'] as $room)
                                                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                               {{ $room['room'] }}
                                                                               <span class="badge badge-info badge-pill">{{ $room['quantity'] }}</span>
                                                                           </li>
                                                                       @endforeach
                                                                   </ul>
                                                               </div>
                                                           </div>
                                                       </div>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('layouts.footer')
            </body>
        </html>