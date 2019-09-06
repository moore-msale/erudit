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
    <main class="position-relative" style="overflow: hidden;">
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
    /*
 * Replace all SVG images with inline SVG
 */
    jQuery('img.svg').each(function(){
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        jQuery.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');

            // Add replaced image's ID to the new SVG
            if(typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if(typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass+' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
            if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
            }

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');

    });
</script>
<script>
    let token = "{{ Session::has('token') ? Session::get('token') : uniqid() }}";

    function fetchCart() {
        $.ajax({
            url: '{{ route('cart.index') }}',
            data: {
                token: token
            },
            success: data => {
                console.log(data);
                let result = freshCartHtml(data.html, data.total);
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
            let token = token;
            let cart = null;

            $.ajax({
                url: '{{ route('cart.add') }}',
                data: {
                    book_id: id,
                    count: 1,
                    token: token
                },
                success: data => {
                    btn.addClass('btn-success').delay(2000).queue(function(){
                        btn.removeClass("btn-success").dequeue();
                    });
                    $('.carts').addClass('btn-success');
                    doBounce($('.cart-count'), 3, '5px', 90);
                    cart = fetchCart();
                },
                error: () => {
                    console.log('error');
                }
            });
        });
    }
    function doBounce(element, times, distance, speed) {
        for(var i = 0; i < times; i++) {
            element.animate({marginTop: '-='+distance}, speed)
                .animate({marginTop: '+='+distance}, speed);
        }
    }
    function registerCartRemoveButtons(data) {

        data.click(e => {
            e.preventDefault();
            console.log('registered');

            let btn = $(e.currentTarget);
            let id = btn.data('id');
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

    function freshCartHtml(html, total) {
        total > 0 ? $('.cart-count').addClass('d-flex').html(total) : $('.cart-count').removeClass('d-flex').html('');
        return $('.modal-body-cart').html(html);
    }

    fetchCart();

    // $('.cart').click(e => {
    //     e.preventDefault();
    //     $('#cart-modal').modal('show');
    //     // freshCartHtml(fetchedCart);
    // });


</script>
<script src="{{ asset('js/rellax.min.js') }}"></script>
<script>
    let rellax = new Rellax('.scroll-svg-up', {
        speed: 1
    });
    let rellax2 = new Rellax('.scroll-svg-down', {
        speed: -1
    });
</script>
<script>

    $(document).ready(function() {
        let lastScrollTop = $(window).scrollTop();
        
        $(window).scroll(function() {
            var st = $(this).scrollTop();
            if (st > lastScrollTop){
                // downscroll code

            } else {
                // upscroll code
            }
            lastScrollTop = st;
            
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
        // autoplay:true,
        // autoplayTimeout:5000,
        // autoplaySpeed: 1500,
        // autoplayHoverPause:true,
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
