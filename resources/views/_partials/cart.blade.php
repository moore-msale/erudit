<div class="container">
    <h2 class="text-uppercase text-muted h5 py-4">Shop cart</h2>

    @if($cart)

        <div class="row">
            <div class="col-4">
                Product
            </div>
            <div class="col-2">
                Price
            </div>
            <div class="col-3">
                Quantity
            </div>
            <div class="col-3">
                Amount
            </div>
        </div>

        @foreach($cart as $item)
            <div class="row border-top border-bottom py-3 align-items-center">
                <div class="col-4 d-flex align-items-center">
                    <img src="{{ asset('images/book1.png') }}" style="height: 100px; width: auto;" alt="">
                    <p class="text-uppercase m-0 ml-3">{{ $item->name }}</p>
                </div>
                <div class="col-2">
                    <p class=" m-0">{{ $item->price }} сом</p>
                </div>
                <div class="col-3">
                    <div class="border d-flex justify-content-between align-items-center" style="width: 80px;">
                        <span class="pointer cart-btn p-2">-</span>
                        <span class="mx-2">{{ $item->quantity }}</span>
                        <span class="pointer cart-btn p-2">+</span>
                    </div>
                </div>
                <div class="col-3 d-flex align-items-center">
                    <p class="m-0 text-left">{{ $item->getPriceSum() }} сом</p>
                    <span class="ml-5 pointer cart-btn p-2">&times;</span>
                </div>
            </div>
        @endforeach
    @else
        <div class="row justify-content-center">
            <p class="h3 text-muted">Your cart is empty!</p>
        </div>
    @endif
</div>