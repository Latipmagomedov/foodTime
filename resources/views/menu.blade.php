@extends('template')

@section('title') меню с блюдами @endsection

@section('content')

    <main>
        <section class="menu menu-page" id="products">
            <div class="container">
                <h2 class="menu__title">Меню</h2>

                <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                    <div class="menu__categories swiper-wrapper">
                        <a href="/menu"
                            class="{{ Request::path() == 'menu' ? 'menu__category_active' : '' }} menu__category swiper-slide">
                            Все
                        </a>
                        @foreach ($categories as $category)
                            <a href="/menu/{{ $category->code }}"
                                class="{{ Request::path() == 'menu/' . $category->code ? 'menu__category_active' : '' }} menu__category swiper-slide">
                                {{ $category->title }}
                            </a>
                        @endforeach
                    </div>
                    <div class="swiper-button-next swiper-button"></div>
                    <div class="swiper-button-prev swiper-button"></div>
                </div>

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
                
                <div class="menu__pag">{{$products->links()}}</div>
            </div>
        </section>
    </main>

    <a href="#top" class="top-btn"></a>
    <button class="open-cart" data-popup="cart">
        <img src="/assets/image/icons/cart.svg" alt="cart" data-popup="cart" />
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

    <div class="popup popup-order-cart">
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

    <script src="/assets/libs/swiper/swiper.min.js"></script>
    <script src="/assets/js/slider-settings.js"></script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/scroll.js"></script>
    <script src="/assets/js/popup.js"></script>
    {{-- <script src="assets/js/filter.js"></script> --}}
    <script src="/assets/js/product.js"></script>
    <script src="/assets/js/cart.js"></script>
@endsection
