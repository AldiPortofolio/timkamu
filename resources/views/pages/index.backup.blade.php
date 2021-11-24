@extends('layouts.mana-ui')

@section('page_title', "Home")
@section('body_class', 'mana-ui mana-home')

@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content">

	<div id="home-promo-cards" class="mb-20">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<!-- event promo -->
					<a href="https://timkamu.com/events/pubgm-global-championship-1912-19-dec-20-1800-92"><img src="{{ asset('img/game-thumbs/pubgmgc.jpg') }}" class="bd20 w-100 mb-20 scale-onclick"></a>

					<!-- other promo -->
					<img src="{{ asset('img/promos/ig-cashback.jpg') }}" class="bd20 w-100 cursor-ptr mb-20 scale-onclick" data-toggle="modal" data-target="#hero-promo-5">
					<img src="{{ asset('img/promos/cash-discount.jpg') }}" class="bd20 w-100 cursor-ptr mb-20 scale-onclick" data-toggle="modal" data-target="#hero-promo-4">
					<img src="{{ asset('img/promos/referral.jpg') }}" class="bd20 w-100 cursor-ptr mb-20 scale-onclick" data-toggle="modal" data-target="#hero-promo-3">
					<img src="{{ asset('img/ins-0.jpg') }}" class="bd20 w-100 cursor-ptr scale-onclick" data-toggle="modal" data-target="#hero-promo-2">

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

					@if(count($event) > 0)
					@for($i=0; $i < 3; $i++)
						@php
							if(!isset($event[$i]) || !$event[$i]->league_game_id) {
								continue;
							}
						@endphp
						@if($event[$i]->league_games->game_id === 1 || $event[$i]->league_games->game_id === 4)
						<div class="match-card @if($event[$i]->type === 'ONGOING' || $event[$i]->type === 'UPCOMING') @if($event[$i]->type === 'ONGOING') live @endif active @elseif($event[$i]->type === 'DONE') past @endif ev-{{ $event[$i]->id }} games-{{ $event[$i]->league_games->game_id }}"
							@if($event[$i]->type === 'ONGOING' || $event[$i]->type === 'UPCOMING')
							onclick="location.href='{{ url('events/'.$event[$i]->slug) }}';"
							@else data-toggle="modal" data-target="#past-event-notice" @endif>
							<div class="title">
								<div class="game-thumb">
									<img src="{{ asset($event[$i]->league_games->games->logo) }}">
								</div>
								<div class="middle">
									<div class="game-name">{{ $event[$i]->team_left->name }} <span class="vs-word">vs</span> {{ $event[$i]->team_right->name }}</div>
									<div class="league-name">{{ $event[$i]->league_games->leagues->name }}</div>
								</div>
								<div class="title-date">
									<div class="game-date">{{ \Carbon\Carbon::parse($event[$i]->start_date)->format('d M') }}</div>
									<div class="game-time">{{ \Carbon\Carbon::parse($event[$i]->start_date)->format('H:i') }} WIB</div>
								</div>
							</div>
							<div class="teams">
								<div class="team-container">
									@if($event[$i]->team_left->alias === 'na')
									<div class="team-name">NA</div>
									@else
									<div class="team-logo ev-{{ $event[$i]->id }}">
										<img src="{{ asset($event[$i]->team_left->logo.'-200.png') }}">
									</div>
									<div class="team-name">{{ $event[$i]->team_left->name }}</div>
									@endif
								</div>
								<div class="match-card-stats">
									@if($event[$i]->type === 'ONGOING') LIVE @elseif($event[$i]->type === 'UPCOMING') Prediksi Tersedia @elseif($event[$i]->type === 'DONE') {{ $event[$i]->team_left_score }}&nbsp;&nbsp;-&nbsp;&nbsp;{{ $event[$i]->team_right_score }} @endif
								</div>
								<div class="team-container">
									@if($event[$i]->team_right->alias === 'na')
									<div class="team-name">NA</div>
									@else
									<div class="team-logo ev-{{ $event[$i]->id }}">
										<img src="{{ asset($event[$i]->team_right->logo.'-200.png') }}">
									</div>
									<div class="team-name">{{ $event[$i]->team_right->name }}</div>
									@endif
								</div>
							</div>
						</div>
						@elseif($event[$i]->league_games->game_id === 2 || $event[$i]->league_games->game_id === 3)
						@php
							$decode = json_decode($event[$i]->team_detail);
						@endphp
						<div class="match-card @if($event[$i]->type === 'ONGOING' || $event[$i]->type === 'UPCOMING') @if($event[$i]->type === 'ONGOING') live @endif active @elseif($event[$i]->type === 'DONE') past @endif ev-{{ $event[$i]->id }} games-{{ $event[$i]->league_games->game_id }}"
							@if($event[$i]->type === 'ONGOING' || $event[$i]->type === 'UPCOMING')
							onclick="location.href='{{ url('events/'.$event[$i]->slug) }}';"
							@else data-toggle="modal" data-target="#past-event-notice" @endif>
							<div class="title">
								<div class="game-thumb">
									<img src="{{ asset($event[$i]->league_games->games->logo) }}">
								</div>
								<div class="middle">
									<div class="game-name">{{ $event[$i]->name }}</div>
									<div class="league-name">{{ $event[$i]->league_games->leagues->name }}</div>
								</div>
								<div class="title-date">
									<div class="game-date">{{ \Carbon\Carbon::parse($event[$i]->start_date)->format('d M') }}</div>
									<div class="game-time">{{ \Carbon\Carbon::parse($event[$i]->start_date)->format('H:i') }} WIB</div>
								</div>
							</div>
							<div class="teams many">
								@foreach (collect($decode)->slice(0,3) as $item)
									@php
										$team = App\Http\Models\Team::select('logo')->where('id', $item->team_id)->first();
									@endphp
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
					@endfor
					@else
					<div class="event-card no-event bd20 bg25510 text-center">
                        <span class="o5">no events</span>
                    </div>
					@endif
				</div>
			</div>
		</div>
	</div>


</section>

@include('includes.mana-ui.footer')

<style type="text/css">
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
		border-radius: 20px;
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
</script>
<script>
	$(document).ready(function() {

		// page specific scripts

	})
</script>
@endsection
