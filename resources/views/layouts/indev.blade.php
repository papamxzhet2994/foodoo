<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>В разработке</title>
    <style>
        .indev {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .back {
            padding: 10px 20px;
            background-color: #000000;
            color: #ffffff;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            margin-bottom: 50px;
            font-family: 'Roboto', sans-serif;
            transition: background-color 0.3s ease;
        }

        .back:hover {
            background-color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 50px;
            font-size: 40px;
            color: #000;
            font-weight: bold;
            font-family: 'Roboto', sans-serif;
        }

        iframe {
            display: block;
            margin: 0 auto 20px;
            max-width: 100%;
            border: none;
            width: 600px;
            height: 500px;
        }

        @media screen and (max-width: 768px) {
            iframe {
                width: 100%;
                height: auto;
            }

            h1 {
                font-size: 30px;
            }

            .back {
                font-size: 16px;
            }

            .indev {
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .back {
                margin-top: 20px;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
<section class="indev">
    <h1>Извините, но эта страница в разработке</h1>
    <iframe src="https://lottie.host/embed/acc48bf4-762b-4dfe-9e5b-0d6e33838057/FzywPwhoLz.json"></iframe>
    <a href="{{ route('home') }}" class="back">Вернуться назад</a>
</section>
</body>
</html>
