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
    <title>Редактирование профиля</title>
    <link rel="stylesheet" href="{{ asset('css/profileEdit.css') }}">
</head>
<body>
<aside class="aside">
    <h1>Foodoo</h1>
    <iframe src="https://lottie.host/embed/fd497dc4-5e02-49ae-bff1-a97e74d2e0c2/ZGKlzpOYVL.json"></iframe>
</aside>
<div class="form">
    <a href="{{ route('profile') }}" class="back"><i class="fas fa-arrow-left"></i> Назад</a>
    <form action="{{ route('profile.update') }}" method="POST" class="form">
        <h1>Редактирование профиля</h1>
        @csrf
        <label for="first_name" style="position: relative">Имя
            <input type="text" id="first_name" name="first_name" value="{{ auth()->user()->first_name }}" required>
        </label>
        <label for="last_name" style="position: relative;">Фамилия
            <input type="text" id="last_name" name="last_name" value="{{ auth()->user()->last_name }}" required>
        </label>
        <label for="email" style="position: relative;">Email
            <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
        </label>
        <label for="password" style="position: relative;">
            Пароль
            <input type="password" id="password" name="password">
            <i class="fas fa-eye" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
        </label>

        <label for="password_confirmation" style="position: relative;">Подтверждение пароля
            <input type="password" id="password_confirmation" name="password_confirmation">
            <i class="fas fa-eye" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
        </label>
        <button type="submit">Сохранить</button>
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


