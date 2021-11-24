@extends('layouts.mana-ui')

@section('page_title', "Resend Verify")
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
					<h1 class="rajdhani-bold text-center">Resend Verify</h1>
				</div>
			</div> 
		</div>
	</div>

	<!-- form -->
    <form method="post" action="{{ url('sign-up/resend-verify') }}" id="resend-verify">
        @csrf
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11 col-md-8 col-lg-4">

					<div class="form-group mana-control">
						<label class="mana-control">Alamat Email</label>
						<input type="email" class="form-control mana-control" name="email">
						<small class="font-size-14 o3 text-italic mt-10 d-block fw-300">Jika email terdaftar, sebuah email akan dikirimkan ke alamat diatas. Mohon click link di dalam email tersebut untuk melanjutkan proses reset password.</small>
					</div>

					<div class="form-group mana-control mt-50">
						<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-15 registration-submit-btn">
							<span class="default-text">Kirim email reset</span>
							<div class="spinner-border hw24"></div>
						</a>
						<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-toggle="modal" data-target="#skip-otp">Batal</a>
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
                    <a href="{{ Auth::user() ? url('events') : url('sign-in') }}" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">{{ Auth::user() ? 'Nanti lagi' : 'Skip & Login' }}</a>
                    <a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Kembali input nomor telefon</a>
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
			target2 = $('#resend-verify');

			// show spinner
			target.addClass('loading');

            setTimeout(function() {
                target2.submit();
            }, 500)
		});

	})
</script>
@endsection