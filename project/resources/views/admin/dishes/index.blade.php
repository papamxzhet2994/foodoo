<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    @include('admin.layouts.aside')
    <div class="info">
        <h1>Список магазинов</h1>
        <table>
            <thead>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Описание</th>
                <th>Ресторан</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dishes as $dish)
                <tr>
                    <td>{{ $dish->name }}</td>
                    <td>{{ $dish->price }}</td>
                    <td>{{ $dish->description }}</td>
                    <td>{{ $dish->restaurant->name }}</td>
                    <td><a href="{{ route('admin.dishes.delete', $dish->id) }}" class="delete">Удалить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
