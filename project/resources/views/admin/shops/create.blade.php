<title>Создание магазина</title>
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    @include('admin.layouts.aside')
    <div class="info">
        <h1 class="title">Создать магазин</h1>
        <form action="{{ route('admin.shops.create') }}" method="POST" enctype="multipart/form-data">
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
            <button type="submit">Создать</button>
        </form>
    </div>
</div>
