<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>1
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Вход</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Roboto, sans-serif;
        }

        .aside {
            width: 40%;
            height: 100vh;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            float: left;
        }

        .aside h1 {
            font-size: 48px;
            color: #000;
            margin-bottom: 20px;
        }

        .aside iframe {
            width: 70%;
            height: 70%;
            border: none;
        }

        .form {
            width: 60%;
            height: 100vh;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        .form form {
            width: 70%;
            height: 75%;
            border-radius: 10px;
            padding: 20px;
            float: right;
        }

        .form h1 {
            font-size: 48px;
            color: #000;
            text-align: center;
            margin-bottom: 20px;
            margin-top: 75px;
        }

        .form label {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 10px;
            display: block;
            width: 80%;
        }

        .form input {
            width: 100%;
            height: 40px;
            border: 2px solid #f0f0f0;
            border-radius: 20px;
            padding: 30px;
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 20px;
            margin-top: 15px;
        }

        .form input:focus {
            outline: #5263FF solid 1px;
            transition: all 0.3s;
        }

        .form button {
            width: 80%;
            height: 50px;
            border: none;
            border-radius: 20px;
            background-color: #000;
            font-size: 1.5rem;
            color: #fff;
            cursor: pointer;
            margin-top: 20px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .form button:hover {
            background-color: #424242;
            transition: all 0.3s;
        }

        .form .link-to-register {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .form .link-to-register p {
            font-size: 1.2rem;
            color: #333;
            font-weight: bold;
        }

        .form .link-to-register a {
            font-size: 1.2rem;
            color: #5263FF;
            text-decoration: none;
            margin-left: 10px;
        }

        .form .link-to-register a:hover {
            text-decoration: underline;
        }

        .back {
            position: absolute;
            top: 20px;
            left: 20px;
            text-decoration: none;
            color: #000;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 5px #ccc;
            transition: all 0.3s ease;
        }

        .back:hover {
            background-color: #f2f2f2;
            color: #5263FF;
        }

    </style>
</head>
<body>
<aside class="aside">
    <h1>Foodoo</h1>
    <iframe src="https://lottie.host/embed/5967b51a-a99c-4325-9fc4-84d26dc47a3f/DVGjwdW0iM.json"></iframe>
</aside>
<div class="form">
    <a href="{{ route('home') }}" class="back"><i class="fas fa-arrow-left"></i> Назад</a>
    <form action="{{ route('auth') }}" method="post" class="form">
        <h1>Авторизация</h1>
        @csrf
        <label for="email">
            Почта
            <input type="email" name="email" id="email" placeholder="Введите свою почту">
        </label>
        <label for="password" style="position: relative;">
            Пароль
            <input type="password" name="password" id="password" placeholder="Введите свой пароль">
            <i class="fas fa-eye" id="togglePassword" style="position: absolute; right: 10px; top: 55%; transform: translateY(-50%); cursor: pointer;"></i>
        </label>
        <button type="submit">Войти</button>
        <div class="link-to-register">
            <p>Нет аккаунта?<a href="/registration">Зарегистрироваться</a></p>
        </div>
    </form>
</div>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });

</script>
</body>
</html>
