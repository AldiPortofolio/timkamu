@extends('layouts.mana-ui')

@section('page_title', "Sign up")
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
	<form action="{{ url('sign-up') }}" method="post" id="form-register">
        @csrf
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11 col-md-8 col-lg-4">

					<div class="form-group mana-control">
						<label class="mana-control">Username</label>
                        <input type="text" class="form-control mana-control" name="username" value="{{ old('username') }}">
						<span style="color: red; display:none" class="error-msg" id="reg-username-required">Username harus diisi</span>
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">Alamat email</label>
                        <input type="email" class="form-control mana-control" name="email" value="{{ old('email') }}">
                        <span style="color: red; display:none" class="error-msg" id="reg-email-required">Alamat email harus diisi</span>
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">Nomor telefon</label>
                        <input type="text" class="form-control mana-control" name="phone" value="{{ old('phone') }}" autocomplete="off">
						<small class="font-size-14 grey-10 mt-10 d-block fw-300">Akan digunakan untuk konfirmasi via SMS dan untuk mengklaim promo menarik.</small>
						<span style="color: red; display:none" class="error-msg" id="reg-phone-required">Nomor telefon harus diisi</span>
						<span style="color: red; display:none" class="error-msg" id="reg-phone-correction">Masukkan nomor telefon valid</span>
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">Buat password</label>
                        <input type="password" class="form-control mana-control" name="password">
                        <span style="color: red; display:none" class="error-msg" id="reg-password-required">Password harus diisi</span>
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">Ulangi password</label>
                        <input type="password" class="form-control mana-control" name="password_confirmation">
                        <span style="color: red; display:none" class="error-msg" id="reg-passconf-required">Ulangi password harus diisi</span>
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">Kode referral</label>
						<input type="text" class="form-control mana-control" name="referral_code">
						<small class="font-size-14 grey-10 mt-10 d-block fw-300">Opsional. Berbagai <a href="#" data-toggle="modal" data-target="#hero-promo-3">hadiah menarik</a> referral code.</small>
					</div>

					<div class="form-group mana-control mt-50">
						<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-15" id="btn-register">
							<span class="default-text">Buat Akun</span>
							<div class="spinner-border hw24"></div>
						</a>
						<a href="{{ url('sign-in') }}" class="mana-btn-54 mana-btn-opaque scale-onclick">Sign In</a>
					</div>

				</div>
			</div>
		</div>
	</form>


</section>

<section id="page-modals">
    @if(session('failed'))
    <div class="modal mana-ui splash slim-card" tabindex="-1" role="dialog" id="register-failed">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Registration Error
				</div>
				<div class="modal-mid font-size-16 o5">
					{{ session('failed') }}
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
    </div>
	@endif

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="user-max-char-error">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Registration Error
				</div>
				<div class="modal-mid font-size-16 o5">
					Username maksimal 24 karakter
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
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
{{--<script src="https://www.google.com/recaptcha/api.js?render={{ ENV('RECAPTCHA_SITE_KEY') }}"></script>--}}
<script>
    $('#btn-register').on('click', function(event) {
        event.preventDefault();

        var input = 0;
        $('.form-control.mana-control').each(function() {
            var value = $(this).val();
            if(value === '') {
                $(this).closest('div.form-group').find('span.error-msg').show();
            } else {
                input += 1;
            }
		})

		var username = $('input[name=username]').val();
		if(username.length > 24) {
			$('#user-max-char-error').modal('show');

			return false;
		}

        if(parseInt(input) >= ($('.form-control.mana-control').length - 1)) {
            $(this).addClass('loading');
            // $('#form-register').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
            $('#form-register').submit();
        }
    })

    $('.form-control.mana-control').on('keyup', function(e) {
        e.preventDefault();

        var value = $(this).val();
        if(value === '') {
            $(this).closest('div.form-group').find('span.error-msg').show();
        } else {
            $(this).closest('div.form-group').find('span.error-msg').hide();
        }
    })

	function validatePhone(phoneValue) {
		var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
		if (filter.test(phoneValue)) {
			return true;
		}
		else {
			return false;
		}
	}
</script>
@endsection
