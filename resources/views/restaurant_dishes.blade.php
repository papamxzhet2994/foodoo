@include('layouts.header')
<script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>
<style>
    .restaurant-info {
        position: relative;
        text-align: center;
        margin-top: 20px;
    }

    .restaurant-image {
        width: 900px; /* Ширина изображения */
        height: 350px; /* Высота изображения */
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        position: relative;
        display: flex; /* Добавляем это свойство */
    }

    .restaurant-info h1 {
        background: none;
        color: #fff;
        font-size: 24px;
        margin: 0;
        padding: 20px;
        text-align: center;
        position: absolute;
        align-self: center; /* Добавляем это свойство */
    }

    .overlay {
        position: absolute;
        top: 0; /* Изменяем это значение */
        left: 0;
        display: flex; /* Добавляем это свойство */
        flex-direction: column; /* Добавляем это свойство */
        align-items: center; /* Добавляем это свойство */
        justify-content: center; /* Добавляем это свойство */
        width: 100%; /* Добавляем это свойство */
        height: 100%; /* Добавляем это свойство */
    }


    .restaurant-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .overlay:hover {
        opacity: 1;
    }

    .restaurant-info .rating {
        display: flex;
        color: #ffda00;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
    }

    .restaurant-info .rating p {
        margin-left: 5px;
    }

    .favorite {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .favorite i {
        font-size: 24px;
        margin-right: 10px;
        color: #ef4444;
    }

    .restaurant-info .button-add-to-favorite {
        border: none;
        background: none;
        color: #fff;
        font-size: 16px;
        padding: 10px 20px;
    }


    .restaurant-info .button-add-to-favorite:hover {
        background-color: #9e3a26;
    }

    .restaurant-info p {
        margin-bottom: 10px;
    }
</style>

<title>{{ $restaurant->name }}</title>
<a href="{{ route('home') }}">Вернуться назад</a>
<h1>{{ $restaurant->name }}</h1>

{{--<aside class="categories">--}}
{{--    <h1>Категории</h1>--}}
{{--    <h4>тут пока что ничего нет</h4>--}}

{{--    <section class="cart">--}}
{{--        <h1>Корзина</h1>--}}
{{--        <h4>тут пока что ничего нет</h4>--}}
{{--    </section>--}}
{{--</aside>--}}

<section class="restaurant-info">
    <div class="restaurant-image">
        <h1>{{ $restaurant->name }}</h1>
        <img src="{{ asset('images/restaurants/' . $restaurant->image) }}">
        <div class="overlay">
            <div class="rating">
                <i class="fas fa-star"></i>
                <p>{{ $restaurant->rating }}</p>
            </div>
            <div class="favorite">
                <i class="fas fa-heart"></i>
                <button class="button-add-to-favorite">Добавить в избранное</button>
            </div>
        </div>
    </div>
</section>

<h2>Меню</h2>
@if ($dishes && $dishes->count() > 0)
    @foreach($dishes as $dish)
        <div class="card">
            <img src="{{ asset('images/dishes/' . $dish->image) }}" alt="{{ $dish->name }}">
            <h1>{{ $dish->name }}</h1>
            <p>{{ $dish->description }}</p>
            <p>{{ $dish->price }}</p>
            <button class="button">Добавить в корзину</button>
        </div>
    @endforeach
@else
    <h1>Товары отсутствуют</h1>
@endif
