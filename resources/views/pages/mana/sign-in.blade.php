@extends('layouts.mana-ui')

@section('page_title', "TimKamu - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui sign-in no-menu')


@section('content')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content">

	<!-- page header -->
	<div id="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-4">
					<h1 class="rajdhani-bold text-center">Selamat Datang</h1>
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
						<label class="mana-control">Alamat email</label>
						<input type="email" class="form-control mana-control">
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">Password</label>
						<input type="password" class="form-control mana-control">
					</div>

					<div class="form-group mana-control">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="tkmu-remember-me">
					    	<label class="form-check-label" for="tkmu-remember-me">Remember me</label>
						</div>
					</div>

					<div class="form-group mana-control mt-50">
						<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-15 registration-submit-btn">
							<span class="default-text">Sign In</span>
							<div class="spinner-border hw24"></div>
						</a>
						<a href="/mana/sign-up" class="mana-btn-54 mana-btn-opaque scale-onclick">Registrasi Akun Baru</a>
					</div>

					<div class="form-group mana-control mt-20">
						<div class="scmd-login-wrapper d-flex align-items-center justify-content-start">
							<div class="scmd-btn gg"><img src="{{ asset('img/social/gg.svg') }}"></div>
							<div class="scmd-btn fb"><img src="{{ asset('img/social/fb.svg') }}"></div>
							<div class="scmd-btn tw"><img src="{{ asset('img/social/tw.svg') }}"></div>
						</div>
					</div>

					<div class="form-group mana-control mt-40">
						<a href="/mana/reset-password">Lupa password?</a>
					</div>

				</div>
			</div> 
		</div>
	</div>

</section>

<section id="page-modals">
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="login-error-email-not-found">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Login Error
				</div>
				<div class="modal-mid font-size-16 o5">
					Email tidak terdaftar
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
</section>


@include('includes.mana-ui.footer-home')
@include('includes.mana-ui.modals')


<style type="text/css">
	/*page specific*/

	.scmd-btn {
	    border-radius: 50px;
	    padding: 10px;
	    flex: 0 0 46px;
	    height: 46px;
	    margin-right: 10px;
	    cursor: pointer;
	}
	.scmd-btn.gg {background: #fff;}
	.scmd-btn.tw {background: #55adf5;}
	.scmd-btn.fb {background: #375398;}
	
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

			target = $(this);
			target2 = $('#login-error-email-not-found');

			// show spinner
			target.addClass('loading');
		});

	})
</script>
@endsection