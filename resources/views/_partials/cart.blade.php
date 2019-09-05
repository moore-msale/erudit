<div class="container">
    <h2 class="text-uppercase text-muted h5 py-4">Корзина</h2>
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

        <div class="row align-items-center mt-3">
            <div class="col-6 h5">
                Итоговая цена:
            </div>
            <div class="col-6 h5">
                {{ $total }} сом
            </div>
        </div>

        <div class="text-right pt-4">
            <a href="{{ route('cart.checkout', ['token' => Session::has('token') ? Session::get('token') : uniqid(), 'continue' => true]) }}" class="m-3 bg-primary p-2 text-fut-book text-white but-hov border-0 h4">
                Оформить заказ
            </a>
        </div>
    @else
        <div class="row justify-content-center">
            <p class="h3 text-muted">Корзина пуста!</p>
        </div>
    @endif

</div>
