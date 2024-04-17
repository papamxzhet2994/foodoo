<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<form method="POST" action="{{ route('admin.dishes.delete', $dish->id) }}" class="delete-form">
    <h1>Подтвердите действие</h1>
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <p>Вы уверены, что хотите удалить магазин <span>{{ $dish->name }}</span>?</p>
    <button type="submit">Удалить</button>
    <button type="button" onclick="window.history.back()">Отмена</button>
</form>
