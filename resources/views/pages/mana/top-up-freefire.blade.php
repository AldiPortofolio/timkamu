@extends('layouts.mana-ui')

@section('page_title', "TimKamu (PTS) - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui top-up-freefire')


@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content">

	<!-- page section -->
	<div id="home-welcome-hero" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="top-up-page-header">
						<div class="page-hero-container">
							<img src="{{ asset('img/game-thumbs/hero-freefire.jpg') }}" class="main-hero">
							<div class="hero-overlay"></div>
							<div class="hero-texts">
								<p class="mb-0 fw-800 o7">Top-Up Game</p>
								<h1 class="rajdhani-bold mt-0 mb-0">Garena Freefire</h1>
							</div>
						</div>

					</div>

				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<div id="shop-form shop-form-mlbb" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<h4 class="font-size-18 mb-20">1. Informasi User</h4>

					<div class="form-group mana-control">
						<label class="mana-control position-relative w-100">
							Player ID
							<div class="label-helper cursor-ptr" data-toggle="modal" data-target="#freefire-userid-help"><i data-feather="help-circle" class="icon"></i></div>
						</label>
						<input type="text" class="form-control mana-control">
					</div>

					<div class="form-group mana-control mb-0">
						<label class="mana-control">Nomor telefon</label>
						<input type="text" class="form-control mana-control">
						<small class="font-size-14 o3 text-italic mt-10 d-block fw-300">Nomor telefon akan digunakan untuk konfirmasi dan troubleshooting</small>
					</div>

				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<div id="shop-item-shelf" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<h4 class="font-size-18 mb-20">2. Pilih nominal top-up</h4>

					<div class="shelf-container d-flex flex-wrap align-items-center">
						<?php for ($i=0; $i < 15; $i++): ?>
							<div class="shelf-item nominal-choice-btn d-flex scale-onclick">
								<div class="shelf-item-inner d-flex bg020 bd20 justify-content-center">
									<span class="money money-14 right">2,349<img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>
								</div>
							</div>
						<?php endfor; ?>

						<div class="shelf-item full-width nominal-choice-btn d-flex scale-onclick">
							<div class="shelf-item-inner d-flex bg020 bd20 justify-content-center">
								<span class="money money-14 right">Starlight Member</span>
							</div>
						</div>

						<div class="shelf-item full-width nominal-choice-btn d-flex scale-onclick">
							<div class="shelf-item-inner d-flex bg020 bd20 justify-content-center">
								<span class="money money-14 right">Starlight Member Plus</span>
							</div>
						</div>

						<div class="shelf-item full-width nominal-choice-btn d-flex scale-onclick">
							<div class="shelf-item-inner d-flex bg020 bd20 justify-content-center">
								<span class="money money-14 right">Twilight Member</span>
							</div>
						</div>
					</div>

				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<div id="shop-item-shelf" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<h4 class="font-size-18 mb-20">3. Pilih metode pembayaran</h4>

					<div class="dashboard-info-group mb-10">
						<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-toggle="modal" data-target="#bp-lp-convert-modal">Convert&nbsp;&nbsp;<span class="money money-14 right money-inline"><span class="fw-300">BP</span><img src="{{ asset('img/currencies/bp.svg') }}"></span>&nbsp;&nbsp;to&nbsp;&nbsp;<span class="money money-14 right money-inline"><span class="fw-300">LP</span><img src="{{ asset('img/currencies/lp.svg') }}"></span></a>
					</div>

					<div class="pg-shelf-container d-flex flex-wrap align-items-center">

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name black-08 fw-800">
									Loyalty Points
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									<span class="money money-16 right">459<img src="{{ asset('img/currencies/lp.svg') }}"></span>
								</div>
							</div>
						</div>

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/gopay.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 2,196,500
								</div>
							</div>
						</div>
						
						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/dana.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 0
								</div>
							</div>
						</div>
						
						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/ovo.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 2,196,500
								</div>
							</div>
						</div>
						
						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/shopee-pay.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 12,196,500
								</div>
							</div>
						</div>

					</div>

				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<div id="shop-form shop-form-mlbb" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="form-group mana-control mb-50">
						<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-20 buy-diamond-btn">
							<span class="default-text">Beli</span>
							<div class="spinner-border hw24"></div>
						</a>
						<a href="/mana/top-up-index" class="mana-btn-54 mana-btn-opaque">Pilih game lain</a>
					</div>

				</div>
			</div> 
		</div>
	</div>


	<!-- page section -->
	<div id="shop-disclaimer" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					@include('includes.mana-ui.shop-disclaimer')

				</div>
			</div> 
		</div>
	</div>

</section>

<section id="page-modals">
	@include('includes.mana-ui.top-up-modals')
</section>

@include('includes.mana-ui.footer')
@include('includes.mana-ui.modals')


<style type="text/css">
	/*page specific*/
	.shelf-item.full-width {
		flex: 0 0 100%;
	}
	.mlbb-user-guide-png {
		margin-left: -7px;
	}
	.label-helper {
		position: absolute;
		right: 0;
		top: 50%;
		transform: translate(0,-50%);
	    padding-left: 20px;
	}
	.label-helper .icon {
		width: 20px;
		opacity: 0.7;
	}
	.label-helper:hover .icon {
		opacity: 1;
	}
	.mlbb-userinfo-wrapper {
		margin-left: -10px;
		margin-right: -5px;
	}
	.mlbb-user-id-left {
		padding: 0 5px;
		flex: 1 1 65%;
	}
	.mlbb-user-id-right {
		padding: 0 5px;
		flex: 1 1 35%;		
	}
	.mlbb-user-id-left input {
	}
	.mlbb-user-id-right input {
	}
	.shelf-container {
		margin-left: -5px;
		margin-right: -5px;
	}
	.shelf-item {
		flex: 0 0 33%;
		padding: 5px;
		cursor: pointer;
	}
	.shelf-item-inner {
		display: flex!important;
		flex: 1 1 50%;
		line-height: 54px;
		padding: 0 15px;
	}
	.shelf-item:hover .shelf-item-inner {
		background: rgb(0 0 0 / 0.4);
	}
	.shelf-item.active .shelf-item-inner {
		background: rgb(255 255 255 / 0.2);
	}
	.shelf-item-inner .icon {
		top: -1px;
	}
	.page-hero-container {
		position: relative;
	}
	.hero-overlay {
		position: absolute;
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		border-radius: 20px;
		background-image: linear-gradient(transparent, rgb(0 0 0 / 0.6));
	}
	.hero-texts {
		position: absolute;
		bottom: 20px;
		left: 20px;
	}
	.main-hero {
		width: 100%;
		border-radius: 20px;
	}
</style>
<style type="text/css">
	/*media*/
	
</style>
@endsection

@section('js')
<script>
	$(document).ready(function() {
		
		// page specific scripts
		initTopUpScripts();

	})
</script>
@endsection