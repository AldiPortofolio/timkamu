@extends('layouts.mana-ui')

@section('page_title', "Teams - ".app('request')->input('name'))
@section('body_class', 'mana-ui team-view')


@section('content')
@include('includes.mana-ui.nav')
@include('includes.mana-ui.effects')

<!-- page content -->
<section id="page-content">

{{--	<!-- event index filters -->--}}
{{--	<div class="event-index-filters mb-20">--}}
{{--		<div class="container">--}}
{{--			<div class="row justify-content-center">--}}
{{--				<div class="col-md-8 col-lg-6">--}}
{{--					<div class="d-flex flex-wrap">--}}
{{--						<div class="event-index-filter-select mb-0 game">--}}
{{--							<select class="custom-select" id="filter-teams">--}}
{{--								<option value="onic" @if(app('request')->input('name') === 'onic') selected @endif>ONIC Esports</option>--}}
{{--								<option value="evos" @if(app('request')->input('name') === 'evos') selected @endif>Evos</option>--}}
{{--								<option value="rrq" @if(app('request')->input('name') === 'rrq') selected @endif>RRQ</option>--}}
{{--								<option value="alter" @if(app('request')->input('name') === 'alter') selected @endif>Alter Ego</option>--}}
{{--							</select>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}

	<!-- page section -->
	<div id="team-view-header" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

                    <div class="form-group mana-control mb-0">
                        <form id="search-team">
                            <div class="row">
                                <div class="col-8 pr-1">
                                    <input type="text" class="form-control mana-control" id="search-team-name" placeholder="Cari nama tim...">
                                </div>
                                <div class="col-4 pl-1">
                                    <a href="#" class="mana-btn-54 inline-search mana-btn-red has-spinner mb-15 team-search-go">
                                        <span class="default-text">Search</span>
                                        <div class="spinner-border hw24"></div>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

					<div class="team-view-head bd20 d-flex align-items-center justify-content-center mb-20">
						<div class="team-view-thumb">
							<img src="{{ asset($team->logo.'-200.png') }}" class="w-100">
						</div>
						<div class="team-view-meta d-flex flex-column">
							<div class="team-view-meta-name rajdhani-bold font-size-30">{{ $team->name }}</div>
							<div class="team-view-meta-stats grey-10">
								<div><span class="white-10">{{ number_format($total_fans, 0, '.', ',') }}</span> Timkamu Fans</div>
								<div><span class="white-10">{{ number_format($total_donation, 0, '.', ',') }}</span> Total LP Support</div>
							</div>
						</div>
					</div>

					<div class="row space-10">
						<div class="col-6 space-10">
                            @if($status_fans)
                            <a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick font-size-14" data-toggle="modal" data-target="#existing-fans-quit">Kamu Adalah Fans</a>
                            @elseif($user && $user->fans_team_id)
                            <a href="#" class="mana-btn-54 mana-btn-red scale-onclick font-size-14" data-toggle="modal" data-target="#fans-already-on-another-team">Jadi Fans</a>
                            @elseif(!$user || !$user->fans_team_id)
                            <a href="#" class="mana-btn-54 mana-btn-red scale-onclick font-size-14" data-toggle="modal" data-target="#confirm-fans-join">Jadi Fans</a>
                            @endif
						</div>
						<div class="col-6 space-10">
							<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick font-size-14" data-toggle="modal" data-target="#team-view-give-suppport">Give Support</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- swiper panel selector -->
	<div id="pulsa-panel" class="mb-10">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide swiper-panel-item team-view-panel-tab active" data-target="panel1">
								<i data-feather="users" class="icon"></i><a href="#">Supporters Terbaru</a>
							</div>
							<div class="swiper-slide swiper-panel-item team-view-panel-tab " data-target="panel2">
								<i data-feather="bar-chart" class="icon"></i><a href="#">Top Supporters</a>
							</div>
							<div class="swiper-slide swiper-panel-item team-view-panel-tab " data-target="panel3">
								<i data-feather="star" class="icon"></i><a href="#">Team Information</a>
							</div>
							<!-- do not delete last swiper, ui hack -->
							<div class="swiper-slide swiper-panel-item team-view-panel-tab">
								<a href="#">&nbsp;</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- swiper panel selector -->
	<div id="team-view-panels" class="mb-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="panel-container panel1 active">
						<div class="supporter-container d-flex flex-column mt-10">
                            @if(count($donations) > 0)
                            @foreach ($donations->slice(0, 10) as $item)
                                <div class="supporter-row">
									<div class="row">
										<div class="supporter-name col-8">{{ $item->username }}</div>
										<div class="supporter-value col-4 text-right d-flex	align-items-center justify-content-end"><span class="money money-14 right">{{ $item->total_donation }}<img src="{{ asset('img/currencies/lp.svg') }}"></span></div>
									</div>
								</div>
                            @endforeach
                            @else
							<div class="supporter-row-no-content mb-20">
								belum ada data
                            </div>
                            @endif
						</div>
					</div>

					<div class="panel-container top-supporter panel2">
						<div class="supporter-container d-flex flex-column mt-10">
							@foreach (collect($arr_topsupporters)->sortByDesc('total')->slice(0,10) as $item)
                                <div class="supporter-row">
									<div class="row">
										<div class="supporter-name col-8">{{ $item['name'] }}</div>
										<div class="supporter-value col-4 text-right d-flex	align-items-center justify-content-end"><span class="money money-14 right">{{ number_format($item['total'], 0, '.', ',') }}<img src="{{ asset('img/currencies/lp.svg') }}"></span></div>
									</div>
								</div>
                            @endforeach
						</div>
					</div>

					<div class="panel-container panel3">
						<div class="team-view-card bd20">
							<p>{{$team->description !== null ? $team->description : " The team has yet to have a description here."}}</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>




</section>

<section id="page-modals">

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="confirm-fans-join">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					ONIC Esports
				</div>
				<div class="modal-mid grey-10">
					<p>Mau bergabung menjadi fans tim ini?</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red has-spinner confirm-join-team-btn">
						<span class="default-text">Bergabung</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card @if(session('success') === 'success-become-fans') splash @endif" tabindex="-1" role="dialog" id="confirm-fans-join-success">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					ONIC Esports
				</div>
				<div class="modal-mid grey-10">
					<p>Kamu sudah menjadi fans tim ini.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="existing-fans-quit">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					ONIC Esports
				</div>
				<div class="modal-mid grey-10">
					<p>Kamu sudah bergabung menjadi fans ONIC Esports.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal" data-toggle="modal" data-target="#confirm-fans-quit">Berhenti menjadi fans</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="fans-already-on-another-team">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					ONIC Esports
				</div>
				<div class="modal-mid grey-10">
					<p>Kamu sudah bergabung di tim lain. Untuk bergabung menjadi fans tim ini, kamu perlu berhenti menjadi fans di tim lain.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="confirm-fans-quit">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
                    {{$team->name}}
                </div>
				<div class="modal-mid grey-10">
					<p>Yakin mau berhenti menjadi fans {{$team->name}} ? Kamu bisa bergabung kembali kapan saja.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red has-spinner confirm-quit-team-btn">
						<span class="default-text">Confirm</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card @if(session('success') === 'success-quit-fans') splash @endif" tabindex="-1" role="dialog" id="confirm-fans-quit-success">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					{{$team->name}}
				</div>
				<div class="modal-mid grey-10">
					<p>Kamu sudah tidak menjadi fans tim ini.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="team-view-give-suppport">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32 text-center">
					Berikan Support Item
				</div>
				<div class="modal-mid">
					<div class="row">
                        @foreach ($items as $item)
                            <div class="team-view-item-selection col-4 mb-30 cursor-ptr d-flex align-items-center justify-content-center flex-column scale-onclick" data-item="{{ $item->child_id }}" data-price="{{ $item->value }}" data-toggle="modal" data-target="#team-view-give-suppport-confirm" data-dismiss="modal">
								<img src="{{ asset($item->childs->logo) }}" class="team-view-gift-thumb mb-10">
								<div class="text-center">
									<span class="money money-14 right">{{ number_format($item->value, 0, '.', ',') }}<img src="{{ asset('img/currencies/lp.svg') }}"></span>
								</div>
                            </div>
                        @endforeach
					</div>

					<p class="grey-10 text-center">Pemberian item dukungan akan menambah "Total LP Support" untuk tim ini, dan nama kamu akan tercatat di list of supporters. </p>

				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

    <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="validation-input-search">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                @include('includes.mana-ui.modal-top')
                <div class="modal-about rajdhani-bold font-size-32">
                    Error
                </div>
                <div class="modal-mid grey-10">
                    <p>Masukan minimal 3 huruf</p>
                </div>
                <div class="modal-actions d-flex flex-column">
                    <a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
                </div>
            </div>
        </div>
    </div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="team-view-give-suppport-confirm">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Confirm give support item
				</div>
				<div class="modal-mid grey-10">
					<p>Yakin mau memberikan support item ini?</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red has-spinner confirm-give-support-item">
						<span class="default-text">Confirm</span>
						<div class="spinner-border hw24"></div>
					</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Batal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="team-view-give-suppport-success">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Thank you
				</div>
				<div class="modal-mid grey-10">
					<p>Terima kasih, support item kamu berhasil diberikan.</p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" onClick="window.location.reload();return false;" class="mana-btn-54 mana-btn-red scale-onclick">Okay</a>
				</div>
			</div>
		</div>
    </div>

    <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="team-view-give-suppport-failed">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Sorry
				</div>
				<div class="modal-mid grey-10">
					<p class="donate-message"></p>
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
				</div>
			</div>
		</div>
    </div>

    <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="not-enough-LP-donate">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">
				@include('includes.mana-ui.modal-top')
				<div class="modal-about rajdhani-bold font-size-32">
					Loyalty Points Tidak Cukup
				</div>
				<div class="modal-actions d-flex flex-column">
					<a href="#" class="mana-btn-54 mana-btn-red scale-onclick btn-goto-recharge-lp">Recharge LP</a>
					<a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Cancel</a>
				</div>
			</div>
		</div>
	</div>


</section>

@include('includes.mana-ui.modals')
@include('includes.mana-ui.footer')


<style type="text/css">
    /*page specific*/
    .mana-btn-54.inline-search {
        line-height: 48px;
        height: 48px;
        font-size: 14px;
    }
    .team-view-meta-name {
        line-height: 28px;
        margin-bottom: 10px;
    }
    .supporter-row-no-content {
        border-radius: 20px;
        background: rgb(0 0 0 / 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 50px;
    }
    .supporter-name {
        opacity: 0.5;
    }
    .supporter-row {
        border-radius: 20px;
        background: rgb(0 0 0 / 0.2);
        padding: 12px 16px;
        margin-bottom: 8px;
    }
    .team-view-item-selection img {
        transition: all 0.1s ease-in-out;
    }
    .team-view-item-selection:hover img {
        transform: scale(1.1);
    }

    .top-supporter .supporter-row:nth-child(1) {background: linear-gradient(90deg, rgba(255,203,91,1) 0%, rgba(255,174,0,1) 100%);}
    .top-supporter .supporter-row:nth-child(1) .supporter-name {opacity: 1;color: rgb(0 0 0 / 0.8);}

    .top-supporter .supporter-row:nth-child(2) {background: linear-gradient(90deg, rgba(238,174,202,1) 0%, rgba(42,123,218,1) 100%);}
    .top-supporter .supporter-row:nth-child(2) .supporter-name {opacity: 1;color: rgb(0 0 0 / 0.8);color:white;}

    .top-supporter .supporter-row:nth-child(3) {background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(252,124,69,1) 100%);}
    .top-supporter .supporter-row:nth-child(3) .supporter-name {opacity: 1;color: rgb(0 0 0 / 0.8);color:white;}

    .team-view-gift-thumb {
        width: 80px;
        height: 80px;
    }
    .team-view-card {
        padding: 30px;
        background: rgb(0 0 0 / 0.2);
    }
    .panel-container {
        display: none;
    }
    .panel-container.active {
        display: block;
    }
    .team-view-head {
        background: rgb(0 0 0 / 0.2);
        padding: 15px 30px;
    }
    .team-view-thumb {
        flex: 1 1 30%;
    }
    .team-view-meta {
        flex: 1 1 60%;
        margin-left: 30px;
    }
    .team-view-meta-stats {
        font-size: 14px;
    }
    .team-view-meta-stats .icon {
        height: 14px;
        width: 14px;
        position: relative;
        top: -1px;
        opacity: .8;
        margin-right: 8px;
    }
    .team-view-meta-stats .icon.lp {
        top: -2px;
    }
    #pulsa-panel .swiper-container {
        width: 100%;
    }
    #pulsa-panel .swiper-slide {
        width: auto;
        margin-right: 25px;
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
</style><style type="text/css">
	/*media*/

</style>
@endsection

@section('js')
<script type="text/javascript">
	var mySwiper = new Swiper('#pulsa-panel .swiper-container', {
		// Optional parameters
		direction: 'horizontal',
		loop: false,
		slideToClickedSlide: true,
		slidesPerView: 'auto',
	})
</script>
<script>
    var user = "{{ Auth::user() }}";
	$(document).ready(function() {

		// page specific scripts

		// join button
		$('body').on('click', '.confirm-join-team-btn', function(e) {
			e.preventDefault();

			target = $(this);
			target1 = $('#confirm-fans-join');

            if(user === "") {
                target1.modal('hide');

                $("#modal-need-login").modal('show');
                return false;
            }
			// show spinner
			target.addClass('loading');

			setTimeout(function() {
			    var urlString = '{{route('teams.fans')}}?name={{$alias}}'
                location.href = urlString;
			}, 1000);
		});

		// quit button
		$('body').on('click', '.confirm-quit-team-btn', function(e) {
			e.preventDefault();

			target = $(this);
			target1 = $('#confirm-fans-quit');

            if(user === "") {
                target1.modal('hide');

                $("#modal-need-login").modal('show');
                return false;
            }

			// show spinner
			target.addClass('loading');

			setTimeout(function() {
			    var urlString = ("{{ url('teams/fans?name=onic&quit=true') }}").replace(/&amp;/g, '&');
                location.href = urlString;
			}, 1000);
		});

        var itemId = '';
        var price = '';
        $('body').on('click', '.team-view-item-selection', function(e) {
            e.preventDefault();

            if(user === "") {
                $("#modal-need-login").modal('show');
                return false;
            }

            target = $(this);
            itemId = target.attr('data-item');
            price = target.attr('data-price');
        })

		// give support button
		$('body').on('click', '.confirm-give-support-item', function(e) {
			e.preventDefault();

			target = $(this);
			target1 = $('#team-view-give-suppport-confirm');
			target2 = $('#team-view-give-suppport-success');
            target3 = $('#team-view-give-suppport-failed');
            target4 = $('#not-enough-LP-donate');
            var currentLp = "{{ Auth::user() ? Auth::user()->total_lp : 0 }}";

            if(parseInt(price) > parseInt(currentLp)) {
                target1.modal('hide');
                target4.modal('show');
                return false;
            }

            if(user === "") {
                target1.modal('hide');
                $("#modal-need-login").modal('show');
                return false;
            }

			// show spinner
			target.addClass('loading');

			setTimeout(function() {
			    // do db work here
                $.ajax({
                    url: "{{ url('ajax/donate-team-items/'.$team->id) }}",
                    method: 'post',
                    data : {
                        item_id : itemId
                    },
                    success: function(result) {
                        target.removeClass('loading');
			            target1.modal('hide');
                        if(result.status === 'error') {
                            target3.modal('show');
                            $('.donate-message').text(result.message);
                        } else {
                            // hide modal
			                target2.modal('show');
                            $('.amt-lp').text(result.total_lp);
                        }
                    }
                })
			}, 1000);
		});

		// team-view panel button
		$('body').on('click', '.team-view-panel-tab', function(e) {
			e.preventDefault();

			target = $(this);
			target1 = target.attr('data-target');
			target2 = $('.team-view-panel-tab');
			target3 = $('.panel-container');
			target4 = $('.panel-container.'+target1);

			target2.removeClass('active');
			target.addClass('active');

			target3.removeClass('active');
			target4.addClass('active');


		});

        $('#filter-teams').on('change', function(e) {
            e.preventDefault();

            var name = $(this).val();

            location.href = "{{ url('teams/detail?name=') }}"+name;
        });

        $('body').on('click', '.team-search-go', function() {
            $('#search-team').submit();
        });

        $('#search-team').on('submit', function (e){
            e.preventDefault();
            let val = $('#search-team-name').val();
            if(val.length < 3){
                $('#validation-input-search').modal('show');
                return false;
            }
            setTimeout(function (){
                $('.team-search-go').addClass('loading');
                location.href = "{{ route('teams.index') }}?sort_by=fans&team_name="+val;
            })
        })
	})

// redirect to recharge LP
$('.btn-goto-recharge-lp').on('click', function(e) {
	e.preventDefault();

	$(this).parent().parent().parent().parent().modal('hide');
	window.open("{{ url('purchase/detail?name=lp') }}", "_blank");
})
// end of redirect to recharge LP
</script>
@endsection
