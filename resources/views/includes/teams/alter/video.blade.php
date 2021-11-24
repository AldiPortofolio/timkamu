<div class="tmw-pane video active">
	<div class="vid-wrapper">
		<div class="item vid1 active">
			<iframe width="100%" height="100%" src="https://www.youtube.com/embed/_3hWiKeHURo?enablejsapi=1&version=3&playerapiid=ytplayer" frameborder="0" allow="accelerometer; autoplay;" allowfullscreen></iframe>
		</div>
		<div class="item vid2">
			<iframe width="100%" height="100%" src="https://www.youtube.com/embed/pNz1tZvDkmc?enablejsapi=1&version=3&playerapiid=ytplayer" frameborder="0" allow="accelerometer; autoplay;" allowfullscreen></iframe>
		</div>
		<div class="item vid3">
			<iframe width="100%" height="100%" src="https://www.youtube.com/embed/etYj-zo3YZA?enablejsapi=1&version=3&playerapiid=ytplayer" frameborder="0" allow="accelerometer; autoplay;" allowfullscreen></iframe>
		</div>
		<div class="item vid4">
			<iframe width="100%" height="100%" src="https://www.youtube.com/embed/TWN4eNBDEG8?enablejsapi=1&version=3&playerapiid=ytplayer" frameborder="0" allow="accelerometer; autoplay;" allowfullscreen></iframe>
		</div>
		<div class="item vid5">
			<iframe width="100%" height="100%" src="https://www.youtube.com/embed/mb7SGjz4Bso?enablejsapi=1&version=3&playerapiid=ytplayer" frameborder="0" allow="accelerometer; autoplay;" allowfullscreen></iframe>
		</div>
	</div>
	<div class="video-list">
		<div class="item active" data-target="vid1">
			<img src="https://img.youtube.com/vi/_3hWiKeHURo/mqdefault.jpg">
		</div>
		<div class="item" data-target="vid2">
			<img src="https://img.youtube.com/vi/pNz1tZvDkmc/mqdefault.jpg">
		</div>
		<div class="item" data-target="vid3">
			<img src="https://img.youtube.com/vi/etYj-zo3YZA/mqdefault.jpg">
		</div>
		<div class="item" data-target="vid4">
			<img src="https://img.youtube.com/vi/TWN4eNBDEG8/mqdefault.jpg">
		</div>
		<div class="item" data-target="vid5">
			<img src="https://img.youtube.com/vi/mb7SGjz4Bso/mqdefault.jpg">
		</div>
	</div>
	<table class="metro-table">
		<thead>
			<tr class="table-name">
				<th colspan="99" class="rajdhani-bold font-20 text-uppercase">Recent Matches & Tournaments</th>
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

<style type="text/css">
	
	.right .video .vid-wrapper {
		position: relative;
		height: 400px;
	}
	.right .video .vid-wrapper .item {
		height: 400px;
		width: 100%;
		position: absolute;
		display: none;
		top: 0;
		left: 0;
		background: rgba(0,0,0,1);
		padding-bottom: 10px;
	}
	.right .video .vid-wrapper .item.active {
		display: block;
	}
	.video-list {
		display: flex;
		margin-top: -8px;
	}
	.video-list .item {
		flex: 0 0 20%;
		position: relative;
		cursor: pointer;
	}
	.video-list .item:before {
		content: " ";
		width: 100%;
		height: 100%;
		background: rgba(0,0,0,0.7);
		position: absolute;
		top: 0;
		left: 0;
	}
	.video-list .item:hover:before,
	.video-list .item.active:before {
		content: none;
	}
	.video-list .item img {
		width: 100%;
	}
</style>