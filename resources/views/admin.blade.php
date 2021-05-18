@extends('template-admin')

@section('title') admin panel @endsection

@section('content')
    <div id="add-food" class="add-food tab tab-active">
        <div class="container">
            <section class="add-food">
                <div class="add-food__title">Добавление нового блюда</div>
                  <form method="POST" action="{{ route('addproduct') }}" enctype="multipart/form-data"
                    class="add-food__form">
                    @csrf
                    <div class="box add-food__file-inp">
                        <input required type="file" name="image" id="file-1" class="inputfile inputfile-1"
                            data-multiple-caption="{count} files selected" multiple />
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                viewBox="0 0 20 17">
                                <path
                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                            </svg>
                            <span>Выбрать изображение&hellip;</span></label>
                    </div>
                    <input required name="title" class="add-food__title-inp" type="text"
                        placeholder="{{ $errors->has('title') ? $errors->first('title') : 'Название блюда' }}"
                        style="{{ $errors->has('title') ? 'border: solid 2px #ff0000;' : '' }}" />
                    <input required name="description" class="add-food__desc-inp" type="text" placeholder="Описание блюда" />
                    <input required name="cost" class="add-food__cost-inp" type="text"
                        placeholder="{{ $errors->has('cost') ? $errors->first('cost') : 'Цена блюда' }}"
                        style="{{ $errors->has('cost') ? 'border: solid 2px #ff0000;' : '' }}" />
                    <select required name="code" class="add-food__category">
                        <option disabled>Категории продуктов</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->code }}">Категория: {{ $category->title }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="add-food__btn">Опубликовать</button>
                </form>
            </section>
        </div>

        <section class="menu" id="products">
            <div class="container">
                <h2 class="menu__title">Все блюда</h2>

                <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                    <div class="menu__categories swiper-wrapper">
                        <a href="/admin"
                            class="{{ Request::path() == 'admin' ? 'menu__category_active' : '' }} menu__category swiper-slide">
                            Все
                        </a>
                        @foreach ($categories as $category)
                            <a href="/admin/{{ $category->code }}"
                                class="{{ Request::path() == 'admin/' . $category->code ? 'menu__category_active' : '' }} menu__category swiper-slide">
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
                                    <a href="{{ route('removeproduct', $product->id) }}"
                                        class="menu__product-btn">удалить</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="menu__pag">{{ $products->links() }}</div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/custom-file-input.js"></script>
    <script src="/assets/js/popup.js"></script>
    <script src="/assets/js/tab.js"></script>
    <script src="/assets/js/filter.js"></script>
    <script src="/assets/libs/swiper/swiper.min.js"></script>
    <script src="/assets/js/slider-settings.js"></script>
@endsection
