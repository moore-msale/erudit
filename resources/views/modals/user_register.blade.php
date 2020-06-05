<div class="modal fade" id="user_register_modal" tabindex="-1" role="form" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header border-0">
                <h5 class="modal-title text-dark font-weight-bold" id="exampleModalLabel">Зарегистрируйтесь.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div>
                <div class="modal-body">
            <div class="login-container" style="top:30%;">

                {{--<p>{{ __('voyager::login.signin_below') }}</p>--}}

                <form method="POST" action="{{ route('register_user') }}">
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
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary p-3 w-100">
                                {{ __('Зарегистрироваться') }}
                            </button>
                        </div>
                        <div class="col-md-6 ">
                            <a href="/login"class="btn btn-primary p-3 w-100">
                                    Войти
                            </a>
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
                </div>
            </div>
        </div>
    </div>
</div>

