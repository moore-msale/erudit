@extends('layouts.app')
@section('content')
                <div class="row justify-content-center mob_padding" style="padding-top: 15%;">
                    <div class="col-lg-12 col-12 pt-lg-0 pt-5">
                        <h3 class="text-fut-bold text-center"
                            style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; color: #3154CF;">
                            Новинки
                        </h3>
                    </div>
                </div>
                <div class="container" style="padding-bottom: 5%;">
                    <div class="row mt-4 pt-2 justify-content-center">
                        @foreach($books as $book)
                                <div class="col-lg-2 col-md-3 col-12 item p-1" style="max-width: 259px;">
                                  <div class="p-2 shadow h-100 w-100" style="background-color: white;">
                                    <a href="{{ asset('book/'.$book->id) }}" style="text-decoration: none;">
                                        <div class="" style="height: 63%;">
                                            @if (filter_var($book->image, FILTER_VALIDATE_URL))
                                                <img class="w-100 h-100" src="{{ $book->image }}" alt="">
                                            @else
                                                <img class="w-100 h-100" src="{{ asset('storage/'.$book->image) }}" alt="">
                                            @endif
                                                @if(isset($book->discount))
                                                    <div class="discount-plate d-flex align-items-center" style="background-color: #4d86ff; position: absolute; right:0%; top:0%;  width:59px; height:54px; border-bottom-left-radius: 50%;"><span class="mx-auto text-white">-{{$book->discount}}%</span></div>
                                                @endif
                                        </div>
                                        <h3 class="text-fut-book mt-3 text-left"
                                            style="font-size: 16px; line-height: 110%; letter-spacing: 0.05em; color: #444;">
                                            {{ \Illuminate\Support\Str::limit($book->name,50,'...')  }}
                                        </h3>
                                    </a>
                                    <div class="p-0 text-left">
                                        @guest
                                            <span class="text-fut-book"
                                                  style="font-size:18px; letter-spacing: 0.05em;">
                                                            {{ intval(isset($book->discount) ? $book->price_wholesale - ($book->price_wholesale / 100 * $book->discount) : $book->price_wholesale)}} сом
                                                    </span>
                                        @else
                                            <span class="text-fut-book"
                                                  style="font-size:18px; letter-spacing: 0.05em;">
                                                            {{ intval(isset($book->price_retail) ? (isset($book->discount) ? $book->price_retail - ($book->price_retail / 100 * $book->discount) : $book->price_retail) : (isset($book->discount) ? $book->price_wholesale - ($book->price_wholesale / 100 * $book->discount) : $book->price_wholesale))}} сом
                                                    </span>
                                        @endguest
                                    </div>
                                    <div class="container-fluid mr-0 pr-0"
                                         style="position: absolute; bottom:3%; color:#444;">
                                        <div class="row justify-content-center" style="width:87%;">
                                            <button
                                                    class="btn-primary text-fut-book but-hov mx-auto text-white buy_book py-2 w-100"
                                                    data-id="{{ $book->id }}" data-aos="fade-up"
                                                    style="font-size: 14px; border:0; cursor: pointer;">
                                                Добавить в корзину
                                            </button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
@endsection
