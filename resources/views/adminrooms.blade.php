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
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-info pull-right" data-toggle="modal" data-target="#exampleModalCenter">
                            Add Room &raquo;
                        </button>
                    </div>
                </div>
            </div>
            <br>

            <!-- Modal -->
            @if($errors->any())
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                            <div class="alert alert-danger" role="alert" id="dangeralert">
                                The room is not added! Check "Add Room" to see the problem.
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add Room</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Add a room form -->
                        <form class="form-horizontal" method="POST" action="/addroom" name="addRoom">
                            {{ csrf_field() }}
                            <div class="modal-body">

                                <!-- Room Name -->
                                <div class="flex-center form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="credit_card" class="col-md-3 control-label">Room Name</label>

                                    <div class="col-md-9">
                                        <input id="name" type="text" placeholder="Room's Name" class="form-control" name="name" value="{{ old('name') }}"
                                               required
                                               autofocus
                                               onkeyup="validateCC()">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Number of Guests, Beds and Size of the room -->
                                <div class="form-row">
                                    <div class="col-md-4 form-group{{ $errors->has('no_of_guests') ? ' has-error' : '' }}">
                                        <label for="no_of_guests">Number Of Guests</label>
                                        <input name="no_of_guests" type="number" class="form-control text-center" id="no_of_guests" placeholder="Number Of Guests"
                                               required
                                               autofocus
                                               min = 1
                                               max = 4
                                               value="{{ old('no_of_guests') }}">
                                        @if ($errors->has('no_of_guests'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_of_guests') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4 form-group{{ $errors->has('no_of_beds') ? ' has-error' : '' }}">
                                        <label for="no_of_beds">Number Of Beds</label>
                                        <input name="no_of_beds" type="number" class="form-control text-center" id="no_of_beds" placeholder="Number Of Beds"
                                               required
                                               autofocus
                                               min = 1
                                               max = 4
                                               value="{{ old('no_of_beds') }}">
                                        @if ($errors->has('no_of_beds'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_of_beds') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4 form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                                        <label for="size">Size</label>
                                        <input name="size" type="number" class="form-control text-center" id="size" placeholder="Size Of The Room"
                                               required
                                               autofocus
                                               min = 1
                                               value="{{ old('size') }}">
                                        @if ($errors->has('size'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('size') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Description of the room -->
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="description" placeholder="Enter the description of the room" rows="3" required autofocus value="{{ old('description') }}"></textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!-- Price -->
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="price">Price</label>
                                    <input name="price" type="number" class="text-center form-control text-center" id="price" placeholder="Price $ pert night"
                                           required
                                           autofocus
                                           min = 1
                                           value="{{ old('price') }}">
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                    @endif
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Table Rooms -->
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
                            <td class="text-center">{{ $room->no_of_guests }}</td>
                            <td class="text-center">{{ $room->no_of_beds }}</td>
                            <td class="text-center">{{ $room->size }} Sq. M</td>
                            <td>
                                <!-- Button trigger for discription -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target=".description{{ $room->id }}">
                                    Room Description
                                </button>

                                <!-- Modal -->
                                <div class="modal fade description{{ $room->id }} bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">{{ $room->name }} Description</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $room->description }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
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