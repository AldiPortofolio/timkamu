@extends('layouts.mana-ui')

@section('page_title', "TimKamu (PTS) - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui rumah-tangga-pln')


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
					<h1 class="rajdhani-bold">Token PLN</h1>
				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<div id="shop-form shop-form-mlbb" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<h4 class="font-size-18 mb-20">1. Informasi User</h4>

					<div class="form-group mana-control">
						<label class="mana-control">ID pelanggan</label>
						<input type="text" class="form-control mana-control">
					</div>

					<div class="form-group mana-control">
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

					<h4 class="font-size-18 mb-20">2. Pilih nominal token</h4>

					<div class="shelf-container d-flex flex-wrap align-items-center">
						<?php for ($i=0; $i < 15; $i++): ?>
							<div class="shelf-item nominal-choice-btn d-flex scale-onclick">
								<div class="shelf-item-inner d-flex bg020 bd20 justify-content-center">
									<span class="money money-14 right">1,000,000</span>
								</div>
							</div>
						<?php endfor; ?>
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
						<a href="/mana/rumah-tangga-index" class="mana-btn-54 mana-btn-opaque">Pilih produk lain</a>
					</div>

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
	.shop-panel {
		display: none;
	}
	.shop-panel.active {
		display: block;
	}
	.isi-pulsa-telkomsel .shelf-item {
		flex: 0 0 50%;
	}
	@media (max-width: 450px){
		.isi-pulsa-telkomsel .shelf-item.shelf-full {
			flex: 0 0 100%;
		}
	}
	#pulsa-panel .swiper-container {
	    width: 100%;
	}
	#pulsa-panel .swiper-slide {
		width: auto;
		margin-right: 25px;
	}
	.swiper-panel-item {
		opacity: 0.3;
	}
	.swiper-panel-item.active {
		opacity: 0.9;
	}
	.swiper-panel-item .icon {
		width: 16px;
		position: relative;
		top: -2px;
		margin-right: 8px;
		opacity: 0.8;
	}
</style>
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
<script type="text/javascript">
	var mySwiper = new Swiper('#pulsa-panel .swiper-container', {
		// Optional parameters
		direction: 'horizontal',
		loop: false,
		slidesPerView: 'auto',
	})
</script>
<script>
	$(document).ready(function() {
		
		// page specific scripts
		initTopUpScripts();

		// swiper + panel buttons
		$('body').on('click', '.swiper-panel-item', function(e) {
			e.preventDefault();

			target = $(this);
			target2 = $('.swiper-panel-item');
			target3 = $(this).data('target');
			target4 = $('.shop-panel');

			target2.removeClass('active');
			target.addClass('active');

			target4.removeClass('active');
			$('.'+target3).addClass('active');
		});
	})
</script>
@endsection