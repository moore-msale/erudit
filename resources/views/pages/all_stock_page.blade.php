@extends('layouts.app')
@section('content')
    <div style="padding-top: 15%; padding-bottom: 10%;">
        <div class="container mt-lg-0 mt-5">
        <div class="col-12" style="color: #222;">
                        <span>
                        <a href="/">Главная</a>
                        </span>
            <span>
                            <i class="fas fa-arrow-right fa-sm"></i>
                        </span>
            <span>
                Все акции
            </span>
            <h2 class="text-fut-bold mt-3" style="font-size: 30px; line-height: 38px; color: #222;">
                Все акции
            </h2>
        </div>

            <div class="row p-3 mt-3">
                @foreach($discounts as $discount)
                <div class="col-lg-4 col-12">
                    <div class="shadow text-center h-100" style="position: relative;">
                    <img src="{{ asset('storage/books/'.$discount->image) }}" alt="">
                        <div class="discount-plate d-flex align-items-center" style="background-color: #3154CF; position: absolute; right:0%; top:0%;  width:59px; height:54px; border-bottom-left-radius: 50%;"><span class="mx-auto text-white">-{{$discount->discount}}%</span></div>

                    <div class="p-3">
                        <h3 class="text-fut-bold" style="font-size: 18px;line-height: 140%; color: #222; padding-bottom:45%;">
                            {{ $discount->name }}
                        </h3>
                        <div style="position:absolute; right:10%; left:10%; bottom:3%;">
                        <button class="text-fut-bold w-100 mt-3 but-hov" data-aos="fade-up" style="padding: 15px 23px; background-color: transparent; border: 1px #222 solid; cursor: pointer;">
                            Подробнее о нас
                        </button>

                        <p class="text-fut-book mt-3 text-center" style="font-size: 15px; line-height: 140%; color: #838383;">
                            С 23.07.2019 по 06.08.2019
                        </p>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection