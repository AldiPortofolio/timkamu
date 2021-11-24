<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    @if(ENV('APP_ENV') === 'prod')
        <meta name="propeller" content="ac05b71452e7fecc0988a8d0161b0af9">
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon2/apple-icon-57x57.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon2/apple-icon-60x60.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon2/apple-icon-72x72.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon2/apple-icon-76x76.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon2/apple-icon-114x114.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon2/apple-icon-120x120.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon2/apple-icon-144x144.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon2/apple-icon-152x152.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon2/apple-icon-180x180.png?v=2') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicon2/android-icon-192x192.png?v=2') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon2/favicon-32x32.png?v=2') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon2/favicon-96x96.png?v=2') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon2/favicon-16x16.png?v=2') }}">
    <link rel="manifest" href="{{ asset('favicon2/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png?v=2">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(Request::is('events/*') && isset($event))
        @if($event->league_game_id)
            <title>{{ $event->name }} (#{{ $event->id}}) - {{ $event->league_games->leagues->name }} {{ Auth::user() ? ' - '.Auth::user()->username : '' }} / TimKamu.com</title>
            <meta name="keywords" content="{{ $event->name }} (#{{ $event->id}}) - {{ $event->league_games->leagues->name }} {{ Auth::user() ? ' - '.Auth::user()->username : '' }} / TimKamu.com" />
            <meta name="description" content="{{ $event->name }} (#{{ $event->id}}) - {{ $event->league_games->leagues->name }} {{ Auth::user() ? ' - '.Auth::user()->username : '' }} / TimKamu.com" />
        @else
            <title>{{ $event->name }} (#{{ $event->id}}) {{ Auth::user() ? ' - '.Auth::user()->username : '' }} / TimKamu.com</title>
            <meta name="keywords" content="{{ $event->name }} (#{{ $event->id}}) {{ Auth::user() ? ' - '.Auth::user()->username : '' }} / TimKamu.com" />
            <meta name="description" content="{{ $event->name }} (#{{ $event->id}}) {{ Auth::user() ? ' - '.Auth::user()->username : '' }} / TimKamu.com" />
        @endif

        <meta property="og:url" content="https://www.timkamu.com/events/detail/{{ $event->id}}" />
        <meta property="og:type" content="article" />
        @if($event->league_game_id)
            <meta property="og:title" content="{{ $event->name }} (#{{ $event->id}}) - {{ $event->league_games->leagues->name }}" />
        @else
            <meta property="og:title" content="{{ $event->name }} (#{{ $event->id}})" />
        @endif
        <meta property="og:description" content="TimKamu - Tempat nongkrongnya anak e-sports" />
    @else
        <title>@yield('page_title') {{ Auth::user() ? ' - '.Auth::user()->username : '' }} / TimKamu.com</title>
        <meta name="keywords" content="TimKamu - Tempat nongkrongnya anak e-sports" />
        <meta name="description" content="TimKamu - Tempat nongkrongnya anak e-sports" />
    @endif

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->

	<link rel="stylesheet" href="{{ asset('css/mana-ui.css?v=134') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/cdn/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">

    {{-- <!-- script google adsense -->
    <script data-ad-client="ca-pub-9891162058105008" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}

</head>
<body class="@yield('body_class')">
@if(ENV('APP_ENV') !== 'local')
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v8.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
         attribution=setup_tool
         page_id="114294523688055">
    </div>
@endif


@yield('content')
@include('includes.mana-ui.modals')
@if(ENV('APP_ENV') === 'prod' && !Request::is('admin-tkmu/*'))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-177302264-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-177302264-1');
    </script>
@endif

<!--Start of Tawk.to Script-->
{{-- @if(ENV('APP_ENV') !== 'local')
<script type="text/javascript">
    // only run this script above 992 viewport width
    const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5f44fef2cc6a6a5947ae9ec1/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
@endif --}}
<!--End of Tawk.to Script-->

<!-- bootstrap -->
<script src="{{ asset('bootstrap/cdn/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('bootstrap/cdn/popper.min.js') }}"></script>
<script src="{{ asset('bootstrap/cdn/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ ENV('MIDTRANS_JSURL') }}" data-client-key="{{ ENV('MIDTRANS_CK') }}"></script>

<!-- feathericons -->
<script src="{{ asset('vendors/feathericons/feathericons.js') }}"></script>

<!-- scrollmagic -->
<!-- <script src="{{ asset('vendors/scrollmagic/TweenMax.min.js') }}"></script> -->
<script src="{{ asset('vendors/scrollmagic/ScrollMagic.min.js') }}"></script>
<!-- <script src="{{ asset('vendors/scrollmagic/animation.gsap.min.js') }}"></script> -->


<script src="{{ asset('vendors/swiper/swiper-bundle.js') }}"></script>
<script src="{{ asset('vendors/swiper/swiper-bundle.min.js') }}"></script>

<!-- custom scripts -->
<script src="{{ asset('js/functions.js?v=123') }}"></script>

<!-- Scripts for ALL pages -->
<script type="text/javascript">
    $(document).ready(function() {

        // feather icons
        feather.replace();

        // various modal scripts
        initModalScripts();

        // mobile menu initiation
        manaUiMobileMenu();

        // tooltips
        $('[data-toggle="tooltip"]').tooltip();

        // for changing avatar
        // initAvatarChangeViaModal();

        // init ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>

@auth
    <script>
        initExpBarWidth();
        function initExpBarWidth(){
            @if($total_exp > $next_rank->value)
            var widthBar = 101;
            @else
            var widthBar = "{{ ((($total_exp - $current_rank->value)/($next_rank->value - $current_rank->value))*100) }}";
            @endif
            if(widthBar > 100) {
                $('body').append('<style> .lp-exp-gained-bar {width:100% !important;}</style>');
            } else {
                $('body').append('<style> .lp-exp-gained-bar {width:'+ widthBar +'% !important;}</style>');
            }
        }


        $(document).ready(function() {
            var idEvent = '';
            var abc = setInterval(
                function(){
                    $.ajax({
                        url: "{{ url('ajax/check-event-finish') }}/",
                        method: 'get',
                        success: function(result) {
                            if(result.message !== 'no new finish event') {
                                idEvent = result.id

                                $('#prediction-results-avail .message span').html(result.message);
                                $('#prediction-results-avail').modal('show')

                                $('.menu-system-mail').addClass('new');
                                clearInterval(abc);

                                $.ajax({
                                    url: "{{ url('ajax/system-mail') }}/" + idEvent,
                                    method: 'get',
                                    success: function(result) {
                                        //
                                    }
                                })
                            }
                        }
                    })
                }, 3000
            );

            $('.btn-goto-system-mail').on('click', function(e) {
                e.preventDefault();

                var urlString = "{{ url('profile/system-mail') }}";
                location.href = urlString;
            })

            var bcd = setInterval(
                function(){
                    $.ajax({
                        url: "{{ url('ajax/get-event-odd') }}/",
                        method: 'get',
                        success: function(result) {
                            if(result.events !== '') {
                                $('#feature-matches').html(result.events);
                            } else {
                                clearInterval(bcd);
                            }
                        }
                    })
                }, 5000
            );
        })
    </script>
@endauth

<script>
    $('.game-unvailable').on('click', function(e) {
        e.preventDefault();

        var reason = $(this).data('reason');
        var open = $(this).data('open');

        $('#game-unavailable .reason').text(reason);
        $('#game-unavailable .open-date').text(open);
        $('#game-unavailable').modal("show");
    });
</script>

<script>
    $('.game-comingsoon').on('click', function(e) {
        e.preventDefault();

        $('#game-comingsoon').modal("show");
        // copy to clipboard
    });

    initCopyToClipboard();
</script>
<script src="{{ asset('js/functions.js?v=123') }}"></script>
<script>
    $('body').on('click', '.convert-coin-lp-btn', function(e) {
        e.preventDefault();

        var user = "{{ Auth::id() }}";
        var totalCoin = "{{ $total_coin }}";
        var target = $(this);
        var target2 = $('#coins-lp-convert-modal');
        var target3 = $('#coins-lp-convert-success');

        var nominal = $('#coins-lp-convert-modal .nominal-convert').val();

        if(user === '') {
            target2.modal('hide');

            $('#modal-need-login').modal('show');
            $('#modal-need-login-msg').text('Kamu butuh login untuk melakukan itu.');

            return false
        }

        if(parseInt(totalCoin) < parseInt(nominal)) {
            target2.modal('hide');

            $('#modal-convert-error').modal('show');
            $('#modal-convert-error-msg').text('Nominal yang dimasukkan lebih besar dari saldo Coin yang kamu miliki.');
            $('#modal-convert-error .mana-btn-54').attr('data-target', '#coins-lp-convert-modal');

            return false;
        }

        if(parseInt(nominal) % 10 !== 0) {
            target2.modal('hide');

            $('#modal-convert-error').modal('show');
            $('#modal-convert-error-msg').text('Nominal coin harus kelipatan 10.');
            $('#modal-convert-error .mana-btn-54').attr('data-target', '#coins-lp-convert-modal');

            return false;
        }

        $(this).addClass('loading');

        $.ajax({
            url: "{{ url('ajax/convert-coin-lp') }}",
            method: "POST",
            data : {
                nominal: nominal
            },
            success : function(response) {
                console.log(response);
                target.removeClass('loading');
                target2.modal('hide');
                if(response.status === 'error' && response.message === 'need login') {
                    $('#modal-need-login').modal('show');
                    $('#modal-need-login-msg').text('Kamu butuh login untuk melakukan itu.');
                } else if(response.status === 'error' && response.message === 'over current bp') {
                    $('#modal-convert-error').modal('show');
                    $('#modal-convert-error-msg').text('Nominal yang dimasukkan lebih besar dari saldo Coin yang kamu miliki.');
                    $('#modal-convert-error .mana-btn-54').attr('data-target', '#coins-lp-convert-modal');
                } else if(response.status === 'error') {
                    $('#modal-convert-error').modal('show');
                    $('#modal-convert-error-msg').text('There is something wrong. Please try again later');
                    $('#modal-convert-error .mana-btn-54').attr('data-target', '#coins-lp-convert-modal');
                } else if(response.status === 'success') {
                    $('.amt-lp').text(response.total_lp);
                    $('.amt-coin').text(response.total_coin);
                    totalCoin = response.total_coin;
                    $('.amt-convert').text(nominal);
                    $('.amt-converted').text(response.nominal);

                    target3.modal('show');
                }
            }
        })
    })

    $('.convert-bp-lp-btn').on('click', function(e) {
        e.preventDefault();

        var user = "{{ Auth::id() }}";
        var verify = "{{ Auth::user() ? Auth::user()->phone_verified : '' }}";
        var totalBP = "{{ $total_bp }}";

        var nominal = $('#bp-lp-convert-modal .nominal-convert').val();
        var target = $(this);
        var target2 = $('#bp-lp-convert-modal');
        var target3 = $('#bp-lp-convert-success');
{{--	@include('includes.mana-ui.match-info')--}}
{{--	@include('includes.mana-ui.event-category')--}}

{{--    @yield('content')--}}

        if(user === '') {
            target2.modal('hide');

            $('#modal-need-login').modal('show');
            $('#modal-need-login-msg').text('Kamu butuh login untuk melakukan itu.');

            return false
        }

        if(verify === '0') {
            target2.modal('hide');

            $('#modal-need-login').modal('show');
            $('#modal-need-login-msg').text('Kamu butuh verify nomor telefon untuk melakukan itu.');

            return false
        }

        if(parseInt(totalBP) < parseInt(nominal)) {
            target2.modal('hide');

            $('#modal-convert-error').modal('show');
            $('#modal-convert-error-msg').text('Nominal yang dimasukkan lebih besar dari saldo BP yang kamu miliki.');
            $('#modal-convert-error .mana-btn-54').attr('data-target', '#bp-lp-convert-modal');
	<!-- custom scripts -->
            return false;
        } else if(parseInt(nominal) % 9 !== 0) {
            target2.modal('hide');

            $('#modal-convert-error').modal('show').find('#modal-convert-error-msg').text('Convert BP to LP hanya dalam kelipatan 9');
            $('#modal-convert-error .mana-btn-54').attr('data-target', '#bp-lp-convert-modal');

            return false;
        }

        $(this).addClass('loading');

        $.ajax({
            url: "{{ url('ajax/convert-bp-lp') }}",
            method: "POST",
            data : {
                nominal: nominal
            },
            success : function(response) {
                target.removeClass('loading');
                target2.modal('hide');
                if(response.status === 'error' && response.message === 'need login') {
                    $('#modal-need-login').modal('show');
                    $('#modal-need-login-msg').text('Kamu butuh login untuk melakukan itu.');
                } else if(response.status === 'error' && response.message === 'over current bp') {
                    $('#modal-convert-error').modal('show');
                    $('#modal-convert-error-msg').text('Nominal yang dimasukkan lebih besar dari saldo BP yang kamu miliki.');
                    $('#modal-convert-error .mana-btn-54').attr('data-target', '#bp-lp-convert-modal');
                } else if(response.status === 'error' && response.message === 'kelipatan 9') {
                    $('#modal-convert-error').modal('show');
                    $('#modal-convert-error-msg').text('Convert BP to LP hanya dalam kelipatan 9.');
                    $('#modal-convert-error .mana-btn-54').attr('data-target', '#bp-lp-convert-modal');
                } else if(response.status === 'success') {
                    $('.amt-lp').text(response.total_lp);
                    $('.amt-bp').text(response.total_bp);
                    $('.amt-convert').text(response.nominal);

                    target3.modal('show');
                }
            }
        })
    })
</script>

@yield('js')
</body>
</html>
