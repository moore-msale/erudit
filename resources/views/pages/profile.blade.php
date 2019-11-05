@extends('layouts.app')
@section('content')
<div>
    <div style="background-size:cover; background-image: url({{ asset('images/mainbg.png') }}); background-position: center center; width:100%; height:500px;"></div>
    {{--<div style="height:160px; display:block; width:100%"></div>--}}
    <div class="pt-5" style="position:relative; z-index:9; text-align:center;">
        <h4 class="text-fut-bold">{{ ucwords(app('VoyagerAuth')->user()->name) }}</h4>
        <div class="user-email text-muted">{{ ucwords(app('VoyagerAuth')->user()->email) }}</div>
        <p></p>
        <div class="row justify-content-center">
            <div class="col-9">
                <h2 class="font-weight-bold mb-3">Приветствуем Вас в оптовом интернет-магазине «Эрудит»</h2>
                <h4 class="font-weight-bold mb-5">(книги, учебники, игры, открытки, рюкзаки) </h4>
                <p class="text-left">
                    Если Вам требуется канцелярия оптом, просьба написать на этот эл.адрес:
                    <a href="mailto:nurgulan@mail.ru" class="nav-link">
                        <i class="fas fa-envelope"></i>&nbsp;nurgulan@mail.ru
                    </a>
                </p>
                <p class="text-left">Если сумма Вашего заказа менее <b>5 000 сом</b>, рекомендуем перейти в <b>общий розничный</b> интернет-магазин <b>erudit.kg</b> </p>
                <p class="text-left" style="line-height: 140%;">
                    <b>или</b> ждем Вас в наших <b>торговых залах</b> по адресу:
                    <br>
                    - Ибраимова 115 ТЦ «Дордой Плаза 2» этаж (-1)
                    <br>
                    - Киевская/Уметалиева ТЦ «iMall»
                </p>
                <h4 class="font-weight-bold mb-3">Постоянным клиентам!!! Кто не может оформить заказ из-за недостаточной суммы, просьба написать на этот эл. Адрес (<a href="mailto:nurgulan@mail.ru">nurgulan@mail.ru</a>) с почты, которая указана в Вашей регистрации, для разрешения проблемы.</h4>
                <h4 class="font-weight-bold mb-3">Уважаемые посетители нашего сайта,</h4>
                <h6 class="font-weight-bold mb-3">
                    Обращаем Ваше внимание, что на сайте Вы можете оформить заказ по всему Кыргызстану, также в странах: Казахстан, Узбекистан, Таджикистан. Для этого необходимо во время регистрации выбрать нужный Вам город в поле "город отгрузки".
                    <br><br>Мы приложим все усилия для того, чтобы нашим клиентам и партнерам было удобно и выгодно с нами работать.
                    <br><br>ЖЕЛАЕМ ПРИЯТНЫХ ПОКУПОК!
                </h6>
                <h5 class="font-weight-bold mb-5">На сайте указаны оптовые цены, так же действуют система скидок.</h5>
                <a href="#" class="nav-link">
                        скачать прайс-лист
                </a>
            </div>
        </div>
        <div class="container-fluid gallery-block pt-lg-5 pt-3">
            <ul class="col-lg-10 col-md-12 col-10 justify-content-center ml-auto mr-auto pr-0 nav nav-tabs" style="border:none!important;" id="myTab" role="tablist">
                <li class="nav-item pr-3 mt-lg-0 mt-3">
                    <a class="d-flex justify-content-center align-items-center nav-link p-md-2 text-center text-fut-light active"
                        style="width: 207px; height: 54px; color:#000; font-size: 16px; background-image: none!important;"
                        data-toggle="tab" href="#basket" role="tab" aria-controls=""
                    aria-selected="true">Корзина</a>
                </li>
                <li class="nav-item pr-3 mt-lg-0 mt-3">
                    <a class="d-flex justify-content-center align-items-center nav-link p-md-2 text-center text-fut-light"
                        style="width: 207px; height: 54px; color:#000; font-size: 16px; background-image: none!important;"
                        data-toggle="tab" href="#story" role="tab" aria-controls=""
                    aria-selected="true">История покупок</a>
                </li>
            </ul>
            <div class="tab-content col-12 pt-5 pb-lg-5" id="myTabContent">
                <div class="tab-pane fade active show" id="basket" role="tabpanel" aria-labelledby="">
                    <div class="row justify-content-center">
                        <p class="text-fut-bold">
                            Корзина пуста
                        </p>
                    </div>
                </div>
                <div class="tab-pane fade" id="story" role="tabpanel" aria-labelledby="">
                    @if(count(auth()->user()->carts))
                    <div class="container">
                        <div class="row">
                            @foreach(auth()->user()->carts as $cart)
                            @foreach($cart->cart as $item)
                            @foreach($item as $product)
                            <div class="col-10">
                                <p>{{ $product['name'] }}</p>
                                <p>{{ $product['price'] }}</p>
                                <p>{{ $product['quantity'] }}</p>
                            </div>
                            @endforeach
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                    @else
                    <p class="text-fut-bold">
                        Покупок нет
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection