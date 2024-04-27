<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    @include('admin.layouts.aside')
    <div class="info">
        <h1>Список ресторанов</h1>
        <table>
            <thead>
            <tr>
                <th>Название</th>
                <th>Рейтинг</th>
                <th>Описание</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($restaurants as $restaurant)
                <tr>
                    <td>{{ $restaurant->name }}</td>
                    <td>{{ $restaurant->rating }}</td>
                    <td>{{ $restaurant->description }}</td>
                    <td><a href="{{ route('admin.restaurants.delete', $restaurant->id) }}" class="delete">Удалить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
