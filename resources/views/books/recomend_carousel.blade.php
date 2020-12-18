<div class="owl-one owl-carousel">
    @foreach($books as $bestseller)
        @if($bestseller->recommend == 1)
            <div class="item  mx-auto px-2 pt-2 shadow d-flex flex-wrap" style="padding-bottom:15px; background-color: white; height: 425px!important;align-content:space-between;max-width:256px;">
                <div class="w-100" style="height:330px;">
                  <a href="{{ route('book.show', $bestseller->id) }}" style="text-decoration: none;">
                      <div style="height: 80%;">
                          @if (filter_var($bestseller->image, FILTER_VALIDATE_URL))
                              <img class="w-100 h-100 image_in_cart" src="{{ $bestseller->image }}" alt="">
                          @else
                              <img class="w-100 h-100 image_in_cart" src="{{ asset('storage/'.$bestseller->image) }}" alt="">
                          @endif
                              @if(isset($book->discount) and  ((auth()->check() and auth()->user()->role_id == 3) or auth()->check() == false))
                                  <div class="discount-plate d-flex align-items-center" style="background-color: #4d86ff; position: absolute; right:0%; top:0%;  width:59px; height:54px; border-bottom-left-radius: 50%;"><span class="mx-auto text-white">-{{$book->discount}}%</span></div>
                              @endif
                      </div>


                      <h3 class="text-fut-book mt-3 text-left"
                          style="font-size: 16px; line-height: 110%; letter-spacing: 0.05em; color: #444;">
                          {{\Illuminate\Support\Str::limit($bestseller->name,40,'...')  }}
                      </h3>
                  </a>
                  <div class="p-0 text-left">
                      @if(auth()->check() and auth()->user()->role_id !== 3)
                          <span class="text-fut-book"
                                style="font-size:18px; letter-spacing: 0.05em;">
                              {{ $bestseller->price_retail }} сом
                          </span>
                      @else

                          <span class="text-fut-book" style="font-size:18px; letter-spacing: 0.05em;">
                              {{ intval(isset($bestseller->discount) ? $bestseller->price_wholesale - ($bestseller->price_wholesale / 100 * $bestseller->discount) : $bestseller->price_wholesale)}} сом
                          </span>
                      @endif
{{--                      @guest--}}
{{--                          <span class="text-fut-book" style="font-size:18px; letter-spacing: 0.05em; color: #444;">--}}
{{--                           {{ $bestseller->price_wholesale }} сом--}}
{{--                      </span>--}}
{{--                      @else--}}
{{--                          <span class="text-fut-book" style="font-size:18px; letter-spacing: 0.05em; color: #444;">--}}
{{--                          {{ $bestseller->price_retail }} сом--}}
{{--                      </span>--}}
{{--                      @endguest--}}
                  </div>
                </div>
                <div class="d-flex justify-content-center w-100 px-2" style="height:25px;">
                    {{--<div class="p-0 ml-auto buy_book" data-id="{{ $bestseller->id }}">--}}
                    {{--<i style="color: #444; cursor: pointer;" class="fas fa-cart-plus fa-lg icon-flip buy"></i>--}}
                    @if($bestseller->presence)
                        <button class="btn-primary text-fut-book but-hov mx-auto text-white buy_book py-1 w-100"
                                data-id="{{ $bestseller->id }}" data-aos="fade-up"
                                style="font-size: 13px; border:0; cursor: pointer;">
                            Добавить в корзину
                        </button>
                        @else
                        <button class="btn-primary text-fut-book but-hov mx-auto text-white buy_book py-1 w-100"
                                disabled data-aos="fade-up"
                                style="font-size: 13px; border:0; cursor: pointer;">
                            Нет в наличии
                        </button>

                    @endif
                    {{--</div>--}}
                </div>
            </div>
        @endif
    @endforeach
</div>
