<div class="owl-one owl-carousel text-center">
    @foreach($books as $bestseller)
        @if($bestseller->bestseller ==  1)
    <div class="item" style="padding:15%;">
        <div style="float: right; padding:10%;">
        <figure class='book'>
            <ul class='hardcover_front'>
                <li>
                    <div class="coverDesign yellow" style="">
                        <img src="{{ asset('storage/'.$bestseller->image) }}" alt="" width="100%" height="100%">
                    </div>
                </li>
                <li></li>
            </ul>
            <ul class='page'>
                <li></li>
                <li>
                    <p class="pt-3 text-fut-book px-3" style="color: black;">
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
    {{--<div class="item" style="padding:10%;">--}}
        {{--<div style="float: right;">--}}
        {{--<figure class='book'>--}}
            {{--<ul class='hardcover_front'>--}}
                {{--<li>--}}
                    {{--<div class="coverDesign yellow" style="">--}}
                        {{--<img src="{{ asset('images/book5.png') }}" alt="" width="100%" height="100%">--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li></li>--}}
            {{--</ul>--}}
            {{--<ul class='page'>--}}
                {{--<li></li>--}}
                {{--<li>--}}
                    {{--<a class="btn" href="#">Перейти</a>--}}
                {{--</li>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
            {{--</ul>--}}
            {{--<ul class='hardcover_back'>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
            {{--</ul>--}}
            {{--<ul class='book_spine'>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
            {{--</ul>--}}
        {{--</figure>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="item" style="padding:10%;">--}}
        {{--<div style="float: right;">--}}
        {{--<figure class='book'>--}}
            {{--<ul class='hardcover_front'>--}}
                {{--<li>--}}
                    {{--<div class="coverDesign yellow" style="">--}}
                        {{--<img src="{{ asset('images/book6.jpg') }}" alt="" width="100%" height="100%">--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li></li>--}}
            {{--</ul>--}}
            {{--<ul class='page'>--}}
                {{--<li></li>--}}
                {{--<li>--}}
                    {{--<a class="btn" href="#">Перейти</a>--}}
                {{--</li>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
            {{--</ul>--}}
            {{--<ul class='hardcover_back'>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
            {{--</ul>--}}
            {{--<ul class='book_spine'>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
            {{--</ul>--}}
        {{--</figure>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="item" style="padding:10%;">--}}
        {{--<div style="float: right;">--}}
        {{--<figure class='book'>--}}
            {{--<ul class='hardcover_front'>--}}
                {{--<li>--}}
                    {{--<div class="coverDesign yellow" style="">--}}
                        {{--<img class="w-100" src="{{ asset('images/book7.jpg') }}" alt="" width="100%" height="100%">--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li></li>--}}
            {{--</ul>--}}
            {{--<ul class='page'>--}}
                {{--<li></li>--}}
                {{--<li>--}}
                    {{--<p style="font-family: 'Times New Roman'; padding-top: 10%;">Ведьмак Меч предназначения</p>--}}

                    {{--<a class="btn" href="#">Перейти</a>--}}
                {{--</li>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
            {{--</ul>--}}
            {{--<ul class='hardcover_back'>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
            {{--</ul>--}}
            {{--<ul class='book_spine'>--}}
                {{--<li></li>--}}
                {{--<li></li>--}}
            {{--</ul>--}}
        {{--</figure>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="item" style="padding:10%;">--}}
        {{--<div style="float: right;">--}}
            {{--<figure class='book'>--}}
                {{--<ul class='hardcover_front'>--}}
                    {{--<li>--}}
                        {{--<div class="coverDesign yellow" style="">--}}
                            {{--<img class="w-100" src="{{ asset('images/book8.jpeg') }}" alt="" width="100%" height="100%">--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li></li>--}}
                {{--</ul>--}}
                {{--<ul class='page'>--}}
                    {{--<li></li>--}}
                    {{--<li>--}}
                        {{--<p style="font-family: 'Times New Roman'; padding-top: 10%;">Гарри Поттер</p>--}}
                        {{--<a class="btn" href="#">Перейти</a>--}}
                    {{--</li>--}}
                    {{--<li></li>--}}
                    {{--<li></li>--}}
                    {{--<li></li>--}}
                    {{--<li></li>--}}
                    {{--<li></li>--}}
                    {{--<li></li>--}}
                    {{--<li></li>--}}
                    {{--<li></li>--}}
                {{--</ul>--}}
                {{--<ul class='hardcover_back'>--}}
                    {{--<li></li>--}}
                    {{--<li></li>--}}
                {{--</ul>--}}
                {{--<ul class='book_spine'>--}}
                    {{--<li></li>--}}
                    {{--<li></li>--}}
                {{--</ul>--}}
            {{--</figure>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>