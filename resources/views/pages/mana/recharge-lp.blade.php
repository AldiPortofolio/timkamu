@extends('layouts.mana-ui')

@section('page_title', "TimKamu - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui mana-home')


@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<?php 
    $nominals = [
        9,
        18,
        45,
        225,
        450,
        900,
        1350,
        1800
    ]; 
?>

<!-- page content -->
<section id="page-content">

	<!-- page section -->
	<div id="home-promo-cards">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<!-- other promo -->
					<img src="{{ asset('img/promos/ig-cashback-insert.jpg') }}" class="bd20 w-100 cursor-ptr mb-20 scale-onclick" data-toggle="modal" data-target="#hero-promo-1">

				</div>
			</div> 
		</div>
	</div>

	<!-- page header -->
	<!-- <div id="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<img src="{{ asset('img/lp-recharge.jpg') }}" class="bd20 w-100">
				</div>
			</div> 
		</div>
	</div> -->

	<!-- page section -->
	<!-- only for guests -->
	<div id="about-lp-for-guest" class="mb-20">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-toggle="modal" data-target="#lp-help">Mengenai LP</a>
				</div>
			</div> 
		</div>
	</div>


	<div id="about-vip-for-guest-and-member" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-toggle="modal" data-target="#vip-help">Mengenai Akun VIP</a>
				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<!-- only for members -->
	<!-- <div id="lp-exp-bar" class="mb-50 mt-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="section-title position-relative">
						<h4 class="font-size-18 mb-20">Level kamu saat ini</h4>
						<a href="/mana/top-up-index" class="o5 section-title-meta-link font-size-14" data-toggle="modal" data-target="#lp-help">Mengenai LP</a>
					</div>
					<div class="lp-exp-wrapper">
						<div class="lp-exp-bar-container mb-20">
							<div class="lp-exp-bg-bar">
								<div class="lp-exp-gained-bar"></div>
								<div class="lp-exp-stats">230 / 1,550</div>
							</div>
						</div>
						<div class="lp-exp-ranks-container">
							<div class="lp-exp-ranks-left">
								<img src="{{ asset('img/ranks/ranks-06.png') }}" class="lp-exp-ranks-icon">
								<div class="lp-exp-ranks-name poetsenone-reg">Silver III</div>
							</div>
							<div class="lp-exp-ranks-right">
								<div class="lp-exp-ranks-name poetsenone-reg">Gold I</div>
								<img src="{{ asset('img/ranks/ranks-07.png') }}" class="lp-exp-ranks-icon">
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div> -->

	

	<!-- page section -->
	<div id="lp-nominal-choice" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="section-title position-relative">
						<h4 class="font-size-18 mb-20">Pilih nominal recharge</h4>
						<a href="/mana/top-up-index" class="o5 section-title-meta-link font-size-14" data-toggle="modal" data-target="#lp-exchange-rate">Exchange Rate</a>
					</div>
					<div class="lp-nominals-container d-flex flex-wrap align-items-center justify-content-start mb-20">
						<?php foreach ($nominals as $key => $value): ?>
							<div class="lp-nominal lp-nominal-btn scale-onclick">
								<div class="lp-nominal-inner bd20 d-flex justify-content-center">
									<span class="money money-14 right"><?php echo $value; ?><img src="{{ asset('img/currencies/lp.svg') }}"></span>
								</div>
							</div>
						<?php endforeach; ?>
						<div class="lp-nominal lp-nominal-btn scale-onclick recharge-lp-custom-nominal-btn">
							<div class="lp-nominal-inner bd20 d-flex justify-content-center">
								<span class="money money-14 right">Custom</span>
							</div>
						</div>
					</div>

					<div class="form-group mana-control recharge-lp-custom-nominal-form">
						<label class="mana-control">Masukkan nominal</label>
						<input type="number" class="form-control mana-control">
						<small class="font-size-14 grey-10 mt-10 d-block fw-300">Minimal 1 dan maksimum 2,000 LP</small>
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">BP yang didapat dari Promo Cashback 10% BP:</label>
						<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-toggle="modal" data-target="#hero-promo-5">
							<span class="money money-14 right fw-400">0<img src="{{ asset('img/currencies/bp.svg') }}"></span>
						</a>
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

					<h4 class="font-size-18 mb-20">Pilih metode pembayaran</h4>

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

					<div class="form-group mana-control">
						<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-20 buy-diamond-btn">
							<span class="default-text">Beli</span>
							<div class="spinner-border hw24"></div>
						</a>
					</div>

				</div>
			</div> 
		</div>
	</div>
	
</section>

<style type="text/css">
	.recharge-lp-custom-nominal-form {
		display: none;
	}
	.recharge-lp-custom-nominal-form.active {
		display: block;
	}
	.lp-nominals-container {
		margin-left: -5px;
	    margin-right: -5px;
	}
	.lp-nominal {
		flex: 0 0 33.33%;
		padding: 5px;
		cursor: pointer;
	}
	.lp-nominal-inner {
		background: rgb(0 0 0 / 0.2);
		flex: 1 1 50%;
		line-height: 54px;
		padding: 0 15px;
	}
	.lp-nominal:hover .lp-nominal-inner {
		background: rgb(0 0 0 / 0.4);
	}
	.lp-nominal.active .lp-nominal-inner {
		background: rgb(255 255 255 / 0.2);
	}
</style>

<section id="page-modals">
	
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="success-recharge-lp">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Terima kasih
				</div> 
				<div class="modal-mid font-size-16 grey-10">
					<p>Pembelian <span class="money money-14 right money-inline white-09">560<img src="{{ asset('img/currencies/lp.svg') }}"></span> berhasil.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
</section>

@include('includes.mana-ui.footer')
@include('includes.mana-ui.modals')


<style type="text/css">
	/*page specific*/
	
</style>
<style type="text/css">
	/*media*/
	
</style>
@endsection

@section('js')
<script>
	$(document).ready(function() {
		
		// page specific scripts

		// nominal button
		$('body').on('click', '.lp-nominal-btn', function(e) {
			e.preventDefault();

			target = $(this);
			target2 = $('.lp-nominal-btn');
			target3 = $('.recharge-lp-custom-nominal-form');

			target2.removeClass('active');
			target.addClass('active');
			target3.removeClass('active');
		});

		// pg button
		$('body').on('click', '.pg-choice-btn', function(e) {
			e.preventDefault();

			target = $(this);
			target2 = $('.pg-choice-btn');

			target2.removeClass('active');
			target.addClass('active');
		});

		// beli button
		$('body').on('click', '.buy-diamond-btn', function(e) {
			e.preventDefault();

			var target = $(this);

			// show spinner
			$(this).addClass('loading');
		});

		// beli custom button
		$('body').on('click', '.recharge-lp-custom-nominal-btn', function(e) {
			e.preventDefault();

			target = $(this);
			target2 = $('.recharge-lp-custom-nominal-form');

			target2.addClass('active');
			target2.find('input').focus();
		});

	})
</script>
@endsection