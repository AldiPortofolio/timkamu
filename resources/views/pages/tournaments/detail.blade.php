@extends('layouts.mana-ui')

@section('page_title', "Tournaments - ". $tournament->name)
@section('body_class', 'mana-ui tournaments-view')


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
					<h1 class="rajdhani-bold">{{$tournament->name}}</h1>
				</div>
			</div>
		</div>
	</div>

    <!-- page section -->
    <div id="home-promo-cards" class="mb-20">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    @if($tournament->banner)
                        <a href="{{ asset($tournament->banner)  }}" target="_blank"
                        ><img src="{{ asset($tournament->banner) }}" class="bd20 w-100 mb-20 scale-onclick"></a>
                    @endif
                        @if($tournament->prize_thumn)
                            <img src="{{ asset($tournament->prize_thumb) }}" class="w-100 mb-10 bd20 scale-onclick">
                        @endif

                </div>
            </div>
        </div>
    </div>

	<!-- swiper panel selector -->
	<div id="pulsa-panel" class="mb-20">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="swiper-container">
						<div class="swiper-wrapper">

							<div class="swiper-slide tournament-tab swiper-panel-item active" data-target="panel1">
								<i data-feather="box" class="icon"></i><a href="#" class="active">Informasi</a>
							</div>

							<div class="swiper-slide tournament-tab swiper-panel-item" data-target="panel2">
								<i data-feather="box" class="icon"></i><a href="#">Deskripsi</a>
							</div>

							<div class="swiper-slide tournament-tab swiper-panel-item" data-target="panel3">
								<i data-feather="box" class="icon"></i><a href="#">Jadwal</a>
							</div>

							<div class="swiper-slide tournament-tab swiper-panel-item" data-target="panel4">
								<i data-feather="box" class="icon"></i><a href="#">Peraturan</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- event index filters -->
	<div class="system-mail-wrapper mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="tournament-panel panel1 active">
						<div class="info-block mb-10">
							<div class="row">
								<div class="col-6 pr-1 left">Pendaftaran dibuka</div>
								<div class="col-6 pl-1 right">{{$tournament->registration_start !== null ? \Carbon\Carbon::parse($tournament->registration_start)->format('d M Y - H:i') . "WIB" : "ASAP"}} </div>
							</div>
						</div>
						<div class="info-block mb-10">
							<div class="row">
								<div class="col-6 pr-1 left">Turnamen dimulai</div>
								<div class="col-6 pl-1 right">{{ \Carbon\Carbon::parse($tournament->tournament_start)->format('d M Y - H:i') }} WIB</div>
							</div>
						</div>

						<div class="info-block mb-10">
							<div class="row">
								<div class="col-6 pr-1 left">Slot</div>
								<div class="col-6 pl-1 right">{{ $tournament->teams_count }} / {{ $tournament->slot }}</div>
							</div>
						</div>

						<div class="info-block mb-10">
							<div class="row">
								<div class="col-6 pr-1 left">Biaya pendaftaran</div>
                                @if($tournament->admission_fee)
								    <div class="col-6 pl-1 right">Rp {{ number_format($tournament->admission_fee * $tournament->membership, 0, '.', ',') }} per team / slot</div>
                                @else
                                    <div class="col-6 pl-1 right">GRATIS</div>
                                @endif
                            </div>
						</div>

						<div class="info-block mb-10">
							<div class="row">
								<div class="col-6 pr-1 left">Lokasi</div>
								<div class="col-6 pl-1 right">{{$tournament->location}}</div>
							</div>
						</div>
                        @if($tournament->url_tournament)
                        <div class="info-block mb-10">
                            <div class="row">
                                <div class="col-6 pr-1 left">URL</div>
                                <div class="col-6 pl-1 right"><a href="{{$tournament->url_tournament}}">{{$tournament->url_tournament}}</a></div>
                            </div>
                        </div>
                        @endif
                        @if($tournament->url_live_streaming)
                            <div class="info-block mb-10">
                                <div class="row">
                                    <div class="col-6 pr-1 left">Live Stream</div>
                                    <div class="col-6 pl-1 right"><a href="{{$tournament->url_live_streaming}}">{{$tournament->url_live_streaming}}</a></div>
                                </div>
                            </div>
                        @endif
						<div class="info-block mb-10">
							<div class="row">
								<div class="col-4 pr-1 left">Hadiah</div>
								<div class="col-8 pl-1 right">
									{!! $tournament->rewards !!}
								</div>
							</div>
						</div>
                        <div class="info-block mb-10">
                            <div class="row">
                                <div class="col-4 pr-1 left">Contact Person</div>
                                <div class="col-8 pl-1 right">
                                    {!! $tournament->contact_person !!}
                                </div>
                            </div>
                        </div>
                        @if($tournament->organized_by)
                            <div class="info-block mb-10">
                                <div class="row">
                                    <div class="col-4 pr-1 left">Organized By</div>
                                    <div class="col-8 pl-1 right">
                                        {!! $tournament->organized_by !!}
                                    </div>
                                </div>
                            </div>
                        @endif
					</div>

					<div class="tournament-panel panel2">
						<div class="info-block mb-10">
							<div class="row">
								<div class="col-12 o5 mt-10 mb-10">
									{!! $tournament->description !!}
								</div>
							</div>
						</div>
					</div>

					<div class="tournament-panel panel3">
						<div class="info-block mb-10">
							<div class="row">
								<div class="col-12 o5 mt-10 mb-10">
									{!! $tournament->schedule !!}
								</div>
							</div>
						</div>
					</div>

					<div class="tournament-panel panel4">
						<div class="info-block mb-10">
							<div class="row">
								<div class="col-12 o5 mt-10 mb-10">
									{!! $tournament->rules !!}
								</div>
							</div>
						</div>
					</div>

					<div class="mb-20"></div>

					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick mb-10" data-toggle="modal" @if($is_login_leader_registered) data-target="#member-registered" @elseif($tournament->status !== 'Active' || ($tournament->teams_count >= $tournament->slot))   data-target="#registration-closed" @elseif(Auth::id()) data-target="#leader-form" @else data-target="#need-login" @endif>Registrasi sebagai team leader</a>

					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick mb-10" data-toggle="modal" @if($is_login_leader_registered) data-target="#member-registered" @elseif($tournament->status !== 'Active')   data-target="#registration-closed" @elseif(Auth::id()) data-target="#team-member-form" @else data-target="#need-login" @endif>Registrasi sebagai team member</a>

					<a href="{{route('tournaments.index')}}" class="mana-btn-54 mana-btn-opaque scale-onclick">Back to tournament list</a>

				</div>
			</div>
		</div>
	</div>

</section>

<section id="page-modals">
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="leader-form">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Registrasi sebagai team leader
				</div>
				<form id="form-leader-form">
                    <div class="modal-mid">
                        <img src="/img/tournaments/tourney-inside-notif.jpg" class="w-100 bd20 mb-10">
                        <div class="form-group mana-control">
                            <label class="mana-control">Nama team</label>
                            <input type="text" name="team_name" class="form-control mana-control mb-2 validate-leader-form">
                            <small class="font-size-14 grey-10 d-block fw-300 mb-10">Nama tim ini akan muncul pada saat anggota mendaftar. Pastikan data sudah benar.</small>
                            <small class="font-size-14 grey-10 d-block fw-300 mb-10">Biaya pendaftaran akan dibagi rata antara semua anggota tim. Contoh: biaya pendaftaran Rp 1,000,000, dibagi 5 anggota (termasuk team leader), maka masing-masing anggota hanya perlu membayar Rp 200,000.</small>
                            <small class="font-size-14 grey-10 d-block fw-300">BIAYA DAFTAR AKAN MENJADI SALDO UNTUK ISI PULSA/TOP UP DI TIMKAMU</small>
                        </div>
                        <div class="form-group mana-control">
                            <label class="mana-control">Info member #1 (team leader)</label>
                            <input type="text" class="form-control mana-control mb-10 validate-leader-form" name="team_members_name[]" placeholder="Nama member">
                            <input type="text" class="form-control mana-control mb-10 validate-leader-form"  name="team_members_username[]" placeholder="In-game username">
                            <input type="text" class="form-control mana-control mb-10 validate-leader-form" name="team_members_userid[]" placeholder="In-game user ID">
                            <input type="text" required class="form-control mana-control mb-10 validate-leader-form" name="team_members_phone_number[]" placeholder="Phone Number">
                        </div>
                        <div class="member-loop">
                            @for($i = 2; $i <= $tournament->membership; $i++)
                                <div class="form-group mana-control">
                                    <label class="mana-control">Info member #<span class="member-index"><?php echo $i; ?></span></label>
                                    <input type="text" class="form-control mana-control mb-10 validate-leader-form" name="team_members_name[]" placeholder="Nama member">
                                    <input type="text" class="form-control mana-control mb-10 validate-leader-form"  name="team_members_username[]" placeholder="In-game username">
                                    <input type="text" class="form-control mana-control mb-10 validate-leader-form" name="team_members_userid[]" placeholder="In-game user ID">
                                </div>
                            @endfor
                        </div>
                        <small class="font-size-14 grey-10 d-block fw-300">Pastikan semua nama dan in-game ID tiap anggota sudah benar. Data bersifat final dan tidak dapat diubah.</small>
                    </div>
                </form>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red btn-fill-out-form" data-toggle="modal" data-dismiss="modal" data-target="#team-leader-choose-payment">
						<span class="default-text">Lanjut ke pembayaran</span>
					</a>
					<small class="font-size-14 grey-10 d-block fw-300 mt-2 mb-3">Kamu perlu membayar Rp {{ number_format($tournament->admission_fee, 0, '.', ',') }} untuk menyelesaikan pendaftaran di turnamen ini.</small>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="team-member-form">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Registrasi sebagai team member
				</div>
				<div class="modal-mid">
					<div class="form-group mana-control">
						<label class="mana-control">Pilih dari team yang sudah terdaftar</label>
						<div class="event-index-filter-select mb-2">
							<select class="custom-select" id="select-team">
								<option disabled selected>Pilih Team</option>
								@foreach ($team_registered as $team)
									<option value="{{ $team->id }}">{{ $team->name}}</option>
								@endforeach
							</select>
						</div>
						<small class="font-size-14 grey-10 d-block fw-300">Pastikan tim yang dipilih adalah benar. Pembayaran pada tim yang salah tidak dapat dikembalikan.</small>
					</div>
					<div class="form-group mana-control">
						<label class="mana-control">Pilih dari anggota yang sudah terdaftar</label>
						<div class="event-index-filter-select mb-2">
							<select class="custom-select" id="select-member" name="member_id">
								<option disabled selected>Pilih Member</option>
							</select>
						</div>
						<small class="font-size-14 grey-10 d-block fw-300">Pastikan nama anggota tim yang dipilih adalah benar. Pembayaran pada nama anggota yang salah tidak dapat dikembalikan.</small>
					</div>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red btn-member-form" data-toggle="modal" data-dismiss="modal" data-target="#team-leader-choose-payment">
						<span class="default-text">Lanjut ke pembayaran</span>
					</a>
					<small class="font-size-14 grey-10 d-block fw-300 mt-2 mb-3">Kamu perlu membayar Rp 40,000 untuk menyelesaikan pendaftaran di turnamen ini.</small>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="team-leader-choose-payment">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Pilih metode pembayaran
				</div>
				<div class="modal-mid grey-10">
					<div class="pg-shelf-container d-flex flex-wrap align-items-center">

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="gopay">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/gopay.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp {{ number_format($tournament->admission_fee, 0, '.', ',') }}
								</div>
							</div>
						</div>

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="dana">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/dana.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp {{ number_format($tournament->admission_fee, 0, '.', ',') }}
								</div>
							</div>
						</div>

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="ovo">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/ovo.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp {{ number_format($tournament->admission_fee, 0, '.', ',') }}
								</div>
							</div>
						</div>

						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="shopee">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name">
									<img src="{{ asset('img/pg/shopee-pay.png') }}" class="pg-icon">
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp {{ number_format($tournament->admission_fee, 0, '.', ',') }}
								</div>
							</div>
						</div>

						@if(ENV('APP_ENV') === 'local' || ENV('APP_ENV') === 'dev')
						<div class="pg-shelf-item pg-choice-btn d-flex scale-onclick" data-value="bypass">
							<div class="pg-shelf-item-inner d-flex bd20 align-items-center">
								<div class="pg-vendor-name black-08 fw-800">
									bypass
								</div>
								<div class="pg-price text-right poetsenone-reg font-size-16 black-08 d-flex justify-content-end">
									Rp {{ number_format($tournament->admission_fee, 0, '.', ',') }}
								</div>
							</div>
						</div>
						@endif

					</div>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red team-pay-do has-spinner" id="button-bayar">
						<span class="default-text">Bayar</span>
						<div class="spinner-border hw24"></div>
					</a>
					<small class="font-size-14 grey-10 d-block fw-300 mt-2 mb-3">Masing-masing anggota tim tetap perlu membayar Rp {{ number_format($tournament->admission_fee, 0, '.', ',') }} untuk tim kamu dapat berpartisipasi di turnamen ini.</small>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card @if(session('success')) splash @endif" tabindex="-1" role="dialog" id="team-pay-success">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Pembayaran berhasil
				</div>
				<div class="modal-mid grey-10">
					Terima kasih atas pembayaran biaya masuk turnamen.
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="{{ url('profile/system-mail') }}" class="mana-btn-54 mana-btn-red scale-onclick">Cek system mail</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

    <div class="modal mana-ui slim-card @if(session('failed')) splash @endif" tabindex="-1" role="dialog" id="team-pay-success">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                @include('includes.mana-ui.modal-top')
                <div class="modal-about rajdhani-bold font-size-32">
                    Pendaftaran Gagal
                </div>
                <div class="modal-mid grey-10">
                    Anda sudah terdaftar dalam tournament
                </div>
                <div class="modal-actions d-flex flex-column">
                    <a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
                </div>
            </div>
        </div>
    </div>


	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="need-login">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error pendaftaran
				</div>
				<div class="modal-mid font-size-16 o5">
					<p class="message-error">
						Kamu butuh login untuk melakukan itu.
					</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" id="btn-need-login" data-dismiss="modal">Sign in</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="member-registered">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Info pendaftaran
				</div>
				<div class="modal-mid font-size-16 o5">
					<p class="message-error">
						Kamu sudah terdaftar dalam turnament ini.
					</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" id="btn-need-login" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

    <div class="modal mana-ui slim-card  @if(session('closed')) splash @endif" tabindex="-1" role="dialog" id="registration-closed">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                @include('includes.mana-ui.modal-top')
                <div class="modal-about rajdhani-bold font-size-32">
                    Info pendaftaran
                </div>
                <div class="modal-mid font-size-16 o5">
                    <p class="message-error">
                        Registrasi sudah ditutup.
                    </p>
                </div>
                <div class="modal-actions d-flex flex-column">
                    <a href="#" class="mana-btn-54 mana-btn-red scale-onclick" id="btn-need-login" data-dismiss="modal">Okay</a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-error-msg">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error Pengisian Form
				</div>
				<div class="modal-mid font-size-16 o5">
					<p class="message-error"></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-error-form-msg">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error Pengisian Form
				</div>
				<div class="modal-mid font-size-16 o5">
					<p class="message-error">Harap mengisi seluruh form.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal" data-toggle="modal" data-target="#leader-form">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="modal-error-member-form-msg">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Error Pengisian Form
				</div>
				<div class="modal-mid font-size-16 o5">
					<p class="message-error">Harap mengisi seluruh form.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal" data-toggle="modal" data-target="#team-member-form">Okay</a>
				</div>
			</div>
		</div>
	</div>

</section>

<div class="d-none member-template">
	<div class="form-group mana-control">
		<label class="mana-control">Info member #<span class="member-index">1</span></label>
		<input type="text" class="form-control mana-control mb-10" placeholder="Nama member">
		<input type="text" class="form-control mana-control mb-10" placeholder="In-game username">
	</div>
</div>

@include('includes.mana-ui.footer')
@include('includes.mana-ui.modals')


<style type="text/css">
	.tournament-panel {
		display: none;
	}
	.tournament-panel.active {
		display: block;
	}
	.info-block {
		padding: 16px 20px;
		font-size: 14px;
		background: rgb(0 0 0 / .2);
		border-radius: 20px;
	}
	.info-block .left {
		opacity: .5;
		display: flex;
		align-items: center;
		justify-content: flex-start;
	}
	.info-block .right {
		display: flex;
		align-items: center;
		justify-content: flex-end;
		text-align: right;
	}
</style>
<style type="text/css">
	.shop-panel {
		display: none;
	}
	.shop-panel.active {
		display: block;
	}
	.isi-pulsa-telkomsel .shelf-item {
		flex: 0 0 50%;
	}
	#pulsa-panel .swiper-container {
	    width: 100%;
	}
	#pulsa-panel .swiper-slide {
		width: auto;
		margin-right: 25px;
		cursor: pointer;
	}
	.swiper-panel-item {
		opacity: 0.3;
	}
	.swiper-panel-item.active {
		opacity: 0.9;
	}
	.swiper-panel-item .icon {
		width: 16px;
		position: relative;
		top: -2px;
		margin-right: 8px;
		opacity: 0.8;
	}
</style>
@endsection

@section('js')
<script type="text/javascript">
	var mySwiper = new Swiper('#pulsa-panel .swiper-container', {
		// Optional parameters
		direction: 'horizontal',
		loop: false,
		slidesPerView: 'auto',
	})
</script>
<script>
	$(document).ready(function() {

        var user = "{{ Auth::id() }}";
		var userType = 'leader';
        var paymentType = '';
        var amount = "{{$tournament->admission_fee}}";
		var teamName = '';

        // page specific scripts
		// send email verification modal
		// $('.member-count').on('change', function(e) {
		// 	e.preventDefault();

		// 	var loc1 = $(this);
		// 	var loc2 = loc1.val();

		// 	var loc3 = $('.member-template');

		// 	var loc5 = $('.member-loop');

		// 	loc5.html('');
		// 	for (i = 2; i <= loc2; i++) {
		// 		var loc6 = loc3.find('.member-index');

		// 		loc6.html(i);

		// 		var loc4 = loc3.html();

		// 		loc5.append(loc4);
		// 	}
		// });

		$('body').on('click', '.tournament-tab', function(e) {
			e.preventDefault();

			var loc1 = $(this);
			var loc2 = $('.tournament-tab');
			var loc3 = loc1.attr('data-target');
			var loc4 = $('.tournament-panel');
			var loc5 = $('.'+loc3);

			loc2.removeClass('active');
			loc1.addClass('active');

			loc4.removeClass('active');
			loc5.addClass('active');

		});

		// $('body').on('click', '.team-pay-do', function(e) {
		// 	e.preventDefault();

		// 	var loc1 = $(this);
		// 	var loc2 = $('#team-pay-success');
		// 	var loc3 = $('.modal');

		// 	// show spinner
		// 	loc1.addClass('loading');


		// 	setTimeout(function() {
		// 		loc3.modal('hide');
		// 		loc2.modal('show');
		//         loc1.removeClass('loading');
		//     }, 500);
		// });

        $('#button-leader-form').on('click', function (e){
            e.preventDefault();
            if(user === ''){
                $('#need-login').modal('show');
            }else {
                $.ajax({
                    type : 'GET',
                    url: ''
                }).done(function (response){
                    $('#leader-form').modal('show');
                }).fail(function (err){
                    let modal = $("#modal-error-msg");
                    modal.find('.modal-about').text('Error');
                    modal.find('.message-error').text(err.responseJSON.message);
                    modal.modal('show')
                })
            }
        });

        $('#button-team-member-form').on('click', function (e){
            e.preventDefault();
            if(user === ''){
                $('#need-login').modal('show');
            }else {
                $('#team-member-form').modal('show');
            }
        })

		$('.btn-fill-out-form').on('click', function(e) {
			e.preventDefault();

			var target = $('#leader-form');
			var totalMemberRequired = "{{ $tournament->membership }}";
			var totalFilled = 0;

			var memberName = [];
			var usernameGame = [];
			var userIdGame = [];

			teamName = $("input[name='team_name']").val();
			$("input[name^='team_members_username']").each(function() {
				usernameGame.push($(this).val());
			});

			$("input[name^='team_members_userid']").each(function() {
				userIdGame.push($(this).val());
			});

			let i = 0;
			$("input[name^='team_members_name']").each(function() {
				if($(this).val() !== '' && usernameGame[i] !== '' && userIdGame[i] !== '') {
					totalFilled = totalFilled + 1;
				}

				i = i+1;
			});

			if(parseInt(totalFilled) !== parseInt(totalMemberRequired) && teamName !== '') {
				target.modal('hide');
				$('#modal-error-form-msg').modal('show');

				return false;
			}
			let leaderPhoneNumber = $('input[name^=team_members_phone_number]').val();
			if(teamName === '' || leaderPhoneNumber === ''){
                target.modal('hide');
                $('#modal-error-form-msg').modal('show');
                return false;
            }

            let admissionFee = '{{$tournament->admission_fee}}';
            if(admissionFee === '0'){
                console.log('ok');
                let data = $('#form-leader-form').serialize();
                location.href = ("{{ url('purchase?name=tournament&tournament_id='.$tournament->id.'&data=') }}" + data).replace(/&amp;/g, '&')
                return false;
            }


		})

		$('.btn-member-form').on('click', function(e) {
			e.preventDefault();

			var target = $('#team-member-form');

			let memberId = $("#select-member").val();
			userType = 'member';

			if(memberId === null || memberId === undefined || memberId === '') {
				target.modal('hide');
				$('#modal-error-member-form-msg').modal('show');

				return false;
			}
            let admissionFee = '{{$tournament->admission_fee}}';
            if(admissionFee === '0'){
                console.log('ok');
                location.href = ("{{ url('purchase?name=tournament-member&tournament_id='.$tournament->id.'&member_id=') }}" + memberId).replace(/&amp;/g, '&')
                return false;
            }
		});

        $('#btn-need-login').on('click', function(e) {
            e.preventDefault();

            $('#need-login').modal('hide');
            location.href="{{ url('sign-in') }}";
        });

        $('#button-team-leader-choose-payment').on('click', function (e){
            e.preventDefault();
            let inputEl = $('.validate-leader-form');
            let isValid = true;
            inputEl.each(function (index, item){
                if($(this).val() === ''){
                    isValid = false;
                    return false;
                }
            });
            if(isValid){
                $('#leader-form').modal('hide');
                $('#team-leader-choose-payment').modal('show');
            }

        })

        // pg button
        $('body').on('click', '.pg-choice-btn', function(e) {
            e.preventDefault();

            var target = $(this);
            var target2 = $('.pg-choice-btn');

            paymentType = target.attr('data-value')

            target2.removeClass('active');
            target.addClass('active');
        });



        // beli button
        $('body').on('click', '#button-bayar', function(e) {
            e.preventDefault();

            var target = $(this);
			var target2 = $('#team-leader-choose-payment');

            if(user === '') {
                $('#need-login').modal('show');

                return false;
            } else if(paymentType === '') {
                $('#modal-error-msg').modal('show').find('p.message-error').text('Kamu belum memilih metode pembayaran');
                return false;
            }

            // show spinner
            $(this).addClass('loading');

            setTimeout(function(){
                $(this).removeClass('loading');
				if(userType === 'leader') {
					let data = $('#form-leader-form').serialize();
					if(paymentType === 'bypass') {
						var urlString = ("{{ url('purchase?name=tournament&tournament_id='.$tournament->id.'&data=') }}" + data).replace(/&amp;/g, '&');
						location.href = urlString
					} else {
						$.ajax({
							url: "{{ url('ajax/get-token-transaction') }}",
							method: "GET",
							data : data + '&name=tournament&payment_method='+paymentType+'&tournament_id={{$tournament->id}}',
							success : function(response) {
								console.log(response)
								if(response.status && response.status === 'error' && response.message === 'need-login') {
                                	$('#need-login').modal('show');
									target2.modal('hide');
                            	} else if(response.status && response.status === 'error') {
									target2.modal('hide');
									$('#modal-error-msg').modal('show').find('p.message-error').text('Terjadi error. Silahkan coba beberapa saat lagi.')
								} else {
									var res = JSON.parse(response);
                                    snap.pay(res.token);
								}

							},
						}).fail(function (err) {
						    $('#team-leader-choose-payment').modal('hide');
                            $(this).removeClass('loading');
                            $('#member-registered').modal('show').find('p').text(err.responseJSON.message);
                        })
					}
				} else if(userType === 'member') {
					let memberId = $("#select-member").val();
					if(paymentType === 'bypass') {
						var urlString = ("{{ url('purchase?name=tournament-member&tournament_id='.$tournament->id.'&member_id=') }}" + memberId).replace(/&amp;/g, '&');
						location.href = urlString
					} else {
						$.ajax({
							url: "{{ url('ajax/get-token-transaction') }}",
							method: "GET",
							data : 'name=tournament-member&payment_method='+paymentType+'&tournament_id={{$tournament->id}}&member_id='+memberId,
							success : function(response) {
								console.log(response)
								if(response.status && response.status === 'error' && response.message === 'need-login') {
                                	$('#need-login').modal('show');
									target2.modal('hide');
                            	} else if(response.status && response.status === 'error') {
									$('#modal-error-msg').modal('show').find('p.message-error').text('Terjadi error. Silahkan coba beberapa saat lagi.')
									target2.modal('hide');
								} else {
									var res = JSON.parse(response);
                                    snap.pay(res.token);
                                }

							}
						}).fail(function (err) {
                            $('#team-leader-choose-payment').modal('hide');
                            $(this).removeClass('loading');
                            $('#member-registered').modal('show').find('p').text(err.responseJSON.message);
                        })
					}
				}
            }, 1000);
        });

        $('#select-team').on('change', function (e){
            $('#select-member').empty();
            let url = '{{route('team.members.show', ':id')}}'.replace(':id', $(this).val());
            $.ajax({
                type : 'GET',
                url : url,
            }).done(function (response){
                console.log(response);
                response.forEach(function (item,index){
                   $('#select-member').append(
                       '<option value="'+item.id+'">'+item.username+'</option>'
                   );
               })
            }).fail(function (err){
                console.log(err);
            })
        })
    })
</script>
@endsection
