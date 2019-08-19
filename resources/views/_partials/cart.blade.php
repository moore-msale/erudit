<div class="container">
    <h2 class="text-uppercase text-muted h5 py-4">Корзина</h2>
    @if(count($cartItems))

        <div class="row">
            <div class="col-4">
                Товар
            </div>
            <div class="col-2">
                Цена
            </div>
            <div class="col-3">
                Кол-во
            </div>
            <div class="col-3">
                Цена
            </div>
        </div>

        @foreach($cartItems as $item)
            <div class="row border-top border-bottom py-3 align-items-center">
                <div class="col-4 d-flex align-items-center">
                    <img src="{{ file_exists(asset('storage/'.$item->image)) ? asset('storage/'.$item->image) : asset('images/default_book.png') }}" style="height: 100px; width: auto;" alt="">
                    <p class="small m-0 ml-3">{{ $item->name }}</p>
                </div>
                <div class="col-2">
                    <p class=" m-0">{{ $item->price }} сом</p>
                </div>
                <div class="col-3">
                    <div class="border d-flex justify-content-between align-items-center" style="width: 80px;">
                        <span class="pointer cart-btn p-2 remove_book" data-id="{{ $item->id }}">-</span>
                        <span class="mx-2">{{ $item->quantity }}</span>
                        <span class="pointer cart-btn buy_book p-2" data-id="{{ $item->id }}">+</span>
                    </div>
                </div>
                <div class="col-3 d-flex align-items-center">
                    <p class="m-0 text-left">{{ $item->getPriceSum() }} сом</p>
                    <span class="ml-5 pointer cart-btn p-2 delete_book" data-id="{{ $item->id }}">&times;</span>
                </div>
            </div>
        @endforeach

        <div class="row mt-3">
            <div class="col-9">
                Итоговая цена:
            </div>
            <div class="col-3">
                {{ $total }} сом
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <p class="h3 text-muted">Корзина пуста!</p>
        </div>
    @endif
    @if(!Session::has('cart_checkout'))
        <div class="text-right pt-4">
            <a href="{{ route('cart.checkout', ['token' => Session::has('token') ? Session::get('token') : uniqid()]) }}" class="m-3 bg-success p-2 text-fut-book text-white but-hov border-0">
                Оформить заказ
            </a>
        </div>
    @endif
</div>