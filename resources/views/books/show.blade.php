@extends('layouts.app')
@section('content')
    <div style="padding-top: 15%; padding-bottom: 10%;">
        <div class="container mt-lg-0 mt-5">
            <div class="row">
                <div class="col-12 px-4 d-lg-none d-block">
                        <span class="text-fut-light">
                        <a href="/">Главная</a>
                        </span>
                    <span>
                            <i class="fas fa-arrow-right fa-sm"></i>
                        </span>
                    <span class="text-fut-book">
                        @if($book->genre)
                            <a href="">{{ $book->genre->name }}</a>
                            @endif
                        </span>
                    <span class="text-fut-book">
                            <i class="fas fa-arrow-right fa-sm"></i>
                        </span>
                    <span>
                            {{ \Illuminate\Support\Str::limit($book->name,30,'...') }}
                        </span>
                </div>
                <div class="col-lg-3 col-12 p-4">
                    <div style="position: relative;">
                        @if (filter_var($book->image, FILTER_VALIDATE_URL))
                            <img class="w-100" style="height: 60%;" src="{{ $book->image }}" alt="">
                        @else
                            <img class="w-100" style="height: 60%;" src="{{ asset('storage/'.$book->image)}}" alt="">
                        @endif

{{--                        <img class="w-100 shadow-lg" src="{{ asset('storage/books/'.$book->image) }}" alt="">--}}
                        @if(isset($book->discount))
                        <div class="discount-plate d-flex align-items-center" style="background-color: #4d86ff; position: absolute; right:0%; top:0%;  width:59px; height:54px; border-bottom-left-radius: 50%;"><span class="mx-auto text-white">-{{$book->discount}}%</span></div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-9 col-12 pt-4">
                    <div class="row">
                    <div class="col-12 d-lg-block d-none">
                        <span class="text-fut-book">
                        <a href="/">Главная</a>
                        </span>
                        <span class="text-fut-book">
                            <i class="fas fa-arrow-right fa-xs"></i>
                        </span>
                        <span class="text-fut-book">
                            @if($book->genre)
                            <a href="">{{ $book->genre->name }}</a>
                                @endif
                        </span>
                        <span>
                            <i class="fas fa-arrow-right fa-xs"></i>
                        </span>
                        <span class="text-fut-book">
                            {{ $book->name }}
                        </span>
                    </div>
                        <div class="col-12 pt-3 text-lg-left text-center">
                            <h2 class="text-fut-bold" style="font-size: 30px; line-height: 38px; color: #222;">
                                {{ $book->name }}
                            </h2>
                            <div class="mt-4 row" style="font-size:16px; color: #222; font-family:'Futura PT Medium Italic';">
                                <div class="col-4">
                                    @if($book->author)
                                        <p class="text-fut-light font-weight-bold"><strong class="text-fut-bold">Автор:</strong> {{ $book->author }}</p>
                                    @endif
                                    @if($book->publishing)
                                        <p class="text-fut-light font-weight-bold"><strong class="text-fut-bold">Издательство:</strong> {{ $book->publishing }}</p>
                                    @endif
                                    @if($book->series)
                                        <p class="text-fut-light font-weight-bold"><strong class="text-fut-bold">Серия:</strong> {{ $book->series }}</p>
                                    @endif
                                    @if($book->isbn)
                                        <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">ISBN:</strong> {{ $book->isbn }}</p>
                                    @endif
                                </div>
                                <div class="col-5">
                                    @if($book->pages)
                                        <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Кол-во страниц:</strong> {{ $book->pages }}</p>
                                    @endif
                                    @if($book->weight)
                                        <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Вес:</strong> {{ $book->weight }}</p>
                                    @endif
                                    @if($book->dimension)
                                        <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Размеры:</strong> {{ $book->dimension }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-4">
                                @guest
                                <p class="text-fut-bold" style="font-size: 25px; line-height: 140%; color:#222;">
                                     {{ intval(isset($book->discount) ? $book->price_wholesale - ($book->price_wholesale / 100 * $book->discount) : $book->price_wholesale)}} сом
                                </p>
                                @else
                                    <p class="text-fut-bold" style="font-size: 25px; line-height: 140%; color:#222;">
                                        {{ intval(isset($book->price_retail) ? (isset($book->discount) ? $book->price_retail - ($book->price_retail / 100 * $book->discount) : $book->price_retail) : (isset($book->discount) ? $book->price_wholesale - ($book->price_wholesale / 100 * $book->discount) : $book->price_wholesale))}} сом
                                    </p>
                                @endguest
                            </div>

                            {{--<div class="pt-4 bg-secondary">--}}

                            {{--</div>--}}
                            <h3 class="text-fut-book mt-5 mb-3" style="font-size: 20px; line-height: 26px; color: #222;">
                                О книге
                            </h3>
                            <p class="col-12 col-md-10 px-0 text-center text-md-left" style="font-size: 15px; line-height: 140%; color: #222;; font-family: 'Futura PT'">
                                {{ $book->description }}
                            </p>
                            <div class="mt-4">
                                <button  class="btn-primary text-fut-bold mt-5 buy_book but-hov" data-id="{{ $book->id }}" data-aos="fade-up" style="padding: 15px 23px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25); border:0;">
                                    Добавить в корзину
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



                <h3 class="text-fut-bold mt-5 mb-3" style="font-size: 20px; line-height: 26px; color: #222;">
                    Сопутствующие товары
                </h3>
            <div class="row">
                <div class="col-lg-10 col-12">
                    <div class="row">
                        @foreach($sames as $same)
                            <div class="col-lg-3 col-12 item mt-3" style="background-color: white;">
                                <div class="shadow p-4 h-100">
                                <a href="{{ asset('book/'.$same->id) }}" style="text-decoration: none;">
                                    <div class="" style="height: 65%;">
                                        {{--<img class="w-100 h-100" style="height: 60%;" src="{{ file_exists('storage/'.$same->image) ? asset('storage/'.$same->image) : asset('images/default_book.png') }}" alt="">--}}
                                        @if (filter_var($same->image, FILTER_VALIDATE_URL))
                                            <img class="w-100 h-100" style="height: 60%;" src="{{ $same->image }}" alt="">
                                        @else
                                            <img class="w-100 h-100" style="height: 60%;" src="{{ asset('storage/'.$same->image)}}" alt="">
                                        @endif
{{--                                        <img class="w-100 h-100" src="{{ asset('storage/'.$same->image) }}" alt="">--}}
                                    </div>
                                    <h3 class="text-fut-book mt-3 text-left"
                                        style="font-size: 16px; line-height: 110%; letter-spacing: 0.05em; color: #222;">
                                        {{\Illuminate\Support\Str::limit($same->name,30,'...')  }}
                                    </h3>
                                </a>
                                    <div class="p-0 text-left">
                                        @guest
                                            <span class="text-fut-book"
                                                  style="font-size:18px; letter-spacing: 0.05em;">
                                                            {{ $same->price_wholesale }} сом
                                                    </span>
                                        @else
                                            <span class="text-fut-book"
                                                  style="font-size:18px; letter-spacing: 0.05em;">
                                                            {{ $same->price_retail }} сом
                                                    </span>
                                        @endguest
                                    </div>
                                <div class="container-fluid mr-0 pr-0">
                                    <div class="row" style="width:70%;position: absolute; bottom:5%; color:#222;">

                                        <button class="btn-primary text-fut-book but-hov mx-auto text-white buy_book py-2 w-100 d-lg-block d-none" data-id="{{ $same->id }}" data-aos="fade-up"
                                                style="font-size: 13px; border:0; cursor: pointer;">
                                            Добавить в корзину
                                        </button>
                                        <button class="btn-primary text-fut-book but-hov mx-auto text-white buy_book py-2 w-100 d-lg-none d-block" data-id="{{ $same->id }}" data-aos="fade-up"
                                                style="font-size: 13px; border:0; cursor: pointer;">
                                            В корзину
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>

            <div class="" style="margin-top: 10%;">
                <h3 class="text-fut-bold mt-4 mb-3" style="font-size: 20px; line-height: 26px; color: #222;">
                    Рецензии на книгу "{{ $book->name }}"
                </h3>
                @if(!count($book->feedbacks))
                    Рецензий нет
                @endif
                @foreach($book->feedbacks as $feedback)
                <p class="text-fut-bold mt-5" style="font-size: 16px; line-height: 21px; color: #222;">
                    {{ $feedback->name }}
                </p>
                <p class="text-fut-book" style="font-size: 16px; line-height: 21px; color: #222;">
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

                <p class="text-fut-book col-lg-6 col-12 px-0" style="font-size: 16px; line-height: 21px; color: #222;">
                    {{ $feedback->comment }}
                </p>

                <p class="text-fut-light" style="font-size: 15px; line-height: 140%; color: #838383;">
                    {{ $feedback->created_at }}
                    {{ \Carbon\Carbon::make($feedback->created_at)->format('d-m-Y') }}
                </p>
                <div class="col-6 p-0">
                    <hr>
                </div>
                    @endforeach
            </div>
            <button data-toggle="modal" data-target="#book_feedback" class="text-fut-bold mt-5 pointer" data-aos="fade-up" style="padding: 15px 23px; background-color: #4d86ff; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25); border:0; color: white;">
                Оставить рецензию
            </button>
        </div>
    </div>
    @include('modals.book_feedbacks')
@endsection
