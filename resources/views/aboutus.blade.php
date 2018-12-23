@extends('layouts.app')
        <!doctype html>
        <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>About Us - Marriott Hotel</title>
            <!-- Bootstrap core CSS -->
            <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        </head>
        <body>
            <img src="{{ asset('imgs/branches.jpg') }}" class="img-fluid" alt="Responsive image">
            <hr>

            <!-- About Us -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <h1 class="text-center display-4">About Us</h1>
                    </div>
                    <blockquote class="blockquote">
                        <p class="lead">
                            Marriott International was founded in 1948 by Honorary Chairperson Thanpuying Chanut Piyaoui, whose ﬁrst hotel was the Princess on Bangkok’s Charoenkrung Road. Today the company is a leader in hotel management and hospitality education and comprises a unique international portfolio of distinctive hotels.

                            Marriott International currently operates 25 properties worldwide and has over 50 confirmed projects in the pipeline in key destinations such as Bahrain, Oman, Philippines, Qatar, Saudi Arabia, Singapore, Thailand, UAE, and Vietnam.

                            The company also operates the signature Devarana Spa and has a fast-growing Education Division.
                        </p>
                    </blockquote>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <!-- Vision -->
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                        <div class="card" style="width: 100%; height: 100%;">
                            <img class="card-img-top" src="{{ asset('imgs/Vision.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Vision</h5>
                                <p class="card-text">
                                    For over 65 years Marriott International has been synonymous with gracious hospitality. The relentless focus on guest experience is borne from this heritage. Kindness, compassion, and care are all in our DNA, and inspire the same distinctive service at each Dusit branded property worldwide. It’s who we are.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Mission -->
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                        <div class="card" style="width: 100%; height: 100%;">
                            <img class="card-img-top" src="{{ asset('imgs/Mission.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Mission</h5>
                                <p class="card-text">
                                    To be the best we need to first look within. We recognize happy employees equal happy guests, and we are proud to provide every member of the Marriott family with the skills and knowledge they need to artfully deliver personalized service and extraordinary experiences at each of our properties.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Values -->
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                        <div class="card" style="width: 100%; height: 100%;">
                            <img class="card-img-top" src="{{ asset('imgs/Values.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Values</h5>
                                <p class="card-text">
                                    Our values driven, high performance culture is built on three foundations:
                                </p>
                                <p class="card-text">
                                    1. Care – We put the needs of our customers, colleagues, and communities first when crafting experiences to remember.
                                </p>
                                <p class="card-text">
                                    2. Commit – We promise to deliver our very best, no matter how big or small the task.
                                </p>
                                <p class="card-text">
                                    3. Can do! – We are happy people happily serving our guests, and our modus operandi favours nothing but positive action.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>


            <!-- Hotel Branches -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <h1 class="text-center display-4">Explore Our Branches</h1>
                    </div>
                    <blockquote class="blockquote text-center">
                        <p class="mb-0">We’re Thrilled to Introduce Our Collection of Branches</p>
                        <footer class="blockquote-footer">Discover Classic brands, time-honored hospitality for the modern traveller. For those who lean towards memorable experiences with a unique perspective, we offer our family of Distinctive brands.
                            Whatever your preference, we can’t wait to welcome you in <cite title="Source Title">Marriott hotel</cite></footer>
                    </blockquote>
                </div>
            </div>


            <div class="container">
                <div class="row flex-center">
                        <p>
                            @foreach($branches as $branch)
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapse{{ $branch->location }}" role="button" aria-expanded="false" aria-controls="collapse{{ $branch->location }}">
                                    {{ $branch->location }} Branch
                                </a>
                            @endforeach
                        </p>
                </div>

                <!-- Hotel Branches -->
                @foreach($branches as $branch)
                <div class="collapse" id="collapse{{ $branch->location }}">
                    <div class="card card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <h2>{{ $branch->name }}</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                    <iframe src="https://maps.google.com/maps?q={{ $branch->longitude }},{{ $branch->latitude }}&hl=es;z=14&amp;output=embed" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                    <img src="{{ asset('imgs/'. $branch->location .'.jpg') }}" class="img-fluid" alt="Venice Marriott Hotel">
                                    <p class="lead">
                                        <i class="fas fa-map-marker-alt"></i>
                                        &nbsp; {{ $branch->address }}
                                    </p>
                                    <p class="lead">
                                        <i class="fas fa-phone"></i>
                                        &nbsp; {{ $branch->phone }}
                                    </p>
                                    <p class="lead">
                                        <i class="fas fa-link"></i>
                                        &nbsp;
                                        <a href="{{ $branch->link }}">
                                            Explore our website!
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @include('layouts.footer')

        </body>
        </html>