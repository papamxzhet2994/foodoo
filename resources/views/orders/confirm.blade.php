<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Подтверждение заказа</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .confirmation-message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #BD4932;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #9e3a26;
        }
    </style>
</head>
<body>

<div class="container">
{{--    <iframe src="https://lottie.host/embed/df7a0181-07eb-4d20-a81d-5fa5bae08f15/VSSpWi5i0G.json"></iframe>--}}
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    <dotlottie-player src="https://lottie.host/df7a0181-07eb-4d20-a81d-5fa5bae08f15/VSSpWi5i0G.json" background="transparent" speed="1" style="width: 300px; height: 300px; margin: 0 auto" autoplay></dotlottie-player>
    <h2 class="confirmation-message">Ваш заказ успешно оформлен.</h2>
    <p class="confirmation-message">
        <br>Курьер свяжется с вами в ближайшее время.
        <br>Спасибо за покупку!</p>
    <a href="/" class="back-link">Вернуться на главную страницу</a>
</div>
</body>
</html>
