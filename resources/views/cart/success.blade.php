@extends('layouts.app')
@push('styles')
    <style>
        .background-success
        {
            height:90vh;
            min-height:700px;
            background-image: url({{asset('images/mainbg.png')}});
            background-size: cover;
            background-repeat: no-repeat;
        }
        .success-block
        {
            width:300px;
            height:300px;
            border-radius: 45px;
        }
        .success-title
        {
            font-size: 30px;
            line-height: 30px;
        }
        .success-info
        {
            font-size: 18px;
        }
        .btn
        {
            padding:10px 15px;
            border:none;
            color: white;
            font-size: 12px;
            box-shadow: 0px 0px 0px rgba(0,0,0,0.1);
            transition: 0.4s;
        }
        .btn:hover
        {
            box-shadow: -5px 10px 10px rgba(0,0,0,0.1);
            color:white;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid px-0">
        <div class="background-success d-flex align-items-center justify-content-center">
            <div class="success-block bg-white d-flex align-items-center justify-content-center p-3">
                <div class="text-center">
                    <i class="far fa-check-circle fa-4x text-success mt-4"></i><br>
                <h3 class="text-fut-book success-title text-center pt-3">Спасибо, {{ $cart->name }}. <br> Ваш заказ принят!</h3>

                <p class="text-fut-light success-info text-center pt-3">В ближайшее время с вами свяжется наш сотрудник!</p>
                    <a href="/" style="text-decoration: none; color: white;">
                    <button class="btn btn-success text-fut-bold mb-4">Вернуться на главную</button>
                    </a>
                </div>
                </div>
        </div>
    </div>
@endsection