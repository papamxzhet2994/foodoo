<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/order.css') }}" rel="stylesheet">
    <title>Оформление заказа</title>
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
                    <img src="{{asset('storage/' . $product->image ) }}" alt="{{ $product->name }}">
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
            <iframe src="https://lottie.host/embed/f4a49303-1c90-4763-86d6-301be7eac2ac/r6xguvQb3k.json" frameborder="0" width="300" height="300" style="margin: 0 auto; display: block;"></iframe>
            <a href="/" class="back-link" style="text-align: center">Вернуться к покупкам</a>
        @endif
    </div>

    <form action="{{ route('apply.promocode') }}" method="POST" id="promo-form">
        @csrf
        <label for="promocode">Промокод:</label>
        <div class="promocode">
            <input type="text" id="promocode" name="promocode">
            <button class="access-promo" type="button" onclick="applyPromocode()">Применить</button>
        </div>
    </form>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
{{--        <input type="hidden" name="discount_amount" value="{{ $discountAmount }}">--}}
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
        <div id="map" style="width: 100%; height: 300px"></div>
        <input type="hidden" id="address" name="address">


        <label for="phone">Телефон:</label>
        <input type="text" id="phone" name="phone" required>

        <div class="total">
            <span>Итого:</span>
            <span>{{ $total }} руб.</span>
        </div>

        <div class="total">
            <input type="hidden" name="total" value="{{ $total }}">
        </div>
        @if (count($products) > 0)
            <input type="submit" value="Оформить заказ">
        @else

            <a href="/" class="back-link" style="text-align: center">Вернуться к покупкам</a>
        @endif
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
<script>
    function getAddressFromCoords(coords) {
        fetch(`https://geocode-maps.yandex.ru/1.x/?apikey=ваш_ключ&format=json&geocode=${coords}`)
            .then(response => response.json())
            .then(data => {
                const address = data.response.GeoObjectCollection.featureMember[0].GeoObject.name;
                document.getElementById('address').value = address;
            })
            .catch(error => console.error('Error getting address from coordinates:', error));
    }
</script>

</body>
<script>
    document.getElementById('phone').addEventListener('input', function() {
        this.value = this.value.replace(/[^\d]/g, '');
        if (this.value.length < 10) {
            this.value = this.value.slice(0, 10);
        }

        if (this.value.length === 10) {
            this.value = `+7${this.value}`;
        }
    });


    function applyPromocode() {
        const promocodeInput = document.getElementById('promocode');
        const enteredPromocode = promocodeInput.value.trim();

        if (!enteredPromocode) {
            Toastify({
                text: 'Пожалуйста, введите промокод',
                duration: 3000,
                gravity: 'bottom',
                backgroundColor: 'linear-gradient(to right, #ff416c, #ff4b2b)',
            }).showToast();
            return;
        }

        fetch('/apply-promocode', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ promocode: enteredPromocode })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Toastify({
                        text: 'Промокод применен! Общая сумма обновлена.',
                        duration: 3000,
                        gravity: 'bottom',
                        backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)',
                    }).showToast();

                    const originalTotal = parseFloat(document.querySelector('.total span:last-child').textContent);
                    const discountAmount = data.discount_amount;
                    const discountedTotal = originalTotal - discountAmount;
                    document.querySelector('.total span:last-child').textContent = discountedTotal.toFixed(2) + ' ₽';

                    promocodeInput.disabled = true;
                    document.querySelector('.access-promo').disabled = true;
                } else {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        gravity: 'bottom',
                        backgroundColor: 'linear-gradient(to right, #ff416c, #ff4b2b)',
                    }).showToast();
                }

            })
            .catch(error => {
                console.error('Error applying promo code:', error);
                Toastify({
                    text: 'Произошла ошибка при применении промокода.',
                    duration: 3000,
                    gravity: 'bottom',
                    backgroundColor: 'linear-gradient(to right, #ff416c, #ff4b2b)',
                }).showToast();
            });
    }

</script>
</html>
