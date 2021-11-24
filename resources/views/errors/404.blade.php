@extends('layouts.mana-ui')

@section('page_title', "Page not found - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui error404 no-menu')


@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content" class="force-height">

	<!-- page header -->
	<div id="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11 col-md-8 col-lg-6 text-center">
					<h1 class="rajdhani-bold">404 Error</h1>
					<p>Halaman yang kamu cari tidak bisa ditemukan.</p>
					<p><a href="{{ url('/') }}" class="o5">back to home</a></p>
				</div>
			</div> 
		</div>
	</div>

	
</section>

<section id="page-modals">
</section>

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
		
		// page specific scripts
		// register button
		$('body').on('click', '.registration-submit-btn', function(e) {
			e.preventDefault();

			var target = $('.registration-submit-btn');

			// show spinner
			$(this).addClass('loading');
		});

	})
</script>
@endsection