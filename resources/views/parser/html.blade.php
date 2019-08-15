@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 20%; padding-bottom: 15%;">
        <div class="row">
            <form action="{{ route('parser.parse', 'html') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>
                        Ссылку на сайт
                        <input type="text" name="urlForParse" class="form-control">
                    </label>
                </div>

                <div class="form-row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Селектор для названия</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name_count">Какой по счету текст</label>
                            <input type="text" name="name_count" id="name_count" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">Селектор для описания</label>
                            <input type="text" name="description" id="description" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description_count">Какой по счету текст</label>
                            <input type="text" name="description_count" id="description_count" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Селектор для картинки</label>
                    <input type="text" name="image" class="form-control" id="image">
                </div>

                <button type="submit" class="btn btn-primary">Начать</button>
            </form>
        </div>
    </div>
@endsection