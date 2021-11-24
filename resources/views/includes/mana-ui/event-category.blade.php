<section id="event-category">
	<div class="tray-event-category-top">
		Kategori Game
		<div class="tray-close-top-category">
			<i data-feather="arrow-right" class="icon"></i>
		</div>
	</div>

	<div class="game-select-item select-game-category" data-game_id="1">
		<img src="/img/game-thumbs/new-mlbb.jpg">
		<div class="game-overlay mlbb">
			<div class="dark-olay"></div>
			<div class="loading-loader">
				<div class="spinner-border hw24"></div>
			</div>
			<div class="loading-content">
				<div class="title">
					Mobile Legends: Bang Bang
				</div>
				<div class="meta">
                    <span id="total_events_mlbb"></span> upcoming events
				</div>
			</div>
		</div>
	</div>
    <div class="game-select-item select-game-category" data-game_id="2">
		<img src="/img/game-thumbs/new-freefire.jpg">
		<div class="game-overlay freefire">
			<div class="dark-olay"></div>
			<div class="loading-loader">
				<div class="spinner-border hw24"></div>
			</div>
			<div class="loading-content">
				<div class="title">
					Free Fire
				</div>
				<div class="meta">
                    <span id="total_events_ff"></span> upcoming events
				</div>
			</div>
		</div>
	</div>

    <div class="game-select-item select-game-category" data-game_id="3">
		<img src="/img/game-thumbs/new-pubgm.jpg">
		<div class="game-overlay pubgm">
			<div class="dark-olay"></div>
			<div class="loading-loader">
				<div class="spinner-border hw24"></div>
			</div>
			<div class="loading-content">
				<div class="title">
					PUBGM
				</div>
				<div class="meta">
                    <span id="total_events_pubgm"></span> upcoming events
				</div>
			</div>
		</div>
	</div>

</section>

<style type="text/css">
	#event-category {
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
	#event-category.active {
		transform: translate(0,0);
	}
	.tray-event-category-top {
	    padding: 22px 35px 22px 20px;
	    /*background: rgb(0 0 0 / 10%);*/
	    background: #ffa726;
	    font-family: 'Rajdhani-Bold';
	    font-size: 22px;
	}
	.tray-close-top-category {
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
	.tray-close-top-category .icon {
		opacity: 0.9;
	    height: 20px;
	    width: 20px;
	}

	/*game-select-item*/
	.game-select-item {
		border-radius: 20px;
		cursor: pointer;
		transition: all 0.1s ease-in-out;
		margin: 20px;
		overflow: hidden;
		position: relative;
	}
	.game-select-item:hover {
		background: rgb(0 0 0 / .6);
	}
	.game-select-item:active {
		transform: scale(1.05) !important;
	}
	.game-select-item .title {
		font-weight: 800;
	    font-size: 14px;
	    padding: 10px 15px;
	    padding-bottom: 0px;
	}
	.game-select-item .meta {
		opacity: .9;
	    padding: 10px 15px;
	    padding-top: 0px;
	    font-size: 14px;
	}
	.game-select-item img {
		width: 100%;
	}
	.game-select-item .game-overlay {
		position: absolute;
		top: 0;
		left: 0;
	    width: 100%;
	    height: 100%;
	}
	.game-select-item .game-overlay.mlbb {
		background: rgb(0 0 0);
		background: linear-gradient(137deg, rgba(0 0 0 / .8) 0%, rgba(255,87,15,0) 100%);
	}
	.game-select-item .game-overlay.mlbb:hover {background: linear-gradient(137deg, rgba(0 0 0 / 1) 0%, rgba(255,87,15,0) 100%);}

	.game-select-item .game-overlay.freefire {
		background: rgb(0 0 0);
		background: linear-gradient(137deg, rgba(0 0 0 / .8) 0%, rgba(255,87,15,0) 100%);
	}
	.game-select-item .game-overlay.freefire:hover {background: linear-gradient(137deg, rgba(0 0 0 / 1) 0%, rgba(255,87,15,0) 100%);}

	.game-select-item .game-overlay.pubgm {
		background: rgb(0 0 0);
		background: linear-gradient(137deg, rgba(0 0 0 / .8) 0%, rgba(255,87,15,0) 100%);
	}
	.game-select-item .game-overlay.pubgm:hover {background: linear-gradient(137deg, rgba(0 0 0 / 1) 0%, rgba(255,87,15,0) 100%);}


	.game-overlay .loading-loader {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		display: none;
		align-items: center;
		justify-content: center;
	}
	.loading .loading-loader {
		display: flex;
	}
	.loading .loading-content {
		display: none;
	}

</style>
