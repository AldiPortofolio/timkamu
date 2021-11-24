{{-- <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="diamond-shop-page-blank-userinfo">
	<div class="modal-dialog modal-dialog-centered" role="document">
		
		<div class="modal-content">
			@include('includes.mana-ui.modal-top')
			<div class="modal-about rajdhani-bold font-size-32">
				Error pembelian
			</div>
			<div class="modal-mid font-size-16 o5">
				Kamu belum mengisi user-id.
			</div>
			<div class="modal-actions d-flex flex-column">
				<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
			</div>
		</div>
	</div>
</div> --}}
<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="mlbb-userid-help">
	<div class="modal-dialog modal-dialog-centered" role="document">
		
		<div class="modal-content">
			@include('includes.mana-ui.modal-top')
			<div class="modal-mid">
				<img src="{{ asset('img/mlbb-user-id.png') }}" class="w-100 mb-20 mlbb-user-guide-png">
				<p class="o5 font-size-16">Untuk mengetahui User ID Anda, Silakan Klik menu profile dibagian kiri atas pada menu utama game.</p>
				<p class="o5 font-size-16">User ID akan terlihat dibagian bawah Nama Karakter Game Anda. Silakan masukkan User ID Anda untuk menyelesaikan transaksi. Contoh : 12345678(1234).</p>
			</div>
			<div class="modal-actions d-flex flex-column">
				<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
			</div>
		</div>
	</div>
</div>
<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="pubgm-userid-help">
	<div class="modal-dialog modal-dialog-centered" role="document">
		
		<div class="modal-content">
			@include('includes.mana-ui.modal-top')
			<div class="modal-about rajdhani-bold font-size-32">
				Tidak bisa menemukan ID Player kamu?
			</div>
			<div class="modal-mid grey-10">
				<p class="font-size-16">
					1. Masuk ke game <br>
					2. Temukan ID pemain Anda
				</p>
				<img src="{{ asset('img/pubgm-01.jpg') }}" class="w-100 mb-20">
				<img src="{{ asset('img/pubgm-02.jpg') }}" class="w-100">
			</div>
			<div class="modal-actions d-flex flex-column">
				<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
			</div>
		</div>
	</div>
</div>
<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="freefire-userid-help">
	<div class="modal-dialog modal-dialog-centered" role="document">
		
		<div class="modal-content">
			@include('includes.mana-ui.modal-top')
			<div class="modal-mid grey-10">
				<img src="{{ asset('img/33.png') }}" class="w-100">
			</div>
			<div class="modal-actions d-flex flex-column">
				<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
			</div>
		</div>
	</div>
</div>
<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="shop-item-unavailable">
	<div class="modal-dialog modal-dialog-centered" role="document">
		
		<div class="modal-content">
			@include('includes.mana-ui.modal-top')
			<div class="modal-about rajdhani-bold font-size-32">
				Shop item unavailable
			</div>
			<div class="modal-mid grey-10">
				<p>Item ini untuk sementara tidak tersedia.</p>
			</div>
			<div class="modal-actions d-flex flex-column">
				<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
			</div>
		</div>
	</div>
</div>

<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="valorant-userid-help">
	<div class="modal-dialog modal-dialog-centered" role="document">
		
		<div class="modal-content">
			@include('includes.mana-ui.modal-top')
			<div class="modal-mid grey-10">
				<p>Masukkan Username Riot Games sesuai dengan yang terdaftar di game. Masukkan sesuai huruf besar dan kecilnya atau kamu memasukkan lebih dari 400 karakter. Jangan memberikan password akun Riot Games kamu pada penjual</p>
			</div>
			<div class="modal-actions d-flex flex-column">
				<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
			</div>
		</div>
	</div>
</div>

<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="ret-userid-help">
	<div class="modal-dialog modal-dialog-centered" role="document">
		
		<div class="modal-content">
			@include('includes.mana-ui.modal-top')
			<div class="modal-mid grey-10">
				<p>Masukkan Nama Karakter sesuai huruf besar dan kecilnya dan ID Karakter dengan benar. Jangan memberikan ID & Password akun kamu. atau kamu memasukkan lebih dari 400 karakter</p>
			</div>
			<div class="modal-actions d-flex flex-column">
				<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
			</div>
		</div>
	</div>
</div>