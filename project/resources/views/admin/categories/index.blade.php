<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    @include('admin.layouts.aside')
    <div class="info">
        <h1>Список категорий</h1>
        <table>
            <thead>
            <tr>
                <th>Название</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td><a href="{{ route('admin.products.delete', $category->id) }}" class="delete">Удалить</a></td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
