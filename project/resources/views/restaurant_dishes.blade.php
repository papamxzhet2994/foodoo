@include('layouts.header')
<script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>
<style>
    * {
        font-family: Roboto, sans-serif;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 350px;
        text-align: center;
        font-family: Roboto, sans-serif;
        border-radius: 15px;
        padding: 10px;
        margin: auto auto 10px;
    }

    .card img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .card h1 {
        font-size: 20px;
        text-align: left;
    }

    .card p {
        font-size: 14px;
        text-align: left;
    }

    .card button {
        border: none;
        outline: 0;
        padding: 12px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
        border-radius: 10px;
        transition: 0.3s ease;
    }

    .card button:hover {
        opacity: 0.7;
    }


</style>
{{--@if ('cart' && ($cart) > 0)--}}
{{--    <dialog>--}}
{{--    <p>Здесь нет товаров что вы добавляли ранее</p>--}}
{{--    <button class="button" onclick="window.location.href='/order'">Оформить заказ</button>--}}
{{--    </dialog>--}}
{{--@endif--}}

<title>{{ $restaurant->name }}</title>
<a href="{{ route('home') }}">Назад</a>
<h1>{{ $restaurant->name }}</h1>
<div class="container">
<section class="restaurant-info">
    <div class="restaurant-image">
        <img src="{{ asset('storage/' . $restaurant->image) }}">
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
</div>
<h2>Категории</h2>
<aside class="categories">
    <ul>
        @foreach($categories as $category)
            <li><a href="#">{{ $category->name }}</a></li>
        @endforeach
    </ul>

        <h2 class="cart-title">Корзина</h2>
    @php
        $restaurantCart = session()->get('restaurantCart', []);
    @endphp

    @if(count($restaurantCart) > 0)
        @foreach($restaurantCart as $id => $details)
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
            foreach($restaurantCart as $id => $details) {
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



<h2>Меню</h2>
@if ($dishes->count() > 0)
    @foreach($dishes as $dish)
        <div class="card">
            <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
            <h1>{{ $dish->name }}</h1>
            <p>{{ $dish->description }}</p>
            <p>{{ $dish->price }}</p>

            <button class="button add-to-cart" data-id="{{ $dish->id }}">Добавить в корзину</button>
        </div>
    @endforeach
@else
    <h1>Товары отсутствуют</h1>
@endif

<script>
    // Обработчик для добавления товара в корзину
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            let dish_id = this.dataset.id;
            fetch('/add-to-cart/' + dish_id)
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

    function updateCart(restaurantCart) {
        let cartArray = Object.values(restaurantCart);

        let cartElement = document.querySelector('.bucket');
        cartElement.innerHTML = '';

        let cartTitle = document.createElement('h2');
        cartTitle.textContent = 'Корзина';
        cartElement.appendChild(cartTitle);


        for (let item of cartArray) {
            let newItem = document.createElement('div');
            newItem.classList.add('restaurantCart');
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
</script>
