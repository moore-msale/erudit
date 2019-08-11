@extends('layouts.app')
@section('content')
    <div style="padding-top: 15%; padding-bottom: 10%;">
        <div class="container">
            <div class="col-12 pt-lg-0 pt-5 px-0 mb-5">
                        <span>
                        <a href="/">Главная</a>
                        </span>
                <span>
                            <i class="fas fa-arrow-right fa-sm"></i>
                        </span>
                <span>
                Все новости
            </span>
                <h2 class="text-fut-bold mt-3" style="font-size: 30px; line-height: 38px; color: #000000;">
                    Все новости
                </h2>
            </div>

            <div class="row mt-3">
                @foreach($news as $new)
                <div class="col-lg-4 col-12 pt-lg-0 pt-4 pb-3">
                    <div class="shadow-hover pb-4">
                        <img class="w-100" src="{{ asset('storage/'.$new->preview)  }}" alt="">
                        <div class="p-3">
                            <h4 class="text-fut-bold mb-3" style="font-size: 18px; line-height: 120%; letter-spacing: 0.05em; color: #000000;">
                                {{ $new->name }}
                            </h4>
                            <p class="text-fut-book" style="font-family: Futura PT; font-style: normal; font-weight: normal; font-size: 15px; line-height: 130%; letter-spacing: 0.05em;">
                                {{ $new->description }}
                            </p>
                            <a href="{{ route('news.show', $new->id) }}" class="text-fut-book" style="font-size: 15px; line-height: 130%; letter-spacing: 0.05em; color: #000000; text-decoration: underline;">
                                Читать полностью
                            </a>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection