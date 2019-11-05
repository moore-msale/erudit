<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
    <title>Admin - {{ Voyager::setting("admin.title") }}</title>
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">
    @if (__('voyager::generic.is_rtl') == 'true')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    @endif
    <style>
        body {
            background-image:url('{{ Voyager::image( Voyager::setting("admin.bg_image"), voyager_asset("images/bg.jpg") ) }}');
            background-color: {{ Voyager::setting("admin.bg_color", "#FFFFFF" ) }};
        }
        body.login .login-sidebar {
            border-top:5px solid {{ config('voyager.primary_color','#22A7F0') }};
        }
        @media (max-width: 767px) {
            body.login .login-sidebar {
                border-top:0px !important;
                border-left:5px solid {{ config('voyager.primary_color','#22A7F0') }};
            }
        }
        body.login .form-group-default.focused{
            border-color:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .login-button, .bar:before, .bar:after{
            background:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .remember-me-text{
            padding:0 5px;
        }
    </style>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>
<body class="login">
<div class="container-fluid">
    <div class="row">
        <div class="faded-bg animated"></div>
        <div class="hidden-xs col-sm-7 col-md-8">
            <div class="clearfix">
                <div class="col-sm-12 col-md-10 col-md-offset-2">
                    <div class="logo-title-container">
                        <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn" src="{{ asset('images/logo2.png') }}" style="filter:invert(100%)" alt="Logo Icon">
                        <div class="copy animated fadeIn">
                            <h1>Эрудит</h1>
                            {{--<p>{{ Voyager::setting('admin.description', __('voyager::login.welcome')) }}</p>--}}
                        </div>
                    </div> <!-- .logo-title-container -->
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar">

            <div class="login-container" style="top:30%;">

                {{--<p>{{ __('voyager::login.signin_below') }}</p>--}}

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group form-group-default" id="emailGroup">
                        <label>{{ __('Email (логин)') }}</label>

                        <div class="controls">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group form-group-default" id="nameGroup">
                        <label>{{ __('ФИО') }}</label>
                        <div class="controls">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                        </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>

                    <div class="form-group form-group-default" id="contactGroup">
                        <label>{{ __('Номер телефона') }}</label>
                        <div class="controls">
                            <input id="contact" type="number" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('name') }}" required controls="none" autocomplete="contact" autofocus>
                        </div>
                        @error('contact')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group form-group-default" id="cityGroup">
                        <label>{{ __('Город (из которого вам удобнее отгружаться)') }}</label>
                        <div class="controls">
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                        </div>
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group form-group-default" id="passwordGroup">
                        <label>{{ __('Пароль') }}</label>

                        <div class="controls">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                    </div>

                    <div class="form-group form-group-default" id="confirmpasswordGroup">
                        <label>{{ __('Подтвердите пароль') }}</label>

                        <div class="controls">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Зарегистрировать') }}
                            </button>
                        </div>
                    </div>
                </form>

                <div style="clear:both"></div>

                @if(!$errors->isEmpty())
                    <div class="alert alert-red">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div> <!-- .login-container -->

        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
{{--<script>--}}
    {{--var btn = document.querySelector('button[type="submit"]');--}}
    {{--var form = document.forms[0];--}}
    {{--var email = document.querySelector('[name="email"]');--}}
    {{--var password = document.querySelector('[name="password"]');--}}
    {{--var name = document.querySelector('[name="name"]');--}}
    {{--var city = document.querySelector('[name="city"]');--}}
    {{--var contact = document.querySelector('[name="contact"]');--}}
    {{--btn.addEventListener('click', function(ev){--}}
        {{--if (form.checkValidity()) {--}}
            {{--btn.querySelector('.signingin').className = 'signingin';--}}
            {{--btn.querySelector('.signin').className = 'signin hidden';--}}
        {{--} else {--}}
            {{--ev.preventDefault();--}}
        {{--}--}}
    {{--});--}}
    {{--email.focus();--}}
    {{--document.getElementById('emailGroup').classList.add("focused");--}}

    {{--// Focus events for email and password fields--}}
    {{--email.addEventListener('focusin', function(e){--}}
        {{--document.getElementById('emailGroup').classList.add("focused");--}}
    {{--});--}}
    {{--email.addEventListener('focusout', function(e){--}}
        {{--document.getElementById('emailGroup').classList.remove("focused");--}}
    {{--});--}}

    {{--password.addEventListener('focusin', function(e){--}}
        {{--document.getElementById('passwordGroup').classList.add("focused");--}}
    {{--});--}}
    {{--password.addEventListener('focusout', function(e){--}}
        {{--document.getElementById('passwordGroup').classList.remove("focused");--}}
    {{--});--}}

    {{--name.addEventListener('focusin', function(e){--}}
        {{--document.getElementById('nameGroup').classList.add("focused");--}}
    {{--});--}}
    {{--name.addEventListener('focusout', function(e){--}}
        {{--document.getElementById('nameGroup').classList.remove("focused");--}}
    {{--});--}}

    {{--city.addEventListener('focusin', function(e){--}}
        {{--document.getElementById('cityGroup').classList.add("focused");--}}
    {{--});--}}
    {{--city.addEventListener('focusout', function(e){--}}
        {{--document.getElementById('cityGroup').classList.remove("focused");--}}
    {{--});--}}

    {{--contact.addEventListener('focusin', function(e){--}}
        {{--document.getElementById('contactGroup').classList.add("focused");--}}
    {{--});--}}
    {{--contact.addEventListener('focusout', function(e){--}}
        {{--document.getElementById('contactGroup').classList.remove("focused");--}}
    {{--});--}}

{{--</script>--}}
</body>
</html>








