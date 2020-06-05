<div class="owl-carousel owl-promotional">
    @foreach($books as $bestseller)
        @if($bestseller->promotional == 1)
            <div class="item my-4 mx-1 px-2 pt-2 shadow d-flex flex-wrap" style="padding-bottom:30px; background-color: white; height: 400px!important;align-content:space-between;max-width:256px;">
                <div class="w-100" style="height:340px;">
                  <a href="{{ route('book.show', $bestseller->id) }}" style="text-decoration: none;">
                      <div style="height: 65%;">
                          @if (filter_var($bestseller->image, FILTER_VALIDATE_URL))
                              <img class="w-100 h-100" src="{{ $bestseller->image }}" alt="">
                          @else
                              <img class="w-100 h-100" src="{{ asset('storage/'.$bestseller->image) }}" alt="">
                          @endif
                      </div>


                      <h3 class="text-fut-book mt-3 text-left"
                          style="font-size: 16px; line-height: 110%; letter-spacing: 0.05em; color: #444;">
                          {{\Illuminate\Support\Str::limit($bestseller->name,50,'...')  }}
                      </h3>
                  </a>
                  <div class="p-0 text-left">
                      @guest
                          <span class="text-fut-book" style="font-size:18px; letter-spacing: 0.05em; color: #444;">
                           {{ $bestseller->price_wholesale }} сом
                      </span>
                      @else
                          <span class="text-fut-book" style="font-size:18px; letter-spacing: 0.05em; color: #444;">
                          {{ $bestseller->price_retail }} сом
                      </span>
                      @endguest
                  </div>
                </div>
                <div class="d-flex justify-content-center w-100 px-2" style="height:25px;">
                    <button class="btn-primary text-fut-book but-hov mx-auto text-white buy_book py-1 w-100"
                            data-id="{{ $bestseller->id }}" data-aos="fade-up"
                            style="font-size: 13px; border:0; cursor: pointer;">
                        Добавить в корзину
                    </button>
                </div>
            </div>
        @endif
    @endforeach
</div>
