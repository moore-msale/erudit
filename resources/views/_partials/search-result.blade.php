@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 15%; padding-bottom: 10%;">
    <div class="row text-center pt-5">
        <h2>Результаты поиска</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            @foreach($result as $key => $items)
                @if(count($items))
                    <a class="nav-link font-weight-bold  mt-2 py-0 disabled h1"  data-toggle="collapse" data-target="#collapse{{ $loop->index }}" aria-expanded="false" aria-controls="collapse{{ $loop->index }}" tabindex="-1" aria-disabled="true">{{ $key }}</a>
                @endif

                <div class="row collapse collapse-multi show" id="collapse{{ $loop->index }}">
                    @foreach($items as $value)
                        @include('books.single', ['book' => $value])
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop