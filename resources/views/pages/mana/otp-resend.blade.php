@extends('layouts.mana-ui')

@section('page_title', "TimKamu (PTS) - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui otp-resend no-menu')


@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content">

	<!-- page header -->
	<div id="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11 col-md-8 col-lg-4">
					<h1 class="rajdhani-bold text-center">SMS OTP Resend</h1>
				</div>
			</div> 
		</div>
	</div>

	<!-- form -->
	<div id="registration-form">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11 col-md-8 col-lg-4">

					<p>Sebuah sms OTP sudah dikirimkan ke nomor handphone yang terdaftar. Input kode OTP di bawah ini untuk verifikasi nomor handphone.</p>

					<div class="form-group mana-control">
						<label class="mana-control">OTP Code</label>
						<input type="text" class="form-control mana-control">
					</div>

					<div class="form-group mana-control mt-50">
						<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-15 otp-submit-btn">
							<span class="default-text">Konfirmasi</span>
							<div class="spinner-border hw24"></div>
						</a>
					</div>

				</div>
			</div> 
		</div>
	</div>

	
</section>

<section id="page-modals">
	<div class="modal mana-ui" tabindex="-1" role="dialog" id="registration-error-phone-duplicate">
		<div class="modal-dialog" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Registration Error
				</div>
				<div class="modal-mid font-size-16 o5">
					Nomor telefon sudah terdaftar
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-button-54 bg2333390 scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
</section>

@include('includes.mana-ui.footer-home')
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
		// register button
		$('body').on('click', '.otp-submit-btn', function(e) {
			e.preventDefault();

			var target = $('.otp-submit-btn');

			// show spinner
			$(this).addClass('loading');
		});

	})
</script>
@endsection