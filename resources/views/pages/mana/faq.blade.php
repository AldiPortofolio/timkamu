@extends('layouts.mana-ui')

@section('page_title', "FAQ")
@section('body_class', 'mana-ui isi-pulsa-xl')


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
					<h1 class="rajdhani-bold">FAQs</h1>
				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<div id="shop-form shop-form-mlbb" class="mb-30">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="faq-section mb-30">
						<h4 class="font-size-18 mb-20">General</h4>
						<div class="faq-item scale-onclick" data-toggle="modal" data-target="#about-timkamu">
							<span class="grey-10">Mengenai TimKamu</span>
							<i data-feather="help-circle" class="icon"></i>
						</div>
						<div class="faq-item scale-onclick" data-toggle="modal" data-target="#cs-help">
							<span class="grey-10">Tim CS dan support Timkamu</span>
							<i data-feather="help-circle" class="icon"></i>
						</div>
						<div class="faq-item scale-onclick" data-toggle="modal" data-target="#hero-promo-2">
							<span class="grey-10">Gimana cara kasih prediksi di Timkamu?</span>
							<i data-feather="help-circle" class="icon"></i>
						</div>
					</div>

					<div class="faq-section mb-30">
						<h4 class="font-size-18 mb-20">Loyalty Points</h4>
						<div class="faq-item scale-onclick" data-toggle="modal" data-target="#lp-help">
							<span class="grey-10">Apa itu loyalty points?</span>
							<i data-feather="help-circle" class="icon"></i>
						</div>
						<div class="faq-item scale-onclick" data-toggle="modal" data-target="#lp-exchange-rate">
							<span class="grey-10">Harga LP</span>
							<i data-feather="help-circle" class="icon"></i>
						</div>
					</div>

					<div class="faq-section mb-30">
						<h4 class="font-size-18 mb-20">Battle Points</h4>
						<div class="faq-item scale-onclick" data-toggle="modal" data-target="#bp-help">
							<span class="grey-10">Apa itu battle points?</span>
							<i data-feather="help-circle" class="icon"></i>
						</div>
					</div>

					<div class="faq-section mb-30">
						<h4 class="font-size-18 mb-20">Timkamu Coins</h4>
						<div class="faq-item scale-onclick" data-toggle="modal" data-target="#coin-help">
							<span class="grey-10">Mengenai Coins</span>
							<i data-feather="help-circle" class="icon"></i>
						</div>
						<div class="faq-item scale-onclick" data-toggle="modal" data-target="#my-quests">
							<span class="grey-10">Quest-quest apa saja yang tersedia saat ini?</span>
							<i data-feather="help-circle" class="icon"></i>
						</div>
					</div>

					<div class="faq-section mb-30">
						<h4 class="font-size-18 mb-20">VIP Members</h4>
						<div class="faq-item scale-onclick" data-toggle="modal" data-target="#vip-help">
							<span class="grey-10">Mengenai VIP 1 & 2</span>
							<i data-feather="help-circle" class="icon"></i>
						</div>
					</div>

				</div>
			</div> 
		</div>
	</div>

</section>

<section id="page-modals">
</section>

@include('includes.mana-ui.footer')
@include('includes.mana-ui.modals')
<style type="text/css">
	/*page specific*/
	.faq-item {
		display: flex;
		position: relative;
		padding: 15px;
		padding-right: 50px;
		border-radius: 20px;
		background: rgb(0 0 0 / .2);
    	margin-left: -2px;
    	margin-right: -2px;
		margin-bottom: 10px;
		cursor: pointer;
	}
	.faq-item:hover {
		background: rgb(0 0 0 / .4);
	}
	.faq-item .icon {
		width: 16px;
		position: absolute;	
		right: 15px;
		top: 50%;
		transform: translate(0, -50%);
		opacity: 0.3;
	}
</style>
@endsection

@section('js')
<script>
	$(document).ready(function() {
		
		// page specific scripts
	})
</script>
@endsection