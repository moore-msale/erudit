@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 15%; padding-bottom: 10%;">
        <div class="text-center pt-5">
            <h2>Все товары по жанру: <span class="nav-link font-weight-bold  mt-2 py-0 disabled h1" >{{ $search_input }}</span></h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                @foreach($result as $key => $items)
{{--                    @if(count($items))--}}
{{--                        <a class="nav-link font-weight-bold  mt-2 py-0 disabled h1"  data-toggle="collapse" data-target="#collapse{{ $loop->index }}" aria-expanded="false" aria-controls="collapse{{ $loop->index }}" tabindex="-1" aria-disabled="true">{{ $key }}</a>--}}
{{--                        <h1>{{$items}}</h1>--}}
{{--                    @endif--}}

                    <div class="row collapse collapse-multi show" id="collapse{{ $loop->index }}">
                        @foreach($items as $value)
                            @include('books.single', ['book' => $value])
                        @endforeach
                    </div>
                @endforeach
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

                    @if($result instanceof \Illuminate\Pagination\LengthAwarePaginator)

                        <div class="row pl-4 ml-0 pt-3">
                            {{ $result->appends(request()->query())->links() }}
                        </div>
                    @endif
            </div>

        </div>
    </div>
@stop
