@extends('layouts.app')
@section('content')

<div>
    <div style="background-size:cover; background-image: url({{ asset('images/mainbg.png') }}); background-position: center center; width:100%; height:500px;"></div>
    {{--<div style="height:160px; display:block; width:100%"></div>--}}
    <div class="pt-5" style="position:relative; z-index:9; text-align:center;">
        <h4 class="text-fut-bold">{{ ucwords(app('VoyagerAuth')->user()->name) }}</h4>
        <div class="user-email text-muted">{{ ucwords(app('VoyagerAuth')->user()->email) }}</div>
        <p></p>
        @if(\Illuminate\Support\Facades\Auth::user()->role_id != 1)
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
                    {{--<li class="nav-item pr-3 mt-lg-0 mt-3">--}}
                    {{--<a class="d-flex justify-content-center align-items-center nav-link p-md-2 text-center text-fut-light active"--}}
                    {{--style="width: 207px; height: 54px; color:#000; font-size: 16px; background-image: none!important;"--}}
                    {{--data-toggle="tab" href="#basket" role="tab" aria-controls=""--}}
                    {{--aria-selected="true">Корзина</a>--}}
                    {{--</li>--}}
                    <li class="nav-item pr-3 mt-lg-0 mt-3">
                        <a class="d-flex justify-content-center align-items-center nav-link p-md-2 text-center text-fut-light active"
                           style="width: 207px; height: 54px; color:#000; font-size: 16px; background-image: none!important;"
                           data-toggle="tab" href="#story" role="tab" aria-controls=""
                           aria-selected="true">История покупок</a>
                    </li>
                </ul>
                <div class="tab-content col-12 pt-5 pb-lg-5" id="myTabContent">
                    {{--<div class="tab-pane fade active show" id="basket" role="tabpanel" aria-labelledby="">--}}
                    {{--<div class="row justify-content-center">--}}
                    {{--<p class="text-fut-bold">--}}
                    {{--Корзина пуста--}}
                    {{--</p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <div class="tab-pane fade active show" id="story" role="tabpanel" aria-labelledby="">
                        @if(count(auth()->user()->carts))
                            <div class="container">
                                <div class="row">

                                    @foreach(auth()->user()->carts as $cart)
                                        <div class="col-12 py-2" style="border-bottom:1px solid rgba(0,0,0,0.1);">
                                            <div class="row">
                                                <div class="col-4">
                                                    <p class="text-fut-bold">Название</p>
                                                </div>
                                                <div class="col-4">
                                                    <p class="text-fut-bold">Цена</p>
                                                </div>
                                                <div class="col-4">
                                                    <p class="text-fut-bold">Количество</p>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach($cart->cart as $item)
                                            @if(isset($item))
                                                @foreach($item as $product)
                                                    {{--@dd($prod)--}}
                                                    <div class="col-12 py-2" style="border-bottom:1px solid rgba(0,0,0,0.1);">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <p class="text-fut-bold">{{ $product['name'] }}</p>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="text-fut-bold">{{ $product['price'] }} сом</p>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="text-fut-bold">{{ $product['quantity'] }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @break
                                        @endforeach
                                        <div class="col-12 pt-3 pb-5">
                                            <div class="row justify-content-end">
                                                <p class="text-fut-bold mr-4">Дата покупки: {{$cart->created_at}}</p>
                                                <p class="text-fut-bold">Итоговая сумма: {{$cart->total}} сом</p>
                                            </div>
                                        </div>
                                    @endforeach
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
        @else
            <div class="container pt-4">
            <ul class="nav nav-tabs row justify-content-center" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#history" role="tab" aria-controls="home" aria-selected="true">История заказов</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#stocks" role="tab" aria-controls="profile" aria-selected="false">Акции</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="holiday-tab" data-toggle="tab" href="#holidays" role="tab" aria-controls="hoёliday" aria-selected="false">Праздничные подборки</a>
                </li>
            </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane show active" style="min-height:500px;" id="history" role="tabpanel" aria-labelledby="home-tab">
                    <div class="container py-5">
                        <div id="accordion">
                            @foreach(\App\Cart::all()->sortBy('id') as $all)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <div class="btn-link text-fut-bold" style="cursor: pointer; color:black; text-decoration: none; font-size:14px;" data-toggle="collapse" data-target="#collapse{{$loop->index}}" aria-expanded="true" aria-controls="collapseOne">
                                                <span class="mr-4">Имя {{$all->name}}</span><span class="mr-4">Дата заказа {{$all->created_at}}</span><span class="mr-4">Итоговая сумма {{ $all->total }} сом</span>{{isset($all->discount) ? 'Скидка: '.$all->discount.'%':''}}
                                            </div>
                                        </h5>
                                    </div>

                                    <div id="collapse{{$loop->index}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 py-2" style="border-bottom:1px solid rgba(0,0,0,0.1);">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <p class="text-fut-bold">Название</p>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="text-fut-bold">Цена</p>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="text-fut-bold">Количество</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @foreach($all->cart as $item)
                                                        @if(isset($item))
                                                            @foreach($item as $product)
                                                                {{--@dd($prod)--}}
                                                                <div class="col-12 py-2" style="border-bottom:1px solid rgba(0,0,0,0.1);">
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <p class="text-fut-bold">{{ $product['name'] }}</p>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <p class="text-fut-bold">{{ $product['price'] }} сом</p>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <p class="text-fut-bold">{{ $product['quantity'] }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        @break
                                                    @endforeach
                                                    <div class="col-12 pt-3 pb-5">
                                                        <div class="row justify-content-end">
                                                            <p class="text-fut-bold mr-4">Дата покупки: {{$all->created_at}}</p>
                                                            <p class="text-fut-bold">Итоговая сумма: {{$all->total}} сом</p>
                                                            @if($all->discount)
                                                            <p class="text-fut-bold ml-4">Скидка: {{$all->discount}}%</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                </div>
                </div>

            </div>
                <div class="tab-pane fade" id="stocks" style="min-height:500px;" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="container pt-5">
                    <div class="row pb-4">
                        <div class="col-12 text-right mb-4">
                            <a class="btn-info text-fut-bold" href="{{ route('stock_create') }}" style="padding:10px 15px; border:none;">
                                Добавить акцию
                            </a>
                            <a class="btn-danger text-fut-bold ml-2" href="{{ route('delete_all') }}" name="all" style="padding:10px 15px; border:none;">
                                удалить все скидки
                            </a>
                        </div>


                        @foreach(\App\Stock::all() as $stock)
                            @if($stock->image !== null)
                                <div class="col-6">
                                    <a href="{{ route('stock_edit', ['id' => $stock->id]) }}">
                                        <div class="stock-img" style="background-image: url({{ asset($stock->image)}})">
                                        </div>
                                    </a>
                                </div>
                                @else
                                <div class="col-6">
                                    <a href="{{ route('stock_edit', ['id' => $stock->id]) }}">
                                        <div class="stock-img" style="background-color: #69898c;">
                                            <h3 class="pt-5" style="color: white">
                                                Акция без баннера: {{$stock->name}}
                                            </h3>


                                        </div>

                                    </a>
                                </div>
                                @endif

                        @endforeach
                    </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="holidays" style="min-height:500px;" role="tabpanel" aria-labelledby="profile-tab">
                    <?php
                    $compilation = \App\Compilation::all()->first();
                    ?>
                    <div class="mt-5 d-flex justify-content-center">
                        <a class="btn-info text-fut-bold" href="{{ route('compilation_create') }}" style="padding:10px 15px; border:none; text-decoration: none;">
                            Изменить подборку
                        </a>
                        <div class="btn-danger text-fut-bold ml-1 btn-off" style="padding:10px 15px; border:none; cursor:pointer; {{ $compilation->active == null ? 'display:none;' : ''}}">Выключить подборку</div>
                        <div class="btn-success text-fut-bold ml-1 btn-on" style="padding:10px 15px; border:none; cursor:pointer; {{ $compilation->active == 1 ? 'display:none;' : ''}}">Включить подборку</div>

                    </div>
                    <div class="container-fluid mt-3" style="background-image: url({{asset('images/bg.png')}}); background-size: cover; background-position: center;">
                    <div class="container pt-5">

                    <div class="row pb-5 justify-content-center">
                        <h3 class="text-fut-bold text-center pb-4 px-5"
                            style="font-size: 38px; line-height: 120%; letter-spacing: 0.05em; color: {{$compilation->title_color}}; max-width: 600px;">
                           {{ $compilation->title }}
                        </h3>
                        <div class="owl-holiday owl-carousel">
                            @foreach($compilation->books as $bestseller)
                                    <div class="item my-4 ml-1 mr-1 p-4 shadow" style="background-color: white; height: 480px">
                                        <a href="{{ route('book.show', $bestseller->id) }}" style="text-decoration: none;">
                                            <div style="height: 65%;">
                                                @if (filter_var($bestseller->image, FILTER_VALIDATE_URL))
                                                    <img class="w-100 h-100" src="{{ $bestseller->image }}" alt="">
                                                @else
                                                    <img class="w-100 h-100" src="{{ asset('storage/'.$bestseller->image) }}" alt="">
                                                @endif
                                            </div>


                                            <h3 class="text-fut-book mt-3 text-left"
                                                style="font-size: 16px; line-height: 110%; letter-spacing: 0.05em; color: #444;">
                                                {{\Illuminate\Support\Str::limit($bestseller->name,50,'...')  }}
                                            </h3>
                                        </a>
                                        <div class="p-0 text-left">
                                            @guest
                                                <span class="text-fut-book" style="font-size:18px; letter-spacing: 0.05em; color: #444;">
                         {{ $bestseller->price_wholesale }} сом
                    </span>
                                            @else
                                                <span class="text-fut-book" style="font-size:18px; letter-spacing: 0.05em; color: #444;">
                        {{ $bestseller->price_retail }} сом
                    </span>
                                            @endguest
                                        </div>
                                        <div class="container-fluid mr-0 pr-0" style="position: absolute; bottom:8%;">
                                            <div class="row justify-content-center px-1" style="width:83%;">
                                                {{--<div class="p-0 ml-auto buy_book" data-id="{{ $bestseller->id }}">--}}
                                                {{--<i style="color: #444; cursor: pointer;" class="fas fa-cart-plus fa-lg icon-flip buy"></i>--}}
                                                <button class="btn-primary text-fut-book but-hov mx-auto text-white buy_book py-2 w-100"
                                                        data-id="{{ $bestseller->id }}" data-aos="fade-up"
                                                        style="font-size: 13px; border:0; cursor: pointer; pointer-events: none;">
                                                    Добавить в корзину
                                                </button>
                                                {{--</div>--}}
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>

                    </div>
                    </div>
                    </div>
                </div>

            </div>


        @endif

</div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).on('click','.btn-off', function (e) {
            var btn = $(e.currentTarget);


            $.ajax({
                url: '{{ route('compilation_active') }}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: data => {
                    btn.hide();
                    $('.btn-on').show();
                },
                error: () => {
                    alert('Ошибка!');
                }
            })
        })
    </script>
    <script>
        $(document).on('click','.btn-on', function (e) {
            var btn = $(e.currentTarget);


            $.ajax({
                url: '{{ route('compilation_active') }}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: data => {
                    btn.hide();

                    $('.btn-off').show();
                },
                error: () => {
                    alert('Ошибка!');
                }
            })
        })
    </script>
@endpush
