<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
    <title>Отзывы</title>
</head>
<body>
<a href="{{ route('home') }}" class="back-link"><i class="fas fa-chevron-left"></i> Назад</a>

<h1>Отзывы</h1>

<form action="{{ route('reviews.show') }}" method="POST">
    @csrf
    <section class="reviews">
    @foreach($reviews as $review)
        <div class="review">
            <h2>{{ $review->name }}</h2>
            <p>{{ $review->review }}</p>
            <div class="rating">
                <i class="fas fa-star"></i>
                <p>{{ $review->rating }}</p>
            </div>
            <img src="{{ asset('storage/' . $review->image) }}" alt="{{ $review->name }}">
        </div>
    @endforeach
    </section>
</form>
</body>
</html>

