<nav class="navbar menuse navbar-expand-xl py-3 w-100 pr-0 d-md-block d-none" style="z-index: 999; background: transparent; position: fixed;">
    <div class="container-fluid top-menu">
        <div class="row w-100 mx-5 pb-3" style="border-bottom: 1px #D9D9D9 solid;">
            <div class="col-lg-5 collapse navbar-collapse">
                <nav class="mr-md-auto ml-0">
                    <ul class="navbar-nav" id="pick">
                        <li class="nav-item px-3">
                            <a href="#" class="text-fut-book text-scale" style="text-decoration: none; color: #686868;">Контакты</a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="#" class="text-fut-book text-scale" style="text-decoration: none; color: #686868;">Доставка и оплата</a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="#" class="text-fut-book text-scale" style="text-decoration: none; color: #686868;">Возврат</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2 col-8 collapse navbar-collapse"  id="navbarSupportedContent">
                <a href="/">
                <img class="logo" src="{{ asset('images/logo.png') }}" alt="">
                </a>
            </div>
            <div class="col-lg-5 collapse navbar-collapse">
                <nav class="ml-md-auto ml-0">
                    <ul class="navbar-nav" id="pick">
                        <li class="nav-item px-3">
                            <a href="https://www.instagram.com/erudit_kg/?hl=ru" class="text-fut-book" style="text-decoration: none; color: #222222;"><i class="fab fa-instagram fa-lg icon-flip"></i></a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="https://api.whatsapp.com/send?phone=996551433433" class="text-fut-book" style="text-decoration: none; color: #222222;"><i class="fab fa-whatsapp fa-lg icon-flip"></i></a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="#" class="text-fut-book text-scale" style="text-decoration: underline; font-size: 14px; line-height: 17px; text-align: center; text-transform: uppercase; color: #222222;">+996 501 433 433</a>
                        </li>

                        <li class="nav-item px-3">
                            <a href="#" class="text-fut-book cart" style="text-decoration: none; color: #222222;"><i style="color: black;" class="fas fa-cart-plus fa-lg icon-flip"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row w-100 pt-4 down-menu mx-5">
            <nav class="col-6 pt-1">
                <ul class="navbar-nav" id="pick">
                    <li class="nav-item px-3">
                        <a href="/" class="text-fut-book text-scale" style="text-decoration: none; color: #222222; font-size: 17px; width:70px;">Главная</a>
                    </li>
                    <li class="nav-item px-3">
                        <a href="/catalog" class="text-fut-book text-scale" style="text-decoration: none; color: #222222; font-size: 17px; width:70px;">Магазин</a>
                    </li>
                    <li class="nav-item px-3">
                        <div class="dropdown open" style=" display: flex; align-items: center; text-align: center; width:70px;">
                            <a class="dropdown-toggle text-fut-book bg-transparent m-0 mx-auto pointer text-scale" style="border:0; font-size:17px; color: #000000;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Жанры
                            </a>
                            <div class="dropdown-menu text-fut-book" aria-labelledby="dropdownMenuButton">
                                @foreach(\App\Genre::all() as $genre)
                                    <p class="px-3 pb-2 mb-0">
                                        <a href="/catalog">
                                    {{ $genre->name }}
                                        </a>
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item px-3">
                        <a href="#" class="text-fut-book text-scale" style="text-decoration: none; color: #222222; font-size: 17px; width:70px;">Новинки</a>
                    </li>
                    <li class="nav-item px-3">
                        <a href="#" class="text-fut-book text-scale" style="text-decoration: none; color: #222222; font-size: 17px; width:70px;">Канцтовары</a>
                    </li>
                    <li class="nav-item px-3">
                        <a href="{{ route('news.index') }}" class="text-fut-book text-scale" style="text-decoration: none; color: #222222; font-size: 17px; width:70px;">Новости</a>
                    </li>

                </ul>
            </nav>
            <div class="col-6">
                <div class="row justify-content-end">
                <ul class="navbar-nav text-right" id="pick">

                <li class="nav-item px-3 mr-4 pt-1 ico-menu" style="display: none;">
                    <a href="#" class="text-fut-book cart" style="text-decoration: none; color: #222222;"><i style="color: black;" class="fas fa-cart-plus fa-lg icon-flip"></i></a>
                </li>
                    @guest
                            <a href="/login" class="text-fut-book but-hov" data-aos="fade-up" style="color: black!important; padding: 5px 15px; background-color: transparent; border: 1px #000000 solid;">
                                Оптовым покупателям
                            </a>
                    @else
                            <a href="{{ route('user.index') }}" class="text-fut-book but-hov" data-aos="fade-up" style="color:black!important; padding: 5px 15px; background-color: transparent; border: 1px #000000 solid;">
                                Личный кабинет
                            </a>
                        <a class="text-dark pl-3 text-scale" style="padding:5px 15px;" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Выход') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<nav class="px-0 navbar solid-nav navbar-expand-xl py-1 w-100 bg-white d-md-none d-block" style="z-index: 999; position: fixed;">
    <div class="container-fluid">
        <div class="row w-100 justify-content-end">
            <div class="col-9 text-left pl-0">
                <a href="/">
                <img src="{{ asset('images/logo2.png') }}" alt="">
                </a>
            </div>
            <div class="col-auto my-auto d-xl-none">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fas fa-bars fa-lg text-doc "></i>
                </button>
            </div>
            <div class="collapse navbar-collapse col-md-11 col-12"  id="navbarSupportedContent">
                <nav class="mr-auto ml-0">
                    <ul class="navbar-nav mb-3">
                        <li class="nav-item px-3 my-2">
                            <a href="/" class="text-fut-book" style="text-decoration: none; color: #222222; font-size: 17px;">Главная</a>
                        </li>
                        <li class="nav-item px-3 my-2">
                            <a href="/catalog" class="text-fut-book" style="text-decoration: none; color: #222222; font-size: 17px;">Магазин</a>
                        </li>
                        <li class="nav-item px-3">
                            <div class="dropdown open" style=" display: flex; align-items: center; text-align: center; width:70px;">
                                <a class="dropdown-toggle text-fut-book bg-transparent m-0 mx-auto pointer text-scale" style="border:0; font-size:17px; color: #000000;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Жанры
                                </a>
                                <div class="dropdown-menu text-fut-book" aria-labelledby="dropdownMenuButton">
                                    @foreach(\App\Genre::all() as $genre)
                                        <p class="px-3 pb-2 mb-0">
                                            <a href="/catalog">
                                                {{ $genre->name }}
                                            </a>
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li class="nav-item px-3 my-2">
                            <a href="/catalog" class="text-fut-book" style="text-decoration: none; color: #222222; font-size: 17px;">Новинки</a>
                        </li>
                        <li class="nav-item px-3 my-2">
                            <a href="/catalog" class="text-fut-book" style="text-decoration: none; color: #222222; font-size: 17px;">Канцтовары</a>
                        </li>

                        <li class="nav-item px-3 my-2">
                            <a href="tel:+996 501 433 433" class="text-fut-book" style="text-decoration: underline; font-size: 14px; line-height: 17px; text-align: center; text-transform: uppercase; color: #222222;">+996 501 433 433</a>
                        </li>
                        <li class="nav-item px-3 my-2">
                            <a href="https://www.instagram.com/erudit_kg/?hl=ru" class="text-fut-book" style="text-decoration: none; color: #222222;"><i class="fab fa-instagram fa-lg icon-flip"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=996551433433" class="text-fut-book pl-5" style="text-decoration: none; color: #222222;"><i class="fab fa-whatsapp fa-lg icon-flip"></i></a>
                        </li>
                        <li class="nav-item px-3 my-2">
                            <a href="#" class="text-fut-book cartcart" style="text-decoration: none; color: #222222;"><i style="color: black;" class="fas fa-cart-plus fa-lg icon-flip"></i></a>
                        </li>
                        @guest
                        <li class="nav-item px-3 my-2">
                            <a href="/login" class="text-fut-bold" data-aos="fade-up" style="padding: 5px 15px; background-color: transparent; border: 1px #000000 solid;">
                                Оптовым покупателям
                            </a>
                        </li>
                            @else
                            <li class="nav-item px-3 my-2">
                                <button class="text-fut-bold" data-aos="fade-up" style="padding: 5px 15px; background-color: transparent; border: 1px #000000 solid;">
                                    Личный кабинет
                                </button>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</nav>


