@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 15%; padding-bottom: 10%;">
        <div class="row">
            <div class="col-12 modal-body-cart">
                @include('_partials.cart', ['route' => true])
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-10">
                <h2>Ваша информация</h2>
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ Session::has('token') ? Session::get('token') : uniqid() }}">
                    @if(auth()->check())
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name ?? '' }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ auth()->user()->email ?? '' }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ auth()->user()->address ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ auth()->user()->phone ?? '' }}" required>
                        </div>
                    @else
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email" id="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="text-left pt-4">
                        <a href="{{ route('cart.checkout', ['token' => Session::has('token') ? Session::get('token') : uniqid()]) }}" class="m-3 bg-success p-2 text-fut-book text-white but-hov border-0">
                            Оформить заказ
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
