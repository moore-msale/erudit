@extends('layouts.app')
@section('content')
    <div style="padding-top: 15%; padding-bottom: 10%;">
        <div class="container">
        <div class="col-12">
                        <span>
                        <a href="/">Главная</a>
                        </span>
            <span>
                            <i class="fas fa-arrow-right fa-sm"></i>
                        </span>
            <span>
                Все акции
            </span>
            <h2 class="text-fut-bold mt-3" style="font-size: 30px; line-height: 38px; color: #000000;">
                Все акции
            </h2>
        </div>

            <div class="row p-3 mt-3">
                <div class="col-4">
                    <img src="{{ asset('images/stocks.png') }}" alt="">

                    <div class="p-3">
                        <h3 class="text-fut-bold" style="font-size: 18px; line-height: 140%; color: black;">
                            Ражкак, Лавердан: Живой мир под микроскопом
                        </h3>
                        <button class="text-fut-bold w-100 mt-3" data-aos="fade-up" style="padding: 15px 23px; background-color: transparent; border: 1px #000000 solid;">
                            Подробнее о нас
                        </button>

                        <p class="text-fut-book mt-3 text-center" style="font-size: 15px; line-height: 140%; color: #838383;">
                            С 23.07.2019 по 06.08.2019
                        </p>
                    </div>
                </div>
                <div class="col-4">
                    <img src="{{ asset('images/stocks.png') }}" alt="">

                    <div class="p-3">
                        <h3 class="text-fut-bold" style="font-size: 18px; line-height: 140%; color: black;">
                            Александр Полярный: Мятная сказка
                        </h3>
                        <button class="text-fut-bold w-100 mt-3" data-aos="fade-up" style="padding: 15px 23px; background-color: transparent; border: 1px #000000 solid;">
                            Подробнее о нас
                        </button>

                        <p class="text-fut-book mt-3 text-center" style="font-size: 15px; line-height: 140%; color: #838383;">
                            С 23.07.2019 по 06.08.2019
                        </p>
                    </div>
                </div>
                <div class="col-4">
                    <img src="{{ asset('images/stocks.png') }}" alt="">

                    <div class="p-3">
                        <h3 class="text-fut-bold" style="font-size: 18px; line-height: 140%; color: black;">
                            СтейсКрамер: Абиссаль
                        </h3>
                        <button class="text-fut-bold w-100 mt-3" data-aos="fade-up" style="padding: 15px 23px; background-color: transparent; border: 1px #000000 solid;">
                            Подробнее о нас
                        </button>

                        <p class="text-fut-book mt-3 text-center" style="font-size: 15px; line-height: 140%; color: #838383;">
                            С 23.07.2019 по 06.08.2019
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection