<title>Добавление блюда</title>
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    @include('admin.layouts.aside')
    <div class="info">
        <h1 class="title">Добавить блюдо</h1>
        <form action="{{ route('admin.dishes.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Название</label>
                <input type="text" name="name" id="name">
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
                <label for="restaurant_id">Ресторан</label>
                <select name="restaurant_id" id="restaurant_id">
                    @foreach($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="restaurant_category">Категории</label>
                <select name="restaurant_category" id="restaurant_category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Создать</button>
        </form>
    </div>
</div>
