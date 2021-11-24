<section id="effects">
	<div class="site-overlay"></div>
	<div class="sunray"></div>
	<div class="top-left-blobs">
		<img src="{{ asset('img/splash-xmas/blob1.svg') }}">
	</div>
	<div class="top-right-blobs">
		<img src="{{ asset('img/splash-xmas/blob2.svg') }}">
	</div>
	<div class="bottom-left-blobs">
		<img src="{{ asset('img/splash-xmas/blob3.svg') }}">
	</div>
	<div class="bottom-right-blobs">
		<img src="{{ asset('img/splash-xmas/blob4.svg') }}">
	</div>
	<div class="clouds">
		<img src="{{ asset('img/splash-xmas/cloud1.svg') }}">
		<img src="{{ asset('img/splash-xmas/cloud2.svg') }}">
		<img src="{{ asset('img/splash-xmas/cloud3.svg') }}">
		<img src="{{ asset('img/splash-xmas/cloud1.svg') }}">
		<img src="{{ asset('img/splash-xmas/cloud2.svg') }}">
		<img src="{{ asset('img/splash-xmas/cloud3.svg') }}">
		<img src="{{ asset('img/splash-xmas/cloud1.svg') }}">
		<img src="{{ asset('img/splash-xmas/cloud2.svg') }}">
		<img src="{{ asset('img/splash-xmas/cloud3.svg') }}">
		<img src="{{ asset('img/splash-xmas/cloud1.svg') }}">
		<img src="{{ asset('img/splash-xmas/cloud2.svg') }}">
		<img src="{{ asset('img/splash-xmas/cloud3.svg') }}">
	</div>

	<!-- xmas effects -->
	<div class="top-left-lights">
		<img src="{{ asset('img/splash-xmas/lights-left-top.png') }}">
	</div>
	<div class="top-right-lights">
		<img src="{{ asset('img/splash-xmas/lights-right-top.png') }}">
	</div>
	<div class="bottom-right-lights">
		<img src="{{ asset('img/splash-xmas/lights-right-bottom.png') }}">
	</div>
</section>

<!-- christmas styles -->
<style type="text/css">
	body.mana-ui {
		background: #4f1a1e !important;
	}
	.top-left-lights {
		width: 500px;
		position: absolute;
		top: -;
		left: 0;
		z-index: 80;/* other blobs are at 70*/
	}
	.top-right-lights {
		width: 350px;
		position: absolute;
		top: 0;
		right: 0;
		z-index: 80;/* other blobs are at 70*/
	}
	.bottom-right-lights {
		width: 350px;
		position: absolute;
		bottom: 0;
		right: 0;
		z-index: 80;/* other blobs are at 70*/
	}
	.sunray {
		display: none !important;
	}
	.modal-right-top-lights {
	    width: 40%;
	    top: 0;
	    position: absolute;
	    right: 0;
	}
	.modal-right-top-lights img,
	.top-left-lights img,
	.bottom-right-lights img,
	.top-right-lights img {
		width: 100%;
	}
	@media (max-width: 900px) {
	    .top-left-lights {width: 40%;}
	    .top-right-lights {width: 25%;}
	    .bottom-left-blobs {width: 20%;}
	    .bottom-right-lights {width: 55%;}
	}
	@media (max-width: 700px) {
	    .top-left-lights {width: 60%;}
	    .top-right-lights {width: 40%;}
	    .bottom-left-blobs {width: 25%;}
	    .bottom-right-lights {width: 65%;}
	}

	/*xmas modals*/
	.modal.mana-ui .modal-content {
		background: #4f1a1e !important;
	}
	.grey-10 {
	    color: #ffffff66 !important;
	}
</style>