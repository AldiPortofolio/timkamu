<section id="match-info">
	<div class="tray-top-info">
		Event Info
		<div class="tray-close-top">
			<i data-feather="arrow-right" class="icon"></i>
		</div>
	</div>
	<div class="tray-game-thumb">
		<img src="/img/game-thumbs/default-nothumb.jpg">
	</div>
	<div class="tray-game-title">
		PUBG Mobile Championship - Super Weekend Week 2
	</div>
	<div class="tray-game-meta">
		PUBG Mobile Championship
	</div>
	<div class="match-info-bubble mt-20 mb-10">
		<div class="row no-gutters">
			<div class="left col-6 o7">
				Dimulai
			</div>
			<div class="right col-6">
                <span class="info-event-start-date"></span>
			</div>
		</div>
		<div class="row no-gutters">
			<div class="left col-6 o7">
				Jumlah tim
			</div>
			<div class="right col-6">
                <span class="info-event-total-team"></span>
            </div>
		</div>
	</div>
	<div class="match-info-bubble">
		<div class="row no-gutters">
			<div class="left col-6 o7">
				Prediksi tersedia
			</div>
			<div class="right col-6">
                <span class="info-event-total-prediksi"></span>
			</div>
		</div>
	</div>
	<div class="form-group mana-control match-action">
		<a href="#" class="mana-btn-54 mana-btn-red has-spinner mb-15 event-view-btn">
			<span class="default-text font-size-14">Lihat Event</span>
			<div class="spinner-border hw24"></div>
		</a>
		<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick font-size-14 close-match-info">Tutup</a>
	</div>

</section>

<style type="text/css">
	#match-info .match-action {
		margin: 20px;
	}
	.match-info-bubble {
		font-size: 13px;
		border-radius: 15px;
		background: #F7931E;
		padding: 15px;
		margin-right: 18px;
		margin-left: 18px;
	}
	.match-info-bubble .row + div {
		margin-top: 5px;
	}
	.match-info-bubble .right {
		text-align: right;
	}
	#match-info {
		position: fixed;
		right: 0;
		top: 0;
		height: 100%;
		width: 300px;
		background: rgb(255,192,57);
		background: linear-gradient(180deg, rgba(255,192,57,1) 0%, rgba(233,159,0,1) 100%);
		transform: translate(200%,0);
		transition: all 0.1s ease-in-out;
		padding: 0 0 70px 0;
		overflow-y: auto;
	}
	#match-info.active {
		transform: translate(0,0);
	}
	.tray-top-info {
	    padding: 22px 35px 18px 20px;
	    /*background: rgb(0 0 0 / 10%);*/
	    font-family: 'Rajdhani-Bold';
	    font-size: 22px;
	}
	.tray-close-top {
		position: absolute;
	    right: 20px;
	    top: 21px;
	    background: rgb(255 255 255 / 20%);
	    border-radius: 50px;
	    width: 35px;
	    height: 35px;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    cursor: pointer;
	}
	.tray-close-top .icon {
		opacity: 0.9;
	    height: 20px;
	    width: 20px;
	}

	/*game-info*/
	.tray-game-thumb {
		/*margin-bottom: 30px;*/
	}
	.tray-game-thumb img {
		width: 100%;
	}
	.tray-game-title {
		font-family: 'Rajdhani-Bold';
	    font-size: 22px;
	    padding: 22px 20px 5px 20px;
	    line-height: 26px;
	}
	.tray-game-meta {
	    opacity: .7;
	    padding: 0px 20px;
	    font-size: 14px;
	}
</style>
