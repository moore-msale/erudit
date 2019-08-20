<div class="col-lg-4 col-6 item px-1 mb-4">
    <div class="p-4 m-2 shadow text-scale"  style="background-color: white; height:100%; position: relative;">
        <a href="{{ route('book.show', $book) }}" style="text-decoration: none;">
            <img class="w-100" style="height: 60%;" src="{{ file_exists(storage_path('app/public/'.$book->image)) ? asset('storage/'.$book->image) : asset('images/default_book.png') }}" alt="">
{{--            <img class="w-100" style="height: 60%;" src="{{ asset('storage/'.$book->image) }}" alt="">--}}
            @if($book->discount)
            <div class="discount-plate d-flex align-items-center" style="background-color: #3154CF; position: absolute; right:0%; top:0%;  width:59px; height:54px; border-bottom-left-radius: 50%;"><span class="mx-auto text-white">-{{$book->discount}}%</span></div>
            @endif
            {{--@php--}}
        {{--var_dump(file_exists(storage_path('app\\public\\books\\'.$book->image)))--}}
        {{--@endphp--}}
            <h3 class="text-fut-book mt-3 text-left pb-5 text-desc" style="font-size: 18px; line-height: 110%; letter-spacing: 0.05em; color: #222;">
            {{ $book->name }}
        </h3>
        </a>
        <div class="container-fluid mr-0 pr-0">
            <div class="row cart-range" style="width:70%;position: absolute; bottom:5%; color:#222;">
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
                <div class="p-0 ml-auto buy_book">
                    <i style="color: #222; cursor:pointer;" class="fas fa-cart-plus fa-lg icon-flip buy_book" data-id="{{ $book->id }}"></i>
                </div>
            </div>
        </div>
    </div>
</div>