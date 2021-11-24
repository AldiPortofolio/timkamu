@extends('layouts.mana-ui')
@section('body_class', 'mana-ui outright')


@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content">

	<!-- page section -->
	<div id="home-promo-cards">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<!-- other promo -->
					<img src="{{ asset('img/outright/1.jpg') }}" class="bd20 w-100 mb-20">

				</div>
			</div> 
		</div>
	</div>

	<style type="text/css">

		
	</style>

	<!-- page section -->
	<div class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

                    <span id="card-details">
                        {!! $event->card_detail !!}
                    </span>
					<p class="grey-10 font-size-20 text-center mb-10">Waktu tersisa:</p>
					<a href="#" id="upcoming-countdown" class="mana-btn-54 mana-btn-opaque mb-10" data-toggle="modal" data-target="#outright-help"></a>
					<a href="https://www.oneesports.gg/mpli/" class="mana-btn-54 mana-btn-opaque" target="_blank">Website resmi One Esports MPLI</a>

					<div class="mb-20"></div>

					<div class="row no-gutters outright-row" id="data-rules">
					</div>

				</div>
			</div> 
		</div>
	</div>
</section>

<section id="page-modals">
    <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-odd-notavail">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Info
				</div>
				<div class="modal-mid font-size-16 o5">
					Prediksi sudah tidak tersedia lagi
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="phone-verification-required">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Phone number verification required
				</div>
				<div class="modal-mid font-size-16 o5">
					Kamu perlu verifikasi nomor handphone terlebih dahulu
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" id="btn-need-verification" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="odds-nominal-choice">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<div class="odds-nominal-enter mb-20">
					    <input type="number" class="form-control" value="9">
					</div>
					<div class="odds-return-info position-relative bd50 bg040 mb-10">
						<div class="odds-return-info-left o5">Bonus</div>
						<div class="odds-return-info-right poetsenone-reg font-size-14 position-absolute top-translate-50 bonus-amount">25%</div>
					</div>
					<div class="odds-return-info position-relative bd50 bg040 mb-10">
						<div class="odds-return-info-left o5">Estimasi pendapatan</div>
						<div class="odds-return-info-right poetsenone-reg font-size-14 position-absolute top-translate-50"><span class="money money-14 right white-09"><span class="estimation-amount">0</span><img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					</div>
					<div class="odds-return-info position-relative bd50 bg040 mb-20">
						<div class="odds-return-info-left o5">Saldo BP</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 right white-09 top-01"><span class="amt-bp"></span><img src="{{ asset('img/currencies/bp.svg') }}"></span>
						</div>
					</div>
					<div class="odds-nominal-choices d-flex flex-wrap">
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09"><span class="odds-nominal">9</span><img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09"><span class="odds-nominal">18</span><img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09"><span class="odds-nominal">45</span><img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09"><span class="odds-nominal">90</span><img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09"><span class="odds-nominal">225</span><img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09"><span class="odds-nominal">450</span><img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09"><span class="odds-nominal">900</span><img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09"><span class="odds-nominal">1350</span><img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09"><span class="odds-nominal">1800</span><img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					</div>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red bet-buy-btn has-spinner">
						<span class="default-text">Berikan Prediksi</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
					<span class="font-size-14 o3 text-italic mt-10 d-block fw-300">Pemberian prediksi hanya dalam kelipatan 9</span>
				</div>
			</div>
		</div>
    </div>
    <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-odd-error">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error
				</div>
				<div class="modal-mid font-size-16 o5">
					<p id="modal-odd-error-msg"></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="not-enough-LP-donate">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Loyalty Points Tidak Cukup
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick btn-goto-recharge-lp">Recharge LP</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Cancel</a>
				</div>
			</div>
		</div>
	</div>

	<!-- minimal prediksi 1 -->
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="min-dukungan-amount">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Dukungan Tim
				</div>
				<div class="modal-mid font-size-16 o5">
					Jumlah dukungan minimum adalah <span class="money money-14 right money-inline white-09">1<img src="{{ asset('img/currencies/bp.svg') }}"></span>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal" data-toggle="modal" data-target="#odds-nominal-choice">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end of minimal prediksi 9 -->

	<!-- maksimal prediksi 2000 -->
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="max-dukungan-amount">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Dukungan Tim
				</div>
				<div class="modal-mid font-size-16 o5">
					Jumlah dukungan maksimum adalah <span class="money money-14 right money-inline white-09">2000<img src="{{ asset('img/currencies/bp.svg') }}"></span>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal" data-toggle="modal" data-target="#odds-nominal-choice">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end of maksimal prediksi 2000 -->


	<!-- prediksi harus kelipatan 9 -->
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="dukungan-kelipatan-sembilan">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Dukungan Tim
				</div>
				<div class="modal-mid font-size-16 o9">
					<p>Jumlah dukungan harus kelipatan <span class="money money-14 right money-inline white-09">9<img src="{{ asset('img/currencies/bp.svg') }}"></span></p>
					<p>Kelipatan <span class="money money-14 right money-inline white-09">9<img src="{{ asset('img/currencies/bp.svg') }}"></span> paling dekat dengan yang kamu input adalah <span class="nearest-amount"></span><img src="<?php echo asset('img/currencies/bp.svg'); ?>" class="mdl-curr"></p>
					<p>Berikan <span class="money money-14 right money-inline white-09"><span class="nearest-amount"></span><img src="{{ asset('img/currencies/bp.svg') }}"></span> sebagai dukungan ? </p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" id="btn-confirm-bp-kelipatan-sembilan" class="mana-btn-54 mana-btn-red has-spinner">
						<span class="default-text">Okay</span>
						<div class="spinner-border hw24"></div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end of prediksi harus kelipatan 9 -->

	<!-- convert to lp -->
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="not-enough-LP">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Loyalty Points Tidak Cukup
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>
						Saat ini kamu memiliki <span class="money money-14 right money-inline white-09"><span class="amt-lp"></span><img src="{{ asset('img/currencies/lp.svg') }}"></span> dan <span class="money money-14 right money-inline white-09"><span class="amt-bp"></span><img src="{{ asset('img/currencies/bp.svg') }}"></span>
					</p>
					<p>
						Dukungan yang kamu akan berikan memerlukan <span class="money money-14 right money-inline white-09"><span id="bp-needs-a"></span><img src="{{ asset('img/currencies/bp.svg') }}"></span>
					</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick btn-goto-recharge-lp" data-dismiss="modal">Recharge LP</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end of convert to lp -->

	<!-- convert to bp -->
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="convert-lp-to-bp">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Tukar Battle Points
				</div>
				<div class="modal-mid font-size-16 o9">
					<p>
                        Saat ini kamu memiliki 
                        <span class="money money-14 right money-inline white-09"><span class="amt-lp">{{ number_format($total_lp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/lp.svg') }}"></span>
                        dan 
                        <span class="money money-14 right money-inline white-09"><span class="amt-bp">{{ number_format($total_bp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/bp.svg') }}"></span>
                    </p>
                    <p>Dukungan yang kamu akan berikan memerlukan <span class="money money-14 right money-inline white-09"><span id="bp-needs-b"></span><img src="{{ asset('img/currencies/bp.svg') }}"></span></p>
                    
                    Tukar <span class="money money-14 right money-inline white-09"><span class="lp-convert"></span><img src="{{ asset('img/currencies/lp.svg') }}"></span>  kamu menjadi <span class="money money-14 right money-inline white-09"><span id="lp-converted"></span><img src="{{ asset('img/currencies/bp.svg') }}"></span> dan langsung berikan dukungan?</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" id="btn-confirm-recharge-bp" class="mana-btn-54 mana-btn-red has-spinner">
						<span class="default-text">Confirm</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Cancel</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end of convert to bp -->

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="bet-buy-thank-you">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Pemberian Prediksi Berhasil
				</div>
				<div class="modal-mid font-size-16 o5">
					Terima kasih, prediksi kamu berhasil diberikan.
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="page-modals">
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="outright-help">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Mengenai Waktu Sisa
				</div> 
				<div class="modal-mid font-size-16 grey-10">

					<p>Waktu pengumuman pemenang <span class="white-10">MPLI One Esports</span> adalah <span class="white-10">6 December 2020</span>.</p>

				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
</section>

@include('includes.mana-ui.footer')
@include('includes.mana-ui.modals')
<style type="text/css">
	/*page specific*/

	/*outright*/
	.outright-row {
		margin: 0 -15px;
	}
	.outright-item {
		padding: 15px;
		margin: 15px;
		border-radius: 20px;
		background: rgb(0 0 0 / .2);
		text-align: center;	
		cursor: pointer;	
	}
	.outright-item {
		padding: 15px;
		margin: 15px;
		border-radius: 20px;
		background: rgb(0 0 0 / .2);
		text-align: center;	
		cursor: pointer;	
	}
	.outright-team-logo {
		width: 100%;
	}
	.outright-h4 {
		font-family: 'Rajdhani-Bold';
		font-size: 14px;
		margin: 0;
		margin-top: -5px;
		margin-bottom: 5px;
	}
	.outright-action {
		background: rgb(233 33 90 / 1);
		opacity: .5;
		border-radius: 50px;
		height: 38px;
		text-align: center;
		display: flex;
		align-items: center;
		justify-content: center;
		margin: -5px 15px 10px 15px;
		cursor: pointer;	
	}

    .outright-action.locked {
		background: rgb(0 0 0 / .4);
	}

	.outright-action img {
		height: 20px;
		width: 20px;
	}
	.outright-row > div:hover .outright-item {
		background: rgb(0 0 0 / .4);
	}
	.outright-row > div:hover .outright-action {
		opacity: 1;
	}


	/*css copas dari event-view untuk modal odd nominal choice*/
	.odds-choice-item {
		flex: 1 1 25%;
		margin: 0 5px;
		font-family: 'poetsenone-reg';
		padding: 0 10px;
		display: flex;
		align-items: center;
		justify-content: center;
		margin-bottom: 10px;
		cursor: pointer;
		border-radius: 50px;
		line-height: 44px;
		height: 44px;
		background: rgb(255 255 255 / 10%);
	}
	.odds-choice-item:hover {
		background: rgb(255 255 255 / 20%);
	}
	.odds-choice-item:active {
		background: rgb(255 255 255 / 30%);
	}
	.odds-choice-item .icon {
		width: 16px;
		margin-left: 5px;
	}
	.odds-nominal-enter input {
		border: 0px;
		border-radius: 10px;
		background: rgb(255 255 255 / 10%);
		color: rgb(255 255 255 / 90%);
		padding: 15px;
		height: 48px;
	}
	.odds-nominal-enter input:focus {
		background: rgb(255 255 255 / 20%);
		color: rgb(255 255 255 / 90%);
	}
	.odds-nominal-enter small {
		margin-top: 15px;
		margin-bottom: 25px;
	}
</style>
@endsection

@section('js')
<script>
    var userType = "{{ Auth::user() ? Auth::user()->type : '' }}";
	var userBonusBingo = 0;
	if(userType === 'VIP') {
		userType = 'VIP 1';
		userBonusBingo = 2;
	} else if(userType === 'VVIP') {
		userType = 'VIP 2';
		userBonusBingo = 5;
	}
	var idBingo = '';
	var typeBingo = '';
	var bonusBingo = '';

	$(document).ready(function() {
		
		fetchData();
		setInterval(
            function(){
                fetchData();
            }, 3000
        );
	})
</script>

<script>
    // add bet temporary
    $('body').on('click', '.odds-item-action', function(e) {
        if($(this).find('.outright-action').hasClass('locked')) {
            $('#modal-odd-notavail').modal('show');

            return false;
        }
        idBingo = $(this).attr('data-id');
        currentBingo = parseInt($(this).attr('data-bonus'));
        bonusBingo = currentBingo + parseInt(userBonusBingo);
        typeBingo = $(this).attr('data-type');

        var value = $('#odds-nominal-choice .odds-nominal-enter input').val();
        var estimasi = Math.floor(value * (1 + (bonusBingo/100)));

        var target = $('#odds-nominal-choice');
        target.modal('show');
        target.find('.bonus-amount').text(bonusBingo+'%');
        target.find('.estimation-amount').text(estimasi);
    })

    $('body').on('click', '.odds-choice-item', function(e) {
        e.preventDefault();

        var betVal = $(this).find('span.odds-nominal').text();
        $('.odds-nominal-enter input').val(betVal);

        var target = $('#odds-nominal-choice');
        var estimasi = Math.floor(betVal * (1 + (bonusBingo/100)));

        target.find('.estimation-amount').text(estimasi);
    })

    $('#odds-nominal-choice .odds-nominal-enter input').on('keyup', function(e) {
        e.preventDefault();

        var target = $('#odds-nominal-choice');

        var value = $(this).val();
        var estimasi = Math.floor(value * (1 + (bonusBingo/100)));

        target.find('.estimation-amount').text(estimasi);
    })
    
    // buy bets
    $('body').on('click', '.bet-buy-btn', function(e) {
        e.preventDefault();

        var target4 = $('#odds-nominal-choice');
        var target5 = $('.bet-buy-btn');
        var target8 = $('#bet-buy-thank-you');

        var betVal = $('#odds-nominal-choice').find('.odds-nominal-enter input').val();

        if(+betVal <= 1) {
            $('#min-dukungan-amount').modal('show');

            $('#odds-nominal-choice').modal('hide');
            return false;
        } else if(+betVal > 2000) {
            $('#max-dukungan-amount').modal('show');

            $('#odds-nominal-choice').modal('hide');
            return false;
        } else if(+betVal % 9 !== 0) {
            var temp = parseInt(+betVal / 9)
            var nearestAmount = parseInt((temp + 1) * 9);

            $('#odds-nominal-choice').find('.odds-nominal-enter input').val(nearestAmount);

            $('#dukungan-kelipatan-sembilan span.nearest-amount').text(nearestAmount);
            $('#dukungan-kelipatan-sembilan').modal('show');

            target4.modal('hide');
            return false;
        }

        // show spinner
        $(this).addClass('loading');
		
        setTimeout(function() {
            // do db work here
            $.ajax({
                url: "{{ url('ajax/post-supports-sementara/'.$event->id) }}",
                method: 'post',
                data : {
                    id : idBingo,
                    value : betVal,
                    type : typeBingo
                },
                success: function(result) {
                    console.log(result);
                    // reset modal button
                    target5.removeClass('loading');
                    

                    // hide modal
                    target4.modal('hide');
                    if(result.status === 'error') {
                        if(result.message === "not enough BP") {
                            $('#convert-lp-to-bp').modal('show');
                            $('#bp-needs-b').text(result.total_support_bp);
                            $('.lp-convert').text(result.total_bp)
                            $('#lp-converted').text(result.total_bp)
                        } else if (result.message === "convert to LP") {
                            $('#not-enough-LP').modal('show');
                            $('#bp-needs-a').text(result.total_support_bp);
                            $('.lp-convert').text(result.lp_convert)
                            $('#lp-converted').text(result.lp_convert)
                        } else if(result.message === "need login") {
                            $('#modal-odd-error').modal('show');
                            $('#modal-odd-error-msg').text('Kamu butuh login untuk melakukan itu.');
                        } else if(result.message === "bet locked") {
                            $('#modal-odd-notavail').modal('show');
                        } else {
                            $('#modal-odd-error').modal('show');
                            $('#modal-odd-error-msg').text('Terjadi error. Silahkan coba beberapa saat lagi.');
                        }
                    } else {
                        fetchData();

                        if(result.quest_achieve === 'success') {
                            $('#modal-prediksi-quest').modal('show');
                            $('.amt-coin').text(result.total_coin);
                        }

                        if(result.quest_bp_achieve === 'success') {
                            $('#modal-bp-quest').modal('show')
                        }

                        // show thank you
                        target8.modal('show');

                        // do various show hide on cart panel
                        target.addClass('new-dot');
                        target3.removeClass('active d-flex');

                        // position the screen to the buttons
                        // adjustScreen("ux-anchor-panel-buttons",20);
                    }
                }
            });
        }, 1000);  
    });

	$('#btn-confirm-bp-kelipatan-sembilan').on('click', function(e) {
		e.preventDefault();

        var target = $('#btn-confirm-bp-kelipatan-sembilan');
        var target2 = $('#bet-buy-thank-you');
		var target4 = $('#dukungan-kelipatan-sembilan')

        var betVal = $('#odds-nominal-choice').find('.odds-nominal-enter input').val();

		console.log(betVal);

        // show spinner
        $(this).addClass('loading');

        setTimeout(function() {
            $.ajax({
                url: "{{ url('ajax/post-supports-sementara/'.$event->id) }}",
                method: 'post',
                data : {
                    id : idBingo,
                    value : betVal,
                    type : typeBingo
                },
                success: function(result) {
					console.log(result);
                    target4.modal('hide');
                    if(result.status === 'error') {
                        if(result.message === "convert to LP") {
                            $('#not-enough-LP').modal('show');
                            $('#bp-needs-a').text(result.total_support_bp);
                        } else if (result.message === "not enough BP") {
                            $('#convert-lp-to-bp').modal('show');
                            $('#bp-needs-b').text(result.total_support_bp);
                            $('.lp-convert').text(result.lp_convert)
                            $('#lp-converted').text(result.lp_convert)
                        } else if(result.message === "bet locked") {
                            $('#modal-odd-notavail').modal('show');
                        } else {
                            $('#modal-odd-error').modal('show');
                            $('#modal-odd-error-msg').text('Terjadi error. Silahkan coba beberapa saat lagi.')
                        }
                    } else {
                        if(result.quest_achieve === 'success') {
                            $('#modal-prediksi-quest').modal('show');
                            $('.amt-coin').text(result.total_coin);
                        }

                        if(result.quest_bp_achieve === 'success') {
                            $('#modal-bp-quest').modal('show')
                        }

                        // show thank you
                        target2.modal('show');
                        fetchData();

                        target.removeClass('loading');
                    }
                }
            })
        }, 1000);
	})

    // buy bets and auto convert LP to BP
    $('#btn-confirm-recharge-bp').on('click', function(e) {
        e.preventDefault();

        var target = $('#btn-confirm-recharge-bp');
        var target2 = $('#bet-buy-thank-you');
        var target3 = $('#convert-lp-to-bp');

        var betVal = $('#odds-nominal-choice').find('.odds-nominal-enter input').val();

        // show spinner
        $(this).addClass('loading');

        setTimeout(function() {
            $.ajax({
                url: "{{ url('ajax/post-supports-sementara/'.$event->id) }}",
                method: 'post',
                data : {
                    auto_support : true,
                    id : idBingo,
                    value : betVal,
                    type : typeBingo
                },
                success: function(result) {
                    target3.modal('hide');
                    if(result.status === 'error') {
                        if(result.message === "convert to LP") {
                            $('#not-enough-LP').modal('show');
                            $('#bp-needs-a').text(result.total_support_bp);
                        } else if (result.message === "not enough BP") {
                            $('#convert-lp-to-bp').modal('show');
                            $('#bp-needs-b').text(result.total_support_bp);
                            $('.lp-convert').text(result.lp_convert)
                            $('#lp-converted').text(result.lp_convert)
                        } else if(result.message === "bet locked") {
                            $('#modal-odd-notavail').modal('show');
                        } else {
                            $('#modal-odd-error').modal('show');
                            $('#modal-odd-error-msg').text('Terjadi error. Silahkan coba beberapa saat lagi.')
                        }
                    } else {
                        if(result.quest_achieve === 'success') {
                            $('#modal-prediksi-quest').modal('show');
                            $('.amt-coin').text(result.total_coin);
                        }

                        if(result.quest_bp_achieve === 'success') {
                            $('#modal-bp-quest').modal('show')
                        }

                        // show thank you
                        target2.modal('show');
                        fetchData();

                        target3.modal('hide');
                        target4.addClass('new-dot');
                        target6.removeClass('active');

                        target.removeClass('loading');
                    }
                }
            })
        }, 1000);
    })
    // end of buy bets and auto convert LP to BP
</script>

<script>
function fetchData() {
	$.ajax({
		url: "{{ url('ajax/get-data-event-outright-detail/'.$event->id) }}",
		method: 'get',
		success: function(result) {
			if(result.event_type === 'DONE') {
				location.reload();
			}

			if(result.card_detail !== '') {
				$('#card-details').html(result.card_detail);
			}

            $('#data-rules').html(result.event_bingo);

			// if(result.event_bingo === '') {
			// 	if($('.event-view-feature-button[data-target="panel-prediksi"]').hasClass('new-dot')){
			// 		$('.event-view-feature-button[data-target="panel-prediksi"]').removeClass('new-dot');
			// 	}
			// 	$('.panel-prediksi .no-odds').addClass('active');
			// } else {
			// 	$('.event-view-feature-button[data-target="panel-prediksi"]').addClass('new-dot');
			// 	$('#data-rules').html(result.event_bingo);
			// 	if($('.panel-prediksi .no-odds').hasClass('active')) {
			// 		$('.panel-prediksi .no-odds').removeClass('active');
			// 	}

			// 	$('.panel-prediksi .prediksi-available').addClass('active');
			// }

			// if(result !== 'error') {
			// 	$('#data-slips').html(result.slips);
			// 	if(result.slips === '') {
			// 		$('.prediction-card.no-prediction').addClass('active d-flex');
			// 		if($('.event-view-feature-button[data-target="panel-cart"]').hasClass('new-dot')){
			// 			$('.event-view-feature-button[data-target="panel-cart"]').removeClass('new-dot');
			// 		}

			// 		if($('.in-panel-total-bet').hasClass('active')) {
			// 			$('.in-panel-total-bet').removeClass('active');
			// 		}
			// 	} else {
			// 		$('.in-panel-total-bet').addClass('active');
			// 		$('.event-view-feature-button[data-target="panel-cart"]').addClass('new-dot');
			// 		$('.prediction-card.no-prediction').removeClass('active d-flex');
			// 	}

			// 	$('.total-bet .total-bp').text(result.subtotal_slip_bp);
			// 	$('.total-bet .bonus-prediction').text(result.total_slip_bp);
			// }

			$('.amt-lp').text(result.total_lp);
			$('.amt-bp').text(result.total_bp);
			$('.amt-p').text(result.prediction);
			$('.amt-cp').text(result.correct_prediction);
			$('#data-quests').html(result.data_quests);
		}
	})
}

// redirect to recharge LP
$('.btn-goto-recharge-lp').on('click', function(e) {
	e.preventDefault();

	$(this).parent().parent().parent().parent().modal('hide');
	window.open("{{ url('purchase/detail?name=lp') }}", "_blank");
})
// end of redirect to recharge LP

// group bet item
$('body').on('click', '.bet-row .group', function(e) {
	e.preventDefault();

	var currBtn = $(this);
	var target = $('#groupbet');

	var idBet = currBtn.attr('data-id');
	var titleBet = currBtn.attr('data-title');
	var leftTeamName = currBtn.attr('data-left-type');
	var leftTeamBonus = currBtn.attr('data-left-bonus');
	var leftTeamLock = currBtn.attr('data-left-lock');

	var rightTeamName = currBtn.attr('data-right-type');
	var rightTeamBonus = currBtn.attr('data-right-bonus');
	var rightTeamLock = currBtn.attr('data-right-lock');

	target.find('#title-groupbet').text(titleBet);

	target.find('#leftteam-groupbet').text(leftTeamName);
	target.find('#leftbonus-groupbet').text(leftTeamBonus+'%');
	if(leftTeamLock === '1') {
		var htmlLeft = '<div class="action scale-onclick odds-item-action locked" data-dismiss="modal"><img src="{{ asset('icons/lock-white.svg') }}" class="icon"></div>'

		target.find('#action-left').html(htmlLeft)
	} else {
		var htmlLeft = '<div class="action scale-onclick odds-item-action"'+
		' data-id="'+idBet+'" data-type="team_left" data-bonus="'+leftTeamBonus+'"'+
		' data-dismiss="modal"><img src="{{ asset('icons/arrow-right-white.svg') }}" class="icon"></div>'

		target.find('#action-left').html(htmlLeft)
	}

	target.find('#rightteam-groupbet').text(rightTeamName);
	target.find('#rightbonus-groupbet').text(rightTeamBonus+'%');

	if(rightTeamLock === '1') {
		var htmlLeft = '<div class="action scale-onclick odds-item-action locked" data-dismiss="modal"><img src="{{ asset('icons/lock-white.svg') }}" class="icon"></div>'

		target.find('#action-right').html(htmlLeft)
	} else {
		var htmlRight = '<div class="action scale-onclick odds-item-action"'+
		' data-id="'+idBet+'" data-type="team_right" data-bonus="'+rightTeamBonus+'"'+
		' data-dismiss="modal"><img src="{{ asset('icons/arrow-right-white.svg') }}" class="icon"></div>'

		target.find('#action-right').html(htmlRight)
	}

})
// end of group bet item
</script>

<script>
	generalCountdown("{{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y H:i:s') }}", "{{ \Carbon\Carbon::parse($event->end_date)->format('M d, Y H:i:s') }}");
	function generalCountdown(startDate, futureDate){
		// Set the date we're counting down to
		var countDownDate = new Date(futureDate).getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

			// Get today's date and time
			var now = new Date(startDate).getTime();

			// Find the distance between now and the count down date
			var distance = countDownDate - now;

			// Time calculations for days, hours, minutes and seconds
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

			// Display the result in the element with id="demo"
			document.getElementById("upcoming-countdown").innerHTML = `<span>${days} Hari ${hours} Jam ${minutes} Menit</span>`;

			// If the count down is finished, write some text
			if (distance < 0) {
				clearInterval(x);
				document.getElementById("upcoming-countdown").innerHTML = "This event has finished";
			}
		}, 1000);
	}
</script>
@endsection