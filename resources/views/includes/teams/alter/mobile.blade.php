<style type="text/css">
	.tmb1 {
		display: block;
	}
	.tmb2 {
		display: none;
	}
	.mtm-logo {
		padding-top: 100px;
		padding-bottom: 50px;
		display: flex;
		align-items: center;
		justify-content: center;
		background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url(img/t.jpg);
		background-size: cover;
		background-position: center;
	}
	.mtm-logo .inner {
		text-align: center;
	}
	.mtm-logo .name {
		font-size: 30px;
	}
	.mtm-logo img {
		width: 130px;
	}
	.mtm-expand {
		opacity: 0.7;
	    font-family: 'Nunito Sans';
	    font-weight: 800;
	    font-size: 12px;
	    text-transform: uppercase;
	    margin-top: 15px;
	    border: 2px solid #ffffff99;
	    border-radius: 50px;
	}
	.mtm-expand.active {
		background: white;
		opacity: 1;
	    border: 2px solid #fff;
	    color: #333;
	}
	.mtm-expand.active .icon {
		transform: rotate(180deg);
	}
	.mtm-expand .icon {
		width: 14px;
	    position: relative;
	    top: -2px;
		transition: all 0.1s ease-in;
	}
	.mtm-stats,
	.mtm-video {
		background: rgba(0,0,0,0.8);
	}
	.mtm-video {
		height: 250px;
	}
	.mtm-sections {
		display: none;
	}
	.mtm-sections.active {
		display: block;
	}
	.mtm-sections a {
		line-height: 60px;
		padding: 0 25px;
		border-bottom: 1px solid rgba(255,255,255,0.1);
		display: block;
		color: white;
		background: rgba(0,0,0,0.6);
		text-align: center;
	    font-family: 'Nunito Sans';
	    font-weight: 800;
	    font-size: 12px;
	    text-transform: uppercase;
	}
	.mtm-sections a.active {
		background: rgba(255, 0, 87, 0.5);
	}
	.sca {
		display: none;
		background: rgba(0,0,0,0.6);
		padding-bottom: 100px;
	}
	.sca.active {display: block;}
	@media (max-width: 1200px) {
		.tmb1 {
			display: none;
		}
		.tmb2 {
			display: block;
		}
	}
</style>

<div class="tmb2 m-content">

	<div class="mtm-logo">
		<div class="inner">
			<img src="img/team-logos/onic.png">
			<div class="rajdhani-bold name">ONIC Esports</div>
			<div class="mtm-expand">Sections <i data-feather="chevrons-down" class="icon"></i></div>
		</div>
	</div>

	<div class="mtm-sections">
		<a href="#" class="active" data-target="sc-profile">Team Profile</a>
		<a href="#" data-target="sc-members">Members</a>
		<a href="#" data-target="sc-supporters">Supporters</a>
		<a href="#" data-target="sc-store">Store</a>
		<a href="#" data-target="sc-photos">Photos</a>
	</div>

	<div class="sca sc-profile active">
		<div class="mtm-video">
			<iframe width="100%" height="100%" src="https://www.youtube.com/embed/_3hWiKeHURo?enablejsapi=1&version=3&playerapiid=ytplayer" frameborder="0" allow="accelerometer; autoplay;" allowfullscreen></iframe>
		</div>

		<div class="mtm-stats">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
	</div>

	<div class="sca sc-members">
		<table class="metro-table">
			<thead>
				<tr class="table-name">
					<th colspan="99" class="rajdhani-bold font-20 text-uppercase">MLBB Active Squad</th>
				</tr>
				<tr>
					<th>Nick</th>
					<th>Role</th>
					<th>Join Date</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Matthew</td>
					<td>Scout, Support	</td>
					<td>7/10/2020</td>
				</tr>
				<tr>
					<td>NiKK</td>
					<td>Attacker</td>
					<td>7/10/2020</td>
				</tr>
				<tr>
					<td>Kape</td>
					<td>Sniper</td>
					<td>7/10/2020</td>
				</tr>
				<tr>
					<td>Cleon</td>
					<td>Attacker</td>
					<td>7/10/2020</td>
				</tr>
				<tr>
					<td>Kent</td>
					<td>Support</td>
					<td>7/10/2020</td>
				</tr>
			</tbody>
		</table>
		<table class="metro-table">
			<thead>
				<tr class="table-name">
					<th colspan="99" class="rajdhani-bold font-20 text-uppercase">PUBG Active Squad</th>
				</tr>
				<tr>
					<th>Nick</th>
					<th>Role</th>
					<th>Join Date</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Matthew</td>
					<td>Scout, Support	</td>
					<td>7/10/2020</td>
				</tr>
				<tr>
					<td>NiKK</td>
					<td>Attacker</td>
					<td>7/10/2020</td>
				</tr>
				<tr>
					<td>Kape</td>
					<td>Sniper</td>
					<td>7/10/2020</td>
				</tr>
				<tr>
					<td>Cleon</td>
					<td>Attacker</td>
					<td>7/10/2020</td>
				</tr>
				<tr>
					<td>Kent</td>
					<td>Support</td>
					<td>7/10/2020</td>
				</tr>
			</tbody>
		</table>
		<table class="metro-table">
			<thead>
				<tr class="table-name">
					<th colspan="99" class="rajdhani-bold font-20 text-uppercase">Freefire Active Squad</th>
				</tr>
				<tr>
					<th>Nick</th>
					<th>Role</th>
					<th>Join Date</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Matthew</td>
					<td>Scout, Support	</td>
					<td>7/10/2020</td>
				</tr>
				<tr>
					<td>NiKK</td>
					<td>Attacker</td>
					<td>7/10/2020</td>
				</tr>
				<tr>
					<td>Kape</td>
					<td>Sniper</td>
					<td>7/10/2020</td>
				</tr>
				<tr>
					<td>Cleon</td>
					<td>Attacker</td>
					<td>7/10/2020</td>
				</tr>
				<tr>
					<td>Kent</td>
					<td>Support</td>
					<td>7/10/2020</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="sca sc-supporters">
		<div class="ijk opk-day active">
			@for ($i = 0; $i < 20; $i++)
                <div class="xfg">
					<div class="propic"></div>
					<p>
						<img src="{{ asset('img/ranks/ranks-05.png') }}" class="rank" data-toggle="tooltip" data-placement="top" title="Silver II">
						<span class="name">Ferdian Jahja</span> 
						just donated <img src="{{ asset('img/items/items-06.png') }}" class="tyx"> 
						worth 200 <img src="{{ asset('img/currencies/lp.svg') }}" class="curr-icon">
					</p>
					<div class="lkjg">3 hours ago</div>
				</div>
            @endfor
		</div>
	</div>

</div>