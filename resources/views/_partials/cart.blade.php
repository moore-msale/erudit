<div class="container">
    <h1 class="text-uppercase h3 py-4">Корзина</h1>
    @if(count($cartItems))

        <div class="row d-none d-md-flex">
            <div class="col-4 h3">
                Товар
            </div>
            <div class="col-2 h3">
                Цена
            </div>
            <div class="col-3 h3">
                Кол-во
            </div>
            <div class="col-2 h3">
                Сумма
            </div>
        </div>

        @foreach($cartItems as $item)
            <div class="row border-top border-bottom py-3 align-items-center">
                <div class="col-10 col-md-4 col-lg-4 order-0 d-flex align-items-center">
                    <img src="{{ asset('storage/'.\App\Book::find($item->id)->image) }}" style="height: 100px; width: auto;" alt="">
                    <p class="small m-0 ml-3 font-weight-bold">{{ $item->name }}</p>
                </div>
                <div class="col-6 col-md-2 my-3 my-md-0 col-lg-2 order-2">
                    <p class=" m-0"><span class="d-inline-block d-md-none">Цена:&nbsp;</span>{{ $item->price }} сом</p>
                </div>
                <div class="col-lg-3 col-md-3 col-6 my-3 my-md-0 order-3">
                    <div class="d-flex ml-auto ml-md-0 justify-content-between align-items-center" style="width: 100px;">
                        <span class="pointer cart-btn rounded-circle shadow p-2 remove_book d-flex justify-content-center align-items-center" data-id="{{ $item->id }}">-</span>
                        <span class="mx-2">{{ $item->quantity }}</span>
                        <span class="pointer cart-btn rounded-circle shadow buy_book p-2 d-flex justify-content-center align-items-center" data-id="{{ $item->id }}">+</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-12 order-5 d-flex align-items-center">
                    <p class="m-0 text-left font-weight-bold"><span class="d-inline-block d-md-none">Итого:&nbsp;</span>{{ $item->getPriceSum() }} сом</p>
                </div>
                <div class="col-1 align-self-md-center align-self-start order-1 order-md-last">
                    <span class="pointer cart-btn shadow rounded-circle d-flex justify-content-center align-items-center p-2 delete_book" data-id="{{ $item->id }}">&times;</span>
                </div>
            </div>
        @endforeach

        <div class="row justify-content-end mt-5 py-5">
            <div class="col-12 col-sm-8 col-md-5 col-lg-4 d-flex p-3" style="background: rgba(0, 0, 0, 0.03);">
                <div class="col-6 m-0 h6 font-weight-bold">
                    Итого
                </div>
                <div class="col-6 m-0 h5 font-weight-bold">
                    {{ $total }} сом
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col-12 col-sm-8 col-md-5 col-lg-4 p-0 mt-1">
                <a href="{{ route('cart.checkout', ['token' => Session::has('token') ? Session::get('token') : uniqid(), 'continue' => true]) }}" class="btn btn-danger border-0 w-100 text-light">
                    <div class="bg-danger rounded text-center font-weight-bold h6 m-0 p-4">
                        Оформить заказ
                    </div>
                </a>
            </div>
        </div>


    @else
        <div class="row justify-content-center">
            <p class="h3 text-muted">Корзина пуста!</p>
        </div>
    @endif

</div>
