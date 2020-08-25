@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
    <style>
        .select2-container {
            width: 100%!important;
        }
    </style>
@endpush
@section('content')

    <div class="container" style="padding-top: 10%; padding-bottom:10%;">
        <form action="{{route('stock_store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 py-5">
                    <h3 class="text-fut-bold">
                        Создание акции
                    </h3>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="desc">Описание акции <span class="text-danger">*</span></label>
                        <input type="text" id="desc" name="desc" class="form-control input-erudit" value="{{isset($stock) ? $stock->name : ''}}" required>
                    </div>
                    <div class="form-group">
                        <label for="discount">Скидка (без %) <span class="text-danger">*</span></label>
                        <input type="text" id="discount" name="discount" class="form-control input-erudit" value="{{isset($stock) ? $stock->discount : ''}}" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Дата окончания акции <span class="text-danger">*</span></label>
                        <input type="date" id="date" name="date" class="form-control input-erudit" value="{{isset($stock) ? $stock->date : ''}}" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Баннер <span class="text-danger">*</span></label>
                        <input type="file" id="image" name="image" class="form-control input-erudit" accept="image/*" {{isset($stock) ? '' : 'required'}}>
                    </div>
                    <div class="form-check mb-3 pl-0">
                        <label for="blankCheckbox" class="mr-4">Отметить все товары?</label>
                        <input class="form-check-input  position-static pt-1" name="ula" type="checkbox" id="blankCheckbox"  aria-label="...">
                    </div>

                    <div class="form-group">
                        <label for="type">Выберите тип</label>
                        <select class="form-control input-erudit" name="type" id="type">
                            <option value="0">Выберите Категорию</option>
                            <option value="2">Книги</option>
                            <option value="1">Канцелярские товары</option>
                            <option value="3">Другое</option>
                        </select>
                    </div>

                    <div class="genre">
                        <div class="form-group">
                            <p class="text-danger">Если вы ставите скидку на категорию, выберите категорию,
                                но не выбирайте товар скидка будет присвоена всей категории или жанру.</p>
                            <label for="category">Выберите категорию</label>
                            <p class="text-fut-light"></p>
                            <select class="form-control input-erudit" name="category" id="category">
                                <option value="0">Выберите под категорию или жанр</option>
{{--                                @foreach(\App\GeneralGenre::all()->sortBy('name') as $genre)--}}
{{--                                    <option value="{{$genre->id}}">{{$genre->name}}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>

                    </div>

                    <div class="items">

                    </div>

                </div>
                @if(isset($stock))
                    <input type="hidden" name="id" value="{{ $stock->id }}">
                <div class="col-6" id="load_elem">
                    <h3 class="text-fut-bold mb-4">
                        Список книг на акцию
                    </h3>
                    {{--@dd($stock->books)--}}
                    @if($stock->category)
                    <p class="font-weight-bold">
                        Категория: {{ \App\GeneralGenre::find($stock->category)->name }}
                    </p>
                    @endif
                    <div style="overflow: scroll; max-height: 500px">
                        @foreach($stock->books as $book)
                            <p id="{{$book->id}}"><button class="del_btn" data-value="{{$book->id}}" id="{{$book->id}}" style="color: #ff0000; border: none">✖</button>
                                {{ $book->name }}
                            </p>
                        @endforeach
                    </div>
                    <a href="{{route('stock_delete',['id' => $stock->id])}}">
                        <div class="text-fut-bold btn-danger text-center" style="padding:10px 15px; border:none; width:150px;">
                            Удалить акцию
                        </div>
                    </a>
                </div>


                @endif

                <div class="col-12">
                <button class="btn-info text-fut-bold" style="padding:10px 15px; border:none;">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/select2.js') }}"></script>
    <script>
        if ($('.del_btn')){
            $('.del_btn').click(e => {
                e.preventDefault();
                e.stopPropagation();
                let btn = $(e.currentTarget);
                let val = btn.data('value');
                let btn_id = btn.attr('id')
                console.log(btn_id)
                console.log(val)
                $.ajax({
                    url: '{{ route('stock_delete_one') }}',
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": val,
                    },
                    success: data => {
                        // $("#load_elem").load(location.href + " #load_elem");
                        $( "#"+btn_id ).remove();
                        // $('.genre').html(data.view).show('slide', {direction: 'left'}, 400);
                    },
                    error: () => {
                        alert('Ошибка!');
                    }
                })
            })}

        $('#type').on('change', function (e) {
            let btn = $('#type').val();

            $.ajax({
                url: '{{ route('stock_type') }}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "type": btn,
                },
                success: data => {
                    $('.genre').html(data.view).show('slide', {direction: 'left'}, 400);
                },
                error: () => {
                    alert('Ошибка!');
                }
            })
        })
    </script>
    <script>
        $('#type').on('change', function (e) {
            let btn = $('#type').val();
            // $(".preloader_catalog").fadeIn(100)
            $.ajax({
                url: '{{ route('stock_type') }}',
                method: 'POST',
                data:  {
                    "_token": "{{ csrf_token() }}",
                    "type": btn,
                },
                success: data => {
                    var _select = document.getElementById("category");
                    _select.innerHTML = "";
                    // console.log(data.genre)
                    if (data.genre == 'stationery'){
                        $('#category').append('<option value="all" class="text-scale pl-3 ml-1">все товары</option>' +
                            '<option value="ручки" class="text-scale pl-3 ml-1">ручки</option>' +
                            '<option value="тетради" class="text-scale pl-3 ml-1">тетради</option>' +
                            '<option value="блокнот" class="text-scale pl-3 ml-1">блокноты</option>' +
                            '<option value="папки" class="text-scale pl-3 ml-1">папки</option>' +
                            '<option value="ежедневник" class="text-scale pl-3 ml-1">ежедневники</option>' +
                            '<option value="атласы" class="text-scale pl-3 ml-1">атласы и карты</option>' +
                            '<option value="карандаш" class="text-scale pl-3 ml-1">карандаши</option>' +
                            '<option value="обложк" class="text-scale pl-3 ml-1">обложки</option>' +
                            '<option value="планинг" class="text-scale pl-3 ml-1">планинги</option>' +
                            '<option value="дневник" class="text-scale pl-3 ml-1">дневники</option>' +
                            '<option value="подставки" class="text-scale pl-3 ml-1">подставки для книг</option>' +
                            '<option value="ленейк" class="text-scale pl-3 ml-1">ленейки</option>' +
                            '<option value="альбом" class="text-scale pl-3 ml-1">альбомы</option>' +
                            '<option value="сумки" class="text-scale pl-3 ml-1">сумки, рюкзаки</option>' +
                            '<option value="скетчпады" class="text-scale pl-3 ml-1">скетчпады</option>');
                    }
                    else if (data.genre == 'other'){
                        $('#category').append('<option value="3other" class="text-scale pl-3 ml-1">настольные игры</option>' +
                            '<option value="4other" class="text-scale pl-3 ml-1">учебный материалы</option>' +
                            '<option value="5other" class="text-scale pl-3 ml-1">товары для творчества</option>' +
                            '<option value="6other" class="text-scale pl-3 ml-1">игрушки</option>');
                    }
                    else{
                        $('#category').append('<option value="all_book" class="text-scale pl-3 ml-1">все книги</option>');
                        $.each(data.genre, function(key, val) {
                            $('#category').append('<option value="'+ val.id +'" class="text-scale pl-3 ml-1">'+val.name+'</option>');
                        });
                    }

                },
                error: () => {
                    console.log('error');
                    // $(".preloader_catalog").fadeOut(100)
                }
            });
        })

        $(document).on('change','#category',  function () {
            let btn = $('#category').val();
            // console.log(btn.split(), 'btn')
            $.ajax({
                url: '{{ route('stock_category') }}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "category": btn,
                },
                success: data => {
                    $('.items').html(data.view).show('slide', {direction: 'left'}, 400);
                    $(document.getElementById('books')).select2({
                        width: 'resolve'
                    });
                },
                error: () => {
                    alert('Ошибка!');
                }
            })
        })
    </script>
@endpush
