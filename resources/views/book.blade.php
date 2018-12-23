@extends('layouts.app')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Book - Marriott Hotel</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="background">

    <div class="container">
        <div class="row">
            <div class="col-md-8 form">

                <!-- Card Login -->
                <div class="card border-primary mb-3" style="background-color: rgba(255, 255, 255, 0.82)">
                    <div class="card-header">Make Your Booking!</div>
                    <div class="card-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <blockquote class="blockquote text-center">
                                    <p class="mb-0">Marriott Hotel Reservation</p>
                                    <footer class="blockquote-footer">Book your rooms now in <cite title="Source Title">Marriott hotel</cite></footer>
                                </blockquote>
                                <!-- Login Form -->
                                <form class="form-horizontal" method="POST" action="/book" name="book" class="bookForm">
                                    {{ csrf_field() }}

                                    <!-- Credit Card -->
                                    <div class="flex-center form-group{{ $errors->has('credit_card') ? ' has-error' : '' }}">
                                        <label for="credit_card" class="col-md-3 control-label">Credit Card Number</label>

                                        <div class="col-md-9">
                                            <input id="credit_card" type="text" placeholder="Your Credit Card number" class="form-control" name="credit_card" value="{{ old('credit_card') }}"
                                                   required
                                                   autofocus
                                                   onkeyup="validateCC()">

                                            @if ($errors->has('credit_card'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('credit_card') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <!-- Start Date -->
                                    <div class="flex-center form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                        <label for="start_date" class="col-md-3 control-label">Start Date</label>

                                        <div class="col-md-9">
                                            <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required autofocus min="" onchange="checkStartDate();">

                                            @if ($errors->has('start_date'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('start_date') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- End Date -->
                                    <div class="flex-center form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                        <label for="end_date" class="col-md-3 control-label">End Date</label>

                                        <div class="col-md-9">
                                            <input id="end_date" type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required autofocus min="" onchange="checkEndDate()">

                                            @if ($errors->has('end_date'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('end_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Script for adjusting the minimum the date of the calendar -->
                                    <script>
                                        var today = new Date().toISOString().split('T')[0];
                                        document.getElementById("start_date").setAttribute('min', today);
                                        document.getElementById("end_date").setAttribute('min', today);
                                    </script>

                                    <!-- Hotel Branch -->
                                    <div class="flex-center form-group{{ $errors->has('hotel') ? ' has-error' : '' }}">
                                        <label for="hotel" class="col-md-3 control-label">Hotel Branch</label>
                                        <div class="col-md-9">
                                            <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            </div>
                                            <select required="required" name="hotel" class="custom-select" id="inputGroupSelect01">
                                                <option name="hotel" selected value="Hotel Danieli, a Luxury Collection Hotel, Venice">Hotel Danieli, a Luxury Collection Hotel, Venice</option>
                                                <option name="hotel" value="JW Marriott Hotel Hong Kong, China">JW Marriott Hotel Hong Kong, China</option>
                                                <option name="hotel" value="JW Marriott Hotel Cairo, Egypt">JW Marriott Hotel Cairo, Egypt</option>
                                                <option name="hotel" value="Courtyard Paris Roissy Charles De Gaulle Airport Hotel">JCourtyard Paris Roissy Charles De Gaulle Airport Hotel - France</option>
                                            </select>
                                            </div>
                                            @if ($errors->has('hotel'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('hotel') }}</strong>
                                                </span>
                                            @endif

                                            <p class="lead"><a href="/aboutus">Explore Our Branches</a></p>
                                        </div>
                                    </div>

                                     <!-- Choose Rooms -->
                                    <div class="flex-center form-group{{ $errors->has('room') ? ' has-error' : '' }}">
                                        <label for="room" class="col-md-3 control-label">Rooms</label>
                                        <div class="col-md-9">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                </div>
                                                <select required="required" name="room" class="custom-select" id="inputGroupSelect02">
                                                    @foreach($allRooms as $room)
                                                        @if( $room->id == 1)
                                                            <option name="room" selected id="{{ $room->id }}" value="{{ $room->name }}">{{ $room->name }}</option>
                                                        @else
                                                            <option name="room" id="{{ $room->id }}" value="{{ $room->name }}">{{ $room->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" onclick="addRoom()">Add</button>
                                                    <button class="btn btn-outline-success" type="button" onclick="incrementValue('quantity')">+</button>
                                                    <button disabled="disabled" class="btn btn-outline-dark" id="quantity" name="quantity">1</button>
                                                    <button class="btn btn-outline-danger" type="button" onclick="decrementValue('quantity')">-</button>
                                                </div>
                                            </div>
                                            @if ($errors->has('room'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('room') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                     <!-- List of chosen rooms -->
                                    <div class="flex-center form-group">
                                        <label for="email" class="col-md-3 control-label"></label>
                                        <div class="col-md-9" id="roomsList">
                                        </div>
                                    </div>

                                    <!-- Submit the form -->
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button class="btn btn-primary" type="submit">
                                                Book Now!
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('layouts.footer')
</body>
</html>