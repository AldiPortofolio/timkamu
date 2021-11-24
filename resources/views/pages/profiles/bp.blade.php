@extends('layouts.app')

@section('body_class', "bg1")
@section('content')

@include('includes.menu')
<div class="root profile-bp">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="rajdhani-bold font-30 text-uppercase color-white mb-0">Catatan Transaksi LP</h2>
                <h5 class="color-white opacity-05 font-14 mb-5 game-name">Manage my account</h5>

                <div class="profile-wrapper">
                    
                    @include('includes.profile-left')

                    <div class="right">
						<div class="curr-stat">
							<div class="inside">
								<h5>Current balance</h5>
								<p>{{ number_format(Auth::user()->total_bp, 0, '.', ',') }} <img src="{{ asset('img/currencies/bp.svg') }}" class="curr-icon"></p>
							</div>
						</div>
						<div class="curr-stat">
							<div class="inside">
								<h5>Total Gain <br>(past month)</h5>
								<p>+{{ number_format($credit_transactions, 0, '.', ',') }} <img src="{{ asset('img/currencies/bp.svg') }}" class="curr-icon"></p>
							</div>
						</div>
						<div class="curr-stat">
							<div class="inside">
								<h5>Total Spending <br>(past month)</h5>
								<p>-{{ number_format($debit_transactions, 0, '.', ',') }} <img src="{{ asset('img/currencies/bp.svg') }}" class="curr-icon"></p>
							</div>
						</div>
						<div class="curr-recharge">
							<a href="#" class="bp" data-target="#dukung-ab-step1a" data-dismiss="modal" data-toggle="modal">
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
									@foreach ($transactions as $transaction)
										<tr>
											<td>{{ $transaction->desc }}</td>
											<td><span class="curr-bp">{{ ($transaction->type === 'CR' ? '+' : '-') . $transaction->value }}</span> <img src="{{ asset($transaction->items->logo) }}" class="curr-icon"></td>
											<td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y h:i A') }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
                </div>


            </div>
            
        </div>
    </div>
</div>

<div id="dukung-ab-step1a" class="modal metro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h3 class="colored">Quick Convert LP</h3>
            <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
            <div class="modal-body posrel">
                <div class="message">
                    <p>Current LP : {{ number_format($total_lp, 0, '.', ',') }}</p>
					
					<div class="chc">
                        Nominal convert:
                        <br>
						<input type="number" id="nominal-convert" step="9"> BP
						<span id="nominal-dukungan-error" style="display:none; color: red"><br>nominal harus kelipatan 9</span>
                    </div>
                </div>
            </div>
            <div class="nwcls">
                <a href="#" data-dismiss="modal">Batal</a>
                <a href="#" class="ctagp" id="btn-confirm-convert">Confirm</a>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
	.mobile--profile-bp .area-info--box .curr-icon {
		margin-right: 8px;
	}
	.mobile--profile-bp .curr-recharge a {
		line-height: 60px;
	}
	.mobile--profile-table {
		width: 100%;
	}
	.mobile--profile-table thead th {
		background: rgba(0,0,0,0.4);
	}
	.mobile--profile-table th, 
	.mobile--profile-table td {
		padding: 10px 25px;
	}
	.mobile--profile-table tbody tr:nth-child(even) {
		background: rgba(0,0,0,0.2);
	}
	.mobile--profile-table-time {
		font-style: italic;
	    opacity: 0.5;
	}
</style>

<div class="mobile--profile-bp">
    
    @include('includes.profile-mobile-head')

    <div class="mobile--profile--area-selector">
        <i data-feather="more-vertical" class="icon"></i>Transaksi BP
    </div>
    
    <div class="area-info">
        <div class="area-info--box">
            <div class="info-header">Current balance</div>
            <span><img src="{{ asset('img/currencies/bp.svg') }}" class="curr-icon">{{ number_format(Auth::user()->total_bp, 0, '.', ',') }}</span>
        </div>
        <div class="area-info--box">
            <div class="info-header">Total gain (past month)</div>
            <span><img src="{{ asset('img/currencies/bp.svg') }}" class="curr-icon">+{{ number_format($credit_transactions, 0, '.', ',') }}</span>
        </div>
        <div class="area-info--box">
            <div class="info-header">Total spending (past month)</div>
            <span><img src="{{ asset('img/currencies/bp.svg') }}" class="curr-icon">-{{ number_format($debit_transactions, 0, '.', ',') }}</span>
        </div>
        <div class="curr-recharge">
        	<a href="#" class="bp" data-target="#dukung-ab-step1a" data-dismiss="modal" data-toggle="modal">
        		Convert
        	</a>
        </div>
        <table class="mobile--profile-table">
        	<thead>
        		<tr>
        			<th>Item</th>
        			<th class="text-right">Amount</th>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach ($transactions as $transaction)
					<tr>
						<td>
							<span class="mobile--profile-table-time">{{ \Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y h:i A') }}</span>
							<br>
							{{ $transaction->desc }}
						</td>
						<td class="text-right"><span class="curr-lp">{{ ($transaction->type === 'CR' ? '+' : '-') . $transaction->value }}</span> <img src="{{ asset($transaction->items->logo) }}" class="curr-icon"></td>
					</tr>
				@endforeach
        	</tbody>
        </table>
    </div>
</div>

<div id="dukung-ab-step1b" class="modal metro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<h3 class="colored">Error</h3>
			<i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
			<div class="modal-body posrel">
				<div class="message">
					<p>Loyalty Points Tidak Cukup</p>
					<p>
						Saat ini kamu memiliki 
						{{ number_format($total_lp, 0, '.', ',') }} <img src="{{ asset('img/currencies/lp.svg') }}" class="mdl-curr"> 
						dan 
						{{ number_format($total_bp, 0, '.', ',') }} <img src="{{ asset('img/currencies/bp.svg') }}" class="mdl-curr">
					</p>
					<p>Loyalty points akan kamu tukarkan memerlukan <span id="lp-needs-a"></span> <img src="{{ asset('img/currencies/lp.svg') }}" class="mdl-curr"></p>

					<div class="clearfix mt-5"></div>
				</div>
			</div>
			<div class="nwcls">
				<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#dukung-ab-step1">Sebelumnya</a>
				<a href="{{ url('purchase/detail?name=lp') }}" class="ctagp">Recharge LP</a>
			</div>
        </div>
    </div>
</div>

<style type="text/css">
	body.bg1 {
		background-image: url("{{ asset('img/f1a.jpg') }}");
		background-size: cover;
		background-position: center;
		background-attachment: fixed;
	}
	.root {
		padding-top: 100px;
		padding-bottom: 100px;
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
	.curr-bp {
		color: #d26a8c;
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
		width: 100%;
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
<style type="text/css">
	@media (max-width: 992px) {
	    .root.profile-bp {
	        display: none;
	    }
	    .mobile--profile-bp {
	        display: block;
	    }
	}
</style>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        
        mobileProfileSubmenu();

    });
</script>
<script>
	$(document).ready(function() {
		$('#nominal-convert').on('keyup', function(event) {
			event.preventDefault();

			var value = $('#nominal-convert').val();
			if(value % 9 !== 0) {
                $('#nominal-dukungan-error').show();
			} else {
				$('#nominal-dukungan-error').hide();
			}
		})
		$('#btn-confirm-convert').on('click', function(event) {
			event.preventDefault();
			
			var value = $('#nominal-convert').val();
			if(value % 9 !== 0) {
                $('#nominal-dukungan-error').show();
                return false;
			}
			
			var currentLP = "{{ $total_lp }}";

			$('#spinner').modal('show');

	        setTimeout(function(){

				if(parseInt(value) > parseInt(currentLP)) {
	        		$('#spinner').modal('hide');
					$('#lp-needs-a').text(convertToRupiah(value-currentLP))
					$('#dukung-ab-step1b').modal('show');
				} else {
					var urlString = ("{{ url('purchase?name=bp&nominal=') }}" + parseInt(value)).replace(/&amp;/g, '&');
	            	location.href = urlString
				}


	        }, 300);

			
		})
	});
</script>
@endsection