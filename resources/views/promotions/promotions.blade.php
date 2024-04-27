<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FooDoo - Акции</title>
    <script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f3f5;
            color: #4a5568;
        }

        .promotions .container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        .promotions h1 {
            color: #BD4932;
            font-size: 2em;
        }

        .promotions img {
            width: 100%;
            border-radius: 10px;
            margin-top: 15px;
        }

        .promotions p {
            color: #fff;
            line-height: 1.6;
        }

        .container p {
            color: #4a5568;
        }

        .promotions .date-container,
        .promotions .promocode-container {
            background-color: #5263FF;
            color: #ffffff;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .promotions time {
            font-weight: bold;
        }

        .promotions .copy-button {
            background-color: #9ca3af;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s ease;
            margin-right: 150px;
        }

        .promotions .copy-button:hover {
            background-color: #cbd5e1;
        }

        .promotions .copy-icon {
            margin-right: 5px;
        }

        .back {
            margin-top: 20px;
            margin-left: 10px;
            color: #4a5568;
            text-decoration: none;
            font-size: 1.2em;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .back i {
            margin-right: 10px;
        }

        .back:hover {
            color: #5263FF;
        }

    </style>
</head>
<body>
<a href="{{ route('home') }}" class="back"><i class="fas fa-chevron-left"></i>Назад</a>
<section class="promotions">
    @foreach($promotions as $promotion)
        <div class="container">
            <h1>{{ $promotion->name }}</h1>
            <img src="{{ $promotion->image }}" alt="{{ $promotion->name }}">
            <p>{{ $promotion->description }}</p>
        </div>

        <div class="date-container">
            <p>Акция будет действовать </p>
            <time>с {{ $promotion->start_date }}</time> - <time> до {{ $promotion->end_date }}</time>
        </div>
        <div class="promocode-container">
            <p>Промокод: {{ $promotion->promocode }}</p>
            <button class="copy-button">
                <i class="fas fa-copy copy-icon"></i>
            </button>
            <p>Скидка: {{ $promotion->discount }}% на весь заказ</p>

        </div>

    @endforeach

</section>

<script>
    const copyButtons = document.querySelectorAll('.copy-button');
    copyButtons.forEach(button => {
        button.addEventListener('click', () => {
            const text = @php echo json_encode($promotion->promocode) @endphp;
            navigator.clipboard.writeText(text);
            button.innerHTML = `<i class="fas fa-check copy-icon"></i>`;
            setTimeout(() => {
                button.innerHTML = `<i class="fas fa-copy copy-icon"></i>`;
            }, 2000);
        });
    });
</script>
</body>
</html>

