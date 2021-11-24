@extends('layouts.mana-ui')

@section('page_title', "TimKamu (PTS) - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui rumah-tangga-pln')


@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content">

	<!-- page header -->
	<div id="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<h1 class="rajdhani-bold">Token PLN</h1>
				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<div id="shop-form-mlbb" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<h4 class="font-size-18 mb-20">1. Informasi User</h4>

					<div class="form-group mana-control">
						<label class="mana-control">ID pelanggan</label>
						<input type="text" class="form-control mana-control" name="idpelanggan">
					</div>

					<div class="form-group mana-control">
						<label class="mana-control">Nomor telefon</label>
						<input type="text" class="form-control mana-control" name="userphone">
						<small class="font-size-14 o3 text-italic mt-10 d-block fw-300">Nomor telefon akan digunakan untuk konfirmasi dan troubleshooting</small>
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

					<h4 class="font-size-18 mb-20">2. Pilih nominal token</h4>

					<div class="shelf-container d-flex flex-wrap align-items-center">
                        
                        @foreach ($items as $item)
                            <div class="shelf-item nominal-choice-btn d-flex scale-onclick @if($item['active'] === '0') unavailable @endif" data-name="{{ $item['name'] }}" data-id_rupiah="{{ $item['id_rupiah'] }}" data-id_lp="{{ $item['id_lp'] }}" data-rupiah="{{ $item['rupiah'] }}" data-lp="{{ $item['lp'] }}">
                                <div class="shelf-item-inner d-flex bg020 bd20 justify-content-center">
                                    <span class="money money-14 money-inline right">{{ number_format((int)$item['name'], 0, '.', ',') }}</span>
                                </div>
                            </div>
                        @endforeach
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

					<h4 class="font-size-18 mb-20">3. Pilih metode pembayaran</h4>

					<div class="dashboard-info-group mb-10">
						<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-toggle="modal" @if($bp_quest_done) data-target="#bp-lp-convert-modal" @elseif(!Auth::user()) data-target="#modal-need-login" @else data-target="#locked-feature" @endif>Convert&nbsp;&nbsp;<span class="money money-14 right money-inline"><span class="fw-300">BP</span><img src="{{ asset('img/currencies/bp.svg') }}"></span>&nbsp;&nbsp;to&nbsp;&nbsp;<span class="money money-14 right money-inline"><span class="fw-300">LP</span><img src="{{ asset('img/currencies/lp.svg') }}"></span></a>
					</div>

					<div class="pg-shelf-container d-flex flex-wrap align-items-center">

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="lp">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name black-08 fw-800">
									Loyalty Points
								</div>
								<div class="pg-lp text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									<span class="money money-16 right lp-amount">0<img src="{{ asset('img/currencies/lp.svg') }}"></span>
								</div>
							</div>
						</div>

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
	<div class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="form-group mana-control mb-50">
						<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-20 buy-diamond-btn">
							<span class="default-text">Beli</span>
							<div class="spinner-border hw24"></div>
						</a>
						<a href="{{ url('purchase/detail?name=rumah-tangga') }}" class="mana-btn-54 mana-btn-opaque">Pilih produk lain</a>
					</div>

				</div>
			</div> 
		</div>
	</div>

	<div id="shop-disclaimer" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="bd20 bg020 grey-10 d-flex align-items-center justify-content-center mb-20 p5030 font-size-14">
						<p class="mb-0">Pastikan kamu memiliki <span class="money money-inline money-14 white-10 right"><span>LP</span><img src="{{ asset('img/currencies/lp.svg') }}"></span> atau saldo yang cukup sebelum melakukan Top Up Token PLN. Silahkan <a href="/mana/recharge-lp">recharge LP</a> untuk mengisi ulang saldo <span class="money money-inline money-14 white-10 right"><span>LP</span><img src="{{ asset('img/currencies/lp.svg') }}"></span> kamu.</p>
					</div>

					<div class="bd20 bg020 grey-10 d-flex align-items-center justify-content-center mb-20 p5030 font-size-14">
						<p class="mb-0">Dengan membeli mata uang game, pulsa dan token PLN dari TimKamu, berarti kamu setuju dengan peraturan TimKamu. TimKamu berhak menolak melayani pembelian siapa pun jika pembelian tersebut dinilai melanggar peraturan "fair-use" dan bersifat merugikan.</p>
					</div>

				</div>
			</div> 
		</div>
	</div>

</section>

<section id="page-modals">
    @include('includes.mana-ui.top-up-modals')
    <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="diamond-shop-page-blank-userinfo">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error pembelian
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p class="message-error"></p>
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
	.shop-panel {
		display: none;
	}
	.shop-panel.active {
		display: block;
	}
	.isi-pulsa-telkomsel .shelf-item {
		flex: 0 0 50%;
	}
	@media (max-width: 450px){
		.isi-pulsa-telkomsel .shelf-item.shelf-full {
			flex: 0 0 100%;
		}
	}
	#pulsa-panel .swiper-container {
	    width: 100%;
	}
	#pulsa-panel .swiper-slide {
		width: auto;
		margin-right: 25px;
	}
	.swiper-panel-item {
		opacity: 0.3;
	}
	.swiper-panel-item.active {
		opacity: 0.9;
	}
	.swiper-panel-item .icon {
		width: 16px;
		position: relative;
		top: -2px;
		margin-right: 8px;
		opacity: 0.8;
	}
</style>
<style type="text/css">
	/*page specific*/
	.shelf-item.full-width {
		flex: 0 0 100%;
	}
	.mlbb-user-guide-png {
		margin-left: -7px;
	}
	.label-helper {
		position: absolute;
		right: 0;
		top: 50%;
		transform: translate(0,-50%);
	    padding-left: 20px;
	}
	.label-helper .icon {
		width: 20px;
		opacity: 0.7;
	}
	.label-helper:hover .icon {
		opacity: 1;
	}
	.mlbb-userinfo-wrapper {
		margin-left: -10px;
		margin-right: -5px;
	}
	.mlbb-user-id-left {
		padding: 0 5px;
		flex: 1 1 65%;
	}
	.mlbb-user-id-right {
		padding: 0 5px;
		flex: 1 1 35%;		
	}
	.mlbb-user-id-left input {
	}
	.mlbb-user-id-right input {
	}
	.shelf-container {
		margin-left: -5px;
		margin-right: -5px;
	}
	.shelf-item {
		flex: 0 0 33%;
		padding: 5px;
		cursor: pointer;
	}
	.shelf-item-inner {
		display: flex!important;
		flex: 1 1 50%;
		line-height: 54px;
		padding: 0 15px;
	}
	.shelf-item:hover .shelf-item-inner {
		background: rgb(0 0 0 / 0.4);
	}
	.shelf-item.active .shelf-item-inner {
		background: rgb(255 255 255 / 0.2);
	}
	.shelf-item-inner .icon {
		top: -1px;
	}
	.page-hero-container {
		position: relative;
	}
	.hero-overlay {
		position: absolute;
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		border-radius: 20px;
		background-image: linear-gradient(transparent, rgb(0 0 0 / 0.6));
	}
	.hero-texts {
		position: absolute;
		bottom: 20px;
		left: 20px;
	}
	.main-hero {
		width: 100%;
		border-radius: 20px;
	}
</style>
<style type="text/css">
	/*media*/
	
</style>
@endsection

@section('js')
<script type="text/javascript">
	var mySwiper = new Swiper('#pulsa-panel .swiper-container', {
		// Optional parameters
		direction: 'horizontal',
		loop: false,
		slidesPerView: 'auto',
	})
</script>
<script>
	$(document).ready(function() {
		
		// page specific scripts
		initTopUpScripts();

		// swiper + panel buttons
		$('body').on('click', '.swiper-panel-item', function(e) {
			e.preventDefault();

			target = $(this);
			target2 = $('.swiper-panel-item');
			target3 = $(this).data('target');
			target4 = $('.shop-panel');

			target2.removeClass('active');
			target.addClass('active');

			target4.removeClass('active');
			$('.'+target3).addClass('active');
		});
	})
</script>

<script>
	var user = "{{ Auth::id() }}";
    var idRupiah = '';
    var idLP = '';
    var rupiah = '';
    var lp = '';
    var paymentType = '';
	var isUnvailable = false;
	var typePaket = "{{ app('request')->input('type') }}";
	$(document).ready(function() {
		
		// page specific scripts

		// nominal button
		$('body').on('click', '.nominal-choice-btn', function(e) {
			e.preventDefault();

			var target = $(this);
            var target2 = $('.nominal-choice-btn');

			if(target.hasClass('unavailable')) {
				$('#shop-item-unavailable').modal('show');
				$('.pg-lp .lp-amount').text('unavailable');
            	$('.pg-price').text('unavailable');

				isUnvailable = true;

				return false;
			} else {
				isUnvailable = false;
			}
            
            idRupiah = target.attr('data-id_rupiah');
            idLP = target.attr('data-id_lp');
            rupiah = target.attr('data-rupiah');
            lp = target.attr('data-lp');

            $('.pg-lp .lp-amount').html(lp+"<img src='{{ asset('img/currencies/lp.svg') }}'>");
            $('.pg-price').text(convertToRupiah(parseInt(rupiah)));

			target2.removeClass('active');
			target.addClass('active');
		});

		// pg button
		$('body').on('click', '.pg-choice-btn', function(e) {
			e.preventDefault();

			var target = $(this);
            var target2 = $('.pg-choice-btn');

			if(!isUnvailable) {
				var userAgent = "{{ $user_agent }}";
				paymentType = target.attr('data-value');

				if(userAgent === 'mobile' && paymentType !== 'gopay' && paymentType !== 'lp') {
					paymentType = '';
					$('#payment-method-unavailable').modal('show');

					return false;
				}

				target2.removeClass('active');
				target.addClass('active');
			}
		});

		// beli button
		$('body').on('click', '.buy-diamond-btn', function(e) {
			e.preventDefault();

			var target = $(this);

            // get user info
            var idPelanggan = $('#shop-form-mlbb').find('input[name=idpelanggan]').val();
            var phone = $('#shop-form-mlbb').find('input[name="userphone"]').val();

			if(isUnvailable) {
				$('#diamond-shop-page-blank-userinfo').modal('show').find('p.message-error').text('Item tidak tersedia');

				return false;
			}

			if(idLP === '' && idRupiah === '') {
                $('#diamond-shop-page-blank-userinfo').modal('show').find('p.message-error').text('Kamu belum memilih item untuk dibeli');

                return false;
            } else if(paymentType === '') {
                $('#diamond-shop-page-blank-userinfo').modal('show').find('p.message-error').text('Kamu belum memilih metode pembayaran');

				return false;
			} else if(phone === '' && idPelanggan === '') {
				$('#diamond-shop-page-blank-userinfo').modal('show').find('p.message-error').text('Kamu belum mengisi semua formulir');

				return false;
            }

            // show spinner
            $(this).addClass('loading');

            setTimeout(function(){
				if(paymentType == 'lp') {
					if(user === '') {
						$('#need-login').modal('show');
						target.removeClass('loading');

						return false;
					}

					var urlString = ("{{ url('purchase?name=rumah-tangga&id=') }}" + parseInt(idLP))
					urlString = (urlString+"&id_pelanggan="+idPelanggan+"&phone="+phone).replace(/&amp;/g, '&');
					location.href = urlString;
				} else {
					if(paymentType == 'bypass') {
                        var urlString = ("{{ url('purchase?name=rumah-tangga-bypass&id=') }}" + parseInt(idRupiah))
						urlString = (urlString+"&id_pelanggan="+idPelanggan+"&phone="+phone).replace(/&amp;/g, '&');
                        location.href = urlString;
					} else {        
                        console.log(paymentType);
						$.ajax({
							url: "{{ url('ajax/get-token-transaction') }}",
							method: "GET",
							data : {
								name : 'rumah-tangga',
								id : idRupiah,
                                id_pelanggan : idPelanggan,
								phone : phone,
								paket : typePaket,
								payment_method : paymentType
							},
							success : function(response) {
                                console.log(response);
                                target.removeClass('loading');
								var res = JSON.parse(response);
								snap.pay(res.token);
							}
						})
					}
				}
        	}, 1000);
		});

	})

	$('.convert-bp-lp-btn').on('click', function(e) {
		e.preventDefault();

		var user = "{{ Auth::id() }}";
		var totalBP = "{{ $total_bp }}";

		var nominal = $('#bp-lp-convert-modal .nominal-convert').val();
		var target = $(this);
		var target2 = $('#bp-lp-convert-modal'); 
		var target3 = $('#bp-lp-convert-success');

		if(user === '') {
			target2.modal('hide');

			$('#modal-need-login').modal('show');

			return false
		}

		if(parseInt(totalBP) < parseInt(nominal)) {
			target2.modal('hide');

			$('#modal-convert-error').modal('show');
			$('#modal-convert-error-msg').text('Nominal yang dimasukkan lebih besar dari saldo BP yang kamu miliki.');
			$('#modal-convert-error .mana-btn-54').attr('data-target', '#bp-lp-convert-modal');

			return false;
		} else if(parseInt(nominal) % 9 !== 0) {
			target2.modal('hide');
			
			$('#modal-convert-error').modal('show').find('#modal-convert-error-msg').text('Convert BP to LP hanya dalam kelipatan 9');
			$('#modal-convert-error .mana-btn-54').attr('data-target', '#bp-lp-convert-modal');

			return false;
		}

		$(this).addClass('loading');

		$.ajax({
			url: "{{ url('ajax/convert-bp-lp') }}",
			method: "POST",
			data : {
				nominal: nominal
			},
			success : function(response) {
				target.removeClass('loading');
				target2.modal('hide');
				if(response.status === 'error' && response.message === 'need login') {
					$('#modal-need-login').modal('show');
				} else if(response.status === 'error' && response.message === 'over current bp') {
					$('#modal-convert-error').modal('show');
					$('#modal-convert-error-msg').text('Nominal yang dimasukkan lebih besar dari saldo BP yang kamu miliki.');
					$('#modal-convert-error .mana-btn-54').attr('data-target', '#bp-lp-convert-modal');
				} else if(response.status === 'error' && response.message === 'kelipatan 9') {
					$('#modal-convert-error').modal('show');
					$('#modal-convert-error-msg').text('Convert BP to LP hanya dalam kelipatan 9.');
					$('#modal-convert-error .mana-btn-54').attr('data-target', '#bp-lp-convert-modal');
				} else if(response.status === 'success') {
					$('.amt-lp').text(response.total_lp);
					$('.amt-bp').text(response.total_bp);
					$('.amt-convert').text(response.nominal);

					target3.modal('show');
				}
			}
		})
	})

	// redirect to verifikasi phone number
    $('#btn-need-login').on('click', function(e) {
        e.preventDefault();

        $('#need-login').modal('hide');
        location.href="{{ url('sign-in') }}";
    })
    // end of redirect to verifikasi phone number
</script>
@endsection