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
                                <th scope="col">Destination</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allBookings as $booking)
                            <tr  scope="row">
                            <td id="id">{{ $booking->id }}</td>
                            <td >{{ $booking->user_id }}</td>
                            <td >{{ $booking->destination }}</td>
                            <td>{{ $booking->start_date }}</td>
                            <td>{{ $booking->end_date }}</td>
                            @if($booking->status == 1)
                            <td>PENDING</td>
                            @elseif($booking->status == 2)
                            <td>ACCEPTED</td>
                            @elseif($booking->status == 2)
                            <td>REJECTED</td>
                            @else
                            <td>FINSIHED</td>
                            @endif

                                    {{--<td>--}}
                                {{--<select name="customerstatus" th:onchange="'changeSelect(' + ${row.id} + ')'" placeholder="Status" type="text" required="required" class="select_customer select_status" th:id="'action' + ${row.id}" >--}}
                                    {{--<option class="option_customer" th:each="status : ${allStatus}"  th:selected="${row.status.name == status}"  th:text="${status}"></option>--}}
                                {{--</select>--}}
                            {{--</td>--}}
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