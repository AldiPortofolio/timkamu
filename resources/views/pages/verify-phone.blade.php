@extends('layouts.mana-ui')

@section('page_title', "Verify nomor telefon")
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
					<h1 class="rajdhani-bold text-center">Verify Phone Number</h1>
				</div>
			</div> 
		</div>
	</div>

	<!-- form -->
    <form action="{{ url('setup-account/resend-verify') }}" method="post" id="verify-phone">
		@csrf
		<input type="hidden" name="token" value="{{ app('request')->input('token') }}">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11 col-md-8 col-lg-4">

					<div class="form-group mana-control">
						<label class="mana-control">Nomor telefon</label>
                        <input type="text" class="form-control mana-control" name="phone" value="{{ old('phone') }}">
						<small class="font-size-14 o3 text-italic mt-10 d-block fw-300">Akan digunakan untuk konfirmasi via SMS</small>
					</div>

					<div class="form-group mana-control mt-50">
						<a href="#" type="button" class="mana-btn-54 mana-btn-red has-spinner mb-15 registration-submit-btn">
							<span class="default-text">Kirim OTP</span>
							<div class="spinner-border hw24"></div>
						</a>
						<a href="#" type="button" class="mana-btn-54 mana-btn-opaque scale-onclick" data-toggle="modal" data-target="#skip-otp">Batal</a>
					</div>

				</div>
			</div> 
		</div>
    </form>

</section>

<section id="page-modals">
    <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="skip-otp">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Are you sure ?
				</div>
				<div class="modal-mid font-size-16 o5">
					<p>Are you sure you want to skip this stage? These features will not be available to you if you do not verify:</p>
                    <ul class="pl-4">
                        <li>Becoming a fan of your favorite team.</li>
                        <li>Gifting items to your favorite team.</li>
                        <li>Beri dukungan pada tim kamu pada event-event tertentu.</li>
                    </ul>
                    <p>You can always verify later in your member's profile page.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Kembali input nomor telefon</a>
                    <a href="{{ url('events') }}" class="mana-btn-54 mana-btn-opaque scale-onclick">Skip</a>
				</div>
			</div>
		</div>
	</div>
	
</section>


@include('includes.mana-ui.footer-home')


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
			target2 = $('#verify-phone');

			// show spinner
			target.addClass('loading');

            setTimeout(function() {
                target2.submit();
            }, 500)
		});

	})
</script>
@endsection