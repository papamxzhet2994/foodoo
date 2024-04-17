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
                <th>Вес</th>
                <th>Магазин</th>
                <th>Категория</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->weight }}</td>
                    <td>{{ $product->shop->name }}</td>
                    @foreach($categories as $category)
                        @if($product->category_id == $category->id)
                            <td>{{ $category->name }}</td>
                        @endif
                    @endforeach
                    <td><a href="{{ route('admin.products.delete', $product->id) }}" class="delete">Удалить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
