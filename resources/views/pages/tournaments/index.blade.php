@extends('layouts.mana-ui')

@section('page_title', "Tournaments")
@section('body_class', 'mana-ui tournaments')


@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content">

	<!-- page header -->
	<div id="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<h1 class="rajdhani-bold">Timkamu Tournaments</h1>
				</div>
			</div>
		</div>
	</div>

    <style type="text/css">
        .tourney-game-select .swiper-slide {
            position: relative;
        }
        .tourney-game-select .swiper-slide .olay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgb(0 0 0 / .5);
            left: 0;
            top: 0;
            border-radius: 15px;
        }
        .tourney-game-select .swiper-slide .game-name {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font-family: 'Rajdhani-Bold';
            font-size: 20px;
            line-height: 20px;
        }
    </style>

	<!-- page section -->
	<div id="tournament-game-select" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<!-- Slider main container -->
                    <div class="swiper-container tourney-game-select">
						<div class="swiper-wrapper">
							<div class="swiper-slide tournament-game-choice active" data-target="games_1">
                                <a href="#">
                                    <div class="olay"></div>
                                    <div class="game-name">Mobile Legends</div>
                                    <img src="{{ asset('img/game-thumbs/hero-mlbb.jpg') }}" class="shop-item-thumb">
                                </a>
							</div>
							<div class="swiper-slide tournament-game-choice" data-target="games_2">
                                <a href="#">
                                    <div class="olay"></div>
                                    <div class="game-name">Free Fire</div>
                                    <img src="{{ asset('img/game-thumbs/hero-freefire.jpg') }}" class="shop-item-thumb">
                                </a>
							</div>
							<div class="swiper-slide tournament-game-choice" data-target="games_3">
                                <a href="#">
                                    <div class="olay"></div>
                                    <div class="game-name">PUBGM</div>
                                    <img src="{{ asset('img/game-thumbs/hero-pubgm.jpg') }}" class="shop-item-thumb">
                                </a>
							</div>
                            <div class="swiper-slide tournament-game-choice" data-target="games_6">
                                <a href="#">
                                    <div class="olay"></div>
                                    <div class="game-name">CODM</div>
                                    <img src="{{ asset('img/game-thumbs/hero-cod-mobile.jpg') }}" class="shop-item-thumb">
                                </a>
                            </div>

							<!-- <div class="swiper-slide tournament-game-choice">
								<a href="#">
									<img src="{{ asset('img/game-thumbs/cod-mobile.jpg') }}" class="shop-item-thumb">
								</a>
							</div> -->
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- page section -->
	<div id="tournament-list" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
                    @foreach($tournaments as $tournament)
                        <div class="tournament-item games_{{$tournament->game->id}} active div-url" data-status="{{$tournament->status}}" data-url="{{ route('tournaments.show', $tournament->slug) }}">
                            @if($tournament->banner)
                                <div class="thumb">
                                    <img src="{{ $tournament->banner}}" class="w-100">
                                </div>
                            @endif
                            <div class="upper">
                                <div class="title">
                                   {{$tournament->name}}
                                </div>
                                <div class="meta">
                                    Dimulai {{\Carbon\Carbon::parse($tournament->tournament_start)->format('d M Y H:i')}} WIB
                                </div>
                            </div>
                            <div class="lower">
                                <div class="row mb-10">
                                    <div class="col-6 pr-0">
                                        <div class="head">Pendaftaran</div>
                                        @if($tournament->admission_fee >  0)
                                            <span class="grey-10">Rp {{ number_format($tournament->admission_fee * $tournament->membership, 0, '.', ',') }} per team / slot</span>
                                        @else
                                            <span class="grey-10">GRATIS</span>
                                        @endif
                                    </div>
                                    <div class="col-6 pl-0">
                                        <div class="head">Hadiah</div>
                                        <span class="grey-10">{{$tournament->prize_pool}}</span>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-6 pr-0">
                                        <div class="head">Slot</div>
                                        <span class="grey-10">{{ $tournament->teams_count }} / {{ $tournament->slot ?? 0 }}</span>
                                    </div>
                                    <div class="col-6 pl-0">
                                        <div class="head">Digelar oleh</div>
                                        <span class="grey-10">Timkamu</span>
                                    </div>
                                </div>
                                <div class="action">
                                    @if($tournament->status == 'Active')
                                    <a href="{{ route('tournaments.show', $tournament->slug) }}" class="mana-btn-54 mana-btn-opaque scale-onclick">View Tournament</a>
                                    @else
                                    <a href="{{ route('tournaments.show', $tournament->slug) }}" class="mana-btn-54 mana-btn-opaque scale-onclick o5">Pendaftaran ditutup</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                @endforeach
				</div>
			</div>
		</div>
	</div>

</section>

<section id="page-modals">
    <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="registration-closed">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                @include('includes.mana-ui.modal-top')
                <div class="modal-about rajdhani-bold font-size-32">
                    Info pendaftaran
                </div>
                <div class="modal-mid font-size-16 o5">
                    <p class="message-error">
                        Pendaftaran belum dibuka
                    </p>
                </div>
                <div class="modal-actions d-flex flex-column">
                    <a href="#" class="mana-btn-54 mana-btn-red scale-onclick" id="btn-need-login" data-dismiss="modal">Okay</a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('includes.mana-ui.footer')
@include('includes.mana-ui.modals')
<style type="text/css">
    /*page specific*/
    .tournament-item .thumb {
        height: 160px;
        overflow: hidden;
        border-radius: 20px;
    }
    .tournament-item .thumb img {
        border-radius: 20px;
    }
    .tournament-item {
        background: rgb(0 0 0 / .2);
        margin-bottom: 20px;
        cursor: pointer;
        border-radius: 20px;
        font-size: 14px;
        position: relative;
        display: none;
    }
    .tournament-item.active {
        display: block;
    }
    .tournament-item .upper {
        padding: 20px 20px 16px 20px;
    }
    .tournament-item .upper .meta {
        color: #8b869e;
    }
    .tournament-item.closed .upper .meta {
        color: #8b869e;
    }
    .tournament-item .lower {
        padding: 16px 20px;
        background: rgb(0 0 0 / .2);
        border-radius: 20px;
    }
    .tournament-item .title {
        font-family: 'Rajdhani-Bold';
        font-size: 26px;
        line-height: 26px;
        margin-bottom: 5px;
    }
    .tournament-item .action {
        margin-top: 20px;
    }
    .tournament-item .lower .head {
        font-weight: 700;
    }
</style>
<style type="text/css">

    #tournament-game-select .swiper-container {
        width: 100%;
    }
    #tournament-game-select .swiper-slide {
        width: 180px;
        margin-right: 15px;
        opacity: .3;
        transition: all 0.1s ease-in-out;
    }
    #tournament-game-select .swiper-slide:hover {
        opacity: .7;
    }
    #tournament-game-select .swiper-slide.active {
        opacity: 1 !important;
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
    margin-top: -2px;
    }
    .section-title-meta-link:hover,
    .section-title-meta-link:active {
        opacity: 1;
    }

</style>
@endsection

@section('js')
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
			var loc3 = loc1.attr('data-target');
			var loc4 = $('.'+loc3);
			var loc5 = $('.tournament-item');

			loc2.removeClass('active');
			loc1.addClass('active');

			loc5.removeClass('active');
			loc4.addClass('active');
		});
		$('body').on('click', '.div-url', function(e) {
			e.preventDefault();

			var loc1 = $(this);
			var loc3 = loc1.attr('data-url');

			let status = $(this).data('status');
			if(status === 'Active'){
                window.location.href = loc3;
            }else{
			    $('#registration-closed').modal('show');
            }
		});
	})
</script>
@endsection
