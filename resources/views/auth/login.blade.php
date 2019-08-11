<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Эрудит</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/book.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
    @stack('styles')

</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center" style="background-image: url({{ asset('images/back.png') }}); background-size: cover; ">
        <div class="col-md-8 col-0 text-center">
            <a href="/">
            <img class="pt-5" src="{{ asset('images/logo3.png') }}" alt="">
            </a>
        </div>
        <div class="col-md-4 px-0 bg-white" style="height:100vh; border-left:1px #ccc solid; display: flex; text-align: center; align-items:center;">

                    <div class="col-12">
                   <form class="pt-5 w-100" method="POST" action="{{ route('login') }}">
                       @csrf
                       <div class="form-group row">
                           <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                           <div class="col-md-6">
                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                               @error('email')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                           </div>
                       </div>

                       <div class="form-group row">
                           <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                           <div class="col-md-6">
                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                               @error('password')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                           </div>
                       </div>

                       <div class="form-group row">
                           <div class="col-md-6 offset-md-4">
                               <div class="form-check">
                                   <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                   <label class="form-check-label" for="remember">
                                       {{ __('Remember Me') }}
                                   </label>
                               </div>
                           </div>
                       </div>

                       <div class="form-group row mb-0">
                           <div class="col-md-8 offset-md-4">
                               <button type="submit" class="btn-primary" style="padding: 5px 15px; border: 1px;">
                                   {{ __('Login') }}
                               </button>

                               {{--@if (Route::has('password.request'))--}}
                                   {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                       {{--{{ __('Forgot Your Password?') }}--}}
                                   {{--</a>--}}
                               {{--@endif--}}
                           </div>
                       </div>
                   </form>
                    </div>
               </div>
        </div>
           </div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
