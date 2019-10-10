<div class="owl-two owl-carousel text-center car-nav-close">
    @foreach($books as $bestseller)
        @if($bestseller->bestseller ==  1)
            <div class="item" style="padding:15%;">
                <div style="float: right; padding:10%;">
                    <figure class='book'>
                        <ul class='hardcover_front'>
                            <li>
                                <div class="coverDesign yellow" style="">
                                    @if (filter_var($bestseller->image, FILTER_VALIDATE_URL))
                                        <img class="w-100" style="height: 60%;" src="{{ $bestseller->image }}" alt="">
                                    @else
                                        <img src="{{ asset('storage/'.$bestseller->image) }}" alt="" width="100%" height="100%">
                                    @endif
                                </div>
                            </li>
                            <li></li>
                        </ul>
                        <ul class='page'>
                            <li></li>
                            <li>
                                <p class="pt-3 text-fut-book px-3" style="color: #444;">
                                    {{ $bestseller->name }}
                                </p>
                                <a class="btn but-hov" href="{{ asset('book/'.$bestseller->id) }}">Посмотреть</a>
                            </li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <ul class='hardcover_back'>
                            <li></li>
                            <li></li>
                        </ul>
                        <ul class='book_spine'>
                            <li></li>
                            <li></li>
                        </ul>
                    </figure>
                </div>
            </div>
        @endif
    @endforeach
</div>
