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
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: #5f6362;
                cursor: pointer;
            }
        </style>
    @endpush

    <div class="catalog_for_media" style="padding-top: 15%; padding-bottom: 10%;">
        <div class="container">
            <div class="row align-items-center bg-white shadow px-3 py-3">
                <div class="col-lg-3 col-12">
                    <h3 class="text-fut-bold pl-3 mb-0 text-lg-left text-center"
                        style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:#222;">
                        Магазин
                    </h3>
                </div>
                <div class="col-lg-2 col-12 text-center">
                    <div class="dropdown open" style=" display: flex; align-items: center; text-align: center; cursor: pointer;">
                        <a class="dropdown-toggle text-fut-book bg-transparent m-0 mx-auto"
                           style="border:0; font-size:20px; color: #222;" id="dropdownMenuButton"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Сортировка
                        </a>
                        <div class="dropdown-menu text-fut-book" style="cursor: pointer;" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item sort_products" href="#" data-type="Updated_at" data-value="desc">По новым</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Updated_at" data-value="asc">По старым</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Name" data-value="asc">По названию: А > Я</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Name" data-value="desc">По названию: Я > А</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Author" data-value="asc">По автору: А > Я</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Author" data-value="desc">По автору: Я > А</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Price" data-value="asc">Бюджетные</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Price" data-value="desc">Дорогие</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Discount" data-value="desc">С макс. скидкой</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Bestseller" data-value="1">Лидеры продаж</a>
                            <a class="dropdown-item sort_products" href="#" data-type="Reviewed" data-value="1">Рецензируемые</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-12 pr-0 text-lg-right text-center">
                    <p class="text-fut-book m-0"
                       style="font-size: 20px; line-height: 120%; letter-spacing: 0.05em; color: #222;">
                        Цена
                    </p>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="slidecontainer">
                        <span class="text-fut-book" style="font-size: 14px;">мин: <span id="demo"></span> сом</span>
                        <span class="text-fut-book" style="float:right; font-size: 14px;">макс: 15000 сом</span>
                        <input type="range" min="0" max="15000" value="0" class="slider" id="myRange">
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="text-fut-book"
                         style="font-size: 20px; line-height: 120%; letter-spacing: 0.05em; color: #222;">
                        <input type="text" class="border-bottom rounded-0 border-top-0 border-left-0 border-right-0 form-control input-without-focus" id="search_input" placeholder="Поиск">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-3 col-12 p-0 d-lg-none d-block">
                    <div class=" bg-white">
                        <div class="d-lg-none d-block">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="accordion text-white text-uppercase bg-transparent" id="accordionExample">
                                            <div class="card bg-transparent border-0 ">
                                                <div class="card-header bg-transparent border-0" id="headingOne">
                                                    <button class="btn-link border-0 text-dark text-fut-bold text-uppercase" style="font-size: 17px;" type="button" data-toggle="collapse"
                                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <i class="fas fa-angle-down mr-2"></i>Жанры
                                                    </button>
                                                </div>

                                                <div id="collapseOne" class="collapse pt-3" aria-labelledby="headingOne"
                                                     data-parent="#accordionExample">
                                                    <div class="card-body font-weight-light text-dark pt-0">
                                                        <div class="mt-3 text-fut-book" style="font-size: 15px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:#222;">
                                                            <a href="" class="genre_btn"  data-value="{{null}}">
                                                                <p class="text-scale">
                                                                    Все жанры
                                                                </p>
                                                            </a>
                                                            @foreach($genres as $genre)
                                                                <a href="{{ route('genre',$genre->name) }}" class="genre_btn" data-value="{{ $genre->id }}">
                                                                    <p class="text-scale">
                                                                        {{ $genre->name }}
                                                                    </p>
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="accordion text-white text-uppercase bg-transparent" id="accordionExample">
                                            <div class="card bg-transparent border-0 ">
                                                <div class="card-header bg-transparent border-0" id="headingOne">
                                                    <button class="btn-link border-0 text-dark text-fut-bold text-uppercase" style="font-size: 17px;" type="button" data-toggle="collapse"
                                                            data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                        <i class="fas fa-angle-down mr-2"></i>Категории
                                                    </button>
                                                </div>

                                                <div id="collapseTwo" class="collapse pt-3" aria-labelledby="headingOne"
                                                     data-parent="#accordionExample">
                                                    <div class="card-body font-weight-light text-dark pt-0">
                                                        <div class="mt-3 text-fut-book"
                                                             style="font-size: 15px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:#222; cursor: pointer;">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 p-0 d-lg-block d-none">
                    <div class="bg-white p-5 d-lg-block d-none">
                        <h3 class="text-fut-bold mb-0"
                            style="font-size: 30px; line-height: 120%; letter-spacing: 0.05em; text-transform: capitalize; color:#222;">
                            Категории
                        </h3>
                        <div class="mt-3 text-fut-book"
                             style="font-size: 18px; line-height: 120%; letter-spacing: 0.05em; color:#222; cursor: pointer;">

                            @foreach($categories as $category)

                                @if($category->name == 'Книги')
                                    <div class="accordion category_btn" id="accordionExample">
                                        <div class="card border-0">
                                            <div class="card-header p-0  bg-white" id="cat-{{$category->id}}">
                                                <button class="text-scale border-0 bg-white outline-none" type="button" data-toggle="collapse" data-target="#collapse-{{$category->id}}" aria-expanded="false" aria-controls="collapse-{{$category->id}}" style="margin-bottom:1rem;color:#2c3e50;">
                                                    {{$category->name}}
                                                </button>
                                            </div>
                                            <div id="collapse-{{$category->id}}" class="collapse pt-1" aria-labelledby="cat-{{$category->id}}" data-parent="#accordionExample">
                                                <a href="{{ route('genre', 'all') }}" data-value="all" class="genre_btn">
                                                    <p class="text-scale pl-3 mb-2">
                                                        Все жанры
                                                    </p>
                                                </a>
                                                @foreach($genres as $genre)
                                                    <a href="{{ route('genre',$genre->id) }}" class="genre_btn" data-value="{{ $genre->id }}">
                                                        <p class="text-scale pl-3 mb-2">
                                                            {{ $genre->name }}
                                                        </p>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route('category', $category->name) }}" class="category_btn" data-value="{{ $category->id }}">
                                        <p class="text-scale">
                                            {{ $category->name }}
                                        </p>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="row px-lg-4 px-1 mb-4" id="books_catalog">

                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
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
    <script src="https://pagination.js.org/dist/2.1.4/pagination.min.js"></script>
    <script>
        let params = {};
        if ($('.genre_btn')){
        $('.genre_btn').click(e => {
            console.log("genrer");
            e.preventDefault();
            e.stopPropagation();
            let btn = $(e.currentTarget);
            let val = btn.data('value');
            params.genre = val;
            params.category = null;
            if (params.page) {
                params.page = 1;
            }
            getProducts(params);

        })}
        if($('.category_btn')){
        $('.category_btn').click(e => {
            console.log("cats");
            e.preventDefault();
            let btn = $(e.currentTarget);
            let val = btn.data('value');
            params.category = val;
            params.genre = null;
            if(params.page) {
                params.page = 1;
            }
            getProducts(params);
        })};
        $('#search_input').keyup(e => {
            e.preventDefault();
            let input = $(e.currentTarget);
            let val = input.val();
            params.search = val;
            if (params.page) {
                params.page = 1;
            }
            getProducts(params);
        });
        $('.sort_products').click(e => {
            e.preventDefault();
            let btn = $(e.currentTarget);
            let val = btn.data('value');
            let type = btn.data('type');
            params.sortName = null;
            params.sortPrice = null;
            params.sortAuthor = null;
            params.sortIssueDate = null;
            params.sortByDiscount = null;
            params.sortByBestseller = null;
            params.sortByReviewed = null;
            $('#dropdownMenuButton').html(btn.html());
            if (params.page) {
                params.page = 1;
            }
            if (type == 'Name') {
                params.sortName = val;
            }else if (type == 'Author') {
                console.log(val);
                params.sortAuthor = val;
            }else if (type == 'Updated_at') {
                params.sortIssueDate = val;
            }else if (type == 'Discount') {
                params.sortByDiscount = val;
            }else if (type == 'Bestseller') {
                params.sortByBestseller = val;
            }else if (type == 'Reviewed') {
                params.sortByReviewed = val;
            } else {
                params.sortPrice = val;
            }
            getProducts(params);
        });
        $('#myRange').change(e => {
            let range = $(e.currentTarget);
            let val = range.val();
            params.min = val;
            params.max = 15000;
            if (params.page) {
                params.page = 1;
            }
            getProducts(params)
        });
        function registerPageButtons(data) {
            data.click(e => {
                e.preventDefault();
                let btn = $(e.currentTarget);
                let page = btn.data('page');
                if (page) {
                    params.page = page;
                    getProducts(params);
                }
            })
        }
    </script>
    <script>
        @if(request()->query('genre'))
            params.genre = '{{ request()->query('genre') }}';
        params.category = null;
        getProducts(params);
        @else
        getProducts();
        @endif
            @if(request()->query('category'))
            params.category = '{{request()->query('category')}}';
        params.genre = null;
        getProducts(params);
        @else
        getProducts();
        @endif
        function paginationWithDots(c, m) {
            var current = c,
                last = m,
                delta = 1,
                left = current - delta,
                right = current + delta + 1,
                range = [],
                rangeWithDots = [],
                l;
            for (let i = 1; i <= last; i++) {
                if (i == 1 || i == last || i >= left && i < right) {
                    range.push(i);
                }
            }
            for (let i of range) {
                if (l) {
                    if (i - l === 2) {
                        rangeWithDots.push(l + 1);
                    } else if (i - l !== 1) {
                        rangeWithDots.push('...');
                    }
                }
                rangeWithDots.push(i);
                l = i;
            }
            return rangeWithDots;
        }
        function getProducts(params = {})
        {
            $.ajax({
                url: '{{ route('book.all') }}',
                data: params,
                success: data => {
                    console.log(data);
                    let pagination = $('ul.pagination');
                    pagination.empty();
                    if (data.count) {
                        let paginationDots = paginationWithDots(data.books.current_page, data.books.last_page);
                        if (data.books.last_page > 1) {
                            if (data.books.current_page != 1) {
                                pagination.append('<li class="page-item d-none d-sm-inline-block"><a class="page-link" data-page="' + (data.books.current_page - 1) + '" href="#">Пред</a></li>');
                            }
                        }
                        for (let item of paginationDots) {
                            if (item == '...') {
                                console.log(item == '...');
                                pagination.append('<li class="disabled"><a class="page-link disabled" disabled onclick="event.preventDefault()">' + item + '</a></li>');
                            } else if (item == data.books.current_page) {
                                pagination.append('<li class="page-item active"><a class="page-link" data-page="' + item + '" href="#">' + item + '</a></li>');
                            } else {
                                pagination.append('<li class="page-item"><a class="page-link" data-page="' + item + '" href="#">' + item + '</a></li>');
                            }
                        }
                        if (data.books.last_page > 1) {
                            if (data.books.current_page != data.books.last_page) {
                                pagination.append('<li class="page-item d-none d-sm-inline-block"><a class="page-link" data-page="' + (data.books.current_page + 1) + '" href="#">След</a></li>');
                            }
                        }
                    }
                    pagination.find('.page-link').each((e, i) => {
                        registerPageButtons($(i));
                    });
                    let result = $('#books_catalog').html(data.html);
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
