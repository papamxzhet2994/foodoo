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
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>FooDoo</title>
</head>
<body>
@include('layouts.header')
<h1 class="show-all">Акции и предложения</h1>
<div class="container">
    <div class="promotions-container">
        @if ($promotions->count() > 0)
        @foreach($promotions as $promotion)
            <a href="/promotions/{{ $promotion->id }}">
                <div class="promotions">
                <div class="promotion-card">
                    <img src="{{$promotion->image}}" class="skeleton">
                    <div class="promotion-name">
                        <h2>{{$promotion->name}}</h2>
                    </div>
                </div>
                </div>
            </a>
        @endforeach
        @else
            <h3>Тут пока что ничего нет</h3>
        @endif
    </div>
</div>
<h1 class="show-all">Магазины</h1>
<div class="show-all">
    <span class="show-all-shops"></span>
    <button id="showShopsButton" class="button"></button>
</div>
<div class="shops-container{{ $isMobile ? ' show-all-shops' : '' }}">
    <div class="slider">
@if ($shops->count() > 0)
    @foreach($shops as $shop)
        <a href="/shops/{{ $shop->id }}">
            <div class="shop-card">
                <img src="{{ asset('storage/' . $shop->image) }}" class="skeleton">
            </div>
        </a>
    @endforeach
@else
    <h3>Тут пока что ничего нет</h3>
@endif
    </div>
</div>
<div class="slider-buttons">
    <button id="prevButton" class="slider-button"><i class="fas fa-chevron-left"></i></button>
    <button id="nextButton" class="slider-button"><i class="fas fa-chevron-right"></i></button>
</div>

<h1 class="show-all">Рестораны</h1>
<div class="restaurants-container">
@if ($restaurants->count() > 0)
    @foreach($restaurants as $restaurant)
        <div class="card-wrapper">
        <a href="/restaurants/{{ $restaurant->id }}">
            <div class="cards-container">
                <div class="card">
                    <div class="card-media">
                        <img src="{{ asset( 'storage/' . $restaurant->image) }}" class="skeleton">
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
        </div>
    @endforeach
@else
    <h3>Тут пока что ничего нет</h3>
@endif
</div>
@include('layouts.footer')
<script>
    window.onload = function() {
        let shops = document.querySelectorAll('.shops-container .shop-card');
        for (let i = 5; i < shops.length; i++) {
            shops[i].style.maxHeight = '0';
        }
        if (shops.length <= 5) {
            document.getElementById('showShopsButton').style.display = 'none';
        }

        let button = document.getElementById('showShopsButton');
        let buttonText = document.createTextNode('Все');
        let arrowIcon = document.createElement('i');
        arrowIcon.className = 'fas fa-chevron-right';
        button.appendChild(buttonText);
        button.appendChild(arrowIcon);

        button.addEventListener('click', () => {
            let shops = document.querySelectorAll('.shops-container .shop-card');
            if (buttonText.nodeValue === 'Все') {
                shops.forEach(shop => {
                    shop.style.maxHeight = '500px';
                });
                buttonText.nodeValue = 'Скрыть';
            } else {
                for (let i = 5; i < shops.length; i++) {
                    shops[i].style.maxHeight = '0';
                }
                buttonText.nodeValue = 'Все';
            }
        });
    };

    document.addEventListener('DOMContentLoaded', function () {
        const slider = document.querySelector('.slider');
        const cards = document.querySelectorAll('.shop-card');

        function scaleCards() {
            cards.forEach(card => {
                if (slider.scrollLeft + slider.clientWidth >= card.offsetLeft && slider.scrollLeft <= card.offsetLeft + card.clientWidth) {
                    card.classList.add('active');
                } else {
                    card.classList.remove('active');
                }
            });
        }
        slider.addEventListener('scroll', scaleCards);
        scaleCards();
    });

    let prevButton = document.getElementById('prevButton');
    let nextButton = document.getElementById('nextButton');

    prevButton.addEventListener('click', () => {
        let slider = document.querySelector('.slider');
        let scrollPosition = slider.scrollLeft;
        slider.scrollTo({
            left: scrollPosition - 288,
            behavior: 'smooth'
        });
    });

    nextButton.addEventListener('click', () => {
        let slider = document.querySelector('.slider');
        let scrollPosition = slider.scrollLeft;
        slider.scrollTo({
            left: scrollPosition + 288,
            behavior: 'smooth'
        });
    });

</script>
</body>
</html>
