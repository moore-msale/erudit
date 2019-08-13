@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row" style="background-image: url({{ asset('images/mainbg.png') }}); background-size: cover; height: 677px;">
        <div class="col-lg-5 col-12" style="padding-left: 10%; padding-top:12%;">
        <h1 class="text-fut-bold font-weight-bold" style="font-size: 35px; line-height: 100%; letter-spacing: 0.05em;">
            Магазины книжной сети «Эрудит» - это волшебный и загадочный мир, который живет в каждой из наших книг.
        </h1>

            <p class="text-fut-light" style="padding-top:5%; font-size: 15px; line-height: 140%;">
                Огромный  ассортимент художественной и детской литературы, бизнеса и психологии, мягкие диваны и удобные места для гостей специально созданы, чтобы каждый человек чувствовал себя у нас в магазинах максимально комфортно.
            </p>
            <a href="/catalog">
            <button class="text-fut-bold font-weight-bold" style="margin-top: 5%; font-size: 16px; line-height: 21px; color:black; padding: 15px 21px; border: 1px #000000 solid; background: transparent;">
                Смотреть все книги
            </button>
            </a>
        </div>
    </div>
    <img class="d-lg-none d-none" style="position: absolute; bottom: -13%; left:25%;" src="{{ asset('images/main-pic.png') }}" alt="">
</div>
<div class="container-fluid">
    <div class="row pb-5">
        <div class="col-12">
            <h2 class="font-weight-bold text-fut-bold h2-text-media d-lg-block d-none" style="line-height: 179px; text-align: center; text-transform: uppercase; color: #CC4B8B;">
                Бестселлеры
            </h2>
            <h2 class="font-weight-bold text-fut-bold h2-text-media d-lg-none d-block" style="line-height: 139px; text-align: center; text-transform: uppercase; color: #CC4B8B;">
                Бестселлеры
            </h2>
            <div class="container-fluid d-lg-block d-none" style="transform: translateY(-140px)">
                <div class="row justify-content-center">
                    <div class="col-12">
                        @include('books.bestsellers')
                    </div>
                </div>
            </div>
            <div class="container-fluid d-lg-none d-block">
                <div class="row justify-content-center">
                    <div class="col-12">
                        @include('books.bestseller-media')
                    </div>
                </div>
            </div>

            <div class="container-fluid" style="padding: 1% 8%">
                <div class="row">
                    <h2 class="font-weight-bold text-fut-bold" style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; padding-right:32px; color:black;">
                        Жанры
                    </h2>
                    <span style="padding-top: 10px; font-size: 16px; line-height: 21px; text-align: center; text-decoration-line: underline;">
                        <a href="" style=" color: #CC4B8B;">
                        Смотреть все книги
                            </a>
                    </span>
                </div>
                <div class="row justify-content-center">
                            <a class="cat-btn mx-lg-2 mt-3 col-lg-2 col-6 py-lg-4 text-center font-weight-bold text-fut-light" style="background-image: url({{ asset('images/border-tab.png') }}); background-size: 100% 100%; border:0px; background-color: transparent; font-size:18px; line-height: 120%; color:black;" href="#"  aria-controls="" aria-selected="true">фантастика</a>
                            <a class="cat-btn mx-lg-2 mt-3 col-lg-2 col-6 py-lg-4 text-center font-weight-bold text-fut-light" style="background-image: url({{ asset('images/border-tab.png') }}); background-size: 100% 100%; border:0px; background-color: transparent; font-size:18px; line-height: 120%; color:black;" href="#"  aria-controls="" aria-selected="true">детективы и боевики</a>
                            <a class="cat-btn mx-lg-2 mt-3 col-lg-2 col-6 py-lg-4 text-center font-weight-bold text-fut-light" style="background-image: url({{ asset('images/border-tab.png') }}); background-size: 100% 100%; border:0px; background-color: transparent; font-size:18px; line-height: 120%; color:black;" href="#"  aria-controls="" aria-selected="true">проза</a>
                            <a class="cat-btn mx-lg-2 mt-3 col-lg-2 col-6 py-lg-4 text-center font-weight-bold text-fut-light" style="background-image: url({{ asset('images/border-tab.png') }}); background-size: 100% 100%; border:0px; background-color: transparent; font-size:18px; line-height: 120%; color:black;" href="#"  aria-controls="" aria-selected="true">любовные романы</a>
                            <a class="cat-btn mx-lg-2 mt-3 col-lg-2 col-6 py-lg-4 text-center font-weight-bold text-fut-light" style="background-image: url({{ asset('images/border-tab.png') }}); background-size: 100% 100%; border:0px; background-color: transparent; font-size:18px; line-height: 120%; color:black;" href="#"  aria-controls="" aria-selected="true">приключения</a>
                            <a class="cat-btn mx-lg-2 mt-3 col-lg-2 col-6 py-lg-4 text-center font-weight-bold text-fut-light" style="background-image: url({{ asset('images/border-tab.png') }}); background-size: 100% 100%; border:0px; background-color: transparent; font-size:18px; line-height: 120%; color:black;" href="#"  aria-controls="" aria-selected="true">детские книги</a>
                            <a class="cat-btn mx-lg-2 mt-3 col-lg-2 col-6 py-lg-4 text-center font-weight-bold text-fut-light" style="background-image: url({{ asset('images/border-tab.png') }}); background-size: 100% 100%; border:0px; background-color: transparent; font-size:18px; line-height: 120%; color:black;" href="#"  aria-controls="" aria-selected="true">поэзия, драматургия</a>
                            <a class="cat-btn mx-lg-2 mt-3 col-lg-2 col-6 py-lg-4 text-center font-weight-bold text-fut-light" style="background-image: url({{ asset('images/border-tab.png') }}); background-size: 100% 100%; border:0px; background-color: transparent; font-size:18px; line-height: 120%; color:black;" href="#"  aria-controls="" aria-selected="true">документальное</a>
                            <a class="cat-btn mx-lg-2 mt-3 col-lg-2 col-6 py-lg-4 text-center font-weight-bold text-fut-light" style="background-image: url({{ asset('images/border-tab.png') }}); background-size: 100% 100%; border:0px; background-color: transparent; font-size:18px; line-height: 120%; color:black;" href="#"  aria-controls="" aria-selected="true">юмор</a>
                            <a class="cat-btn mx-lg-2 mt-3 col-lg-2 col-6 py-lg-4 text-center font-weight-bold text-fut-light" style="background-image: url({{ asset('images/border-tab.png') }}); background-size: 100% 100%; border:0px; background-color: transparent; font-size:18px; line-height: 120%; color:black;" href="#"  aria-controls="" aria-selected="true">религия</a>
                </div>
            </div>

            <div class="container-fluid" style="padding-top:7%;">
                <div class="row justify-content-center text-center">
                    <div class="col-12">
                    <h2 class="font-weight-bold text-fut-bold" style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; padding-right:32px; color:black;">
                        Что почитать
                    </h2>
                    </div>
                    <div class="col-12">

                    </div>

                    <div class="container" style="padding-top: 4%;">
                        <div class="row justify-content-center">
                            <div class="col-11 d-lg-block d-none">
                                @include('books.recomend')
                            </div>
                            <div class="col-11 d-lg-none d-block">
                                @include('books.recomend-media ')
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

    <div class="container-fluid sells-sector" style="background-image: url({{ asset('images/3sector.png') }}); background-size: cover;">
        <div class="row p-lg-5 py-5">
            <div class="col-lg-3 col-12 pr-0">
                <h3 class="text-fut-bold" style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; color: #3154CF;">
                    Акции на сегодня
                </h3>
                <div class="pr-3" style="border-right: 1px solid rgba(255, 255, 255, 0.4);">
                <div class="row p-3 mt-5 mb-4 ml-1 mr-4" style="background-color: white;">
                    <div class="col-8 p-0">
                <div>
                    <p class="text-fut-bold" style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #222222;">
                        Скидка на все канцтовары
                    </p>
                    <p class="text-fut-book mb-0" style="font-size: 14px; line-height: 120%; letter-spacing: 0.05em; color: #888888;">
                        Осталось 2 дня
                    </p>
                </div>
                    </div>
                    <div class="col-4 p-0">
                        <p class="py-4 text-center mb-0" style="border: 1px #E86969 solid; color: #E86969;">
                            -20%
                        </p>
                    </div>
                </div>

                <div class="row p-3 mt-4 mb-4 ml-1 mr-4" style="background-color: white;">
                    <div class="col-8 p-0">
                        <div>
                            <p class="text-fut-bold" style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #222222;">
                                Скидка на все канцтовары
                            </p>
                            <p class="text-fut-book mb-0" style="font-size: 14px; line-height: 120%; letter-spacing: 0.05em; color: #888888;">
                                Осталось 2 дня
                            </p>
                        </div>
                    </div>
                    <div class="col-4 p-0">
                        <p class="py-4 text-center mb-0" style="border: 1px #3154CF solid; color: #3154CF;">
                            -15%
                        </p>
                    </div>
                </div>
                <div class="row p-3 mt-4 mb-4 ml-1 mr-4" style="background-color: white;">
                    <div class="col-8 p-0">
                        <div>
                            <p class="text-fut-bold" style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #222222;">
                                Скидка на все канцтовары
                            </p>
                            <p class="text-fut-book mb-0" style="font-size: 14px; line-height: 120%; letter-spacing: 0.05em; color: #888888;">
                                Осталось 2 дня
                            </p>
                        </div>
                    </div>
                    <div class="col-4 p-0">
                        <p class="py-4 text-center mb-0" style="border: 1px #019D38 solid; color: #019D38;">
                            -5%
                        </p>
                    </div>
                </div>
                <div class="row p-3 mt-4 mb-4 ml-1 mr-4" style="background-color: white;">
                    <div class="col-8 p-0">
                        <div>
                            <p class="text-fut-bold" style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #222222;">
                                Скидка на все канцтовары
                            </p>
                            <p class="text-fut-book mb-0" style="font-size: 14px; line-height: 120%; letter-spacing: 0.05em; color: #888888;">
                                Осталось 2 дня
                            </p>
                        </div>
                    </div>
                    <div class="col-4 p-0">
                        <p class="py-4 text-center mb-0" style="border: 1px #E86969 solid; color: #E86969;">
                            -20%
                        </p>
                    </div>
                </div>
                <div class="row p-3 mt-4 mb-4 ml-1 mr-4" style="background-color: white;">
                    <div class="col-8 p-0">
                        <div>
                            <p class="text-fut-bold" style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #222222;">
                                Скидка на все канцтовары
                            </p>
                            <p class="text-fut-book mb-0" style="font-size: 14px; line-height: 120%; letter-spacing: 0.05em; color: #888888;">
                                Осталось 2 дня
                            </p>
                        </div>
                    </div>
                    <div class="col-4 p-0">
                        <p class="py-4 text-center mb-0" style="border: 1px #019D38 solid; color: #019D38;">
                            -5%
                        </p>
                    </div>
                </div>

                <a class="pl-3 text-fut-bold" href="" style="text-decoration: underline; font-size: 18px;">...еще 3 акции</a>
                </div>
            </div>
            <div class="col-lg-9 col-12 pl-lg-5 pl-4">
                <div class="row">
                    <div class="col-lg-4 col-12 pt-lg-0 pt-5">
                <h3 class="text-fut-bold" style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; color: #222222;">
                    Новинки 2019
                </h3>
                    </div>
                <div class="col-lg-4 col-12 pt-lg-2 pt-4">
                    <a class="text-fut-bold py-3 px-5" href="" style="background: #3154CF; box-shadow: 0px 4px 45px rgba(0, 0, 0, 0.4); color: white;">
                        Смотреть все
                    </a>
                </div>
                </div>
                <div class="row mt-4 pt-2">
                    @foreach($bestsellers as $bestseller)
                        @if($loop->index == 6)
                            @break
                            @endif
                <div class="col-lg-3 col-12 item m-2 p-4 shadow" style="background-color: white; max-width: 259px;">
                    <a href="{{ asset('book/'.$bestseller->id) }}">
                            <div class="" style="height: 65%;">
                                <img class="w-100 h-100" src="{{ asset('storage/'.$bestseller->image) }}" alt="">
                            </div>
                            <h3 class="font-weight-bold text-fut-bold mt-3 pb-5 text-left"
                                style="font-size: 16px; line-height: 110%; letter-spacing: 0.05em; color: #000000;">
                                {{ $bestseller->name }}
                            </h3>
                            <div class="container-fluid row mr-0 pr-0"
                                 style="position: absolute; bottom:3%; color:black;">
                                <div class="col-7 p-0 text-left">
                                    @guest
                                        <span class="text-fut-bold"
                                              style="font-size:18px; letter-spacing: 0.05em;">
                                                            {{ $bestseller->price_retail }} сом
                                                    </span>
                                    @else
                                        <span class="text-fut-bold"
                                              style="font-size:18px; letter-spacing: 0.05em;">
                                                            {{ $bestseller->price_wholesale }} сом
                                                    </span>
                                    @endguest
                                </div>
                                {{--<div class="col-2 p-0">--}}
                                {{--<img class="w-100" src="{{ asset('images/inactivelike.png') }}" alt="">--}}
                                {{--</div>--}}
                                <div class="col-1 p-0"></div>
                                <div class="col-2 p-0">
                                    {{--<img class="w-100" src="{{ asset('images/tobasket.png') }}" alt="">--}}
                                    <i style="color: black;" class="fas fa-cart-plus fa-lg"></i>
                                </div>
                            </div>
                    </a>
                </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="p-lg-5 p-0 pt-lg-5 pt-5">
        <div class="row p-lg-5">
            <div class="col-lg-6 col-12" style="background-image: url({{ asset('images/cat1.png') }}); background-size: cover; height: 294px; box-shadow: 0px 4px 50px rgba(0, 0, 0, 0.25);">
                <div style="position: absolute; bottom: 5%; right: 5%;">
                    <h3 class="text-fut-bold" style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; color: #3154CF;">
                        Товары для
                        <br>
                        творчества
                    </h3>
                    <p class="text-fut-bold" style="font-size: 16px; line-height: 120%; letter-spacing: 0.05em; color: #000000;">
                        Смотреть
                    </p>
                </div>
            </div>

            <div class="col-lg-6 col-12" style="background-image: url({{ asset('images/cat2.png') }}); background-size: cover; background-position: center; height: 294px;box-shadow: 0px 4px 50px rgba(0, 0, 0, 0.25);">
                <div style="position: absolute; bottom: 5%; left: 7%;">
                    <h3 class="text-fut-bold" style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; color: #CC4B8B;">
                        Канцелярские
                        <br>
                        товары
                    </h3>
                    <p class="text-fut-bold" style="font-size: 16px; line-height: 120%; letter-spacing: 0.05em; color: #000000;">
                        Смотреть
                    </p>
                </div>
            </div>

            <div class="col-lg-6 col-12" style="background-image: url({{ asset('images/cat3.png') }}); background-size: cover; height: 294px; box-shadow: 0px 4px 50px rgba(0, 0, 0, 0.25);">
                <div style="position: absolute; top: 5%; right:5%;">
                    <h3 class="text-fut-bold" style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; color: #000000;">
                        Настольные
                        <br>
                        игры
                    </h3>
                    <p class="text-fut-bold" style="font-size: 16px; line-height: 120%; letter-spacing: 0.05em; color: #000000;">
                        Смотреть
                    </p>
                </div>
            </div>

            <div class="col-lg-6 col-12" style="background-image: url({{ asset('images/cat4.png') }}); background-position: center; background-size: cover; height: 294px; box-shadow: 0px 4px 50px rgba(0, 0, 0, 0.25);">
                <div style="position: absolute; top: 5%; left:7%;">
                    <h3 class="text-fut-bold" style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; color: #fefefe;">
                        Учебные
                        <br>
                        материалы
                    </h3>
                    <p class="text-fut-bold" style="font-size: 16px; line-height: 120%; letter-spacing: 0.05em; color: #fefefe;">
                        Смотреть
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="container pt-lg-0 pt-4" id="schet" style="margin-top: 5%;">
        <div class="row">
            <div class="col-lg-5 col-12">
                <h2 class="text-fut-bold" style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; color: #000000;">
                    Невероятно уютный <br>
                    книжный магазин <br>
                    «Эрудит»
                </h2>
                <p class="text-fut-light pt-3" style="font-size: 18px; line-height: 140%; letter-spacing: 0.05em; color: #000000;">
                    Мы одними из первых получаем новинки всех главных книжных издательств и всегда идем в ногу со временем. Огромный  ассортимент художественной и детской литературы, бизнеса и психологии, мягкие диваны и удобные места для гостей специально созданы, чтобы каждый человек чувствовал себя у нас в магазинах максимально комфортно. А оставить довольным каждого – это наша первоочередная задача!
                </p>
            </div>
            <div class="col-1"></div>
            <div class="col-lg-3 col-12 numbers">
                <h2 class="font-weight-bold value" style="font-family: 'Roboto', sans-serif; font-size: 72px; line-height: 140%; letter-spacing: 0.05em; color: #000000; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                    10160
                </h2>
                <p class="text-fut-light pt-3" style="font-size: 16px; line-height: 140%; letter-spacing: 0.05em; color: #000000;">
                    Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредото
                </p>
                <a href="/about_us">
                    <button type="button" class="text-fut-bold mt-5" data-aos="fade-up" style="padding: 15px 23px; background-color: transparent; border: 1px #000000 solid;">
                        Подробнее о нас
                    </button>
                </a>
            </div>
            <div class="col-lg-3 col-12 pt-lg-0 pt-4">
                <h2 class="font-weight-bold numbers" style="font-family: 'Roboto', sans-serif; font-size: 72px; line-height: 140%; letter-spacing: 0.05em; color: #000000; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                    <span class="value">190</span>+
                </h2>
                <p class="text-fut-light pt-3" style="font-size: 16px; line-height: 140%; letter-spacing: 0.05em; color: #000000;">
                    Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредото
                </p>
                <a class="" href="">
                    <button  class="text-fut-bold mt-5" data-aos="fade-up" style="padding: 15px 23px; background-color: #F7E600; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25); border:0;">
                        Смотреть все книги
                    </button>
                </a>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-lg-3 col-6 px-lg-3 px-0">
                <img class="w-100" style="border: 5px solid #F7E600;" src="{{ asset('images/shop1.png') }}" alt="">
            </div>
            <div class="col-lg-3 col-6 px-lg-3 px-0">
                <img class="w-100" style="border: 5px solid #F7E600;" src="{{ asset('images/shop2.png') }}" alt="">
            </div>
            <div class="col-lg-3 col-6 px-lg-3 px-0">
                <img class="w-100" style="border: 5px solid #F7E600;" src="{{ asset('images/shop3.png') }}" alt="">
            </div>
            <div class="col-lg-3 col-6 px-lg-3 px-0">
                <img class="w-100" style="border: 5px solid #F7E600;" src="{{ asset('images/shop4.png') }}" alt="">
            </div>
        </div>

        <div class="row px-5" style="padding-top:10%;">
            <div class="col-lg-4 col-12 text-center">
                <div class="row">
                    <div class="col-lg-2 col-3">
                        <img src="{{ asset('images/book-ico1.png') }}" alt="">
                    </div>
                    <div class="col-9 text-left">
                        <h4 class="text-fut-bold pt-3" style="font-size: 17px; line-height: 22px;">Большой ассортимент</h4>
                        <p class="text-fut-book" style="">
                            У нас Вы можете упаковать подарок и заказать доставку по всей стране, купить книги и комиксы на многих языках мира и подобрать лучший вариант, который подойдет только Вам!
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12 text-center">
                <div class="row">
                    <div class="col-lg-2 col-3">
                        <img src="{{ asset('images/book-ico2.png') }}" alt="">
                    </div>
                    <div class="col-9 text-left">
                        <h4 class="text-fut-bold pt-3" style="font-size: 17px; line-height: 22px;">Лидеры продаж</h4>
                        <p class="text-fut-book" style="">
                            Также наш оптовый склад – самый крупный в стране, мы продаем книги и канцелярские товары во многие страны, такие как Казахстан, Таджикистан и Узбекистан и тд
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12 text-center">
                <div class="row">
                    <div class="col-lg-2 col-3">
                        <img src="{{ asset('images/book-ico3.png') }}" alt="">
                    </div>
                    <div class="col-9 text-left">
                        <h4 class="text-fut-bold pt-3" style="font-size: 17px; line-height: 22px;">Акции и розыгрыши</h4>
                        <p class="text-fut-book" style="">
                            В наших социальных сетях регулярно проходят розыгрыши книг и различных подарков.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container px-5" style="padding-top:5%;">
            <div class="row">
                <img class="d-lg-block d-none" style="position: absolute;" src="{{ asset('images/feedback.png') }}" alt="">
                <img class="d-lg-none d-block" style="position: absolute; width:85%;" src="{{ asset('images/feedback.png') }}" alt="">
                    <h2 class="text-fut-bold pt-4" style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; color: #222222;">
                        Отзывы о нашем
                        <br>
                        магазине
                    </h2>

                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-8 d-lg-block d-none">
                            @include('_partials.feedbacks')
                    </div>
                        <div class="col-12 d-lg-none d-block pt-lg-0 pt-5">
                            @include('_partials.feedbacks-media')
                        </div>
                </div>
            </div>
    </div>
    </div>

<div class="container pt-lg-0 pt-5 pb-5">
    <div class="row px-lg-5 px-1">
    <div class="col-12 pb-4">
    <h2 class="text-fut-bold" style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; color: #222222;">
        Интересное
    </h2>
    </div>
@foreach($news as $new)
    <div class="col-lg-4 col-12 pt-lg-0 pt-4">
        <div class="shadow-hover">
            <img class="w-100" src="{{ asset('storage/'.$new->preview) }}" alt="">
            <div class="p-3">
                <h4 class="text-fut-bold" style="font-size: 18px; line-height: 120%; letter-spacing: 0.05em; color: #000000;">
                    {{ $new->name }}
                </h4>
                <p class="text-fut-book" style="font-family: Futura PT; font-style: normal; font-weight: normal; font-size: 15px; line-height: 130%; letter-spacing: 0.05em;">
                    {{ $new->description }}
                </p>
                <a href="{{ route('news.show',$new->id) }}" class="text-fut-book" style="font-size: 15px; line-height: 130%; letter-spacing: 0.05em; color: #000000; text-decoration: underline;">
                    Читать полностью
                </a>
            </div>

        </div>
    </div>
@endforeach
    </div>
</div>

@endsection
@push('scripts')
<script>
    $(window).scroll(testScroll);
    var viewed = false;

    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height()+200;

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    function testScroll() {
        if (isScrolledIntoView($(".numbers")) && !viewed) {
            viewed = true;
            $('.value').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        }
    }
</script>
@endpush