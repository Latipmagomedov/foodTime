<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#0b1419" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FoodTime - @yield('title')</title>
    <link rel="stylesheet" href="/assets/libs/swiper/swiper.min.css" />
    <link rel="stylesheet" href="/assets/style/css/main.css" />

    <script src="https://api-maps.yandex.ru/2.1/?apikey=ae8b071b-08e0-4172-a2ca-c584acfbad63&lang=ru_RU"
        type="text/javascript"></script>
</head>

<body>
    <div class="preloader">
        <div class="pan-loader">
            <div class="loader"></div>
            <div class="pan-container">
                <div class="pan"></div>
                <div class="handle"></div>
            </div>
            <div class="shadow"></div>
        </div>
    </div>

    <header class="header">
        <div class="container">
            <a href="/"><img src="/assets/image/logo.svg" alt="MyPyzza" class="header__logo" /></a>
            <div class="menu-icon">
                <span></span>
            </div>
            <nav class="header__nav">
                <div class="header__links">
                    <a href="{{ route('menu') }}" class="header__link">Меню с едой</a>
                    <a href="/#new" class="header__link">Новинки</a>
                    <a href="/#about" class="header__link">О нас</a>
                    <a href="/#contacts" class="header__link">Контакты</a>
                    <div class="header__link" data-popup="cart">Корзина</div>
                </div>
                <a href="tel:+79640190862" class="header__tel">+7 (964) 019-08-62</a>
            </nav>
        </div>
    </header>
    @yield('content')

    <footer class="footer">
        <h2>FoodTime - 2021 from <a href="https://www.instagram.com/latip.js">Latip</a></h2>
    </footer>
</body>

</html>
