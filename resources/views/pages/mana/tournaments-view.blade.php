@extends('layouts.mana-ui')

@section('page_title', "TimKamu (PTS) - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui tournaments-view')


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
					<h1 class="rajdhani-bold">Timkamu MLBB Opening Tournament</h1>
				</div>
			</div>
		</div>
	</div>

	<!-- page section -->
	<div id="home-promo-cards" class="mb-20">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<a href="{{ asset('img/tournaments/RoyalTournamentSeasonV.jpg') }}" target="_blank"><img src="{{ asset('img/tournaments/RoyalTournamentSeasonV.jpg') }}" class="bd20 w-100 mb-20 scale-onclick"></a>
					<img src="{{ asset('img/tournaments/inside-royal-tournament.png') }}" class="w-100 mb-10 bd20 scale-onclick">
				</div>
			</div>
		</div>
	</div>

	<!-- swiper panel selector -->
	<div id="pulsa-panel" class="mb-20">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="swiper-container">
						<div class="swiper-wrapper">

							<div class="swiper-slide tournament-tab swiper-panel-item active" data-target="panel1">
								<i data-feather="box" class="icon"></i><a href="#" class="active">Informasi</a>
							</div>

							<div class="swiper-slide tournament-tab swiper-panel-item" data-target="panel2">
								<i data-feather="box" class="icon"></i><a href="#">Deskripsi</a>
							</div>

							<div class="swiper-slide tournament-tab swiper-panel-item" data-target="panel3">
								<i data-feather="box" class="icon"></i><a href="#">Jadwal</a>
							</div>

							<div class="swiper-slide tournament-tab swiper-panel-item" data-target="panel4">
								<i data-feather="box" class="icon"></i><a href="#">Peraturan</a>
							</div>

						</div>
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



					<div class="tournament-panel panel1 active">
						<div class="info-block mb-10">
							<div class="row">
								<div class="col-6 pr-1 left">Pendaftaran dibuka</div>
								<div class="col-6 pl-1 right">12 Nov 2020 - 13:00 WIB</div>
							</div>
						</div>
						<div class="info-block mb-10">
							<div class="row">
								<div class="col-6 pr-1 left">Turnamen dimulai</div>
								<div class="col-6 pl-1 right">22 Nov 2020 - 17:00 WIB</div>
							</div>
						</div>

						<div class="info-block mb-10">
							<div class="row">
								<div class="col-6 pr-1 left">Slot</div>
								<div class="col-6 pl-1 right">14 / 120</div>
							</div>
						</div>

						<div class="info-block mb-10">
							<div class="row">
								<div class="col-6 pr-1 left">Biaya pendaftaran</div>
								<div class="col-6 pl-1 right">Rp 40k / member</div>
							</div>
						</div>

						<div class="info-block mb-10">
							<div class="row">
								<div class="col-6 pr-1 left">Lokasi</div>
								<div class="col-6 pl-1 right">Online</div>
							</div>
						</div>

						<div class="info-block mb-10">
							<div class="row">
								<div class="col-6 pr-1 left">Hadiah</div>
								<div class="col-6 pl-1 right">
									1st - Rp 5,000,000 <br>
									2nd - Rp 3,000,000 <br>
									3rd - Rp 1,000,000
								</div>
							</div>
						</div>
					</div>

					<div class="tournament-panel panel2">
						<div class="info-block mb-10">
							<div class="row">
								<div class="col-12 o5 mt-10 mb-10">
									<p>Ditengah pandemi Covid-19 yang telah masuk ke Indonesia sejak bulan Maret hingga sekarang telah merenggut kebebasan beraktivitas kebanyakan orang. Melihat situasi yang seperti ini untuk memberikan hiburan serta mengajak masyarakat untuk tetap #KompakWalauBerjarak, maka AXIS berkolaborasi dengan Yamisok untuk mengadakan AXIS Daily Tournament. </p>

									<p>Ada 3 Game yang akan dipertandingkan dalam turnamen yaitu Mobile Legends , Free Fire dan PUBGM .Axis Daily Tournament akan dibuka pendaftarannya sejak hari ini, 30 November 2020, dan turnamen akan dimulai tanggal 07 Desember -  13 Desember 2020.</p>
								</div>
							</div>
						</div>
					</div>

					<div class="tournament-panel panel3">
						<div class="info-block mb-10">
							<div class="row">
								<div class="col-12 o5 mt-10 mb-10">
									Jadwal Tournament: <br>
									1. Round 1 -(128 besar) : 28 Maret 2020 Lobby Up Pukul 12.30 WIB, Start: 13:00 WIB <br>
									2. Round 2 -(64 besar) :  A.S.A.P <br>
									3. Round 3 -(32 besar) :  A.S.A.P <br>
									4. Round 4 -(16 besar) :  A.S.A.P <br>
									5. Round 5 -(8 besar) :  29 Maret 2020 lobby Up pukul  12.30 WIB, Start: 13.00 WIB <br>
									6. Round 6 -(4 besar) :  A.S.A.P <br>
									7. Round 7 -( FINAL) (BO3) :  A.S.A.P
								</div>
							</div>
						</div>
					</div>

					<div class="tournament-panel panel4">
						<div class="info-block mb-10">
							<div class="row">
								<div class="col-12 o5 mt-10 mb-10">
									1. Format: 1v1, Best of One (BO1) <br>
									2. Game Format: mulai dari babak penyisihan dimainkan dengan format BO1. dan Final dimainkan dengan BO3 <br>
									3. Game Mode: 1v1 Solo Mid (Player yang terlebih dahulu menghancurkan tower pertama atau mendapatkan 2 kill adalah pemenangnya)
								</div>
							</div>
						</div>
					</div>

					<div class="mb-20"></div>

					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick mb-10" data-toggle="modal" data-target="#leader-form">Registrasi sebagai team leader</a>

					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick mb-10" data-toggle="modal" data-target="#team-member-form">Registrasi sebagai team member</a>

					<a href="/mana/tournaments" class="mana-btn-54 mana-btn-opaque scale-onclick">Back to tournament list</a>

				</div>
			</div>
		</div>
	</div>

</section>

<section id="page-modals">
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="leader-form">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Registrasi sebagai team leader
				</div>
				<div class="modal-mid">
					<img src="/img/tournaments/tourney-inside-notif.jpg" class="w-100 bd20 mb-10">
					<div class="form-group mana-control">
						<label class="mana-control">Nama team</label>
						<input type="text" class="form-control mana-control mb-2">
						<small class="font-size-14 grey-10 d-block fw-300 mb-10">Nama tim ini akan muncul pada saat anggota mendaftar. Pastikan data sudah benar.</small>
						<small class="font-size-14 grey-10 d-block fw-300">Biaya pendaftaran akan dibagi rata antara semua anggota tim. Contoh: biaya pendaftaran Rp 1,000,000, dibagi 5 anggota (termasuk team leader), maka masing-masing anggota hanya perlu membayar Rp 200,000.</small>
					</div>
					<div class="form-group mana-control">
						<label class="mana-control">Info member #1 (team leader)</label>
						<input type="text" class="form-control mana-control mb-10" placeholder="Nama member">
						<input type="text" class="form-control mana-control mb-10" placeholder="In-game username">
						<input type="text" class="form-control mana-control mb-10" placeholder="In-game user ID">
					</div>
					<div class="member-loop">
						<?php for ($i=2; $i <= 5; $i++): ?>
							<div class="form-group mana-control">
								<label class="mana-control">Info member #<span class="member-index"><?php echo $i; ?></span></label>
								<input type="text" class="form-control mana-control mb-10" placeholder="Nama member">
								<input type="text" class="form-control mana-control mb-10" placeholder="In-game username">
								<input type="text" class="form-control mana-control mb-10" placeholder="In-game user ID">
							</div>
						<?php endfor; ?>
					</div>
					<small class="font-size-14 grey-10 d-block fw-300">Pastikan semua nama dan in-game ID tiap anggota sudah benar. Data bersifat final dan tidak dapat diubah.</small>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red" data-toggle="modal" data-dismiss="modal" data-target="#team-leader-choose-payment">
						<span class="default-text">Lanjut ke pembayaran</span>
					</a>
					<small class="font-size-14 grey-10 d-block fw-300 mt-2 mb-3">Kamu perlu membayar Rp 40,000 untuk menyelesaikan pendaftaran di turnamen ini.</small>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="team-member-form">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Registrasi sebagai team member
				</div>
				<div class="modal-mid">
					<div class="form-group mana-control">
						<label class="mana-control">Pilih dari team yang sudah terdaftar</label>
						<div class="event-index-filter-select mb-2">
							<select class="custom-select">
								<option>Onic Esports</option>
								<option>Evos</option>
								<option>Bambu Guys</option>
								<option>Jati Girls</option>
							</select>
						</div>
						<small class="font-size-14 grey-10 d-block fw-300">Pastikan tim yang dipilih adalah benar. Pembayaran pada tim yang salah tidak dapat dikembalikan.</small>
					</div>
					<div class="form-group mana-control">
						<label class="mana-control">Pilih dari anggota yang sudah terdaftar</label>
						<div class="event-index-filter-select mb-2">
							<select class="custom-select">
								<option>Budi - game username</option>
								<option>Rosa - game username</option>
								<option>Yayan - game username</option>
							</select>
						</div>
						<small class="font-size-14 grey-10 d-block fw-300">Pastikan nama anggota tim yang dipilih adalah benar. Pembayaran pada nama anggota yang salah tidak dapat dikembalikan.</small>
					</div>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red" data-toggle="modal" data-dismiss="modal" data-target="#team-leader-choose-payment">
						<span class="default-text">Lanjut ke pembayaran</span>
					</a>
					<small class="font-size-14 grey-10 d-block fw-300 mt-2 mb-3">Kamu perlu membayar Rp 40,000 untuk menyelesaikan pendaftaran di turnamen ini.</small>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="team-leader-choose-payment">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Pilih metode pembayaran
				</div>
				<div class="modal-mid grey-10">
					<div class="pg-shelf-container d-flex flex-wrap align-items-center">

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/gopay.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 40,000
								</div>
							</div>
						</div>

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/dana.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 40,000
								</div>
							</div>
						</div>

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/ovo.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 40,000
								</div>
							</div>
						</div>

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/shopee-pay.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp 40,000
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red team-pay-do has-spinner">
						<span class="default-text">Bayar</span>
						<div class="spinner-border hw24"></div>
					</a>
					<small class="font-size-14 grey-10 d-block fw-300 mt-2 mb-3">Masing-masing anggota tim tetap perlu membayar Rp 40,000 untuk tim kamu dapat berpartisipasi di turnamen ini.</small>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="team-pay-success">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Pembayaran berhasil
				</div>
				<div class="modal-mid grey-10">
					Terima kasih atas pembayaran biaya masuk turnamen.
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Cek system mail</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

</section>

<div class="d-none member-template">
	<div class="form-group mana-control">
		<label class="mana-control">Info member #<span class="member-index">1</span></label>
		<input type="text" class="form-control mana-control mb-10" placeholder="Nama member">
		<input type="text" class="form-control mana-control mb-10" placeholder="In-game username">
	</div>
</div>

@include('includes.mana-ui.footer')
@include('includes.mana-ui.modals')


<style type="text/css">
	.tournament-panel {
		display: none;
	}
	.tournament-panel.active {
		display: block;
	}
	.info-block {
		padding: 16px 20px;
		font-size: 14px;
		background: rgb(0 0 0 / .2);
		border-radius: 20px;
	}
	.info-block .left {
		opacity: .5;
		display: flex;
		align-items: center;
		justify-content: flex-start;
	}
	.info-block .right {
		display: flex;
		align-items: center;
		justify-content: flex-end;
		text-align: right;
	}
</style>
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
	#pulsa-panel .swiper-container {
	    width: 100%;
	}
	#pulsa-panel .swiper-slide {
		width: auto;
		margin-right: 25px;
		cursor: pointer;
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
		// send email verification modal
		// $('.member-count').on('change', function(e) {
		// 	e.preventDefault();

		// 	var loc1 = $(this);
		// 	var loc2 = loc1.val();

		// 	var loc3 = $('.member-template');

		// 	var loc5 = $('.member-loop');

		// 	loc5.html('');
		// 	for (i = 2; i <= loc2; i++) {
		// 		var loc6 = loc3.find('.member-index');

		// 		loc6.html(i);

		// 		var loc4 = loc3.html();

		// 		loc5.append(loc4);
		// 	}
		// });

		$('body').on('click', '.tournament-tab', function(e) {
			e.preventDefault();

			var loc1 = $(this);
			var loc2 = $('.tournament-tab');
			var loc3 = loc1.attr('data-target');
			var loc4 = $('.tournament-panel');
			var loc5 = $('.'+loc3);

			loc2.removeClass('active');
			loc1.addClass('active');

			loc4.removeClass('active');
			loc5.addClass('active');

		});

		$('body').on('click', '.team-pay-do', function(e) {
			e.preventDefault();

			var loc1 = $(this);
			var loc2 = $('#team-pay-success');
			var loc3 = $('.modal');

			// show spinner
			loc1.addClass('loading');


			setTimeout(function() {
				loc3.modal('hide');
				loc2.modal('show');
		        loc1.removeClass('loading');
		    }, 500);
		});

	})
</script>
@endsection
