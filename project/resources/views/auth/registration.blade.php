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
    <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
    <title>Регистрация</title>
    <style>

    </style>
</head>
<body>
@if ($errors->any())
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}></p>
            @endforeach
        </ul>
    </div>
@endif
<a href="{{ route('home') }}" class="back"><i class="fas fa-arrow-left"></i> Назад</a>
<aside class="aside">
    <h1>Foodoo</h1>
    <iframe src="https://lottie.host/embed/7ed81789-f735-400a-bdba-2ddaaac9570f/ed8loed0bd.json"></iframe>
</aside>
<div class="form">
<form action="{{ route('registration.create') }}" method="post" class="form">
    <h1>Регистрация</h1>
    @csrf
    <label for="last_name">
        Фамилия
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Введите свою фамилию">
    </label>
    <label for="first_name">
        Имя
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="Введите свое имя">
    </label>
    <label for="email">
        Почта
        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Введите свою почту">
    </label>
    <label for="password" style="position: relative;">
        Пароль
        <input type="password" name="password" id="password" placeholder="Введите свой пароль">
        <i class="fas fa-eye" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
    </label>
    <label for="password_confirmation" style="position: relative;">
        Подтвердите пароль
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Подтвердите свой пароль">
        <i class="fas fa-eye" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
    </label>
    <button type="submit">Зарегистрироваться</button>
    <div class="link-to-login">
        <p>Уже есть аккаунт?<a href="/login">Войти</a></p>
    </div>
</form>
</div>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });

</script>
</body>
</html>
