@extends('layouts.mana-ui')

@section('page_title', "My Dashboard")
@section('body_class', 'mana-ui my-profile')


@section('content')
@include('includes.mana-ui.effects')
@include('includes.mana-ui.nav')


<!-- page content -->
<section id="page-content">

	<!-- page header -->
	<div id="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<h1 class="rajdhani-bold">My Dashboard</h1>
				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<div id="lp-exp-bar" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="section-title position-relative">
						<h4 class="font-size-18 mb-20">Level kamu saat ini</h4>
						<a href="/mana/top-up-index" class="o5 section-title-meta-link font-size-14" data-toggle="modal" data-target="#lp-help">Mengenai LP</a>
					</div>
					<div class="lp-exp-wrapper">
						<div class="lp-exp-bar-container mb-20">
							<div class="lp-exp-bg-bar">
								<div class="lp-exp-gained-bar"></div>
								<div class="lp-exp-stats">
                                    @if($total_exp - $current_rank->value > $next_rank->value - $current_rank->value)
                                    1000 / 1000
                                    @else
                                    {{ $total_exp - $current_rank->value }} / {{ $next_rank->value - $current_rank->value  }}
                                    @endif
                                </div>
							</div>
						</div>
						<div class="lp-exp-ranks-container">
							<div class="lp-exp-ranks-left">
                                @if($current_rank->logo)<img src="{{ asset($current_rank->logo) }}" class="lp-exp-ranks-icon">@endif
								<div class="lp-exp-ranks-name poetsenone-reg">{{ $current_rank->name }}</div>
                            </div>
                            @if($total_exp - $current_rank->value < $next_rank->value - $current_rank->value)
							<div class="lp-exp-ranks-right">
								<div class="lp-exp-ranks-name poetsenone-reg">{{ $next_rank->name }}</div>
								<img src="{{ asset($next_rank->logo) }}" class="lp-exp-ranks-icon">
                            </div>
                            @endif
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>

	<div class="system-mail-wrapper mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="section-title position-relative">
						<h4 class="font-size-18 mb-20">Promo</h4>
					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center cursor-ptr" id="copy-referral-profile">
							<div class="info-horizontal-left o5">Kode referral</div>
							<div class="info-horizontal-right text-right">{{ $referral_code }}</div>
						</div>
						<div class="info-horizontal-adds text-right mb-10">
							<a href="#" data-toggle="modal" data-target="#hero-promo-3">
								<small class="font-size-14">Mengenai promo kode referral</small>
							</a>
						</div>
						<input type="text" value="{{ $referral_code }}" id="copy-referral-input-profile" style="top: -90000px;position: absolute;">
					</div>

				</div>
			</div> 
		</div>
	</div>

	<!-- event index filters -->
	<div class="system-mail-wrapper mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<h4 class="font-size-18 mb-20">Informasi Akun</h4>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">User ID</div>
							<div class="info-horizontal-right text-right">{{ $user->account_number }}</div>
						</div>
					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Username</div>
							<div class="info-horizontal-right text-right">{{ $user->username }}</div>
						</div>
					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Email</div>
							<div class="info-horizontal-right text-right">{{ $user->email }}</div>
						</div>
						@if($user->email_verified)
						<div class="info-horizontal-adds text-right mb-10">
							<small class="font-size-14 o3 text-italic">Email sudah terverifikasi</small>
						</div>
						@else
						<div class="info-horizontal-adds text-right mb-10">
							<a href="#" data-toggle="modal" data-target="#send-email-verification">
								<small class="font-size-14 grey-10 text-italic">Email belum terverifikasi. <span class="white-09">Verify sekarang</span></small>
							</a>
						</div>
						@endif
					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Handphone</div>
							<div class="info-horizontal-right text-right">+62{{ $user->phone }}</div>
						</div>
						@if($user->phone_verified)
						<div class="info-horizontal-adds text-right mb-10">
							<small class="font-size-14 o3 text-italic">Nomor sudah terverifikasi</small>
						</div>
						@else
						<div class="info-horizontal-adds text-right mb-10">
							<a href="@if($user->phone!== NULL)#@else{{ url('setup-account/resend-verify') }}@endif" @if($user->phone !== NULL)data-toggle="modal" data-target="#send-phone-verification"@endif>
								<small class="font-size-14 grey-10 text-italic">Nomor belum terverifikasi. <span class="white-09">Verify sekarang</span></small>
							</a>
						</div>
						@endif
					</div>

				</div>
			</div> 
		</div>
	</div>

	<div class="system-mail-wrapper mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<h4 class="font-size-18 mb-20">LP & BP</h4>
					
					<div class="dashboard-info-group mb-10">
						<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-toggle="modal" @if($bp_quest_done) data-target="#bp-lp-convert-modal" @else data-target="#locked-feature" @endif>Convert&nbsp;&nbsp;<span class="money money-14 right money-inline"><span class="fw-300">BP</span><img src="{{ asset('img/currencies/bp.svg') }}"></span>&nbsp;&nbsp;to&nbsp;&nbsp;<span class="money money-14 right money-inline"><span class="fw-300">LP</span><img src="{{ asset('img/currencies/lp.svg') }}"></span></a>
					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Saldo LP</div>
							<div class="info-horizontal-right text-right">
								<span class="money money-14 right"><span class="amt-lp">{{ number_format($total_lp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/lp.svg') }}"></span>
							</div>
						</div>
					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Saldo BP</div>
							<div class="info-horizontal-right text-right">
								<span class="money money-14 right"><span class="amt-bp">{{ number_format($total_bp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/bp.svg') }}"></span>
							</div>
						</div>
					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Total LP recharge</div>
							<div class="info-horizontal-right text-right">
								<span class="money money-14 right"><span>{{ number_format($total_recharge_lp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/lp.svg') }}"></span>
							</div>
						</div>
					</div>

					<div class="dashboard-info-group mb-10">
						<a href="{{ url('profile/transaction?name=lp') }}">
							<div class="info-horizontal link bg020 bd20 d-flex align-items-center justify-content-center scale-onclick">
								<div class="info-horizontal-left o5">Catatan Transaksi</div>
								<div class="info-horizontal-right text-right">
									<i data-feather="chevron-right" class="icon o3"></i>
								</div>
							</div>
						</a>
					</div>

				</div>
			</div> 
		</div>
	</div>

	<!-- event index filters -->
	<div class="system-mail-wrapper mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<h4 class="font-size-18 mb-20">Statistik Akun</h4>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Total prediksi</div>
							<div class="info-horizontal-right text-right">{{ number_format($prediction, 0, '.', ',') }}</div>
						</div>
					</div>

					<div class="dashboard-info-group mb-10">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center">
							<div class="info-horizontal-left o5">Prediksi benar</div>
							<div class="info-horizontal-right text-right">{{ number_format($correct_prediction, 0, '.', ',') }}</div>
						</div>
					</div>

				</div>
			</div> 
		</div>
	</div>

</section>

<section id="page-modals">
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="send-email-verification">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Verifikasi email
				</div>
				<div class="modal-mid grey-10">
					Kirimkan email verifikasi ke alamat email yang terdaftar?
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red email-verify-do has-spinner">
						<span class="default-text">Kirim verifikasi email</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card @if(session('success') === 'success-resend-email')) splash @endif" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            
            <div class="modal-content">
                @include('includes.mana-ui.modal-top')
                <div class="modal-about rajdhani-bold font-size-32">
                    Verifikasi email terkirim
                </div>
                <div class="modal-mid font-size-16 o5">
                    Email verifikasi telah terkirim ke alamat yang didaftarkan. Jika dalam 10-20 menit tidak menerima, cek folder spam/junk atau hubungi customer service kami. 
                </div>
                <div class="modal-actions d-flex flex-column">
                    <a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
                </div>
            </div>
        </div>
    </div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="send-phone-verification">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Verifikasi nomor telefon
				</div>
				<div class="modal-mid grey-10">
					Kirimkan sms OTP verifikasi ke nomor telefon yang terdaftar?
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="{{ url('resend-otp-phone') }}" class="mana-btn-54 mana-btn-red otp-verify-do has-spinner">
						<span class="default-text">Kirim verifikasi nomor telefon</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="bp-lp-convert-modal">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<div class="odds-nominal-enter mb-20">
						<label class="mana-control grey-10">Jumlah <span class="money money-14 right white-09 money-inline white-10">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> yang dikonversi ke <span class="money money-14 right white-09 money-inline white-10">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span></label>
					    <input type="number" class="form-control mana-control nominal-convert" value="9">
					</div>
					<div class="odds-return-info position-relative bd50 bg040 mb-10">
						<div class="odds-return-info-left o5">Saldo LP</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 right white-09 top-01"><span class="amt-lp">{{ number_format($total_lp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/lp.svg') }}"></span>
						</div>
					</div>
					<div class="odds-return-info position-relative bd50 bg040">
						<div class="odds-return-info-left o5">Saldo BP</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 right white-09 top-01"><span class="amt-bp">{{ number_format($total_bp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/bp.svg') }}"></span>
						</div>
					</div>
				</div>
				
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red convert-bp-lp-btn has-spinner">
						<span class="default-text">Convert</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="coins-lp-convert-modal">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<div class="odds-nominal-enter mb-20">
						<label class="mana-control grey-10 mb-10">Jumlah <span class="money money-14 right white-09 money-inline white-10">Coins<img src="{{ asset('img/currencies/coin.svg') }}"></span> yang dikonversi ke <span class="money money-14 right white-09 money-inline white-10">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span></label>
					    <input type="number" class="form-control mana-control nominal-convert" value="9">
					</div>
					<div class="odds-return-info position-relative bd50 bg040 mb-10">
						<div class="odds-return-info-left o5">Saldo LP</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 right white-09 top-01"><span class="amt-lp">{{ number_format($total_lp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/lp.svg') }}"></span>
						</div>
					</div>
					<div class="odds-return-info position-relative bd50 bg040">
						<div class="odds-return-info-left o5">Saldo Coin</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 right white-09 top-01"><span class="amt-coin">{{ number_format($total_coin, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/coin.svg') }}"></span>
						</div>
					</div>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red convert-coin-lp-btn has-spinner">
						<span class="default-text">Convert</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	@if(session('success-recharge-bp'))
	<div class="modal mana-ui slim-card splash" tabindex="-1" role="dialog" id="bp-lp-convert-success">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Konversi berhasil
				</div>
				<div class="modal-mid grey-10">
					Konversi berhasil dengan nilai <span class="money money-14 right white-09 money-inline white-10">{{ session('success-recharge-bp') }}<img src="{{ asset('img/currencies/bp.svg') }}"></span> menjadi <span class="money money-14 right white-09 money-inline white-10">{{ session('success-recharge-bp') }}<img src="{{ asset('img/currencies/lp.svg') }}"></span>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	@endif

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-convert-error">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error
				</div>
				<div class="modal-mid font-size-16 o5">
					<p id="modal-convert-error-msg"></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal" data-toggle="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
</section>

@include('includes.mana-ui.footer')


<style type="text/css">
</style>
<style type="text/css">
	/*media*/
	
</style>
@endsection

@section('js')
<script>
	var totalBP = "{{ $total_bp }}";
	var totalLP = "{{ $total_bp }}";
	$(document).ready(function() {
		
		// page specific scripts
		$('.otp-verify-do').on('click', function(e) {
			e.preventDefault();

			$(this).addClass('loading');
			
			setTimeout(function() {
				var url = "{{ url('resend-otp-phone') }}";
				location.href = url;
			}, 1000);
		})

		$('.email-verify-do').on('click', function(e) {
			e.preventDefault();

			$(this).addClass('loading');
			
			setTimeout(function() {
				var url = "{{ url('resend-otp') }}";
				location.href = url;
			}, 1000);  
		})

		$('body').on('click', '.convert-bp-lp-btn', function(e) {
			e.preventDefault();

			var target = $('#bp-lp-convert-modal');

			var nominal = target.find('.nominal-convert').val();

			if(parseInt(totalBP) < parseInt(nominal)) {
				target.modal('hide');
				
				$('#modal-convert-error').modal('show').find('#modal-convert-error-msg').text('Jumlah melebihi BP yang kamu punya');
				$('#modal-convert-error .mana-btn-54').attr('data-target', '#bp-lp-convert-modal');

				return false;
			} else if(parseInt(nominal) === 0 || nominal === '') {
				target.modal('hide');
				
				$('#modal-convert-error').modal('show').find('#modal-convert-error-msg').text('Jumlah tidak boleh kosong');
				$('#modal-convert-error .mana-btn-54').attr('data-target', '#bp-lp-convert-modal');

				return false;
			} else if(parseInt(nominal) % 9 !== 0) {
				target.modal('hide');
				
				$('#modal-convert-error').modal('show').find('#modal-convert-error-msg').text('Convert BP to LP hanya dalam kelipatan 9');
				$('#modal-convert-error .mana-btn-54').attr('data-target', '#bp-lp-convert-modal');

				return false;
			}
		

			// show spinner
			$(this).addClass('loading');

			setTimeout(function() {
			    var urlString = ("{{ url('purchase?name=bp&nominal=') }}" + parseInt(nominal)).replace(/&amp;/g, '&');
	            location.href = urlString
			}, 1000);  
		});

	})
</script>
@endsection