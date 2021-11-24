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
					
					<!-- live event card -->
					<div class="event-card cursor-ptr bg233339030 bd20 live" onclick="location.href='/mana/event-view';">
						<div class="event-card-meta d-flex flex-column justify-content-center position-relative">
							<div class="event-card-meta-date font-size-16 font-weight-bold">Fri, 20 Sept</div>
							<div class="event-card-meta-league">MPL Regular Season 2020</div>
							<div class="event-card-meta-time">15.30</div>
						</div>
						<div class="event-card-bottom d-flex bg233339030 bd20">
							<div class="col event-card-bottom-left d-flex flex-column align-items-center">
								<img src="{{ asset('img/team-logos/onic-200.png') }}" class="event-card-bottom-right-teampic">
								<div class="event-card-bottom-team-name rajdhani-bold font-size-14">ONIC</div>
							</div>
							<div class="col event-card-bottom-mid bg2333390 bd20 d-flex justify-content-center align-items-center">
								<span class="rajdhani-bold font-size-28 o9">LIVE</span>
							</div>
							<div class="col event-card-bottom-right d-flex flex-column align-items-center">
								<img src="{{ asset('img/team-logos/evos-200.png') }}" class="event-card-bottom-right-teampic">
								<div class="event-card-bottom-team-name rajdhani-bold font-size-14">EVOS</div>
							</div>
						</div>
					</div>
					
					<!-- upcoming event card -->
					<div class="event-card cursor-ptr bg020 bd20" onclick="location.href='/mana/event-view';">
						<div class="event-card-meta d-flex flex-column justify-content-center position-relative">
							<div class="event-card-meta-date font-size-16 font-weight-bold">Fri, 20 Sept</div>
							<div class="event-card-meta-league">MPL Regular Season 2020</div>
							<div class="event-card-meta-time">15.30</div>
						</div>
						<div class="event-card-bottom d-flex bg020 bd20">
							<div class="col event-card-bottom-left d-flex flex-column align-items-center">
								<img src="{{ asset('img/team-logos/onic-200.png') }}" class="event-card-bottom-right-teampic">
								<div class="event-card-bottom-team-name rajdhani-bold font-size-14">ONIC</div>
							</div>
							<div class="col event-card-bottom-mid bg020 bd20 d-flex justify-content-center align-items-center">
								<span class="rajdhani-bold font-size-28 o5">0&nbsp;&nbsp;-&nbsp;&nbsp;0</span>
							</div>
							<div class="col event-card-bottom-right d-flex flex-column align-items-center">
								<img src="{{ asset('img/team-logos/evos-200.png') }}" class="event-card-bottom-right-teampic">
								<div class="event-card-bottom-team-name rajdhani-bold font-size-14">EVOS</div>
							</div>
						</div>
					</div>
					
					<!-- past event card -->
					<div class="event-card cursor-ptr bg25510 bd20 past" data-toggle="modal" data-target="#past-event-notice">
						<div class="event-card-meta d-flex flex-column justify-content-center position-relative">
							<div class="event-card-meta-date font-size-16 font-weight-bold">Fri, 20 Sept</div>
							<div class="event-card-meta-league">MPL Regular Season 2020</div>
							<div class="event-card-meta-time">15.30</div>
						</div>
						<div class="event-card-bottom d-flex bg25510 bd20">
							<div class="col event-card-bottom-left d-flex flex-column align-items-center">
								<img src="{{ asset('img/team-logos/onic-200.png') }}" class="event-card-bottom-right-teampic">
								<div class="event-card-bottom-team-name rajdhani-bold font-size-14">ONIC</div>
							</div>
							<div class="col event-card-bottom-mid bg25520 bd20 d-flex justify-content-center align-items-center">
								<span class="rajdhani-bold font-size-28 o5">0&nbsp;&nbsp;-&nbsp;&nbsp;0</span>
							</div>
							<div class="col event-card-bottom-right d-flex flex-column align-items-center">
								<img src="{{ asset('img/team-logos/evos-200.png') }}" class="event-card-bottom-right-teampic">
								<div class="event-card-bottom-team-name rajdhani-bold font-size-14">EVOS</div>
							</div>
						</div>
					</div>
					
					<!-- upcoming event card -->
					<div class="event-card cursor-ptr bg020 bd20" onclick="location.href='/mana/event-view';">
						<div class="event-card-meta d-flex flex-column justify-content-center position-relative">
							<div class="event-card-meta-date font-size-16 font-weight-bold">Fri, 20 Sept</div>
							<div class="event-card-meta-league">FFIM 2020 Fall</div>
							<div class="event-card-meta-time">15.30</div>
						</div>
						<div class="event-card-bottom d-flex bg020 bd20">
							<div class="col event-card-bottom-left d-flex flex-column align-items-center">
								<img src="{{ asset('img/team-logos/onic-200.png') }}" class="event-card-bottom-right-teampic">
								<div class="event-card-bottom-team-name rajdhani-bold font-size-14">ONIC</div>
							</div>
							<div class="col event-card-bottom-mid bg020 bd20 d-flex justify-content-center align-items-center">
								<span class="rajdhani-bold font-size-28 o5">0&nbsp;&nbsp;-&nbsp;&nbsp;0</span>
							</div>
							<div class="col event-card-bottom-right d-flex flex-column align-items-center">
								<img src="{{ asset('img/team-logos/evos-200.png') }}" class="event-card-bottom-right-teampic">
								<div class="event-card-bottom-team-name rajdhani-bold font-size-14">EVOS</div>
							</div>
						</div>
					</div>
					
					<!-- no event card -->
					<!-- <div class="event-card no-event bd20 bg25510 text-center">
						<span class="o5">no events</span>
					</div> -->

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