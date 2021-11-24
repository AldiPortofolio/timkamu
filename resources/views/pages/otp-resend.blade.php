@extends('layouts.mana-ui')

@section('page_title', "Verifikasi OTP")
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
					<h1 class="rajdhani-bold text-center">SMS OTP Resent</h1>
				</div>
			</div> 
		</div>
	</div>

	<!-- form -->
    <form method="get" action="{{ url('sign-up/verify') }}" id="form-verify">
        @csrf
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11 col-md-8 col-lg-4">

					<p class="grey-10 text-justify">Sebuah sms OTP sudah dikirimkan ke nomor handphone yang terdaftar. Input kode OTP di bawah ini untuk verifikasi nomor handphone.</p>

					<div class="form-group mana-control">
						<label class="mana-control">OTP Code</label>
                        <input type="text" class="form-control mana-control otp-code" name="otpCode">
                        <small id="otp-required" class="font-size-14 o9 mt-10 fw-300" style="color: red; display:none">OTP code required</small>
                        <small class="font-size-14 o3 text-italic text-center mt-10 d-block fw-300">Kode akan expire dalam waktu <span id="time"></span></small>
					</div>

					<div class="form-group mana-control mt-50">
						<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-15 otp-submit-btn">
							<span class="default-text">Verifikasi</span>
							<div class="spinner-border hw24"></div>
						</a>
					</div>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-toggle="modal" data-target="#skip-otp">Skip this step</a>

				</div>
			</div> 
		</div>
	</form>

	
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

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="skip-otp">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Are you sure ?
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Are you sure you want to skip this stage? These features will not be available to you if you do not verify:</p>
                    <ul class="pl-4">
                        <li>Becoming a fan of your favorite team.</li>
                        <li>Gifting items to your favorite team.</li>
                        <li>Beri dukungan pada tim kamu pada event-event tertentu.</li>
                    </ul>
                    <p>You can always verify later in your member's profile page.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
                    <a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Kembali input OTP</a>
                    <a href="{{ url('events') }}" class="mana-btn-54 mana-btn-opaque scale-onclick">Skip</a>
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

            var otpCode = $('#form-verify .otp-code').val();
            if(otpCode === '') {
                $('#otp-required').show();
            } else {
                target.addClass('loading');
                setTimeout(function(){
                    $('#form-verify').submit();
                }, 500);
            }
		});

	})
</script>
<script>
    $('#form-verify .otp-code').on('keyup change', function(e) {
        var otpCode = $('#form-verify .otp-code').val();

        if(otpCode === '') {
            $('#otp-required').show();
        } else {
            $('#otp-required').hide();
        }
    })
</script> 

<script>
    generalCountdown("{{ \Carbon\Carbon::parse($timer)->format('M d, Y H:i:s') }}");
    function generalCountdown(futureDate){
        // Set the date we're counting down to
        var countDownDate = new Date(futureDate).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("time").innerHTML = minutes + ':' +seconds;

            // If the count down is finished, write some text
            if (distance < 0) {
            clearInterval(x);
            document.getElementById("time").innerHTML = "";
            }
        }, 1000);
    }
</script>
@endsection