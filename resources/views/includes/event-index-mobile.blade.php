<div class="mobile-event-index">
    <div class="mobile-games-selector trigger">
    	<a href="#" class="mlbb game-1">
    	    Mobile Legends <span>({{ $data_events->where('league_games.game_id', '1')->count() }})</span>
		</a>
	</div>
	
    <div class="mobile--profile--area-selector-wrapper">
	    <div class="mobile--profile--area-selector mth-filter">
	        <i data-feather="chevron-down" class="icon"></i><span class="month">{{ \Carbon\Carbon::now()->format('F Y') }}</span>
		</div>
	    <div class="mobile--profile--area-selector past-filter">
	        <i data-feather="chevron-down" class="icon"></i><span class="filter-type">Upcoming matches</span>
		</div>
    </div>
	@foreach ($events as $key => $evnt)
		<div class="mobile-event-table mo-{{ \Carbon\Carbon::parse($key)->format('m') }}">
			@if (is_object($evnt) && count($evnt) > 0)
			<div class="mobile-event-table-month active">
				{{ \Carbon\Carbon::parse($key)->format('F Y') }}
			</div>
			@foreach ($evnt as $idx => $event)
				<div class="mobile-event-table-item game-{{ $event->league_games->game_id }} {{ $event->type === 'DONE' ? 'past' : ($event->type === 'ONGOING' ? 'live' : 'upcoming') }}" data-id="{{ $event->id }}">
					<div class="sides left">
						<img src="{{ asset($event->team_left->logo.'-50.png') }}" class="mobile-event-table-team-logo">
						<span class="mobile-event-table-team-name">{{ strtoupper($event->team_left->alias) }}</span>
					</div>
					<div class="sides mid">
						<div class="mobile-event-table-season">{{ $event->league_games->leagues->name }}</div>
						<div class="mobile-event-table-date">{{ \Carbon\Carbon::parse($event->start_date)->format('l, d F Y') }}</div>
						<span class="mobile-event-table-hours" style="font-size: 24px">{{ $event->team_left_score }} - {{ $event->team_right_score }}</span>
						<div class="mobile-event-table-hours modifier-upcoming">{{ \Carbon\Carbon::parse($event->start_date)->format('H:i') }}</div>
						<div class="mobile-event-table-hours modifier-live">LIVE</div>
						<div class="mobile-event-table-hours modifier-past">{{ \Carbon\Carbon::parse($event->start_date)->format('H:i') }} (Past Event)</div>
					</div>
					<div class="sides right">
						<img src="{{ asset($event->team_right->logo.'-50.png') }}" class="mobile-event-table-team-logo">
						<span class="mobile-event-table-team-name">{{ strtoupper($event->team_right->alias) }}</span>
					</div>
				</div>
			@endforeach
			@else
			<div class="mobile-event-table-month">
				{{ \Carbon\Carbon::parse($key)->format('F Y') }}
			</div>
			<div class="mobile-event-table-item no-bookmark">
				{{ $evnt }}
			</div> 
			@endif
			<!-- individual event submenus -->
			<div class="mbtray tray--event-item-options tray--colored">
				<a href="#" class="tray--close"><i data-feather="x" class="icon"></i>Close</a>
				<a href="#" class="btn-mobile-pertandingan">Lihat Pertandingan</a>
				<a href="#" data-toggle="modal" data-target="#rules">Peraturan</a>
			</div>
		</div>
	@endforeach
</div>
<style>
	.mobile-event-table-item.no-bookmark {
		display: none;
	}
	.mobile-event-table-item.no-bookmark.active {
		display: flex;
	}
</style>
<!-- events submenus -->
<div class="mbtray tray--event-filter-games tray--colored">
	<a href="#" class="tray--close"><i data-feather="x" class="icon"></i>Close</a>
    <div class="mobile-games-selector">
    	<a href="#" class="mlbb" data-name="Mobile Legends <span>({{ $data_events->where('league_games.game_id', '1')->count() }})</span>" data-class="mlbb" data-games="1">
    	    Mobile Legends <span>({{ $data_events->where('league_games.game_id', '1')->count() }})</span>
		</a>
		<a href="#" class="freefire" data-name="Freefire <span>({{ $data_events->where('league_games.game_id', '2')->count() }})</span>" data-class="freefire" data-games="2">
    	    Freefire <span>({{ $data_events->where('league_games.game_id', '2')->count() }})</span>
    	</a>
    	<a href="#" class="pubg" data-name="PUBG <span>({{ $data_events->where('league_games.game_id', '3')->count() }})</span>" data-class="pubg" data-games="3">
    	    PUBG <span>({{ $data_events->where('league_games.game_id', '3')->count() }})</span>
    	</a>
    </div>
</div>
<!-- events submenus -->
<div class="mbtray tray--event-filter-submenu-mth tray--colored">
    <a href="#" class="tray--close"><i data-feather="x" class="icon"></i>Close</a>
    <a href="#" class="tray--trigger" data-target="tray--filter-by-months"><i data-feather="calendar" class="icon"></i>2020<i data-feather="chevron-right" class="tray--right-side-icon"></i></a>
</div>
<!-- events submenus -->
<div class="mbtray tray--filter-by-months tray--colored">
    <a href="#" class="tray--close"><i data-feather="x" class="icon"></i>Close</a>
	<a href="#" class="tray--trigger tray--back" data-target="tray--event-filter-submenu"><i data-feather="arrow-up-left" class="icon"></i>Back</a>
	<div class="tray-boxed-choices">
		<div class="tray-boxed-choices-title">Games in 2020</div>
		<a href="#" data-mo="01" class="btn-filter-by-months">January</a>
		<a href="#" data-mo="02" class="btn-filter-by-months">February</a>
		<a href="#" data-mo="03" class="btn-filter-by-months">March</a>
		<a href="#" data-mo="04" class="btn-filter-by-months">April</a>
		<a href="#" data-mo="05" class="btn-filter-by-months">May</a>
		<a href="#" data-mo="06" class="btn-filter-by-months">June</a>
		<a href="#" data-mo="07" class="btn-filter-by-months">July</a>
		<a href="#" data-mo="08" class="btn-filter-by-months">August</a>
		<a href="#" data-mo="09" class="btn-filter-by-months">September</a>
		<a href="#" data-mo="10" class="btn-filter-by-months">October</a>
		<a href="#" data-mo="11" class="btn-filter-by-months">November</a>
		<a href="#" data-mo="12" class="btn-filter-by-months">December</a>
	</div>
</div>
<div class="mbtray tray--event-filter-submenu-past tray--colored">
    <a href="#" class="tray--close"><i data-feather="x" class="icon"></i>Close</a>
    <a href="#" class="btn-filter-by-type" data-type="upcoming"><i data-feather="clock" class="icon"></i>Upcoming matches</a>
    <a href="#" class="btn-filter-by-type" data-type="all"><i data-feather="clock" class="icon"></i>All matches</a>
</div>
<style type="text/css">
	.tray-boxed-choices {
		display: flex;
		flex-wrap: wrap;
	}
	.tray-boxed-choices a {
		flex: 0 0 33.33%;
		padding: 16px;
	    background: #444162;
	    color: rgba(255,255,255,0.8);
	    border-bottom: 1px solid rgba(0,0,0,0.2);
	    border-right: 1px solid rgba(0,0,0,0.2);
	}
	.tray-boxed-choices-title {
		flex: 0 0 100%;
		padding: 16px;
	    background: #302d4a;
	    color: rgba(255,255,255,0.8);
	    border-bottom: 1px solid rgba(0,0,0,0.2);
	}
	.mobile-event-table {
		display: none;
	}

	.mobile-event-table.active {
		display: block;
	}

	.mobile-event-table-season {
		font-family:'Nunito Sans';
		font-weight: 400;
	    font-size: 12px;
	    opacity: 0.5;
	}
	.mobile-event-table-date {
		font-family:'Nunito Sans';
		font-weight: 800;
	    font-size: 12px;
	}
	.mobile-event-table-hours {
		font-family:'Rajdhani-Bold';
	    font-size: 18px;
	    margin-top: 10px;
	}
	.mobile-event-table-month {
	    padding: 10px 25px;
		font-family:'Nunito Sans';
		font-weight: 800;
	    font-size: 12px;
		background: rgba(0,0,0,0.6);
		display: none;
	}
	.mobile-event-table-month.active {
		display: flex;
	}
	.mobile-event-table-item {
		background: rgba(0,0,0,0.2);
		border-bottom: 1px solid rgba(255,255,255,0.3);
		display: none;
	}
	.mobile-event-table-item.past {
		opacity: 0.5;
	}

	.mobile-event-table-item.active {
		display: flex;
	}
	.mobile-event-table-item .sides {
		padding: 15px;
		flex: 0 0 80px;
		text-align: center;
		line-height: initial;
		display: flex;
	    flex-direction: column;
	    justify-content: center;
	}
	.mobile-event-table-item .sides.mid {
		flex: 1;
		background: rgba(0,0,0,0.2);
	}
	.mobile-event-table-item.live .sides.mid {
		background: rgb(233 30 99);
	}
	.mobile-event-table-item .sides.mid .modifier-live,
	.mobile-event-table-item .sides.mid .modifier-past {
		display: none;
	}
	.mobile-event-table-item.live .sides.mid .modifier-live {
		display: block;
	}
	.mobile-event-table-item.live .sides.mid .modifier-upcoming,
	.mobile-event-table-item.past .sides.mid .modifier-upcoming {
		display: none;
	}
	.mobile-event-table-item.past .sides.mid .modifier-past {
		display: block;
	}
	.mobile-event-table-item .sides.right {
	}
	.mobile-event-table-team-name {
		font-family:'Rajdhani-Bold';
		text-transform: uppercase;
	}
	.mobile-event-table-team-logo {
		width: 100%;
	}
	.mobile-games-selector a {
		background-size: cover;
		background-position: center;
		padding: 40px 25px;
		width: 100%;
		display: block;
		color: white;
		font-family:'Nunito Sans';
		font-weight: 800;
		font-size: 20px;
	}
	.mobile-games-selector a span {
		font-size: 12px;
		opacity: 0.7;
		font-weight: 400;
	}
	.mobile-games-selector a.mlbb {background-image: linear-gradient(rgba(255,0,87,0.1), #E91E63), url("{{ asset('img/inside1.jpg') }}");}
	.mobile-games-selector a.freefire {background-image: linear-gradient(rgba(255,0,87,0.1), rgba(0, 35, 210, 0.8)), url("{{ asset('img/lg2.jpg') }}");}
	.mobile-games-selector a.pubg {background-image: linear-gradient(rgba(255,0,87,0.1), rgba(255, 200, 0, 0.8)), url("{{ asset('img/lg3.jpg') }}");}

	/* .mobile-games-selector.trigger a{
		display: none;
	}
	.mobile-games-selector.trigger a.active {
		display: block;
	} */

	.mobile--profile--area-selector-wrapper {
		display: flex;
	}
	.mobile-event-index .mobile--profile--area-selector {
	    background: #673AB7;
        padding: 15px 25px;
        font-family: 'Nunito Sans';
        font-size: 12px;
        position: relative;
        font-weight: 800;
        flex: 1 1 50%;
	}
	.mobile-event-index .mobile--profile--area-selector.past-filter {
	    background: #03A9F4;
	}
	.mobile-event-index .mobile--profile--area-selector .icon {
	    width: 16px;
	    stroke-width: 3px;
	    margin-right: 10px;
	    height: 22px;
	    position: absolute;
	    right: 12px;
	    top: 50%;
	    transform: translate(0,-50%);
	}
	.mobile-event-index .games-wrapper {
		margin-bottom: 0px;
		height: 
	}
	.mobile-event-index .games-wrapper .item {
		width: 100%;
	}
	.mobile-event-index .games-wrapper .item.active {
	}
</style>
<style type="text/css">
    .mobile-event-index {
        display: none;
        padding-bottom: 100px;
    }
	@media (max-width: 992px) {
	    .root.event-index {
	        display: none;
	    }
	    .mobile-event-index {
	        display: block;
	        margin-top: 70px;
	    }
	}

	.btn-mobile-dukungan {
		display: none !important;
	}
	.can-support {
		display: flex !important;
	}
</style>