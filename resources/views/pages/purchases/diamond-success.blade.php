@extends('layouts.mana-ui')

@section('page_title', "Diamond success")
@section('body_class', 'mana-ui error404 no-menu')


@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content" class="force-height">

	<!-- page header -->
	<div id="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11 col-md-8 col-lg-6 text-center">
					<h1 class="rajdhani-bold">Pembelian Game Currency (Pending)</h1>
					<p class="o5">[Order ID: {{ $data_transaction->transaction_number }}]</p>
					<p>Terima kasih, pembelian game currency kamu sudah selesai.</p>

					<br><br>
					<div class="system-msg-content-additional">
						<div class="system-msg-content-additional-title">
							Rincian pembelian
						</div>
						<div class="system-msg-content-additional-message">
							<table class="system-msg-table">
								<tr>
									<td>Status pembelian</td>
									<td>Pembayaran diterima</td>
								</tr>
								<tr>
									<td>Waktu pembelian</td>
									<td>{{ \Carbon\Carbon::parse($data_transaction->created_at)->format('d F Y H:i') }} WIB</td>
								</tr>
								<tr>
									<td>Game</td>
									<td>{{ $game }}</td>
								</tr>
								<tr>
									<td>Username</td>
									<td>{{ $data_user }}</td>
								</tr>
								<tr>
									<td>Phone number</td>
									<td>+62 {{ $data_transaction->users ? $data_transaction->users->phone : $data_transaction->phone }}</td>
								</tr>
								<tr>
									<td>Item yang dibeli</td>
									<td>
                                        <span class="money money-14 right money-inline white-09">
                                            {!! $product_name !!}
                                        </span>
                                    </td>
								</tr>
								<tr>
									<td>Dibayar dengan</td>
									<td>
                                        <span class="money money-14 right money-inline white-09">
                                            {{ $data_transaction->payment_type === 'LP' ? 'Loyalty Points' : 'Rupiah' }}
                                        </span>
                                    </td>
								</tr>
								<tr>
									<td>Harga</td>
									@if($data_transaction->payment_type === 'LP')
									<td>
                                        <span class="money money-14 right money-inline white-09">
                                            {{ number_format($data_transaction->total_price, 0, '.', ',') }}
                                            <img src='{{ asset('img/currencies/lp.svg') }}'>
                                        </span>
									</td>
									@else
									<td>
                                        <span class="money money-14 right money-inline white-09">
                                            Rp {{ number_format($data_transaction->total_price, 0, '.', ',') }}
                                        </span>
                                    </td>
									@endif
								</tr>
							</table>
						</div>
						<div class="system-msg-content-additional-message">
							<p>Jangan lupa di screenshot ya!</p>
						</div>
					</div>

					<p><a href="{{ url('/') }}" class="o5">back to home</a></p>
				</div>
			</div> 
		</div>
	</div>

	
</section>

<section id="page-modals">
</section>


<style type="text/css">
	/*page specific*/
	
</style>
<style type="text/css">
	/*media*/
	
</style>

<style type="text/css">
    .desktop-system-mail .system-msg-no-mail {
        min-height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgb(0 0 0 / 20%);
    }
    .system-mail-color-1 {
        color: #FFEB3B;
        font-weight: 800;
    }
    .system-mail-table-rincian th,
    .system-mail-table-rincian td {
        padding: 10px 15px;
    }
    .system-mail-table-rincian thead tr {
        background: rgb(0 0 0 / 30%);
    }
    .system-mail-table-rincian tbody tr:nth-child(odd) {
        background: rgb(0 0 0 / 20%);
    }
    .system-mail-table-rincian tbody tr:nth-child(even) {
        background: rgb(0 0 0 / 10%);
    }
    .system-mail-table-rincian tr.result {
        border-top: 1px solid rgb(255 255 255 / 40%);
    }
    .system-msg-table {
        margin: auto;
    }

    .system-msg-table td {
        text-align: left;
        padding: 10px 15px;
    }
    .system-msg-table tr:nth-child(odd) {
        background: rgb(0 0 0 / 20%);
    }
    .system-msg-table tr:nth-child(even) {
        background: rgb(0 0 0 / 10%);
    }
    .system-msg-item--convert-to {
        flex: 0 0 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .system-msg-item--convert-to .icon {
        height: 50px;
        width: 50px;
        opacity: 0.3;
    }
    .system-mail-item-group {
        display: flex;
        flex-wrap: wrap;
    }
    .system-msg-item-box {
        background: rgb(0 0 0 / 40%);
        border: 2px solid rgb(255 255 255 / 20%);
        border-radius: 10px;
        flex: 0 0 60px;
        height: 60px;
        padding: 10px;
        position: relative;
        margin: 5px;
    }
    .system-msg-item-box span {
        position: absolute;
        right: 6px;
        bottom: 2px;
        font-weight: 800;
        font-style: italic;
    }
    .desktop-system-mail .system-msg-content-title {
        font-size: 20px;
        font-weight: 800px;
    }
    .system-msg-content-additional-title {
        font-size: 20px;
    }
    .desktop-system-mail .system-msg-content-message {
        margin-top: 20px;
    }
    .system-msg-content-additional-message {
        margin-top: 20px;
    }
    .system-msg-item {
        padding: 20px 0;
        background: rgb(0 0 0 / 40%);
        border-bottom: 1px solid rgb(255 255 255 / 20%);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .desktop-system-mail .system-msg-item.no-mail {
        padding: 80px 15px;
    }
    .mb-system-mail .system-msg-item.no-mail {
        padding: 80px 15px;
        border-bottom: 0px;
    }
    .system-msg-item.opened {
        background: rgb(0 0 0 / 20%);
    }
    .system-msg-item:hover {
        background: rgb(0 0 0 / 30%);
    }
    .system-msg-item.active {
        background: rgb(233 30 99);
    }
    .system-msg-item .left {
        flex: 0 0 76px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .system-msg-item .left .icon {
        opacity: 0.5;
    }
    .system-msg-item .right {
        flex: 1;
        display: flex;
        flex-direction: column;
        text-align: left;
    }
    .system-mgs-preview-title {
        font-size: 14px;
        font-weight: 800;
    }
    .system-mgs-preview-date {
        opacity: 0.5;
    }
    .system-msg-wrapper {
        display: flex;
        line-height: initial;
    }
    .system-msg-list {
        flex: 0 0 300px;
        max-height: 700px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
    }
    /* width */
    .system-msg-list::-webkit-scrollbar {
      width: 10px;
    }
    /* Track */
    .system-msg-list::-webkit-scrollbar-track {
      background: rgb(0 0 0 / 20%);
    }
    /* Handle */
    .system-msg-list::-webkit-scrollbar-thumb {
      background: rgb(0 0 0 / 40%);
    }
    /* Handle on hover */
    .system-msg-list::-webkit-scrollbar-thumb:hover {
      background: rgb(0 0 0 / 40%);
    }
    .system-msg-content {
        flex: 1;
        background: rgb(0 0 0 / 20%);
        flex-direction: column;
        padding-top: 20px;
        padding-bottom: 40px;
    }
    .system-msg-content.active {
        display: block;
    }
    .desktop-system-mail .system-msg-content-head {
        padding: 25px;
        min-height: 150px;
        border-bottom: 1px solid rgb(255 255 255 / 10%);
    }
    .mb-system-mail .system-msg-content-head {
        border-bottom: 1px solid rgb(255 255 255 / 10%);
    }
    .desktop-system-mail .system-msg-content-additional {
        padding: 25px;
        padding-bottom: 75px;
        min-height: 150px;
    }
    .mb-system-mail .system-msg-content-additional {
        padding: 15px;
        padding-bottom: 75px;
    }
    .mb-system-mail-page-title {
        font-family:'Rajdhani-Bold';
        font-size: 20px;
        text-transform: uppercase;
        padding: 10px 15px;
        background: rgb(0 0 0 / 60%);
        margin: 0;
    }
    .mb-mail-controls-back {
        padding: 15px;
        background: rgb(0 0 0 / 20%);
        position: relative;
    }
    .mb-mail-controls-back span {
        position: absolute;
        right: 15px;
        opacity: 0.5;
    }
    .mb-system-mail-back {
        height: 14px;
        width: 14px;
        opacity: 0.5;
        position: relative;
        top: -2px;
        margin-right: 5px;
    }
    .mb-mail-content {
        background: rgb(0 0 0 / 20%);
    }
    .mb-mail-content-additional {
        border-top: 1px solid rgb(255 255 255 / 20%);
    }
</style>
@endsection

@section('js')
<script>
	$(document).ready(function() {
		
		// page specific scripts
		// register button
		$('body').on('click', '.registration-submit-btn', function(e) {
			e.preventDefault();

			var target = $('.registration-submit-btn');

			// show spinner
			$(this).addClass('loading');
		});

	})
</script>
@endsection