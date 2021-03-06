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
        <form action="{{route('compilation_store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 py-5">
                    <h3 class="text-fut-bold">
                        Изменить подборку
                    </h3>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Описание подборки <span class="text-danger">*</span></label>
                        <input type="text" id="title" name="title" class="form-control input-erudit" value="{{isset($compilation) ? $compilation->title : ''}}" required>
                    </div>
                    <input type="hidden" id="id_comp" name="id" class="form-control input-erudit" value="{{isset($compilation) ? $compilation->id : ''}}">
                    <div class="form-group">
                        <label for="color">Цвет описания <span class="text-danger">*</span></label>
                        <input type="color" id="color" name="color" class="form-control input-erudit" value="{{isset($compilation) ? $compilation->title_color : ''}}" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Баннер <span class="text-danger">*</span></label>
                        <input type="file" id="image" name="image" class="form-control input-erudit" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="type">Выберите тип</label>
                        <select class="form-control input-erudit" name="type" id="type">
                            <option value="">Выберите тип</option>
                            <option value="2">Книги</option>
                        </select>
                    </div>

                    <div id="genre" class="genre">
                        <div class="form-group">

                            <label for="category">книги</label>
                            <p class="text-fut-light"></p>
                            <select class="form-control input-erudit" name="category" id="category">
                                <option value="0">Выберите жанр или все</option>
                                {{--                                @foreach(\App\GeneralGenre::all()->sortBy('name') as $genre)--}}
                                {{--                                    <option value="{{$genre->id}}">{{$genre->name}}</option>--}}
                                {{--                                @endforeach--}}
                            </select>
                        </div>

                    </div>

                    <div class="items">

                    </div>

                </div>
                @if(isset($compilation))
                    <div class="col-6">
                        <h3 class="text-fut-bold mb-4">
                            Список книг в подборке
                        </h3>
{{--                        @foreach($compilation->books as $book)--}}
{{--                            <p>--}}
{{--                                {{ $book->name }}--}}
{{--                            </p>--}}
{{--                        @endforeach--}}
                        <div style="overflow: scroll; max-height: 500px">
                            @foreach($compilation->books as $book)
                                <p id="{{$book->id}}" class="mb-1"><button class="del_btn_acc" data-attr="{{$compilation->id}}" data-value="{{$book->id}}" id="{{$book->id}}"
                                                                           style="color: #ff0000; border: none;
                                                           background: none;font-size: 18px;">✖</button>
                                    {{ $book->name }}
                                </p>
                                <hr id="{{$book->id}}"  class="my-0">
                            @endforeach
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="books">Товары</label>--}}
{{--                            <select class="form-control m-0 w-100" name="items[]" id="books" multiple="" style="height: 300px">--}}
{{--                                @foreach($compilation->books as $book)--}}
{{--                                    <option value="{{ $book->id }}" {{ isset($stock) && $stock->type == 1 ? $stock->data->where('id', $book->id)->isNotEmpty() ? 'selected' : '' : ''}}>{{ $book->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
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
        if ($('.del_btn_acc')){
            $('.del_btn_acc').click(e => {
                e.preventDefault();
                e.stopPropagation();
                let btn = $(e.currentTarget);
                let val = btn.data('value');
                let data_attr = btn.attr('data-attr');
                let btn_id = btn.attr('id')

                $.ajax({
                    url: '{{ route('comp_delete') }}',
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "book_id": val,
                        "conp_id":data_attr
                    },
                    success: data => {
                        // $("#load_elem").load(location.href + " #load_elem");
                        $( "#"+btn_id ).remove();
                        // $('.genre').html(data.view).show('slide', {direction: 'left'}, 400);
                    },
                    error: () => {
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
                    console.log(data.genre)
                    $('#category').append('<option value="all_book" class="text-scale pl-3 ml-1">все книги</option>');
                    $.each(data.genre, function(key, val) {
                        $('#category').append('<option value="'+ val.id +'" class="text-scale pl-3 ml-1">'+val.name+'</option>');
                    });
                    // $('#genre').html(data.genre.value(name)).show('slide', {direction: 'left'}, 400);
                },
                error: () => {
                    alert('Ошибка!');
                }
            })
        })
    </script>
    <script>
        $(document).on('change','#category',  function () {
            let btn = $('#category').val();

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
