<title>Создание категории</title>
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    @include('admin.layouts.aside')
    <div class="info">
        <h1 class="title">Добавить категорию</h1>
        <form action="{{ route('admin.categories.create') }}" method="POST">
            @csrf
            <div>
                <label for="name">Название</label>
                <input type="text" name="name" id="name">
            </div>
            <button type="submit">Создать</button>
        </form>
    </div>
</div>
