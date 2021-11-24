@extends('layouts.mana-ui')

@section('page_title', "TimKamu (PTS) - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui event-index')


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
					<h1 class="rajdhani-bold">Games Event</h1>
				</div>
			</div> 
		</div>
	</div>

	<!-- event index filters -->
	<div class="event-index-filters">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="d-flex flex-wrap">
						<div class="event-index-filter-select month">
							<select class="custom-select">
								<option value="January">January</option>
								<option value="February">February</option>
								<option value="March">March</option>
								<option value="April">April</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="August">August</option>
								<option value="September">September</option>
								<option value="October">October</option>
								<option value="November">November</option>
								<option value="December">December</option>
							</select>
						</div>
						<div class="event-index-filter-select status">
							<select class="custom-select">
								<option selected>Upcoming</option>
								<option>Upcoming & past</option>
							</select>
						</div>
						<div class="event-index-filter-select game">
							<select class="custom-select">
								<option selected>Mobile Legends: Bang Bang</option>
								<option>Freefire</option>
								<option>Valorant</option>
								<option>PUBGM</option>
							</select>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>

	<!-- event index table -->
	<div class="event-index-table">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					
					<!-- event 2-teams live -->
					<div class="match-card live">
						<div class="title">
							<div class="game-thumb">
								<img src="{{ asset('img/game-logos/mlbbnew-100.png') }}">
							</div>
							<div class="middle">
								<div class="game-name">RRQ Sena <span class="vs-word">vs</span> ONIC Prodigy</div>
								<div class="league-name">World Pro Championship Semi Finals</div>
							</div>
							<div class="title-date">
								<div class="game-date">24 Oct</div>
								<div class="game-time">18.30 WIB</div>
							</div>
						</div>
						<div class="teams">
							<div class="team-container">
								<div class="team-logo">
									<img src="{{ asset('img/team-logos/onic-200.png') }}">
								</div>
								<div class="team-name">ONIC Prodigy</div>
							</div>
							<div class="match-card-stats">
								LIVE
							</div>
							<div class="team-container">
								<div class="team-logo">
									<img src="{{ asset('img/team-logos/evos-200.png') }}">
								</div>
								<div class="team-name">EVOS Legends</div>
							</div>
						</div>
					</div>
					
					<!-- event 2-teams -->
					<div class="match-card">
						<div class="title">
							<div class="game-thumb">
								<img src="{{ asset('img/game-logos/mlbbnew-100.png') }}">
							</div>
							<div class="middle">
								<div class="game-name">RRQ Sena <span class="vs-word">vs</span> ONIC Prodigy</div>
								<div class="league-name">World Pro Championship Semi Finals</div>
							</div>
							<div class="title-date">
								<div class="game-date">24 Oct</div>
								<div class="game-time">18.30 WIB</div>
							</div>
						</div>
						<div class="teams">
							<div class="team-container">
								<div class="team-logo">
									<img src="{{ asset('img/team-logos/onic-200.png') }}">
								</div>
								<div class="team-name">ONIC Prodigy</div>
							</div>
							<div class="match-card-stats">
								Prediksi Tersedia
							</div>
							<div class="team-container">
								<div class="team-logo">
									<img src="{{ asset('img/team-logos/evos-200.png') }}">
								</div>
								<div class="team-name">EVOS Legends</div>
							</div>
						</div>
					</div>
					
					<!-- event 2-teams past -->
					<div class="match-card past">
						<div class="title">
							<div class="game-thumb">
								<img src="{{ asset('img/game-logos/lol-100.png') }}">
							</div>
							<div class="middle">
								<div class="game-name">BREN <span class="vs-word">vs</span> OMEGA</div>
								<div class="league-name">World Pro Championship</div>
							</div>
							<div class="title-date">
								<div class="game-date">24 Oct</div>
								<div class="game-time">18.30 WIB</div>
							</div>
						</div>
						<div class="teams">
							<div class="team-container">
								<div class="team-logo">
									<img src="{{ asset('img/team-logos/onic-200.png') }}">
								</div>
								<div class="team-name">ONIC Prodigy</div>
							</div>
							<div class="match-card-stats">
								3&nbsp;&nbsp;-&nbsp;&nbsp;2
							</div>
							<div class="team-container">
								<div class="team-logo">
									<img src="{{ asset('img/team-logos/evos-200.png') }}">
								</div>
								<div class="team-name">EVOS Legends</div>
							</div>
						</div>
					</div>


					
					<!-- event more than 3 teams -->
					<div class="match-card">
						<div class="title">
							<div class="game-thumb">
								<img src="{{ asset('img/game-logos/pubgm.png') }}">
							</div>
							<div class="middle">
								<div class="game-name">RRQ Sena <span class="vs-word">vs</span> ONIC Prodigy</div>
								<div class="league-name">World Pro Championship Semi Finals</div>
							</div>
							<div class="title-date">
								<div class="game-date">24 Oct</div>
								<div class="game-time">18.30 WIB</div>
							</div>
						</div>
						<div class="teams many">
							<div class="team-container">
								<div class="team-logo">
									<img src="{{ asset('img/team-logos/onic-200.png') }}">
								</div>
							</div>
							<div class="team-container">
								<div class="team-logo">
									<img src="{{ asset('img/team-logos/alter-200.png') }}">
								</div>
							</div>
							<div class="team-container">
								<div class="team-logo">
									<img src="{{ asset('img/team-logos/aura-200.png') }}">
								</div>
							</div>
							<div class="teams-more">
								10+ teams
							</div>
						</div>
					</div>

					
					<!-- event more than 3 teams -->
					<div class="match-card">
						<div class="title">
							<div class="game-thumb">
								<img src="{{ asset('img/game-logos/freefire-100.png') }}">
							</div>
							<div class="middle">
								<div class="game-name">RRQ Sena <span class="vs-word">vs</span> ONIC Prodigy</div>
								<div class="league-name">World Pro Championship Semi Finals</div>
							</div>
							<div class="title-date">
								<div class="game-date">24 Oct</div>
								<div class="game-time">18.30 WIB</div>
							</div>
						</div>
						<div class="teams many">
							<div class="team-container">
								<div class="team-logo">
									<img src="{{ asset('img/team-logos/onic-200.png') }}">
								</div>
							</div>
							<div class="team-container">
								<div class="team-logo">
									<img src="{{ asset('img/team-logos/alter-200.png') }}">
								</div>
							</div>
							<div class="team-container">
								<div class="team-logo">
									<img src="{{ asset('img/team-logos/aura-200.png') }}">
								</div>
							</div>
							<div class="teams-more">
								10+ teams
							</div>
						</div>
					</div>

				</div>
			</div> 
		</div>
	</div>
</section>

<section id="page-modals">
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="past-event-notice">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Pertandingan sudah selesai
				</div>
				<div class="modal-mid font-size-16 o5">
					Pertandingan ini sudah selesai. 
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="/mana/event-index" class="mana-btn-54 mana-btn-red scale-onclick">Lihat games upcoming</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
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
		
		// page specific scripts

	})
</script>
@endsection