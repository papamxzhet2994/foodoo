<script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
<a href="{{ route('profile') }}" class="back-link"><i class="fas fa-chevron-left"></i> Назад</a>
<h1>Оставить отзыв</h1>
<form action="{{ route('reviews.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <label for="title">Заголовок:</label>
    <input type="text" id="name" name="name" required>

    <label for="review">Описание:</label>
    <textarea id="review" name="review" required></textarea>

    <label for="rating">Оценка:</label>
    <input type="number" id="rating" name="rating" min="1" max="5" required>

    <label for="image">Изображение:</label>
    <input type="file" id="image" name="image">

    <button type="submit">Отправить</button>
</form>
