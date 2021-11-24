@extends('layouts.mana-ui')

@section('page_title', "TimKamu - Tempat nongkrongnya anak e-sports")
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
					<div class="video-stream-container">
						<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>
					</div>
				</div>
			</div> 
		</div>
	</div>

	<!-- event card -->
	<div class="event-view-cards">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<!-- live event card -->
					<!-- <div class="event-card cursor-ptr bg233339030 bd20 live">
						<div class="event-card-meta d-flex flex-column justify-content-center position-relative">
							<div class="event-card-meta-date font-size-16 font-weight-bold">Fri, 20 Sept</div>
							<div class="event-card-meta-league o5 font-size-16">MPL Regular Season 2020</div>
							<div class="event-card-meta-time o5 rajdhani-bold top-translate-50 font-size-26">LIVE</div>
						</div>
						<div class="event-card-bottom d-flex bg233339030 bd20">
							<div class="col event-card-bottom-left d-flex flex-column align-items-center">
								<img src="{{ asset('img/team-logos/onic-200.png') }}" class="event-card-bottom-right-teampic">
								<div class="event-card-bottom-team-name rajdhani-bold font-size-14">ONIC</div>
							</div>
							<div class="col event-card-bottom-mid bg2333390 bd20 d-flex justify-content-center align-items-center">
								<span class="rajdhani-bold font-size-28 o9">0&nbsp;&nbsp;-&nbsp;&nbsp;0</span>
							</div>
							<div class="col event-card-bottom-right d-flex flex-column align-items-center">
								<img src="{{ asset('img/team-logos/evos-200.png') }}" class="event-card-bottom-right-teampic">
								<div class="event-card-bottom-team-name rajdhani-bold font-size-14">EVOS</div>
							</div>
						</div>
					</div> -->

					<!-- upcoming event card -->
					<!-- <div class="event-card cursor-ptr bg020 bd20">
						<div class="event-card-meta d-flex flex-column justify-content-center position-relative">
							<div class="event-card-meta-date font-size-16 font-weight-bold">Fri, 20 Sept</div>
							<div class="event-card-meta-league o5 font-size-16">MPL Regular Season 2020</div>
							<div class="event-card-meta-time o5 rajdhani-bold top-translate-50 font-size-26">18.30</div>
						</div>
						<div class="event-card-bottom d-flex bg020 bd20">
							<div class="col event-card-bottom-left d-flex flex-column align-items-center">
								<img src="{{ asset('img/team-logos/onic-200.png') }}" class="event-card-bottom-right-teampic">
								<div class="event-card-bottom-team-name rajdhani-bold font-size-14">ONIC</div>
							</div>
							<div class="col event-card-bottom-mid bg020 bd20 d-flex justify-content-center align-items-center">
								<span class="rajdhani-bold font-size-22 o9"><span class="o5">[</span> upcoming <span class="o5">]</span></span>
							</div>
							<div class="col event-card-bottom-right d-flex flex-column align-items-center">
								<img src="{{ asset('img/team-logos/evos-200.png') }}" class="event-card-bottom-right-teampic">
								<div class="event-card-bottom-team-name rajdhani-bold font-size-14">EVOS</div>
							</div>
						</div>
					</div> -->

					<!-- pubgm card -->
					<div class="event-card cursor-ptr bg020 bd20">
						<div class="event-card-meta d-flex flex-column justify-content-center position-relative">
							<div class="event-card-meta-date font-size-16 font-weight-bold">PMPL SEA Finals S2 Day 1</div>
							<div class="event-card-meta-league">Sat, 24 Oct 15.00 WIB</div>
							<div class="event-card-meta-time" style="opacity: 1;">
								<img src="https://timkamu.com/img/game-logos/pubgm.png" style="height:60px;">
							</div>
						</div>
					</div>

				</div>
			</div> 
		</div>
	</div>

	<!-- event view buttons -->
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
							<div class="event-view-feature-button active new-dot cursor-ptr d-flex align-items-center justify-content-center" data-target="panel-prediksi">
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

	<!-- event view panels -->
	<div class="event-view-panels">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="event-panel panel-chat bd20 bg25510 mb-20">

						<!-- no chat card -->
						<!-- <div class="no-odds d-flex align-items-center justify-content-center">
							<span class="o5">Chat belum tersedia untuk event ini</span>
						</div> -->

						<h3 class="rajdhani-bold font-size-24">Livechat</h3>

						<div class="chat-container">
							<div class="chat-blob system">
								<span class="writer o5">[System Message]</span>
								<span class="o5">Timkamu mempromosikan streaming langsung yang bersih dan melakukan inspeksi online 24 jam untuk konten. Setiap pelanggaran yang melanggar hukum, pelanggaran, vulgar, kekerasan, dll. akan dikenakan sanksi. Jangan menstransfer antar visitor untuk menghindari penipuan.</span>
							</div>

							<div class="chat-blob member bd10">
								<div class="chat-author poetsenone-reg">fjahja.dev</div>
								<div class="chat-message">
									hello hello
								</div>
								<img src="{{ asset('img/ranks/ranks-06.png') }}" class="chat-rank">
								<div class="chat-time">15.30</div>
							</div>

							<div class="chat-blob member bd10">
								<div class="chat-author poetsenone-reg">timothy</div>
								<div class="chat-message">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								</div>
								<img src="{{ asset('img/ranks/ranks-06.png') }}" class="chat-rank">
								<div class="chat-time">15.30</div>
							</div>

							<div class="chat-blob member bd10">
								<div class="chat-author poetsenone-reg">fjahja.dev</div>
								<div class="chat-message">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								</div>
								<img src="{{ asset('img/ranks/ranks-06.png') }}" class="chat-rank">
								<div class="chat-time">15.30</div>
							</div>

							<div class="chat-blob member bd10">
								<div class="chat-author poetsenone-reg">fjahja.dev</div>
								<div class="chat-message">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								</div>
								<img src="{{ asset('img/ranks/ranks-06.png') }}" class="chat-rank">
								<div class="chat-time">15.30</div>
							</div>

							<div class="chat-blob member bd10">
								<div class="chat-author poetsenone-reg">fjahja.dev</div>
								<div class="chat-message">
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								</div>
								<img src="{{ asset('img/ranks/ranks-06.png') }}" class="chat-rank">
								<div class="chat-time">15.30</div>
							</div>

							<div class="chat-blob member bd10">
								<div class="chat-author poetsenone-reg">fjahja.dev</div>
								<div class="chat-message">
									Lorem ipsum dolor s
								</div>
								<img src="{{ asset('img/ranks/ranks-06.png') }}" class="chat-rank">
								<div class="chat-time">15.30</div>
							</div>
						</div>

						<!-- <div class="chat-emojis"></div> -->

						<div class="chat-controller d-flex align-items-center">
							<input type="text" class="chat-text-input bd50" placeholder="type something nice...">
							<div class="cursor-ptr scale-onclick chat-text-enter-button scale-onclick d-flex align-items-center justify-content-center">
								<i data-feather="send" class="icon"></i>
							</div>
						</div>
					</div>

					<div class="event-panel panel-prediksi active bd20 bg25510 mb-20">

						<!-- no odds card -->
						<!-- <div class="no-odds d-flex align-items-center justify-content-center">
							<span class="o5">Belum ada prediksi yang bisa kamu berikan</span>
						</div> -->

						<h3 class="rajdhani-bold font-size-24">Prediksi Pertandingan</h3>

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
						</style>

						<section class="bet-area">
							<h4 class="title">Prediksi Skor</h4>
							<div class="bet-row">
								<div class="info">Current value: 200</div>
							</div>
							<div class="bet-row">
								<div class="name">BTR 2 - 0 ONIC</div>
								<div class="bonus">100%</div>
								<div class="action scale-onclick"><img src="{{ asset('icons/arrow-right-white.svg') }}" class="icon"></div>
							</div>
							<div class="bet-row">
								<div class="name">BTR 2 - 0 ONIC</div>
								<div class="bonus">100%</div>
								<div class="action scale-onclick locked"><img src="{{ asset('icons/lock-white.svg') }}" class="icon"></div>
							</div>
						</section>

						<section class="bet-area">
							<h4 class="title">Head to Head Placement Map #1 <div class="meta-info" data-toggle="modal" data-target="#head-to-head-help">INFO</div></h4>
							<div class="bet-row">
								<div class="group" data-toggle="modal" data-target="#groupbet-1">
									BTR <span class="o3 ml-1 mr-1">vs</span> ONIC
									<img src="{{ asset('icons/chevrons-down-white.svg') }}" class="icon">
								</div>
							</div>
						</section>
						
						<!-- odd section -->
						<div class="odds-section">
							<h4 class="font-size-16 o5">Prediksi Skor</h4>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50">
									<span class="o5">BTR 2 - 0 ONIC</span>
								</div>
								<div class="odds-item-bonus odds-item-row cursor-ptr d-flex justify-content-center bg040 bd50 poetsenone-reg font-size-14" data-toggle="tooltip" data-placement="top" title="Bonus yang kamu akan dapatkan">
									<span class="o5">25%</span>
								</div>
								<div class="odds-item-action justify-content-center locked cursor-ptr scale-onclick bg040 odds-item-row d-flex align-items-center bd50">
									<img src="{{ asset('icons/lock-white.svg') }}" class="icon locked-odds" data-toggle="tooltip" data-placement="left" title="Prediksi ini sudah tidak tersedia lagi">
								</div>
							</div>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50">
									<span class="o5">BTR 2 - 0 ONIC</span>
								</div>
								<div class="odds-item-bonus odds-item-row cursor-ptr d-flex justify-content-center bg040 bd50 poetsenone-reg font-size-14" data-toggle="tooltip" data-placement="top" title="Bonus yang kamu akan dapatkan">
									<span class="o5">25%</span>
								</div>
								<div class="odds-item-action justify-content-center cursor-ptr scale-onclick bg233339075 odds-item-row d-flex align-items-center bd50" data-toggle="modal" data-target="#odds-nominal-choice">
									<img src="{{ asset('icons/arrow-right-white.svg') }}" class="icon o5">
								</div>
							</div>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50">
									<span class="o5">BTR 2 - 0 ONIC</span>
								</div>
								<div class="odds-item-bonus odds-item-row cursor-ptr d-flex justify-content-center bg040 bd50 poetsenone-reg font-size-14" data-toggle="tooltip" data-placement="top" title="Bonus yang kamu akan dapatkan">
									<span class="o5">25%</span>
								</div>
								<div class="odds-item-action justify-content-center cursor-ptr scale-onclick bg233339075 odds-item-row d-flex align-items-center bd50" data-toggle="modal" data-target="#odds-nominal-choice">
									<i data-feather="arrow-right" class="icon o5"></i>
								</div>
							</div>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50">
									<span class="o5">BTR 2 - 0 ONIC</span>
								</div>
								<div class="odds-item-bonus odds-item-row cursor-ptr d-flex justify-content-center bg040 bd50 poetsenone-reg font-size-14" data-toggle="tooltip" data-placement="top" title="Bonus yang kamu akan dapatkan">
									<span class="o5">25%</span>
								</div>
								<div class="odds-item-action justify-content-center cursor-ptr scale-onclick bg233339075 odds-item-row d-flex align-items-center bd50" data-toggle="modal" data-target="#odds-nominal-choice">
									<i data-feather="arrow-right" class="icon o5"></i>
								</div>
							</div>
						</div>
						
						<!-- odd section -->
						<div class="odds-section">
							<h4 class="font-size-16 o5">Prediksi Waktu Map #1</h4>
							<div class="odds-item d-flex">
								<div class="odds-item-current odds-item-row d-flex align-items-center bg25510 bd50">
									<span class="o5">Saat ini: 13.07</span>
								</div>
							</div>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50">
									<span class="o5">dibawah 14.01</span>
								</div>
								<div class="odds-item-bonus odds-item-row cursor-ptr d-flex justify-content-center bg040 bd50 poetsenone-reg font-size-14" data-toggle="tooltip" data-placement="top" title="Bonus yang kamu akan dapatkan">
									<span class="o5">100%</span>
								</div>
								<div class="odds-item-action justify-content-center cursor-ptr scale-onclick bg233339075 odds-item-row d-flex align-items-center bd50" data-toggle="modal" data-target="#odds-nominal-choice">
									<i data-feather="arrow-right" class="icon o5"></i>
								</div>
							</div>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50">
									<span class="o5">diatas 14.01</span>
								</div>
								<div class="odds-item-bonus odds-item-row cursor-ptr d-flex justify-content-center bg040 bd50 poetsenone-reg font-size-14" data-toggle="tooltip" data-placement="top" title="Bonus yang kamu akan dapatkan">
									<span class="o5">50%</span>
								</div>
								<div class="odds-item-action justify-content-center cursor-ptr scale-onclick bg233339075 odds-item-row d-flex align-items-center bd50" data-toggle="modal" data-target="#odds-nominal-choice">
									<i data-feather="arrow-right" class="icon o5"></i>
								</div>
							</div>
						</div>
						
						<!-- odd section -->
						<div class="odds-section">
							<h4 class="font-size-16 o5">Head to Head Placement Map #1</h4>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50 groupbet-item" data-toggle="modal" data-target="#groupbet-1">
									<span class="o5">EVOS vs ONIC</span>
									<img src="{{ asset('icons/chevrons-right-red.svg') }}" class="icon">
								</div>
							</div>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50 groupbet-item" data-toggle="modal" data-target="#groupbet-1">
									<span class="o5">BTR vs Dranix</span>
									<img src="{{ asset('icons/chevrons-right-red.svg') }}" class="icon">
								</div>
							</div>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50 groupbet-item" data-toggle="modal" data-target="#groupbet-1">
									<span class="o5">Boom vs Louvre</span>
									<img src="{{ asset('icons/chevrons-right-red.svg') }}" class="icon">
								</div>
							</div>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50 groupbet-item" data-toggle="modal" data-target="#groupbet-1">
									<span class="o5">TP vs Island of Gods</span>
									<img src="{{ asset('icons/chevrons-right-red.svg') }}" class="icon">
								</div>
							</div>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50 groupbet-item" data-toggle="modal" data-target="#groupbet-1">
									<span class="o5">Rb vs Nxl</span>
									<img src="{{ asset('icons/chevrons-right-red.svg') }}" class="icon">
								</div>
							</div>
						</div>
						
						<!-- odd section -->
						<div class="odds-section">
							<h4 class="font-size-16 o5">Head to Head Placement Map #2</h4>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50 groupbet-item" data-toggle="modal" data-target="#groupbet-1">
									<span class="o5">EVOS vs ONIC</span>
									<img src="{{ asset('icons/chevrons-right-red.svg') }}" class="icon">
								</div>
							</div>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50 groupbet-item" data-toggle="modal" data-target="#groupbet-1">
									<span class="o5">BTR vs Dranix</span>
									<img src="{{ asset('icons/chevrons-right-red.svg') }}" class="icon">
								</div>
							</div>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50 groupbet-item" data-toggle="modal" data-target="#groupbet-1">
									<span class="o5">Boom vs Louvre</span>
									<img src="{{ asset('icons/chevrons-right-red.svg') }}" class="icon">
								</div>
							</div>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50 groupbet-item" data-toggle="modal" data-target="#groupbet-1">
									<span class="o5">TP vs Island of Gods</span>
									<img src="{{ asset('icons/chevrons-right-red.svg') }}" class="icon">
								</div>
							</div>
							<div class="odds-item d-flex">
								<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50 groupbet-item" data-toggle="modal" data-target="#groupbet-1">
									<span class="o5">Rb vs Nxl</span>
									<img src="{{ asset('icons/chevrons-right-red.svg') }}" class="icon">
								</div>
							</div>
						</div>
					</div>

					<div class="event-panel panel-cart">

						<!-- prediction panel estimate -->
						<div class="in-panel-total-bet bd50 bg040">
							<div class="total-bet-left">Total BP yang diberikan</div>
							<div class="total-bet-right text-right">
								<span class="money money-14 right">4,249<img src="{{ asset('img/currencies/bp.svg') }}"></span>
							</div>
						</div>
						<div class="in-panel-total-bet bd50 bg040">
							<div class="total-bet-left">Total estimasi pendapatan</div>
							<div class="total-bet-right text-right">
								<span class="money money-14 right">14,249<img src="{{ asset('img/currencies/bp.svg') }}"></span>
							</div>
						</div>

						<!-- purchased prediction -->
						<!-- prediction slip gk ada yang unconfirmed -->
						<div class="prediction-card confirmed bg8345168 bd20 mt-20">
							<div class="prediction-card-meta d-flex flex-column justify-content-center position-relative">
								<div class="prediction-card-meta-name">BTR vs ONIC</div>
								<div class="prediction-card-meta-time o5">20 Sept 2020 18.30</div>
								<div class="prediction-card-meta-status o5 position-absolute top-translate-50 cursor-ptr" data-toggle="tooltip" data-placement="top" title="Hasil dari prediksi ini akan keluar setelah pertandingan berakhir">
									Waiting
									<img src="{{ asset('icons/clock-white.svg') }}" class="icon">
								</div>
							</div>
							<div class="prediction-card-details bg25510 bd20">
								<div class="odds-item d-flex flex-wrap">
									<div class="odds-item-title position-relative">
										<h4 class="font-size-16 o5">Prediksi Waktu Map #1</h4>
										<div class="cart-item-amount position-absolute">
											<span class="money money-14 right">4,249<img src="{{ asset('img/currencies/bp.svg') }}"></span>
										</div>
									</div>
									<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50">
										<span class="o5">diatas 14.01</span>
									</div>
									<div class="odds-item-bonus odds-item-row cursor-ptr d-flex justify-content-center bg040 bd50 poetsenone-reg font-size-14" data-toggle="tooltip" data-placement="top" title="Bonus yang kamu akan dapatkan">
										<span class="o5">50%</span>
									</div>
								</div>
							</div>
						</div>
						<div class="prediction-card confirmed bg8345168 bd20 mt-20">
							<div class="prediction-card-meta d-flex flex-column justify-content-center position-relative">
								<div class="prediction-card-meta-name">BTR vs ONIC</div>
								<div class="prediction-card-meta-time o5">20 Sept 2020 18.30</div>
								<div class="prediction-card-meta-status o5 position-absolute top-translate-50 cursor-ptr" data-toggle="tooltip" data-placement="top" title="Hasil dari prediksi ini akan keluar setelah pertandingan berakhir">
									Waiting
									<img src="{{ asset('icons/clock-white.svg') }}" class="icon">
								</div>
							</div>
							<div class="prediction-card-details bg25510 bd20">
								<div class="odds-item d-flex flex-wrap">
									<div class="odds-item-title position-relative">
										<h4 class="font-size-16 o5">Prediksi Waktu Map #1</h4>
										<div class="cart-item-amount position-absolute">
											<span class="money money-14 right">4,249<img src="{{ asset('img/currencies/bp.svg') }}"></span>
										</div>
									</div>
									<div class="odds-item-name odds-item-row d-flex align-items-center bg040 bd50">
										<span class="o5">diatas 14.01</span>
									</div>
									<div class="odds-item-bonus odds-item-row cursor-ptr d-flex justify-content-center bg040 bd50 poetsenone-reg font-size-14" data-toggle="tooltip" data-placement="top" title="Bonus yang kamu akan dapatkan">
										<span class="o5">50%</span>
									</div>
								</div>
							</div>
						</div>

						<!-- no prediction card -->
						<div class="prediction-card no-prediction active bg25510 bd20 d-flex align-items-center justify-content-center">
							<span class="o5">Belum ada prediksi yang kamu berikan</span>
						</div>
					</div>

					<div class="event-panel panel-gift">
						<div class="clan-item-shelf d-flex flex-wrap justify-content-start">

							<?php for ($i=1; $i <= 8; $i++): ?>
								<div class="clan-item-single cursor-ptr d-flex justify-content-center align-items-center flex-column" data-toggle="modal" data-target="#clan-item-team-choice">
									<div class="clan-item-box-inner d-flex justify-content-center align-items-center flex-column">
										<img src="<?php echo asset('img/items/items-0'.$i.'.png'); ?>" class="clan-item-avatar">
										<div class="clan-item-single-price bg020 bd20">
											<span class="money money-14 right">2,349<img src="{{ asset('img/currencies/lp.svg') }}"></span>
										</div>
									</div>
								</div>
							<?php endfor; ?>

						</div>
					</div>

				</div>
			</div> 
		</div>
	</div>

</section>

<section id="page-modals">
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="odds-nominal-choice">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<div class="odds-nominal-enter mb-20">
					    <input type="number" class="form-control" value="9">
					</div>
					<div class="odds-return-info position-relative bd50 bg040 mb-10">
						<div class="odds-return-info-left o5">Bonus prediksi benar</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 white-09">25%</span>
						</div>
					</div>
					<div class="odds-return-info position-relative bd50 bg040 mb-10">
						<div class="odds-return-info-left o5">Estimasi pendapatan</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 right white-09 top-01">249<img src="{{ asset('img/currencies/bp.svg') }}"></span>
						</div>
					</div>
					<div class="odds-return-info position-relative bd50 bg040 mb-20">
						<div class="odds-return-info-left o5">Saldo BP</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 right white-09 top-01">600<img src="{{ asset('img/currencies/bp.svg') }}"></span>
						</div>
					</div>
					<div class="odds-nominal-choices d-flex flex-wrap">
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">9<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">18<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">45<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">90<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">225<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">450<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">900<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">1350<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
					    <div class="odds-choice-item scale-onclick"><span class="money money-14 right white-09">1800<img src="{{ asset('img/currencies/bp.svg') }}"></span></div>
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
	<div class="modal mana-ui" tabindex="-1" role="dialog" id="bet-buy-thank-you">
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
					<div class="team-choice-in-modal-wrapper d-flex align-items-center justify-content-center">
						<div class="in-modal-team-select cursor-ptr bd10 d-flex align-items-center justify-content-center flex-column" data-dismiss="modal" data-toggle="modal" data-target="#clan-item-team-choice-confirm">
							<img src="{{ asset('img/team-logos/onic-200.png') }}" class="in-modal-team-avatar w-100">
							<div class="in-modal-team-name rajdhani-bold font-size-16">ONIC</div>
						</div>
						<div class="in-modal-team-select cursor-ptr bd10 d-flex align-items-center justify-content-center flex-column" data-dismiss="modal" data-toggle="modal" data-target="#clan-item-team-choice-confirm">
							<img src="{{ asset('img/team-logos/evos-200.png') }}" class="in-modal-team-avatar w-100">
							<div class="in-modal-team-name rajdhani-bold font-size-16">EVOS</div>
						</div>
					</div>
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
					<a href="#" class="mana-btn-54 mana-btn-red item-gifting-amount-confirm has-spinner">
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
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="not-enough-LP">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Loyalty Points Tidak Cukup
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>
						Saat ini kamu memiliki <span class="money money-14 right money-inline white-09">2,349<img src="{{ asset('img/currencies/lp.svg') }}"></span> dan <span class="money money-14 right money-inline white-09">12,349<img src="{{ asset('img/currencies/bp.svg') }}"></span>
					</p>
					<p>
						Dukungan yang kamu akan berikan memerlukan <span class="money money-14 right money-inline white-09">142,349<img src="{{ asset('img/currencies/bp.svg') }}"></span>
					</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Recharge LP</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="groupbet-1">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Head to Head Placement Map #1
				</div> 
				<div class="modal-mid font-size-16 grey-10 mb-0">
					<section class="bet-area">
						<div class="bet-row">
							<div class="name">BTR</div>
							<div class="bonus">100%</div>
							<div class="action scale-onclick"><img src="{{ asset('icons/arrow-right-white.svg') }}" class="icon"></div>
						</div>
						<div class="bet-row">
							<div class="name">ONIC</div>
							<div class="bonus">100%</div>
							<div class="action scale-onclick locked"><img src="{{ asset('icons/lock-white.svg') }}" class="icon"></div>
						</div>
					</section>
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
@include('includes.mana-ui.modals')

<div class="anti-jitter-spacer"></div>


<style type="text/css">
	/*page specific*/
	.no-odds {
		min-height: 175px;
	}

	@media (min-width: 992px) {
	    .video-stream-container {
	        position: relative;
	        /*padding-bottom: 56.25%;*/ /* 16:9 */
	        padding-bottom: 45%;
	        height: 0;
	    }
	    .video-stream-container iframe {
	        position: absolute;
	        top: 0;
	        left: 0;
	        width: 100%;
	        height: 100%;
	    }
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
	
	.clan-item-single {
		flex: 0 0 25%;
	}
	.clan-item-box-inner {
		margin: 10px;
	    background: rgb(0 0 0 / 20%);
	    border-radius: 10px;
	    width: 90%;
	}
	.clan-item-single:hover .clan-item-box-inner {
	    background: rgb(0 0 0 / 30%);
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
		color: #e91e63;
	}
	.chat-rank {
		position: absolute;
		right: 15px;
		top: 15px;
		width: 22px;
	}
	.chat-time {
		position: absolute;
		right: 15px;
		bottom: 20px;
		opacity: 0.3;
		font-size: 12px;
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
	.odds-item-action {
		margin-left: 10px;
		flex: 0 0 10%;
	}
	.odds-item-action:hover {
		background: rgb(233 33 90 / 90%);
	}
	.odds-item-action:active {
		background: rgb(233 33 90 / 100%);
	}
	.odds-item-action.locked:hover {
		background: rgb(0 0 0 / 50%);
	}
	.odds-item-action.locked:active {
		background: rgb(0 0 0 / 60%);
	}
	.odds-item-action .icon {
		width: 16px;
		transform: scale(1.4);
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
		width: 15px;
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
@endsection

@section('js')
<script>
	$(document).ready(function() {

		// page specific scripts

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
		});
		
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
			var target8 = $('.event-view-feature-button');
			var target9 = $('.event-panel');

			// show spinner
			$(this).addClass('loading');

			setTimeout(function() {
			    // do db work here

			    // hide modal
			    target4.modal('hide');

			    // do various things
			    target8.removeClass('active');
			    target9.removeClass('active');
			    target2.addClass('active');
			    target.addClass('active new-dot');
			    target6.addClass('active');
			    target7.addClass('active');

			    target3.removeClass('active d-flex');

			    // position the screen to the buttons
			    // adjustScreen("ux-anchor-panel-buttons",20);

			    // reset modal button
			    target5.removeClass('loading');
			}, 1000);  
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
			var target8 = $('.chat-container');

			// show spinner
			$(this).addClass('loading');

			setTimeout(function() {
			    // do db work here

			    // reset modal button
			    target.removeClass('loading');

			    // hide selection modal
				target3.modal('hide');

				// close other panels and buttons
				target4.removeClass('active');
				target5.removeClass('active');

				// open and topscroll the chat panel
				target6.addClass('active');
				target7.addClass('active');
				target8.scrollTop(100000);

			    // show thank you
				target2.modal('show');
			}, 1000);  
		});
		
		// groupbet
		$('body').on('click', '.group-bet h4', function(e) {
			e.preventDefault();

			obj = $(this);
			obj2 = $(this).parents('.group-bet');

			if (!obj2.hasClass('active')) {
				obj2.addClass('active'); 
			} else {
				obj2.removeClass('active'); 
			}
		});
		
		// scroll force
		$('body').on('click', '.panel-chat-btn', function() {
			$('.chat-container').scrollTop(100000);
		});
		$('.chat-container').scrollTop(100000);

		function adjustScreen(elementId,offsetY){
			var uxButtonsVerticalPosition = document.getElementById("ux-anchor-panel-buttons").offsetTop;
			$(window).scrollTop(+uxButtonsVerticalPosition-20);
		};

	})
</script>
@endsection