<style type="text/css">
	.tmb1 {
		display: block;
	}
	.tmb2 {
		display: none;
	}
	.mobile-team-detail-logo {
		padding-top: 100px;
		padding-bottom: 50px;
		display: flex;
		align-items: center;
		justify-content: center;
		background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url({{ asset('img/t.jpg') }});
		background-size: cover;
		background-position: center;
	}
	.mobile-team-detail-logo .inner {
		text-align: center;
	}
	.mobile-team-detail-logo .name {
		font-size: 30px;
	}
	.mobile-team-detail-logo img {
		width: 130px;
	}
	@media (max-width: 1200px) {
		.tmb1 {
			display: none;
		}
		.tmb2 {
			display: block;
		}
	}
</style>

<style type="text/css">
	.tmb2 .area-info {
	    background: rgba(0,0,0,0.4);
	}
	.tmb2 .area-info--box {
	    padding: 15px 25px;
	    border-bottom: 1px solid rgba(255,255,255,0.1);
	}
	.tmb2 .area-info--box .info-header {
	    font-size: 12px;
	}
	.tmb2 .area-info--box span {
	    font-size: 16px;
	    font-family: 'Nunito Sans';
	    font-weight: 800;
	}
	.tmb2 .area-info--box .icon {
	    width: 16px;
	    position: relative;
	    top: -1px;
	    margin-right: 5px;
	}
	.tmb2 .info-header {
		font-size: 10px;
		opacity: 0.5;
		color: white;
		text-transform: uppercase;
		line-height: initial;
		margin-bottom: 5px;
	}
	.mobile--teams--area-selector {
	    background: #f50e52;
	    padding: 20px 25px;
	    font-family: 'Nunito Sans';
	    font-weight: 800;
	    font-size: 16px;
	    position: relative;
	}
	.mobile--teams--area-selector .icon {
	    width: 22px;
	    stroke-width: 3px;
	    margin-right: 10px;
	    height: 22px;
	    position: absolute;
	    right: 5px;
	    top: 50%;
	    transform: translate(0,-50%);
	}
	.mobile-team-section {
		display: none;
	}
	.mobile-team-section.active {
		display: block;
	}
	.mobile-team-section .xfg {
		padding-top: 36px;
	}
	.mobile-team-section .xfg .lkjg {
		left: 18px;
	    top: 22px;
	}
	.mobile-team-detail-logo .teams-detail-join.joined {
		position: unset;
	    margin-top: 24px;
	}
</style>

<!-- teams/detail submenus -->
<div class="mbtray tray--teams-submenu tray--colored">
    <a href="#" class="tray--close"><i data-feather="x" class="icon"></i>Close</a>
    <a href="#" class="mobile-team-submenu-trigger" data-target="team-overview" data-info="Team Overview"><i data-feather="user" class="icon"></i>Team Overview</a>
    <a href="#" class="mobile-team-submenu-trigger" data-target="team-supporters" data-info="Team Supporters"><i data-feather="star" class="icon"></i>Supporters</a>
    <a href="#" class="mobile-team-submenu-trigger" data-target="team-members" data-info="Team Members"><i data-feather="users" class="icon"></i>Team Members</a>
    <a href="#"><i data-feather="shopping-bag" class="icon"></i>Store</a>
    <a href="#"><i data-feather="image" class="icon"></i>Photos</a>
</div>

<div class="tmb2 m-content">

	<div class="mobile-team-detail-logo">
		<div class="inner">
			<img src="{{ asset('img/team-logos/onic.png') }}">
			<div class="rajdhani-bold name">ONIC Esports</div>
			<div class="teams-detail-join joined">
                <span><i data-feather="heart" class="icon"></i>Kamu adalah fans ONIC</span>
            </div>
		</div>
	</div>

	<div class="mobile--teams--area-selector">
        <i data-feather="more-vertical" class="icon"></i><span>Team Overview</span>
    </div>

	<div class="mobile-team-section team-overview active">
		<div class="area-info">
		    <div class="area-info--box">
		        <div class="info-header">Founded</div>
		        <span>2018-07-26</span>
		    </div>
		    <div class="area-info--box">
		        <div class="info-header">Highest Achievement</div>
		        <span>1st Winner MPL Season 6</span>
		    </div>
		    <div class="area-info--box">
		        <div class="info-header">Total Timkamu Fans</div>
		        <span>47,904</span>
		    </div>
		    <div class="area-info--box">
		        <div class="info-header">Total Incoming Support</div>
		        <span><img src="{{ asset('img/currencies/lp.svg') }}" class="icon">22,240</span>
		    </div>
		    <div class="area-info--box">
		        <div class="info-header">Current Sponsors</div>
		        <span>
		        	Biznet <br>
		        	Fore <br>
		        	Kratingdaeng <br>
		        	Dana <br>
		        	Realme
		        </span>
		    </div>
		</div>
	</div>

	<div class="mobile-team-section team-supporters">
		@for ($i = 0; $i < 20; $i++)
            <div class="xfg">
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

	<div class="mobile-team-section team-members">
		<table class="metro-table">
			<thead>
				<tr class="table-name">
					<th colspan="99" class="rajdhani-bold font-20 text-uppercase">MLBB Active Squad</th>
				</tr>
				<tr>
					<th>Nick</th>
					<th>Role</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Matthew</td>
					<td>Scout, Support	</td>
				</tr>
				<tr>
					<td>NiKK</td>
					<td>Attacker</td>
				</tr>
				<tr>
					<td>Kape</td>
					<td>Sniper</td>
				</tr>
				<tr>
					<td>Cleon</td>
					<td>Attacker</td>
				</tr>
				<tr>
					<td>Kent</td>
					<td>Support</td>
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
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Matthew</td>
					<td>Scout, Support	</td>
				</tr>
				<tr>
					<td>NiKK</td>
					<td>Attacker</td>
				</tr>
				<tr>
					<td>Kape</td>
					<td>Sniper</td>
				</tr>
				<tr>
					<td>Cleon</td>
					<td>Attacker</td>
				</tr>
				<tr>
					<td>Kent</td>
					<td>Support</td>
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
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Matthew</td>
					<td>Scout, Support	</td>
				</tr>
				<tr>
					<td>NiKK</td>
					<td>Attacker</td>
				</tr>
				<tr>
					<td>Kape</td>
					<td>Sniper</td>
				</tr>
				<tr>
					<td>Cleon</td>
					<td>Attacker</td>
				</tr>
				<tr>
					<td>Kent</td>
					<td>Support</td>
				</tr>
			</tbody>
		</table>
	</div>



</div>