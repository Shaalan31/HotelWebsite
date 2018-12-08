@extends('layouts.app')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Marriott Hotel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    </head>
    <body>

        <!-- Slider -->
        <main role="main"  style="padding-top: 9%">
            {{--<div class="title m-b-md">--}}
            {{--Mariott Hotel--}}
            {{--</div>--}}
            <div class="container">
                <section>
                    <div class="row">
                        <div class="content">

                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                </ol>
                                <div class="carousel-inner col-md-12 col-sm-12 col-lg-12">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100 img" width="100%" height="100%" src="{{ asset('imgs/hotel1.jpg') }}" alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Relaxing View</h5>
                                            <p>We have the best relaxing, comfortable views</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100 img" width="100%" height="100%" src="{{ asset('imgs/hotel2.jpg') }}" alt="Second slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Comfortable Receptions</h5>
                                            <p>We are the best in welcoming the guests</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100 img" width="100%" height="100%" src="{{ asset('imgs/hotel3.jpg') }}" alt="Third slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Relax By The Pool</h5>
                                            <p>We have the biggest pools</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100 img" width="100%" height="100%" src="{{ asset('imgs/hotel4.jpg') }}" alt="Third slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Best Dinner in Towns</h5>
                                            <p>We have different restaurants and cuisines</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </main>

        <!-- Scripts -->
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
