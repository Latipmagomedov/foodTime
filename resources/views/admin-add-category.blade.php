@extends('template-admin')

@section('title') admin panel @endsection

@section('content')
    <section class="add-category">
        <div class="container">
            <form method="POST" action="{{ route('add-category') }}" class="add-category__form">
                @csrf
                <input name="title" required type="text" class="add-category__inp" placeholder="Название категории">
                <input name="code" required type="text" class="add-category__inp" placeholder="Название на английском">
                <button type="submit" class="add-category__btn">Добавить категорию</button>
            </form>
            <div class="add-category__categories">
                @foreach ($categories as $category)
                    <div class="add-category__category">
                        <p>{{ $category->title }}</p>
                        <a href="{{ route('remove-category', $category->id) }}">Удалить</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="/assets/js/script.js"></script>
@endsection
