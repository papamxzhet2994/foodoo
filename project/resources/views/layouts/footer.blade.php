<style>
    footer {
        background-color: #f0f0f0;
        padding: 20px;
        font-family: Roboto, sans-serif;
        font-size: 14px;
        color: #333;
        line-height: 1.5;
        margin-top: 250px;
    }

    footer .container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
    }

    .footer-logo {
        width: 5%;
    }

    .footer-logo img {
        width: 100%;
        height: auto;
    }

    .footer-links {
        width: 40%;
    }

    .footer-links ul {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .footer-links li {
        width: 50%;
        margin-bottom: 10px;
    }

    .footer-links a {
        text-decoration: none;
        color: #333;
    }

    .footer-links a:hover {
        color: #007bff;
    }

    .footer-social {
        width: 20%;
    }

    .footer-social ul {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .footer-social li {
        margin-right: 10px;
    }

    .footer-social a {
        display: block;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-color: #fff;
        text-align: center;
        line-height: 32px;
        color: #333;
        text-decoration: none;
    }

    .footer-social a:hover {
        background-color: #5263FF;
        color: #fff;
    }

    .footer-copy {
        width: 20%;
        text-align: right;
    }

    .scroll-to-top {
        display: block;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-color: #fff;
        text-align: center;
        line-height: 32px;
        color: #333;
        border: none;
        cursor: pointer;
    }

    .scroll-to-top:hover {
        background-color: #5263FF;
        color: #fff;
    }

    @media screen and (max-width: 768px) {
        footer {
            font-size: 12px;
            line-height: 1.2;
            margin: 0;

        }

        .container {
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: 0 auto;
            padding: 0;
        }

        .footer-logo {
            width: 30%;
            margin-bottom: 10px;

        }

        .footer-links {
            width: 100%;
            margin-bottom: 10px;
        }

        .footer-links ul {
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: 0 auto;
            padding: 0;
        }

        .footer-links ul li {
            width: 100%;
            margin-bottom: 10px;
        }

        .footer-links li {
            width: 100%;
            margin-bottom: 10px;
        }

        .footer-social {
            width: 100%;
            margin-bottom: 10px;

        }

        .footer-social li {
            margin-right: 10px;
        }

        .footer-social ul {
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: 0 auto;
            padding: 0;
        }

        .footer-copy {
            width: 100%;
            text-align: center;
        }
    }
</style>

<footer>
    <div class="container">
        <div class="footer-logo">
            <img src="{{ asset('assets/logo 1.png') }}" alt="FooDoo">
        </div>
        <div class="footer-links">
            <ul>
                <li><a href="#">О нас</a></li>
                <li><a href="#">Контакты</a></li>
                <li><a href="#">Политика конфиденциальности</a></li>
                <li><a href="#">Условия использования</a></li>
            </ul>
        </div>
        <div class="footer-social">
            <ul>
                <li><a href="https://t.me/papamxzhet" target="_blank"><i class="fab fa-telegram"></i></a></li>
                <li><a href="https://vk.com/papamxzhet" target="_blank"><i class="fab fa-vk"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                <li><button onclick="scrollToTop()" class="scroll-to-top"><i class="fas fa-chevron-up"></i></button></li>
            </ul>
        </div>
        <div class="footer-copy">
            <p>© 2024 FooDoo. Все права защищены.</p>
        </div>
    </div>
</footer>
<script>
    function scrollToTop() {
        window.scrollTo({top: 0, behavior: 'smooth'});
    }
</script>
