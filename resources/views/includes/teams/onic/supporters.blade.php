<div class="tmw-pane supporters">
	<div class="opk">
		<div class="item active" data-target="opk-day">
			Past 24 hours
		</div>
		<div class="item" data-target="opk-week">
			Past 7 days
		</div>
		<div class="item" data-target="opk-all">
			All Time Leaderboard
		</div>
	</div>
	<div class="ijk opk-day active">
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
	<div class="ijk opk-week">
		@for ($i = 0; $i < 20; $i++)
			<div class="xfg">
				<p>
					<img src="{{ asset('img/ranks/ranks-11.png') }}" class="rank" data-toggle="tooltip" data-placement="top" title="Gold II">
					<span class="name">just1n3</span> 
					just donated <img src="{{ asset('img/items/items-07.png') }}" class="tyx"> 
					worth 1,200 <img src="{{ asset('img/currencies/lp.svg') }}" class="curr-icon">
				</p>
				<div class="lkjg">3 hours ago</div>
			</div>
		@endfor
	</div>
</div>

<style type="text/css">
	.ijk {
		position: absolute;
		top: 0;
		left: 0;
		display: none;
		width: 100%;
	}
	.ijk.active {
		display: block;
		position: relative;
	}
	.opk {
		display: flex;
	}
	.opk .item {
		flex: 0 0 33.33%;
		text-align: center;
		font-family: 'Nunito Sans';
		font-weight: 800;
		font-size: 12px;
		border-right: 1px solid rgba(255,255,255,0.1);
		line-height: 50px;
		background: rgba(0,0,0,0.5);
		cursor: pointer;
	}
	.opk .item:hover,
	.opk .item.active {
		background: rgba(0,0,0,0.8);
	}
	.xfg {
		position: relative;
		padding: 13px 15px;
		line-height: initial;
		background: rgba(0,0,0,0.2);
		width: 100%;
		font-size: 12px;
	}
	.xfg .name {
		color: #2196f3;
		font-family: 'Nunito Sans';
		font-weight: 800;
	}
	.xfg .rank {
		height: 24px;
		margin-right: 5px;
	}
	.xfg .lkjg {
		position: absolute;
		right: 15px;
		top: 50%;
		transform: translate(0,-50%);
		opacity: 0.3;
		font-style: italic;
		font-size: 12px;
	}
	.xfg:nth-child(even) {
		background: rgba(0,0,0,0.3);
	}
	.xfg .curr-icon {
		width: 18px;
	    position: relative;
	    top: -2px;
	}
	.xfg .propic {
		width: 24px;
		height: 24px;
		background-image: url(<?php echo asset('img/propic.jpg') ?>);
		background-size: cover;
		background-position: center;
		float: left;
		border-radius: 50px;
		position: relative;
		top: -2px;
		margin-right: 10px;
	}
	.xfg .propic2 {
		width: 24px;
		height: 24px;
		background-image: url(img/profile1.jpg);
		background-size: cover;
		background-position: center;
		float: left;
		border-radius: 50px;
		position: relative;
		top: -2px;
		margin-right: 10px;
	}
	.xfg p {
		margin: 0;
		position: relative;
	}
	.xfg .tyx {
		width: 18px;
	    position: relative;
	    top: -2px;
	}
</style>