@extends('layouts.appdashboard')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard - Admin Tool</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    </head>
    <body style="padding-top: 10%">

        <h1 class="text-center display-2">Welcome to Marriott Hotel, Admin Tool</h1>
        <blockquote class="blockquote text-center">
            <p class="mb-0">From here, you can control the system of <cite title="Source Title">Marriott hotel</cite>.</p>
        </blockquote>

        <img src="{{ asset('imgs/marriott.png') }}" class="img-fluid  rounded mx-auto d-block center-block" alt="Hotel Rooms">

        <!-- Footer -->
        @include('layouts.footer')

        <!-- Scripts -->
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        {{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
    </body>
</html>
