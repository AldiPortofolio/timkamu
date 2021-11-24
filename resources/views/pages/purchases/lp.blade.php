@extends('layouts.mana-ui')

@section('page_title', "Recharge LP")
@section('body_class', 'mana-ui mana-home')


@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<?php
    $nominals = [
        9,
        18,
        45,
        225,
        450,
        900,
        1350,
        1800
    ];
?>

<!-- page content -->
<section id="page-content">

	<div id="home-promo-cards">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<!-- other promo -->
					<img src="{{ asset('img/promos/ig-cashback-insert.jpg') }}" class="bd20 w-100 cursor-ptr mb-20 scale-onclick" data-toggle="modal" data-target="#hero-promo-1">

				</div>
			</div>
		</div>
	</div>

	<!-- page section -->
	@guest
	<div id="about-lp-for-guest" class="mb-20">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-toggle="modal" data-target="#lp-help">Mengenai LP</a>
				</div>
			</div>
		</div>
	</div>
	@else
	<div id="about-vip-for-guest-and-member" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-toggle="modal" data-target="#vip-help">Mengenai Akun VIP</a>
				</div>
			</div>
		</div>
	</div>
	<div id="lp-exp-bar" class="mb-50 mt-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="section-title position-relative">
						<h4 class="font-size-18 mb-20">Level kamu saat ini</h4>
						<a href="#" class="o5 section-title-meta-link font-size-14" data-toggle="modal" data-target="#lp-help">Mengenai LP</a>
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
	@endguest

	<!-- page section -->
	<div id="lp-nominal-choice" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="section-title position-relative">
						<h4 class="font-size-18 mb-20">Pilih nominal recharge</h4>
						<a href="/mana/top-up-index" class="o5 section-title-meta-link font-size-14" data-toggle="modal" data-target="#lp-exchange-rate">Exchange Rate</a>
					</div>
					<div class="lp-nominals-container d-flex flex-wrap align-items-center justify-content-start mb-20">
						@foreach ($nominals as $key => $value)
							<div class="lp-nominal lp-nominal-btn scale-onclick" data-value="{{ $value }}">
								<div class="lp-nominal-inner bd20 d-flex justify-content-center">
									<span class="money money-14 right">{{ number_format($value, 0, '.', ',') }}<img src="{{ asset('img/currencies/lp.svg') }}"></span>
								</div>
							</div>
						@endforeach
						<div class="lp-nominal lp-nominal-btn scale-onclick recharge-lp-custom-nominal-btn" data-value="0">
							<div class="lp-nominal-inner bd20 d-flex justify-content-center">
								<span class="money money-14 right">Custom</span>
							</div>
						</div>
					</div>

					<div class="form-group mana-control recharge-lp-custom-nominal-form">
						<label class="mana-control">Masukkan nominal</label>
						<input type="number" class="form-control mana-control custom-nominal">
						<small class="font-size-14 grey-10 mt-10 d-block fw-300">Minimal 1 dan maksimum 2,000 LP</small>
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">BP yang didapat dari Promo Cashback 10% BP:</label>
						<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-toggle="modal" data-target="#hero-promo-5">
							<span class="money money-14 right fw-400"><span id="amt-bp-cashback">0</span><img src="{{ asset('img/currencies/bp.svg') }}"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- page section -->
	<div id="shop-item-shelf" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<h4 class="font-size-18 mb-20">Pilih metode pembayaran</h4>

					<div class="pg-shelf-container d-flex flex-wrap align-items-center">

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="gopay">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/gopay.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 0
								</div>
							</div>
						</div>

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="dana">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/dana.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 0
								</div>
							</div>
						</div>

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="ovo">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/ovo.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 0
								</div>
							</div>
						</div>

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="shopee">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/shopee-pay.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 0
								</div>
							</div>
                        </div>

                        @if(ENV('APP_ENV') === 'local' || ENV('APP_ENV') === 'dev')
						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="bypass">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name black-08 fw-800">
									bypass
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 0
								</div>
							</div>
						</div>
						@endif

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- page section -->
	<div id="shop-form shop-form-mlbb" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="form-group mana-control">
						<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-20 buy-diamond-btn">
							<span class="default-text">Beli</span>
							<div class="spinner-border hw24"></div>
						</a>
					</div>

				</div>
			</div>
		</div>
	</div>

</section>

<style type="text/css">
	.recharge-lp-custom-nominal-form {
		display: none;
	}
	.recharge-lp-custom-nominal-form.active {
		display: block;
	}
	.lp-nominals-container {
		margin-left: -5px;
	    margin-right: -5px;
	}
	.lp-nominal {
		flex: 0 0 33.33%;
		padding: 5px;
		cursor: pointer;
	}
	.lp-nominal-inner {
		background: rgb(0 0 0 / 0.2);
		flex: 1 1 50%;
		line-height: 54px;
		padding: 0 15px;
	}
	.lp-nominal:hover .lp-nominal-inner {
		background: rgb(0 0 0 / 0.4);
	}
	.lp-nominal.active .lp-nominal-inner {
		background: rgb(255 255 255 / 0.2);
	}
</style>

<section id="page-modals">
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="lp-exchange-rate">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					LP Exchange Rate
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>LP Purchase Rates: <span class="money money-14 money-inline white-09">Rp 1,000</span> = <span class="money money-14 right money-inline white-09">1<img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
    </div>

    <div class="modal mana-ui slim-card @if(session('failed') === 'purchase-require-phone-verify') splash @endif" tabindex="-1" role="dialog" id="modal-error-msg">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error pembelian
				</div>
				<div class="modal-mid font-size-16 o5">
					<p class="message-error">@if(session('failed') === 'purchase-require-phone-verify') Nominal maksimum 2,000. @endif</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
    </div>

    <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="need-login">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error pembelian
				</div>
				<div class="modal-mid font-size-16 o5">
					<p class="message-error">
                        Kamu butuh login untuk melakukan itu.
                    </p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" id="btn-need-login" data-dismiss="modal">Sign in</a>
				</div>
			</div>
		</div>
    </div>

    <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="need-verification">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error pembelian
				</div>
				<div class="modal-mid font-size-16 o5">
					<p class="message-error">
                        Kamu butuh verifikasi nomor telefon untuk melakukan itu.
                    </p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" id="btn-need-verification" data-dismiss="modal">Verification now</a>
				</div>
			</div>
		</div>
    </div>

    @if(session('success-recharge-rank'))
    <div class="modal mana-ui slim-card splash" tabindex="-1" role="dialog" id="naik-level">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Quest Completed
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Selamat, kamu telah menyelesaikan quest <span class="white-10">"Naik level"</span> dengan hadiah <span class="money money-14 right money-inline white-10">{{ (explode('-',session('success-recharge-rank'))[1]) * 10 }}<img src="{{ asset('img/currencies/coin.svg') }}"></span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" id="btn-recharge-lp-level-up" data-recharge="{{ explode('-',session('success-recharge-rank'))[0] }}">Okay</a>
				</div>
			</div>
		</div>
    </div>
    @endif

	<div class="modal mana-ui slim-card @if(session('success-recharge-lp')) splash @endif" tabindex="-1" role="dialog" id="success-recharge-lp">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Terima kasih
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Pembelian <span class="money money-14 right money-inline white-09"><span class="amt">{{ session('success-recharge-lp') }}</span><img src="{{ asset('img/currencies/lp.svg') }}"></span> berhasil.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
</section>

@include('includes.mana-ui.footer')


<style type="text/css">
	/*page specific*/

</style>
<style type="text/css">
	/*media*/

</style>
@endsection

@section('js')
<script>
    var user = "{{ Auth::id() }}";
	var verify = "{{ Auth::id() ? Auth::user()->phone_verified : '' }}";
	var phone = "{{ Auth::id() ? Auth::user()->phone : '' }}"
    var amount = 0;
    var paymentType = '';
	$(document).ready(function() {

		// page specific scripts

		// nominal button
		$('body').on('click', '.lp-nominal-btn', function(e) {
			e.preventDefault();

			var target = $(this);
			var target2 = $('.lp-nominal-btn');
			var target3 = $('.recharge-lp-custom-nominal-form');

            amount = target.attr('data-value');
			var price = amount * 1000;

			var cashbackPotential = parseInt(amount) * 0.1;
			var whole = parseInt(cashbackPotential);
			var frac = parseFloat(cashbackPotential) - whole;
            console.log(cashbackPotential);
            console.log(whole);
            console.log(frac);
			if(frac > 0 && frac < 0.8) {
				frac = Math.floor(cashbackPotential);
			} else if(frac > 0.7) {
				frac = Math.ceil(cashbackPotential);
			} else {
				frac = cashbackPotential;
			}
            console.log(frac);
            $('#amt-bp-cashback').text(parseInt(frac));

            $('.pg-price').text(convertToRupiah(parseInt(price)));

			target2.removeClass('active');
			target.addClass('active');
			target3.removeClass('active');
		});

		$('body').on('click', '.recharge-lp-custom-nominal-btn', function(e) {
			e.preventDefault();

			var target = $(this);
			var target2 = $('.recharge-lp-custom-nominal-form');

			target2.addClass('active');
			target2.find('input').focus();
		});

		$('body').on('keyup', '.custom-nominal', function(e) {
			e.preventDefault();

			amount = $(this).val() || 0;
			var price = amount * 1000;

			var cashbackPotential = parseInt(amount) * 0.1;
			var whole = parseInt(cashbackPotential);
			var frac = parseFloat(cashbackPotential) - whole;
			console.log(cashbackPotential);
            console.log(whole);
            console.log(frac);

            if(frac > 0 && frac < 0.8) {
				frac = Math.floor(cashbackPotential);
			} else if(frac > 0.7) {
				frac = Math.ceil(cashbackPotential);
			} else {
				frac = cashbackPotential;
			}
            console.log(frac);

            $('#amt-bp-cashback').text(parseInt(frac));

            $('.pg-price').text(convertToRupiah(parseInt(price)));
		})

		// pg button
		$('body').on('click', '.pg-choice-btn', function(e) {
			e.preventDefault();

			var target = $(this);
            var target2 = $('.pg-choice-btn');

            paymentType = target.attr('data-value')

			target2.removeClass('active');
			target.addClass('active');
		});

		// beli button
		$('body').on('click', '.buy-diamond-btn', function(e) {
			e.preventDefault();

            var target = $(this);

            if(user === '') {
                $('#need-login').modal('show');

                return false;
            } else if(verify === '0') {
                $('#need-verification').modal('show');

                return false;
            } else if(parseInt(amount) === 0) {
                $('#modal-error-msg').modal('show').find('p.message-error').text('Kamu belum memilih nominal');

                return false;
            } else if(parseInt(amount) > 2000) {
				$('#modal-error-msg').modal('show').find('p.message-error').text('Nominal maksimum 2,000 LP');

				return false;
			} else if(paymentType === '') {
                $('#modal-error-msg').modal('show').find('p.message-error').text('Kamu belum memilih metode pembayaran');

				return false;
			}

			// show spinner
            $(this).addClass('loading');

            setTimeout(function(){
                $(this).removeClass('loading');
                if(paymentType === 'bypass') {
                    var urlString = ("{{ url('purchase?name=lp&nominal=') }}" + parseInt(amount)).replace(/&amp;/g, '&');
                    location.href = urlString
                } else {
                    $.ajax({
                        url: "{{ url('ajax/get-token-transaction') }}",
                        method: "GET",
                        data : {
                            name : 'lp',
                            payment_method: paymentType,
                            nominal : parseInt(amount)
                        },
                        success : function(response) {
                            if(response.status && response.status === 'error' && response.message === 'maks 2000') {
                                $('#modal-error-msg').modal('show').find('p.message-error').text('Nominal maksimum 2,000 LP.')
                            } else if(response.status && response.status === 'error') {
                                $('#modal-error-msg').modal('show').find('p.message-error').text('Terjadi error. Silahkan coba beberapa saat lagi.')
                            } else {
                                var res = JSON.parse(response);
                                snap.pay(res.token);
                            }

                        }
                    })
                }
			}, 1000);
		});

    })

    // redirect to verifikasi phone number
    $('#btn-need-login').on('click', function(e) {
        e.preventDefault();

        $('#need-login').modal('hide');
        location.href="{{ url('sign-in') }}";
    })
    // end of redirect to verifikasi phone number

    // redirect to verifikasi phone number
    $('#btn-need-verification').on('click', function(e) {
        e.preventDefault();

		$('#need-verification').modal('hide');
		if(phone === '' || phone === null) {
			location.href="{{ url('setup-account/resend-verify') }}";
		} else {
			location.href="{{ url('resend-otp-phone') }}";
		}
    })
    // end of redirect to verifikasi phone number

    // close modal rank level up
    $('#btn-recharge-lp-level-up').on('click', function(event) {
        event.preventDefault();

        var nominal = $(this).data('recharge');
        $('#naik-level').modal('hide');
        $('.amt').text(nominal);
        $('#success-recharge-lp').modal('show');
    })
    // end of close modal rank level up
</script>

@endsection
