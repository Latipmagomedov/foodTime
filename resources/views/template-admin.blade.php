<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#0b1419" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <title>FoodTime - @yield('title')</title>
    <link rel="stylesheet" href="/assets/libs/swiper/swiper.min.css" />
    <link rel="stylesheet" href="/assets/style/css/main.css" />
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
                    <a href="/admin" class="header__link">Добавить блюдо</a>
                    <a href="{{ route('admin-add-category') }}" class="header__link">Добавить
                        категорию</a>
                    <a href="{{ route('admin-orders') }}" class="header__link">Заявки</a>
                    <a href="{{ route('signout') }}" class="header__link">Выйти</a>
                </div>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <h2>FoodTime - 2021 from <a href="#">Latip</a></h2>
    </footer>

    @yield('scripts')
</body>

</html>
