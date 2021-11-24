@extends('layouts.mana-ui')

@php
	$game = '';
	if(app('request')->input('type') === 'mlbb') {
		$game = 'Mobile Legends';
	} else if(app('request')->input('type') === 'pubgm') {
		$game = 'PUBG Mobile';
	} else if(app('request')->input('type') === 'freefire') {
		$game = 'Garena Freefire';
	} else if(app('request')->input('type') === 'valorant') {
		$game = 'Valorant';
	} else if(app('request')->input('type') === 'ragnarok') {
		$game = 'Ragnarok Eternal Love';
	}
@endphp

@section('page_title', "Top up - ".$game)
@section('body_class', 'mana-ui top-up-mlbb')


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
					<img src="{{ asset('img/promos/cash-discount-insert.jpg') }}" class="bd20 w-100 cursor-ptr mb-20 scale-onclick" data-toggle="modal" data-target="#hero-promo-4">

				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<div id="home-welcome-hero" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="top-up-page-header">
						<div class="page-hero-container">
							<img src="{{ asset('img/game-thumbs/hero-'.app('request')->input('type').'.jpg') }}" class="main-hero">
							<div class="hero-overlay"></div>
							<div class="hero-texts">
								<p class="mb-0 fw-800 o7">Top-Up Game</p>
								@if(app('request')->input('type') === 'mlbb')
								<h1 class="rajdhani-bold mt-0 mb-0">Mobile Legends</h1>
								@elseif(app('request')->input('type') === 'pubgm')
								<h1 class="rajdhani-bold mt-0 mb-0">PUBG Mobile</h1>
								@elseif(app('request')->input('type') === 'freefire')
								<h1 class="rajdhani-bold mt-0 mb-0">Garena Freefire</h1>
								@elseif(app('request')->input('type') === 'valorant')
								<h1 class="rajdhani-bold mt-0 mb-0">Valorant</h1>
								@elseif(app('request')->input('type') === 'ragnarok')
								<h1 class="rajdhani-bold mt-0 mb-0">Ragnarok Eternal Love</h1>
								@endif
							</div>
						</div>

					</div>

				</div>
			</div> 
		</div>
	</div>

	<div id="shop-form-mlbb" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<h4 class="font-size-18 mb-20">1. Informasi User</h4>

					@if(app('request')->input('type') === 'mlbb')
					<div class="form-group mana-control">
						<label class="mana-control position-relative w-100">
							User-ID
							<div class="label-helper cursor-ptr" data-toggle="modal" data-target="#mlbb-userid-help"><i data-feather="help-circle" class="icon"></i></div>
						</label>
						<div class="d-flex mlbb-userinfo-wrapper">
							<div class="mlbb-user-id-left">
								<input type="text" class="form-control mana-control" name="userid">
							</div>
							<div class="mlbb-user-id-right">
								<input type="text" class="form-control mana-control" name="serverid">
							</div>
						</div>
					</div>
					@elseif(app('request')->input('type') === 'pubgm')
					<div class="form-group mana-control">
						<label class="mana-control position-relative w-100">
							ID Pemain
							<div class="label-helper cursor-ptr" data-toggle="modal" data-target="#pubgm-userid-help"><i data-feather="help-circle" class="icon"></i></div>
						</label>
						<input type="text" class="form-control mana-control" name="idpemain">
					</div>
					@elseif(app('request')->input('type') === 'freefire')
					<div class="form-group mana-control">
						<label class="mana-control position-relative w-100">
							Player ID
							<div class="label-helper cursor-ptr" data-toggle="modal" data-target="#freefire-userid-help"><i data-feather="help-circle" class="icon"></i></div>
						</label>
						<input type="text" class="form-control mana-control" name="idpemain">
					</div>
					@elseif(app('request')->input('type') === 'valorant')
					<div class="form-group mana-control">
						<label class="mana-control position-relative w-100">
							Username Riot Games
							<div class="label-helper cursor-ptr" data-toggle="modal" data-target="#valorant-userid-help"><i data-feather="help-circle" class="icon"></i></div>
						</label>
						<input type="text" class="form-control mana-control" name="idpemain">
					</div>
					@elseif(app('request')->input('type') === 'ragnarok')
					<div class="form-group mana-control">
						<label class="mana-control position-relative w-100">
							ID Karakter, Nama Karakter dan Server
							<div class="label-helper cursor-ptr" data-toggle="modal" data-target="#ret-userid-help"><i data-feather="help-circle" class="icon"></i></div>
						</label>
						<input type="text" class="form-control mana-control" name="idpemain">
					</div>
					@endif
					
					<div class="form-group mana-control mb-0">
						<label class="mana-control">Nomor telefon</label>
						<input type="text" class="form-control mana-control" name="userphone">
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
						@foreach ($items as $key => $item)
							@if(strpos($item['name'], ' Diamond'))
							<div class="shelf-item nominal-choice-btn d-flex scale-onclick @if($item['active'] === '0') unavailable @endif" data-name="{{ $item['name'] }}" data-id_rupiah="{{ $item['id_rupiah'] }}" data-id_lp="{{ $item['id_lp'] }}" data-rupiah="{{ $item['rupiah'] }}" data-lp="{{ $item['lp'] }}">
								<div class="shelf-item-inner d-flex bg020 bd20 justify-content-center font-size-14">
									<span class="money money-14 right">{{ number_format((str_replace(' Diamond', '', $item['name'])), 0, '.', ',') }}<img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>
								</div>
							</div>
							@elseif(strpos($item['name'], ' UC'))
							<div class="shelf-item full-width nominal-choice-btn d-flex scale-onclick @if($item['active'] === '0') unavailable @endif" data-name="{{ $item['name'] }}" data-id_rupiah="{{ $item['id_rupiah'] }}" data-id_lp="{{ $item['id_lp'] }}" data-rupiah="{{ $item['rupiah'] }}" data-lp="{{ $item['lp'] }}">
								<div class="shelf-item-inner d-flex bg020 bd20 justify-content-center">
									<span class="money money-14 right">{{ number_format((str_replace(' UC', '', $item['name'])), 0, '.', ',') }}<img src="{{ asset('img/currencies/uc.png') }}"></span>
								</div>
							</div>
							@elseif(strpos($item['name'], ' Points'))
							<div class="shelf-item nominal-choice-btn d-flex scale-onclick @if($item['active'] === '0') unavailable @endif" data-name="{{ $item['name'] }}" data-id_rupiah="{{ $item['id_rupiah'] }}" data-id_lp="{{ $item['id_lp'] }}" data-rupiah="{{ $item['rupiah'] }}" data-lp="{{ $item['lp'] }}">
								<div class="shelf-item-inner d-flex bg020 bd20 justify-content-center font-size-14">
									<span class="money money-14 right">{{ number_format((str_replace(' Points', '', $item['name'])), 0, '.', ',') }}<img src="{{ asset('img/currencies/valorant-points.svg') }}"></span>
								</div>
							</div>
							@elseif(strpos($item['name'], ' BCC'))
							<div class="shelf-item nominal-choice-btn d-flex scale-onclick @if($item['active'] === '0') unavailable @endif" data-name="{{ $item['name'] }}" data-id_rupiah="{{ $item['id_rupiah'] }}" data-id_lp="{{ $item['id_lp'] }}" data-rupiah="{{ $item['rupiah'] }}" data-lp="{{ $item['lp'] }}">
								<div class="shelf-item-inner d-flex bg020 bd20 justify-content-center font-size-14">
									<span class="money money-14 right">{{ number_format((str_replace(' BCC', '', $item['name'])), 0, '.', ',') }}<img src="{{ asset('img/currencies/bcc.png') }}"></span>
								</div>
							</div>
							@else
							<div class="shelf-item full-width nominal-choice-btn d-flex scale-onclick @if($item['active'] === '0') unavailable @endif" data-name="{{ $item['name'] }}" data-id_rupiah="{{ $item['id_rupiah'] }}" data-id_lp="{{ $item['id_lp'] }}" data-rupiah="{{ $item['rupiah'] }}" data-lp="{{ $item['lp'] }}">
								<div class="shelf-item-inner d-flex bg020 bd20 justify-content-center">
									<span class="money money-14 right">{{ $item['name'] }}</span>
								</div>
							</div>
							@endif
						@endforeach
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
						<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-toggle="modal" @if($bp_quest_done) data-target="#bp-lp-convert-modal" @elseif(!Auth::user()) data-target="#modal-need-login" @else data-target="#locked-feature" @endif>Convert&nbsp;&nbsp;<span class="money money-14 right money-inline"><span class="fw-300">BP</span><img src="{{ asset('img/currencies/bp.svg') }}"></span>&nbsp;&nbsp;to&nbsp;&nbsp;<span class="money money-14 right money-inline"><span class="fw-300">LP</span><img src="{{ asset('img/currencies/lp.svg') }}"></span></a>
					</div>

					<div class="pg-shelf-container d-flex flex-wrap align-items-center">

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="lp">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name black-08 fw-800">
									Loyalty Points
								</div>
								<div class="pg-lp text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									<span class="money money-16 right lp-amount">0<img src="{{ asset('img/currencies/lp.svg') }}"></span>
								</div>
							</div>
						</div>

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="gopay">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/gopay.png') }}" class="pg-icon">
								</div>
								<div class="pg-price slashed text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 0
								</div>
							</div>
						</div>
						
						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="dana">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/dana.png') }}" class="pg-icon">
								</div>
								<div class="pg-price slashed text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 0
								</div>
							</div>
						</div>
						
						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="ovo">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/ovo.png') }}" class="pg-icon">
								</div>
								<div class="pg-price slashed text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 0
								</div>
							</div>
						</div>
						
						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="shopee">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/shopee-pay.png') }}" class="pg-icon">
								</div>
								<div class="pg-price slashed text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 0
								</div>
							</div>
                        </div>
                        
						@if(ENV('APP_ENV') === 'local' || ENV('APP_ENV') === 'dev')
						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="bypass">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name black-08 fw-800">
									bypass
								</div>
								<div class="pg-price slashed text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 0
								</div>
							</div>
						</div>
						@endif

					</div>

				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<div class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="form-group mana-control mb-50">
						<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-20 buy-diamond-btn">
							<span class="default-text">Beli</span>
							<div class="spinner-border hw24"></div>
						</a>
						<a href="{{ url('purchase/detail?name=diamond') }}" class="mana-btn-54 mana-btn-opaque">Pilih game lain</a>
					</div>
				</div>
			</div> 
		</div>
	</div>

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
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="diamond-shop-page-blank-userinfo">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error pembelian
				</div>
				<div class="modal-mid font-size-16 o5">
					<p class="message-error"></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="mlbb-userid-help">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<img src="{{ asset('img/mlbb-user-id.png') }}" class="w-100 mb-20 mlbb-user-guide-png">
					<p class="o5 font-size-16">Untuk mengetahui User ID Anda, Silakan Klik menu profile dibagian kiri atas pada menu utama game.</p>
					<p class="o5 font-size-16">User ID akan terlihat dibagian bawah Nama Karakter Game Anda. Silakan masukkan User ID Anda untuk menyelesaikan transaksi. Contoh : 12345678(1234).</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="pubgm-userid-help">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Tidak bisa menemukan ID Player kamu?
				</div>
				<div class="modal-mid grey-10">
					<p class="font-size-16">
						1. Masuk ke game <br>
						2. Temukan ID pemain Anda
					</p>
					<img src="{{ asset('img/pubgm-01.jpg') }}" class="w-100 mb-20">
					<img src="{{ asset('img/pubgm-02.jpg') }}" class="w-100">
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="freefire-userid-help">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid grey-10">
					<img src="{{ asset('img/33.png') }}" class="w-100">
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="valorant-userid-help">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid grey-10">
					<p>Masukkan Username Riot Games sesuai dengan yang terdaftar di game. Masukkan sesuai huruf besar dan kecilnya atau kamu memasukkan lebih dari 400 karakter. Jangan memberikan password akun Riot Games kamu pada penjual</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="ret-userid-help">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid grey-10">
					<p>Masukkan Nama Karakter sesuai huruf besar dan kecilnya dan ID Karakter dengan benar. Jangan memberikan ID & Password akun kamu. atau kamu memasukkan lebih dari 400 karakter</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="need-login">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error pembelian
				</div>
				<div class="modal-mid font-size-16 o5">
					<p class="message-error">
                        Kamu butuh login untuk melakukan itu.
                    </p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" id="btn-need-login" data-dismiss="modal">Sign in</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="shop-item-unavailable">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Shop item unavailable
				</div>
				<div class="modal-mid grey-10">
					<p>Item ini untuk sementara tidak tersedia.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="payment-method-unavailable">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Payment method unavailable
				</div>
				<div class="modal-mid grey-10">
					<p>Metode pembayaran yang kamu pilih hanya bisa digunakan pada website desktop.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-convert-error">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p id="modal-convert-error-msg"></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal" data-toggle="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-need-login">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Kamu butuh login untuk melakukan itu.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
</section>

@include('includes.mana-ui.footer')


<style type="text/css">
	.shelf-item.full-width {
		flex: 0 0 100%;
	}

	/*page specific*/
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
	.pg-icon {
		height: 20px;
	}
	.pg-shelf-item-inner {
		background: rgb(255 255 255 / 0.7);
	}
	.pg-shelf-item-inner > div {
		flex: 1 1 50%;
	}
	.pg-shelf-container {
		margin-left: -5px;
		margin-right: -5px;
	}
	.pg-shelf-item {
		flex: 0 0 100%;
		padding: 5px;
		cursor: pointer;
	}
	.pg-shelf-item-inner {
		display: flex!important;
		flex: 1 1 50%;
		line-height: 54px;
		padding: 0 25px;
	}
	.pg-shelf-item:hover .pg-shelf-item-inner {
		background: rgb(255 255 255 / 1);
	}
	.pg-shelf-item.active .pg-shelf-item-inner {
		background: rgb(255 255 255 / 1);
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
	.shelf-item.unavailable {
		opacity: 0.3;
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
	var user = "{{ Auth::id() }}";
    var idRupiah = '';
    var idLP = '';
	var rupiah = '';
	var rupiahAfterDiscount = '';
    var lp = '';
    var paymentType = '';
	var isUnvailable = false;
	var typeGame = "{{ app('request')->input('type') }}";
	$(document).ready(function() {
		
		// page specific scripts

		// nominal button
		$('body').on('click', '.nominal-choice-btn', function(e) {
			e.preventDefault();

			var target = $(this);
            var target2 = $('.nominal-choice-btn');

			if(target.hasClass('unavailable')) {
				$('#shop-item-unavailable').modal('show');
				$('.pg-lp .lp-amount').text('unavailable');
            	$('.pg-price').text('unavailable');

				isUnvailable = true;

				return false;
			} else {
				isUnvailable = false;
			}
            
            idRupiah = target.attr('data-id_rupiah');
            idLP = target.attr('data-id_lp');
			rupiah = target.attr('data-rupiah');
			rupiahAfterDiscount = parseInt(rupiah) * 0.80;
            lp = target.attr('data-lp');

			$('.pg-lp .lp-amount').html(lp+"<img src='{{ asset('img/currencies/lp.svg') }}'>");
			
			var htmlWithoutDiscount = "<span class='old'>"+convertToRupiah(parseInt(rupiah))+"</span>";
			var htmlWithDiscount = "<span class='new'>"+convertToRupiah(parseInt(rupiahAfterDiscount))+"</span>";
			$('.pg-price').html(htmlWithoutDiscount+htmlWithDiscount);

			target2.removeClass('active');
			target.addClass('active');
		});

		// pg button
		$('body').on('click', '.pg-choice-btn', function(e) {
			e.preventDefault();

			var target = $(this);
            var target2 = $('.pg-choice-btn');

			if(!isUnvailable) {
				var userAgent = "{{ $user_agent }}";
				paymentType = target.attr('data-value');

				if(userAgent === 'mobile' && paymentType !== 'gopay' && paymentType !== 'lp') {
					paymentType = '';
					$('#payment-method-unavailable').modal('show');

					return false;
				}

				target2.removeClass('active');
				target.addClass('active');
			}
		});

		// beli button
		$('body').on('click', '.buy-diamond-btn', function(e) {
			e.preventDefault();

			var target = $(this);

            // get user info
			var userId = $('#shop-form-mlbb').find('input[name="userid"]').val();
			var serverId = $('#shop-form-mlbb').find('input[name="serverid"]').val();
			var idPemain = $('#shop-form-mlbb').find('input[name=idpemain]').val();
            var phone = $('#shop-form-mlbb').find('input[name="userphone"]').val();

			if(isUnvailable) {
				$('#diamond-shop-page-blank-userinfo').modal('show').find('p.message-error').text('Item tidak tersedia');

				return false;
			}

			if((typeGame === 'mlbb' && (serverId === '' || userId === '')) || ((typeGame === 'freefire' || typeGame === 'pubgm' || typeGame === 'valorant') && idPemain === '') || phone === '') {
				$('#diamond-shop-page-blank-userinfo').modal('show').find('p.message-error').text('Kamu belum mengisi semua formulir');

				return false;
            } else if(idLP === '' && idRupiah === '') {
                $('#diamond-shop-page-blank-userinfo').modal('show').find('p.message-error').text('Kamu belum memilih item untuk dibeli');

                return false;
            } else if(paymentType === '') {
                $('#diamond-shop-page-blank-userinfo').modal('show').find('p.message-error').text('Kamu belum memilih metode pembayaran');

				return false;
			}

            // show spinner
            $(this).addClass('loading');

            setTimeout(function(){
				if(paymentType == 'lp') {
					if(user === '') {
						$('#need-login').modal('show');
						target.removeClass('loading');

						return false;
					}

					var urlString = ("{{ url('purchase?name=diamond&id=') }}" + parseInt(idLP))
					urlString = (urlString+"&user_id="+userId+"&server_id="+serverId+"&id_pemain="+idPemain+"&phone="+phone).replace(/&amp;/g, '&');
					location.href = urlString;
				} else {
					if(paymentType == 'bypass') {
                        var urlString = ("{{ url('purchase?name=diamond-bypass&id=') }}" + parseInt(idRupiah))
						urlString = (urlString+"&user_id="+userId+"&server_id="+serverId+"&id_pemain="+idPemain+"&phone="+phone).replace(/&amp;/g, '&');
                        location.href = urlString;
					} else {                        
						$.ajax({
							url: "{{ url('ajax/get-token-transaction') }}",
							method: "GET",
							data : {
								name : 'diamond',
								id : idRupiah,
								user_id : userId,
								server_id : serverId,
								id_pemain : idPemain,
								phone : phone,
								game : typeGame,
								payment_method : paymentType
							},
							success : function(response) {
                                target.removeClass('loading');
								var res = JSON.parse(response);
								snap.pay(res.token);
							}
						})
					}
				}
        	}, 1000);
		});

	})

	$('.convert-bp-lp-btn').on('click', function(e) {
		e.preventDefault();

		var user = "{{ Auth::id() }}";
		var totalBP = "{{ $total_bp }}";

		var nominal = $('#bp-lp-convert-modal .nominal-convert').val();
		var target = $(this);
		var target2 = $('#bp-lp-convert-modal'); 
		var target3 = $('#bp-lp-convert-success');

		if(user === '') {
			target2.modal('hide');

			$('#modal-need-login').modal('show');
			return false
		}

		if(parseInt(totalBP) < parseInt(nominal)) {
			target2.modal('hide');

			$('#modal-convert-error').modal('show');
			$('#modal-convert-error-msg').text('Nominal yang dimasukkan lebih besar dari saldo BP yang kamu miliki.');
			$('#modal-convert-error .mana-btn-54').attr('data-target', '#bp-lp-convert-modal');

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

	// redirect to verifikasi phone number
    $('#btn-need-login').on('click', function(e) {
        e.preventDefault();

        $('#need-login').modal('hide');
        location.href="{{ url('sign-in') }}";
    })
    // end of redirect to verifikasi phone number
</script>
@endsection