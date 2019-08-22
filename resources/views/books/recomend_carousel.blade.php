<div class="owl-one owl-carousel">
    @foreach($books as $bestseller)
        @if($bestseller->bestseller == 1)
        <div class="item my-4 ml-3 mr-3 p-4 shadow" style="background-color: white; height: 480px">
            <a href="{{ route('book.show', $bestseller->id) }}" style="text-decoration: none;">
            <div style="height: 65%;">
            <img class="w-100 h-100" src="{{ asset('storage/'.$bestseller->image) }}" alt="">
            </div>


            <h3 class="text-fut-book mt-3 text-left"
                style="font-size: 16px; line-height: 110%; letter-spacing: 0.05em; color: #444;">
                {{\Illuminate\Support\Str::limit($bestseller->name,50,'...')  }}
            </h3>
            </a>
            <div class="p-0 text-left">
                @guest
                    <span class="text-fut-book" style="font-size:18px; letter-spacing: 0.05em; color: #444;">
                        {{ $bestseller->price_retail }} сом
                    </span>
                @else
                    <span class="text-fut-book" style="font-size:18px; letter-spacing: 0.05em; color: #444;">
                        {{ $bestseller->price_wholesale }} сом
                    </span>
                @endguest
            </div>
            <div class="container-fluid mr-0 pr-0" style="position: absolute; bottom:8%;">
                <div class="row justify-content-center" style="width:73%;">
                    {{--<div class="p-0 ml-auto buy_book" data-id="{{ $bestseller->id }}">--}}
                    {{--<i style="color: #444; cursor: pointer;" class="fas fa-cart-plus fa-lg icon-flip buy"></i>--}}
                        <button class="text-fut-book but-hov mx-auto text-white buy_book py-2 w-100" data-id="{{ $bestseller->id }}" data-aos="fade-up"
                                style="background-color:#4d86ff; font-size: 13px; border:0; cursor: pointer;">
                                Добавить в корзину
                        </button>
                {{--</div>--}}
                </div>
            </div>
        </div>
        @endif
    @endforeach
</div>