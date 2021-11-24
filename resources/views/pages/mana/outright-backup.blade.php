@extends('layouts.mana-ui')

@section('page_title', "TimKamu (PTS) - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui outright')


@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content">

	<!-- page section -->
	<div id="home-promo-cards">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<!-- other promo -->
					<img src="{{ asset('img/outright/1.jpg') }}" class="bd20 w-100 mb-20">

				</div>
			</div> 
		</div>
	</div>

	<style type="text/css">

		
	</style>

	<!-- page section -->
	<div class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<h1 class="rajdhani-bold mb-20 mt-30 text-center">M2 World Championship Mobile Legends</h1>

					<p class="grey-10 font-size-20 mb-30 text-center">Berikan prediksi kamu untuk beberapa kategori di bawah ini dan menangkan banyak hadiah!</p>
					<p class="grey-10 font-size-20 text-center mb-10">Waktu tersisa:</p>
					<a href="#" class="mana-btn-54 mana-btn-opaque mb-10" data-toggle="modal" data-target="#outright-help">20 hari 6 jam 40 menit</a>
					<a href="https://www.oneesports.gg/mpli/" class="mana-btn-54 mana-btn-opaque" target="_blank">Website resmi One Esports MPLI</a>

					<div class="mb-20"></div>

					<div class="row no-gutters outright-row">
						<div class="col-6 col-md-4" data-toggle="modal" data-target="#odds-nominal-choice">
							<div class="outright-item scale-onclick">
								<img src="{{ asset('img/team-logos/onic-200.png') }}" class="outright-team-logo">
								<h4 class="outright-h4">ONIC Esports</h4>
							</div>
							<div class="outright-action"><img src="{{ asset('icons/arrow-right-white.svg') }}"></div>
						</div>
						<div class="col-6 col-md-4" data-toggle="modal" data-target="#odds-nominal-choice">
							<div class="outright-item scale-onclick">
								<img src="{{ asset('img/team-logos/evos-200.png') }}" class="outright-team-logo">
								<h4 class="outright-h4">EVOS Legends</h4>
							</div>
							<div class="outright-action"><img src="{{ asset('icons/arrow-right-white.svg') }}"></div>
						</div>
						<div class="col-6 col-md-4" data-toggle="modal" data-target="#odds-nominal-choice">
							<div class="outright-item scale-onclick">
								<img src="{{ asset('img/team-logos/aura-200.png') }}" class="outright-team-logo">
								<h4 class="outright-h4">AURA</h4>
							</div>
							<div class="outright-action"><img src="{{ asset('icons/arrow-right-white.svg') }}"></div>
						</div>
						<div class="col-6 col-md-4" data-toggle="modal" data-target="#odds-nominal-choice">
							<div class="outright-item scale-onclick">
								<img src="{{ asset('img/team-logos/geekfam-200.png') }}" class="outright-team-logo">
								<h4 class="outright-h4">Geek Fam</h4>
							</div>
							<div class="outright-action"><img src="{{ asset('icons/arrow-right-white.svg') }}"></div>
						</div>
						<div class="col-6 col-md-4" data-toggle="modal" data-target="#odds-nominal-choice">
							<div class="outright-item scale-onclick">
								<img src="{{ asset('img/team-logos/rrq-200.png') }}" class="outright-team-logo">
								<h4 class="outright-h4">RRQ</h4>
							</div>
							<div class="outright-action locked"><img src="{{ asset('icons/arrow-right-white.svg') }}"></div>
						</div>
						<div class="col-6 col-md-4" data-toggle="modal" data-target="#odds-nominal-choice">
							<div class="outright-item scale-onclick">
								<img src="{{ asset('img/team-logos/alter-200.png') }}" class="outright-team-logo">
								<h4 class="outright-h4">Alter Ego</h4>
							</div>
							<div class="outright-action"><img src="{{ asset('icons/arrow-right-white.svg') }}"></div>
						</div>
						<div class="col-6 col-md-4" data-toggle="modal" data-target="#odds-nominal-choice">
							<div class="outright-item scale-onclick">
								<img src="{{ asset('img/team-logos/redbull-200.png') }}" class="outright-team-logo">
								<h4 class="outright-h4">Redbull Rebellion</h4>
							</div>
							<div class="outright-action"><img src="{{ asset('icons/arrow-right-white.svg') }}"></div>
						</div>
					</div>

				</div>
			</div> 
		</div>
	</div>
</section>

<section id="page-modals">
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="odds-nominal-choice">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<div class="odds-nominal-enter mb-20">
					    <input type="number" class="form-control" value="9">
					</div>
					<div class="odds-return-info position-relative bd50 bg040 mb-10">
						<div class="odds-return-info-left o5">Bonus prediksi benar</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 white-09">100%</span>
						</div>
					</div>
					<div class="odds-return-info position-relative bd50 bg040 mb-10">
						<div class="odds-return-info-left o5">Estimasi pendapatan</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 right white-09 top-01">249<img src="{{ asset('img/currencies/bp.svg') }}"></span>
						</div>
					</div>
					<div class="odds-return-info position-relative bd50 bg040 mb-20">
						<div class="odds-return-info-left o5">Saldo BP</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 right white-09 top-01">600<img src="{{ asset('img/currencies/bp.svg') }}"></span>
						</div>
					</div>
					<div class="odds-nominal-choices d-flex flex-wrap">
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">9<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">18<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">45<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">90<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">225<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">450<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">900<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">1350<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">1800<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					</div>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red bet-buy-btn has-spinner">
						<span class="default-text">Berikan Prediksi</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
					<span class="font-size-14 o3 text-italic mt-10 d-block fw-300">Pemberian prediksi hanya dalam kelipatan 9</span>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="page-modals">
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="outright-help">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Mengenai Waktu Sisa
				</div> 
				<div class="modal-mid font-size-16 grey-10">

					<p>Waktu pengumuman pemenang <span class="white-10">MPLI One Esports</span> adalah <span class="white-10">6 December 2020</span>.</p>

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

	/*outright*/
	.outright-row {
		margin: 0 -15px;
	}
	.outright-item {
		padding: 15px;
		margin: 15px;
		border-radius: 20px;
		background: rgb(0 0 0 / .2);
		text-align: center;	
		cursor: pointer;	
	}
	.outright-item {
		padding: 15px;
		margin: 15px;
		border-radius: 20px;
		background: rgb(0 0 0 / .2);
		text-align: center;	
		cursor: pointer;	
	}
	.outright-team-logo {
		width: 100%;
	}
	.outright-h4 {
		font-family: 'Rajdhani-Bold';
		font-size: 18px;
		margin: 0;
		margin-top: -5px;
		margin-bottom: 5px;
	}
	.outright-action {
		background: rgb(233 33 90 / 1);
		opacity: .5;
		border-radius: 50px;
		height: 38px;
		text-align: center;
		display: flex;
		align-items: center;
		justify-content: center;
		margin: -5px 15px 10px 15px;
		cursor: pointer;	
	}
	.outright-action.locked {
		background: rgb(0 0 0 / .4);
	}
	.outright-action img {
		height: 20px;
		width: 20px;
	}
	.outright-row > div:hover .outright-item {
		background: rgb(0 0 0 / .4);
	}
	.outright-row > div:hover .outright-action {
		opacity: 1;
	}


	/*css copas dari event-view untuk modal odd nominal choice*/
	.odds-choice-item {
		flex: 1 1 25%;
		margin: 0 5px;
		font-family: 'poetsenone-reg';
		padding: 0 10px;
		display: flex;
		align-items: center;
		justify-content: center;
		margin-bottom: 10px;
		cursor: pointer;
		border-radius: 50px;
		line-height: 44px;
		height: 44px;
		background: rgb(255 255 255 / 10%);
	}
	.odds-choice-item:hover {
		background: rgb(255 255 255 / 20%);
	}
	.odds-choice-item:active {
		background: rgb(255 255 255 / 30%);
	}
	.odds-choice-item .icon {
		width: 16px;
		margin-left: 5px;
	}
	.odds-nominal-enter input {
		border: 0px;
		border-radius: 10px;
		background: rgb(255 255 255 / 10%);
		color: rgb(255 255 255 / 90%);
		padding: 15px;
		height: 48px;
	}
	.odds-nominal-enter input:focus {
		background: rgb(255 255 255 / 20%);
		color: rgb(255 255 255 / 90%);
	}
	.odds-nominal-enter small {
		margin-top: 15px;
		margin-bottom: 25px;
	}
</style>
@endsection

@section('js')
<script>
	$(document).ready(function() {
		
		// page specific scripts
	})
</script>
@endsection