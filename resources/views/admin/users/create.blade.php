<title>Создание пользователя</title>
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@include('admin.layouts.header')
<div class="container">
    @include('admin.layouts.aside')
    <div class="info">
        <h1 class="title">Создать пользователя</h1>
        <form action="{{ route('admin.create') }}" method="POST">
            @csrf
            <div>
                <label for="first_name">Имя</label>
                <input type="text" name="first_name" id="first_name">
            </div>
            <div>
                <label for="last_name">Фамилия</label>
                <input type="text" name="last_name" id="last_name">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="password_confirmation">Подтвердите пароль</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>
            <div class="checkbox">
                <input type="checkbox" name="is_admin" id="is_admin">
                <p>Будет ли являться пользователь администратором?</p>
            </div>
            <div>
                <button type="submit">Создать</button>
            </div>
        </form>
    </div>
</div>
