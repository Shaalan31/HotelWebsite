@extends('layouts.appdashboard')
        <!doctype html>
        <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Customers - Admin Tool</title>
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
                        <h1 class="text-center display-2">Customers</h1>
                        <blockquote class="blockquote text-center">
                            <p class="lead">View all the Customers in the system</p>
                        </blockquote>
                    </div>
                </div>
            </div>

            <br>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-s-12 col-lg-12">
                        <table id="customersTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">UnBlock/Block</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr  scope="row">
                            <td id="id">{{ $user->id }}</td>
                            <td >{{ $user->name }}</td>
                            <td >{{ $user->address }}</td>
                            <td >{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            @if($user->blocked == true)
                            <td><span class="badge badge-danger">BLOCKED</span></td>
                            @else
                            <td><span class="badge badge-success">ACTIVE</span></td>
                            @endif
                            <td class="text-center">
                                @if($user->blocked == false)
                                <form action="/block/{{ $user->id }}" method="get">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit"><i class="fas fa-ban"></i></button>
                                </form>
                                @else
                                <form action="/unblock/{{ $user->id }}" method="get">
                                    {{ csrf_field() }}
                                    <button class="btn btn-success" type="submit"><i class="far fa-check-circle"></i></button>
                                </form>
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