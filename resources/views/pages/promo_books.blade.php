@extends('layouts.app')
@section('content')
                <div class="container-fluid position-relative mob_padding" style="padding-top:15%;">
                    {{--<img src="{{ asset('images/svg/5.svg') }}" class="position-absolute scroll-svg-up"--}}
                         {{--style="top: 15%; left: 6%;" alt="">--}}
                    <img src="{{ asset('images/svg/6.svg') }}" class="position-absolute scroll-svg-down"
                         style="bottom: -3%; right: -3%;" alt="">
                    <div class="row justify-content-center text-center">
                        <div class="col-12">
                            <h2 class="font-weight-bold text-fut-bold"
                                style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; color:#444;">
                                Акционные книги
                            </h2>
                        </div>
                        <div class="col-12">

                        </div>

                        <div class="container px-0">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    @include('books.promotional_carousel')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
