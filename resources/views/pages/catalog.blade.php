@extends('layouts.app')
@section('content')
    @push('styles')
        <style>
            body {
                background: #E5E5E5;
            }
        </style>
        <style>
            .slidecontainer {
                width: 100%;
            }

            .slider {
                -webkit-appearance: none;
                width: 100%;
                height: 5px;
                border: 1px solid rgba(0, 0, 0, 0.28);
                border-radius: 5px;
                background: #fbfbfb;
                outline: none;
                opacity: 0.7;
                -webkit-transition: .2s;
                transition: opacity .2s;
            }

            .slider:hover {
                opacity: 1;
            }

            .slider::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: #5f6362;
                cursor: pointer;
            }

            .slider::-moz-range-thumb {
                width: 25px;
                height: 25px;
                border-radius: 50%;
                background: #5f6362;
                cursor: pointer;
            }
        </style>
    @endpush
    <div style="padding-top: 15%; padding-bottom: 10%;">
        <div class="container">
            <div class="row bg-white shadow p-3">
                <div class="col-3">
                    <h3 class="text-fut-bold pl-3 mb-0"
                        style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:black;">
                        Магазин
                    </h3>
                </div>
                <div class="col-2 text-center pt-2">
                    <div class="dropdown open" style=" display: flex; align-items: center; text-align: center;">
                        <a class="dropdown-toggle text-fut-book bg-transparent m-0 mx-auto"
                           style="border:0; font-size:20px; color: #000000;" id="dropdownMenuButton"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Сортировка
                        </a>
                        <div class="dropdown-menu text-fut-book" style="cursor: pointer;" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item sort_products" href="#" data-type="Name" data-value="asc">Название: по возрастанию</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Name" data-value="desc">Название: по убыванию</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Price" data-value="asc">Стоимость: по возрастанию</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Price" data-value="desc">Стоимость: по убыванию</a>
                        </div>
                    </div>
                </div>
                <div class="col-1 pr-0 text-right">
                    <p class="text-fut-book"
                       style="font-size: 20px; line-height: 120%; letter-spacing: 0.05em; color: black;">
                        Цена
                    </p>
                </div>
                <div class="col-3">
                    <div class="slidecontainer">
                        <span class="text-fut-book" style="font-size: 14px;">мин: <span id="demo"></span> сом</span>
                        <span class="text-fut-book" style="float:right; font-size: 14px;">макс: 15000 сом</span>
                        <input type="range" min="0" max="15000" value="0" class="slider" id="myRange">
                    </div>
                </div>
                <div class="col-3">
                    <p class="text-fut-book"
                       style="font-size: 20px; line-height: 120%; letter-spacing: 0.05em; color: black;">
                        <input type="text" class="border-bottom form-control" id="search_input" placeholder="Поиск">
                    </p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3 p-0">
                    <div class=" bg-white p-5">
                        <h3 class="text-fut-bold mb-0"
                            style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:black;">
                            Жанры
                        </h3>
                        <div class="mt-3 text-fut-book"
                             style="font-size: 18px; line-height: 120%; letter-spacing: 0.05em; color:#000000; cursor: pointer;">
                            @foreach($genres as $genre)
                            <a href="{{ route('genre',$genre) }}">
                                <p class="text-scale">
                                    {{ $genre->name }}
                                </p>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class=" bg-white p-5 mt-4">
                        <h3 class="text-fut-bold mb-0"
                            style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:black;">
                            Категории
                        </h3>
                        <div class="mt-3 text-fut-book"
                             style="font-size: 18px; line-height: 120%; letter-spacing: 0.05em; color:#000000; cursor: pointer;">
                            <p class="text-scale">
                                Новинки
                            </p>
                            <p class="text-scale">
                                Бестселлеры
                            </p>
                            <p class="text-scale">
                                Товары для творчества
                            </p>
                            <p class="text-scale">
                                Канцелярские товары
                            </p>
                            <p class="text-scale">
                                Настольные игры
                            </p>
                            <p class="text-scale">
                                Учебные материалы
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row px-4" id="books_catalog">


                    </div>
                    @if($books instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        <div class="row pl-4 ml-0 pt-3">
                            {{ $books->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let params = {};

        $('#search_input').keyup(e => {
            e.preventDefault();

            let input = $(e.currentTarget);
            let val = input.val();

            params.search = val;
            getProducts(params);
        });

        $('.sort_products').click(e => {
            e.preventDefault();

            let btn = $(e.currentTarget);
            let val = btn.data('value');
            let type = btn.data('type');
            if (type == 'Name') {
                params.sortName = val;
                params.sortPrice = null;
            } else {
                params.sortPrice = val;
                params.sortName = null;
            }
            getProducts(params);
        });

        $('#myRange').change(e => {
            let range = $(e.currentTarget);
            let val = range.val();

            params.min = val;
            params.max = 15000;

            getProducts(params)
        });
    </script>
    <script>
        getProducts();
        function getProducts(params = {})
        {
            $.ajax({
                url: '{{ route('book.all') }}',
                data: params,
                success: data => {
                    console.log(data.filters);
                    result = $('#books_catalog').html(data.html);
                    result.find('.buy_book').each((e, i) => {
                        registerCartBuyButtons($(i));
                    });
                },
                error: () => {
                    console.log('error');
                }
            });
        }
    </script>

    <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>
@endpush