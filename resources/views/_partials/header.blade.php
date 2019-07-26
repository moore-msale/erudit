<nav class="navbar menuse navbar-expand-xl py-3 w-100 pr-0 d-md-block d-none" style="z-index: 999; background: transparent; position: fixed;">
    <div class="container-fluid top-menu">
        <div class="row w-100 mx-5 pb-3" style="border-bottom: 1px #D9D9D9 solid;">
            <div class="col-lg-5 collapse navbar-collapse">
                <nav class="mr-md-auto ml-0">
                    <ul class="navbar-nav" id="pick">
                        <li class="nav-item px-3">
                            <a href="#" class="text-fut-book" style="text-decoration: none; color: #686868;">Контакты</a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="#" class="text-fut-book" style="text-decoration: none; color: #686868;">Доставка и оплата</a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="#" class="text-fut-book" style="text-decoration: none; color: #686868;">Возврат</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2 col-8 collapse navbar-collapse"  id="navbarSupportedContent">
                <img class="logo" src="{{ asset('images/logo.png') }}" alt="">
            </div>
            <div class="col-lg-5 collapse navbar-collapse">
                <nav class="ml-md-auto ml-0">
                    <ul class="navbar-nav" id="pick">
                        <li class="nav-item px-3">
                            <a href="#" class="text-fut-book" style="text-decoration: none; color: #222222;"><i class="fab fa-instagram fa-lg"></i></a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="#" class="text-fut-book" style="text-decoration: none; color: #222222;"><i class="fab fa-whatsapp fa-lg"></i></a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="#" class="text-fut-book" style="text-decoration: underline; font-size: 14px; line-height: 17px; text-align: center; text-transform: uppercase; color: #222222;">+996 501 433 433</a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="#" class="text-fut-book" style="text-decoration: none; color: #222222;"><img
                                        src="{{ asset('images/favourite.png') }}" alt=""></a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="#" class="text-fut-book" style="text-decoration: none; color: #222222;"><img
                                        src="{{ asset('images/cart.png') }}" alt=""></a>
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
                        <a href="#" class="text-fut-book" style="text-decoration: none; color: #222222; font-size: 17px;">Главная</a>
                    </li>
                    <li class="nav-item px-3">
                        <a href="#" class="text-fut-book" style="text-decoration: none; color: #222222; font-size: 17px;">Магазин</a>
                    </li>
                    <li class="nav-item px-3">
                        <a href="#" class="text-fut-book" style="text-decoration: none; color: #222222; font-size: 17px;">Жанры</a>
                    </li>
                    <li class="nav-item px-3">
                        <a href="#" class="text-fut-book" style="text-decoration: none; color: #222222; font-size: 17px;">Жанры</a>
                    </li>
                    <li class="nav-item px-3">
                        <a href="#" class="text-fut-book" style="text-decoration: none; color: #222222; font-size: 17px;">Новинки</a>
                    </li>
                    <li class="nav-item px-3">
                        <a href="#" class="text-fut-book" style="text-decoration: none; color: #222222; font-size: 17px;">Канцтовары</a>
                    </li>

                </ul>
            </nav>
            <div class="col-6 text-right">
                <button class="text-fut-bold" data-aos="fade-up" style="padding: 5px 15px; background-color: transparent; border: 1px #000000 solid;">
                    Оптовым покупателям
                </button>
            </div>
        </div>
    </div>
</nav>
{{--<nav class="navbar menuse navbar-expand-xl py-0 w-100 pr-0 bg-white d-md-none d-block" style="z-index: 999; background: black!important; position: fixed;">--}}
    {{--<div class="container-fluid">--}}
        {{--<div class="row w-100">--}}
            {{--<div class="col-md-4 col-6 px-4 py-2">--}}
                {{--<a href="/">--}}
                    {{--<img class="w-50 my-auto" src="{{asset('images/MOORE.png')}}" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-auto my-auto ml-auto d-xl-none px-0">--}}
                {{--<button class="text-white navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
                    {{--<img class="w-75" src="{{ asset('images/humburger.png') }}" alt="">--}}
                {{--</button>--}}
            {{--</div>--}}
            {{--<div class="collapse navbar-collapse col-md-11 col-8"  id="navbarSupportedContent">--}}
                {{--<nav class="ml-md-auto ml-0">--}}
                    {{--<ul class="navbar-nav" id="pick">--}}
                        {{--<li class="nav-item p-2">--}}
                            {{--<a href="/" class="text-white text-fut-bold" style="text-decoration: none; font-size: 16px;">Главная</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item p-2 ">--}}
                            {{--<a href="/portfolio" class="text-white text-fut-bold" style="text-decoration: none; font-size: 16px;">Портфолио</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item p-2">--}}
                            {{--<a href="/jobs" class="text-white text-fut-bold" style="text-decoration: none; font-size: 16px;">Вакансии</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item p-2">--}}
                            {{--<a href="#" class="text-white text-fut-bold" style="text-decoration: none; font-size: 16px;">Контакты</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</nav>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}
{{--<div id="mySidenav" class="sidenav d-md-block d-none">--}}
    {{--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>--}}
    {{--<a class="sf-medium pl-5" href="/jobs">  Вакансии</a>--}}
    {{--<a class="sf-medium pl-5" href="/portfolio"> Портфолио</a>--}}
    {{--<a class="sf-medium pl-5" href="tel: +996 709 111 143"> +996 709 111 143</a>--}}
    {{--<a class="sf-medium pl-5" href="tel: +996 771 044 429">+996 771 044 429</a>--}}
    {{--<a class="sf-medium pl-5" href="mailto: info@to-moore.com">info@to-moore.com</a>--}}
    {{--<div class="container-fluid pt-5 pl-4 ml-2">--}}
        {{--<div class="row">--}}

            {{--<div class="col-3 p-0">--}}
                {{--<a href="" class="ics">--}}
                    {{--<p>--}}
                        {{--<i class="fab fa-behance fa-sm"></i>--}}
                    {{--</p>--}}
                {{--</a>--}}
            {{--</div>--}}

            {{--<div class="col-3 p-0">--}}
                {{--<a href="" class="ics">--}}
                    {{--<p>--}}
                        {{--<i class="fab fa-instagram fa-sm"></i>--}}
                    {{--</p>--}}
                {{--</a>--}}
            {{--</div>--}}

            {{--<div class="col-3 p-0">--}}
                {{--<a href="" class="ics">--}}
                    {{--<p>--}}
                        {{--<i class="fab fa-facebook-f fa-sm"></i>--}}
                    {{--</p>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<img class="w-100" style="margin-top: 17%;" src="{{ asset('images/wedo.png') }}" alt="">--}}
{{--</div>--}}



