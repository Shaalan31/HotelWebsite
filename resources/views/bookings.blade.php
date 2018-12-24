@extends('layouts.appdashboard')
        <!doctype html>
        <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Bookings - Admin Tool</title>
            <!-- Bootstrap core CSS -->
            <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        </head>
        <body style="padding-top: 8%">

            <!-- Title -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <h1 class="text-center display-2">Bookings</h1>
                        <blockquote class="blockquote text-center">
                            <p class="lead">View All Bookings in the system</p>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-s-12 col-lg-12">
                        <table id="bookingsTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">rooms</th>
                                <th scope="col">Status</th>
                                <th scope="col">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bookings as $booking)
                            <tr  scope="row">
                            <td id="id">{{ $booking['booking']->id }}</td>
                            <td >{{ $booking['user']['user_name']}}</td>
                            <td >{{ $booking['user']['user_phone']}}</td>
                            <td >{{ $booking['booking']->destination }}</td>
                            <td>{{ $booking['booking']->start_date }}</td>
                            <td>{{ $booking['booking']->end_date }}</td>
                            <td>
                                <ul class="list-group">
                                    @foreach($booking['rooms'] as $room)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $room['room'] }}
                                        <span class="badge badge-primary badge-pill">{{ $room['quantity'] }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                            @if($booking['booking']->status == 1)
                            <td>PENDING</td>
                            @elseif($booking['booking']->status == 2)
                            <td>ACCEPTED</td>
                            @elseif($booking['booking']->status == 3)
                            <td>REJECTED</td>
                            @else
                            <td>FINSIHED</td>
                            @endif

                            <td>
                                @if($booking['booking']->end_date < today() && $booking['booking']->status != 4)
                                The date of the booking has passed!
                                @elseif($booking['booking']->status != 4)
                                <span>
                                    <form action="/accept" method="post">
                                        {{ csrf_field() }}
                                        <input hidden name="id" value="{{ $booking['booking']->id }}">
                                        <button class="btn btn-success col-md-8" style="margin-bottom: 15%;"><i class="far fa-check-square"></i></button>
                                    </form>
                                </span>
                                <span>
                                    <form action="/reject" method="post">
                                        {{ csrf_field() }}
                                        <input hidden name="id" value="{{ $booking['booking']->id }}">
                                        <button class="btn btn-danger col-md-8" style="margin-bottom: 15%;"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </span>
                                @else
                                The booking is already finished!
                                @endif
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            @include('layouts.footer')

        </body>
        </html>