<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#0b1419" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <title>FoodTime - вход в админку</title>
    <link rel="stylesheet" href="assets/style/css/main.css" />
</head>

<body>
    <section class="login">
        <div class="container">
            <form method="POST" action="{{ route('signin') }}" class="login__form">
                @csrf
                <div class="login__title">Вход</div>
                <input class="login__inp" type="text" name="login" placeholder="{{ $errors->has('login') ? $errors->first('login') : 'Логин' }}" style="{{ $errors->has('login') ? 'border: solid 2px #ff0000;' : '' }}">
                <input class="login__inp" type="password" name="password" placeholder="{{ $errors->has('password') ? $errors->first('password') : 'Пароль' }}" style="{{ $errors->has('password') ? 'border: solid 2px #ff0000;' : '' }}" >
                <button type="submit" class="login__btn">Войти</button>
            </form>
        </div>
    </section>
</body>

</html>
