@extends('layouts.mana-ui')

@section('body_class', 'mana-ui event-index')

@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content">

	<!-- no page header, direct to video -->

	<!-- video -->
	<div id="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-10">
					<div class="video-stream-container">{!! $event->streaming_link !!}</div>
				</div>
			</div>
		</div>
	</div>

	<!-- event card -->
	<div class="event-view-cards">
		<div class="container">
			<div class="row justify-content-center">
				@if($event->league_games->game_id === 2 || $event->league_games->game_id === 3)
				<div class="col-md-8 col-lg-6" id="card-details">
					{!! $event->card_detail !!}
				</div>
				@else
				<div class="col-md-8 col-lg-6">
					<div class="event-card cursor-ptr bg233339030 bd20 live @if($event->type === 'ONGOING') active @endif">
						<div class="event-card-meta d-flex flex-column justify-content-center position-relative">
							<div class="event-card-meta-date font-size-16 font-weight-bold">{{ \Carbon\Carbon::parse($event->start_date)->format('D, d M') }}</div>
							<div class="event-card-meta-league o5 font-size-16">{{ $event->league_games->leagues->name }}</div>
							<div class="event-card-meta-time o5 rajdhani-bold top-translate-50 font-size-26">LIVE</div>
						</div>
						<div class="event-card-bottom d-flex bg233339030 bd20">
							<div class="col event-card-bottom-left d-flex flex-column align-items-center">
								@if($event->team_left->alias === 'na')
								<h2>NA</h2>
								@else
								<img src="{{ asset($event->team_left->logo.'-200.png') }}" class="event-card-bottom-left-teampic ev-{{ $event->id }}">
								@endif
                                <div class="event-card-bottom-team-name rajdhani-bold font-size-14">{{ $event->team_left->name }}</div>
							</div>
							<div class="col event-card-bottom-mid bg2333390 bd20 d-flex justify-content-center align-items-center">
                                <span class="rajdhani-bold font-size-28 o9"><span class="left-score ev-{{ $event->id }}">{{ $event->team_left_score }}</span>&nbsp;&nbsp;-&nbsp;&nbsp;<span class="right-score ev-{{ $event->id }}">{{ $event->team_right_score }}</span></span>
							</div>
							<div class="col event-card-bottom-right d-flex flex-column align-items-center">
								@if($event->team_right->alias === 'na')
								<h2>NA</h2>
								@else
								<img src="{{ asset($event->team_right->logo.'-200.png') }}" class="event-card-bottom-right-teampic ev-{{ $event->id }}">
								@endif
                                <div class="event-card-bottom-team-name rajdhani-bold font-size-14">{{ $event->team_right->name }}</div>
							</div>
						</div>
					</div>

					<div class="event-card cursor-ptr bg020 bd20 upcoming @if($event->type === 'UPCOMING') active @endif">
						<div class="event-card-meta d-flex flex-column justify-content-center position-relative">
							<div class="event-card-meta-date font-size-16 font-weight-bold">{{ \Carbon\Carbon::parse($event->start_date)->format('D, d M') }}</div>
							<div class="event-card-meta-league o5 font-size-16">{{ $event->league_games->leagues->name }}</div>
							<div class="event-card-meta-time o5 rajdhani-bold top-translate-50 font-size-26">{{ \Carbon\Carbon::parse($event->start_date)->format('H:i') }}</div>
						</div>
						<div class="event-card-bottom d-flex bg020 bd20">
							<div class="col event-card-bottom-left d-flex flex-column align-items-center">
								@if($event->team_left->alias === 'na')
								<h2>NA</h2>
								@else
								<img src="{{ asset($event->team_left->logo.'-200.png') }}" class="event-card-bottom-left-teampic ev-{{ $event->id }}">
								@endif
                                <div class="event-card-bottom-team-name rajdhani-bold font-size-14">{{ $event->team_left->name }}</div>
							</div>
							<div class="col event-card-bottom-mid bg020 bd20 d-flex justify-content-center align-items-center">
								<span class="rajdhani-bold font-size-22 o9"><span class="o5">[</span> upcoming <span class="o5">]</span></span>
							</div>
							<div class="col event-card-bottom-right d-flex flex-column align-items-center">
								@if($event->team_right->alias === 'na')
								<h2>NA</h2>
								@else
								<img src="{{ asset($event->team_right->logo.'-200.png') }}" class="event-card-bottom-right-teampic ev-{{ $event->id }}">
								@endif
                                <div class="event-card-bottom-team-name rajdhani-bold font-size-14">{{ $event->team_right->name }}</div>
							</div>
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>

	<!-- event view panels -->
	<div id="ux-anchor-panel-buttons" class="event-view-section-buttons">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="event-view-button-wrapper d-flex align-items-center justify-content-center">

						<div class="event-view-button-section scale-onclick d-flex align-items-center justify-content-center">
							<div class="event-view-feature-button cursor-ptr d-flex align-items-center justify-content-center panel-chat-btn" data-target="panel-chat">
								<i class="icon" data-feather="message-square"></i>
							</div>
						</div>

						<div class="event-view-button-section scale-onclick d-flex align-items-center justify-content-center">
							<div class="event-view-feature-button active cursor-ptr d-flex align-items-center justify-content-center" data-target="panel-prediksi">
								<i class="icon" data-feather="check-circle"></i>
							</div>
						</div>

						<div class="event-view-button-section scale-onclick d-flex align-items-center justify-content-center">
							<div class="event-view-feature-button cursor-ptr d-flex align-items-center justify-content-center" data-target="panel-cart">
								<i class="icon" data-feather="shopping-cart"></i>
							</div>
						</div>

						<div class="event-view-button-section scale-onclick d-flex align-items-center justify-content-center">
							<div class="event-view-feature-button cursor-ptr d-flex align-items-center justify-content-center" data-target="panel-gift">
								<i class="icon" data-feather="gift"></i>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- event view buttons -->
	<div class="event-view-panels">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="event-panel panel-chat bd20 bg25510 mb-20">
						<!-- no chat card -->
						<div class="no-odds align-items-center justify-content-center">
							<span class="o5">Chat belum tersedia untuk event ini</span>
						</div>

						<div class="chat-available">
							<h3 class="rajdhani-bold font-size-24">Livechat</h3>

							<div class="chat-container">
								<div class="chat-blob system">
									<span class="writer o5">[System Message]</span>
									<span class="o5">Timkamu mempromosikan streaming langsung yang bersih dan melakukan inspeksi online 24 jam untuk konten. Setiap pelanggaran yang melanggar hukum, pelanggaran, vulgar, kekerasan, dll. akan dikenakan sanksi. Jangan menstransfer antar visitor untuk menghindari penipuan.</span>
								</div>

								<div id="data-chats"></div>
							</div>

							<!-- <div class="chat-emojis"></div> -->

							<div class="chat-controller d-flex align-items-center">
								<input type="text" class="chat-text-input bd50" @guest disabled @endguest placeholder="@auth type something nice... @else You have to login... @endauth">
								<div class="cursor-ptr scale-onclick chat-text-enter-button scale-onclick d-flex align-items-center justify-content-center @guest disabled @endguest">
									<i data-feather="send" class="icon"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="event-panel panel-prediksi active bd20 bg25510 mb-20">
						<!-- no odds card -->
						<div class="no-odds align-items-center justify-content-center">
							<span class="o5">Belum ada prediksi yang bisa kamu berikan</span>
						</div>

						<div class="prediksi-available">
							<h3 class="rajdhani-bold font-size-24">Prediksi Pertandingan</h3>
							<div id="data-rules">

							</div>
						</div>
					</div>

					<div class="event-panel panel-cart">
						<!-- prediction panel estimate -->
						<div class="in-panel-total-bet bd50 bg040">
							<div class="total-bet-left">Total BP yang diberikan</div>
							<div class="total-bet-right text-right total-bet"><span class="money money-14 right white-09"><span class="o9 poetsenone-reg font-size-14 total-bp">0</span><img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
						</div>
						<div class="in-panel-total-bet bd50 bg040">
							<div class="total-bet-left">Total estimasi pendapatan</div>
							<div class="total-bet-right text-right total-bet"><span class="money money-14 right white-09"><span class="o9 poetsenone-reg font-size-14 bonus-prediction">0</span><img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
						</div>

						<div id="data-slips">

						</div>

						<!-- no prediction card -->
						<div class="prediction-card no-prediction bg25510 bd20 d-flex align-items-center justify-content-center">
							<span class="o5">Belum ada prediksi yang kamu berikan</span>
						</div>
					</div>

					<div class="event-panel panel-gift">
						<div class="clan-item-shelf d-flex flex-wrap justify-content-start">
							@foreach ($items as $key => $item)
								<div class="clan-item-single cursor-ptr d-flex justify-content-center align-items-center flex-column" data-toggle="modal" data-target="#clan-item-team-choice" data-item="{{ $item->child_id }}" data-logo="{{ asset($item->childs->logo) }}" data-itemcurrencies="{{ number_format($item->value, 0, '.', ',') }}">
									<div class="clan-item-box-inner d-flex justify-content-center align-items-center flex-column">
										<img src="{{ asset($item->childs->logo) }}" class="clan-item-avatar">
										<div class="clan-item-single-price bg020 bd50">
											<span class="money money-14 right white-09">{{ number_format($item->value, 0, '.', ',') }}<img src="{{ asset('img/currencies/lp.svg') }}"></span>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</section>

<section id="page-modals">
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-prediksi-quest">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Quest Completed
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Selamat, kamu telah menyelesaikan quest <span class="white-10">"Berikan 10 prediksi"</span> dengan hadiah <span class="money money-14 right money-inline white-10">50<img src="{{ asset('img/currencies/coin.svg') }}"></span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-bp-quest">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Quest Completed
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Selamat, kamu telah menyelesaikan quest <span class="white-10">"Total pemberian prediksi 27 BP"</span> dengan hadiah <span class="money money-14 right money-inline white-10">Unlock fitur convert currency</span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-prediksi-donation">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Quest Completed
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Selamat, kamu telah menyelesaikan quest <span class="white-10">"Total pemberian item support sebesar 100 LP"</span> dengan hadiah <span class="money money-14 right money-inline white-10"><span class="amt-achieve"></span><img src="{{ asset('img/currencies/coin.svg') }}"></span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal" data-toggle="modal" data-target="#item-gifting-thank-you">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="result-prediction-info">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Info
				</div>
				<div class="modal-mid font-size-16 o5">
					Hasil dari prediksi ini akan keluar setelah pertandingan berakhir
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-odd-bonus">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Info
				</div>
				<div class="modal-mid font-size-16 o5">
					<p>Bonus yang kamu akan dapatkan</p>
					<p id="extra-bonus"></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
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
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" id="btn-list-prediction">Lihat list prediksi</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="clan-item-team-choice">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about no-mb rajdhani-bold font-size-32 text-center">
					Pemberian dukungan
				</div>
				<div class="modal-about-meta o5 text-center">
					Pilih tim yang kamu ingin dukung
				</div>
				<div class="modal-mid">
					@if($event->league_games->game_id === 1 || $event->league_games->game_id === 4)
					<div class="team-choice-in-modal-wrapper d-flex align-items-center justify-content-center">
						<div class="in-modal-team-select cursor-ptr bd10 d-flex align-items-center justify-content-center flex-column btn-donate-item" data-dismiss="modal" data-toggle="modal" data-target="#clan-item-team-choice-confirm" data-team="{{ $event->team_left_id }}" data-name="{{ $event->team_left->name }}">
							@if($event->team_left->alias === 'na')
							<h2>NA</h2>
							@else
							<img src="{{ asset($event->team_left->logo.'-200.png') }}" class="in-modal-team-avatar w-100">
							@endif
							<div class="in-modal-team-name rajdhani-bold font-size-16">{{ $event->team_left->name }}</div>
						</div>
						<div class="in-modal-team-select cursor-ptr bd10 d-flex align-items-center justify-content-center flex-column btn-donate-item" data-dismiss="modal" data-toggle="modal" data-target="#clan-item-team-choice-confirm" data-team="{{ $event->team_right_id }}" data-name="{{ $event->team_right->name }}">
							@if($event->team_right->alias === 'na')
							<h2>NA</h2>
							@else
							<img src="{{ asset($event->team_right->logo.'-200.png') }}" class="in-modal-team-avatar w-100">
							@endif
							<div class="in-modal-team-name rajdhani-bold font-size-16">{{ $event->team_right->name }}</div>
						</div>
					</div>
					@elseif($event->league_games->game_id === 2 || $event->league_games->game_id === 3)
					<div class="team-choice-in-modal-wrapper d-flex align-items-center justify-content-center more-than-2">
						@foreach ($event->team_detail as $iTeam)
							<div class="in-modal-team-select cursor-ptr bd10 d-flex align-items-center justify-content-center flex-column btn-donate-item" data-dismiss="modal" data-toggle="modal" data-target="#clan-item-team-choice-confirm" data-team="{{ $iTeam->team_id }}" data-name="{{ $iTeam->name }}">
								@if($iTeam->alias === 'na')
								<h2>NA</h2>
								@else
								<img src="{{ asset($iTeam->logo.'-200.png') }}" class="in-modal-team-avatar w-100">
								@endif
								<div class="in-modal-team-name rajdhani-bold font-size-16 text-center">{{ $iTeam->name }}</div>
							</div>
						@endforeach
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="clan-item-team-choice-confirm">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Konfirmasi pemberian item
				</div>
				<div class="modal-mid">
					Apa kamu yakin ingin berikan item ini?
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="primary bg2333390 bd10 font-size-16 w-100 d-flex justify-content-center item-gifting-amount-confirm has-spinner">
						<span class="default-text">Berikan Item</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="item-gifting-thank-you">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Pemberian Dukungan Berhasil
				</div>
				<div class="modal-mid font-size-16 o5">
					Terima kasih, dukungan kamu berhasil diberikan.
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="groupbet">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32" id="title-groupbet"></div>
				<div class="modal-mid font-size-16 grey-10 mb-20">
					<div class="bet-row">
						<div class="name" id="leftteam-groupbet"></div>
						<div class="bonus" data-toggle='modal' data-target='#modal-odd-bonus' data-dismiss="modal" id="leftbonus-groupbet">100%</div>
						<div id="action-left"></div>
					</div>
					<div class="bet-row">
						<div class="name" id="rightteam-groupbet"></div>
						<div class="bonus" data-toggle='modal' data-target='#modal-odd-bonus' data-dismiss="modal" id="rightbonus-groupbet">100%</div>
						<div id="action-right"></div>
					</div>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Close</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="head-to-head-help">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Mengenai Head to Head Placement
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Kemenangan dihitung dari posisi ranking di round yang lebih tinggi.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Close</a>
				</div>
			</div>
		</div>
	</div>
</section>

@include('includes.mana-ui.footer')

<div class="anti-jitter-spacer"></div>

<style type="text/css">
	/*page specific*/
	@media (min-width: 992px) {
	    .video-stream-container {
	        position: relative;
	        /*padding-bottom: 56.25%;*/ /* 16:9 */
	        padding-bottom: 45%;
	        height: 0;
	    }
	    .video-stream-container iframe, .video-stream-container div.fb-video {
	        position: absolute;
	        top: 0;
	        left: 0;
	        width: 100%;
	        height: 100%;
	    }
	}

	.panel-prediksi .no-odds, .panel-chat .no-odds {
		min-height: 175px;
		display: none;
	}

	.panel-prediksi .no-odds.active, .panel-chat .no-odds.active {
		display: flex;
	}

	.panel-chat .chat-available, .panel-prediksi .prediksi-available {
		display: none;
	}
	.panel-chat .chat-available.active, .panel-prediksi .prediksi-available.active {
		display: block;
	}

	.in-modal-team-select {
		flex: 0 0 30%;
	    margin: 0 20px;
        padding: 10px;
	}
	.in-modal-team-select:hover {
		background: rgb(0 0 0 / 20%);
	}

	.more-than-2 {
		flex-wrap: wrap;
	}
	.more-than-2 .in-modal-team-select {
		flex: 0 0 30%;
	    margin: 0 20px;
        padding: 10px;
	}
	@media (max-width: 576px) {
    	.in-modal-team-select {
    		flex: 0 0 40%;
		}

		.more-than-2 .in-modal-team-select {
			flex: 0 0 25%;
		}
	}
	.odds-return-info {
		line-height: 48px;
		height: 48px;
		padding: 0 20px;
	}
	.odds-return-info-right {
		right: 20px;
	}
	.clan-item-single {
		flex: 0 0 25%;
	}
	.clan-item-single:hover .clan-item-box-inner {
	    background: rgb(0 0 0 / 30%);
	}
	.clan-item-box-inner {
		margin: 10px;
	    background: rgb(0 0 0 / 20%);
	    border-radius: 10px;
	    width: 90%;
	}
	@media (max-width: 576px) {
    	.clan-item-single {
    		flex: 0 0 33.33%;
    	}
	}
	.clan-item-avatar {
		width: 70px;
		height: 70px;
		margin: 10px 0;
	    padding: 10px;
	}
	.clan-item-single-price {
		line-height: 30px;
		padding: 0 15px;
		width: 100%;
		text-align: center;
	}
	.clan-item-single-price .icon.cur16.cur-right {
		margin-left: 3px;
	}
	.chat-text-enter-button {
		height: 50px;
	    flex: 0 0 50px;
	    background: #2196F3;
	    border-radius: 100px;
	    margin-left: 10px;
	}
	.chat-text-enter-button.disabled {
	    opacity: 0.5;
		cursor: default;
	}
	.chat-text-enter-button .icon {
		width: 40px;
		opacity: 0.8;
	}
	.chat-text-enter-button:hover {
	    background: #42A5F5;
	}
	.chat-text-enter-button:active {
	    background: #1e88e5;
	}
	.chat-text-input {
		background: rgb(255 255 255 / 40%);
	    border: 0;
	    line-height: 50px;
	    height: 50px;
	    padding: 0 20px;
	    flex: 1;
	}
	.chat-text-input:active,
	.chat-text-input:focus,
	.chat-text-input:hover {
	    border: 0;
	    outline: none;
	}
	.chat-text-input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
	  color: rgb(0 0 0 / 50%);
	}

	.chat-text-input:-ms-input-placeholder { /* Internet Explorer 10-11 */
	  color: rgb(0 0 0 / 50%);
	}

	.chat-text-input::-ms-input-placeholder { /* Microsoft Edge */
	  color: rgb(0 0 0 / 50%);
	}
	.chat-container {
		max-height: 500px;
		overflow-x: auto;
		margin-bottom: 20px;
	}
	@media (max-width: 800px) {
	    .chat-container {
	    	max-height: 400px;
	    }
	}
	/* width */
	.chat-container::-webkit-scrollbar {
	  width: 10px;
	  position: relative;
	}
	/* Track */
	.chat-container::-webkit-scrollbar-track {
	  background: #00000033;
	}
	/* Handle */
	.chat-container::-webkit-scrollbar-thumb {
	  background: #00000099;
	}
	/* Handle on hover */
	.chat-container::-webkit-scrollbar-thumb:hover {
	  background: #555;
	}
	.chat-blob {
		margin-bottom: 20px;
		position: relative;
		font-size: 14px;
	}
	.chat-blob.system {
		background: unset;
		padding: 0;
	}
	.chat-blob.member {
		padding: 15px 50px 20px 20px;
	    background: rgb(0 0 0 / 40%);
	}
	.chat-blob.system .writer {
		color: #00FFFF;
	}
	.chat-author {
		color: #F44336;
	}
	.chat-rank {
		position: absolute;
		right: 15px;
		top: 15px;
		width: 22px;
		font-size: 12px;
	}
	.chat-time {
		position: absolute;
		right: 15px;
		bottom: 20px;
		opacity: 0.3;
		font-size: 14px;
	}
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
	.event-view-section-buttons {
		margin-bottom: 20px;
	}
	.event-view-button-section {
		flex: 0 0 25%;
	}
	.event-view-feature-button {
		border-radius: 50px;
		background-color: rgb(255 255 255 / 10%);
		height: 60px;
		width: 60px;
		position: relative;
		transition: all 0.1s ease-in-out;
	}
	.event-view-feature-button.new-dot:after {
	    content: " ";
        width: 15px;
        height: 15px;
        background: #e91e63;
        border: 2px solid rgb(255 255 255 / 90%);
        position: absolute;
        right: 2px;
        top: 2px;
        border-radius: 50px;
        opacity: 0.9;
	}
	.event-view-feature-button:hover {
		background-color: rgb(255 255 255 / 20%);
	}
	.event-view-feature-button.active {
		background-color: #512da8;
	}
	.event-view-feature-button.active .icon {
		opacity: 0.9;
	}
	.event-view-feature-button .icon {
		opacity: 0.5;
	}

	/*event panel*/
	.event-panel {
		padding: 25px 20px;
		display: none;
	}
	.event-panel.active {
		display: block;
	}
	.event-panel h3 {
		margin-top: 5px;
		margin-bottom: 30px;
	}
	.event-panel.panel-cart {
		padding: 0px;
	}

	.event-panel.panel-gift {
		padding: 0px;
	}

	/*odds table*/

	.odds-item {
		margin-bottom: 10px;
	}
	.odds-section {
		margin-bottom: 30px;
	}
	.odds-section h4 {
		margin-bottom: 15px;
	}
	.odds-item-row {
		padding: 10px 14px;
		flex: 1 1 33.33%;
		margin-left: -2px;
		font-size: 12px;
	}
	.odds-item-bonus {
		margin-left: 10px;
		flex: 0 0 21%;
	}
	.locked-odds {
		width: 16px;
		opacity: 0.5;
		transform: scale(1.2) !important;
		position: relative;
	    top: -1px;
	}
	.cart-item-amount {
		right: 0;
		top: 0;
	}
	.prediction-card-cancel .spinner-border {
		flex: 0 0 25px;
	    height: 25px;
	    opacity: 0.5;
	    display: none;
	}
	.prediction-card-cancel.loading .spinner-border {
	    display: block;
	}
	.prediction-card-cancel.loading .icon {
	    display: none;
	}
	.odds-item-title {
		flex: 0 0 100%;
		margin-bottom: 5px;
	}
	.prediction-card {
		margin-bottom: 20px;
		display: none;
	}
	.prediction-card.active {
		margin-bottom:20px;
		display: block;
	}
	.prediction-card-meta {
		padding: 12px 20px;
	}
	.prediction-card-meta-status {
		right: 20px;
	    font-size: 12px;
	    text-transform: uppercase;
	    letter-spacing: 1px;
	}
	.prediction-card-meta-status .icon {
		width: 14px;
	    position: relative;
	    top: -2px;
	    opacity: 0.5;
	    margin-left: 2px;
	}
	.prediction-card-cancel {
		right: 20px;
		width: 35px;
	    height: 35px;
	}
	.prediction-card-cancel:hover {
		background: rgb(255 255 255 / 20%);
	}
	.prediction-card-cancel:active {
		background: rgb(255 255 255 / 30%);
	}
	.prediction-card.no-prediction {
		min-height: 225px;
		display: none;
	}
	.prediction-card.no-prediction.active {
		display: block;
	}
	.prediction-card-details {
		padding: 15px 20px 10px 20px;
	}
	.in-panel-total-bet {
		padding: 12px 16px;
		margin-bottom: 10px;
		display: none;
	}
	.in-panel-total-bet.active {
		display: flex;
	}
	.total-bet-left {
		flex: 1 1 70%;
	}
	.total-bet-right {
		flex: 1 1 30%;
	}
	.bet-confirm {
		margin-top: 20px;
	}
	.bet-confirm a {
		padding: 15px;
	    font-weight: 700;
	}

	.groupbet-item {
		cursor: pointer;
		position: relative;
	}
	.groupbet-item.odds-item-name {
		padding: 13px 14px;
	}
	.groupbet-item .icon {
		height: 20px;
		width: 20px;
		position: absolute;
		right: 15px;
		top: 50%;
		transform: translate(0,-50%);
	}
	.modal-bet-row {
		display: flex;
		flex-direction: row;
		margin-bottom: 10px;
	}
	.modal-bet-row .item,
	.modal-bet-row .bonus,
	.modal-bet-row .action {
		padding: 10px 14px;
		background: rgb(0 0 0 / .3);
		border-radius: 50px;
		font-size: 12px;
		display: flex;
		align-items: center;
	}
	.modal-bet-row .item {
		flex: 1 1 33.33%;
		color: rgb(255 255 255 / .7);
		margin-left: -2px;
	}
	.modal-bet-row .bonus {
		font-family: 'poetsenone-reg';
		flex: 0 0 21%;
		margin-left: 10px;
		justify-content: center;
		color: rgb(255 255 255 / .6);
	}
	.modal-bet-row .action {
		background: rgb(233 33 90 / 75%);
	    flex: 0 0 10%;
	    margin-left: 10px;
		justify-content: center;
	}
	.modal-bet-row .action .icon {
		width: 22px;
		opacity: 0.5;
	}
</style>
<style type="text/css">
	/*media*/

</style>
<style>
	.event-card {
		display: none;
	}

	.event-card.active {
		display: block;
	}

	.mdl-curr {
		width: 16px;
		position: relative;
		top: -1px;
	}

	.chat-message .team-name {
        font-weight: 800;
        font-size: 12px;
        text-transform: uppercase;
        background: rgba(0,0,0,0.6);
        padding: 2px 8px 3px 8px;
        border-radius: 7px;
	}

	.chat-message .inchat-item {
        width: 18px;
		position: relative;
		margin-left: 5px;
        top: -2px;
	}
</style>
<style type="text/css">
	.bet-area {
		margin-bottom: 30px;
	}
	.bet-area h4 {
		opacity: .5;
		font-size: 16px;
		margin-bottom: 15px;
		position: relative;
	}

	.bet-area h4 .meta-info {
		position: absolute;
		right: 5px;
		top: 50%;
		transform: translate(0,-50%);
		font-size: 10px;
		cursor: pointer;
	}
	.bet-row {
		display: flex;
		flex-direction: row;
		margin-bottom: 10px;
	}
	.bet-row .name,
	.bet-row .bonus,
	.bet-row .action,
	.bet-row .info,
	.bet-row .group {
		padding: 10px 14px;
		background: rgb(0 0 0 / .3);
		border-radius: 50px;
		font-size: 12px;
		display: flex;
		align-items: center;
	}
	.bet-row .name {
		flex: 1 1 33.33%;
		color: rgb(255 255 255 / .7);
		margin-left: -2px;
	}
	.bet-row .bonus {
		font-family: 'poetsenone-reg';
		flex: 0 0 21%;
		margin-left: 10px;
		justify-content: center;
		color: rgb(255 255 255 / .6);
		cursor: pointer;
	}
	.bet-row .action {
		background: rgb(233 33 90 / 75%);
		flex: 0 0 10%;
		margin-left: 10px;
		justify-content: center;
		cursor: pointer;
	}
	.action.locked {
		background: rgb(0 0 0 / .3);
	}
	.bet-row .action .icon {
		width: 18px;
		height: 18px;
		opacity: 0.5;
	}
	.action.locked .icon {
		width: 18px;
		height: 18px;
		opacity: 0.5;
	}
	.bet-row .name:hover,
	.bet-row .bonus:hover,
	.bet-row .group:hover,
	.bet-row .action.locked:hover {
		background: rgb(0 0 0 / .5);
	}
	.bet-row .action:hover {
		background: rgb(233 33 90 / 1);
	}

	/*info*/
	.bet-row .info {
		flex: 1 1 100%;
		color: rgb(255 255 255 / .5);
		background: rgb(255 255 255 / .1);
		margin-left: -2px;
	}

	/*group*/
	.bet-row .group {
		flex: 1 1 100%;
		color: rgb(255 255 255 / .7);
		margin-left: -2px;
		position: relative;
		cursor: pointer;
		display: block;
	}
	.bet-row .group .icon {
		height: 20px;
		width: 20px;
		position: absolute;
		right: 15px;
		top: 50%;
		transform: translate(0,-50%) rotate(-90deg);
		opacity: .3;
	}
	.bet-row .group .logo {
		height: 20px;
		width: 20px;
	}

	.extra-bonus {
		display: none;
	}
</style>
@endsection

@section('js')
<!-- bingo -->
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

	var ranks = '';
	var ranksChat = '';
	var ranksLogo = "{{ (Auth::user() && Auth::user()->rank_id >= $silver_rank) ? asset(Auth::user()->ranks->logo) : ''}}";
	if(ranksLogo !== '') {
		ranks = "<img src='" + ranksLogo + "' class='chat-rank'>"
		ranksChat = "<img src='" + ranksLogo + "' class='chat-rank'>";
	}

	$(document).ready(function() {
		fetchData();
		setInterval(
            function(){
                fetchData();
            }, 3000
        );

		// page specific scripts

		$('body').on('click', '.bet-row .bonus', function(e) {
			e.preventDefault();

			var thisBingo = $(this).attr('data-bonus-modal');
			var totalBonusBingo = parseInt(thisBingo) + parseInt(userBonusBingo);


			$('#extra-bonus').text(thisBingo+'% + '+userType+' bonus '+userBonusBingo+'% = '+totalBonusBingo+'%')
			$('#extra-bonus').show();
		})

		// panel buttons
		$('body').on('click', '.event-view-feature-button', function() {

			var target = $(this).attr('data-target');
			var target2 = $('.event-view-feature-button');
			var target3 = $('.event-panel');

			if (!$(this).hasClass('active')) {
				target2.removeClass('active');
				$(this).addClass('active');
			}

			target3.removeClass('active');
			$('.'+target).addClass('active');

			// position the screen to the buttons
			// adjustScreen("ux-anchor-panel-buttons",20);

			if(target === 'panel-chat') {
				$('.chat-container').scrollTop(100000);
			}
		});

		// add bet temporary
		$('body').on('click', '.odds-item-action', function(e) {
			if($(this).hasClass('locked')) {
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

			var target = $('.event-view-feature-button[data-target="panel-cart"]');
			var target2 = $('.event-panel.panel-cart');
			var target3 = $('.prediction-card.no-prediction');
			var target4 = $('#odds-nominal-choice');
			var target5 = $('.bet-buy-btn');
			var target6 = $('.in-panel-total-bet');
			var target7 = $('.prediction-card');
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
			var target4 = $('.event-view-feature-button[data-target="panel-cart"]');
            var target5 = $('.event-panel.panel-cart');
			var target6 = $('.prediction-card.no-prediction');
			var target7 = $('#convert-lp-to-bp');

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
						console.log(result);
						target7.modal('hide');
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

		$('#btn-list-prediction').on('click', function(e) {
			e.preventDefault();

			var target = $('#bet-buy-thank-you');
			var target2 = $('.event-view-feature-button[data-target="panel-cart"]');
			var target3 = $('.event-panel.panel-cart');
			var target4 = $('.in-panel-total-bet');
			var target5 = $('.prediction-card');
			var target6 = $('.prediction-card.no-prediction');

			target.modal('hide');

			$('.event-view-feature-button').removeClass('active');
			$('.event-panel').removeClass('active');

			target2.addClass('active new-dot');
			target3.addClass('active');
			target4.addClass('active');
			target5.addClass('active');
			target6.removeClass('active d-flex');
		})

		function adjustScreen(elementId,offsetY){
			var uxButtonsVerticalPosition = document.getElementById("ux-anchor-panel-buttons").offsetTop;
			$(window).scrollTop(+uxButtonsVerticalPosition-20);
		};
	})
</script>
<!-- end of bingo -->

<!-- donate item -->
<script>
	var itemId = '';
	var itemLogo = '';
	var teamId = '';
	var teamName = '';
	var user = "{{ Auth::id() }}";
	$('body').on('click', '.clan-item-single', function(e) {
		e.preventDefault();

		itemId = $(this).attr('data-item');
		itemLogo = $(this).attr('data-logo');
	});

	$('body').on('click', '.btn-donate-item', function(e) {
		e.preventDefault();

		teamId = $(this).data('team');
		teamName = $(this).data('name');
	});

	// item gifting confirm via modal
	$('body').on('click', '.item-gifting-amount-confirm', function(e) {
		e.preventDefault();

		var target = $('.item-gifting-amount-confirm');
		var target2 = $('#item-gifting-thank-you');
		var target3 = $('#clan-item-team-choice-confirm');
		var target4 = $('.event-view-feature-button');
		var target5 = $('.event-panel');
		var target6 = $('.event-panel.panel-chat');
		var target7 = $('.event-view-feature-button[data-target="panel-chat"]');
		var target8 = $('.chat-container #data-chats');

		if(user === '') {
			target3.modal('hide');

			$('#modal-odd-error').modal('show');
			$('#modal-odd-error-msg').text('Kamu butuh login untuk melakukan itu.');

			return false;
		}

		// show spinner
		$(this).addClass('loading');
		var dt = new Date();
		var time = dt.getHours() + ":" + dt.getMinutes();
		var msgToDB = '<span class="body"> supported <span class="team-name">'
				+ teamName +
			'</span> ' +
			'with <img src='+itemLogo+' class="inchat-item">' +
			'</span>';

		var msg = '<div class="chat-blob member bd10"><div class="chat-author poetsenone-reg">{{ Auth::user()->username ?? "guest" }}</div> <div class="chat-message">' + msgToDB + '</div>' + ranksChat + '<div class="chat-time">'+ time +'</div></div>';

		setTimeout(function() {
			// do db work here
			$.ajax({
				url: "{{ url('ajax/donate-items/'.$event->id) }}",
				method: 'post',
				data : {
					item_id : itemId,
					team_id : teamId,
					message : msgToDB
				},
				success: function(result) {
					if(result.status === 'error') {
						if(result.message === "You don't have enough LP") {
							$('#not-enough-LP-donate').modal('show');
						} else {
							$('#modal-odd-error').modal('show');
							$('#modal-odd-error-msg').text(result.message)
						}

						target.removeClass('loading');
						target3.modal('hide');
					} else {
						// $('#total-lp').text(result.total_lp);
						target8.append(msg).scrollTop(100000);

						// reset modal button
						target.removeClass('loading');

						// hide selection modal
						target3.modal('hide');

						// close other panels and buttons
						target4.removeClass('active');
						target5.removeClass('active');

						// open and topscroll the chat panel
						target6.addClass('active');
						target7.addClass('active new-dot');
						target8.scrollTop(100000);

						if(result.quest_achieve === 'success') {
							$('#modal-prediksi-donation').modal('show');
							$('.amt-coin').text(result.total_coin);
							$('.amt-achieve').text(result.total_achievement);
						} else {
							target2.modal('show');
						}
					}
				}
			})
		}, 1000);
	});
</script>
<!-- end of donate item -->

<!-- chats -->
<script>
	$('.chat-text-input').keypress( function(e) {
		if(e.which == 13){
            $('.chat-text-enter-button').click();
		}
	});

	$('.chat-text-enter-button').on('click', function(e) {
		var target = $('.chat-container #data-chats');
		var target2 = $('.event-view-feature-button[data-target="panel-chat"]');

		var inputVal = $('.chat-text-input').val();
		var dt = new Date();
		var time = dt.getHours() + ":" + dt.getMinutes();
		if (inputVal.length != 0 || inputValMB.length !=0) {
			if(inputVal.length == 0) {
				inputVal = inputValMB
			}

			var msg = '<div class="chat-blob member bd10"><div class="chat-author poetsenone-reg">{{ Auth::user()->username ?? "guest" }}</div> <div class="chat-message"><span class="body">'+inputVal+'</span></div>' + ranksChat + '<div class="chat-time">'+ time +'</div></div>';
			var msgToDB = '<span class="body">'+inputVal+'</span>';
			target.append(msg).scrollTop(100000);
			$('.chat-text-input').val('').focus();

			$.ajax({
				url: "{{ url('ajax/event-chats/'.$event->id) }}",
				method: 'post',
				data: {
					message: msgToDB
				},
				success: function(result) {
					if(result.status === 'success') {
						if(!target2.hasClass('new-dot')) {
							target2.addClass('new-dot');
						}
					}
				}
			})
		}

		$(this).focus();

		$('.chat-container').scrollTop(1000000);

	})
</script>
<!-- end of chats -->

<script>
var streamingLink = "";
function fetchData() {
	$.ajax({
		url: "{{ url('ajax/get-data-event-detail/'.$event->id) }}",
		method: 'get',
		success: function(result) {
			if(result.event_type === 'DONE') {
				location.reload();
			}

			if(streamingLink !== result.streaming_link) {
				streamingLink = result.streaming_link;
				$('.live-stream-feed').html(streamingLink);
			}

			if(result.card_detail !== '') {
				$('#card-details').html(result.card_detail);
			}

			if(result.event_bingo === '') {
				if($('.event-view-feature-button[data-target="panel-prediksi"]').hasClass('new-dot')){
					$('.event-view-feature-button[data-target="panel-prediksi"]').removeClass('new-dot');
				}
				$('.panel-prediksi .no-odds').addClass('active');
			} else {
				$('.event-view-feature-button[data-target="panel-prediksi"]').addClass('new-dot');
				$('#data-rules').html(result.event_bingo);
				if($('.panel-prediksi .no-odds').hasClass('active')) {
					$('.panel-prediksi .no-odds').removeClass('active');
				}

				$('.panel-prediksi .prediksi-available').addClass('active');
			}
			if(result.enable_chats == 0) {
				if(!$('.panel-chat .no-odds').hasClass('active')) {
					$('.panel-chat .no-odds').addClass('active');
				}
				$('.panel-chat .chat-available').removeClass('active');
			} else {
				if(!$('.panel-chat .chat-available').hasClass('active')) {
					$('.panel-chat .chat-available').addClass('active');
				}
				$('.panel-chat .no-odds').removeClass('active');
			}

			$('#data-chats').html(result.chats);
			if(result.chats === '') {
				if($('.event-view-feature-button[data-target="panel-chat"]').hasClass('new-dot')){
					$('.event-view-feature-button[data-target="panel-chat"]').removeClass('new-dot');

					$('.chat-container').scrollTop(1000000);
				}
			} else {
				$('.event-view-feature-button[data-target="panel-chat"]').addClass('new-dot');
				$('.prediction-card.no-prediction').removeClass('active d-flex');
			}

			if(result !== 'error') {
				$('#data-slips').html(result.slips);
				if(result.slips === '') {
					$('.prediction-card.no-prediction').addClass('active d-flex');
					if($('.event-view-feature-button[data-target="panel-cart"]').hasClass('new-dot')){
						$('.event-view-feature-button[data-target="panel-cart"]').removeClass('new-dot');
					}

					if($('.in-panel-total-bet').hasClass('active')) {
						$('.in-panel-total-bet').removeClass('active');
					}
				} else {
					$('.in-panel-total-bet').addClass('active');
					$('.event-view-feature-button[data-target="panel-cart"]').addClass('new-dot');
					$('.prediction-card.no-prediction').removeClass('active d-flex');
				}

				$('.total-bet .total-bp').text(result.subtotal_slip_bp);
				$('.total-bet .bonus-prediction').text(result.total_slip_bp);
			}

			$('.amt-lp').text(result.total_lp);
			$('.amt-bp').text(result.total_bp);
			$('.amt-p').text(result.prediction);
			$('.amt-cp').text(result.correct_prediction);
			$('#data-quests').html(result.data_quests);

			if(result.event_type === 'ONGOING') {
				if($('.event-card.upcoming').hasClass('active')) {
					$('.event-card.upcoming').removeClass('active');
				}

				$('.event-card.live').addClass('active');
				$('.event-card.live .left-score').text(result.team_left_score)
                $('.event-card.live .right-score').text(result.team_right_score)
			} else if(result.event_type === 'UPCOMING') {
				if($('.event-card.live').hasClass('active')) {
					$('.event-card.live').removeClass('active');
				}

				$('.event-card.upcoming').addClass('active');
			}
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
@endsection
