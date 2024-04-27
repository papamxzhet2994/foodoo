<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
    <script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>
    <title>{{ $shop->name }}</title>
</head>
<body>
@include('layouts.header')
<a href="{{ route('home') }}" class="back"><i class="fas fa-chevron-left"></i> Назад</a>
<h1 class="title">{{ $shop->name }} - Продукты</h1>

<section class="search">
    <div class="search-container">
    <form action="{{ route('products.search') }}" method="GET">
        <input type="hidden" name="shop" value="{{ $shop->id }}">
        <input type="hidden" name="category" value="{{ $category->id ?? 0 }}">
        <input type="text" name="search" placeholder="Поиск товаров" value="{{ request()->input('search') }}">
        <button type="submit">Найти</button>
    </form>
    </div>
</section>

<aside class="aside">
    <h2 class="accordion-toggle">Категории<i class="fas fa-chevron-down"></i></h2>
    <ul class="accordion-content">
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('products', ['shop' => $shop->id, 'category' => $category->id]) }}">{{ $category->name }}</a>
            </li>
        @endforeach
        <li>
            <form action="{{ route('products', ['shop' => $shop->id, 'category' => 0 ]) }}">
                <button class="button">Сбросить категории</button>
            </form>
        </li>
    </ul>

    <h2>Корзина</h2>
    <aside class="bucket">
        @php
            $cart = session()->get('cart', []);
        @endphp

        @if(count($cart) > 0)
            @foreach($cart as $id => $details)
                <div class="cart">
                    <img src="{{ asset('storage/' . $details['image'] ) }}" alt="{{ $details['name'] }}">
                    <div class="cart-item">
                        <p>{{ $details['name'] }}</p>
                        <strong>{{ $details['price'] }} ₽</strong>
                        <strong>Количество:{{ $details['quantity'] }}</strong>
                        <button class="remove-from-cart" onclick="window.location.href='/remove-from-cart/{{ $id }}'">
                            Удалить из корзины
                        </button>
                    </div>
                </div>
            @endforeach
            @php
                $total = 0;
                foreach($cart as $id => $details) {
                    $total += $details['price'] * $details['quantity'];
                }
                $total = number_format($total, 2, '.', '') . ' ₽';
            @endphp
            <p>Итого: {{ $total }}</p>
        @else
            <p>Корзина пуста</p>
        @endif

        <p></p>
        <button class="button" onclick="window.location.href='/order'">Оформить заказ</button>
    </aside>
</aside>


<div class="container">
    @if ($products->count() > 0)
        @foreach($products as $product)
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                <h2>{{ $product->name }}</h2>
                <p>Вес: {{ $product->weight }} г</p>
                <p>Описание: {{ $product->description }}</p>
                <p>Цена: {{ $product->price }} ₽</p>
                <button class="button add-to-cart" data-id="{{ $product->id }}">Добавить в корзину</button>
            </div>
        @endforeach
    @else
        <h2>Товары отсутствуют</h2>
    @endif
</div>

<script>
    // Обработчик для добавления товара в корзину
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            let product_id = this.dataset.id;
            fetch('/add-to-cart/' + product_id)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Received cart data:', data);
                    updateCart(data);
                    updateTotal(data);
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation:', error);
                });
        });
    });

    // Обработчик для удаления товара из корзины
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-from-cart')) {
            e.preventDefault();
            let product_id = e.target.dataset.id;
            fetch('/remove-from-cart/' + product_id)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Received cart data:', data);
                    updateCart(data);
                    updateTotal(data);
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation:', error);
                });
        }
    });

    function updateCart(cart) {
        let cartArray = Object.values(cart);

        let cartElement = document.querySelector('.bucket');
        cartElement.innerHTML = '';

        let cartTitle = document.createElement('h2');
        cartTitle.textContent = 'Корзина';
        cartElement.appendChild(cartTitle);


        for (let item of cartArray) {
            let newItem = document.createElement('div');
            newItem.classList.add('cart');
            newItem.innerHTML = `
            <img src="storage/" ${item.image} alt="${item.name}">
            <div class="cart-item">
                <p>${item.name}</p>
                <strong>${item.price} ₽</strong>
                <strong>Количество: ${item.quantity}</strong>
                <button class="remove-from-cart" data-id="${item.id}" onclick="window.location.href='/remove-from-cart/${item.id}'">Удалить из корзины</button>
            </div>
        `;
            cartElement.appendChild(newItem);
        }

        let totalElement = document.createElement('p');
        totalElement.classList.add('total');
        cartElement.appendChild(totalElement);

        let orderButton = document.createElement('button');
        orderButton.classList.add('button', 'order-button');
        orderButton.textContent = 'Оформить заказ';
        cartElement.appendChild(orderButton);

        orderButton.addEventListener('click', function() {
            window.location.href = '/order';
        });
    }

    function updateTotal(cart) {
        let cartArray = Object.values(cart);
        let total = 0;
        for (let item of cartArray) {
            total += item.price * item.quantity;
        }
        total = total.toFixed(2);
        document.querySelector('.total').textContent = 'Итого: ' + total + ' ₽';
    }

    document.addEventListener('DOMContentLoaded', function() {
        const accordionToggle = document.querySelector('.accordion-toggle');
        const accordionContent = document.querySelector('.accordion-content');

        accordionToggle.addEventListener('click', function() {
            if (accordionContent.style.display === 'block') {
                accordionContent.style.display = 'none';
                accordionToggle.classList.remove('open');
                accordionToggle.querySelector('i').classList.remove('fa-chevron-up');
                accordionToggle.querySelector('i').classList.add('fa-chevron-down');
            } else {
                accordionContent.style.display = 'block';
                accordionToggle.classList.add('open');
                accordionToggle.querySelector('i').classList.remove('fa-chevron-down');
                accordionToggle.querySelector('i').classList.add('fa-chevron-up');
            }
        });
    });
</script>
</body>
</html>
