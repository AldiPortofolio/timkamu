@extends('layouts.mana-ui')

@section('page_title', "Isi Pulsa")
@section('body_class', 'mana-ui isi-pulsa-index')


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
					<div class="section-title position-relative">
						<h1 class="rajdhani-bold">Isi Pulsa</h1>
						<a href="#" class="o5 section-title-meta-link font-size-14" data-toggle="modal" @if($bp_quest_done) data-target="#bp-lp-convert-modal" @else data-target="#locked-feature" @endif>Convert BP to LP</a>
					</div>
				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<div id="diamonds-top-up" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="shop-gallery-container d-flex flex-wrap align-items-start mb-20">
                        @foreach ($shops as $shop)
							<div class="shop-item">
								<a href="@if($shop->active === '0') # @else {{ url('purchase/detail?name=pulsa&type='.$shop->alias) }} @endif" class="shop-item-inner @if($shop->active === '0' && $shop->meta === 'Coming Soon')game-comingsoon @elseif($shop->active === '0') game-unvailable @endif" @if($shop->active === '0') data-reason="{{ $shop->reason }}" data-open="{{ \Carbon\Carbon::parse($shop->open_date)->format('l d M Y H:i') }}" @endif>
									<div class="position-relative">
										<img src="{{ $shop->logo }}" class="shop-item-thumb">
									</div>
									<div class="shop-item-name mt-10 mb-0">{{ $shop->name }}</div>
									<div class="shop-item-name-meta o5 font-size-14">{{ $shop->meta }}</div>
								</a>
							</div>
                        @endforeach
					</div>

					<div class="bd20 bg020 grey-10 d-flex align-items-center justify-content-center mb-20 p5030 font-size-14">
						<p class="mb-0">Pastikan kamu memiliki <span class="money money-inline money-14 white-10 right"><span>LP</span><img src="{{ asset('img/currencies/lp.svg') }}"></span> atau saldo yang cukup sebelum melakukan Top Up Game. Silahkan <a href="/mana/recharge-lp">recharge LP</a> untuk mengisi ulang saldo <span class="money money-inline money-14 white-10 right"><span>LP</span><img src="{{ asset('img/currencies/lp.svg') }}"></span> kamu.</p>
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
    @if(session('success-pulsa-purchase'))
	<div class="modal mana-ui slim-card splash" tabindex="-1" role="dialog" id="item-gifting-thank-you">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Terima Kasih
				</div>
				<div class="modal-mid font-size-16 o5">
					Terima kasih atas pembelian paket {{ session('success-pulsa-purchase') }} di Timkamu. Pesanan kamu sedang diproses.
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	@endif
	
</section>

@include('includes.mana-ui.modals')
@include('includes.mana-ui.footer')


<style type="text/css">
	/*page specific*/
	.shop-gallery-container {
		margin-left: -10px;
		margin-right: -10px;
	}
	.shop-item {
		padding: 15px;
		flex: 0 0 50%;
		align-content: center;
		justify-content: center;
	}

	@media (min-width: 768px) {
	    .shop-item {
	    	padding: 15px;
	    	flex: 0 0 33.33%;
	    	align-content: center;
	    	justify-content: center;
	    }
	}
	.shop-item-inner {
		width: 100%;
		display: flex;
		position: relative;
		flex-direction: column;
		align-content: center;
		justify-content: center;
	}
	.shop-item-thumb {
		border-radius: 20px;
		width: 100%;
	}
	.shop-item-name {
		font-size: 14px;
	}
	.shop-item-name-meta {
		margin-top: -2px;
	}
	
</style>
<style type="text/css">
	/*media*/
	
</style>
@endsection

@section('js')
<script>
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
			$('#modal-need-login-msg').text('Kamu butuh login untuk melakukan itu.');

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
					$('#modal-need-login-msg').text('Kamu butuh login untuk melakukan itu.');
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
	$(document).ready(function() {
		
		// page specific scripts

	})
</script>
@endsection