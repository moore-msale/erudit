@extends('layouts.app')
@section('content')
    @push('styles')
        <style>
            body{
                background: #E5E5E5;
            }
        </style>
    @endpush
    <div style="padding-top: 15%; padding-bottom: 10%;">
<div class="container" >
    <div class="row bg-white shadow p-3">
        <div class="col-3">
            <h3 class="text-fut-bold pl-3 mb-0" style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:black;">
                Магазин
            </h3>
        </div>
        <div class="col-2 text-center">
            <div class="dropdown open" style=" display: flex; align-items: center; text-align: center;">
                <a class="btn dropdown-toggle text-fut-book bg-transparent m-0 mx-auto" style="border:0; font-size:20px; color: #000000;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Сортировка
                </a>
                <div class="dropdown-menu text-fut-book" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Пункт 1</a>
                    <a class="dropdown-item" href="#">Пункт 2</a>
                    <a class="dropdown-item" href="#">Пункт 3</a>
                </div>
            </div>
        </div>
        <div class="col-4 text-center">
            <p class="text-fut-book" style="font-size: 20px; line-height: 120%; letter-spacing: 0.05em; color: black;">
                Цена
            </p>
        </div>
        <div class="col-3">
            <p class="text-fut-book" style="font-size: 20px; line-height: 120%; letter-spacing: 0.05em; color: black;">
                Поиск
            </p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-3 p-0">
            <div class=" bg-white p-5">
            <h3 class="text-fut-bold mb-0" style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:black;">
                Жанры
            </h3>
            <div class="mt-3 text-fut-book" style="font-size: 18px; line-height: 120%; letter-spacing: 0.05em;">
            <p>
                Фантастика
            </p>
                <p>
                    Детские книги
                </p>
                <p>
                    Детективы и боевики
                </p>
                <p>
                    Поэзия, драматургия
                </p>
                <p>
                    Документальное
                </p>
                <p>
                    Любовные романы
                </p>
                <p>
                    Приключения
                </p>
                <p>
                    Религия
                </p>
                <p>
                    Проза
                </p>
                <p>
                    Юмор
                </p>
            </div>
            </div>
            <div class=" bg-white p-5 mt-4">
                <h3 class="text-fut-bold mb-0" style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:black;">
                    Категории
                </h3>
                <div class="mt-3 text-fut-book" style="font-size: 18px; line-height: 120%; letter-spacing: 0.05em;">
                    <p>
                        Новинки
                    </p>
                    <p>
                        Бестселлеры
                    </p>
                    <p>
                        Товары для творчества
                    </p>
                    <p>
                        Канцелярские товары
                    </p>
                    <p>
                        Настольные игры
                    </p>
                    <p>
                        Учебные материалы
                    </p>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="row px-4">
                    <div class="col-lg-4 col-12">
                        <div class="p-4 shadow" style="background-color: white;">
                        <img class="w-100" src="{{ asset('images/book1.png') }}" alt="">
                        <h3 class="font-weight-bold text-fut-bold mt-3 text-left" style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #000000;">
                            В движении.
                            <br>
                            История жизни
                        </h3>
                        <div class="container-fluid row mr-0 pr-0">
                            <div class="col-7 p-0 text-left">
                                                <span class="text-fut-bold" style="font-size:18px; letter-spacing: 0.05em;">
                                                    648 сом
                                                </span>
                            </div>
                            <div class="col-2 p-0">
                                <img class="w-100" src="{{ asset('images/inactivelike.png') }}" alt="">
                            </div>
                            <div class="col-1 p-0"></div>
                            <div class="col-2 p-0">
                                <img class="w-100" src="{{ asset('images/tobasket.png') }}" alt="">
                            </div>
                        </div>
                        </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="p-4 shadow" style="background-color: white;">
                        <img class="w-100" src="{{ asset('images/book1.png') }}" alt="">
                        <h3 class="font-weight-bold text-fut-bold mt-3 text-left" style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #000000;">
                            В движении.
                            <br>
                            История жизни
                        </h3>
                        <div class="container-fluid row mr-0 pr-0">
                            <div class="col-7 p-0 text-left">
                                                <span class="text-fut-bold" style="font-size:18px; letter-spacing: 0.05em;">
                                                    648 сом
                                                </span>
                            </div>
                            <div class="col-2 p-0">
                                <img class="w-100" src="{{ asset('images/inactivelike.png') }}" alt="">
                            </div>
                            <div class="col-1 p-0"></div>
                            <div class="col-2 p-0">
                                <img class="w-100" src="{{ asset('images/tobasket.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="p-4 shadow" style="background-color: white;">
                        <img class="w-100" src="{{ asset('images/book1.png') }}" alt="">
                        <h3 class="font-weight-bold text-fut-bold mt-3 text-left" style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #000000;">
                            В движении.
                            <br>
                            История жизни
                        </h3>
                        <div class="container-fluid row mr-0 pr-0">
                            <div class="col-7 p-0 text-left">
                                                <span class="text-fut-bold" style="font-size:18px; letter-spacing: 0.05em;">
                                                    648 сом
                                                </span>
                            </div>
                            <div class="col-2 p-0">
                                <img class="w-100" src="{{ asset('images/inactivelike.png') }}" alt="">
                            </div>
                            <div class="col-1 p-0"></div>
                            <div class="col-2 p-0">
                                <img class="w-100" src="{{ asset('images/tobasket.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
@endsection