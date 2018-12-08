@extends('layouts.app')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reviews</title>
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
        .review {
            border-radius: 10px;
            border: 1px solid silver;
            padding: 10px;
            margin: 10px;
            width: 1000px;
            height: 110px;
            background-color: #f0f5f5;

        }

    </style>
</head>
<body>
<div class="jumbotron">
    <div class="container">
        <div class="row" style="padding: 5%">
            <span class="col-md-8">
         <h1 class="display-3">Reviews</h1>
            </span>
       <span style="padding: 5%" class="col-md-4"> <a class="btn btn-primary btn-lg" href="#addReview" role="button">Add a Review &raquo;</a> </span>
   </span >
        </div>
</div>
</div>

@foreach($allReviews as $review)
<div class="container">
    <div class="row review">
        <div class="col-md-6">
            <p style="font-size: large;font-weight: bold"><span> {{$review->Name}} </span>
                @if($review->Rating == 1)
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                @elseif($review->Rating == 2)
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                @elseif($review->Rating == 3)
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                @elseif($review->Rating == 4)
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

            </p>
            <p>{{$review->Review}} </p>
            </br> </br> </br>
        </div>
    </div>
</div>
        @endforeach
    <hr>



<div class="container">
<div class="row">
    <div class="col-md-12">
<form method="POST" action="/reviews" >
    {{ csrf_field() }}
    <div>
       <a name="addReview"> <h4 style="margin-left: 1%"> Write a Review</h4> </a>
    </div>
        <div>
            <textarea name="userReview" class="" required="" placeholder="Your Review" style="min-height: 140px; width: 50%;margin-left: 1%"></textarea>
        </div>

    <div>
        <h4 style="margin-left: 1%">Give Your Rating Please</h4>
    </div>

    <div class="radio" style="margin-left: 1%">
        <label><input type="radio" style="height:20px; width:20px;" name="userRating" value="1"> <p style="font-size: medium">1 </p></label>
        <label><input type="radio" style="height:20px; width:20px;" name="userRating" value="2"> <p style="font-size: medium"> 2 </p></label>
        <label><input type="radio" style="height:20px; width:20px;" name="userRating" value="3" checked> <p style="font-size: medium"> 3 </p> </label>
        <label><input type="radio" style="height:20px; width:20px;" name="userRating" value="4"><p style="font-size: medium"> 4 </p></label>
        <label><input type="radio" style="height:20px; width:20px;" name="userRating" value="5"><p style="font-size: medium"> 5 (highest) </p></label>
    </div>


    <button type="submit" class="btn btn-primary btn-lg" style="margin-left: 1%">Submit</button>
</form>

    </div>
</div>
</div>




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>