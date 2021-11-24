@extends('layouts.mana-ui')

@section('page_title', "TimKamu - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui mana-home')


@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content">

	<!-- page section -->
	<div id="home-promo" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="section-title position-relative">
						<h2 class="rajdhani-bold font-size-26 mb-20">Promo</h2>
						<a href="/mana/top-up-index" class="o5 section-title-meta-link font-size-14">Lihat Semua</a>
					</div>

					<!-- Slider main container -->
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<a href="#" data-toggle="modal" data-target="#hero-promo-20">
									<img src="{{ asset('img/promos/26rbkedua-2.jpg') }}" class="shop-item-thumb">
								</a>
							</div>
							<div class="swiper-slide">
								<a href="/mana/top-up-mlbb">
									<img src="{{ asset('img/outright/m2wc2021-front.jpg') }}" class="shop-item-thumb">
								</a>
							</div>
							<div class="swiper-slide">
								<a href="/mana/top-up-mlbb">
									<img src="{{ asset('img/outright/1home.jpg') }}" class="shop-item-thumb">
								</a>
							</div>
							<div class="swiper-slide">
								<a href="/mana/top-up-mlbb">
									<img src="{{ asset('img/promos/ig-cashback.jpg') }}" class="shop-item-thumb">
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
	<div id="home-welcome-hero" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="home-welcome-container bd20 bg010">
						<h1 class="rajdhani-bold mb-30">Selamat datang, Guest</h1>

						<a href="/mana/sign-in" class="mana-btn-54 mana-btn-red scale-onclick mb-15">Sign In</a>
						<a href="/mana/sign-up" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Buat Akun Baru</a>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- page section -->
	<div id="diamonds-top-up" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="section-title position-relative">
						<h2 class="rajdhani-bold font-size-26 mb-20">Top Up</h2>
						<a href="/mana/top-up-index" class="o5 section-title-meta-link font-size-14">Lihat Semua</a>
					</div>

					<!-- Slider main container -->
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<a href="/mana/top-up-mlbb">
									<img src="{{ asset('img/game-thumbs/mlbb.jpg') }}" class="shop-item-thumb">
									<div class="shop-item-name mt-10 mb-0">Mobile Legends</div>
									<div class="shop-item-name-meta o5 font-size-14">Diamonds</div>
								</a>
							</div>
							<div class="swiper-slide">
								<a href="/mana/top-up-freefire">
									<img src="{{ asset('img/game-thumbs/freefire.jpg') }}" class="shop-item-thumb">
									<div class="shop-item-name mt-10 mb-0">Garena Freefire</div>
									<div class="shop-item-name-meta o5 font-size-14">Diamonds</div>
								</a>
							</div>
							<div class="swiper-slide">
								<a href="/mana/top-up-pubgm">
									<img src="{{ asset('img/game-thumbs/pubgm.jpg') }}" class="shop-item-thumb">
									<div class="shop-item-name mt-10 mb-0">PUBGM</div>
									<div class="shop-item-name-meta o5 font-size-14">Unknown Cash</div>
								</a>
							</div>
							<div class="swiper-slide" data-toggle="modal" data-target="#toko-tutup-notice">
								<a href="/mana/top-up-valorant">
									<img src="{{ asset('img/game-thumbs/valorant.jpg') }}" class="shop-item-thumb">
									<div class="shop-item-name mt-10 mb-0">Valorant</div>
									<div class="shop-item-name-meta o5 font-size-14">Coming soon</div>
								</a>
							</div>
							<div class="swiper-slide">
								<a href="/mana/top-up-ret">
									<img src="{{ asset('img/game-thumbs/ragnarok-eternal.jpg') }}" class="shop-item-thumb">
									<div class="shop-item-name mt-10 mb-0">Ragnarok Eternal Love</div>
									<div class="shop-item-name-meta o5 font-size-14">BCC</div>
								</a>
							</div>
							<div class="swiper-slide">
								<a href="/mana/top-up-googleplay">
									<img src="{{ asset('img/game-thumbs/ragnarok-eternal.jpg') }}" class="shop-item-thumb">
									<div class="shop-item-name mt-10 mb-0">Google Play Voucher</div>
									<div class="shop-item-name-meta o5 font-size-14">App Voucher</div>
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
	<div id="isi-pulsa" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="section-title position-relative">
						<h2 class="rajdhani-bold font-size-26 mb-20">Isi Pulsa</h2>
						<a href="/mana/isi-pulsa-index" class="o5 section-title-meta-link font-size-14">Lihat Semua</a>
					</div>

					<!-- Slider main container -->
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<a href="/mana/isi-pulsa-telkomsel">
									<img src="{{ asset('img/pulsa-thumbs/telkomsel.jpg') }}" class="shop-item-thumb">
									<div class="shop-item-name mt-10 mb-0">Telkomsel</div>
									<div class="shop-item-name-meta o5 font-size-14">Pulsa & Kuota</div>
								</a>
							</div>
							<div class="swiper-slide">
								<a href="/mana/isi-pulsa-xl">
									<img src="{{ asset('img/pulsa-thumbs/xl.jpg') }}" class="shop-item-thumb">
									<div class="shop-item-name mt-10 mb-0">XL</div>
									<div class="shop-item-name-meta o5 font-size-14">XTRA Combo</div>
								</a>
							</div>
							<div class="swiper-slide">
								<a href="/mana/isi-pulsa-tri">
									<img src="{{ asset('img/pulsa-thumbs/tri.jpg') }}" class="shop-item-thumb">
									<div class="shop-item-name mt-10 mb-0">Tri</div>
									<div class="shop-item-name-meta o5 font-size-14">Tri Quota</div>
								</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- page section -->
	<div id="rumah-tangga" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="section-title position-relative">
						<h2 class="rajdhani-bold font-size-26 mb-20">Rumah Tangga</h2>
						<a href="/mana/rumah-tangga-index" class="o5 section-title-meta-link font-size-14">Lihat Semua</a>
					</div>

					<!-- Slider main container -->
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<a href="/mana/rumah-tangga-pln">
									<img src="{{ asset('img/pulsa-thumbs/pln.jpg') }}" class="shop-item-thumb">
									<div class="shop-item-name mt-10 mb-0">Token PLN</div>
									<div class="shop-item-name-meta o5 font-size-14">Token Listrik</div>
								</a>
							</div>
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
					<a href="/mana/recharge-lp">
						<img src="{{ asset('img/lp-recharge4.jpg') }}" class="bd20 mb-30 w-100">
					</a>
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
<!-- <<<<<<< HEAD

					<div class="event-card live" onclick="location.href='/mana/event-view';">
						<div class="event-card-meta">
							<div class="event-card-meta-date">Fri, 20 Sept</div>
							<div class="event-card-meta-league">[PUBGM] MPL Regular Season 2020</div>
							<div class="event-card-meta-time">LIVE</div>
						</div>
					</div>

					<div class="event-card upcoming" onclick="location.href='/mana/event-view';">
						<div class="event-card-meta">
							<div class="event-card-meta-date">Fri, 20 Sept</div>
							<div class="event-card-meta-league">[PUBGM] MPL Regular Season 2020</div>
							<div class="event-card-meta-time">15.30</div>
						</div>
					</div>
======= -->
					
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
@endsection
