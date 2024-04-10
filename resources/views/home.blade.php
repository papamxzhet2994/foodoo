<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>FooDoo</title>
    <style>
        .shop-card {
            display: inline-block;
            width: 288px;
            height: 146px;
            margin: 15px;
            max-height: 200px;
            /*overflow: hidden;*/
            transition: max-height 0.8s ease;
        }

        .shop-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .shop-card img:hover {
            transform: scale(1.05);
        }

        .restaurants-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            margin-top: 20px;
        }

        .card {
            background-color: #fff;
            box-shadow: 10px 10px 40px 2px rgba(128, 128, 128, 0.4);
            display: inline-block;
            width: 375px;
            border-radius: 10px;
            margin: 10px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card .card-media img {
            background-position: center;
            background-size: cover;
            height: 200px;
            width: 100%;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
            position: relative;
        }


        .card .card-description {
            padding: 10px;
        }

        .card .card-description .about-place {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card .card-description .about-place .place-name {
            font-weight: 600;
            padding-bottom: 10px;
            color: rgba(0, 0, 0, 0.87);
        }

        .card .card-description .about-place .place-speciality, .card .card-description .about-place .per-person {
            font-size: 14px;
            color: rgba(128, 128, 128, 0.97);
        }

        .card .card-description .about-place .rating {
            font-size: 14px;
            border-radius: 4px;
            background-color: #0a6d0acc;
            color: #fff;
            font-weight: 700;
            text-align: center;
            padding: 2px 6px;
            margin-bottom: 6px;
            margin-left: 30px;
        }

        .shops-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 90%;
            margin: 0 auto;

        }

        .container {
            width: 91%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: auto;
        }

        .show-all {
            width: 91%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: auto;
        }

        .show-all .button {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: bold;
            margin-right: 170px;
        }

        .show-all .button:hover {
            background-color: #f2f2f2;
            color: #5263FF;

        }


        .skeleton {
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, #eee 8%, #ddd 18%, #eee 33%);
            background-size: 800px 104px;
            position: relative;
            animation-duration: 1s;
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
            animation-name: placeHolderShimmer;
            animation-timing-function: linear;
            border-radius: 15px;
        }

        @keyframes placeHolderShimmer {
            0% {background-position: -468px 0}
            100% {background-position: 468px 0}
        }

    </style>
</head>
<body>
@include('layouts.header')
<h1 class="show-all">Акции и предложения</h1>
<div class="container">
    <h3>Тут пока что ничего нет</h3>
    {{--    @if ($promotions->count() > 0)--}}
    {{--    @foreach($promotions as $promotion)--}}
    {{--        <a href="/promotions/{{ $promotion->id }}">--}}
    {{--            <div class="card">--}}
    {{--                <img src="{{$promotion->image}}" alt="{{ $promotion->name }}">--}}
    {{--                <h2>{{$promotion->name}}</h2>--}}
    {{--                <h3>{{$promotion->description}}</h3>--}}
    {{--            </div>--}}
    {{--        </a>--}}
    {{--    @endforeach--}}
    {{--    @else--}}
    {{--        <h1>Акции и предложения отсутствуют</h1>--}}
    {{--    @endif--}}
</div>
<div class="show-all">
    <h1>Магазины</h1>
    <button id="showShopsButton" class="button"></button>
</div>
<div class="shops-container">
@foreach($shops as $shop)
        <a href="/shops/{{ $shop->id }}">
            <div class="shop-card">
{{--                <div class="skeleton"></div>--}}
                <img src="{{ asset('images/' . $shop->image) }}" class="skeleton" >
            </div>
        </a>
    @endforeach
</div>

<h1 class="show-all">Рестораны</h1>
<div class="restaurants-container">
    @foreach($restaurants as $restaurant)
        <a href="/restaurants/{{ $restaurant->id }}">
            <div class="cards-container">
                <div class="card">
                    <div class="card-media">
                        <img src="{{ asset('images/restaurants/' . $restaurant->image) }}" class="skeleton">
                    </div>
                    <div class="card-description">
                        <div class="about-place">
                            <div class="place">
                                <p class="place-name">{{ $restaurant->name }}</p>
                                <p class="place-speciality">{{ $restaurant->description }}</p>
                            </div>
                            <div class="place-review">
                                <p class="rating">{{ $restaurant->rating }} &#x2605;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>


@include('layouts.footer')
<script>
    window.onload = function() {
        let shops = document.querySelectorAll('.shops-container .shop-card');
        for (let i = 5; i < shops.length; i++) {
            shops[i].style.maxHeight = '0';
        }

        let button = document.getElementById('showShopsButton');
        let buttonText = document.createTextNode('Все');
        let arrowIcon = document.createElement('i');
        arrowIcon.className = 'fas fa-chevron-right';
        button.appendChild(buttonText);
        button.appendChild(arrowIcon);

        button.addEventListener('click', () => {
            if (buttonText.nodeValue === 'Все') {
                for (let i = 5; i < shops.length; i++) {
                    shops[i].style.maxHeight = '500px'; // Замените это на максимальную высоту вашего .shop-card
                }
                buttonText.nodeValue = 'Скрыть';
            } else {
                for (let i = 5; i < shops.length; i++) {
                    shops[i].style.maxHeight = '0';
                }
                buttonText.nodeValue = 'Все';
            }
        });
    };

</script>



</body>
</html>
