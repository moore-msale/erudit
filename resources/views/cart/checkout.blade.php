@extends('layouts.app')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('continue') && \Illuminate\Support\Facades\Session::get('continue'))
        <div class="container" style="padding-top: 15%; padding-bottom: 10%;">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <h2 class="font-weight-bold">Оформите заказ</h2>
                    <form action="{{ route('cart.store') }}" class="p-4 w-75" style="background: #a6ccda;" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Имя <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес <span class="text-danger">*</span></label>
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон <span class="text-danger">*</span></label>
                            <input type="tel" id="phone" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment">Комментарий к заказу</label>
                            <textarea id="comment" name="comment" rows="6" class="form-control scrollbar"></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-lg-5 mt-4 mt-lg-0">
                    <div style="max-height: 500px; overflow-y: auto">
                        @foreach($cartItems as $item)
                            <div class="d-flex py-3">
                                <div class="col-5 col-md-4 col-lg-3 pr-0">
                                    <img src="{{ asset('storage/'.\App\Book::find($item->id)->image) }}" style="height: 100px; width: auto;" alt="">
                                </div>
                                <div class="col p-0">
                                    <p class="font-weight-bold h5">{{ $item->name }}</p>
                                    <p><span class="font-weight-bold">Количство:</span> {{ $item->quantity }}</p>
                                    <p class="text-muted">{{ $item->price }} сом</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <p class="col-auto mt-4 font-weight-bold h3 mb-5">Итого: {{ $total }} сом</p>
                    <a href="#" class="btn-success text-fut-book but-hov mx-auto text-white p-2 w-100 mt-4" style="font-size: 13px; border:0; cursor: pointer;" onclick="event.preventDefault(); $('form').validate() ? $('form').submit() : '';">Оформить</a>
                </div>
            </div>
        </div>
    @else
        <div class="container" style="padding-top: 15%; padding-bottom: 10%;">
            <div class="row">
                <div class="col-12 modal-body-cart">
                    @include('_partials.cart', ['route' => true])
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/localization/messages_ru.js">
    </script>
@endpush
