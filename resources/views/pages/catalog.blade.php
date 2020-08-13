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
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: #5f6362;
                cursor: pointer;
            }
        </style>
    @endpush

    <div class="catalog_for_media" style="padding-top: 15%; padding-bottom: 10%;">
        <div class="container">
            <div class="row align-items-center bg-white shadow px-3 py-3">
                <div class="col-lg-3 col-12">
                    <h3 class="text-fut-bold pl-3 mb-0 text-lg-left text-center"
                        style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:#222;">
                        Магазин
                    </h3>
                </div>
                <div class="col-lg-2 col-12 text-center">
                    <div class="dropdown open" style=" display: flex; align-items: center; text-align: center; cursor: pointer;">
                        <a class="dropdown-toggle text-fut-book bg-transparent m-0 mx-auto"
                           style="border:0; font-size:20px; color: #222;" id="dropdownMenuButton"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Сортировка
                        </a>
                        <div class="dropdown-menu text-fut-book" style="cursor: pointer;" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item sort_products" href="#" data-type="Updated_at" data-value="desc">По новым</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Updated_at" data-value="asc">По старым</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Name" data-value="asc">По названию: А > Я</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Name" data-value="desc">По названию: Я > А</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Author" data-value="asc">По автору: А > Я</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Author" data-value="desc">По автору: Я > А</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Price" data-value="asc">Бюджетные</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Price" data-value="desc">Дорогие</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Discount" data-value="desc">С макс. скидкой</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Bestseller" data-value="1">Лидеры продаж</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Reviewed" data-value="1">Рецензируемые</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-12 pr-0 text-lg-right text-center">
                    <p class="text-fut-book m-0"
                       style="font-size: 20px; line-height: 120%; letter-spacing: 0.05em; color: #222;">
                        Цена
                    </p>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="slidecontainer">
                        <span class="text-fut-book" style="font-size: 14px;">мин: <span id="demo"></span> сом</span>
                        <span class="text-fut-book" style="float:right; font-size: 14px;">макс: 15000 сом</span>
                        <input type="range" min="0" max="15000" value="0" class="slider" id="myRange">
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="text-fut-book"
                         style="font-size: 20px; line-height: 120%; letter-spacing: 0.05em; color: #222;">
                        <input type="text" class="border-bottom rounded-0 border-top-0 border-left-0 border-right-0 form-control input-without-focus" id="search_input" placeholder="Поиск">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-3 col-12 p-0 d-lg-none d-block">
                    <div class=" bg-white">
                        <div class="d-lg-none d-block">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="accordion text-white text-uppercase bg-transparent" id="accordionExample">
                                            <div class="card bg-transparent border-0 px-0" style="text-align: center">
                                                <div class="card-header bg-transparent border-0" id="headingOne">
                                                    <button class="btn-link border-0 text-dark text-fut-bold text-uppercase" style="font-size: 12px;" type="button" data-toggle="collapse"
                                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <i class="fas fa-angle-down mr-2"></i>Жанры
                                                    </button>
                                                </div>

                                                <div id="collapseOne" class="collapse pt-3" aria-labelledby="headingOne"
                                                     data-parent="#accordionExample">
                                                    <div class="card-body font-weight-light text-dark pt-0 px-0">
                                                        <div class="mt-3 text-fut-book" style="font-size: 15px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:#222;">
                                                            <a href="" class="genre_btn"  data-value="{{null}}">
                                                                <p class="text-scale">
                                                                    Все жанры
                                                                </p>
                                                            </a>
                                                            @foreach($genres as $genre)
                                                                <a href="{{ route('genre',$genre->name) }}" class="genre_btn" data-value="{{ $genre->id }}">
                                                                    <p class="text-scale">
                                                                        {{ $genre->name }}
                                                                    </p>
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    </div>
                                    <div class="col-4 px-1">
                                        <div class="accordion text-white text-uppercase bg-transparent" id="accordionExample">
                                            <div class="card bg-transparent border-0 px-0"  style="text-align: center">
                                                <div class="card-header bg-transparent border-0 px-1" id="headingTwo">
                                                    <button class="btn-link border-0 text-dark text-fut-bold text-uppercase" style="font-size: 12px;" type="button" data-toggle="collapse"
                                                            data-target="#headingTwomoo" aria-expanded="true" aria-controls="headingTwomoo">
                                                        <i class="fas fa-angle-down mr-2"></i>Канцелярские товары
                                                    </button>
                                                </div>

                                                <div id="headingTwomoo" class="collapse pt-3" aria-labelledby="headingTwo"
                                                     data-parent="#accordionExample">
                                                    <div class="card-body font-weight-light text-dark pt-0 px-0">
                                                        <div class="mt-3 text-fut-book" style="font-size: 15px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:#222;">
                                                            <a href="{{ route('genre', 'all') }}" data-value="all" class="subgenre_btn">
                                                                <p class="text-scale pl-0 mb-2">
                                                                    Все товары
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'ручки') }}" data-value="ручки" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Ручки
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'тетради') }}" data-value="тетради" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Тетради
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'блокнот') }}" data-value="блокнот" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Блокноты
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'папки') }}" data-value="папки" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Папки
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'ежедневник') }}" data-value="ежедневник" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Ежедневники
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'пенал') }}" data-value="пенал" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Пеналы
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'карты') }}" data-value="атласы" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Атласы и карты
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'карандаш') }}" data-value="карандаш" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Карандаши
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'обложки') }}" data-value="обложк" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Обложки
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'Планинги') }}" data-value="планинг" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Планинги
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'Дневники') }}" data-value="дневник" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Дневники
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'Подставки') }}" data-value="подставки" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Подставки для книг
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'ленейки') }}" data-value="ленейк" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Ленейки
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'Альбомы') }}" data-value="альбомы" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Альбомы для рисования
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'Рюкзаки') }}" data-value="сумки" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Рюкзаки, сумки
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('genre', 'Скетчпады ') }}" data-value="скетчпады" class="stationery_btn subgenre_btn">
                                                                <p class="text-scale pl-3 mb-2">
                                                                    Скетчпады
                                                                </p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="accordion text-white text-uppercase bg-transparent" id="accordionExample">
                                            <div class="card bg-transparent border-0 ">
                                                <div class="card-header bg-transparent border-0 px-1" id="headingTwo">
                                                    <button class="btn-link border-0 text-dark text-fut-bold text-uppercase" style="font-size: 12px;" type="button" data-toggle="collapse"
                                                            data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                        <i class="fas fa-angle-down mr-2"></i>Категории
                                                    </button>
                                                </div>

                                                <div id="collapseTwo" class="collapse pt-3" aria-labelledby="headingTwo"
                                                     data-parent="#accordionExample">
                                                    <div class="card-body font-weight-light text-dark pt-0 px-0">
                                                        <div class="mt-3 text-fut-book"
                                                             style="font-size: 15px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:#222; cursor: pointer;">


                                                            <a href="{{ route('category', 'Настольные игры') }}" class="category_btn" data-value="3">
                                                                <p class="text-scale">
                                                                    Настольные игры
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('category', 'игрушки') }}" class="category_btn" data-value="6">
                                                                <p class="text-scale">
                                                                    Игрушки
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('category', 'Товары для творчества') }}" class="category_btn" data-value="5">
                                                                <p class="text-scale">
                                                                    Товары для творчества
                                                                </p>
                                                            </a>

                                                            <a href="{{ route('category', 'Учебные материалы') }}" class="category_btn" data-value="4">
                                                                <p class="text-scale">
                                                                    Учебные материалы
                                                                </p>
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 p-0 d-lg-block d-none">
                    <div class="bg-white p-5 d-lg-block d-none mt-2">
                        <h3 class="text-fut-bold mb-0"
                            style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:#222;">
                            Категории
                        </h3>
                        <div class="mt-3 text-fut-book"
                             style="font-size: 18px; line-height: 120%; letter-spacing: 0.05em; color:#222; cursor: pointer;">

                            @foreach($categories as $category)

                                @if($category->name == 'Книги')
                                    <div class="accordion category_btn" id="accordionExample">
                                        <div class="card border-0">
                                            <div class="card-header p-0  bg-white" id="cat-{{$category->id}}">
                                                <button class="text-scale border-0 bg-white outline-none" type="button" data-toggle="collapse" data-target="#collapse-{{$category->id}}" aria-expanded="false" aria-controls="collapse-{{$category->id}}" style="margin-bottom:1rem;color:#2c3e50;">
                                                    {{$category->name}}
                                                </button>
                                            </div>
                                            <div id="collapse-{{$category->id}}" class="collapse pt-1" aria-labelledby="cat-{{$category->id}}" data-parent="#accordionExample">
                                                <a href="{{ route('genre', 'all') }}" data-value="all" class="genre_btn">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Все жанры
                                                    </p>
                                                </a>
                                                @foreach($genres as $genre)
                                                    <a href="{{ route('genre',$genre->id) }}" class="genre_btn" data-value="{{ $genre->id }}">
                                                        <p class="text-scale pl-3 mb-2">
                                                            {{ $genre->name }}
                                                        </p>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    @elseif($category->name == 'Канцелярские товары')
                                    <div class="accordion" id="accordionExample">
                                        <div class="dropdown">
                                            <div class="dropdown-menu subgenre_btn" id="sub_genre" aria-labelledby="dropdownMenuButton" style="transform: translate3d(236px, -524px, 0px);
                                             width: 200%; min-height: 100%; padding-left: 25%; padding-right: 25%;">
                                            </div>
                                        <div class="card border-0">
                                            <div class="card-header p-0  bg-white" id="cat-{{$category->id}}">
                                                <button class="text-scale border-0 bg-white outline-none" type="button" data-toggle="collapse" data-target="#collapse-{{$category->id}}" aria-expanded="false" aria-controls="collapse-{{$category->id}}" style="margin-bottom:1rem;color:#2c3e50;">
                                                    {{$category->name}}
                                                </button>
                                            </div>

                                            <div id="collapse-{{$category->id}}" class="collapse pt-1" aria-labelledby="cat-{{$category->id}}" data-parent="#accordionExample">

                                                <a href="{{ route('genre', 'all') }}" data-value="all" class="subgenre_btn">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Все товары
                                                    </p>
                                                </a>

                                                <a href="{{ route('genre', 'ручки') }}" data-value="ручки" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                    <p class="text-scale pl-3 mb-2">
                                                        Ручки
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'тетради') }}" data-value="тетради" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Тетради
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'блокнот') }}" data-value="блокнот" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Блокноты
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'папки') }}" data-value="папки" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Папки
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'ежедневник') }}" data-value="ежедневник" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Ежедневники
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'пенал') }}" data-value="пенал" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Пеналы
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'карты') }}" data-value="атласы" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Атласы и карты
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'карандаш') }}" data-value="карандаш" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Карандаши
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'обложки') }}" data-value="обложк" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Обложки
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'Планинги') }}" data-value="планинг" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Планинги
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'Дневники') }}" data-value="дневник" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Дневники
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'Подставки') }}" data-value="подставки" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Подставки для книг
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'ленейки') }}" data-value="ленейк" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Ленейки
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'Альбомы') }}" data-value="альбомы" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Альбомы для рисования
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'Рюкзаки') }}" data-value="сумки" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Рюкзаки, сумки
                                                    </p>
                                                </a>
                                                <a href="{{ route('genre', 'Скетчпады ') }}" data-value="скетчпады" class="stationery_btn subgenre_btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Скетчпады
                                                    </p>
                                                </a>

                                            </div>
                                        </div>




                                        </div>
                                    </div>
                                @elseif($category->name == 'Мягкие игрушки')
                                    <a href="{{ route('category', $category->name) }}" class="category_btn" data-value="{{ $category->id }}">
                                        <p class="text-scale">Игрушки</p>
                                    </a>
                                @else
                                    <a href="{{ route('category', $category->name) }}" class="category_btn" data-value="{{ $category->id }}">
                                        <p class="text-scale">
                                            {{ $category->name }}
                                        </p>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-12">

                    <div class="col-12 d-lg-block d-none pb-3" id="sub_genre">

                    </div>

                    <div class="row px-lg-4 px-1 mb-4" id="books_catalog">

                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>

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
    <script src="https://pagination.js.org/dist/2.1.4/pagination.min.js"></script>
    <script>
        let params = {};
        $('#sub_genre').click(e => {
            if ($('.subgenre_btn')) {
                $('.subgenre_btn').click(e => {
                    e.preventDefault();
                    e.stopPropagation();
                    let btn = $(e.currentTarget);
                    let val = btn.data('value');
                    params.subgenre = val;
                    params.stationery = null;
                    params.genre = null;
                    params.category = null;
                    if (params.page) {
                        params.page = 1;
                    }
                    getProducts(params);

                })
            }
        })
        if ($('.subgenre_btn')) {
            $('.subgenre_btn').click(e => {
                e.preventDefault();
                e.stopPropagation();
                let btn = $(e.currentTarget);
                let val = btn.data('value');
                params.subgenre = val;
                params.stationery = null;
                params.genre = null;
                params.category = null;
                if (params.page) {
                    params.page = 1;
                }
                getProducts(params);

            })
        }
        if ($('.stationery_btn')){
            $('.stationery_btn').click(e => {
                e.preventDefault();
                e.stopPropagation();
                let btn = $(e.currentTarget);
                let val = btn.data('value');
                params.stationery = val;
                params.subgenre = val;
                params.genre = null;
                params.category = null;
                if (params.page) {
                    params.page = 1;
                }
                getGenre(params);
                getProducts(params);

            })}
        if ($('.genre_btn')){
        $('.genre_btn').click(e => {
            e.preventDefault();
            e.stopPropagation();
            let btn = $(e.currentTarget);
            let val = btn.data('value');
            params.genre = val;
            params.category = null;
            params.subgenre = null;
            params.stationery = null;
            if (params.page) {
                params.page = 1;
            }
            getProducts(params);

        })}

        if($('.category_btn')){
        $('.category_btn').click(e => {
            e.preventDefault();
            let btn = $(e.currentTarget);
            let val = btn.data('value');
            params.category = val;
            params.genre = null;
            params.subgenre = null;
            params.stationery = null;
            if(params.page) {
                params.page = 1;
            }
            getProducts(params);

        })};
        $('#search_input').keyup(e => {
            e.preventDefault();
            let input = $(e.currentTarget);
            let val = input.val();
            params.search = val;
            if (params.page) {
                params.page = 1;
            }
            getProducts(params);
        });
        $('.sort_products').click(e => {
            e.preventDefault();
            let btn = $(e.currentTarget);
            let val = btn.data('value');
            let type = btn.data('type');
            params.sortName = null;
            params.sortPrice = null;
            params.sortAuthor = null;
            params.sortIssueDate = null;
            params.sortByDiscount = null;
            params.sortByBestseller = null;
            params.sortByReviewed = null;
            $('#dropdownMenuButton').html(btn.html());
            if (params.page) {
                params.page = 1;
            }
            if (type == 'Name') {
                params.sortName = val;
            }else if (type == 'Author') {
                params.sortAuthor = val;
            }else if (type == 'Updated_at') {
                params.sortIssueDate = val;
            }else if (type == 'Discount') {
                params.sortByDiscount = val;
            }else if (type == 'Bestseller') {
                params.sortByBestseller = val;
            }else if (type == 'Reviewed') {
                params.sortByReviewed = val;
            } else {
                params.sortPrice = val;
            }
            getProducts(params);
        });
        $('#myRange').change(e => {
            let range = $(e.currentTarget);
            let val = range.val();
            params.min = val;
            params.max = 15000;
            if (params.page) {
                params.page = 1;
            }
            getProducts(params)
        });
        function registerPageButtons(data) {
            data.click(e => {
                e.preventDefault();
                let btn = $(e.currentTarget);
                let page = btn.data('page');
                if (page) {
                    params.page = page;
                    getProducts(params);
                }
            })
        }
    </script>
    <script>
        @if(request()->query('genre'))
            params.genre = '{{ request()->query('genre') }}';
        params.category = null;
        getProducts(params);
        @else
        getProducts();
        @endif
            @if(request()->query('category'))
            params.category = '{{request()->query('category')}}';
        params.genre = null;
        getProducts(params);
        @else
        getProducts();
        @endif
        function paginationWithDots(c, m) {
            var current = c,
                last = m,
                delta = 1,
                left = current - delta,
                right = current + delta + 1,
                range = [],
                rangeWithDots = [],
                l;
            for (let i = 1; i <= last; i++) {
                if (i == 1 || i == last || i >= left && i < right) {
                    range.push(i);
                }
            }
            for (let i of range) {
                if (l) {
                    if (i - l === 2) {
                        rangeWithDots.push(l + 1);
                    } else if (i - l !== 1) {
                        rangeWithDots.push('...');
                    }
                }
                rangeWithDots.push(i);
                l = i;
            }
            return rangeWithDots;
        }
        function getProducts(params = {})
        {
            $(".preloader_catalog").fadeIn(100)
            $.ajax({
                url: '{{ route('book.all') }}',
                data: params,
                success: data => {
                    let pagination = $('ul.pagination');
                    pagination.empty();
                    if (data.count) {
                        let paginationDots = paginationWithDots(data.books.current_page, data.books.last_page);
                        if (data.books.last_page > 1) {
                            if (data.books.current_page != 1) {
                                pagination.append('<li class="page-item d-none d-sm-inline-block"><a class="page-link" data-page="' + (data.books.current_page - 1) + '" href="#">Пред</a></li>');
                            }
                        }
                        for (let item of paginationDots) {
                            if (item == '...') {
                                pagination.append('<li class="disabled"><a class="page-link disabled" disabled onclick="event.preventDefault()">' + item + '</a></li>');
                            } else if (item == data.books.current_page) {
                                pagination.append('<li class="page-item active"><a class="page-link" data-page="' + item + '" href="#">' + item + '</a></li>');
                            } else {
                                pagination.append('<li class="page-item"><a class="page-link" data-page="' + item + '" href="#">' + item + '</a></li>');
                            }
                        }
                        if (data.books.last_page > 1) {
                            if (data.books.current_page != data.books.last_page) {
                                pagination.append('<li class="page-item d-none d-sm-inline-block"><a class="page-link" data-page="' + (data.books.current_page + 1) + '" href="#">След</a></li>');
                            }
                        }
                    }
                    pagination.find('.page-link').each((e, i) => {
                        registerPageButtons($(i));
                    });
                    let result = $('#books_catalog').html(data.html);
                    result.find('.buy_book').each((e, i) => {
                        registerCartBuyButtons($(i));
                    });
                    $(".preloader_catalog").fadeOut(100)
                },
                error: () => {
                    console.log('error');
                    $(".preloader_catalog").fadeOut(100)
                }
            });
        }

        function getGenre(params = {})
        {
            $(".preloader_catalog").fadeIn(100)
            $.ajax({
                url: '{{ route('genre.all') }}',
                data: params,
                success: data => {
                    var _select = document.getElementById("sub_genre");
                    _select.innerHTML = "";
                    $.each(data.genre, function(key, val) {
                        $('#sub_genre').append('<a type="button" data-value="'+ val.name +'" class="subgenre_btn ml-1"><p class="text-scale pl-3 mb-2">'+val.name+'</p></a>');
                        $('#sub_genre').addClass('show')
                    });
                    // $(".preloader_catalog").fadeOut(100)
                // <p value="' + val + '">' + val.name +
                },
                error: () => {
                    console.log('error');
                    $(".preloader_catalog").fadeOut(100)
                }
            });
        }
        window.onclick = function(event) {
            $('#sub_genre').removeClass('show');
        }
        // $('.js-close-campaign').click(function() {
        //     $('.js-overlay-campaign').fadeOut();
        // });
    </script>

    <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;
        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>
@endpush
