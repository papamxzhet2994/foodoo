<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Оформление заказа</title>
    <style>
        body {
            font-family: Roboto, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #BD4932;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 15px 30px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #9e3a26;
        }

        .note {
            font-size: 14px;
            color: #888;
            text-align: center;
            margin-top: 10px;
        }

        /* Стили для списка товаров в корзине */
        .cart-list {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cart-item img {
            max-width: 100px;
            margin-right: 20px;
            border-radius: 10px;
        }

        .cart-item-info {
            flex-grow: 1;
        }

        .cart-item-info h3 {
            margin: 0 0 10px;
            color: #333;
            font-size: 20px;
        }

        .cart-item-info p {
            margin: 0;
            color: #666;
            font-size: 16px;
        }

        .remove-from-cart {
            background-color: #BD4932;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .remove-from-cart:hover {
            background-color: #9e3a26;
        }

        .empty-cart {
            text-align: center;
            color: #888;
            font-size: 18px;
        }

        .back-link {
            display: block;
            margin-bottom: 20px;
            color: #333;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
            font-family: Roboto, sans-serif;
        }

        .back-link:hover {
            color: #5263FF;
        }
    </style>
</head>
<body>

<a href="/" class="back-link"><i class="fas fa-arrow-left"></i> Назад</a>

<div class="container">
    <h1>Оформление заказа</h1>

    <!-- Корзина -->
    <div class="cart-list">
        <h2>Товары в корзине</h2>
        @if (count($products) > 0)
            @foreach($products as $product)
                <div class="cart-item">
                    <img src="{{asset('images/') . '/' . $product->image }}" alt="{{ $product->name }}">
                    <div class="cart-item-info">
                        <h3>{{ $product->name }}</h3>
                        <p>Цена: {{ $product->price }}</p>
                        <p>Количество: {{ $cart[$product->id]['quantity'] }}</p>
                    </div>
                    <button class="remove-from-cart" onclick="window.location.href='/remove-from-cart/{{ $product->id }}'">
                        Удалить из корзины
                    </button>
                </div>
            @endforeach
        @else
            <p class="empty-cart">Корзина пуста</p>
            <a href="/" class="back-link">Вернуться к покупкам</a>
        @endif
    </div>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <label for="name">Имя:</label>
        @if(auth()->user())
            <h4>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h4>
        @endif

        <label for="email">Email:</label>
        @if(auth()->user())
            <h4>{{ auth()->user()->email }}</h4>
        @endif

        <label for="map">Адрес:</label>
{{--        <textarea id="address" name="address" rows="4" required></textarea>--}}
        <div id="map" style="width: 800px; height: 400px"></div>
        <input type="hidden" id="address" name="address">


        <label for="phone">Телефон:</label>
        <input type="text" id="phone" name="phone" required>

        <input type="submit" value="Перейти к оплате">

        <p class="note">Нажимая кнопку "Оформить заказ", вы соглашаетесь с нашими <a href="#">условиями использования</a>.</p>
    </form>
</div>
<script src="https://api-maps.yandex.ru/2.1/?e5798847-1968-49c3-9394-e3b9dc391e31&lang=ru_RU" type="text/javascript"></script>
<script type="text/javascript">
    ymaps.ready(init);
    function init(){
        const myMap = new ymaps.Map("map", {
            center: [55.76, 37.64],
            zoom: 7
        });

        const myPlacemark = new ymaps.Placemark([55.76, 37.64], {}, {
            preset: 'islands#redDotIcon'
        });

        myMap.events.add('click', function (e) {
            const coords = e.get('coords');
            myPlacemark.geometry.setCoordinates(coords);
            document.getElementById('address').value = coords;
        });

        myMap.events.add('dragend', function (e) {
            const coords = e.get('target').geometry.getCoordinates();
            myPlacemark.geometry.setCoordinates(coords);
            document.getElementById('address').value = coords;
        })

        myMap.geoObjects.add(myPlacemark);
    }
</script>
</body>
</html>
