<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Подтверждение Email</title>
    <style>
        /* Здесь вы можете добавить свои стили */
    </style>
</head>
<body>
<div class="container">
    <h1>Подтверждение Email</h1>
    <p>Спасибо за регистрацию! Перед тем как начать, пожалуйста, проверьте свою электронную почту, нажав на ссылку, которую мы только что отправили вам. Если вы не получили письмо, мы с удовольствием отправим вам другое.</p>

    @if (session('status') == 'verification-link-sent')
        <p>Новая ссылка для подтверждения была отправлена на адрес электронной почты, указанный при регистрации.</p>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Отправить новую ссылку для подтверждения</button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Выйти</button>
    </form>
</div>
</body>
</html>
