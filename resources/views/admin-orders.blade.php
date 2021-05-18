@extends('template-admin')

@section('title') admin panel @endsection

@section('content')
    <section class="orders">
        <div class="container">
            <div class="orders__title">Все заказы</div>
            <div class="orders__content"></div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/orders.js"></script>
@endsection
