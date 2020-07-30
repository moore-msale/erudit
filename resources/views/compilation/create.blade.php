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
                            <option value="0">Выберите тип</option>
                            <option value="1">Книги</option>
                        </select>
                    </div>

                    <div class="genre">

                    </div>

                    <div class="items">

                    </div>

                </div>
                @if(isset($compilation))
                    <div class="col-6">
                        <h3 class="text-fut-bold mb-4">
                            Список книг в подборке
                        </h3>
                        @foreach($compilation->books as $book)
                            <p>
                                {{ $book->name }}
                            </p>
                        @endforeach
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
