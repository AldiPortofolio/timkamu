@extends('layouts.mana-ui')

@section('page_title', "Home")
@section('body_class', 'mana-ui mana-home')

@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')
@include('includes.mana-ui.match-info')

<!-- page content -->
<section id="page-content">

{{--	<div id="home-promo-cards" class="mb-20">--}}
{{--		<div class="container">--}}
{{--			<div class="row justify-content-center">--}}
{{--				<div class="col-md-8 col-lg-6">--}}

{{--					<!-- event promo -->--}}
{{--					<a href="https://timkamu.com/events/pubgm-global-championship-1912-19-dec-20-1800-92"><img src="{{ asset('img/game-thumbs/pubgmgc.jpg') }}" class="bd20 w-100 mb-20 scale-onclick"></a>--}}

{{--					<!-- other promo -->--}}
{{--					<img src="{{ asset('img/promos/ig-cashback.jpg') }}" class="bd20 w-100 cursor-ptr mb-20 scale-onclick" data-toggle="modal" data-target="#hero-promo-5">--}}
{{--					<img src="{{ asset('img/promos/cash-discount.jpg') }}" class="bd20 w-100 cursor-ptr mb-20 scale-onclick" data-toggle="modal" data-target="#hero-promo-4">--}}
{{--					<img src="{{ asset('img/promos/referral.jpg') }}" class="bd20 w-100 cursor-ptr mb-20 scale-onclick" data-toggle="modal" data-target="#hero-promo-3">--}}
{{--					<img src="{{ asset('img/ins-0.jpg') }}" class="bd20 w-100 cursor-ptr scale-onclick" data-toggle="modal" data-target="#hero-promo-2">--}}

{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}

<!-- page section -->
    <div id="home-promo" class="mb-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">

                    <div class="section-title position-relative">
                        <h2 class="rajdhani-bold font-size-26 mb-20">Promo</h2>
                        <a href="{{route('promotions')}}" class="o5 section-title-meta-link font-size-14">Lihat Semua</a>
                    </div>

                    <!-- Slider main container -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
{{--                            <div class="swiper-slide">--}}
{{--                                <a href="https://timkamu.com/events/pubgm-global-championship-1912-19-dec-20-1800-92">--}}
{{--                                    <img src="{{ asset('img/game-thumbs/pubgmgc.jpg') }}" class="shop-item-thumb">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="swiper-slide">--}}
{{--                                <a href="/mana/top-up-mlbb">--}}
{{--                                    <img src="{{ asset('img/outright/1home.jpg') }}" class="shop-item-thumb">--}}
{{--                                </a>--}}
{{--                            </div>--}}
                            <div class="swiper-slide">
                                <a href="#" data-toggle="modal" data-target="#hero-promo-20">
                                    <img src="{{ asset('img/promos/26rbkedua-2.jpg') }}" class="shop-item-thumb">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{route('events.detail', "m2wcmlbb")}}">
                                    <img src="{{ asset('img/outright/m2wc2021-front.jpg') }}" class="shop-item-thumb">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#" data-toggle="modal" data-target="#hero-promo-5">
                                    <img src="{{ asset('img/promos/ig-cashback.jpg') }}" class="shop-item-thumb">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#" data-toggle="modal" data-target="#hero-promo-4">
                                    <img src="{{ asset('img/promos/cash-discount.jpg') }}" class="shop-item-thumb">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#" data-toggle="modal" data-target="#hero-promo-3">
                                    <img src="{{ asset('img/promos/referral-big.jpg') }}" class="shop-item-thumb">
                                </a>
                            </div>
                            <div class="swiper-slide" data-toggle="modal" data-target="#hero-promo-2">
                                <a href="#">
                                    <img src="{{ asset('img/ins00.jpg') }}" class="shop-item-thumb">
                                </a>
                            </div>
                        <!-- <div class="swiper-slide" data-toggle="modal" data-target="#toko-tutup-notice">
								<a href="#">
									<img src="{{ asset('img/game-thumbs/cod-mobile.jpg') }}" class="shop-item-thumb">
									<div class="shop-item-name mt-10 mb-0">COD Mobile</div>
									<div class="shop-item-name-meta o5 font-size-14">Coming soon</div>
								</a>
							</div> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
	<!-- page section -->
	@guest
	<div id="home-welcome-hero" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="home-welcome-container bd20 bg010">
						<h1 class="rajdhani-bold mb-30">Selamat datang, Guest</h1>

						<a href="{{ url('sign-in') }}" class="mana-btn-54 mana-btn-red scale-onclick mb-15">Sign In</a>
						<a href="{{ url('sign-up') }}" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Buat Akun Baru</a>
					</div>

				</div>
			</div>
		</div>
    </div>
    @endguest

	<!-- page section -->
	<div id="diamonds-top-up" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="section-title position-relative">
						<h2 class="rajdhani-bold font-size-26 mb-20">Top Up</h2>
						<a href="{{ url('purchase/detail?name=diamond') }}" class="o5 section-title-meta-link font-size-14">Lihat Semua</a>
					</div>

					<!-- Slider main container -->
					<div class="swiper-container">
						<div class="swiper-wrapper">
							@foreach ($shops->where('type', 'game') as $shop)
								<div class="swiper-slide @if($shop->active === '0' && $shop->meta === 'Coming Soon')game-comingsoon @elseif($shop->active === '0') game-unvailable @endif" @if($shop->active === '0') data-reason="{{ $shop->reason }}" data-open="{{ \Carbon\Carbon::parse($shop->open_date)->format('l d M Y H:i') }}" @endif>
									<a href="@if($shop->active === '0')#@else{{ url('purchase/detail?name=diamond&type='.$shop->alias) }}@endif">
										<img src="{{ $shop->logo }}" class="shop-item-thumb">
										<div class="shop-item-name mt-10 mb-0">{{ $shop->name }}</div>
										<div class="shop-item-name-meta o5 font-size-14">{{ $shop->meta }}</div>
									</a>
								</div>
							@endforeach
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div id="isi-pulsa" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="section-title position-relative">
						<h2 class="rajdhani-bold font-size-26 mb-20">Isi Pulsa</h2>
						<a href="{{ url('purchase/detail?name=pulsa') }}" class="o5 section-title-meta-link font-size-14">Lihat Semua</a>
					</div>

					<!-- Slider main container -->
					<div class="swiper-container">
						<div class="swiper-wrapper">
							@foreach ($shops->where('type', 'pulsa') as $shop)
								<div class="swiper-slide @if($shop->active === '0' && $shop->meta === 'Coming Soon')game-comingsoon @elseif($shop->active === '0') game-unvailable @endif" @if($shop->active === '0') data-reason="{{ $shop->reason }}" data-open="{{ \Carbon\Carbon::parse($shop->open_date)->format('l d M Y H:i') }}" @endif>
									<a href="@if($shop->active === '0')#@else{{ url('purchase/detail?name=pulsa&type='.$shop->alias) }}@endif">
										<img src="{{ $shop->logo }}" class="shop-item-thumb">
										<div class="shop-item-name mt-10 mb-0">{{ $shop->name }}</div>
										<div class="shop-item-name-meta o5 font-size-14">{{ $shop->meta }}</div>
									</a>
								</div>
							@endforeach
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div id="rumah-tangga" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="section-title position-relative">
						<h2 class="rajdhani-bold font-size-26 mb-20">Rumah Tangga</h2>
						<a href="{{ url('purchase/detail?name=rumah-tangga') }}" class="o5 section-title-meta-link font-size-14">Lihat Semua</a>
					</div>

					<!-- Slider main container -->
					<div class="swiper-container">
						<div class="swiper-wrapper">
							@foreach ($shops->where('type', 'rumah-tangga') as $shop)
								<div class="swiper-slide @if($shop->active === '0' && $shop->meta === 'Coming Soon')game-comingsoon @elseif($shop->active === '0') game-unvailable @endif" @if($shop->active === '0') data-reason="{{ $shop->reason }}" data-open="{{ \Carbon\Carbon::parse($shop->open_date)->format('l d M Y H:i') }}" @endif>
									<a href="@if($shop->active === '0')#@else{{ url('purchase/detail?name=rumah-tangga&type='.$shop->alias) }}@endif">
										<img src="{{ $shop->logo }}" class="shop-item-thumb">
										<div class="shop-item-name mt-10 mb-0">{{ $shop->name }}</div>
										<div class="shop-item-name-meta o5 font-size-14">{{ $shop->meta }}</div>
									</a>
								</div>
							@endforeach
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- page section -->
	<div class="mb-10">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<a href="{{ url('purchase/detail?name=lp') }}">
						<img src="{{ asset('img/lp-recharge4.jpg') }}" class="bd20 mb-30 w-100">
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- page section -->
	<div id="diamonds-top-up" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="section-title position-relative">
						<h2 class="rajdhani-bold font-size-26 mb-20">Esports</h2>
						{{-- <a href="{{ url('events') }}" class="o5 section-title-meta-link font-size-14">Lihat Semua</a> --}}
					</div>
					@if(count($events) > 0)
                        @foreach($events as $event)
                            @if(in_array($event->game_id, [1,4]))
                                <div class="match-card active view-match-info @if($event->type === 'ONGOING' || $event->type === 'UPCOMING') @if($event->type === 'ONGOING') live @endif active @elseif($event->type === 'DONE') past @endif ev-{{ $event->id }} games-{{ $event->game_id }}"
                                     @if(!in_array($event->type, ['UPCOMING', 'ONGOING']))
                                     data-toggle="modal" data-target="#past-event-notice" @endif
                                     data-event_id="{{$event->id}}">
                                    <div class="title">
                                        <div class="game-thumb">
                                            <img src="{{ asset($event->game_logo) }}">
                                        </div>
                                        <div class="middle">
                                            <div class="game-name">{{ $event->team_left->name }} <span class="vs-word">vs</span> {{ $event->team_right->name }}</div>
                                            <div class="league-name">{{ $event->league_games_name }}</div>
                                        </div>
                                        <div class="title-date">
                                            <div class="game-date">{{ $event->formatted_date.' '. $event->formatted_month }}</div>
                                            <div class="game-time">{{ $event->formatted_time }} WIB</div>
                                        </div>
                                    </div>
                                    <div class="teams">
                                        <div class="team-container">
                                            @if($event->team_left->alias === 'na')
                                                <div class="team-name">NA</div>
                                            @else
                                                <div class="team-logo ev-{{ $event->id }}">
                                                    <img src="{{ asset($event->team_left->logo.'-200.png') }}">
                                                </div>
                                                <div class="team-name">{{ $event->team_left->name }}</div>
                                            @endif
                                        </div>
                                        <div class="match-card-stats">
                                            @if($event->type === 'ONGOING') LIVE @elseif($event->type === 'UPCOMING') Prediksi Tersedia @elseif($event->type === 'DONE') {{ $event->team_left_score }}&nbsp;&nbsp;-&nbsp;&nbsp;{{ $event->team_right_score }} @endif
                                        </div>
                                        <div class="team-container">
                                            @if($event->team_right->alias === 'na')
                                                <div class="team-name">NA</div>
                                            @else
                                                <div class="team-logo ev-{{ $event->id }}">
                                                    <img src="{{ asset($event->team_right->logo.'-200.png') }}">
                                                </div>
                                                <div class="team-name">{{ $event->team_right->name }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @elseif(in_array($event->game_id, [2,3]))
                                <div class="match-card active view-match-info @if($event->type === 'ONGOING' || $event->type === 'UPCOMING') @if($event->type === 'ONGOING') live @endif active @elseif($event->type === 'DONE') past @endif ev-{{ $event->id }} games-{{ $event->game_id }}"
                                     @if(!in_array($event->type, ['UPCOMING', 'ONGOING']))
                                     data-toggle="modal" data-target="#past-event-notice" @endif
                                     data-event_id="{{$event->id}}">
                                    <div class="title">
                                        <div class="game-thumb">
                                            <img src="{{ asset($event->game_logo) }}">
                                        </div>
                                        <div class="middle">
                                            <div class="game-name">{{ $event->name }}</div>
                                            <div class="league-name">{{ $event->league_games_name }}</div>
                                        </div>
                                        <div class="title-date">
                                            <div class="game-date">{{ $event->formatted_date.' '. $event->formatted_month }}</div>
                                            <div class="game-time">{{ $event->formatted_time }} WIB</div>
                                        </div>
                                    </div>
                                    <div class="teams many">
                                        @foreach ($event->teams as $team)
                                            <div class="team-container">
                                                <div class="team-logo">
                                                    <img src="{{ asset($team->logo.'-200.png') }}">
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="teams-more">
                                            10+ teams
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
					@else
					<div class="event-card no-event bd20 bg25510 text-center">
                        <span class="o5">no events</span>
                    </div>
					@endif

                    <style type="text/css">
                        .game-event-select {
                            background: rgb(0 0 0 / .4);
                            border-radius: 20px;
                            cursor: pointer;
                            transition: all 0.1s ease-in-out;
                        }
                        .game-event-select:hover {
                            background: rgb(0 0 0 / .6);
                        }
                        .game-event-select:active {
                            transform: scale(1.05) !important;
                        }
                        .game-event-select .thumb {
                            width: 100%;
                            border-radius: 20px;
                            overflow: hidden;
                        }
                        .game-event-select .thumb img {
                            width: 100%;
                        }
                        .game-event-select .title {
                            font-weight: 800;
                            padding: 12px 20px;
                            position: relative;
                            padding-right: 60px;
                        }
                        .game-event-select .title .icon {
                            height: 22px;
                            width: 22px;
                            position: absolute;
                            right: 20px;
                            opacity: .5;
                            top: 50%;
                            transform: translate(0,-50%);
                        }
                        .match-row {
                            background: rgb(0 0 0 / .2);
                            margin-bottom: 20px;
                            cursor: pointer;
                            border-radius: 20px;
                            font-size: 14px;
                            position: relative;
                            transition: all 0.1s ease-in-out;
                            padding: 12px 20px 12px 75px;
                        }
                        .match-row:hover {
                            background: rgb(0 0 0 / .4);
                        }
                        .match-row:active {
                            transform: scale(1.05) !important;
                        }
                        .match-row .title {
                            font-weight: 800;
                        }
                        .match-row .meta {
                            opacity: .3;
                        }
                        .match-row .left {
                            text-align: center;
                            position: absolute;
                            left: 25px;
                            top: 25px;
                        }
                        .match-row .left .upper {
                            font-family: 'Rajdhani-Bold';
                            font-size: 22px;
                            line-height: 0px;
                            margin-bottom: 8px;
                        }
                        .match-row .left .lower {
                            opacity: .3;
                            font-weight: 800;
                        }
                    </style>

				</div>
			</div>
		</div>
	</div>
</section>

<section id="page-modals">
    <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="past-event-notice">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                @include('includes.mana-ui.modal-top')
                <div class="modal-about rajdhani-bold font-size-32">
                    Pertandingan sudah selesai
                </div>
                <div class="modal-mid font-size-16 o5">
                    Pertandingan ini sudah selesai.
                </div>
                <div class="modal-actions d-flex flex-column">
                    <a href="{{route('events')}}" class="mana-btn-54 mana-btn-red scale-onclick">Lihat games upcoming</a>
                    <a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('includes.mana-ui.footer')
@include('includes.mana-ui.modals')

<style type="text/css">

    #home-promo .swiper-container {
        width: 100%;
    }
    #home-promo .swiper-slide {
        width: 250px;
        margin-right: 15px;
    }

    #diamonds-top-up .swiper-container {
        width: 100%;
    }
    #diamonds-top-up .swiper-slide {
        width: 110px;
        margin-right: 15px;
    }

    #isi-pulsa .swiper-container {
        width: 100%;
    }
    #isi-pulsa .swiper-slide {
        width: 110px;
        margin-right: 15px;
    }

    #rumah-tangga .swiper-container {
        width: 100%;
    }
    #rumah-tangga .swiper-slide {
        width: 110px;
        margin-right: 15px;
    }
</style>

<style type="text/css">
    /*page specific*/
    .home-welcome-container {
        padding: 40px 20px;
    }
    .shop-gallery-container {
        margin-left: -10px;
        margin-right: -10px;
    }
    .shop-item {
        padding: 15px;
        flex: 0 0 50%;
        align-content: center;
        justify-content: center;
    }

    @media (min-width: 768px) {
        .shop-item {
            padding: 15px;
            flex: 0 0 25%;
            align-content: center;
            justify-content: center;
        }
    }
    .shop-item-inner {
        width: 100%;
        display: flex;
        position: relative;
        flex-direction: column;
        align-content: center;
        justify-content: center;
    }
    .shop-item-thumb {
        border-radius: 15px;
        width: 100%;
    }
    .shop-item-name {
        font-size: 14px;
    }
    .shop-item-name-meta {
        margin-top: -2px;
    }
    .section-title-meta-link:hover,
    .section-title-meta-link:active {
        opacity: 1;
    }

</style>
<style type="text/css">
	/*media*/

</style>
@endsection

@section('js')
<script type="text/javascript">
    var mySwiper = new Swiper('#home-promo .swiper-container', {
        direction: 'horizontal',
        loop: false,
        slidesPerView: 'auto',
    })
    var mySwiper = new Swiper('#diamonds-top-up .swiper-container', {
        direction: 'horizontal',
        loop: false,
        slidesPerView: 'auto',
    })
    var mySwiper = new Swiper('#isi-pulsa .swiper-container', {
        direction: 'horizontal',
        loop: false,
        slidesPerView: 'auto',
    })
    var mySwiper = new Swiper('#rumah-tangga .swiper-container', {
        direction: 'horizontal',
        loop: false,
        slidesPerView: 'auto',
    })
</script>
<script>
	$(document).ready(function() {

		// page specific scripts

	})
</script>

<script type="text/javascript">
    var mySwiper = new Swiper('#tournament-game-select .swiper-container', {
        direction: 'horizontal',
        loop: false,
        slidesPerView: 'auto',
    })
</script>

<script>

    $(document).ready(function() {

        // page specific scripts
        $('body').on('click', '.tournament-game-choice', function(e) {
            e.preventDefault();

            var loc1 = $(this);
            var loc2 = $('.tournament-game-choice');

            if (!loc1.hasClass('active')) {
                loc1.addClass('loading');

                loc2.removeClass('active');
                loc1.addClass('active');

                setTimeout(function() {
                    loc1.removeClass('loading');
                }, 500);
            }
        });


        let wrapperEvent = $('#wrapper-events-list');
        let totalAllEvent = $("#total-all-events");

        $('.tournament-game-choice').on('click', function (e){
            e.preventDefault();
            let game = $(this).data('target');
            setTimeout(function() {
                if(game === 'mlbb'){
                    wrapperEvent.find('.match-card').removeClass('active');
                    let total = $('body').find('.games-1').length;
                    totalAllEvent.text(total);
                    $('.games-1').addClass('active');
                }else if(game === 'freefire'){
                    wrapperEvent.find('.match-card').removeClass('active');
                    let total = $('body').find('.games-2').length;
                    totalAllEvent.text(total);
                    $('.games-2').addClass('active');
                }else if(game === 'pubgm'){
                    wrapperEvent.find('.match-card').removeClass('active');
                    let total = $('body').find('.games-3').length;
                    totalAllEvent.text(total);
                    $('.games-3').addClass('active');
                }else{
                    wrapperEvent.find('.match-card').addClass('active');
                    let total = $('body').find('.match-card').length;
                    totalAllEvent.text(total);
                }
            }, 500);
        });

        // match info
        let matchInfo = $('#match-info');
        $('body').on('click', '.view-match-info', function(e) {
            let eventId = $(this).data('event_id');
            matchInfo.find('.tray-game-title, .tray-game-title, .info-event-start-date, .info-event-total-team, .info-event-total-prediksi').text('');
            $.ajax({
                url : '{{route('events.show.json', ':id')}}'.replace(':id', eventId),
                type : 'GET'
            }).done(function (response){
                matchInfo.find('.tray-game-title').text(response.name);
                matchInfo.find('.tray-game-meta').text(response.league_games_name);
                matchInfo.find('.info-event-start-date').text(response.formatted_start_date);
                matchInfo.find('.info-event-total-team').text(response.total_teams);
                matchInfo.find('.info-event-total-prediksi').text(response.bet_categories_count);
                matchInfo.find('.event-view-btn').data('event_slug', response.slug);
                matchInfo.find('.event-view-btn').data('event_type', response.type);
            })
        });

        $('body').on('click', '.event-view-btn', function (e){
            let slug = $(this).data('event_slug');
            let type = $(this).data('event_type');
            if(type === 'DONE'){
                $(this).removeClass('loading');
                $('#past-event-notice').modal('show');
            }else{
                window.location = '{{route('events.detail', ':slug')}}'.replace(":slug", slug);
            }
        });

        setInterval(
            function(){
                let ids =[];
                $('body').find('.match-card').each(function (index){
                    let eventId = $(this).data('event_id');
                    ids.push(eventId);
                });
                let checkStatus = '{{route('events.check.status')}}?ids='+ids;
                $.get(checkStatus, function (events){
                    $.each(events,function (index, item){
                        if(item.type === 'ONGOING') {
                            $('body').find('.ev-' + item.id).addClass('live');
                        }else if (item.type === 'DONE'){
                            $('body').find('.ev-' + item.id).addClass('past');
                        }else {
                            $('body').find('.ev-'+item.id).removeClass('live');
                        }
                    })
                })
            }, 3000
        );
    })
</script>
@endsection
