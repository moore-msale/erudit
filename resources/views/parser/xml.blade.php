@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 20%; padding-bottom: 15%;">
        <div class="row">
            <form action="{{ route('parser.parse', 'xml') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>
                        Ссылку на сайт
                        <input type="text" name="urlForParse" class="form-control">
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Начать</button>
            </form>
        </div>
    </div>
@endsection