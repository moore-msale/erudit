<div class="col-lg-4 col-6 item px-1 mb-4">
    <div class="p-4 m-2 shadow" style="background-color: white; height:100%; position: relative;">
        <a href="{{ route('book.show', $book) }}" style="text-decoration: none;">
            @if (filter_var($book->image, FILTER_VALIDATE_URL))

                <img class="w-100" style="height: 60%;" src="{{ filter_var($book->image) }}" alt="">
            @else
                <img class="w-100" style="height: 60%;" src="{{ asset('storage/'.$book->image)}}" alt="">
            @endif
            @if($book->discount)
                <div class="discount-plate d-flex align-items-center"
                     style="background-color: #4d86ff; position: absolute; right:0%; top:0%;  width:59px; height:54px; border-bottom-left-radius: 50%;">
                    <span class="mx-auto text-white">-{{$book->discount}}%</span></div>
            @endif
            {{--@php--}}
            {{--var_dump(file_exists(storage_path('app\\public\\books\\'.$book->image)))--}}
            {{--@endphp--}}
            <h3 class="text-fut-book mt-3 text-left text-desc"
                style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #222;">
                {{ \Illuminate\Support\Str::limit($book->name,30,'...')  }}
            </h3>
        </a>
        <div class="p-0 text-left">
            @guest
                <span class="text-fut-book text-desc"
                      style="font-size:18px; letter-spacing: 0.05em;">
                                                            {{ $book->price_retail }} сом
                                                    </span>
            @else
                <span class="text-fut-book text-desc"
                      style="font-size:18px; letter-spacing: 0.05em;">
                                                            {{ $book->price_wholesale }} сом
                                                    </span>
            @endguest
        </div>
        <div class="container-fluid mr-0 pr-0">
            <div class="row cart-range" style="width:80%;position: absolute; bottom:5%; color:#222;">
                <button
                    class="btn-primary text-fut-book but-hov mx-auto text-white buy_book py-2 w-100 d-lg-block d-none"
                    data-id="{{ $book->id }}" data-aos="fade-up"
                    style="font-size: 13px; border:0; cursor: pointer;">
                    Добавить в корзину
                </button>
                <button
                    class="btn-primary text-fut-book but-hov mx-auto text-white buy_book py-2 w-100 d-lg-none d-block"
                    data-id="{{ $book->id }}" data-aos="fade-up"
                    style="font-size: 13px; border:0; cursor: pointer;">
                    В корзину
                </button>
            </div>
        </div>
    </div>
</div>
