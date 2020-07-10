@extends('layouts.app')
@section('content')
    <div style="padding-top: 15%; padding-bottom: 10%;">
        <div class="container mt-lg-0 mt-5">
            <div class="row">
{{--                @foreach($book->genre as $genre)--}}
{{--                    <span>--}}
{{--                        <i class="fas fa-arrow-right fa-sm"> </i>--}}
{{--                    </span>--}}
{{--                    <span class="text-fut-book"> <a href="/search_genre?search={{$genre->id}}"><i class="fas fa-arrow-right fa-sm"> </i> {{ $genre->name }} </a></span>--}}
{{--                @endforeach--}}

                <div class="col-12 px-6 d-lg-none d-block">
                    <span class="text-fut-light">
                        <a href="/">Главная</a>
                    </span>
                    @foreach($book->genre as $genre)
                        <span>
                        <i class="fas fa-arrow-right fa-sm"> </i>
                    </span>
                        <span class="text-fut-book"> <a href="/search_genre?search={{$genre->id}}"><i class="fas fa-arrow-right fa-sm"> </i> {{ $genre->name }} </a></span>
                    @endforeach
                    <span>
                        {{ \Illuminate\Support\Str::limit($book->name,30,'...') }}
                    </span>
                </div>
                <div class="col-lg-3 col-12 p-4">
                    <div style="position: relative;">
                        @if (filter_var($book->image, FILTER_VALIDATE_URL))
                            <img class="w-100" style="height: 275px; object-fit: contain;" src="{{ $book->image }}" alt="">
                        @else
                            <img class="w-100" style="height: 275px;object-fit: contain;" src="{{ asset('storage/'.$book->image)}}" alt="">
                        @endif

{{--                        <img class="w-100 shadow-lg" src="{{ asset('storage/books/'.$book->image) }}" alt="">--}}
                        @if(isset($book->discount))
                        <div class="discount-plate d-flex align-items-center" style="background-color: #4d86ff; position: absolute; right:0%; top:0%;  width:59px; height:54px; border-bottom-left-radius: 50%;"><span class="mx-auto text-white">-{{$book->discount}}%</span></div>
                            @elseif($book->bestseller == 1)
                                <div class="discount-plate d-flex align-items-center"
                                     style="background-color: #fff9c6; position: absolute; right:0%; top:0%;  width:59px; height:54px; border-bottom-left-radius: 50%;">
                                    <span class="mx-auto text-fut-bold" style="color:#ff5e00;"><i class="fas fa-award fa-2x"></i></span></div>
                            @elseif($book->new == 1)
                                <div class="discount-plate d-flex align-items-center"
                                     style="background-color: #ff0c13; position: absolute; right:0%; top:0%;  width:59px; height:54px; border-bottom-left-radius: 50%;">
                                    <span class="mx-auto text-white">NEW</span></div>
                            @endif
                    </div>
                </div>
                <div class="col-lg-9 col-12 pt-4">
                    <div class="row">
                    <div class="col-12 d-lg-block d-none">
                        <span class="text-fut-book">
                        <a href="/">Главная</a>
                        </span>

                            @foreach($book->genre as $genre)

                            <span class="text-fut-book"> <a href="/search_genre?search={{$genre->id}}"><i class="fas fa-arrow-right fa-sm"> </i> {{ $genre->name }} </a></span>
                        @endforeach


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
                                    @if($book->author)
                                    <div class="col-6">
                            <!--             <p class="text-fut-light font-weight-bold"><strong class="text-fut-bold">Автор:</strong><a href="/search_author?search={{$book->author}}"> {{ $book->author }}</a></p> -->
                                        <?php
                                            $authors_all = explode(',', $book->author);
                                         ?>
                                        <p class="text-fut-light font-weight-bold"><strong class="text-fut-bold">Автор:</strong>
                                         @foreach($authors_all as $author_1)
                                            <a href="/search_author?search={{$author_1}}"> {{ $author_1 }}</a>
                                         @endforeach
                                         </p>
                                    </div>
                                    @endif
                                    @if($book->publishing)
                                        <?php
                                            $publishing_split = explode(',', $book->publishing);
                                         ?>

                                            <div class="col-6">
                                        <p class="text-fut-light font-weight-bold"><strong class="text-fut-bold">Издательство:</strong> <a href="/search_publisher?search={{$publishing_split[0]}}">{{ $book->publishing }}</a></p>
                                            </div>
                                                @endif
                                    @if($book->series)
                                            <div class="col-6">
                                        <p class="text-fut-light font-weight-bold"><strong class="text-fut-bold">Серия:</strong> <a href="/search_series?search={{$book->series}}">{{ $book->series }}</a></p>
                                            </div>
                                    @endif
                                    @if($book->isbn)
                                            <div class="col-6">
                                        <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">ISBN:</strong> {{ $book->isbn }}</p>
                                            </div>
                                    @endif
                                    @if($book->pages)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Кол-во страниц:</strong> {{ $book->pages }}</p>
                                            </div>
                                    @endif
                                    @if($book->weight)
                                            <div class="col-6">
                                        <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Вес:</strong> {{ $book->weight }}</p>
                                            </div>
                                    @endif
                                    @if($book->dimension)
                                            <div class="col-6">
                                        <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Размеры:</strong> {{ $book->dimension }}</p>
                                            </div>
                                    @endif
                                        @if($book->age_restr)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Возрастное ограничение:</strong> {{ $book->age_restr }}</p>
                                            </div>
                                        @endif
                                        @if($book->decor)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Оформление:</strong> {{ $book->decor }}</p>
                                            </div>
                                        @endif
                                        @if($book->editor)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Редактор:</strong> {{ $book->editor }}</p>
                                            </div>
                                        @endif
                                        @if($book->translator)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Переводчик:</strong> {{ $book->translator }}</p>
                                            </div>
                                        @endif
                                        @if($book->book_form)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Формат книги:</strong> {{ $book->book_form }}</p>
                                            </div>
                                        @endif
                                        @if($book->binding)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Переплет:</strong> {{ $book->binding }}</p>
                                            </div>
                                        @endif
                                        @if($book->paper_type)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Тип бумаги:</strong> {{ $book->paper_type }}</p>
                                            </div>
                                        @endif
                                        @if($book->tiraj)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Тираж:</strong> {{ $book->tiraj }}</p>
                                            </div>
                                        @endif
                                        @if($book->issue_date)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Дата издания:</strong> {{ $book->issue_date }}</p>
                                            </div>
                                        @endif
                                        @if($book->language)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Язык:</strong> {{ $book->language }}</p>
                                            </div>
                                        @endif
                                        @if($book->artist)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Художник:</strong> {{ $book->artist }}</p>
                                            </div>
                                        @endif
                                        @if($book->original_name)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Оригинальное название:</strong> {{ $book->original_name }}</p>
                                            </div>
                                        @endif
                                        @if($book->illustrations)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Иллюстрации:</strong> {{ $book->illustrations }}</p>
                                            </div>
                                        @endif
                                        @if($book->illustrations_type)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Тип иллюстраций:</strong> {{ $book->illustrations_type }}</p>
                                            </div>
                                        @endif
                                        @if($book->cover_type)
                                            <div class="col-6">
                                                <p class="text-fut-light font-weight-bold"><strong class="text-fut-book">Тип обложки:</strong> {{ $book->cover_type }}</p>
                                            </div>
                                        @endif

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
                                            <img class="w-100 h-100" style="height: 350px; object-fit: contain;" src="{{ $same->image }}" alt="">
                                        @else
                                            <img class="w-100 h-100" style="height: 350px; object-fit: contain;" src="{{ asset('storage/'.$same->image)}}" alt="">
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







        @guest
            <button data-toggle="modal" data-target="#user_register_modal" class="text-fut-bold mt-5 pointer" data-aos="fade-up" style="padding: 15px 23px; background-color: #4d86ff; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25); border:0; color: white;">
                Зарегистрируйтесь или войдите чтобы оставить рецензию
            </button>
            <?php
                Session::put('link', Request::url());
             ?>
        @endguest
        @auth
            <button data-toggle="modal" data-target="#book_feedback" class="text-fut-bold mt-5 pointer" data-aos="fade-up" style="padding: 15px 23px; background-color: #4d86ff; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25); border:0; color: white;">
                Оставить рецензию
            </button>
        @endauth






        </div>
    </div>
    @include('modals.book_feedbacks')
    @include('modals.user_register')
@endsection
