@extends('layouts.mana-ui')

@section('page_title', "TimKamu (PTS) - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui team-index')


@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<?php 

$teams = [
	'BOOM Esports' => 'boom-200.png',
	'EVOS Legends' => 'evos-200.png',
	'ONIC Esports' => 'onic-200.png',
	'Alterego' => 'alter-200.png',
	'EXP Esports' => 'exp-200.png',
	'G2' => 'g2-200.png',
	'Bigetron Alpha' => 'btr-200.png',
];

?>

<!-- page content -->
<section id="page-content">

	<!-- page header -->
	<div id="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="section-title position-relative">
						<h1 class="rajdhani-bold">Esport Teams</h1>
					</div>
				</div>
			</div> 
		</div>
	</div>

	<!-- page section -->
	<div id="team-view-header" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="event-index-filter-select">
						<select class="custom-select team-index-filter">
							<option value="fans">20 teams with most fans</option>
							<option value="lp">20 teams with most LP support</option>
							<option value="name">Sort by name A-Z</option>
						</select>
					</div>

					<div class="form-group mana-control">
						<div class="row">
							<div class="col-8 pr-1">
								<input type="text" class="form-control mana-control" placeholder="Cari nama tim...">
							</div>
							<div class="col-4 pl-1">
								<a href="#" class="mana-btn-54 inline-search mana-btn-red has-spinner mb-15 team-search-go">
									<span class="default-text">Search</span>
									<div class="spinner-border hw24"></div>
								</a>
							</div>
						</div>
					</div>
					
					<div class="search-result-area">

						<p class="grey-10">Menampilkan <span class="white-10">20</span> tim dari <span class="white-10">91</span> total tim</p>

						<div class="row search-container">
							<?php foreach ($teams as $key => $value): ?>
								<div class="col-6 col-md-4 mb-20 team-col">
									<a href="/mana/team-view">
										<div class="team-item">
											<div class="thumb">
												<img src="/img/team-logos/<?php echo $value; ?>" class="w-100">
											</div>
											<div class="name">
												<?php echo $key; ?>
											</div>
											<div class="meta">
												<!-- <img src="/icons/heart-red.svg" class="icon"> <span>12,290</span> -->
												<img src="/img/currencies/lp.svg" class="icon lp"> <span>12,290</span>
											</div>
										</div>
									</a>
								</div>
							<?php endforeach; ?>
						</div>

						<p class="o3 ml-1 mr-1 search-disclaimer d-none text-center">Menampilkan maksimal 10 tim. Persempit pencarian kamu jika tim tidak ditemukan.</p>
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
	.search-container {
		margin-right: -10px;
		margin-left: -10px;
	}
	.team-col {
		padding-right: 10px;
		padding-left: 10px;
	}
	.mana-btn-54.inline-search {
		line-height: 48px;
		height: 48px;
		font-size: 14px;
	}
	.team-item {
		border-radius: 20px;
		background: rgb(0 0 0 / .2);
		padding: 15px;
		cursor: pointer;
		height: 100%;
	}
	.team-item:hover {
		background: rgb(0 0 0 / .4);
	}
	.team-item .name {
		font-family: 'Rajdhani-Bold';
		font-size: 18px;
		line-height: 20px;
		text-align: center;
	}
	.team-item {transition: all 0.1s ease-in-out;}
	.team-item:active {transform: scale(1.05) !important;}

	.team-item .meta {
		margin-top: 5px;
		font-size: 14px;
		text-align: center;
	}
	.team-item .meta span {
		opacity: .5;
	}
	.team-item .meta .icon {
		height: 14px;
		width: 14px;
		position: relative;
		top: -1px;
		opacity: .8;
	}
	.team-item .meta .icon.lp {
		top: -2px;
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
		$('body').on('click', '.team-search-go', function(e) {
			e.preventDefault();

			var loc1 = $(this);
			var loc2 = $('.search-disclaimer');

			loc1.addClass('loading');

			setTimeout(function() {
			    loc1.removeClass('loading');
			    loc2.removeClass('d-none');
			}, 500); 
		});
	})
</script>
@endsection