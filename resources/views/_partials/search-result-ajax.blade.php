<nav class="nav flex-column text-left" id="search-result-ajax">

    @foreach($result as $key => $items)
        <div class="position-relative">
            @if(count($items))
                <a class="nav-link bg-grey-light collapses font-weight-bold  mb-2 mt-0 py-2 disabled h4 position-sticky w-100" style="z-index: 9; top: 0; left: 0;" data-toggle="collapse" data-target="#collapseAjax{{ $loop->index }}" aria-expanded="false" aria-controls="collapseAjax{{ $loop->index }}" tabindex="-1" aria-disabled="true">{{ $key }}</a>
            @endif

            <div class="collapse collapse-multi show" id="collapseAjax{{ $loop->index }}">
                @foreach($items as $value)
                    <a class="nav-link border-bottom products py-2" href="{{ route('book.show', $value->id) }}">
                <span class="d-flex align-items-center">
                    <span class="col-3 p-0">
                        <img src="{{ asset('storage/'.$value->image) }}" class="img-fluid" alt="">
                    </span>
                    <span class="col-9">
                        {{ $value->name }}
                    </span>
                </span>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach

    @if(count($result->collapse()) > 10)
        <button class="btn btn-primary position-absolute" style="bottom: 0; left: 0; width: 100%;">Показать все</button>
    @endif

</nav>