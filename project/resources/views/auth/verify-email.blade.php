<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подтверждение Email</title>
    <style>
        * {
            font-family: 'Roboto', sans-serif;

        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #eaeaea;
            border-radius: 15px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            background-color: #5263FF;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            line-height: 1.5;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #BD4932;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 0 auto;
            display: block;
            font-weight: bold;
        }

        button:hover {
            background-color: #9e3a26;
        }

        hr {
            border: none;
            border-top: 1px solid #cccccc;
            margin: 20px 0;
        }
        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }

            h1 {
                font-size: 24px;
            }
            p {
                font-size: 16px;
            }

        }

    </style>
</head>
<body>
<div class="container">
    <h1>Подтверждение Email</h1>
    <h2>Спасибо за регистрацию!</h2>
    <p>Перед тем как начать, пожалуйста, проверьте свою электронную почту, нажав на ссылку, которую мы только что отправили вам. Если вы не получили письмо, проверьте папку «Спам» или попробуйте еще раз.</p>
    <hr>
    <p>После подтверждения вашей электронной почты вы можете закрыть эту страницу</p>
    @if (session('status') == 'verification-link-sent')
        <p>Новая ссылка для подтверждения была отправлена на адрес электронной почты, указанный при регистрации.</p>
    @endif

    <a href="{{ route('login') }}"><button type="button">Войти в аккаунт</button></a>


</div>
</body>
</html>
