<?php
use Jenssegers\Agent\Agent;

$agent = new Agent();
?>
@if(!$agent->isPhone())
<nav class="navbar menuse navbar-expand-xl p-0 w-100 d-xl-block d-none" style="z-index: 999; background: transparent; position: fixed;">
    <div class="container-fluid top-menu-first px-0">
        <div class="row w-100 down-menu mx-0 align-items-center pt-0">
            <nav class="col-6 mob-padding" style="padding-left:67px;">
                <ul class="navbar-nav" id="pick">

                    <li class="nav-item">
                        <div class="dropdown open" style=" display: flex; align-items: center; text-align: center;">
                            <a class="text-fut-bold bg-transparent m-0 mx-auto pointer text-scale border-0" id="dropdownMenuButtonGenre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Книги
                            </a>
                            <div class="dropdown-menu text-fut-book scrollbar" aria-labelledby="dropdownMenuButtonGenre" style="overflow-y:scroll; height:70vh;">
                                @foreach(\App\Genre::all()->sortBy('name') as $genre)
                                    <p class="px-3 pb-2 mb-0">
                                        <a href="{{ route('catalog',["genre" => $genre->id]) }}">
                                    {{ $genre->name }}
                                        </a>
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    </li>
<!--                     <li class="nav-item">
                        <a href="/new_books" class="text-fut-bold text-scale">Новинки</a>
                    </li>
                    <li class="nav-item">
                        <a href="/promo_books" class="text-fut-bold text-scale">Акции</a>
                    </li>
                    <li class="nav-item">
                        <a href="/comp_books" class="text-fut-bold text-scale">Подборки</a>
                    </li> -->

                    <li class="nav-item">
                        <a href="{{ route('catalog', ['category' => 1]) }}" class="text-fut-bold text-scale">Канцтовары</a>
                    </li>

                    <li class="nav-item">
                        <a href="/catalog" class="text-fut-bold text-scale">Магазин</a>
                    </li>

<!--                     <li class="nav-item">
                        <a href="/news" class="text-fut-bold text-scale">Новости</a>
                    </li>
 -->                    <li class="nav-item">
                        <a href="/contacts" class="text-fut-bold text-scale">Контакты</a>
                    </li>
                    <li class="nav-item">
                        <a href="/delivery" class="text-fut-bold text-scale d-block" style="width:125px;">Доставка и оплата</a>
                    </li>
                    <li class="nav-item">
                        <a href="/partners" class="text-fut-bold text-scale">Сотрудничество</a>
                    </li>
                </ul>
            </nav>
            <nav class="col-6 d-flex justify-content-end pr-0">
              <ul class="navbar-nav w-100 justify-content-end">
                <li class="nav-item w-100 needToMoveFirst">

                </li>
                @guest
                  <li class="nav-item scroll-none d-none">
                      <a href="/login" class="text-fut-bold text-scale">Войти</a>
                  </li>
                @else
                  <div class="scroll-none dropdown d-none">
                    <img src="{{asset('images/book1.svg')}}" alt="">
                    <button class="text-fut-bold text-scale dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Мой эрудит
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      @if(Auth::user()->role_id == 2)
                        <a href="{{ route('user.index') }}" class="text-fut-book but-hov dropdown-item" data-aos="fade-up" style="font-size: 13px; color:#444!important; padding: 5px 15px; background-color: transparent; border: 1px rgba(34,34,34,0.36) solid; text-decoration: none;">
                            Личный Кабинет
                        </a>
                      @endif
                      <a class="text-fut-book pl-3 text-scale" style="font-size: 15px; color:#444; padding:5px 15px;" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                          {{ __('Выход') }}
                      </a>
                    </div>
                  </div>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                @endguest
                <li class="nav-item links">
                    <a href="tel:+996 551 433 433" class="text-fut-bold text-scale icon-animated"><img class="icon-flip" src="{{asset('images/phone.svg')}}" alt=""></a>
                </li>
                <li class="nav-item links">
                    <a href="https://api.whatsapp.com/send?phone=996551433433" class="text-fut-book icon-animated"><img class="icon-flip" src="{{asset('images/whatsapp.svg')}}" alt=""></a>
                </li>
                <li class="nav-item links">
                    <a href="https://www.instagram.com/erudit_kg/?hl=ru" class="text-fut-book icon-animated"><img class="icon-flip" src="{{asset('images/instagram.svg')}}" alt=""></a>
                </li>
                <li class="nav-item links">
                    <a href="#" class="text-fut-book icon-animated"><img class="icon-flip" src="{{asset('images/telegram.svg')}}" alt=""></a>
                </li>
                <li class="nav-item position-relative pr-0">
                  <a href="{{ route('cart.checkout') }}" class="text-fut-book cart d-flex">
                    <div class="badge badge-danger rounded-circle shadow small position-absolute cart-count justify-content-center align-items-center" style="width: 21px; height: 21px;top: 5px; left: 18px;"></div>
                    <img class="icon-flip" src="{{ asset('images/bag.svg') }}" alt="">
                    <p  class="text-fut-bold text-scale mb-0">Корзина</p>
                  </a>
                </li>
              </ul>
            </nav>
        </div>
    </div>
    <div class="container-fluid top-menu">
        <div class="row w-100">
            <div class="col-12 px-0 collapse navbar-collapse"  id="navbarSupportedContent">
                <li class="nav-item">
                  <a href="/">
                    <img class="logo" src="{{ asset('images/logo.png') }}" alt="">
                  </a>
                </li>
                <li class="nav-item w-100 needToMoveSecond">
                  <div class="w-100 search-main">
                    <input type="text" class="border-0 form-control input-without-focus w-100 text-fut-book" id="search-input-select2" placeholder="Поиск..." style="max-width:589px;">
                    <div id="resulter" class="bg-white shadow position-absolute" style="top:63px;z-index: 99;">
                        <a id="all_results_btn_a" href=""><button class="btn btn-default p-2 ml-2" id="all_results_btn_inner">Все результаты</button></a>
                        <div id="search-result-select2" class="position-relative" style="z-index: 4;"></div>
                    </div>
                  </div>
                </li>
                @guest
                    <li class="nav-item">
                        <a href="/login" class="text-fut-bold text-scale" style="color: #fff!important;">Войти</a>
                    </li>
                    <li class="nav-item d-flex" style="padding-right:8px;">
                      <img src="{{asset('images/shopping-bag.svg')}}" alt="">
                      <a href="/login" class="text-fut-bold"  style="color: #fff!important; background-color: transparent;width:180px;padding-left: 8px">
                          Оптовым покупателям
                      </a>
                    </li>
                @else
                <li class="nav-item" style="padding-right:24px;">
                  <div class="dropdown" style="width:125px;">
                    <img src="{{asset('images/book1-w.svg')}}" alt="">
                    <button class="text-fut-bold text-scale dropdown-toggle pr-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #6FA6AC;color:#fff;">
                      Мой эрудит
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      @if(Auth::user()->role_id == 2)
                        <a href="{{ route('user.index') }}" class="text-fut-book but-hov dropdown-item" data-aos="fade-up" style="font-size: 13px; color:#444!important; padding: 5px 15px; background-color: transparent; border: 1px rgba(34,34,34,0.36) solid; text-decoration: none;">
                            Личный Кабинет
                        </a>
                      @endif
                      <a class="text-fut-book pl-3 text-scale" style="font-size: 15px; color:#444; padding:5px 15px;" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                          {{ __('Выход') }}
                      </a>
                    </div>
                  </div>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </li>
                @endguest

            </div>
        </div>
    </div>
</nav>
@else
<nav class="px-0 navbar solid-nav navbar-expand-xl py-0 w-100 bg-white d-xl-none d-block" style="z-index: 999; position: fixed;">
    <div class="container-fluid">
        <div class="row align-items-center w-100 justify-content-end">
            <div class="col-12 pl-0 my-auto d-flex" style="height: 33px;padding-right:8px;">
                <div class="hamburger hamburger--collapse" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
                <ul class="navbar-nav w-100 justify-content-start align-items-center flex-row">
                  <li class="nav-item  mob-links">
                      <a href="tel:+996 551 433 433" class="text-fut-bold text-scale icon-animated"><img class="icon-flip" src="{{asset('images/mob-phone.svg')}}" alt=""></a>
                  </li>
                  <li class="nav-item  mob-links">
                      <a href="https://api.whatsapp.com/send?phone=996551433433" class="text-fut-book icon-animated"><img class="icon-flip" src="{{asset('images/mob-whatsapp.svg')}}" alt=""></a>
                  </li>
                  <li class="nav-item  mob-links">
                      <a href="https://www.instagram.com/erudit_kg/?hl=ru" class="text-fut-book icon-animated"><img class="icon-flip" src="{{asset('images/mob-instagram.svg')}}" alt=""></a>
                  </li>
                  <li class="nav-item  mob-links">
                      <a href="#" class="text-fut-book icon-animated"><img class="icon-flip" src="{{asset('images/mob-telegram.svg')}}" alt=""></a>
                  </li>
                  <li class="nav-item position-relative mob-links ml-auto pr-0 mr-0">
                    <a href="{{ route('cart.checkout') }}" class="text-fut-book cart d-flex">
                      <div class="badge badge-danger rounded-circle shadow small position-absolute cart-count justify-content-center align-items-center" style="width: 12px; height: 12px;top: -7px; right: 12px;"></div>
                      <img class="icon-flip" src="{{ asset('images/mob-bag.svg') }}" alt="">
                    </a>
                  </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse col-md-11 col-12"  id="navbarSupportedContent">
                <nav class="mr-auto ml-0" style="max-height: 400px; overflow-y: auto;">
                    <ul class="navbar-nav mb-3">
                        <li class="nav-item px-3 my-2">
                            <a href="/" class="text-fut-book" style="text-decoration: none; color: #444444; font-size: 17px;">Главная</a>
                        </li>

                        <li class="nav-item dropdown px-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Книги
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach(\App\Genre::all()->sortBy('name') as $genre)
                                    <p class="px-3 pb-2 mb-0">
                                        <a href="{{ route('catalog',["genre" => $genre->id]) }}">
                                            {{ $genre->name }}
                                        </a>
                                    </p>
                                @endforeach
                            </div>
                        </li>


                        <li class="nav-item px-3 my-2">
                            <a href="/new_books" class="text-fut-book" style="text-decoration: none; color: #444444; font-size: 17px;">Новинки</a>
                        </li>
                        <li class="nav-item px-3 my-2">
                            <a href="/promo_books" class="text-fut-book" style="text-decoration: none; color: #444444; font-size: 17px;">Акции</a>
                        </li>
                        <li class="nav-item px-3 my-2">
                            <a href="/comp_books" class="text-fut-book" style="text-decoration: none; color: #444444; font-size: 17px;">Подборки</a>
                        </li>
                        <li class="nav-item px-3 my-2">
                            <a href="{{ route('catalog', ["category" => 1]) }}" class="text-fut-book" style="text-decoration: none; color: #444444; font-size: 17px;">Канцтовары</a>
                        </li>

                        <li class="nav-item px-3 my-2">
                            <a href="/catalog" class="text-fut-book" style="text-decoration: none; color: #444444; font-size: 17px;">Магазин</a>
                        </li>

                        <li class="nav-item px-3 my-2">
                            <a href="/news" class="text-fut-book" style="text-decoration: none; color: #444444; font-size: 17px;">Новости</a>
                        </li>

                        <li class="nav-item px-3 my-2">
                            <a href="/delivery" class="text-fut-book" style="text-decoration: none; color: #444444; font-size: 17px;">Доставка и оплата</a>
                        </li>
                        <li class="nav-item px-3 my-2">
                            <a href="#" class="text-fut-book" style="text-decoration: none; color: #444444; font-size: 17px;">Возврат</a>
                        </li>
                        <li class="nav-item px-3 my-2">
                            <a href="/partners" class="text-fut-book" style="text-decoration: none; color: #444444; font-size: 17px;">Сотрудничество</a>
                        </li>
                        <li class="nav-item px-3 my-2">
                            <a href="/contacts" class="text-fut-book" style="text-decoration: none; color: #444444; font-size: 17px;">Контакты</a>
                        </li>


                        <li class="nav-item px-3 my-2">
                            <a href="tel:+996 551 433 433" class="text-fut-book" style="text-decoration: underline; font-size: 14px; line-height: 17px; text-align: center; text-transform: uppercase; color: #444444;">+996 551 433 433</a>
                        </li>
                        <li class="nav-item px-3 my-2">
                            <a href="https://www.instagram.com/erudit_kg/?hl=ru" class="text-fut-book p-1" style="text-decoration: none; color: #444444;"><i class="fab fa-instagram fa-lg icon-flip"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=996551433433" class="text-fut-book p-1" style="text-decoration: none; color: #444444;"><i class="fab fa-whatsapp fa-lg icon-flip"></i></a>
                        </li>
                        @guest
                        <li class="nav-item px-3">
                            <a href="/login" class="text-fut-book text-scale" style="font-size: 14px; line-height: 17px; text-align: center; text-transform: uppercase; color: #444444;">Войти</a>
                        </li>
                            @else
                            <a class="text-fut-book pl-3 text-scale" style="font-size: 15px; color:#444; padding:5px 15px;" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Выход') }}
                            </a>

                        @endguest

                        @guest
                        <li class="nav-item px-3 my-2">
                            <a href="/login" class="text-fut-bold" data-aos="fade-up" style="padding: 5px 15px; background-color: transparent; border: 1px #444 solid;">
                                Оптовым покупателям
                            </a>
                        </li>
                            @else
                                @if(Auth::user()->role_id != 3)
                                <li class="nav-item px-3 my-2">
                                    <button class="text-fut-bold" data-aos="fade-up" style="padding: 5px 15px; background-color: transparent; border: 1px #444 solid;">
                                        Личный кабинет
                                    </button>
                                </li>
                                @endif
                        @endguest
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="row w-100 mx-0  mob-menu" style="background: #6FA6AC;height: 80px;">
        <div class="col-12 mob" style="padding:0 8px;">
          <ul class="navbar-nav justify-content-start align-items-center flex-row h-100">
            <li class="nav-item" style="width:85px;">
              <a href="/">
                <img class="logo" src="{{ asset('images/logo-mob.png') }}" alt="">
              </a>
            </li>
            @guest
              <li class="nav-item ml-auto">
                  <a href="/login" class="text-fut-bold text-scale" style="color:#fff;">Войти</a>
              </li>
            @else
            <li class="nav-item ml-auto">
              <div class="dropdown" style="width:130px;">
                <img src="{{asset('images/book1-w.svg')}}" alt="">
                <button class="text-fut-bold text-scale dropdown-toggle pr-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #6FA6AC;color:#fff;">
                  Мой эрудит
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  @if(Auth::user()->role_id == 2)
                    <a href="{{ route('user.index') }}" class="text-fut-book but-hov dropdown-item" data-aos="fade-up" style="font-size: 13px; color:#444!important; padding: 5px 15px; background-color: transparent; border: 1px rgba(34,34,34,0.36) solid; text-decoration: none;">
                        Личный Кабинет
                    </a>
                  @endif
                  <a class="text-fut-book pl-3 text-scale" style="font-size: 15px; color:#444; padding:5px 15px;" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      {{ __('Выход') }}
                  </a>
                </div>
              </div>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
            @endguest
            </ul>
        </div>
        <div class="col-12 mob" style="padding:0 8px;">
          <ul>
            <li class="nav-item w-100">
              <div class="w-100 search-main">
                <input type="text" class="border-0 form-control input-without-focus w-100 text-fut-book" id="search-input-select2" placeholder="Поиск...">
                <div id="resulter" class="bg-white shadow position-absolute" style="top:63px;z-index: 99;">
                    <a id="all_results_btn_a" href=""><button class="btn btn-default p-2 ml-2" id="all_results_btn_inner">Все результаты</button></a>
                    <div id="search-result-select2" class="position-relative" style="z-index: 4;"></div>
                </div>
              </div>
            </li>
          </ul>
        </div>
  </div>
</nav>
@endif
@push('scripts')
    <script>


        $('#dropdownMenuButtonGenre').hover(e => {
            let btn = $(e.currentTarget);
            let dropdown = btn.siblings('.dropdown-menu');

            dropdown.addClass('show');
            dropdown.hover(e => {
                $(e.currentTarget).addClass('show');
            }, e => {
                $(e.currentTarget).removeClass('show');
            });
        }, e => {
            let btn = $(e.currentTarget);
            let dropdown = btn.siblings('.dropdown-menu');

            dropdown.removeClass('show');
        });
    </script>

    <script>
        $('.hamburger').click(e => {
            let status = $('.hamburger').attr('aria-expanded');
            if (status != 'true') {
                $('.hamburger').addClass('is-active');
            }
            if (status != 'false') {
                $('.hamburger').removeClass('is-active');
            }
        });
    </script>
@endpush
