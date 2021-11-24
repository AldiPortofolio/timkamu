@extends('layouts.mana-ui')

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
					<h1 class="rajdhani-bold">Event sudah berakhir</h1>
					@if($event->league_game_id)
					<p>Event {{ $event->name }} ({{ $event->league_games->leagues->name }} - {{ \Carbon\Carbon::parse($event->start_date)->format('d F Y H:i')}}) sudah berakhir.</p>
					@else
					<p>Event {{ $event->name }} ({{ \Carbon\Carbon::parse($event->end_date)->format('d F Y H:i')}}) sudah berakhir.</p>
					@endif
					<p><a href="{{ url('/') }}" class="o5">Back to home</a></p>
				</div>
			</div> 
		</div>
	</div>

	
</section>

<section id="page-modals">
</section>

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
	})
</script>
@endsection