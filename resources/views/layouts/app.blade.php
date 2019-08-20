<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Эрудит</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/book.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
    @stack('styles')

</head>
<body>
<div id="app">
    @include('_partials.header')
    <main>
@yield('content')
    </main>
    @include('_partials.footer')
    @include('_partials.modals.cart')
</div>

<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="{{ asset('js/jquery.min.js') }}"></script>--}}
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
@stack('scripts')
<script>
    function fetchCart() {
        $.ajax({
            url: '{{ route('cart.index') }}',
            data: {
                token: '{{ Session::has('token') ? Session::get('token') : uniqid() }}'
            },
            success: data => {
                let result = freshCartHtml(data.html);
                result.find('.buy_book').each((index, item) => {
                    registerCartBuyButtons($(item));
                });
                result.find('.remove_book').each((index, item) => {
                    registerCartRemoveButtons($(item));
                });
                result.find('.delete_book').each((index, item) => {
                    registerCartDeleteButtons($(item));
                });
            },
            error: () => {
                console.log('error');
            }
        });
    }

    function registerCartBuyButtons(data) {

        data.click(e => {
            e.preventDefault();
            console.log('registered');

            let btn = $(e.currentTarget);
            let id = btn.data('id');
            let token = "{{ Session::has('token') ? Session::get('token') : uniqid() }}";
            let cart = null;

            $.ajax({
                url: '{{ route('cart.add') }}',
                data: {
                    book_id: id,
                    count: 1,
                    token: token
                },
                success: data => {
                    btn.find('i.fas').addClass('cart-success').addClass('cart-animate').delay(1000).removeClass('cart-animate');
                    $('.carts').addClass('cart-success').addClass('cart-animate').delay(1000).removeClass('cart-animate');
                    cart = fetchCart();
                },
                error: () => {
                    console.log('error');
                }
            });
        });
    }
    function registerCartRemoveButtons(data) {

        data.click(e => {
            e.preventDefault();
            console.log('registered');

            let btn = $(e.currentTarget);
            let id = btn.data('id');
            let token = "{{ Session::has('token') ? Session::get('token') : uniqid() }}";
            let cart = null;

            $.ajax({
                url: '{{ route('cart.remove') }}',
                data: {
                    book_id: id,
                    count: 1,
                    token: token
                },
                success: data => {
                    cart = fetchCart();
                },
                error: () => {
                    console.log('error');
                }
            });
        });
    }

    function registerCartDeleteButtons(data) {

        data.click(e => {
            e.preventDefault();
            console.log('registered');

            let btn = $(e.currentTarget);
            let id = btn.data('id');
            let token = '{{ Session::has('token') ? Session::get('token') : uniqid() }}';
            let cart = null;

            $.ajax({
                url: '{{ route('cart.delete') }}',
                data: {
                    book_id: id,
                    token: token
                },
                success: data => {
                    cart = fetchCart();
                },
                error: () => {
                    console.log('error');
                }
            })
        });
    }

    $('.buy_book').each((index, item) => {
         registerCartBuyButtons($(item));
    });

    $('.remove_book').each((index, item) => {
         registerCartRemoveButtons($(item));
    });

    $('.delete_book').each((index, item) => {
        registerCartDeleteButtons($(item));
    });

    function freshCartHtml(html) {
        return $('.modal-body-cart').html(html);
    }

    fetchCart();

    $('.cart').click(e => {
        e.preventDefault();
        $('#cart-modal').modal('show');
        // freshCartHtml(fetchedCart);
    });


</script>
<script>

    $(document).ready(function() {
        $(window).scroll(function() {
            var height = 50;
            var scrollTop = $(window).scrollTop();

            if (scrollTop >= height - 5) {
                $('.menuse').addClass('solid-nav');
                $('.menuse').addClass('shadow');
                $('.top-menu').addClass('height-null');
                $('.down-menu').removeClass('pt-4');
                $('.ico-menu').show(300);
            } else {
                $('.menuse').removeClass('solid-nav');
                $('.menuse').removeClass('shadow');
                $('.top-menu').removeClass('height-null');
                $('.down-menu').addClass('pt-4');
                $('.ico-menu').hide(300);
            }

        });
    });
</script>
<script>
    var owl = $('.owl-one');
    owl.owlCarousel({
        margin: 10,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            700: {
                items: 4
            }
        }
    })
</script>
<script>
    var owl = $('.owl-two');
    owl.owlCarousel({
        margin: 10,
        loop: true,
        responsive: {
            0: {
                items: 1
            }
        }
    })
</script>
</body>
</html>