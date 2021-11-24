<?php require 'controller.php'; ?>
<?php require 'snippets/head.php'; ?>
<body class="bg1">

	<?php require 'snippets/menu.php'; ?>

	<div class="root">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="rajdhani-bold font-30 text-uppercase color-white mb-0">Catatan Transaksi LP</h2>
					<h5 class="color-white opacity-05 font-14 mb-5 game-name">Manage my account</h5>

					<div class="profile-wrapper">
						
						<?php require 'snippets/profile-left.php'; ?>
						
						<div class="right">
							<div class="curr-stat">
								<div class="inside">
									<h5>Current balance</h5>
									<p>250 <img src="img/currencies/lp.svg" class="curr-icon"></p>
								</div>
							</div>
							<div class="curr-stat">
								<div class="inside">
									<h5>Total Gain <br>(past month)</h5>
									<p>+1,250 <img src="img/currencies/lp.svg" class="curr-icon"></p>
								</div>
							</div>
							<div class="curr-stat">
								<div class="inside">
									<h5>Total Spending <br>(past month)</h5>
									<p>-1,000 <img src="img/currencies/lp.svg" class="curr-icon"></p>
								</div>
							</div>
							<div class="curr-recharge">
								<a href="beli-lp.php" class="lp">
									Recharge
								</a>
								<a href="beli-lp.php" class="bp">
									Convert
								</a>
							</div>
							<div class="table-wrapper">
								<table class="metro-table">
									<thead>
										<tr>
											<th class="">Item</th>
											<th class="">Amount</th>
											<th class="">Time</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Beli pulsa Indosat Rp 50,000</td>
											<td><span class="curr-lp">-1,000</span> <img src="img/currencies/lp.svg" class="curr-icon"></td>
											<td>7/10/2020, 6:15 PM</td>
										</tr>
										<tr>
											<td>[Reward] Daily login rewards</td>
											<td><span class="curr-lp">+100</span> <img src="img/currencies/lp.svg" class="curr-icon"></td>
											<td>7/10/2020, 6:15 PM</td>
										</tr>
										<tr>
											<td>[Reward] Become fan of any team rewards</td>
											<td><span class="curr-lp">+100</span> <img src="img/currencies/lp.svg" class="curr-icon"></td>
											<td>7/10/2020, 6:15 PM</td>
										</tr>
										<tr>
											<td>[Reward] Daily LP rewards</td>
											<td><span class="curr-lp">+50</span> <img src="img/currencies/lp.svg" class="curr-icon"></td>
											<td>7/10/2020, 6:15 PM</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>


				</div>
				
			</div>
		</div>
	</div>

	<style type="text/css">
		body.bg1 {
			background-image: url(img/f1a.jpg);
			background-size: cover;
			background-position: center;
  			background-attachment: fixed;
		}
		.root {
			padding-top: 100px;
		}

		.table-wrapper {
		}
		.metro-table {
			width: 100%;
		}
		.metro-table th, 
		.metro-table td {
			background: rgba(0,0,0,0.4);
			font-weight: 800;
			font-family: 'Nunito Sans';
			text-transform: uppercase;
			color: #ffffffee;
			font-size: 12px;
		    padding: 8px 20px;
		}
		.metro-table td {
			background: rgba(0,0,0,0.2);
			color: #ffffffdd;
			font-weight: 400;
			font-size: 12px;
		    padding: 8px 20px;
		    text-transform: none;
		}
		.metro-table tr:nth-child(even) td {
			background: rgba(0,0,0,0.1);
		}
		.metro-table td .curr-icon {
			width: 16px;
			position: relative;
			top: -2px;
		}
		.curr-lp {
			color: #c36ad2;
		    font-weight: 800;
		    font-size: 14px;
		}
		.curr-stat {
			width: 33.33%;
			height: 100px;
			float: left;
			border-right: 1px solid rgba(255,255,255,0.1);
			position: relative;
		}
		.curr-stat .inside {
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			position: absolute;
		}
		.curr-stat .inside h5 {
			font-size: 10px;
		    opacity: 0.5;
		    color: white;
		    text-transform: uppercase;
		    line-height: initial;
			margin: 0;
			padding: 0;
		}
		.curr-stat .inside p {
			font-size: 18px;
			margin: 0;
			padding: 0;
		}
		.curr-stat .inside .curr-icon {
			width: 16px;
			position: relative;
			top: -2px;
		}
		.curr-recharge a {
			color: #fff;
		    font-size: 12px;
		    text-transform: uppercase;
		    font-family: 'Nunito Sans';
		    font-weight: 800;
		    display: block;
			width: 50%;
		    line-height: 46px;
		    float: left;
		    text-align: center;
		    background: #e91e63a1;
		}
		.curr-recharge a:hover {
		    background: #e91e63;
		}
		.curr-recharge a.bp {
		    background: #03A9F4a1;
		}
		.curr-recharge a.bp:hover {
		    background: #03A9F4;
		}
		.curr-recharge a.bp .curr-icon {
		    width: 14px;
		    position: relative;
		    top: -1px;
		}
		.curr-recharge .curr-icon {
			width: 16px;
			position: relative;
			top: -2px;
		}
	</style>
	
	<?php require 'snippets/scripts.php'; ?>

	<script type="text/javascript">
		$(document).ready(function() {

		});
	</script>
</body>
</html>