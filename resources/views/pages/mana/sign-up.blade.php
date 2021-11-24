@extends('layouts.mana-ui')

@section('page_title', "TimKamu - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui sign-in no-menu')


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
					<h1 class="rajdhani-bold text-center">Registrasi Akun</h1>
				</div>
			</div> 
		</div>
	</div>

	<!-- form -->
	<div id="registration-form">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11 col-md-8 col-lg-4">

					<div class="form-group mana-control">
						<label class="mana-control">Username</label>
						<input type="text" class="form-control mana-control">
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">Alamat email</label>
						<input type="email" class="form-control mana-control">
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">Nomor telefon</label>
						<input type="text" class="form-control mana-control">
						<small class="font-size-14 grey-10 mt-10 d-block fw-300">Akan digunakan untuk konfirmasi via SMS dan untuk mengklaim promo menarik.</small>
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">Buat password</label>
						<input type="password" class="form-control mana-control">
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">Ulangi password</label>
						<input type="password" class="form-control mana-control">
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">Kode referral</label>
						<input type="password" class="form-control mana-control">
						<small class="font-size-14 grey-10 mt-10 d-block fw-300">Opsional. Berbagai <a href="#" data-toggle="modal" data-target="#hero-promo-3">hadiah menarik</a> referral code.</small>
					</div>

					<div class="form-group mana-control mt-50">
						<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-15 registration-submit-btn">
							<span class="default-text">Buat Akun</span>
							<div class="spinner-border hw24"></div>
						</a>
						<a href="/mana/sign-in" class="mana-btn-54 mana-btn-opaque scale-onclick">Sign In</a>
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
		$('body').on('click', '.registration-submit-btn', function(e) {
			e.preventDefault();

			var target = $('.registration-submit-btn');

			// show spinner
			$(this).addClass('loading');
		});

	})
</script>
@endsection