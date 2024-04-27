<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@include('admin.layouts.header')
    <form method="POST" action="{{ route('admin.delete', $user->id) }}" class="delete-form">
        <h1>Подтвердите действие</h1>
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <p>Вы уверены, что хотите удалить пользователя <span>{{ $user->last_name . ' ' . $user->first_name }}</span>?</p>
        <button type="submit">Удалить</button>
        <button type="button" onclick="window.history.back()">Отмена</button>
    </form>
