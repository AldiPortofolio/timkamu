@extends('layouts.mana-ui')

@section('page_title', "Reset Password")
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
    @if(!session('send-reset-success') && !session('send-reset-failed') && !$token)
    <form action="{{ url('reset-password') }}" method="post" id="form-reset-password">
        @csrf
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11 col-md-8 col-lg-4">

					<div class="form-group mana-control">
						<label class="mana-control">Alamat email</label>
						<input type="email" class="form-control mana-control" name="email">
						<small class="font-size-14 o3 text-italic mt-10 d-block fw-300">Jika email terdaftar, sebuah email akan dikirimkan ke alamat diatas. Mohon click link di dalam email tersebut untuk melanjutkan proses reset password.</small>
					</div>

					<div class="form-group mana-control mt-50">
						<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-15 registration-submit-btn">
							<span class="default-text">Kirim email reset</span>
							<div class="spinner-border hw24"></div>
						</a>
						<a href="{{ url('/sign-in') }}" class="mana-btn-54 mana-btn-opaque scale-onclick">Batal</a>
					</div>

				</div>
			</div> 
		</div>
    </form>
    @endif

    @if(session('send-reset-success') && !$token)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-md-8 col-lg-4">
                <h1 class="rajdhani-bold text-center">Email Sent</h1>
                <small class="font-size-16 o5 text-center mt-10 d-block fw-300">Silahkan cek email kamu, lalu click link di dalam email tersebut untuk melanjutkan proses reset password.</small>
            </div>
        </div> 
    </div>
    @endif

    @if($token && !session('reset-success'))
        <form action="{{ url('reset-password') }}" method="post" id="form-reset-password">
			@csrf
			<input type="hidden" name="email_reset" value="{{ $email }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-11 col-md-8 col-lg-4">

                        <div class="form-group mana-control">
                            <label class="mana-control">New password</label>
                            <input type="password" name="password" class="form-control mana-control">
                        </div>

                        <div class="form-group mana-control">
                            <label class="mana-control">Confirm new password</label>
                            <input type="password" class="form-control mana-control confirm-reset-password">
                            <span style="color: red; display:none" class="error-msg">Password not match</span>
                        </div>

                        <div class="form-group mana-control mt-50">
                            <a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-15 registration-submit-btn">
                                <span class="default-text">Reset Password</span>
                                <div class="spinner-border hw24"></div>
                            </a>
                            <a href="{{ url('/sign-in') }}" class="mana-btn-54 mana-btn-opaque scale-onclick">Batal</a>
                        </div>

                    </div>
                </div> 
            </div>
        </form>
    @endif

</section>

<section id="page-modals">
    <div class="modal mana-ui slim-card @if(session('send-reset-failed')) splash @endif" tabindex="-1" role="dialog" id="reset-error-email-not-found">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Reset Password Error
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
    

    <div class="modal mana-ui slim-card @if(session('send-reset-failed')) splash @endif" tabindex="-1" role="dialog" id="reset-error-email-not-found">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Reset Password Success
				</div>
				<div class="modal-mid font-size-16 o5">
					Kamu berhasil mengganti password kamu
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="{{ url('/') }}" class="mana-btn-54 mana-btn-red scale-onclick">Okay</a>
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
			target2 = $('#form-reset-password');

			// show spinner
			target.addClass('loading');

            setTimeout(function() {
                target2.submit();
            }, 500)
		});

	})
</script>
@endsection