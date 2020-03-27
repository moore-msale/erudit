@extends('layouts.app')
@push('styles')
    <style>
        .dis
        {
            pointer-events: none;
        }
    </style>
@endpush
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('continue') && \Illuminate\Support\Facades\Session::get('continue'))

        <div class="container" style="padding-top: 15%; padding-bottom: 10%;">
            <div class="row mb-5">
                <div class="col-9">
                    @include('pages.partials.delivery')
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-bold">Оформите заказ</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-12">
                    <form action="{{ route('cart.store') }}" class="col-12 col-md-10" style="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Имя <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control input-erudit" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес <span class="text-danger">*</span></label>
                            <input type="text" id="address" name="address" class="form-control input-erudit" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон <span class="text-danger">*</span></label>
                            <input type="tel" id="phone" name="phone" class="form-control input-erudit" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control input-erudit">
                        </div>
                        <div class="form-group">

                            <input class="inp-cbx" name="delivery" id="cbx" type="checkbox" style="display: none;"/>
                            <label class="cbx" for="cbx">
                                <span>
                                    <svg width="12px" height="10px" viewbox="0 0 12 10">
                                      <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg>
                                </span>
                                <span>Доставка</span>
                            </label>
                        </div>

                        <div id="deliveryGroup" style="display: none;">
                            <div class="form-group">
                                <label for="sum">Сумма платежа <span class="text-danger">*</span></label>
                                <input type="number" id="sum" name="sum" class="form-control input-erudit" min="0" max="1000000">
                                <div id="diffError" style="display: none;" class="invalid-feedback">
                                    Сумма меньше Итоговой суммы
                                </div>
                            </div>
                            <input type="hidden" name="total" value="{{ $total }}" id="total">
                            <div class="form-group">
                                <label for="diff">Сдача</label>
                                <input type="text" id="diff" name="diff" class="form-control input-erudit" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comment">Комментарий к заказу</label>
                            <textarea id="comment" name="comment" rows="6" class="form-control input-erudit scrollbar"></textarea>
                        </div>
                        <div class="row mt-4">
                           <div class="col-12">
                               <p class="text-fut-bold">
                                   Для получения скидки воспользуйтесь:
                               </p>
                           </div>
                            <div class="col-4">
                                <div class="text-fut-bold btn-info w-100 btn-discount text-center" data-id="1" style="padding:10px 15px; border:none; cursor:pointer;">
                                    Промокод
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="text-fut-bold btn-info w-100 btn-discount text-center" data-id="2" style="padding:10px 15px; border:none; cursor:pointer;">
                                    Сертификат
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="text-fut-bold btn-info w-100 btn-discount text-center" data-id="3" style="padding:10px 15px; border:none; cursor:pointer;">
                                    Дисконт
                                </div>
                            </div>

                            <div class="col-12 mt-4 discount-body" style="display: none;">
                                <div class="form-group">
                                    <label id="discount-label" for="discount"></label>
                                    <input type="text" id="discount" name="discount" class="form-control input-erudit">
                                    <input type="hidden" id="discount-type" name="discount_type" value="">
                                    <input type="hidden" id="discount-activate" name="activate" value="0">
                                </div>
                                <div class="text-fut-bold btn-info btn-checker text-center" style="padding:10px 15px; border:none; cursor:pointer;">
                                    Проверить скидку
                                </div>
                            </div>
                            <div class="col-12 mt-4" id="discount-success" style="display: none;">
                                <p class="text-fut-bold text-success">
                                    Скидка активирована!
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-lg-5 mt-4 mt-lg-0">
                    <div style="max-height: 500px; overflow-y: auto">
                        @foreach($cartItems as $item)
                            <div class="d-flex py-3">
                                <div class="col-5 col-md-4 col-lg-3 pr-0">
                                    @if (filter_var(\App\Book::find($item->id)->image, FILTER_VALIDATE_URL))
                                        <img src="{{ \App\Book::find($item->id)->image }}" style="height: 100px; width: auto;" alt="">
                                    @else
                                        <img src="{{ asset('storage/'.\App\Book::find($item->id)->image) }}" style="height: 100px; width: auto;" alt="">
                                    @endif

                                </div>
                                <div class="col p-0">
                                    <p class="font-weight-bold h5">{{ $item->name }}</p>
                                    <p><span class="font-weight-bold">Количество:</span> {{ $item->quantity }}</p>
                                    <p class="text-muted">{{ $item->price }} сом</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row justify-content-end mt-5 py-5">
                <div class="col-12 col-sm-8 col-md-5 col-lg-4 d-flex p-3" style="background: rgba(0, 0, 0, 0.03);">
                    <div class="col-6 m-0 h6 font-weight-bold">
                        Итого
                    </div>
                    <div class="col-6 m-0 h5 font-weight-bold">
                        <span class="total" data-parent="{{$total}}">{{ $total }}</span> сом
                        <p class="font-weight-bold total-discount text-success" style="display: none;">

                        </p>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-12 col-sm-8 col-md-5 col-lg-4 p-0 mt-1">
                    <a href="#" class="btn-loading btn btn-danger border-0 w-100 text-light" onclick="event.preventDefault(); $('form').validate() ? $('form').submit() : '';" >
                        <div class="bg-danger rounded text-center font-weight-bold h6 m-0 p-4">
                            <span class="mainer">Оформить заказ</span>
                            <img class="loading" src="{{ asset('images/loading.gif') }}" style="width:40px; display:none;" alt="">
                        </div>
                    </a>
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

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/button-checkbox.css') }}">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/localization/messages_ru.js">
    </script>
    <script>
        $('#cbx').change(e => {
            let check = $(e.currentTarget);
            let isChecked = check.is(':checked');
            let deliveryGroup = $('#deliveryGroup');

            if (isChecked) {
                deliveryGroup.show(300);
            } else {
                deliveryGroup.hide(300);
            }
        });
        $('#sum').keyup(e => {
            let input = $(e.currentTarget);
            let total = $('#total').val();
            let diffInput = $('#diff');
            let diffError = $('#diffError');

            if (input.val() == '') {
                diffInput.val('');
                diffError.show(300);
            } else {
                if (parseInt(total) > parseInt(input.val())) {
                    diffError.show(300);
                    diffInput.val('');
                } else {
                    diffError.hide(300);
                    diffInput.val((parseInt(input.val()) - parseInt(total)) + ' сом');
                }
            }
        });
    </script>
    <script>
        function turner() {
            $('.loading').hide();
            $('.mainer').show();
            $('.btn-loading').removeClass('dis');
        }
        $('.btn-loading').on('click', function () {

            $('.btn-loading').addClass('dis');
            $('.loading').show();
            $('.mainer').hide();
            setTimeout(turner, 3000);
        })
    </script>
    <script>
        $('.btn-discount').click(function (e) {
            var btn = $(e.currentTarget);
            var type = btn.data('id');
            $('.discount-body').show();
            if (type == 1){
                $('#discount-label').html('Промокод');
                $('#discount-type').val(type);
            }
            else if (type == 2)
            {
                $('#discount-label').html('Сертификат');
                $('#discount-type').val(type);
            }
            else if (type == 3)
            {
                $('#discount-label').html('Дисконт');
                $('#discount-type').val(type);
            }
            })
    </script>
    <script>
        $('.btn-checker').click(function () {
            var discount = $('#discount').val();
            var type = $('#discount-type').val();
            $.ajax({
                url: '{{ route('discount_check') }}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "type": type,
                    "discount": discount,
                },
                success: data => {
                    if(data.check == 1)
                    {
                        $('#discount-success').show();
                        $('#discount-activate').val(1);

                        var total = $('.total').data('parent');
                        var percent = total / 100 * data.item.discount;
                        // console.log(total,percent);
                        $('.total').html(parseInt(total - percent));
                        $('.total-discount').show();
                        $('.total-discount').html('Скидка - ' + data.item.discount + '%');

                    }
                    else
                    {
                        alert('Таких данных нет!');
                    }
                },
                error: () => {
                    alert('Ошибка!');
                }
            })
        })
    </script>
@endpush
