<div class="owl-one owl-carousel">
    @foreach($books as $bestseller)
        @if($bestseller->bestseller == 1)
        <div class="item my-4 ml-4 p-4 shadow text-scale" style="background-color: white; height: 480px">
            <a href="{{ route('book.show', $bestseller->id) }}" style="text-decoration: none;">
            <div style="height: 65%;">
            <img class="w-100 h-100" src="{{ asset('storage/'.$bestseller->image) }}" alt="">
            </div>


            <h3 class="text-fut-book mt-3 text-left pb-5"
                style="font-size: 16px; line-height: 110%; letter-spacing: 0.05em; color: #000000;">
                {{ $bestseller->name }}
            </h3>
            </a>
            <div class="container-fluid mr-0 pr-0" style="position: absolute; bottom:7%;">
                <div class="row" style="width:75%;">
                <div class="p-0 text-left">
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
                    <div class="p-0 ml-auto buy_book" data-id="{{ $bestseller->id }}">
                    <i style="color: black;" class="fas fa-cart-plus fa-lg icon-flip buy"></i>
                </div>
                </div>
            </div>
        </div>
        @endif
    @endforeach
</div>