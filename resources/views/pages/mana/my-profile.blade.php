@extends('layouts.mana-ui')

@section('page_title', "TimKamu - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui my-profile')


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
					<h1 class="rajdhani-bold">My Dashboard</h1>
				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<div id="lp-exp-bar" class="mb-50">
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
	</div>

	<!-- event index filters -->
	<div class="system-mail-wrapper mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="section-title position-relative">
						<h4 class="font-size-18 mb-20">Promo</h4>
					</div>

					<div class="dashboard-info-group mb-10">
						<div id="copy-referral" class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center cursor-ptr">
							<div class="info-horizontal-left o5">Kode referral</div>
							<div class="info-horizontal-right text-right">HZYK4JABUT</div>
						</div>
						<div class="info-horizontal-adds text-right mb-10">
							<a href="#" data-toggle="modal" data-target="#hero-promo-3">
								<small class="font-size-14">Mengenai promo kode referral</small>
							</a>
						</div>
						<input type="text" value="HZYK4JABUT" id="copy-referral-input" style="top: -90000px;position: absolute;">
					</div>

				</div>
			</div> 
		</div>
	</div>

	<!-- event index filters -->
	<div class="system-mail-wrapper mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="section-title position-relative">
						<h4 class="font-size-18 mb-20">Informasi Akun</h4>
						<!-- <a href="/mana/update-profile" class="o5 section-title-meta-link font-size-14">Ganti password</a> -->
					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">User ID</div>
							<div class="info-horizontal-right text-right">123456789</div>
						</div>
					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Username</div>
							<div class="info-horizontal-right text-right">fjahja.dev</div>
						</div>
					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Email</div>
							<div class="info-horizontal-right text-right">email@email.com</div>
						</div>

						<!-- when verified -->
						<!-- <div class="info-horizontal-adds text-right mb-10">
							<small class="font-size-14 grey-10 text-italic">Email sudah terverifikasi.</small>
						</div> -->

						<!-- when not verified -->
						<div class="info-horizontal-adds text-right mb-10">
							<a href="#" data-toggle="modal" data-target="#send-email-verification">
								<small class="font-size-14 grey-10">Email belum terverifikasi. <span class="white-09">Verify sekarang</span></small>
							</a>
						</div>

					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Handphone</div>
							<div class="info-horizontal-right text-right">01827582324</div>
						</div>

						<!-- when verified -->
						<!-- <div class="info-horizontal-adds text-right mb-10">
							<small class="font-size-14 grey-10">Nomor handphone sudah terverifikasi.</small>
						</div> -->

						<!-- when not verified -->
						<div class="info-horizontal-adds text-right mb-10">
							<a href="#" data-toggle="modal" data-target="#send-phone-verification">
								<small class="font-size-14 grey-10">Nomor belum terverifikasi. <span class="white-09">Verify sekarang</span></small>
							</a>
						</div>
					</div>

				</div>
			</div> 
		</div>
	</div>

	<!-- event index filters -->
	<div class="system-mail-wrapper mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<h4 class="font-size-18 mb-20">LP & BP</h4>

					<div class="dashboard-info-group mb-10">
						<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-toggle="modal" data-target="#bp-lp-convert-modal">Convert&nbsp;&nbsp;<span class="money money-14 right money-inline"><span class="fw-300">BP</span><img src="{{ asset('img/currencies/bp.svg') }}"></span>&nbsp;&nbsp;to&nbsp;&nbsp;<span class="money money-14 right money-inline"><span class="fw-300">LP</span><img src="{{ asset('img/currencies/lp.svg') }}"></span></a>
					</div>

					<!-- <div class="dashboard-info-group mb-10 cursor-ptr" data-toggle="modal" data-target="#bp-lp-convert-modal">
						<img src="{{ asset('img/convert2.jpg') }}" class="bd20 w-100">
					</div> -->

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Saldo LP</div>
							<div class="info-horizontal-right text-right">
								<span class="money money-14 right"><span>1,500</span><img src="{{ asset('img/currencies/lp.svg') }}"></span>
							</div>
						</div>
					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Saldo BP</div>
							<div class="info-horizontal-right text-right">
								<span class="money money-14 right"><span>900</span><img src="{{ asset('img/currencies/bp.svg') }}"></span>
							</div>
						</div>
					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Total LP recharge</div>
							<div class="info-horizontal-right text-right">
								<span class="money money-14 right"><span>12,500</span><img src="{{ asset('img/currencies/lp.svg') }}"></span>
							</div>
						</div>
					</div>

					<div class="dashboard-info-group mb-10">
						<a href="/mana/my-lpbp-transactions">
							<div class="info-horizontal link bg020 bd20 d-flex align-items-center justify-content-center scale-onclick">
								<div class="info-horizontal-left o5">Catatan Transaksi</div>
								<div class="info-horizontal-right text-right">
									<i data-feather="chevron-right" class="icon o3"></i>
								</div>
							</div>
						</a>
					</div>

				</div>
			</div> 
		</div>
	</div>

	<!-- event index filters -->
	<div class="system-mail-wrapper mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<h4 class="font-size-18 mb-20">Statistik Akun</h4>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Total prediksi</div>
							<div class="info-horizontal-right text-right">127</div>
						</div>
					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Prediksi benar</div>
							<div class="info-horizontal-right text-right">78</div>
						</div>
					</div>

				</div>
			</div> 
		</div>
	</div>

</section>

<section id="page-modals">
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="send-email-verification">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Verifikasi email
				</div>
				<div class="modal-mid grey-10">
					Kirimkan email verifikasi ke alamat email yang terdaftar?
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red email-verify-do has-spinner">
						<span class="default-text">Kirim verifikasi email</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="send-email-verification-sent">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Verifikasi email terkirim
				</div>
				<div class="modal-mid grey-10">
					Email verifikasi telah terkirim ke alamat yang didaftarkan. Jika dalam 10-20 menit tidak menerima, cek folder spam/junk atau hubungi customer service kami. 
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="send-phone-verification">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Verifikasi nomor telefon
				</div>
				<div class="modal-mid grey-10">
					Kirimkan sms OTP verifikasi ke nomor telefon yang terdaftar?
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="/mana/otp-resend" class="mana-btn-54 mana-btn-red otp-verify-do has-spinner">
						<span class="default-text">Kirim verifikasi nomor telefon</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
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
		// send email verification modal
		$('body').on('click', '.email-verify-do', function(e) {
			e.preventDefault();

			var target2 = $('#send-email-verification');
			var target3 = $('#send-email-verification-sent');

			// show spinner
			$(this).addClass('loading');

			setTimeout(function() {
			    // do db work here

			    // reset modal button
			    $(this).removeClass('loading');

			    // close modal
			    target2.modal('hide');

			    // open modal
			    target3.modal('show');
			}, 1000);  
		});

		// send phone verification modal
		$('body').on('click', '.otp-verify-do', function() {

			// show spinner
			$(this).addClass('loading');

			setTimeout(function() {
			    // do db work here

			    // reset modal button
			    $(this).removeClass('loading');
			}, 1000);  
		});

		// convert bp to lp modal btn
		$('body').on('click', '.convert-bp-lp-btn', function(e) {
			e.preventDefault();

			target = $('#bp-lp-convert-modal');
			target2 = $('#bp-lp-convert-success');

			// show spinner
			$(this).addClass('loading');

			setTimeout(function() {
			    // do db work here

			    // close modal
			    target.modal('hide');

			    // open modal
			    target2.modal('show');

			    // reset modal button
			    $(this).removeClass('loading');
			}, 1000);  
		});

	})
</script>
@endsection