@extends('layouts.app')
@section('content')
    <div style="padding-top: 10%;">
    <div style="background-size:cover; background-image: url({{ asset('images/mainbg.png') }}); background-position: center center; width:100%; height:300px;"></div>
    {{--<div style="height:160px; display:block; width:100%"></div>--}}
    <div class="pt-5" style="position:relative; z-index:9; text-align:center;">
        <h4 class="text-fut-bold">{{ ucwords(app('VoyagerAuth')->user()->name) }}</h4>

        <div class="user-email text-muted">{{ ucwords(app('VoyagerAuth')->user()->email) }}</div>
        <p></p>
        <div class="container-fluid gallery-block pt-lg-5 pt-3">
            <ul class="col-lg-10 col-md-12 col-10 justify-content-center ml-auto mr-auto pr-0 nav nav-tabs" style="border:none!important;" id="myTab" role="tablist">
                <li class="nav-item pr-3 mt-lg-0 mt-3">
                    <a class="d-flex justify-content-center align-items-center nav-link p-md-2 text-center text-fut-light active"
                       style="width: 207px; height: 54px; color:#000; font-size: 16px; background-image: none!important;"
                       data-toggle="tab" href="#basket" role="tab" aria-controls=""
                       aria-selected="true">Корзина</a>
                </li>
                <li class="nav-item pr-3 mt-lg-0 mt-3">
                    <a class="d-flex justify-content-center align-items-center nav-link p-md-2 text-center text-fut-light"
                       style="width: 207px; height: 54px; color:#000; font-size: 16px; background-image: none!important;"
                       data-toggle="tab" href="#story" role="tab" aria-controls=""
                       aria-selected="true">История покупок</a>
                </li>
            </ul>
            <div class="tab-content col-12 pt-5 pb-lg-5" id="myTabContent">
                <div class="tab-pane fade active show" id="basket" role="tabpanel" aria-labelledby="">
                    <div class="row justify-content-center">
                        <p class="text-fut-bold">
                            Корзина пуста
                        </p>
                    </div>
                </div>

                <div class="tab-pane fade" id="story" role="tabpanel" aria-labelledby="">
                    <p class="text-fut-bold">
                        Покупок нет
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection