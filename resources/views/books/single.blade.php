<div class="col-lg-4 col-12 item px-1 mb-4">
    <div class="p-4 m-2 shadow text-scale"  style="background-color: white; max-width: 259px; height:100%;">
        <a href="{{ route('book.show', $book) }}" style="text-decoration: none;">
            <img class="w-100" style="height: 60%;" src="{{ file_exists(asset('storage/'.$book->image)) ? asset('storage/'.$book->image) : asset('images/default_book.png') }}" alt="">

        <h3 class="text-fut-book mt-3 text-left pb-5" style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #000000;">
            {{ $book->name }}
        </h3>
        </a>
        <div class="container-fluid mr-0 pr-0" style="position: absolute; bottom:5%; color:black;">
            <div class="row">
                <div class="col-7 p-0 text-left">
                    @guest
                        <span class="text-fut-book" style="font-size:18px; letter-spacing: 0.05em; color: black;">
                                {{ $book->price_retail }} сом
                            </span>
                    @else
                        <span class="text-fut-book" style="font-size:18px; letter-spacing: 0.05em; color: black;">
                                {{ $book->price_wholesale }} сом
                            </span>
                    @endguest
                </div>
                {{--<div class="col-2 p-0">--}}
                {{--                                    <img class="w-100" src="{{ asset('images/inactivelike.png') }}" alt="">--}}
                {{--</div>--}}
                {{--<div class="col-1 p-0"></div>--}}
                <div class="col-2 p-0">
                    {{--                                    <img class="w-100" src="{{ asset('images/tobasket.png') }}" alt="">--}}
                    <a href="">
                        <i style="color: black;" class="fas fa-cart-plus fa-lg buy_book"  data-id="{{ $book->id }}"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>