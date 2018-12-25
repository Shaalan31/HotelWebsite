@extends('layouts.app')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rooms - Marriott Hotel</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
@if($location == 'Egypt')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner col-md-12 col-sm-12 col-lg-12">
        <div class="carousel-item active">
            <img class="d-block w-100 " width="100%" height="100%" src="{{ asset('imgs/pyramids.jpg') }}" >
            <div class="carousel-caption d-none d-md-block">
                <h5 style="font-size: xx-large; font-weight: bold">Welcome to Egypt!</h5>
            </div>
        </div>
    </div>
</div>
    <hr>
    <br>
<h1 class="text-center display-1">Your Trip Advisor</h1>
    <br>
    <br>
<div class="container" >
<div class="row">
    <div class="col-md-4">
<div class="card" style="width: 100%;">
    <img class="card-img-top" src="{{ asset('imgs/nileTower.jpg') }}" >
    <div class="card-body">
        <h5 class="card-title">The Cairo Tower</h5>
        <p class="card-text">It is a free-standing concrete tower in Cairo, Egypt. At 187 m (614 ft), it has been the tallest structure in Egypt and North Africa for about 50 years. It is considered Egypt's second most famous landmark after the Pyramids of Giza</p>
    </div>
</div>
</div>

    <div class="col-md-4">
        <div class="card" style="width: 100%;">
            <img class="card-img-top" src="{{ asset('imgs/museumegypt.jpg') }}" >
            <div class="card-body">
                <h5 class="card-title">The Egyptian Museum</h5>
                <p class="card-text"> The Museum of Egyptian Antiquities, known commonly as the Egyptian Museum or Museum of Cairo, in Cairo, Egypt, is home to an extensive collection of ancient Egyptian antiquities. It has 120,000 items, with a representative amount on display. </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card" style="width: 100%;">
            <img class="card-img-top" src="{{ asset('imgs/cairoCitadel.jpg') }}" >
            <div class="card-body">
                <h5 class="card-title">The Saladin Citadel of Cairo</h5>
                <p class="card-text"> It is a medieval Islamic fortification in Cairo, Egypt. The location, on Mokattam hill near the center of Cairo, was once famous for its fresh breeze and grand views of the city. It is now a preserved historic site.</p>
            </div>
        </div>
    </div>
</div>
</div>

<br>
<br>
<br>
<br>
<br>

@elseif($location == 'China')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner col-md-12 col-sm-12 col-lg-12">
            <div class="carousel-item active">
                <img class="d-block w-100 " width="100%" height="100%" src="{{ asset('imgs/the-great-wall-of-china.jpg') }}" >
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: xx-large; font-weight: bold">Welcome to China!</h5>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <br>
    <h1 class="text-center display-1">Your Trip Advisor</h1>
    <br>
    <br>
    <div class="container" >
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('imgs/china-attractions-leshan-giant-buddha.jpg-.jpg') }}" >
                    <div class="card-body">
                        <h5 class="card-title">The Leshan Giant Buddha</h5>
                        <p class="card-text">It is a statue of Maitreya in sitting posture. The Buddha is located to the east of Leshan City, Sichuan Province, at the confluence of three rivers. The statue makes itself the most renowned scenic spot in that city.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('imgs/china-summer-palace.jpg') }}" >
                    <div class="card-body">
                        <h5 class="card-title">The Summer Palace</h5>
                        <p class="card-text"> It is one of China's most visited attractions. Its Highlights include the magnificent Hall of Well-being and Longevity (Renshou Dian) with its throne, and the beautiful Great Theatre, and a private three-story structure. </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('imgs/LiRiver.jpg') }}" >
                    <div class="card-body">
                        <h5 class="card-title">Cruising the Li River</h5>
                        <p class="card-text"> The best way to enjoy the area is to take a cruise along the Li River. The most popular stretch is from Guilin to Yangshuo, where the river meanders peacefully through some 80 kilometers of remarkable rock formations and cavess. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

@elseif($location == 'France')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner col-md-12 col-sm-12 col-lg-12">
            <div class="carousel-item active">
                <img class="d-block w-100 " width="100%" height="100%" src="{{ asset('imgs/LeLouvre.jpg') }}" >
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: xx-large; font-weight: bold">Welcome to France!</h5>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <br>
    <h1 class="text-center display-1">Your Trip Advisor</h1>
    <br>
    <br>
    <div class="container" >
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('imgs/tourEiffel.jpg') }}" >
                    <div class="card-body">
                        <h5 class="card-title">The Eiffel Tower</h5>
                        <p class="card-text"> It is a wrought-iron lattice tower on the Champ de Mars in Paris, France. It is has a global cultural icon of France and one of the most recognisable structures in the world.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('imgs/Arc-de-Triomphe.jpg') }}" >
                    <div class="card-body">
                        <h5 class="card-title">The Arc de Triomphe de l'Étoile</h5>
                        <p class="card-text"> It is one of the most famous monuments in Paris, standing at the western end of the Champs-Élysées at the center of Place Charles de Gaulle. </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('imgs/disneyland.jpg') }}" >
                    <div class="card-body">
                        <h5 class="card-title"> Disneyland Paris </h5>
                        <p class="card-text">  It is originally Euro Disney Resort, is an entertainment resort in Marne-la-Vallée. It encompasses two theme parks, many resort hotels, a shopping, dining, and entertainment complex, and a golf course. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@elseif($location == 'Italy')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner col-md-12 col-sm-12 col-lg-12">
            <div class="carousel-item active">
                <img class="d-block w-100 " width="100%" height="100%" src="{{ asset('imgs/Vatican.jpg') }}" >
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: xx-large; font-weight: bold">Welcome to Italy!</h5>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <br>
    <h1 class="text-center display-1">Your Trip Advisor</h1>
    <br>
    <br>
    <div class="container" >
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('imgs/colosseum.jpg') }}" >
                    <div class="card-body">
                        <h5 class="card-title"> The Colosseum </h5>
                        <p class="card-text"> For travelers making their way through Italy, the Colosseum is a must see. This huge Amphitheater is the largest of its kind ever built by the Roman Empire. </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('imgs/LeaningTower.jpg') }}" >
                    <div class="card-body">
                        <h5 class="card-title"> The Leaning Tower of Pisa </h5>
                        <p class="card-text"> It is actually just one of many attractions in the city of Pisa, but its fame, gained from its flaw, is world renown. Visitors can climb up the stairs of the tower for a fabulous view over the city. </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('imgs/LakeComo.jpg') }}" >
                    <div class="card-body">
                        <h5 class="card-title"> Lake Como </h5>
                        <p class="card-text"> It is one of Italy's most scenic areas, surrounded by mountains and lined by small picturesque towns. A haunt of the wealthy since Roman times, the lake has many villas along its wooded shores, surrounded by gardens that are open to the public. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>


@endif

<!-- Footer -->
@include('layouts.footer')

</body>
</html>
