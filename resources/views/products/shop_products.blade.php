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
    <title>{{ $shop->name }}</title>
</head>
<body>
@include('layouts.header')
<style>
    .title {
        margin-left: 20px;
    }

    .back {

        text-decoration: none;
        color: #000;
        font-size: 1.2rem;
        font-weight: bold;
        padding: 10px;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 0 5px #ccc;
        transition: all 0.3s ease;
    }

    .back:hover {
        background-color: #f2f2f2;
        color: #5263FF;
    }

    /* Стиль для боковой панели с категориями */
    .aside {
        width: 20%;
        height: auto;
        background-color: #ffffff;
        padding: 20px;
        float: left;
        transition: all 0.3s ease;
        overflow-y: scroll;
        border-radius: 15px;
    }

    .aside h2 {
        text-align: start;
        font-size: 1.5rem;
        margin-bottom: 10px;
        font-family: Roboto, sans-serif;
    }

    .aside ul {
        list-style: none;
        padding: 0;
    }

    .aside li {
        margin: 5px;
        padding: 5px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .aside a {
        display: block;
        text-decoration: none;
        color: #000;
        padding: 15px;
        border-radius: 5px;
        transition: all 0.3s ease;

    }

    .aside a:hover {
        background-color: #BD4932;
        color: #fff;
    }

    .aside button {
        display: block;
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #BD4932;
        color: #fff;
        font-size: 1.2rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .aside button:hover {
        background-color: #fff;
        color: #BD4932;
        box-shadow: inset 0 0 5px #FF836A;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin-top: 20px;
    }

    .card {
        flex: 0 0 calc(30% - 20px);
        margin: 10px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card img {
        max-width: 250px;
        height: 200px;
        border-radius: 10px;
        margin-bottom: 10px;
        object-fit: cover;
        align-self: center;
    }

    .card h2 {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333333;
    }

    .card p {
        margin-bottom: 10px;
        color: #666666;
    }

    .card .button {
        align-self: flex-end;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #BD4932;
        color: #ffffff;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .card .button:hover {
        background-color: #9e3a26;
    }

    .bucket {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .bucket h1 {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333333;
    }

    .bucket p {
        margin-bottom: 20px;
        color: #666666;
    }

    .bucket .button {
        display: block;
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #BD4932;
        color: #fff;
        font-size: 1.2rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .bucket .button:hover {
        background-color: #fff;
        color: #BD4932;
        box-shadow: inset 0 0 5px #FF836A;
    }

    .cart {
        display: flex;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
    }

    .cart img {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }

    .cart-item {
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .cart-item p {
        margin: 0;
        font-size: 16px;
        color: #333;
    }

    .cart-item strong {
        font-size: 18px;
        color: #000;
    }

    .cart .remove-from-cart {
        background: none;
        border: none;
        cursor: pointer;
        color: #333333;
        font-size: 13px;
    }

    .cart .remove-from-cart:hover {
        box-shadow: none;
        text-decoration: underline;
        color: #333333;
    }

    .search {
        margin: 20px 20px;
        display: flex;
        align-items: center;
    }

    .search-container {
        display: flex;
        align-items: center;
    }

    .search-container form {
        display: flex;
        align-items: center;
    }

    .search-container input[type="text"] {
        flex: 2;
        width: 290px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-right: 10px;
        font-size: 1rem;
    }

    .search-container button[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #BD4932;
        color: #fff;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    i.fa-chevron-down, i.fa-chevron-up {
        display: none;
    }

    .search-container button[type="submit"]:hover {
        background-color: #9e3a26;
    }


    @media screen and (max-width: 768px) {
        h1 {
            font-size: 1.5rem;
        }

        .title {
            margin-left: 10px;
        }

        .back {
            font-size: 1rem;
            padding: 5px;
        }

        .aside {
            width: 90%;
            float: none;
            padding: 10px;
        }

        .aside h2 {
            font-size: 1.2rem;
        }

        .aside a {
            padding: 10px;
        }

        .aside button {
            margin: 5px 0;
            font-size: 1rem;
        }

        .container {
            flex-direction: column;
        }

        .card {
            flex: 0 0 100%;
            padding: 10px;
        }

        .card img {
            max-width: 200px;
            height: 150px;
        }

        .card h2 {
            font-size: 1.2rem;
        }

        .card p {
            font-size: 0.8rem;
        }

        .card .button {
            font-size: 0.8rem;
        }

        .bucket {
            padding: 10px;
        }

        .bucket p {
            font-size: 0.8rem;
        }

        .bucket .button {
            font-size: 1rem;
        }

        .cart {
            border: 1px solid #f2f2f2;
            background-color: #f2f2f2;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 25px;
            overflow: hidden;
            height: 100px;
        }

        .cart img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 10px;
            border-radius: 10px;

        }

        .cart-item p,
        .cart-item strong {
            font-size: 0.8rem;
        }

        .cart .remove-from-cart {
            font-size: 0.7rem;
            color: #333;
        }

        .search-container input[type="text"] {
            width: 200px;
            font-size: 0.8rem;
        }

        .search-container button[type="submit"] {
            font-size: 0.8rem;
            margin-left: 0;

        }

        .aside .accordion-content {
            display: none;
        }

        .aside .accordion-toggle::after {
            display: block;
            float: right;
        }

        i.fas.fa-chevron-down {
            float: right;
            display: block;
        }

        i.fas.fa-chevron-up {
            float: right;
            display: block;
        }
    }
</style>
<script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>
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
                        <strong>{{ $details['price'] }}</strong>
                        <strong>{{ $details['quantity'] }}</strong>
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
                <p>{{ $product->weight }}</p>
                <p>{{ $product->description }}</p>
                <p>{{ $product->price }}</p>
                <button class="button add-to-cart" data-id="{{ $product->id }}">Добавить в корзину</button>
            </div>
        @endforeach
    @else
        <h2>Товары отсутствуют</h2>
    @endif
</div>

<script>
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

        function updateCart(cart) {
            let cartArray = Object.values(cart);

            let cartElement = document.querySelector('.bucket');
            cartElement.innerHTML = '';

            let cartTitle = document.createElement('h1');
            cartTitle.textContent = 'Корзина';
            cartElement.appendChild(cartTitle);


            for (let item of cartArray) {
                let newItem = document.createElement('div');
                newItem.classList.add('cart');
                newItem.innerHTML = `
            <img src="${item.image}" alt="${item.name}">
            <div class="cart-item">
                <p>${item.name}</p>
                <strong>${item.price}</strong>
                <strong>${item.quantity}</strong>
                <button class="remove-from-cart" data-id="${item.id}">Удалить из корзины</button>
            </div>
        `;
                cartElement.appendChild(newItem);
            }

            let totalElement = document.createElement('p');
            totalElement.classList.add('total');
            cartElement.appendChild(totalElement);

            let orderButton = document.createElement('button');
            orderButton.classList.add('button');
            orderButton.textContent = 'Оформить заказ';
            cartElement.appendChild(orderButton);

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
    });

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
