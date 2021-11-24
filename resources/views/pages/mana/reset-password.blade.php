@extends('layouts.mana-ui')

@section('page_title', "TimKamu - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui reset-password no-menu')


@section('content')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content">

	<!-- page header -->
	<div id="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-4">
					<h1 class="rajdhani-bold text-center">Reset Password</h1>
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
						<small class="font-size-14 o3 text-italic mt-10 d-block fw-300">Jika email terdaftar, sebuah email akan dikirimkan ke alamat diatas. Mohon click link di dalam email tersebut untuk melanjutkan proses reset password.</small>
					</div>

					<div class="form-group mana-control mt-50">
						<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-15 registration-submit-btn">
							<span class="default-text">Kirim email reset</span>
							<div class="spinner-border hw24"></div>
						</a>
						<a href="/mana/sign-in" class="mana-btn-54 mana-btn-opaque scale-onclick">Batal</a>
					</div>

				</div>
			</div> 
		</div>
	</div>

</section>

<section id="page-modals">
	
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

			target = $(this);
			target2 = $('#login-error-email-not-found');

			// show spinner
			target.addClass('loading');
		});

	})
</script>
@endsection