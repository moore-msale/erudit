@extends('layouts.app')
@section('content')
    <div style="padding-top: 15%; padding-bottom: 5%;">
        <div class="container">
        <div class="row justify-content-center">
            <h2 class="col-10 MonotypeCorsiva" style="font-size: 30px; line-height: 34px; text-align: center; color: #222;">
                "{{ $news->name }}"
            </h2>
        </div>
        </div>

        <div class="container mt-lg-4 mt-0 p-lg-0 p-5">
            <div class="row justify-content-center">
                <div class="col-9">
                    {!! $news->text1 !!}
                </div>
                <img class="w-100 h-100 mt-4" src="{{ asset('storage/'.$news->image1) }}" alt="">

            </div>
            <div class="row justify-content-center mt-5" style="color:#222;">
                <div class="col-9">
                    {!! $news->text2 !!}
                </div>
                <img class="w-100 h-100 mt-4" src="{{ asset('storage/'.$news->image2) }}" alt="">
            </div>
        </div>
    </div>
@endsection
