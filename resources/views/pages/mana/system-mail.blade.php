@extends('layouts.mana-ui')

@section('page_title', "TimKamu - Tempat nongkrongnya anak e-sports")
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
					<h1 class="rajdhani-bold">System Mail</h1>
				</div>
			</div> 
		</div>
	</div>

	<!-- pagination head -->
	<div id="pagination-head">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="section-title position-relative">
						<h4 class="font-size-16 mb-20">Page 1 of 15</h4>
						<div href="#" class="o5 section-title-meta-link font-size-14">
							<a href="#">Previous</a>
							&nbsp;&nbsp;-&nbsp;&nbsp;
							<a href="#">Next</a>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>

	<!-- event index filters -->
	<div class="system-mail-wrapper">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="mailer-container d-flex">

						<div class="system-mail-no-mail bd20 bg25510 d-flex align-items-center justify-content-center mb-20">
							Belum ada system mail
						</div>
						
						<div class="mailer-item" data-toggle="modal" data-target="#mail-referral-code-redeemed-by-someone">
							<div class="mailer-item-head">
								Kode referral digunakan
							</div>
							<div class="mailer-item-meta">
								27 September 2020
							</div>
						</div>
						
						<div class="mailer-item" data-toggle="modal" data-target="#mail-referral-code-redeemed">
							<div class="mailer-item-head">
								Hadiah kode referral
							</div>
							<div class="mailer-item-meta">
								27 September 2020
							</div>
						</div>
						
						<div class="mailer-item" data-toggle="modal" data-target="#mail-content-quest-completed">
							<div class="mailer-item-head">
								Quest selesai
							</div>
							<div class="mailer-item-meta">
								27 September 2020
							</div>
						</div>
						
						<div class="mailer-item" data-toggle="modal" data-target="#mail-content-topup">
							<div class="mailer-item-head">
								Pembelian Game Currency (Success)
							</div>
							<div class="mailer-item-meta">
								27 September 2020
							</div>
						</div>
						
						<div class="mailer-item" data-toggle="modal" data-target="#mail-content-topup">
							<div class="mailer-item-head">
								Pembelian Game Currency (Pending)
							</div>
							<div class="mailer-item-meta">
								27 September 2020
							</div>
						</div>
						
						<div class="mailer-item" data-toggle="modal" data-target="#mail-content-hasil-games">
							<div class="mailer-item-head">
								Hasil Games Event
							</div>
							<div class="mailer-item-meta">
								25 September 2020
							</div>
						</div>
						
						<div class="mailer-item" data-toggle="modal" data-target="#mail-content-lptobp">
							<div class="mailer-item-head">
								Konversi LP ke BP (900)
							</div>
							<div class="mailer-item-meta">
								25 September 2020
							</div>
						</div>
						
						<div class="mailer-item" data-toggle="modal" data-target="#mail-content-beli-lp">
							<div class="mailer-item-head">
								Pembelian LP (149)
							</div>
							<div class="mailer-item-meta">
								22 September 2020
							</div>
						</div>

					</div>

				</div>
			</div> 
		</div>
	</div>

</section>

<section id="page-modals">
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="mail-content-topup">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<p class="o3 mb-30"><i data-feather="clock" class="mail-time-icon"></i>27 September 2020 19.45</p>
					<h3 class="rajdhani-bold font-size-32">Pembelian Game Currency (Success)</h3>
					<p class="o3">[Order ID: 20092544500043]</p>
					<p>Terima kasih atas pembelian game currency di Timkamu. Pesanan kamu sedang diproses.</p>
					<table class="rincian-table">
						<tr>
							<td class="o5">Status pembelian</td>
							<td>Pembayaran diterima</td>
						</tr>
						<tr>
							<td class="o5">Waktu pembelian</td>
							<td>25 September 2020 15:46 390407</td>
						</tr>
						<tr>
							<td class="o5">Game</td>
							<td>Mobile Legends: Bang Bang</td>
						</tr>
						<tr>
							<td class="o5">Username</td>
							<td>152039336 (2239)</td>
						</tr>
						<tr>
							<td class="o5">Phone number</td>
							<td>+62 81378009222</td>
						</tr>
						<tr>
							<td class="o5">Item yang dibeli</td>
							<td><span class="money money-14 right">2,349<img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span></td>
						</tr>
						<tr>
							<td class="o5">Dibayar dengan</td>
							<td><span class="money money-14 right">Rupiah</span></td>
						</tr>
						<tr>
							<td class="o5">Harga</td>
							<td><span class="money money-14 right">Rp 1,700,000</span></td>
						</tr>
					</table>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal" data-toggle="modal" data-target="#mail-content-rincian-topup-rincian">Rincian Pembelian</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="mail-content-rincian-topup-rincian">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<table class="rincian-table">
						<tr>
							<td class="o5">Status pembelian</td>
							<td>Pembayaran diterima</td>
						</tr>
						<tr>
							<td class="o5">Waktu pembelian</td>
							<td>25 September 2020 15:46 390407</td>
						</tr>
						<tr>
							<td class="o5">Game</td>
							<td>Mobile Legends: Bang Bang</td>
						</tr>
						<tr>
							<td class="o5">Username</td>
							<td>152039336 (2239)</td>
						</tr>
						<tr>
							<td class="o5">Phone number</td>
							<td>+62 81378009222</td>
						</tr>
						<tr>
							<td class="o5">Item yang dibeli</td>
							<td><span class="money money-14 right">2,349<img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span></td>
						</tr>
						<tr>
							<td class="o5">Dibayar dengan</td>
							<td><span class="money money-14 right">Rupiah</span></td>
						</tr>
						<tr>
							<td class="o5">Harga</td>
							<td><span class="money money-14 right">Rp 1,700,000</span></td>
						</tr>
					</table>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="mail-content-hasil-games">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<p class="o3 mb-30"><i data-feather="clock" class="mail-time-icon"></i>27 September 2020 19.45</p>
					<h3 class="rajdhani-bold font-size-32">Hasil Games Event</h3>
					<p class="o3">[Order ID: 20092544500043]</p>
					<p>Terima kasih atas dukungan yang kamu sudah berikan untuk event ONIC VS AE 19 September 2020 18:30 WIB.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal" data-toggle="modal" data-target="#mail-content-hasil-games-rincian">Rincian Pembelian</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="mail-content-hasil-games-rincian">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<p>mail-content-hasil-games-rincian Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="mail-content-beli-lp">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<p class="o3 mb-30"><i data-feather="clock" class="mail-time-icon"></i>27 September 2020 19.45</p>
					<h3 class="rajdhani-bold font-size-32">Pembelian LP (149)</h3>
					<p class="o3">[Order ID: 20092544500043]</p>
					<p>Terima kasih atas pemebelian <span class="money money-14 right money-inline">149<img src="{{ asset('img/currencies/lp.svg') }}"></span> dari Timkamu.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="mail-content-lptobp">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<p class="o3 mb-30"><i data-feather="clock" class="mail-time-icon"></i>27 September 2020 19.45</p>
					<h3 class="rajdhani-bold font-size-32">Konversi LP ke BP (900)</h3>
					<p class="o3">[Order ID: 20092544500043]</p>
					<p>Konversi Loyalty Points ke Battle Points kamu berhasil dilakukan dengan nilai tukar <span class="money money-14 right money-inline">900<img src="{{ asset('img/currencies/lp.svg') }}"></span> ditukar dengan <span class="money money-14 right money-inline">900<img src="{{ asset('img/currencies/bp.svg') }}"></span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="mail-content-quest-completed">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<p class="o3 mb-30"><i data-feather="clock" class="mail-time-icon"></i>27 September 2020 19.45</p>
					<h3 class="rajdhani-bold font-size-32 mb-20">Quest Selesai</h3>
					<p class="grey-10">Selamat, kamu telah menyelesaikan quest <span class="white-10">"Verifikasi email"</span> dengan hadiah <span class="money money-14 right money-inline white-10">50<img src="{{ asset('img/currencies/coin.svg') }}"></span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="mail-referral-code-redeemed">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<p class="o3 mb-30"><i data-feather="clock" class="mail-time-icon"></i>27 September 2020 19.45</p>
					<h3 class="rajdhani-bold font-size-32 mb-20">Hadiah kode referral</h3>
					<p class="grey-10">Selamat, input kode referral berhasil dan kamu mendapat <span class="money money-14 right money-inline white-10">8<img src="{{ asset('img/currencies/bp.svg') }}"></span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="mail-referral-code-redeemed-by-someone">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<p class="o3 mb-30"><i data-feather="clock" class="mail-time-icon"></i>27 September 2020 19.45</p>
					<h3 class="rajdhani-bold font-size-32 mb-20">Kode referral digunakan</h3>
					<p class="grey-10">Kode referral kamu digunakan dan kamu mendapat <span class="money money-14 right money-inline white-10">9<img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
</section>

@include('includes.mana-ui.footer')
@include('includes.mana-ui.modals')


<style type="text/css">
	/*page specific*/
	.system-mail-no-mail {
		padding: 50px 70px;
	}
	.rincian-table td {
		padding: 10px 15px;
	}
	.rincian-table tr:nth-child(even) {
	    background: rgb(0 0 0 / 10%);
	}
	.rincian-table tr:nth-child(odd) {
	    background: rgb(0 0 0 / 20%);
	}
	.rincian-table tr:first-child td:first-child {border-top-left-radius: 10px;}
	.rincian-table tr:first-child td:last-child {border-top-right-radius: 10px;}
	.rincian-table tr:last-child td:first-child {border-bottom-left-radius: 10px;}
	.rincian-table tr:last-child td:last-child {border-bottom-right-radius: 10px;}
	.mail-time-icon {
		width: 16px;
		position: relative;
		top: -2px;
		margin-right: 10px;
	}
	.mailer-container {
		flex-direction: column;
	}
	.mailer-item {
		background: rgb(255 255 255 / 0.1);
	    border-radius: 20px;
	    height: 80px;
	    flex: 1;
	    display: flex;
	    align-items: flex-start;
	    flex-direction: column;
	    justify-content: center;
	    padding: 20px;
	    cursor: pointer;
	    margin-bottom: 20px;
	    transition: all 0.1s ease-in-out;
	}
	.mailer-item:hover {
		background: rgb(255 255 255 / 0.2);
	}
	.mailer-item.opened {
		background: rgb(0 0 0 / 0.2);
	}
	.mailer-item.opened:hover {
		background: rgb(0 0 0 / 0.4);
	}
	.mailer-item:active {transform: scale(1.05) !important;}
	.mailer-item-head {
		font-weight: 600;
	}
	.mailer-item-meta {
		opacity: 0.3;
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

		// open mail btn
		$('body').on('click', '.mailer-item', function(e) {
			e.preventDefault();

			target = $(this);

			// show spinner
			target.addClass('opened');
		});

	})
</script>
@endsection