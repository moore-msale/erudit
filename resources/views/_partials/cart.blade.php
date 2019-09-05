<div class="container">
    <h2 class="text-uppercase text-muted h5 py-4">Корзина</h2>
    @if(count($cartItems))

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="text-align: center;" scope="col">Товар</th>
                    <th style="text-align: center;" scope="col">Цена</th>
                    <th style="text-align: center;" scope="col">Кол-во</th>
                    <th style="text-align: center;" scope="col">Сумма</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <th scope="row" class="">
                        <div class="d-flex">
                            <img src="{{ asset('storage/'.\App\Book::find($item->id)->image) }}" style="height: 100px; width: auto;" alt="">
                            <p class="small m-0 ml-3">{{ $item->name }}</p>
                        </div>
                    </th>
                    <td style="vertical-align: middle;">
                        <p class="text-center m-0">{{ $item->price }} сом</p>
                    </td>
                    <td style="vertical-align: middle;">
                        <div class="d-flex mx-auto justify-content-between align-items-center" style="width: 100px;">
                            <span class="pointer cart-btn rounded-circle shadow p-2 remove_book d-flex justify-content-center align-items-center" data-id="{{ $item->id }}">-</span>
                            <span class="mx-2">{{ $item->quantity }}</span>
                            <span class="pointer cart-btn rounded-circle shadow buy_book p-2 d-flex justify-content-center align-items-center" data-id="{{ $item->id }}">+</span>
                        </div>
                    </td>
                    <td style="vertical-align: middle;">
                        <div class="d-flex justify-content-center align-items-center">
                            <p class="m-0 text-left">{{ $item->getPriceSum() }} сом</p>
                            <span class="ml-5 pointer cart-btn shadow rounded-circle d-flex justify-content-center align-items-center p-2 delete_book" data-id="{{ $item->id }}">&times;</span>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th style="text-align: center;" scope="col">Товар</th>
                    <th style="text-align: center;" scope="col">Цена</th>
                    <th style="text-align: center;" scope="col">Кол-во</th>
                    <th style="text-align: center;" scope="col">Сумма</th>
                </tr>
                </tfoot>
            </table>
        </div>


        <div class="row mt-3">
            <div class="col-9 h3">
                Итоговая цена:
            </div>
            <div class="col-3 h4">
                {{ $total }} сом
            </div>
        </div>



    @else
        <div class="row justify-content-center">
            <p class="h3 text-muted">Корзина пуста!</p>
        </div>
    @endif
    <div class="text-right pt-4">
        <a href="{{ route('cart.checkout', ['token' => Session::has('token') ? Session::get('token') : uniqid(), 'continue' => true]) }}" class="m-3 bg-success p-2 text-fut-book text-white but-hov border-0 h4">
            Оформить заказ
        </a>
    </div>
</div>
