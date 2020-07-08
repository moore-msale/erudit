@extends('layouts.app')
@section('content')
                @if($compilation->active == 1)
                <div class="container-fluid mt-3 px-0 mob_padding" style="padding-top: 10%;background-image: url({{asset('images/bg.png')}}); background-size: cover; background-position: center;">
                    <div class="container pt-5">

                        <div class="row pb-5 justify-content-center">
                            <h3 class="text-fut-bold text-center pb-4 px-5"
                                style="font-size: 38px; line-height: 120%; letter-spacing: 0.05em; color: {{$compilation->title_color}}; max-width: 600px;">
                                {{ $compilation->title }}
                            </h3>
                            <div class="owl-holiday owl-carousel">
                                @foreach($compilation->books as $bestseller)
                                    <div class="item my-4 mx-auto px-2 pt-2 shadow d-flex flex-wrap" style="padding-bottom: 30px;align-content:space-between;background-color: white; height:400px!important;max-width:256px;">
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
                                        <div class="d-flex justify-content-center px-2 w-100">
                                            {{--<div class="p-0 ml-auto buy_book" data-id="{{ $bestseller->id }}">--}}
                                            {{--<i style="color: #444; cursor: pointer;" class="fas fa-cart-plus fa-lg icon-flip buy"></i>--}}
                                            <button class="btn-primary text-fut-book but-hov mx-auto text-white buy_book py-2 w-100"
                                                    data-id="{{ $bestseller->id }}" data-aos="fade-up"
                                                    style="font-size: 13px; border:0; cursor: pointer;">
                                                Добавить в корзину
                                            </button>
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                @endif
@endsection
