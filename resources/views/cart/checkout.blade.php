@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 15%; padding-bottom: 10%;">
        <div class="row">
            <div class="col-12 modal-body-cart">
                @include('_partials.cart', ['route' => true])
            </div>
        </div>

        <div class="row">
            <div class="col-10">
                <form action="{{ route('cart.checkout') }}">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
