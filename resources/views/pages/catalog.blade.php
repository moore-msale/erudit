@extends('layouts.app')
@section('content')
    @push('styles')
        <style>
            body {
                background: #E5E5E5;
            }
        </style>
        <style>
            .slidecontainer {
                width: 100%;
            }

            .slider {
                -webkit-appearance: none;
                width: 100%;
                height: 5px;
                border: 1px solid rgba(0, 0, 0, 0.28);
                border-radius: 5px;
                background: #fbfbfb;
                outline: none;
                opacity: 0.7;
                -webkit-transition: .2s;
                transition: opacity .2s;
            }

            .slider:hover {
                opacity: 1;
            }

            .slider::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: #5f6362;
                cursor: pointer;
            }

            .slider::-moz-range-thumb {
                width: 25px;
                height: 25px;
                border-radius: 50%;
                background: #5f6362;
                cursor: pointer;
            }
        </style>
    @endpush
    <div style="padding-top: 15%; padding-bottom: 10%;">
        <div class="container">
            <div class="row bg-white shadow p-3">
                <div class="col-3">
                    <h3 class="text-fut-bold pl-3 mb-0"
                        style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:black;">
                        Магазин
                    </h3>
                </div>
                <div class="col-2 text-center pt-2">
                    <div class="dropdown open" style=" display: flex; align-items: center; text-align: center;">
                        <a class="dropdown-toggle text-fut-book bg-transparent m-0 mx-auto"
                           style="border:0; font-size:20px; color: #000000;" id="dropdownMenuButton"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Сортировка
                        </a>
                        <div class="dropdown-menu text-fut-book" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Пункт 1</a>
                            <a class="dropdown-item" href="#">Пункт 2</a>
                            <a class="dropdown-item" href="#">Пункт 3</a>
                        </div>
                    </div>
                </div>
                <div class="col-1 pr-0 text-right">
                    <p class="text-fut-book"
                       style="font-size: 20px; line-height: 120%; letter-spacing: 0.05em; color: black;">
                        Цена
                    </p>
                </div>
                <div class="col-3">
                    <div class="slidecontainer">
                        <span class="text-fut-book" style="font-size: 14px;">мин: <span id="demo"></span> сом</span>
                        <span class="text-fut-book" style="float:right; font-size: 14px;">макс: 15000 сом</span>
                        <input type="range" min="0" max="15000" value="0" class="slider" id="myRange">
                    </div>
                </div>
                <div class="col-3">
                    <p class="text-fut-book"
                       style="font-size: 20px; line-height: 120%; letter-spacing: 0.05em; color: black;">
                        Поиск
                    </p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3 p-0">
                    <div class=" bg-white p-5">
                        <h3 class="text-fut-bold mb-0"
                            style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:black;">
                            Жанры
                        </h3>
                        <div class="mt-3 text-fut-book"
                             style="font-size: 18px; line-height: 120%; letter-spacing: 0.05em; color:#000000; cursor: pointer;">
                            @foreach($genres as $genre)
                            <a href="{{ route('genre',$genre) }}">
                                <p class="text-scale">
                                    {{ $genre->name }}
                                </p>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class=" bg-white p-5 mt-4">
                        <h3 class="text-fut-bold mb-0"
                            style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:black;">
                            Категории
                        </h3>
                        <div class="mt-3 text-fut-book"
                             style="font-size: 18px; line-height: 120%; letter-spacing: 0.05em; color:#000000; cursor: pointer;">
                            <p class="text-scale">
                                Новинки
                            </p>
                            <p class="text-scale">
                                Бестселлеры
                            </p>
                            <p class="text-scale">
                                Товары для творчества
                            </p>
                            <p class="text-scale">
                                Канцелярские товары
                            </p>
                            <p class="text-scale">
                                Настольные игры
                            </p>
                            <p class="text-scale">
                                Учебные материалы
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row px-4">
                        @foreach($books as $book)
                            @include('books.single')
                            {{--<div class="col-lg-4 col-12 item px-1">--}}
                            {{--<div class="p-4 m-2 shadow"  style="background-color: white; max-width: 259px; height: 450px;">--}}
                            {{----}}
                            {{--<h3 class="font-weight-bold text-fut-bold mt-3 text-left" style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #000000;">--}}
                            {{--{{ $book->name }}--}}
                            {{--</h3>--}}
                            {{--<div class="container-fluid mr-0 pr-0" style="position: absolute; bottom:5%; color:black;">--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-7 p-0 text-left">--}}
                            {{--<span class="text-fut-bold" style="font-size:18px; letter-spacing: 0.05em;">--}}
                            {{--{{ $book->price_retail }} сом--}}
                            {{--</span>--}}
                            {{--</div>--}}
                            {{--<div class="col-2 p-0">--}}
                            {{--<img class="w-100" src="{{ asset('images/inactivelike.png') }}" alt="">--}}
                            {{--</div>--}}
                            {{--<div class="col-1 p-0"></div>--}}
                            {{--<div class="col-2 p-0">--}}
                            {{--<img class="w-100" src="{{ asset('images/tobasket.png') }}" alt="">--}}
                            {{--<a href="">--}}
                            {{--<i style="color: black;" class="fas fa-cart-plus fa-lg"></i>--}}
                            {{--</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        @endforeach
                        {{--<div class="col-lg-4 col-12">--}}
                        {{--<div class="p-4 shadow" style="background-color: white;">--}}
                        {{--<img class="w-100" src="{{ asset('images/book1.png') }}" alt="">--}}
                        {{--<h3 class="font-weight-bold text-fut-bold mt-3 text-left" style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #000000;">--}}
                        {{--В движении.--}}
                        {{--<br>--}}
                        {{--История жизни--}}
                        {{--</h3>--}}
                        {{--<div class="container-fluid row mr-0 pr-0">--}}
                            {{--<div class="col-7 p-0 text-left">--}}
                                                {{--<span class="text-fut-bold" style="font-size:18px; letter-spacing: 0.05em;">--}}
                                                    {{--648 сом--}}
                                                {{--</span>--}}
                            {{--</div>--}}
                            {{--<div class="col-2 p-0">--}}
                                {{--<img class="w-100" src="{{ asset('images/inactivelike.png') }}" alt="">--}}
                            {{--</div>--}}
                            {{--<div class="col-1 p-0"></div>--}}
                            {{--<div class="col-2 p-0">--}}
                                {{--<img class="w-100" src="{{ asset('images/tobasket.png') }}" alt="">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-4 col-12">--}}
                        {{--<div class="p-4 shadow" style="background-color: white;">--}}
                        {{--<img class="w-100" src="{{ asset('images/book1.png') }}" alt="">--}}
                        {{--<h3 class="font-weight-bold text-fut-bold mt-3 text-left" style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #000000;">--}}
                        {{--В движении.--}}
                        {{--<br>--}}
                        {{--История жизни--}}
                        {{--</h3>--}}
                        {{--<div class="container-fluid row mr-0 pr-0">--}}
                        {{--<div class="col-7 p-0 text-left">--}}
                        {{--<span class="text-fut-bold" style="font-size:18px; letter-spacing: 0.05em;">--}}
                        {{--648 сом--}}
                        {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-2 p-0">--}}
                        {{--<img class="w-100" src="{{ asset('images/inactivelike.png') }}" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="col-1 p-0"></div>--}}
                        {{--<div class="col-2 p-0">--}}
                        {{--<img class="w-100" src="{{ asset('images/tobasket.png') }}" alt="">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                    </div>
                    @if($books instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        <div class="row pl-4 ml-0 pt-3">
                            {{ $books->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>
@endpush