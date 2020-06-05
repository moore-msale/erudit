<nav class="nav flex-column text-left scrollbar" id="search-result-ajax" style="max-height: 500px;overflow-y: auto; width: 350px; overflow-x: hidden;">

@if($count)
    @foreach($result as $key => $items)
        <div class="position-relative">
            @if(count($items))
                <a class="nav-link collapses font-weight-bold pointer mb-0 mt-0 py-2 text-dark bg-white h4 position-sticky w-100 d-flex align-items-center"
                   style="z-index: 9; top: 0; left: 0;" data-toggle="collapse"
                   data-target="#collapseAjax{{ $loop->index }}" aria-expanded="false"
                   aria-controls="collapseAjax{{ $loop->index }}" tabindex="-1" aria-disabled="true">
                    <span class="border-bottom border-dark">{{ $key }}</span>
                    <span class="position-absolute" style="right: 10px;">
                        <i class="fas fa-plus fa-xs d-none"></i>
                        <i class="fas fa-minus fa-xs"></i>
                    </span>
                </a>
            @endif

            <div class="collapse collapse-multi show" id="collapseAjax{{ $loop->index }}">
                @foreach($items as $value)
                    <a class="nav-link products px-4" href="{{ route('book.show', $value->id) }}">
                <span class="d-flex align-items-center border-bottom pb-2">
                    <span class="col-2 p-0">
                        @if (filter_var($value->image, FILTER_VALIDATE_URL))
                            <img class="img-fluid" src="{{ $value->image }}" alt="">
                        @else
                            <img class="img-fluid" src="{{ asset('storage/'.$value->image)}}" alt="">
                        @endif
                    </span>
                    <span class="col">
                        {{ $value->name }}
                    </span>
                </span>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach

    {{--@if(count($result->collapse()) > 10)--}}
        {{--<button class="btn-primary text-fut-book but-hov mx-auto text-white py-2 w-100 position-absolute" style="bottom: 0; left: 0; width: 100%;font-size: 14px; border: 0px; cursor: pointer;">Показать все</button>--}}
    {{--@endif--}}
    <script type="text/javascript">
        $('#all_results_btn_a').show();
    </script>
@else

    <p class="text-center m-0 py-4">Нет результата</p>
    <script type="text/javascript">
        $('#all_results_btn_a').hide();
    </script>
@endif

</nav>
