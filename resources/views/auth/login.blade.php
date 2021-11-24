@extends('layouts.mana-ui')

@section('page_title', "Sign In")
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
				<div class="col-md-8 col-lg-4">
					<h1 class="rajdhani-bold text-center">Selamat Datang</h1>
				</div>
			</div>
		</div>
	</div>

	<!-- form -->
    <form id="form-login" action="{{ Request::is('admin-tkmu/sign-in') ? url('admin-tkmu/sign-in') : url('sign-in') }}" method="POST">
        @csrf
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11 col-md-8 col-lg-4">

					<div class="form-group mana-control">
						<label class="mana-control">Alamat email</label>
                        <input type="email" class="form-control mana-control" name="username">
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">Password</label>
                        <input type="password" class="form-control mana-control input-password" name="password">
					</div>

					<div class="form-group mana-control">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="tkmu-remember-me" name="remember_me">
					    	<label class="form-check-label" for="tkmu-remember-me">Remember me</label>
						</div>
					</div>

					<div class="form-group mana-control mt-50">
						<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-15" id="btn-login">
							<span class="default-text">Sign In</span>
							<div class="spinner-border hw24"></div>
                        </a>
                        @if(!Request::is('admin-tkmu') && !Request::is('admin-tkmu/*'))
                        <a href="{{ url('sign-up') }}" class="mana-btn-54 mana-btn-opaque scale-onclick">Registrasi Akun Baru</a>
                        @endif
					</div>

                    @if(!Request::is('admin-tkmu') && !Request::is('admin-tkmu/*'))
                        <div class="form-group mana-control mt-40">
                            <a href="{{ url('reset-password') }}">Lupa password?</a>
                        </div>
                    @endif

				</div>
			</div>
		</div>
	</form>

</section>

<section id="page-modals">
	@if(session('failed'))
	<div class="modal mana-ui splash slim-card" tabindex="-1" role="dialog" id="login-error-email-not-found">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Login Error
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
</section>


@include('includes.mana-ui.footer-home')


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
    $('.input-password').keypress(function(e){
        if(e.which == 13){
            $('#btn-login').click();//Trigger search button click event
        }
    });

    $('.scmd-btn').on('click', function(e) {
        e.preventDefault();

        var url = $(this).attr('data-url');
        location.href = url;
    })
</script>
{{-- page specific scripts --}}
@if(Request::is('admin-tkmu/*'))
<script>
    $('#btn-login').on('click', function(e) {
        $(this).addClass('loading');
        $('#form-login').submit();
    });
</script>
@else
<script src="https://www.google.com/recaptcha/api.js?render={{ ENV('RECAPTCHA_SITE_KEY') }}"></script>
<script>
    $('#btn-login').on('click', function(e) {
        $(this).addClass('loading');
        {{--grecaptcha.ready(function() {--}}
        {{--    grecaptcha.execute("{{ ENV('RECAPTCHA_SITE_KEY') }}", {action: 'login'}).then(function(token) {--}}
        {{--        // Add your logic to submit to your backend server here.--}}
        {{--        $('#form-login').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');--}}
        {{--        $('#form-login').submit();--}}
        {{--    });--}}
        {{--});--}}

        $('#form-login').submit();

    });
</script>
@endif
@endsection
