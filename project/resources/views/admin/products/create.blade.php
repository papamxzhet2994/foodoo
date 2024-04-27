<title>Создание товара магазина</title>
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    @include('admin.layouts.aside')
    <div class="info">
        <h1 class="title">Добавить товары</h1>
        <form action="{{ route('admin.products.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Название</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="rating">Рейтинг</label>
                <input type="number" name="rating" id="rating" min="0" max="5" step="0.1">
            </div>
            <div>
                <label for="image">Изображение</label>
                <input type="file" name="image" id="image">
            </div>
            <div>
                <label for="description">Описание</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <div>
                <label for="price">Цена</label>
                <input type="number" name="price" id="price">
            </div>
            <div>
                <label for="weight">Вес</label>
                <input type="number" name="weight" id="weight">
            </div>
            <div>
                <label for="category">Категория</label>
                <select name="category" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="shop">Магазин</label>
                <select name="shop" id="shop">
                    @foreach($shops as $shop)
                        <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Создать</button>
        </form>
    </div>
</div>
