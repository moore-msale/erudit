@component('mail::message')


    <html>
    <body>
    <div style="padding:7%; border:4px #000000 solid; margin-bottom:5%; position: relative">
        {{--        @dd($newCart->name)--}}
        <h2>## Заказ № {{ $newCart->id }}</h2>
        <br>
        <br>
        <strong>Имя:</strong> {{ $newCart->name}}<br>
        <strong>Номер телефона:</strong> {{ $newCart->phone}}<br>
        @if(isset($newCart->email))
            <strong>Email:</strong> {{ $newCart->email}}<br>
        @endif
        {{--@dd($newCart)--}}
            <strong>Адрес:</strong> {{ $newCart->address}}<br>
        @if(isset($newCart->comment))
        <strong>Комментарий: {{ $newCart->comment }}</strong>
        @endif
        <br><br>
        <h3>Заказ</h3>
        <div style="display:flex;">
            <div style="width:50%;">Название</div>
            <div style="width:25%;">Кол-во</div>
            <div style="width:25%;">Цена</div>
        </div>
        @foreach($newCart->cart['cart'] as $item)

            <div style="display:flex;">
                {{--@dd($item)--}}
                <a href="http://eruditshop.com/book/{{ $item['id'] }}"><div style="width:50%;">{{ $item['name'] }}</div></a>
                <div style="width:25%;">{{ $item['quantity'] }}</div>

                <div style="width:25%;">{{ $item['price'] }} сом</div>
            </div>
            <hr/>
        @endforeach
        <br><br>
        <h3>Общая цена: {{ $newCart->cart['total'] }} сом</h3>
        @if(isset($newCart->discount))
        <h3>Скидка: {{$newCart->discount}}%</h3>
        @endif
        @if(isset($newCart->sum))
        <h3>Вносимая сумма: {{ $newCart->sum }} сом</h3>
        <h3>Сдача: {{ $newCart->diff }}</h3>
        @endif
    </div>
    </body>
    </html>
@endcomponent
