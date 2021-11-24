@extends('layouts.mana-ui')

@section('page_title', "TimKamu (PTS) - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui team-view')


@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content">

	<!-- page section -->
	<div id="team-view-header" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="form-group mana-control mb-0">
						<div class="row">
							<div class="col-8 pr-1">
								<input type="text" class="form-control mana-control" placeholder="Cari nama tim...">
							</div>
							<div class="col-4 pl-1">
								<a href="/mana/team-index" class="mana-btn-54 inline-search mana-btn-red has-spinner mb-15 team-search-go">
									<span class="default-text">Search</span>
									<div class="spinner-border hw24"></div>
								</a>
							</div>
						</div>
					</div>
					
					<div class="team-view-head bd20 d-flex align-items-center justify-content-center mb-20">
						<div class="team-view-thumb">
							<img src="{{ asset('img/team-logos/onic-200.png') }}" class="w-100">
						</div>
						<div class="team-view-meta d-flex flex-column">
							<div class="team-view-meta-name rajdhani-bold font-size-30">Topsports Esports</div>
							<div class="team-view-meta-stats grey-10">
								<div><span class="white-10"><img src="/icons/heart-red.svg" class="icon">290</span>&nbsp;&nbsp;Timkamu Fans</div>
								<div><span class="white-10"><img src="/img/currencies/lp.svg" class="icon lp">1,250</span>&nbsp;&nbsp;Total LP Support</div>
							</div>
						</div>
					</div>

					<div class="row space-10">
						<div class="col-6 space-10">
							<!-- kalau belum jadi fans DAN belum jadi fans tim mana aja -->
							<!-- <a href="#" class="mana-btn-54 mana-btn-red scale-onclick font-size-14" data-toggle="modal" data-target="#confirm-fans-join">Jadi Fans</a> -->

							<!-- kalau belum jadi fans TAPI sudah jadi fans tim mana aja -->
							<a href="#" class="mana-btn-54 mana-btn-red scale-onclick font-size-14" data-toggle="modal" data-target="#fans-already-on-another-team">Jadi Fans</a>

							<!-- kalau sudah jadi fans -->
							<!-- <a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick font-size-14" data-toggle="modal" data-target="#existing-fans-quit">Kamu Adalah Fans</a> -->
						</div>
						<div class="col-6 space-10">
							<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick font-size-14" data-toggle="modal" data-target="#team-view-give-suppport">Give Support</a>
						</div>
					</div>

				</div>
			</div> 
		</div>
	</div>

	<!-- swiper panel selector -->
	<div id="pulsa-panel" class="mb-10">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide swiper-panel-item team-view-panel-tab active" data-target="panel1">
								<i data-feather="users" class="icon"></i><a href="#">Supporters Terbaru</a>
							</div>
							<div class="swiper-slide swiper-panel-item team-view-panel-tab " data-target="panel2">
								<i data-feather="bar-chart" class="icon"></i><a href="#">Top Supporters</a>
							</div>
							<div class="swiper-slide swiper-panel-item team-view-panel-tab " data-target="panel3">
								<i data-feather="star" class="icon"></i><a href="#">Team Information</a>
							</div>
							<!-- do not delete last swiper, ui hack -->
							<div class="swiper-slide swiper-panel-item team-view-panel-tab">
								<a href="#">&nbsp;</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- swiper panel selector -->
	<div id="team-view-panels" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="panel-container panel1 active">
						<div class="supporter-container d-flex flex-column mt-10">
							<div class="supporter-row-no-content mb-20">
								belum ada data
							</div>
							<?php for ($i=0; $i < 11; $i++): ?>
								<div class="supporter-row">
									<div class="row">
										<div class="supporter-name col-8">fjahja.dev</div>
										<div class="supporter-value col-4 text-right d-flex	align-items-center justify-content-end"><span class="money money-14 right">23<img src="{{ asset('img/currencies/lp.svg') }}"></span></div>
									</div>
								</div>
							<?php endfor; ?>
						</div>
					</div>

					<div class="panel-container top-supporter panel2">
						<div class="supporter-container d-flex flex-column mt-10">
							<?php for ($i=0; $i < 11; $i++): ?>
								<div class="supporter-row">
									<div class="row">
										<div class="supporter-name col-8">username.test</div>
										<div class="supporter-value col-4 text-right d-flex	align-items-center justify-content-end"><span class="money money-14 right">23<img src="{{ asset('img/currencies/lp.svg') }}"></span></div>
									</div>
								</div>
							<?php endfor; ?>
						</div>
					</div>

					<div class="panel-container panel3">
						<div class="team-view-card bd20">
							<p>ONIC Esports is a Indonesia Professional e-Sports Management Team founded in 26th July 2018.</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>



	
</section>

<section id="page-modals">

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="confirm-fans-join">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					ONIC Esports
				</div>
				<div class="modal-mid grey-10">
					<p>Mau bergabung menjadi fans tim ini?</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red has-spinner confirm-join-team-btn">
						<span class="default-text">Bergabung</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="confirm-fans-join-success">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					ONIC Esports
				</div>
				<div class="modal-mid grey-10">
					<p>Kamu sudah menjadi fans tim ini.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="existing-fans-quit">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					ONIC Esports
				</div>
				<div class="modal-mid grey-10">
					<p>Kamu sudah bergabung menjadi fans ONIC Esports.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal" data-toggle="modal" data-target="#confirm-fans-quit">Berhenti menjadi fans</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="fans-already-on-another-team">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					ONIC Esports
				</div>
				<div class="modal-mid grey-10">
					<p>Kamu sudah bergabung di tim lain. Untuk bergabung menjadi fans tim ini, kamu perlu berhenti menjadi fans di tim lain.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="confirm-fans-quit">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					ONIC Esports
				</div>
				<div class="modal-mid grey-10">
					<p>Yakin mau berhenti menjadi fans ONIC Esports? Kamu bisa bergabung kembali kapan saja.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red has-spinner confirm-quit-team-btn">
						<span class="default-text">Confirm</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="confirm-fans-quit-success">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					ONIC Esports
				</div>
				<div class="modal-mid grey-10">
					<p>Kamu sudah tidak menjadi fans tim ini.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="team-view-give-suppport">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32 text-center">
					Berikan Support Item
				</div>
				<div class="modal-mid">
					
					<div class="row">
						<?php for ($i=1; $i <= 8; $i++): ?>
							<div class="team-view-item-selection col-4 mb-30 cursor-ptr d-flex align-items-center justify-content-center flex-column scale-onclick" data-toggle="modal" data-target="#team-view-give-suppport-confirm" data-dismiss="modal">
								<img src="<?php echo asset('img/items/items-0'.$i.'.png'); ?>" class="team-view-gift-thumb mb-10">
								<div class="text-center">
									<span class="money money-14 right">1,250<img src="{{ asset('img/currencies/lp.svg') }}"></span>
								</div>
							</div>
						<?php endfor; ?>
					</div>

					<p class="grey-10 text-center">Pemberian item dukungan akan menambah "Total LP Support" untuk tim ini, dan nama kamu akan tercatat di list of supporters. </p>

				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="team-view-give-suppport-confirm">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Confirm give support item
				</div>
				<div class="modal-mid grey-10">
					<p>Yakin mau memberikan support item ini?</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red has-spinner confirm-give-support-item">
						<span class="default-text">Confirm</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="team-view-give-suppport-success">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Thank you
				</div>
				<div class="modal-mid grey-10">
					<p>Terima kasih, support item kamu berhasil diberikan.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>


</section>

@include('includes.mana-ui.modals')
@include('includes.mana-ui.footer')


<style type="text/css">
	/*page specific*/
	.mana-btn-54.inline-search {
		line-height: 48px;
		height: 48px;
		font-size: 14px;
	}
	.team-view-meta-name {
		line-height: 28px;
		margin-bottom: 10px;
	}
	.supporter-row-no-content {
		border-radius: 20px;
		background: rgb(0 0 0 / 0.2);
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 50px;
	}
	.supporter-name {
		opacity: 0.5;
	}
	.supporter-row {
		border-radius: 20px;
		background: rgb(0 0 0 / 0.2);
		padding: 12px 16px;
		margin-bottom: 8px;
	}
	.team-view-item-selection img {
		transition: all 0.1s ease-in-out;
	}
	.team-view-item-selection:hover img {
		transform: scale(1.1);
	}

	.top-supporter .supporter-row:nth-child(1) {background: linear-gradient(90deg, rgba(255,203,91,1) 0%, rgba(255,174,0,1) 100%);}
	.top-supporter .supporter-row:nth-child(1) .supporter-name {opacity: 1;color: rgb(0 0 0 / 0.8);}

	.top-supporter .supporter-row:nth-child(2) {background: linear-gradient(90deg, rgba(238,174,202,1) 0%, rgba(42,123,218,1) 100%);}
	.top-supporter .supporter-row:nth-child(2) .supporter-name {opacity: 1;color: rgb(0 0 0 / 0.8);color:white;}

	.top-supporter .supporter-row:nth-child(3) {background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(252,124,69,1) 100%);}
	.top-supporter .supporter-row:nth-child(3) .supporter-name {opacity: 1;color: rgb(0 0 0 / 0.8);color:white;}

	.team-view-gift-thumb {
		width: 80px;
		height: 80px;
	}
	.team-view-card {
		padding: 30px;
		background: rgb(0 0 0 / 0.2);
	}
	.panel-container {
		display: none;
	}
	.panel-container.active {
		display: block;
	}
	.team-view-head {
		background: rgb(0 0 0 / 0.2);
		padding: 15px 30px;
	}
	.team-view-thumb {
		flex: 1 1 30%;
	}
	.team-view-meta {
		flex: 1 1 60%;
		margin-left: 30px;
	}
	.team-view-meta-stats {
		font-size: 14px;
	}
	.team-view-meta-stats .icon {
		height: 14px;
		width: 14px;
		position: relative;
		top: -1px;
		opacity: .8;
		margin-right: 8px;
	}
	.team-view-meta-stats .icon.lp {
		top: -2px;
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
	/*media*/
	
</style>
@endsection

@section('js')
<script type="text/javascript">
	var mySwiper = new Swiper('#pulsa-panel .swiper-container', {
		// Optional parameters
		direction: 'horizontal',
		loop: false,
		slideToClickedSlide: true,
		slidesPerView: 'auto',
	})
</script>
<script>
	$(document).ready(function() {
		
		// page specific scripts

		// join button
		$('body').on('click', '.confirm-join-team-btn', function(e) {
			e.preventDefault();

			target = $(this);
			target1 = $('#confirm-fans-join');
			target2 = $('#confirm-fans-join-success');

			// show spinner
			target.addClass('loading');

			setTimeout(function() {
			    // do db work here

			    // reset modal button
			    target.removeClass('loading');

			    // hide modal
			    target1.modal('hide');

			    // hide modal
			    target2.modal('show');
			}, 1000);  
		});

		// quit button
		$('body').on('click', '.confirm-quit-team-btn', function(e) {
			e.preventDefault();

			target = $(this);
			target1 = $('#confirm-fans-quit');
			target2 = $('#confirm-fans-quit-success');

			// show spinner
			target.addClass('loading');

			setTimeout(function() {
			    // do db work here

			    // reset modal button
			    target.removeClass('loading');

			    // hide modal
			    target1.modal('hide');

			    // hide modal
			    target2.modal('show');
			}, 1000);  
		});

		// give support button
		$('body').on('click', '.confirm-give-support-item', function(e) {
			e.preventDefault();

			target = $(this);
			target1 = $('#team-view-give-suppport-confirm');
			target2 = $('#team-view-give-suppport-success');

			// show spinner
			target.addClass('loading');

			setTimeout(function() {
			    // do db work here

			    // reset modal button
			    target.removeClass('loading');

			    // hide modal
			    target1.modal('hide');

			    // hide modal
			    target2.modal('show');
			}, 1000);  
		});

		// team-view panel button
		$('body').on('click', '.team-view-panel-tab', function(e) {
			e.preventDefault();

			target = $(this);
			target1 = target.attr('data-target');
			target2 = $('.team-view-panel-tab');
			target3 = $('.panel-container');
			target4 = $('.panel-container.'+target1);

			target2.removeClass('active');
			target.addClass('active');

			target3.removeClass('active');
			target4.addClass('active');
		});

		$('body').on('click', '.team-search-go', function() {

			var loc1 = $(this);
			var loc2 = $('.search-disclaimer');

			loc1.addClass('loading');
		});
	})
</script>
@endsection