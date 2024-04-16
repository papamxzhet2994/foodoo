<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <script src="https://kit.fontawesome.com/ac5a05e218.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
<div class="container">
    <h1>Профиль</h1>
    <aside class="aside">
        <div class="actions">
            <a href="#" onclick="showUserData()">Данные пользователя</a>
            <a href="#" onclick="showSavedAddresses()">Сохраненные адреса</a>
            <a href="#" onclick="showOrderHistory()">История заказов</a>
            <a href="#" onclick="showChangePassword()">Изменить профиль</a>
            @if (auth()->user()->is_admin)
                <a href="{{ route('admin') }}">Админ панель</a>
            @endif
            <div class="logout">
                <a href="{{ route('logout') }}" class="logout-link"><i class="fas fa-sign-out-alt"></i> Выход из аккаунта</a>
            </div>
        </div>
    </aside>
    <div class="additionally-info">
        <div class="profile" id="userData">
            <div class="profile-data">
                <h2>Данные пользователя</h2>
                <h1 class="username">{{ auth()->user()->last_name . ' ' . auth()->user()->first_name }}</h1>
                <p class="email">{{ auth()->user()->email }}</p>
                <div class="registration-date">
                    <p>Дата регистрации: {{ auth()->user()->created_at->format('d.m.Y') }}</p>
                </div>
            </div>
        </div>
        <div class="profile hidden" id="savedAddresses">
            <div class="profile-saved-addresses">
                <h2>Сохраненные адреса</h2>
                <p>Ваши сохраненные адреса будут отображаться здесь.</p>
            </div>
        </div>

        <div class="profile hidden" id="orderHistory">
            <div class="profile-order-history">
                <h2>История заказов</h2>

                @if ($orders && count($orders) > 0)
                    @foreach($orders as $order)
                        <div class="order">
                            <h3>Заказ №{{ $order->id }}</h3>
                            <p>Дата: {{ $order->created_at->format('d.m.Y') }}</p>
                            <p>Общая стоимость: {{ $order->total_price }} ₽</p>
                            <a href="{{ route('orders.info', $order->id) }}" class="more">Подробнее</a>
                        </div>
                    @endforeach
                @else
                    <p>У вас пока нет заказов.</p>
                @endif
            </div>
        </div>

        <div class="profile hidden" id="changePassword">
            <div class="profile-change-password">
                <h2>Изменение данных пользователя</h2>
                <iframe src="https://lottie.host/embed/b39c665b-fa34-4a3e-98f3-7c9281c72da1/HpWZJPzrNq.json" frameborder="0"></iframe>
                <a class="change-password" href="{{ route('profile.update') }}">Изменить профиль</a>
            </div>
        </div>

    </div>
</div>
<a href="/" class="back"><i class="fas fa-chevron-left"></i> Назад</a>
<script>
    function showUserData() {
        hideAllSections();
        document.getElementById('userData').classList.remove('hidden');
    }

    function showSavedAddresses() {
        hideAllSections();
        document.getElementById('savedAddresses').classList.remove('hidden');
    }

    function showOrderHistory() {
        hideAllSections();
        document.getElementById('orderHistory').classList.remove('hidden');
    }

    function showChangePassword() {
        hideAllSections();
        document.getElementById('changePassword').classList.remove('hidden');
    }

    function hideAllSections() {
        const sections = document.querySelectorAll('.profile');
        sections.forEach(function(section) {
            section.classList.add('hidden');
        });
    }
</script>

</body>
</html>
