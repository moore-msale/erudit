<div class="owl-two owl-carousel car-nav-close">
    @foreach($books as $bestseller)
        @if($bestseller->bestseller == 1)
        <a href="{{ asset('book/'.$bestseller->id) }}">
            <div class="item m-2 p-4 shadow text-scale" style="background-color: white; height: 100%;">
                <img class="w-100" src="{{ asset('storage/'.$bestseller->image) }}" alt="">
                <h3 class="text-fut-book mt-3 text-left pb-5"
                    style="font-size: 16px; line-height: 110%; letter-spacing: 0.05em; color: #222;">
                    {{ $bestseller->name }}
                </h3>
                <div class="container-fluid row mr-0 pr-0" style="position: absolute; bottom:5%;">
                    <div class="col-6 p-0 text-left">
                        @guest
                            <span class="text-fut-book" style="font-size:18px; letter-spacing: 0.05em; color: black;">
                        {{ $bestseller->price_retail }} сом
                    </span>
                        @else
                            <span class="text-fut-book" style="font-size:18px; letter-spacing: 0.05em; color: black;">
                        {{ $bestseller->price_wholesale }} сом
                    </span>
                        @endguest
                    </div>
                    <div class="col-2 p-0">
                        {{--<img class="w-75" src="{{ asset('images/inactivelike.png') }}" alt="">--}}
                    </div>
                    {{--<div class="col-1 p-0"></div>--}}
                    <div class="col-2 p-0">
                        {{--<img class="w-75" src="{{ asset('images/tobasket.png') }}" alt="">--}}
                        <i style="color: black; cursor: pointer;" class="fas fa-cart-plus fa-lg buy_book"  data-id="{{ $bestseller->id }}"></i>
                    </div>
                </div>
            </div>
        </a>
        @endif
    @endforeach
</div>