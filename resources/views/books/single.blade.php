<div class="col-lg-4 col-6 item px-1 mb-4">
    <div class="p-4 m-2 shadow" style="background-color: white; height:100%; position: relative;">
        @isset($book->book_id)
             <a href="{{ route('book.show', $book->book_id) }}" style="text-decoration: none;">
        @else
             <a href="{{ route('book.show', $book->id) }}" style="text-decoration: none;">
        @endisset

            @if (filter_var($book->image, FILTER_VALIDATE_URL))

                <img class="w-100 single_img" src="{{ filter_var($book->image, FILTER_VALIDATE_URL) }}" alt="">
            @else
                <img class="w-100 single_img" src="{{ asset('storage/'.$book->image)}}" alt="">
            @endif
            @if($book->discount)
                     @guest
                         <div class="discount-plate d-flex align-items-center"
                              style="background-color: #4d86ff; position: absolute; right:0%; top:0%;  width:59px; height:54px; border-bottom-left-radius: 50%;">
                             <span class="mx-auto text-white">-{{$book->discount}}%</span></div>

                         @endguest



                @elseif($book->bestseller == 1)
                    <div class="discount-plate d-flex align-items-center"
                         style="background-color: #fff9c6; position: absolute; right:0%; top:0%;  width:59px; height:54px; border-bottom-left-radius: 50%;">
                        <span class="mx-auto text-fut-bold" style="color:#ff5e00;"><i class="fas fa-award fa-2x"></i></span></div>
                @elseif($book->new == 1)
                    <div class="discount-plate d-flex align-items-center"
                         style="background-color: #ff0c13; position: absolute; right:0%; top:0%;  width:59px; height:54px; border-bottom-left-radius: 50%;">
                        <span class="mx-auto text-white">NEW</span></div>
            @endif
            {{--@php--}}
            {{--var_dump(file_exists(storage_path('app\\public\\books\\'.$book->image)))--}}
            {{--@endphp--}}
            <h3 class="text-fut-book mt-3 text-left text-desc"
                style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #222;">
                {{ \Illuminate\Support\Str::limit($book->name,30,'...')  }}
            </h3>
        </a>
        <div class="p-0 text-left mb-4">
            @guest
                <span class="text-fut-book text-desc"
                      style="font-size:18px; letter-spacing: 0.05em;">
                    {{  intval(isset($book->discount) ? $book->price_wholesale - ($book->price_wholesale / 100 * $book->discount) : $book->price_wholesale) }} сом
                    <br>
                    @if($book->discount)
                    <span style="text-decoration: line-through; font-size: small;">{{$book->price_wholesale}} сом</span>
                        @endif
                </span>
            @else
                <span class="text-fut-book text-desc"
                      style="font-size:18px; letter-spacing: 0.05em;">
                                                            {{ $book->price_retail }} сом
                                                    </span>
            @endguest
{{--            {{$book->book_id}}--}}
        </div>
        <div class="container-fluid mr-0 pr-0">
            @isset($book->book_id)
            <div class="row cart-range" style="width:80%;position: absolute; bottom:5%; color:#222;">
                <button
                    class="btn-primary text-fut-book but-hov mx-auto text-white buy_book py-2 w-100 d-lg-block d-none"
                    data-id="{{ $book->book_id }}" data-aos="fade-up"
                    style="font-size: 13px; border:0; cursor: pointer;">
                    Добавить в корзину
                </button>
                <button
                    class="btn-primary text-fut-book but-hov mx-auto text-white buy_book py-2 w-100 d-lg-none d-block"
                    data-id="{{ $book->book_id }}" data-aos="fade-up"
                    style="font-size: 13px; border:0; cursor: pointer;">
                    В корзину
                </button>
            </div>
            @else

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

            @endisset

        </div>
    </div>

</div>
