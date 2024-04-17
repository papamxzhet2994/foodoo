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
                <th>Рейтинг</th>
                <th>Описание</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($shops as $shop)
                <tr>
                    <td>{{ $shop->name }}</td>
                    <td>{{ $shop->rating }}</td>
                    <td>{{ $shop->description }}</td>
                    <td><a href="{{ route('admin.shops.delete', $shop->id) }}" class="delete">Удалить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
