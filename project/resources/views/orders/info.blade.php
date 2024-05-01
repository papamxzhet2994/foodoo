<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Информация о заказе №{{ $order->id }}</title>
    <script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f3f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 20px;
            background-color: #5263FF;
            color: #fff;
            border-radius: 8px 8px 0 0;
            font-size: 24px;
            font-weight: bold;
        }

        .section {
            padding: 20px;
            margin-top: 20px;
            background-color: #ebf4ff;
            color: #2d3748;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .section h2 {
            font-size: 20px;
            color: #2d3748;
            margin-bottom: 10px;
        }

        .section p, .section ul, .section li {
            font-size: 16px;
            color: #4a5568;
            background-color: #ffffff;
            padding: 10px;
            margin-top: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .section ul {
            list-style-type: none;
            padding: 0;
        }

        .section li {
            margin-bottom: 10px;
        }

        .section li:last-child {
            margin-bottom: 0;
        }

        .total-price {
            text-align: center;
            background-color: #BD4932;
            color: #ffffff;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
            font-size: 20px;
            font-weight: bold;
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

        .review {
            font-size: 16px;
            color: #4a5568;
            background-color: #ffffff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            display: inline-block;
            text-decoration: none;
            transition: color 0.3s ease;
            font-family: Roboto, sans-serif;
        }

        .review i {
            margin-left: 15px;
        }

        .review:hover {
            color: #5263FF;
        }

        @media screen and (max-width: 768px) {
            body {
                padding: 10px;
            }

            .container {
                max-width: 100%;
                margin: 10px auto;
                padding: 10px;
            }

            .header {
                font-size: 20px;
            }

            .section h2 {
                font-size: 18px;
            }

            .section p, .section ul, .section li {
                font-size: 14px;
            }

            .total-price {
                font-size: 18px;
            }

            .back-link {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
<a href="{{ route('profile') }}" class="back-link"><i class="fas fa-chevron-left"></i> Назад</a>

<div class="container">
    <div class="header">Информация о заказе №{{ $order->id }}</div>
    <div class="section">
        <h2>Детали заказа</h2>
        <p>Дата заказа: {{ $order->created_at }}</p>
        <a href="{{ route('reviews.create') }}" class="review">Оставить отзыв <i class="fas fa-chevron-right"></i></a>
    </div>
    <div class="section">
        <h2>Дополнительная информация</h2>
        <p>Имя клиента: {{ $userName }}</p>
        <p>Email клиента: {{ $userEmail }}</p>
        <p>Телефон клиента: {{ $order->phone }}</p>
        <p>Адрес доставки: {{ $order->address }}</p>
    </div>
    <div class="section">
        <h2>Продукты заказа</h2>
        <ul>
            @foreach($orderProducts as $product)
                <li>{{ $product->name }} - {{ $product->price }} руб. - {{ $product->quantity }} шт.</li>
            @endforeach
        </ul>
    </div>
    <div class="total-price">Общая стоимость заказа: {{ $order->total }} руб.</div>
</div>

</body>
</html>



