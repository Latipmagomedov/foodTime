@extends('template')

@section('title') главная @endsection

@section('content')

    <main>
        <section class="home">
            <div class="home__filter"></div>
            <div class="container">
                <div class="home__content">
                    <p class="home__subtitle">По самым выгодным ценам</p>
                    <h1 class="home__title">Еда с доставкой в Махачкале и Каспийске</h1>
                    <a href="{{ route('menu') }}" class="home__btn">Заказать</a>
                </div>
            </div>
        </section>

        <section class="menu" id="new">
            <div class="container">
                <h2 class="menu__title">Новинки</h2>

                <div class="menu__products">
                    @foreach ($products as $product)
                        <div class="menu__product" data-category="rolls">
                            <img src="{{ Storage::url($product->image) }}" alt="MyPizza" class="menu__product-image" />
                            <h3 class="menu__products-title">{{ $product->title }}</h3>
                            <p class="menu__products-desc">{{ $product->description }}</p>
                            <div class="menu__product-footer">
                                <p class="menu__product-cost">
                                    <span class="product-cost">{{ $product->cost }}</span> ₽
                                </p>
                                <div class="menu__product-btns">
                                    <button class="menu__product-btn" data-popup="popup-order">
                                        Заказать
                                    </button>
                                    <button class="menu__product-add-cart"></button>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

                <a href="{{ route('menu') }}" class="menu__all-btn">Смотреть больше</a>
            </div>
        </section>

        <section class="about" id="about">
            <div class="about__bg"></div>
            <div class="container">
                <div class="about__content">
                    <h2 class="about__title">О нас</h2>
                    <p class="about__desc">
                        Доставим вам горячую пиццу менее чем за час или пицца бесплатно.
                        Мы готовим пиццу только из свежих продуктов. Каждый день мы
                        покупаем свежие овощи, грибы и мясо.
                    </p>
                </div>
            </div>
        </section>

        <section class="contacts" id="contacts">
            <div class="container">
                <h2 class="contacts__title">Контакты</h2>
                <div class="contacts__content">
                    <div class="contacts__map">
                        <div id="map"></div>
                    </div>
                    <div class="contacts__address">
                        <div class="contacts__address-address">
                            <div class="contacts__address-title">Адрес</div>
                            <div class="contacts__address-sub">
                                Г. Махачкала, Респ. Дагестан, 367008
                            </div>
                        </div>
                        <div class="contacts__address-address">
                            <div class="contacts__address-title">Телефон</div>
                            <div class="contacts__address-sub">+7 (964) 019-08-62</div>
                        </div>
                        <div class="contacts__address-address">
                            <div class="contacts__address-title">Социальные сети</div>
                            <div class="contacts__address-social">
                                <a href="#"><img src="assets/image/social-icon/instagram.svg" alt="instagram" /></a>
                                <a href="#"><img src="assets/image/social-icon/facebook.svg" alt="facebook" /></a>
                                <a href="#"><img src="assets/image/social-icon/gmail.svg" alt="mail" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <a href="#top" class="top-btn"></a>

    <button class="open-cart" data-popup="cart">
        <img src="assets/image/icons/cart.svg" alt="cart" data-popup="cart" />
        <span data-popup="cart">Корзина</span>
    </button>

    <div class="popup popup-good">
        <div class="popup-order__wrapper">
            <div class="popup-order__content">
                <div class="popup-close">
                    <p>+</p>
                </div>
                <div class="popup-order__title">Заказ отправлен</div>
            </div>
        </div>
    </div>

    <div class="popup popup-err">
        <div class="popup-order__wrapper">
            <div class="popup-order__content">
                <div class="popup-close">
                    <p>+</p>
                </div>
                <div class="popup-order__title">Ошибка. Повторите снова</div>
            </div>
        </div>
    </div>

    <div class="popup-order">
        <div class="popup-order__wrapper">
            <div class="popup-order__content">
                <div class="popup-close">
                    <p>+</p>
                </div>
                <div class="popup-order__title">Оформление заказа</div>

                <div class="popup-order__text">
                    <p class="popup-order__desc">
                        Мы доставим вам заказ в короткие сроки
                    </p>
                    <img class="popup-order__image" src="" alt="product" />
                    <h2 class="popup-order__name"></h2>
                    <p class="popup-order__cost"></p>
                </div>

                <form method="POST" class="popup-order__form order-form">
                    @csrf
                    <input name="username" required type="text" placeholder="Имя" />
                    <input name="tel" required type="number" placeholder="Номер телефона без +" />
                    <input name="address" required type="text" placeholder="Ваш адрес" />
                    <button type="submit" class="popup-order__btn">Заказать</button>
                </form>
            </div>
        </div>
    </div>

    <div class="popup-order-cart">
        <div class="popup-order__wrapper">
            <div class="popup-order__content">
                <div class="popup-close">
                    <p>+</p>
                </div>
                <div class="popup-order__title">Оформление заказа</div>

                <div class="popup-order__text">
                    <p class="popup-order__desc">
                        Мы доставим вам заказ в короткие сроки
                    </p>
                </div>

                <form method="POST" class="popup-order__form cart-form">
                    @csrf
                    <input name="username" required type="text" placeholder="Имя" />
                    <input name="tel" required type="number" placeholder="Номер телефона без +" />
                    <input name="address" required type="text" placeholder="Ваш адрес" />
                    <button type="submit" class="popup-order__btn">Заказать</button>
                </form>
            </div>
        </div>
    </div>

    <div class="cart">
        <div class="cart__wrapper">
            <div class="container">
                <div class="popup-close">
                    <p>+</p>
                </div>
                <div class="cart__header">
                    <div class="cart__title">Корзина</div>
                    <button class="cart__btn" data-popup="popup-order-cart">
                        Заказать
                    </button>
                </div>
                <p class="cart__price"><span>0</span> ₽</p>
                <div class="cart__message-title">Здесь пока пусто</div>
                <div class="cart__products"></div>
            </div>
        </div>
    </div>

    <script src="assets/libs/swiper/swiper.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/scroll.js"></script>
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/product.js"></script>
    <script src="assets/js/cart.js"></script>
    <script src="assets/js/map.js"></script>
@endsection
