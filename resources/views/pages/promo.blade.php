@extends('layouts.mana-ui')

@section('page_title', "Promotions")
@section('body_class', 'mana-ui promotions')


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
						<h1 class="rajdhani-bold">Promotions</h1>
					</div>
				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<div id="home-promo-cards" class="mb-20">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<img src="{{ asset('img/promos/ig-cashback.jpg') }}" class="bd20 w-100 cursor-ptr mb-20 scale-onclick" data-toggle="modal" data-target="#hero-promo-5">
					<img src="{{ asset('img/promos/cash-discount.jpg') }}" class="bd20 w-100 cursor-ptr mb-20 scale-onclick" data-toggle="modal" data-target="#hero-promo-4">
					<img src="{{ asset('img/promos/referral.jpg') }}" class="bd20 w-100 cursor-ptr mb-20 scale-onclick" data-toggle="modal" data-target="#hero-promo-3">

				</div>
			</div> 
		</div>
	</div>

</section>

<section id="page-modals">
	@include('includes.mana-ui.top-up-modals')
</section>

@include('includes.mana-ui.footer')
@include('includes.mana-ui.modals')

<style type="text/css">
	/*page specific*/
</style>
<style type="text/css">
	/*media*/
	
</style>
@endsection

@section('js')
<script>
	$(document).ready(function() {

	})
</script>
@endsection