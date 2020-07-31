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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}?n={{filemtime('css/main.css')}}" />
    @stack('styles')
    <style>
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            /*background-color:grey;*/
            /*background-image: url('https://to-moore.com/images/beeline.png');*/
            background-repeat: no-repeat;
            background-color: white;
            background-position: center;
        }
        @media screen and (min-width: 300px) and (max-width: 700px) {
            .preloader
            {
                background-size:80%;
            }
        }
        .preloader_catalog {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            /*background-color:grey;*/
            /*background-image: url('https://to-moore.com/images/beeline.png');*/
            background-repeat: no-repeat;
            background-color: #ffffff00;
            background-position: center;
        }
        @media screen and (min-width: 300px) and (max-width: 700px) {
            .preloader_catalog
            {
                background-size:80%;
            }
        }
    </style>
</head>
<body>
<div class="preloader">
    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
    <div class="text-center">
        <img class="logo-animate" style="width:50%;" src="{{ asset('images/logo2.png') }}" alt="">
        <h3 class="text-fut-bold pt-3 logo-text">
            Эрудит
        </h3>
    </div>
    </div>
</div>
<div class="preloader_catalog">
    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <img class="logo-animate" style="width:50%;" src="{{ asset('images/logo2.png') }}" alt="">
            <h3 class="text-fut-bold pt-3 logo-text">
                Эрудит
            </h3>
        </div>
    </div>
</div>
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
@push('scripts')
    <script>
        function preloader() {
            $('.preloader').fadeOut('slow').delay(1000);
        }
    </script>
    <script>
        setTimeout(preloader, 500);
    </script>
    <script>
        let result = $('#search-result-select2');
        result.parent().hide(0);
        $(document).on('keyup click','#search-input-select2', function () {
            let value = $(this).val();
            $('#all_results_btn_a').attr('href','/search?search='+value);
            if (value != '' && value.length >= 3) {
                // let searchBtn = $('#search-btn');
                // searchBtn.prop('href', '');
                // searchBtn.prop('href', '/search?search=' + value);
                $.ajax({
                    url: '{!! route('search') !!}',
                    data: {'search': value},
                    success: (data) => {
                        console.log(data);
                        result = result.html(data.html);
                        result.parent().slideDown(400);
                        result.siblings('span').css('opacity', 1);
                        result.find('.collapse').each((e, i) => {
                            registerCollapse($(i));
                        });
                        // registerCollapse(result);
                    },
                    error: () => {
                        console.log('error');
                    }
                });
            } else {
                result.parent().slideUp(400);
                result.empty();
            }
        });

        function registerCollapse(i)
        {
            i.on('show.bs.collapse', e => {
                let btn = $(e.currentTarget);
                let icons = $(btn.siblings('.collapses').find('span')[1]).find('i');
                let firstIcon = $(icons[0]);
                let secondIcon = $(icons[1]);
                firstIcon.addClass('d-none');
                secondIcon.removeClass('d-none');
                console.log(icons);
            });
            i.on('hide.bs.collapse', e => {
                let btn = $(e.currentTarget);
                let icons = $(btn.siblings('.collapses').find('span')[1]).find('i');
                let firstIcon = $(icons[0]);
                let secondIcon = $(icons[1]);
                secondIcon.addClass('d-none');
                firstIcon.removeClass('d-none');
                console.log(icons);
            });
        }

        // $('.collapse.collapse-multi').on('show.bs.collapse', e => {
        //     console.log(e);
        // });

        $(document).click(function(event) {
            if (!$(event.target).is("#search-input-select2, #search-result-select2, #search-result-ajax, .collapses, .collapse, .products, .collapses > span, .collapses > span > i")) {
                $("#search-result-select2").parent().slideUp(400);
            }
        });
    </script>
@endpush

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

    let url = $('.cart').attr('href');
    url += '?token=' + token;
    $('.cart').attr('href', url);

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
                $('.top-menu').slideUp(300);
                $('.menuse').addClass('solid-nav').delay(300);
                $('.menuse').addClass('shadow').delay(300);
                $('.scroll-none').removeClass('d-none').addClass('d-flex');
                $('.needToMoveFirst').html($('.search-main')).delay(400);
                $('.ico-menu').show(300);
            } else {
                $('.top-menu').slideDown(300);
                $('.menuse').removeClass('solid-nav').delay(300);
                $('.menuse').removeClass('shadow').delay(300);
                $('.scroll-none').addClass('d-none').removeClass('d-flex');
                $('.needToMoveSecond').html($('.search-main')).delay(400);
                $('.ico-menu').hide(300);
            }

        });
    });
</script>
<script>
    var owl = $('.owl-one');
    owl.owlCarousel({
        margin: 5,
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
                items: 2
            },1000: {
                items: 6
            }
        }
    })
</script>
<script>
    var owl = $('.owl-promotional');
    owl.owlCarousel({
        margin: 5,
        loop: false,
        responsive: {
            0: {
                items: 1
            },
            700: {
                items: 2
            },1000: {
                items: 6
            }
        }
    })
</script>
<script>
    var owl = $('.owl-holiday');
    owl.owlCarousel({
        margin: 5,
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
                items: 2
            },1000: {
                items: 6
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
