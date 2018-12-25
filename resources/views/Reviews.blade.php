@extends('layouts.app')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reviews - Marriott Hotel</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <style>

        .checked {
            color: orange;
        }


    </style>
</head>
<body>
    <div class="jumbotron backgroundReview">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="display-3" style="color: white">Reviews</h1>
                </div>
                @auth
                @if( Auth::user()->blocked == false && Auth::user()->is_admin == false)
                <div class="col-md-4">
                    <a class="btn btn-info btn-lg pull-right" role="button" data-toggle="modal" data-target= ".addReview" style="color: white;">Add a Review</a>
                </div>
                @endif
                @endauth
            </div>
        </div>
    </div>
    @auth
    @if( Auth::user()->blocked == false && Auth::user()->is_admin == false)
    <!-- Modal -->
    <div class="modal fade addReview bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"> Add a Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="POST" action="/reviews" >
                    <div class="modal-body">
                            {{ csrf_field() }}

                            <!-- User Review -->
                            <div class="form-group{{ $errors->has('userReview') ? ' has-error' : '' }}">
                                <label for="userReview">Write Your Review</label>
                                <textarea name="userReview" class="form-control" id="userReview" placeholder="Enter Your Review" rows="3" required autofocus value="{{ old('userReview') }}"></textarea>
                                @if ($errors->has('userReview'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userReview') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('userRating') ? ' has-error' : '' }}">
                                <label for="userRating">Give Your Rating Please</label>
                                <div class="radio" name="userRating" style="margin-left: 1%">
                                    <label><input type="radio" style="height:20px; width:20px;" name="userRating" value="1"> <p style="font-size: medium">1 </p></label>
                                    <label><input type="radio" style="height:20px; width:20px;" name="userRating" value="2"> <p style="font-size: medium"> 2 </p></label>
                                    <label><input type="radio" style="height:20px; width:20px;" name="userRating" value="3" checked> <p style="font-size: medium"> 3 </p> </label>
                                    <label><input type="radio" style="height:20px; width:20px;" name="userRating" value="4"><p style="font-size: medium"> 4 </p></label>
                                    <label><input type="radio" style="height:20px; width:20px;" name="userRating" value="5"><p style="font-size: medium"> 5 (highest) </p></label>
                                </div>
                                @if ($errors->has('userRating'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userRating') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg" style="margin-left: 1%">Submit</button>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endauth

    <!-- Alert the user if he is blocked -->
    @auth
    @if(Auth::user()->blocked == true)
        <!-- if the user is blocked -->
        <div class="container flex-center">
            <div class="row">
                <div class="alert alert-danger col-md-12 col-lg-12 col-xs-12 col-s-12" role="alert">
                    <h4 class="alert-heading">Sorry, You are blocked!</h4>
                    <p>We are very sorry! It seems that you are blocked from our website, you cannot book online neither add your review.</p>
                    <hr>
                    <p class="mb-0">Whenever you see this, contact us to solve this issue. Thank you!</p>
                </div>
            </div>
        </div>
    @endif
    @endauth

    <!-- All reviews -->
    <div class="container">
        <div class="row ">
    @foreach($allReviews as $review)
                <div class="col-md-6 ">
                    <div class="card" style="width: 100%; background-color: rgba(62,183,171,0.4); ">
                        <div class="row  align-self-center">
                            <div class="col-md-6">
                        <img class="rounded-circle" src="{{ asset('imgs/quotes.png') }}" >
                        </div>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title" ><span> {{$review->name}} </span>
                            @if($review->rating == 1)
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            @elseif($review->rating == 2)
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            @elseif($review->rating == 3)
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            @elseif($review->rating == 4)
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            @else
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            @endif

                    </h5>
                    <p class="card-text">{{$review->review}} </p>
                </div>
                    </div>
                    </br> </br>
                </div>

            @endforeach
            </div>
        </div>







































    <!-- Footer -->
    @include('layouts.footer')

    {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
    {{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
    {{--<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>--}}

</body>
</html>