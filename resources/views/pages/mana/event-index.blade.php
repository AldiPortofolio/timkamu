@extends('layouts.mana-ui')

@section('page_title', "TimKamu - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui event-index')


@section('content')
@include('includes.mana-ui.effects')
@include('includes.mana-ui.nav')

<!-- page content -->
<section id="page-content">

	<!-- page header -->
	<div id="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<h1 class="rajdhani-bold">Games Event</h1>
				</div>
			</div>
		</div>
	</div>

	<!-- page section -->
	<div id="tournament-game-select" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<!-- Slider main container -->
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide tournament-game-choice active" data-target="all">
								<a href="#">
									<img src="/img/game-thumbs/new-default.jpg" class="shop-item-thumb">
								</a>
								<div class="loading-content">
									<div class="game-name">All Games</div>
								</div>
								<div class="loading-loader">
									<div class="spinner-border hw24"></div>
								</div>
							</div>
							<div class="swiper-slide tournament-game-choice" data-target="mlbb">
								<a href="#">
									<img src="/img/game-thumbs/new-mlbb.jpg" class="shop-item-thumb">
								</a>
								<div class="loading-content">
									<div class="game-name">Mobile Legends</div>
								</div>
								<div class="loading-loader">
									<div class="spinner-border hw24"></div>
								</div>
							</div>
							<div class="swiper-slide tournament-game-choice" data-target="freefire">
								<a href="#">
									<img src="{{ asset('img/game-thumbs/new-freefire.jpg') }}" class="shop-item-thumb">
								</a>
								<div class="loading-content">
									<div class="game-name">Free Fire</div>
								</div>
								<div class="loading-loader">
									<div class="spinner-border hw24"></div>
								</div>
							</div>
							<div class="swiper-slide tournament-game-choice" data-target="pubgm">
								<a href="#">
									<img src="{{ asset('img/game-thumbs/new-pubgm.jpg') }}" class="shop-item-thumb">
								</a>
								<div class="loading-content">
									<div class="game-name">PUBGM</div>
								</div>
								<div class="loading-loader">
									<div class="spinner-border hw24"></div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- event index table -->
	<div class="event-index-table">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="mb-20">
						12 upcoming events
					</div>

					<?php for ($i=0; $i < 12; $i++): ?>
						<div class="match-row view-match-info">
							<div class="left">
								<div class="upper">
									24
								</div>
								<div class="lower">
									Dec
								</div>
							</div>
							<div class="right">
								<div class="title">
									PUBG Mobile Championship - Super Weekend Week 2
								</div>
								<div class="meta">
									PUBG Mobile Championship
								</div>
							</div>
						</div>
					<?php endfor; ?>


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
					<a href="/mana/event-index" class="mana-btn-54 mana-btn-red scale-onclick">Lihat games upcoming</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
</section>

@include('includes.mana-ui.footer')
@include('includes.mana-ui.modals')


<style type="text/css">
	/*page specific*/
	.tournament-game-choice {
		position: relative;
	}
	.tournament-game-choice .game-name {
		position: absolute;
		bottom: 0px;
		left: 0px;
		height: 100%;
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 20px;
		font-family: 'Rajdhani-Bold';
		cursor: pointer;
		text-shadow: 1px 1px 15px black;
	}
	.tournament-game-choice.loading .loading-content {
		display: none;
	}
	.tournament-game-choice .loading-content {
		display: block;
	}
	.tournament-game-choice .loading-loader {
		position: absolute;
		bottom: 0px;
		left: 0px;
		height: 100%;
		width: 100%;
		align-items: center;
		justify-content: center;
		display: none;
	}
	.tournament-game-choice.loading .loading-loader {
		display: flex;
	}
	.tournament-game-choice:hover .olay {
		background: rgb(0 0 0 / .2);
	}
	#tournament-game-select .swiper-container {
	    width: 100%;
	}
	#tournament-game-select .swiper-slide {
		width: 220px;
		margin-right: 15px;
		opacity: .5;
		transition: all 0.1s ease-in-out;
	}
	#tournament-game-select .swiper-slide:hover {
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

			if (!loc1.hasClass('active')) {
				loc1.addClass('loading');

				loc2.removeClass('active');
				loc1.addClass('active');

				setTimeout(function() {
				    loc1.removeClass('loading');
				}, 500);  
			}
		});
	})
</script>
@endsection
