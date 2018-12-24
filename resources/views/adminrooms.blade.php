@extends('layouts.appdashboard')
        <!doctype html>
        <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Rooms - Admin Tool</title>
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
                        <h1 class="text-center display-2">Rooms</h1>
                        <blockquote class="blockquote text-center">
                            <p class="lead">View All Rooms in the system</p>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-s-12 col-lg-12">
                        <table id="roomsTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">name</th>
                                <th scope="col">Number Of Guests</th>
                                <th scope="col">Number Of Beds</th>
                                <th scope="col">Size</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allRooms as $room)
                            <tr  scope="row">
                            <td id="id">{{ $room->id }}</td>
                            <td >{{ $room->name }}</td>
                            <td >{{ $room->no_of_guests }}</td>
                            <td >{{ $room->no_of_beds }}</td>
                            <td>{{ $room->size }} Sq. M</td>
                            <td>{{ $room->description }}</td>
                            <td>{{ $room->price }}$ per night</td>
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