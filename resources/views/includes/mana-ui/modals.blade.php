<section id="app-modals">

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="lp-exchange-rate">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Harga LP
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<span class="money money-14 money-inline white-09">Rp 1,000</span> = <span class="money money-14 right money-inline white-09">1<img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	@auth
	<div class="modal mana-ui slim-card profile-snap-modal" tabindex="-1" role="dialog" id="my-profile">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid mb-0">

					<div class="profile-snap-head position-relative mb-50">
						<div class="snap-username">
							<h1 class="rajdhani-bold mb-0">{{ $user->username }}</h1>
						</div>
						<div class="snap-moneys">
							<span class="money money-14 right mr-3"><span class="o5 amt-lp">{{ number_format($total_lp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/lp.svg') }}" class="top-m1"></span>
							<span class="money money-14 right"><span class="o5 amt-bp">{{ number_format($total_bp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/bp.svg') }}" class="top-m1"></span>
						</div>
						<div class="snap-rank">
							@if($current_rank->logo)<img src="{{ asset($current_rank->logo) }}" class="w-100">@endif
						</div>
					</div>

					<div class="profile-snap-stats d-flex mb-20">
						<div class="snap-stat-item">
							<h4 class="mb-0 font-size-24"><span class="amt-p">{{ number_format($prediction, 0, '.', ',') }}</span></h4>
							<p class="mt-0 o5">Prediksi</p>
						</div>
						<div class="snap-stat-item">
							<h4 class="mb-0 font-size-24"><span class="amt-cp">{{ number_format($correct_prediction, 0, '.', ',') }}</span></h4>
							<p class="mt-0 o5">Prediksi Benar</p>
						</div>
					</div>

					<div class="profile-snap-buttons">
						<a href="{{ url('profile') }}" class="mana-btn-54 mana-btn-opaque scale-onclick mb-20">My Dashboard</a>
					</div>

				</div>
			</div>
		</div>
	</div>
	@endauth

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="prediction-results-available">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Hasil prediksi tersedia
				</div>
				<div class="modal-mid grey-10">
					<p>Hasil prediksi kamu untuk event <span class="white-09">ONIC vs EVOS 20 Sept 2020 16.30</span> sudah tersedia dan dapat dilihat di system mail.</p>
					<p>Terimakasih sudah berpartisipasi. Silahkan cek System Mail untuk rincian hasil.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick btn-goto-system-mail">Cek Sekarang</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="prediction-results-avail">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Hasil prediksi tersedia
				</div>
				<div class="modal-mid grey-10">
					<p class="message">
						<span></span>
					</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick btn-goto-system-mail">Cek Sekarang</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	@if(session('success-verify'))
	<div class="modal mana-ui slim-card splash" tabindex="-1" role="dialog" id="verify-success">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					@if(strpos(session('success-verify'), 'email') > -1 && strpos(session('success-verify'), 'phone') < 0) Email Verified @else Welcome @endif
				</div>
				<div class="modal-mid grey-10">
					<p>{{ (strpos(session('success-verify'), 'email') > -1 && strpos(session('success-verify'), 'phone') < 0) ? 'Terima kasih, email kamu telah berhasil terverifikasi.' : 'Nomor handphone kamu berhasil terverifikasi. Selamat bergabung dengan Timkamu!' }}</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal" @if(strpos(session('success-verify'), 'phone-54') > -1) data-toggle="modal" data-target="#modal-regist-bonus" @elseif(strpos(session('success-verify'), 'phonequest') > -1) data-toggle="modal" data-target="#quest-completed-modal-phone" @elseif(strpos(session('success-verify'), 'emailquest') > -1) data-toggle="modal" data-target="#quest-completed-modal-email" @endif>Okay</a>
				</div>
			</div>
		</div>
	</div>
	@endif

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-regist-bonus">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					New registration bonus
				</div>
				<div class="modal-mid grey-10">
					<p>Berikut <span class='money money-14 right money-inline white-10'>26<img src='{{ asset('img/currencies/bp.svg') }}'></span> yang dapat kamu gunakan untuk memberikan prediksi di event pertandingan.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal" @if(strpos(session('success-verify'), 'quest') > -1) data-toggle="modal" data-target="#quest-completed-modal-phone" @endif>Okay</a>
				</div>
			</div>
		</div>
	</div>

	@if(session('failed-verify'))
	<div class="modal mana-ui slim-card splash" tabindex="-1" role="dialog" id="verify-success">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Verification failed
				</div>
				<div class="modal-mid grey-10">
					<p>{{ (session('failed-verify')) }}</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	@endif

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="game-unavailable">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Top-Up Unavailable
				</div>
				<div class="modal-mid grey-10">
					<p>Top-up untuk game ini sementara belum tersedia.</p>
					<p>Alasan tutup: <span class="white-09 reason"></span>.</p>
					<p>Waktu buka kembali: <span class="white-09 open-date"></span>.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="game-comingsoon">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Top-Up Unavailable
				</div>
				<div class="modal-mid grey-10">
					Top-up untuk game ini sementara belum tersedia.
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="lp-help">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Mengenai LP
				</div>
				<div class="modal-mid font-size-16 grey-10">

					<p>Nilai <span class="money money-14 right money-inline white-09">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span> saat ini adalah <span class="money money-14 right money-inline white-09">Rp 1,000</span> untuk setiap <span class="money money-14 right money-inline white-09">1<img src="{{ asset('img/currencies/lp.svg') }}"></span>.</p>

					<p>Loyalty Points <span class="money money-14 right money-inline white-09">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span> hanya dapat dibeli di website Timkamu.com.</p>

					<p>Setiap <span class="money money-14 right money-inline white-09">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span> yang dibeli akan memberikan member EXP.</p>

					<p>EXP diperlukan untuk meningkatkan <a href="#">level member</a>.</p>

					<p class="white-10 mt-30">Cara mendapatkan Loyalty Points:</p>
					<p>Recharge di TimKamu.com</p>
					<p>Dengan menukar Battle Points <span class="money money-14 right money-inline white-09">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span>. Nilai tukar <span class="money money-14 right money-inline white-09">1<img src="{{ asset('img/currencies/bp.svg') }}"></span> sama dengan <span class="money money-14 right money-inline white-09">1<img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
					<p>Dengan menukar Coins <span class="money money-14 right money-inline white-09">Coin<img src="{{ asset('img/currencies/coin.svg') }}"></span>. Nilai tukar <span class="money money-14 right money-inline white-09">10<img src="{{ asset('img/currencies/coin.svg') }}"></span> sama dengan <span class="money money-14 right money-inline white-09">1<img src="{{ asset('img/currencies/lp.svg') }}"></span></p>

					<p class="white-10 mt-30">Loyalty Points dapat digunakan untuk:</p>
					<p>Memberikan item dukungan untuk tim favorit kamu.</p>
					<p>Ditukar dengan Battle Points <span class="money money-14 right money-inline white-09">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> untuk dapat berpartisipasi memberikan prediksi di <a href="#">Games Event</a>.</p>
					<p>Top-up game diamonds dan currency lain nya.</p>
					<p><a href="#">Isi pulsa</a> dan <a href="#">token listrik PLN</a>.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="bp-help">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Mengenai BP
				</div>
				<div class="modal-mid font-size-16 grey-10">

					<p>Battle Points <span class="money money-14 right money-inline white-09">BP<img src="{{ asset('img/currencies/lp.svg') }}"></span> adalah sebuah mata uang yang dapat diperoleh hanya di TimKamu.com</p>

					<p class="white-10 mt-30">Cara mendapatkan Battle Points:</p>
					<p>Penukaran (convert) dari Loyalty Points <span class="money money-14 right money-inline white-09">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
					<p>Hadiah dari prediksi-prediksi kamu yang benar.</p>

					<p class="white-10 mt-30">Battle Points dapat digunakan untuk:</p>
					<p>Berpartisipasi memberikan prediksi di <a href="#">Games Event</a>.</p>
					<p>Ditukar dengan Loyalty Points <span class="money money-14 right money-inline white-09">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span> untuk dapat <a href="#">isi pulsa</a> dan <a href="#">token listrik PLN</a>.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="about-timkamu">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Mengenai TimKamu
				</div>
				<div class="modal-mid font-size-16 grey-10">

					<p><a href="#">TIMKAMU.com</a> adalah tempat nongkrongnya para penikmat esports. <a href="#">TIMKAMU.com</a> bertujuan untuk menghubungkan tim - tim profesional dengan fansnya dalam banyak kegiatan event maupun live games. Kunjungi <a href="#">TIMKAMU.com</a> dan menangi berbagai banyak hadiah!</p>
					<p>Di <a href="#">TIMKAMU.com</a> terdapat banyak kegiatan gaming maupun esports yang dapat dinikmati oleh gamers-gamers maupun pecinta esports.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="cs-help">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Customer Service Timkamu
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Alamat email support & CS: <a href="#">support[@]timkamu.com</a>.</p>
					<p>Instagram <a href="https://www.instagram.com/timkamu" target="_blank">@timkamu</a>.</p>
					<p>Facebook <a href="https://www.facebook.com/timkamuofficial/" target="_blank">TimKamu Official Page</a>.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="toko-tutup-notice">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Top-Up Unavailable
				</div>
				<div class="modal-mid grey-10">
					<p>Top-up untuk game ini sementara belum tersedia.</p>
					<p>Alasan tutup: <span class="white-09">System maintenance</span>.</p>
					<p>Waktu buka kembali: <span class="white-09">Sabtu 22 Oct 2020 19.30</span>.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="coin-help">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Mengenai Coins
				</div>
				<div class="modal-mid font-size-16 grey-10">

					<p>Timkamu <span class="money money-14 right money-inline white-09">Coin<img src="{{ asset('img/currencies/coin.svg') }}"></span> hanya dapat diraih setelah member menyelesaikan misi (quest).</p>

					<p class="white-10 mt-30">Cara mendapatkan Coins:</p>
					<p>Menyelesaikan misi (quest) di TimKamu.com.</p>

					<p class="white-10 mt-30">Coins dapat digunakan untuk:</p>
					<p>Ditukar menjadi <span class="money money-14 right money-inline white-09">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span> untuk kemudian dapat membeli top up games dan isi pulsa/token PLN.</p>
					<p>Nilai tukar saat ini adalah <span class="money money-14 right money-inline white-09">10<img src="{{ asset('img/currencies/coin.svg') }}"></span> dapat ditukar menjadi <span class="money money-14 right money-inline white-09">1<img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="vip-help">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Mengenai Account VIP
				</div>
				<div class="modal-mid font-size-16 grey-10">

					<img src="{{ asset('img/ranks/vip1.png') }}" class="vip-thumb">
					<p>Untuk dapat menjadi member VIP 1, total pengisian ulang <span class="money money-14 right money-inline white-10">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span> kamu harus lebih dari Rp 500,000 ATAU 50 kali code referral nya berhasil digunakan (berhasil digunakan artinya pendaftar baru telah mengisi ulang minimal <span class="money money-14 right money-inline white-10">9<img src="{{ asset('img/currencies/lp.svg') }}"></span>).</p>

					<div class="mb-20"></div>

					<img src="{{ asset('img/ranks/vip2.png') }}" class="vip-thumb">
					<p>Untuk dapat menjadi member VIP 2, total pengisian ulang <span class="money money-14 right money-inline white-10">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span> kamu harus lebih dari Rp 1.000,000 ATAU 100 kali code referral nya berhasil digunakan (berhasil digunakan artinya pendaftar baru telah mengisi ulang minimal <span class="money money-14 right money-inline white-10">9<img src="{{ asset('img/currencies/lp.svg') }}"></span>).</p>

					<p class="white-10 mt-30">Keuntungan member VIP 1 & 2:</p>
					<p>
						VIP 1: Extra bonus 2% pada saat memberikan prediksi.
						<br>
						VIP 2: Extra bonus 5% pada saat memberikan prediksi.
					</p>

				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="conversion-modals">

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="convert-modal">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Currency Conversion
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick mb-15" data-dismiss="modal" data-toggle="modal" @if($bp_quest_done) data-target="#bp-lp-convert-modal" @else data-target="#locked-feature" @endif>Convert BP to LP</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick mb-15" data-dismiss="modal" data-toggle="modal" @if($coin_quest_done) data-target="#coins-lp-convert-modal" @else data-target="#locked-feature" @endif>Convert Coins to LP</a>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="bp-lp-convert-modal">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<div class="odds-nominal-enter mb-20">
						<label class="mana-control grey-10 mb-10">Jumlah <span class="money money-14 right white-09 money-inline white-10">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> yang dikonversi ke <span class="money money-14 right white-09 money-inline white-10">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span></label>
					    <input type="number" class="form-control mana-control nominal-convert" value="9">
					</div>
					<div class="odds-return-info position-relative bd50 bg040 mb-10">
						<div class="odds-return-info-left o5">Saldo LP</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 right white-09 top-01"><span class="amt-lp">{{ number_format($total_lp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/lp.svg') }}"></span>
						</div>
					</div>
					<div class="odds-return-info position-relative bd50 bg040">
						<div class="odds-return-info-left o5">Saldo BP</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 right white-09 top-01"><span class="amt-bp">{{ number_format($total_bp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/bp.svg') }}"></span>
						</div>
					</div>
				</div>

				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red convert-bp-lp-btn has-spinner">
						<span class="default-text">Convert</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="coins-lp-convert-modal">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					<div class="odds-nominal-enter mb-20">
						<label class="mana-control grey-10 mb-10">Jumlah <span class="money money-14 right white-09 money-inline white-10">Coins<img src="{{ asset('img/currencies/coin.svg') }}"></span> yang dikonversi ke <span class="money money-14 right white-09 money-inline white-10">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span></label>
					    <input type="number" class="form-control mana-control nominal-convert" value="9">
					</div>
					<div class="odds-return-info position-relative bd50 bg040 mb-10">
						<div class="odds-return-info-left o5">Saldo LP</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 right white-09 top-01"><span class="amt-lp">{{ number_format($total_lp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/lp.svg') }}"></span>
						</div>
					</div>
					<div class="odds-return-info position-relative bd50 bg040">
						<div class="odds-return-info-left o5">Saldo Coin</div>
						<div class="odds-return-info-right poetsenone-reg position-absolute top-translate-50">
							<span class="money money-14 right white-09 top-01"><span class="amt-coin">{{ number_format($total_coin, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/coin.svg') }}"></span>
						</div>
					</div>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red convert-coin-lp-btn has-spinner">
						<span class="default-text">Convert</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="bp-lp-convert-success">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Konversi berhasil
				</div>
				<div class="modal-mid grey-10">
					Konversi berhasil dengan nilai <span class="money money-14 right white-09 money-inline white-10"><span class="amt-convert"></span><img src="{{ asset('img/currencies/bp.svg') }}"></span> menjadi <span class="money money-14 right white-09 money-inline white-10"><span class="amt-convert"></span><img src="{{ asset('img/currencies/lp.svg') }}"></span>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="coins-lp-convert-success">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Konversi berhasil
				</div>
				<div class="modal-mid grey-10">
					Konversi berhasil dengan nilai <span class="money money-14 right white-09 money-inline white-10"><span class="amt-convert"></span><img src="{{ asset('img/currencies/coin.svg') }}"></span> menjadi <span class="money money-14 right white-09 money-inline white-10"><span class="amt-converted"></span><img src="{{ asset('img/currencies/lp.svg') }}"></span>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-convert-error">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p id="modal-convert-error-msg"></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal" data-toggle="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-need-login">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Kamu butuh login untuk melakukan itu.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="quest-modals">
	@auth
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="my-quests">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32 position-relative">
					My Quests
					<a href="#" class="modal-about-meta-link o5" data-toggle="modal" data-target="#coin-help" data-dismiss="modal">Mengenai Coins</a>
				</div>
				<div class="modal-mid" id="data-quests">
					@foreach ($quests as $item)
					<div class="quest-item">
						<div class="left @if($item->type === 'ONCE_PROGRESS') half @endif">{{ $item->title }}</div>
						@if($item->type === 'ONCE' && $item->status !== 'DONE')
						<div class="right"><span class="money money-14 right white-09 money-inline white-10">{{ $item->value }}<img src="{{ asset('img/currencies/'.$item->item.'.svg') }}"></span></div>
						@elseif($item->type === 'REPEATABLE')
						<div class="right"><span class="money money-14 right white-09 money-inline white-10">{{ $item->value }}<img src="{{ asset('img/currencies/'.$item->item.'.svg') }}"></span></div>
						<div class="lower">Sudah tercapai {{ $item->user_value }} kali</div>
						@elseif($item->type === 'REPEAT_PROGRESS')
						<div class="right"><span class="money money-14 right white-09 money-inline white-10">{{ $item->value }}<img src="{{ asset('img/currencies/'.$item->item.'.svg') }}"></span></div>
						<div class="quest-exp">
							<div class="quest-exp-bar">
							<div class="quest-exp-gained-bar" style="width:{{ (($item->user_progress % $item->progress)/$item->progress) * 100 }}%"></div>
								<div class="quest-exp-stats">{{ $item->user_progress % $item->progress }} / {{ $item->progress }}</div>
							</div>
						</div>
						<div class="lower">Sudah tercapai {{ $item->user_value }} kali</div>
						@elseif($item->type === 'ONCE_PROGRESS')
						<div class="right half poetsenone-reg text-right">
							{{ $item->value }}
						</div>
						<div class="quest-exp">
							<div class="quest-exp-bar">
								<div class="quest-exp-gained-bar" style="width:{{ (($item->user_progress % $item->progress)/$item->progress) * 100 }}%"></div>
								<div class="quest-exp-stats">{{ $item->user_progress % $item->progress }} / {{ $item->progress }}</div>
							</div>
						</div>
						@endif
					</div>
					@endforeach

					@foreach ($quest_done as $qdone)
						<div class="quest-item completed">
							<div class="left">{{ $qdone->title }}</div>
							<div class="right"><span class="poetsenone-reg font-size-12">completed</span></div>
						</div>
					@endforeach

				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	@else
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="my-quests">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32 position-relative">
					My Quests
					<a href="#" class="modal-about-meta-link o5" data-toggle="modal" data-target="#coin-help" data-dismiss="modal">Mengenai Coins</a>
				</div>
				<div class="modal-mid" id="data-quests">
					@foreach ($quests as $item)
					@php
						$questDetail = json_decode($item->value_detail);
						$item->value = $questDetail->value;
						$item->progress = $questDetail->progress ?? 0;
					@endphp
					<div class="quest-item">
						<div class="left @if($item->type === 'ONCE_PROGRESS') half @endif">{{ $item->title }}</div>
						@if($item->type === 'ONCE' && $item->status !== 'DONE')
						<div class="right"><span class="money money-14 right white-09 money-inline white-10">{{ $item->value }}<img src="{{ asset('img/currencies/coin.svg') }}"></span></div>
						@elseif($item->type === 'REPEATABLE')
						<div class="right"><span class="money money-14 right white-09 money-inline white-10">{{ $item->value }}<img src="{{ asset('img/currencies/coin.svg') }}"></span></div>
						<div class="lower">Sudah tercapai 0 kali</div>
						@elseif($item->type === 'REPEAT_PROGRESS')
						<div class="right"><span class="money money-14 right white-09 money-inline white-10">{{ $item->value }}<img src="{{ asset('img/currencies/coin.svg') }}"></span></div>
						<div class="quest-exp">
							<div class="quest-exp-bar">
							<div class="quest-exp-gained-bar"></div>
								<div class="quest-exp-stats">0 / {{ $item->progress }}</div>
							</div>
						</div>
						<div class="lower">Sudah tercapai 0 kali</div>
						@elseif($item->type === 'ONCE_PROGRESS')
						<div class="right half poetsenone-reg text-right">
							{{ $item->value }}
						</div>
						<div class="quest-exp">
							<div class="quest-exp-bar">
								<div class="quest-exp-gained-bar"></div>
								<div class="quest-exp-stats">0 / {{ $item->progress }}</div>
							</div>
						</div>
						@endif
					</div>
					@endforeach

					@foreach ($quest_done as $qdone)
						<div class="quest-item completed">
							<div class="left">{{ $qdone->title }}</div>
							<div class="right"><span class="poetsenone-reg font-size-12">completed</span></div>
						</div>
					@endforeach

				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	@endauth

	<div class="modal mana-ui slim-card @if(strpos(session('success-quest'), 'phone') > -1) splash @endif" tabindex="-1" role="dialog" id="quest-completed-modal-phone">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Quest Completed
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Selamat, kamu telah menyelesaikan quest <span class="white-10">"Verifikasi nomor handphone"</span> dengan hadiah <span class="money money-14 right money-inline white-10">{{session('value')}}<img src="{{ session('icon')}}"></span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal" @if(strpos(session('success-verify'), 'quest') > -1 && strpos(session('success-verify'), 'email') > -1) data-toggle="modal" data-target="#quest-completed-modal-email" @endif>Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card @if(strpos(session('success-quest'), 'email') > -1) splash @endif" tabindex="-1" role="dialog" id="quest-completed-modal-email">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Quest Completed
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Selamat, kamu telah menyelesaikan quest <span class="white-10">"Verifikasi email"</span> dengan hadiah <span class="money money-14 right money-inline white-10">10<img src="{{ asset('img/currencies/coin.svg') }}"></span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	@if(strpos(session('success-quest'), 'level') > -1)
	<div class="modal mana-ui slim-card @if(strpos(session('success-quest'), 'level') > -1) splash @endif" tabindex="-1" role="dialog" id="quest-completed-modal-email">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Quest Completed
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Selamat, kamu telah menyelesaikan quest <span class="white-10">"Naik level"</span> dengan hadiah <span class="money money-14 right money-inline white-10">{{ (explode('-', session('success-quest'))[1]) * 10 }}<img src="{{ asset('img/currencies/coin.svg') }}"></span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	@endif

	@if(strpos(session('success-quest'), 'bp-quest') > -1)
	<div class="modal mana-ui slim-card @if(strpos(session('success-quest'), 'bpquest') > -1) splash @endif" tabindex="-1" role="dialog" id="quest-completed-modal-email">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Quest Completed
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Selamat, kamu telah menyelesaikan quest <span class="white-10">"Total pemberian prediksi 18 BP"</span> dengan hadiah <span class="money money-14 right money-inline white-10">Unlock fitur convert currency</span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
	@endif

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="locked-feature">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Fitur masih locked
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Kamu belum menyelesaikan quest untuk menggunakan fitur ini.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="promo-modals">
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="surveys">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Timkamu Survey 2021
				</div> 
				<div class="modal-mid font-size-16 grey-10">
					<p>Lengkapi survey ini dan dapatkan <span class="money money-14 right white-09 money-inline white-10">50<img src="{{ asset('img/currencies/coin.svg') }}"></span> gratis!</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="https://docs.google.com/forms/d/e/1FAIpQLSfcdSSk5QD8FVwjQiUMFx16vvH9pW-TtrojWmLSOs_wvIqzlQ/viewform" target="_blank" class="mana-btn-54 mana-btn-red scale-onclick">Isi survey</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Cancel</a>
				</div>
			</div>
		</div>
	</div>
	<style type="text/css">
		.nothing-content {
			padding: 30px;
			border-radius: 20px;
			background-color: #26184D;
			color: #888;
			position: relative;
			overflow: hidden;
		}
		.nothing .mana-ui-modal-close {
			display: none;
		}
		.nothing .meat {
			position: relative;
			z-index: 2000;
		}
		.nothing-content h3 {
			font-family: 'Rajdhani-Bold';
			font-size: 32px;
			margin-bottom: 25px;
		    line-height: 38px;
		    z-index: 400;
		    position: relative;
		    color: rgb(255 255 255 / 90%);
		}
	</style>

	<div class="modal mana-ui nothing" tabindex="-1" role="dialog" id="hero-promo-20">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<img src="{{ asset('img/promos/26rbkedua-2.jpg') }}" class="bd20 w-100 mb-20">
				<div class="nothing-content mb-20">
					@include('includes.mana-ui.modal-top')
					<div class="meat">
						<h3>Free BP Event 2021</h3>
						<p>Untuk setiap registrasi baru (dengan nomor telefon dan email yang terverifikasi), akan langsung mendapatkan gratis <span class="money money-14 right white-09 money-inline white-10">26<img src="{{ asset('img/currencies/bp.svg') }}"></span></p>
						<p>Registrations tersisa: <span class="white-10">{{$total_verified_phone_remaining}}</span></p>
					</div>
				</div>
				<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="hero-promo-1">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Free BP Event October 2020
				</div>
				<div class="modal-mid grey-10">
					<p>Untuk setiap registrasi baru (dengan nomor telefon yang terverifikasi), akan langsung mendapatkan gratis <span class="money money-14 right white-09 money-inline white-10">26<img src="{{ asset('img/currencies/bp.svg') }}"></span></p>
					<p>Registrations remaining: <span class="white-10">0</span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui nothing" tabindex="-1" role="dialog" id="hero-promo-2">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<img src="{{ asset('img/ins1.jpg') }}" class="bd20 w-100 mb-20">
				<img src="{{ asset('img/ins2.jpg') }}" class="bd20 w-100 mb-20">
				<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="hero-promo-3">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Referral Event 2020
				</div>
				<div class="modal-mid grey-10">

					<p>Untuk setiap member baru (referee) yang mencantumkan kode referral dan nomor telfon yang valid , akan mendapat <span class="money money-14 right money-inline white-09">8<img src="{{ asset('img/currencies/bp.svg') }}"></span> gratis.</p>
					<p>Untuk setiap member pemilik kode referral (referrer), setiap kali kode referral nya terpakai dan pemakai kode telah melakukan top up sebesar <span class="money money-14 right money-inline white-09">9<img src="{{ asset('img/currencies/lp.svg') }}"></span>, pemilik kode akan mendapat <span class="money money-14 right money-inline white-09">9<img src="{{ asset('img/currencies/lp.svg') }}"></span>.</p>
					<p>Penggunaan referral code dibatasi 5,000. Pemakaian satu code referral tidak dibatasi. Satu code referral dapat dipakai berkali-kali.</p>
					<p>Referral usage remaining: <span class="white-10">{{ number_format($total_referral_code_remaining, 0, '.', ',') }}</span></p>

					<!-- hanya keluar jika sudah regis -->
					@auth
					<div class="dashboard-info-group mb-10 white-10 mt-20 modal-info-group">
						<div class="info-horizontal bg020 bd20 d-flex align-items-center justify-content-center cursor-ptr" id="copy-referral">
							<div class="info-horizontal-left o5">Kode referral kamu</div>
							<div class="info-horizontal-right text-right">{{ $referral_code }}</div>
						</div>
						<input type="text" value="{{ $referral_code }}" id="copy-referral-input" style="top: -99999px;position: absolute;">
					</div>
					@endauth

				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="hero-promo-4">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Promo diskon cash 25%
				</div>
				<div class="modal-mid grey-10">
					<p>Potongan 25% untuk setiap pembelian Game Diamonds menggunakan uang tunai (GoPay, OVO etc) di TimKamu.com.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="{{ url('purchase/detail?name=diamond') }}" class="mana-btn-54 mana-btn-red scale-onclick">Top-Up Diamond</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="hero-promo-5">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Cashback Sampai Dengan 100jt!
				</div>
				<div class="modal-mid grey-10">
					<p>Dapatkan cashback 10% <span class="money money-14 right money-inline fw-400 white-10">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> setiap kali kamu recharge LP.</p>
					<p>
						Besar <span class="money money-14 right money-inline fw-400 white-10">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> adalah 10% x <span class="money money-14 right money-inline fw-400 white-10">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span> jumlah recharge.<br>
						Cashback <span class="money money-14 right money-inline fw-400 white-10">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> di bawah .7 akan round down <br>
						Cashback <span class="money money-14 right money-inline fw-400 white-10">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> di atas .8 akan round up
					</p>
					<p>
						Contoh: recharge 1 LP, cashback = 0 BP (10% = 0.1) <br>
						Contoh: recharge 7 LP, cashback = 0 BP (10% = 0.7) <br>
						Contoh: recharge 8 LP, cashback = 1 BP (10% = 0.8) <br>
						Contoh: recharge 15 LP, cashback = 1 BP (10% = 1.5) <br>
						Contoh: recharge 66 LP, cashback = 6 BP (10% = 6.6) <br>
						Contoh: recharge 200 LP, cashback = 20 BP (10% = 20)
					</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="{{ url('purchase/detail?name=lp') }}" class="mana-btn-54 mana-btn-red scale-onclick">Recharge LP sekarang</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="referral-code-copied">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-mid">
					Referral code tersalin di clipboard.
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="regis-with-code-success">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Referral Event 2020
				</div>
				<div class="modal-mid font-size-16 grey-10">
					<p>Selamat, input kode referral berhasil dan kamu mendapat <span class="money money-14 right money-inline white-10">8<img src="{{ asset('img/currencies/bp.svg') }}"></span></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>
</section>
