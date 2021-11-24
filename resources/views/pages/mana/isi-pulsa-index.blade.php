@extends('layouts.mana-ui')

@section('page_title', "TimKamu (PTS) - Tempat nongkrongnya anak e-sports")
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
						<a href="#" class="o5 section-title-meta-link font-size-14" data-toggle="modal" data-target="#bp-lp-convert-modal">Convert BP to LP</a>
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
					<div class="shop-gallery-container d-flex flex-wrap align-items-start">

						<div class="shop-item">
							<a href="/mana/isi-pulsa-telkomsel" class="shop-item-inner">
								<div class="position-relative">
									<img src="{{ asset('img/pulsa-thumbs/telkomsel.jpg') }}" class="shop-item-thumb">
								</div>
								<div class="shop-item-name mt-10 mb-0">Telkomsel</div>
								<div class="shop-item-name-meta o5 font-size-14">Pulsa & Kuota</div>
							</a>
						</div>

						<div class="shop-item">
							<a href="/mana/isi-pulsa-xl" class="shop-item-inner">
								<div class="position-relative">
									<img src="{{ asset('img/pulsa-thumbs/xl.jpg') }}" class="shop-item-thumb">
								</div>
								<div class="shop-item-name mt-10 mb-0">XL</div>
								<div class="shop-item-name-meta o5 font-size-14">XTRA Combo</div>
							</a>
						</div>

						<div class="shop-item">
							<a href="/mana/isi-pulsa-tri" class="shop-item-inner">
								<div class="position-relative">
									<img src="{{ asset('img/pulsa-thumbs/tri.jpg') }}" class="shop-item-thumb">
								</div>
								<div class="shop-item-name mt-10 mb-0">Tri</div>
								<div class="shop-item-name-meta o5 font-size-14">Tri Kuota</div>
							</a>
						</div>

					</div>
				</div>
			</div> 
		</div>
	</div>

	
</section>

<section id="page-modals">
	
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
		flex: 0 0 33.33%;
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
	$(document).ready(function() {
		
		// page specific scripts

	})
</script>
@endsection