<script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>
<style>
    .container {
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    .back-link {
        display: block;
        margin-bottom: 20px;
        color: #333;
        text-decoration: none;
        font-size: 18px;
        transition: color 0.3s ease;
        font-family: Roboto, sans-serif;
    }

    .back-link:hover {
        color: #5263FF;
    }

    .buttons-container {
        display: flex;
        justify-content: space-between;
    }

    .back-link i {
        margin-right: 5px;
    }
</style>
<div class="container">
    <h1>Спасибо за ваш отзыв!</h1>
    <p>Вы также можете посмотреть отзывы других пользователей</p>
    <div class="buttons-container">
        <a href="{{ route('home') }}" class="back-link"><i class="fas fa-chevron-left"></i>Вернуться на главную</a>
        <a href="{{ route('reviews.show') }}" class="back-link">Посмотреть отзывы</a>
    </div>
</div>
