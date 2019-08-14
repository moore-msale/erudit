@extends('layouts.app')
@section('content')
    <div style="padding-top: 15%; padding-bottom: 10%;">
        <div class="container mt-lg-0 mt-5">
            <div class="row">
                <div class="col-12 px-4 d-lg-none d-block">
                        <span>
                        <a href="/">Главная</a>
                        </span>
                    <span>
                            <i class="fas fa-arrow-right fa-sm"></i>
                        </span>
                    <span>
                            <a href="">{{ $book->genre }}</a>
                        </span>
                    <span>
                            <i class="fas fa-arrow-right fa-sm"></i>
                        </span>
                    <span>
                            {{ $book->name }}
                        </span>
                </div>
                <div class="col-lg-3 col-12 p-4">
                    <div>
                        <img class="w-100 shadow-lg" src="{{ asset('storage/'.$book->image) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-9 col-12 pt-4">
                    <div class="row">
                    <div class="col-12 d-lg-block d-none">
                        <span>
                        <a href="/">Главная</a>
                        </span>
                        <span>
                            <i class="fas fa-arrow-right fa-xs"></i>
                        </span>
                        <span>
                            <a href="">{{ $book->genre->name }}</a>
                        </span>
                        <span>
                            <i class="fas fa-arrow-right fa-xs"></i>
                        </span>
                        <span>
                            {{ $book->name }}
                        </span>
                    </div>
                        <div class="col-12 pt-3 text-lg-left text-center">
                            <h2 class="text-fut-bold" style="font-size: 30px; line-height: 38px; color: #000000;">
                                {{ $book->name }}
                            </h2>
                            <div class="mt-4" style="font-size:16px; color: black; font-family:'Futura PT Medium Italic';">
                                @if($book->author)
                                    <p><strong class="text-fut-bold">Автор:</strong> {{ $book->author }}</p>
                                @endif
                                @if($book->publishing)
                                    <p><strong class="text-fut-bold">Издательство:</strong> {{ $book->publishing }}</p>
                                @endif
                                    @if($book->series)
                                        <p><strong class="text-fut-bold">Серия:</strong> {{ $book->series }}</p>
                                    @endif
                            </div>

                            <div class="mt-4">
                                @guest
                                <p class="text-fut-bold" style="font-size: 25px; line-height: 140%;">
                                    {{ $book->price_retail }} сом
                                </p>
                                @else
                                    <p class="text-fut-bold" style="font-size: 25px; line-height: 140%;">
                                        {{isset($book->price_wholesale) ? $book->price_wholesale : $book->price_retail }} сом
                                    </p>
                                @endguest
                            </div>

                            {{--<div class="pt-4 bg-secondary">--}}

                            {{--</div>--}}

                            <div class="mt-4">
                                <button  class="text-fut-bold mt-5 buy_book" data-id="{{ $book->id }}" data-aos="fade-up" style="padding: 15px 23px; background-color: #F7E600; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25); border:0;">
                                    Добавить в корзину
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-fut-book mt-5 mb-3" style="font-size: 20px; line-height: 26px; color: black;">
                О книге
            </h3>
            <p class="col-10 px-0" style="font-size: 15px; line-height: 140%; color: black;; font-family: 'Futura PT'">
                {{ $book->description }}
            </p>



                <h3 class="text-fut-bold mt-5 mb-3" style="font-size: 20px; line-height: 26px; color: black;">
                    Сопутствующие товары
                </h3>
            <div class="row">
                <div class="col-lg-10 col-12">
                    <div class="row">
                        @foreach($sames as $same)
                            <div class="col-lg-3 col-12 item px-1">
                                <a href="{{ asset('book/'.$same->id) }}">
                                    <div class="p-4 m-2 shadow"  style="background-color: white; max-width: 259px; height: 100%;">
                                        <div class="" style="height: 55%;">
                                        <img class="w-100 h-100" src="{{ asset('storage/'.$same->image) }}" alt="">
                                        </div>
                                        <h3 class="font-weight-bold text-fut-bold mt-3 pb-5 text-left"
                                            style="font-size: 16px; line-height: 110%; letter-spacing: 0.05em; color: #000000;">
                                            {{ $same->name }}
                                        </h3>
                                        <div class="container-fluid row mr-0 pr-0"
                                             style="position: absolute; bottom:3%; color:black;">
                                            <div class="col-7 p-0 text-left">
                                                @guest
                                                    <span class="text-fut-bold"
                                                          style="font-size:18px; letter-spacing: 0.05em;">
                                                            {{ $same->price_retail }} сом
                                                    </span>
                                                @else
                                                    <span class="text-fut-bold"
                                                          style="font-size:18px; letter-spacing: 0.05em;">
                                                            {{ $same->price_wholesale }} сом
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
                                    </div>
                                </a>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>

            <div class="" style="margin-top: 10%;">
                <h3 class="text-fut-bold mt-4 mb-3" style="font-size: 20px; line-height: 26px; color: black;">
                    Рецензии на книгу "{{ $book->name }}"
                </h3>
                @if(!count($book->feedbacks))
                    Рецензий нет
                @endif
                @foreach($book->feedbacks as $feedback)
                <p class="text-fut-bold mt-5" style="font-size: 16px; line-height: 21px; color: #000000;">
                    {{ $feedback->name }}
                </p>
                <p class="text-fut-book" style="font-size: 16px; line-height: 21px; color: #000000;">
                    <span>Понравилось?
                            @if($feedback->like == 1)
                            <span class="text-fut-bold pl-3" style="color: #019D38;">
                                Да
                            </span>
                                @else
                            <span class="text-fut-bold pl-3" style="color: #9d0000;">
                                Нет
                            </span>
                            @endif
                        </span>
                </p>

                <p class="text-fut-book col-lg-6 col-12 px-0" style="font-size: 16px; line-height: 21px; color: #000000;">
                    {{ $feedback->comment }}
                </p>

                <p class="text-fut-light" style="font-size: 15px; line-height: 140%; color: #838383;">
                    {{--{{ $feedback->created_at }}--}}
                    {{ \Carbon\Carbon::make($feedback->created_at)->format('d-m-Y') }}
                </p>
                <div class="col-6 p-0">
                    <hr>
                </div>
                    @endforeach
            </div>
            <button data-toggle="modal" data-target="#book_feedback" class="text-fut-bold mt-5 pointer" data-aos="fade-up" style="padding: 15px 23px; background-color: #3154CF; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25); border:0; color: white;">
                Оставить рецензию
            </button>
        </div>
    </div>
    @include('modals.book_feedbacks')
@endsection
