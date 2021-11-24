@extends('layouts.mana-ui')

@section('page_title', "Events")
@section('body_class', 'mana-ui event-index')


@section('content')
    @include('includes.mana-ui.nav')
    @include('includes.mana-ui.effects')

    <!-- page content -->
    <section id="page-content">

        <!-- page header -->
        <div id="page-title">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <h1 class="rajdhani-bold">Games Event</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- event index filters -->
        <div class="event-index-filters">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="d-flex flex-wrap">
                            <div class="event-index-filter-select month">
                                <select class="custom-select">
                                    <option value="01" @if(\Carbon\Carbon::now()->format('m') === '01') selected @endif>January</option>
                                    <option value="02" @if(\Carbon\Carbon::now()->format('m') === '02') selected @endif>February</option>
                                    <option value="03" @if(\Carbon\Carbon::now()->format('m') === '03') selected @endif>March</option>
                                    <option value="04" @if(\Carbon\Carbon::now()->format('m') === '04') selected @endif>April</option>
                                    <option value="05" @if(\Carbon\Carbon::now()->format('m') === '05') selected @endif>May</option>
                                    <option value="06" @if(\Carbon\Carbon::now()->format('m') === '06') selected @endif>June</option>
                                    <option value="07" @if(\Carbon\Carbon::now()->format('m') === '07') selected @endif>July</option>
                                    <option value="08" @if(\Carbon\Carbon::now()->format('m') === '08') selected @endif>August</option>
                                    <option value="09" @if(\Carbon\Carbon::now()->format('m') === '09') selected @endif>September</option>
                                    <option value="10" @if(\Carbon\Carbon::now()->format('m') === '10') selected @endif>October</option>
                                    <option value="11" @if(\Carbon\Carbon::now()->format('m') === '11') selected @endif>November</option>
                                    <option value="12" @if(\Carbon\Carbon::now()->format('m') === '12') selected @endif>December</option>
                                </select>
                            </div>
                            <div class="event-index-filter-select status">
                                <select class="custom-select">
                                    <option value="all">Upcoming & past events</option>
                                    <option value="upcoming" selected>Upcoming only</option>
                                </select>
                            </div>
                            <div class="event-index-filter-select game">
                                <select class="custom-select">
                                    <option value="all-games" selected>All Games</option>
                                    <option value="1">Mobile Legends: Bang Bang</option>
                                    <option value="2">Freefire</option>
                                    <option value="5">Valorant</option>
                                    <option value="3">PUBGM</option>
                                    <option value="4">League of Legends</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- event index table -->
        @php
            $noData = true;
        @endphp
        @foreach ($events as $key => $evnt)
            @if (is_object($evnt) && count($evnt) > 0)
                @php
                    $noData = false;
                @endphp
                <div class="event-index-table mo-{{ \Carbon\Carbon::parse($key)->format('m') }}">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6">
                                @foreach ($evnt as $idx => $event)
                                    @php
                                        if(!$event->league_game_id) {
                                            continue;
                                        }
                                    @endphp
                                    @if($event->league_games->game_id === 1 || $event->league_games->game_id === 4)
                                        <div class="match-card @if($event->type === 'ONGOING' || $event->type === 'UPCOMING') @if($event->type === 'ONGOING') live @endif active @elseif($event->type === 'DONE') past @endif ev-{{ $event->id }} games-{{ $event->league_games->game_id }}"
                                             @if($event->type === 'ONGOING' || $event->type === 'UPCOMING')
                                             onclick="location.href='{{ url('events/'.$event->slug) }}';"
                                             @else data-toggle="modal" data-target="#past-event-notice" @endif>
                                            <div class="title">
                                                <div class="game-thumb">
                                                    <img src="{{ asset($event->league_games->games->logo) }}">
                                                </div>
                                                <div class="middle">
                                                    <div class="game-name">{{ $event->team_left->name }} <span class="vs-word">vs</span> {{ $event->team_right->name }}</div>
                                                    <div class="league-name">{{ $event->league_games->leagues->name }}</div>
                                                </div>
                                                <div class="title-date">
                                                    <div class="game-date">{{ \Carbon\Carbon::parse($event->start_date)->format('d M') }}</div>
                                                    <div class="game-time">{{ \Carbon\Carbon::parse($event->start_date)->format('H:i') }} WIB</div>
                                                </div>
                                            </div>
                                            <div class="teams">
                                                <div class="team-container">
                                                    @if($event->team_left->alias === 'na')
                                                        <div class="team-name">NA</div>
                                                    @else
                                                        <div class="team-logo ev-{{ $event->id }}">
                                                            <img src="{{ asset($event->team_left->logo.'-200.png') }}">
                                                        </div>
                                                        <div class="team-name">{{ $event->team_left->name }}</div>
                                                    @endif
                                                </div>
                                                <div class="match-card-stats">
                                                    @if($event->type === 'ONGOING') LIVE @elseif($event->type === 'UPCOMING') Prediksi Tersedia @elseif($event->type === 'DONE') {{ $event->team_left_score }}&nbsp;&nbsp;-&nbsp;&nbsp;{{ $event->team_right_score }} @endif
                                                </div>
                                                <div class="team-container">
                                                    @if($event->team_right->alias === 'na')
                                                        <div class="team-name">NA</div>
                                                    @else
                                                        <div class="team-logo ev-{{ $event->id }}">
                                                            <img src="{{ asset($event->team_right->logo.'-200.png') }}">
                                                        </div>
                                                        <div class="team-name">{{ $event->team_right->name }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($event->league_games->game_id === 2 || $event->league_games->game_id === 3)
                                        @php
                                            $decode = json_decode($event->team_detail);
                                        @endphp
                                        <div class="match-card @if($event->type === 'ONGOING' || $event->type === 'UPCOMING') @if($event->type === 'ONGOING') live @endif active @elseif($event->type === 'DONE') past @endif ev-{{ $event->id }} games-{{ $event->league_games->game_id }}"
                                             @if($event->type === 'ONGOING' || $event->type === 'UPCOMING')
                                             onclick="location.href='{{ url('events/'.$event->slug) }}';"
                                             @else data-toggle="modal" data-target="#past-event-notice" @endif>
                                            <div class="title">
                                                <div class="game-thumb">
                                                    <img src="{{ asset('img/game-logos/pubgm.png') }}">
                                                </div>
                                                <div class="middle">
                                                    <div class="game-name">{{ $event->name }}</div>
                                                    <div class="league-name">{{ $event->league_games->leagues->name }}</div>
                                                </div>
                                                <div class="title-date">
                                                    <div class="game-date">{{ \Carbon\Carbon::parse($event->start_date)->format('d M') }}</div>
                                                    <div class="game-time">{{ \Carbon\Carbon::parse($event->start_date)->format('H:i') }} WIB</div>
                                                </div>
                                            </div>
                                            <div class="teams many">
                                                @foreach (collect($decode)->slice(0,3) as $item)
                                                    @php
                                                        $team = App\Http\Models\Team::select('logo')->where('id', $item->team_id)->first();
                                                    @endphp
                                                    <div class="team-container">
                                                        <div class="team-logo">
                                                            <img src="{{ asset($team->logo.'-200.png') }}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="teams-more">
                                                    10+ teams
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="match-card no-event text-center">
                                    <span class="o5">no events</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="event-index-table mo-{{ \Carbon\Carbon::parse($key)->format('m') }}">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6">
                                <div class="match-card no-event text-center active">
                                    <span class="o5">no events</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </section>

    <section id="page-modals">
        <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="past-event-notice">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">
                    <div class="mana-ui-modal-close cursor-ptr position-absolute" data-dismiss="modal"><img src="{{ asset('icons/x-white.svg') }}"></div>
                    <div class="modal-effects">
                        <div class="modal-top-right-blobs">
                            <img src="{{ asset('img/splash/blob-modal1.svg') }}">
                        </div>
                        <div class="modal-bottom-right-blobs">
                            <img src="{{ asset('img/splash/blob-modal2.svg') }}">
                        </div>
                    </div>
                    <div class="modal-about rajdhani-bold font-size-32">
                        Pertandingan sudah selesai
                    </div>
                    <div class="modal-mid font-size-16 o5">
                        Pertandingan ini sudah selesai.
                    </div>
                    <div class="modal-actions d-flex flex-column">
                        <a href="{{ url('events') }}" class="mana-btn-54 mana-btn-red scale-onclick">Lihat games upcoming</a>
                        <a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.mana-ui.footer')


    <style type="text/css">
        /*page specific*/
        .event-index-filters {
            margin-bottom: 20px;
        }
        .event-index-filter-select {
            margin-bottom: 20px;
        }
        .event-index-filter-select.status {
            margin-left: 20px;
        }
        .event-index-filter-select.month,
        .event-index-filter-select.status {
            flex: 1;
        }
        .event-index-filter-select.game {
            flex: 0 0 100%;
        }
        .event-index-filter-select .custom-select {
            border-radius: 10px;
            border: 0px;
            background: url("{{ asset('icons/chevron-down-white.svg') }}") no-repeat right 14px center/14px 14px;
            background-color: rgb(255 255 255 / 10%);
            color: rgb(255 255 255 / 90%);
            padding: 12px 40px 12px 12px;
            height: unset;
            position: relative;
        }
        .event-index-filter-select .custom-select option {
            background-color: #42336E;
        }
        ::selection {
            background-color: #523A76;
        }

        .event-card {
            display: none;
        }
        .event-card.active {
            display: block;
        }
    </style>
    <style type="text/css">
        /*media*/
        .event-index-table {
            display: none;
        }

        .event-index-table.active {
            display: block;
        }
    </style>
@endsection

@section('js')
    <script>
        var status = 'upcoming';
        var currMo = "{{ \Carbon\Carbon::now()->format('m') }}";
        var games = '';
        $(document).ready(function() {
            setInterval(
                function(){
                    getAllDataEvent();
                }, 3000
            );

            if(games === 'all-games') {
                games = '';
            }

            var nextMonth = "{{ \Carbon\Carbon::now()->addMonth(1)->format('m') }}";

            $('.event-index-table.mo-'+currMo).addClass('active');
            if($('.event-index-table.mo-'+currMo+' .match-card').length == $('.event-index-table.mo-'+currMo+' .match-card.past').length) {
                $('.event-index-table.mo-'+currMo+' .match-card.no-event').addClass('active');
            } else {
                $('.event-index-table.mo-'+currMo+' .match-card.upcoming').addClass('active');
                $('.event-index-table.mo-'+currMo+' .match-card.live').addClass('active');
            }

            if($('.event-index-table.mo-'+nextMonth+' .match-card.no-event').length == 0) {
                $('.event-index-table.mo-'+nextMonth).addClass('active');
                $('.event-index-table.mo-'+nextMonth+' .match-card.upcoming').addClass('active');
                $('.event-index-table.mo-'+nextMonth+' .match-card.live').addClass('active');
            }
        })

        $('.event-index-filter-select.month').on('change', function(e) {
            e.preventDefault();

            currMo = $(this).find('select').val();
            $('.event-index-table').removeClass('active');
            $('.event-index-table.mo-'+currMo).addClass('active');

            $('.match-card').removeClass('active');

            if(games !== '') {
                if(status === 'all') {
                    $('.match-card.upcoming.games-'+games).addClass('active');
                    $('.match-card.live.games-'+games).addClass('active');
                    $('.match-card.past.games-'+games).addClass('active');
                    if($('.event-index-table.mo-'+currMo+' .match-card.active').length == 0) {
                        $('.event-index-table.mo-'+currMo+' .match-card.no-event').addClass('active');
                    }
                } else {
                    $('.match-card.upcoming.games-'+games).addClass('active');
                    $('.match-card.live.games-'+games).addClass('active');
                    if($('.event-index-table.mo-'+currMo+' .match-card.active').length == 0) {
                        $('.event-index-table.mo-'+currMo+' .match-card.no-event').addClass('active');
                    }
                }
            } else {
                if(status === 'all') {
                    $('.match-card.upcoming').addClass('active');
                    $('.match-card.live').addClass('active');
                    $('.match-card.past').addClass('active');
                    if($('.event-index-table.mo-'+currMo+' .match-card.active').length == 0) {
                        $('.event-index-table.mo-'+currMo+' .match-card.no-event').addClass('active');
                    }
                } else {
                    $('.match-card.upcoming').addClass('active');
                    $('.match-card.live').addClass('active');
                    if($('.event-index-table.mo-'+currMo+' .match-card.active').length == 0) {
                        $('.event-index-table.mo-'+currMo+' .match-card.no-event').addClass('active');
                    }
                }
            }
        });

        $('.event-index-filter-select.status').on('change', function(e) {
            e.preventDefault();
            $('.event-index-table').removeClass('active');
            $('.event-index-table.mo-'+currMo).addClass('active');

            status = $(this).find('select').val();
            $('.match-card').removeClass('active');

            if(games !== '') {
                if(status === 'all') {
                    $('.match-card.upcoming.games-'+games).addClass('active');
                    $('.match-card.live.games-'+games).addClass('active');
                    $('.match-card.past.games-'+games).addClass('active');
                    if($('.event-index-table.mo-'+currMo+' .match-card.active').length == 0) {
                        $('.event-index-table.mo-'+currMo+' .match-card.no-event').addClass('active');
                    }
                } else {
                    $('.match-card.upcoming.games-'+games).addClass('active');
                    $('.match-card.live.games-'+games).addClass('active');
                    if($('.event-index-table.mo-'+currMo+' .match-card.active').length == 0) {
                        $('.event-index-table.mo-'+currMo+' .match-card.no-event').addClass('active');
                    }
                }
            } else {
                if(status === 'all') {
                    $('.match-card.upcoming').addClass('active');
                    $('.match-card.live').addClass('active');
                    $('.match-card.past').addClass('active');
                    if($('.event-index-table.mo-'+currMo+' .match-card.active').length == 0) {
                        $('.event-index-table.mo-'+currMo+' .match-card.no-event').addClass('active');
                    }
                } else {
                    $('.match-card.upcoming').addClass('active');
                    $('.match-card.live').addClass('active');
                    if($('.event-index-table.mo-'+currMo+' .match-card.active').length == 0) {
                        $('.event-index-table.mo-'+currMo+' .match-card.no-event').addClass('active');
                    }
                }
            }
        });

        $('.event-index-filter-select.game').on('change', function(e) {
            e.preventDefault();
            $('.event-index-table').removeClass('active');
            $('.event-index-table.mo-'+currMo).addClass('active');

            games = $(this).find('select').val();
            if(games === 'all-games') {
                games = '';
            }
            $('.match-card').removeClass('active');
            if(games !== '') {
                if(status === 'all') {
                    $('.match-card.upcoming.games-'+games).addClass('active');
                    $('.match-card.live.games-'+games).addClass('active');
                    $('.match-card.past.games-'+games).addClass('active');
                    if($('.event-index-table.mo-'+currMo+' .match-card.active').length == 0) {
                        $('.event-index-table.mo-'+currMo+' .match-card.no-event').addClass('active');
                    }
                } else {
                    $('.match-card.upcoming.games-'+games).addClass('active');
                    $('.match-card.live.games-'+games).addClass('active');
                    if($('.event-index-table.mo-'+currMo+' .match-card.active').length == 0) {
                        $('.event-index-table.mo-'+currMo+' .match-card.no-event').addClass('active');
                    }
                }
            } else {
                if(status === 'all') {
                    $('.match-card.upcoming').addClass('active');
                    $('.match-card.live').addClass('active');
                    $('.match-card.past').addClass('active');
                    if($('.event-index-table.mo-'+currMo+' .match-card.active').length == 0) {
                        $('.event-index-table.mo-'+currMo+' .match-card.no-event').addClass('active');
                    }
                } else {
                    $('.match-card.upcoming').addClass('active');
                    $('.match-card.live').addClass('active');
                    if($('.event-index-table.mo-'+currMo+' .match-card.active').length == 0) {
                        $('.event-index-table.mo-'+currMo+' .match-card.no-event').addClass('active');
                    }
                }
            }
        });

        function getAllDataEvent() {
            $.ajax({
                url: "{{ url('ajax/get-all-data-event/') }}",
                method: 'get',
                success: function(result) {
                    $.each(result.events, function(k, v) {
                        if(v.type === 'ONGOING') {
                            // desktop ver
                            if(!$('.match-card.ev-'+v.id).hasClass('live')) {
                                $('.match-card.ev-'+v.id).addClass('live');
                                $('.match-card.ev-'+v.id).addClass('active');
                            }

                            if($('.match-card.ev-'+v.id).hasClass('upcoming')) {
                                $('.match-card.ev-'+v.id).removeClass('upcoming');
                            }

                            if($('.match-card.ev-'+v.id).hasClass('past')) {
                                $('.match-card.ev-'+v.id).removeClass('past');
                            }
                        } else if(v.type === 'DONE') {
                            // desktop ver
                            if(!$('.match-card.ev-'+v.id).hasClass('past')) {
                                $('.match-card.ev-'+v.id).attr('data-toggle','modal')
                                $('.match-card.ev-'+v.id).attr('data-target','#past-event-notice')
                                $('.match-card.ev-'+v.id).removeAttr('onclick')
                                $('.match-card.ev-'+v.id).addClass('past');
                                $('.match-card.ev-'+v.id+' .match-card-stats').html(v.team_left_score+'>&nbsp;&nbsp;-&nbsp;&nbsp;'+v.team_right_score)
                                if(status === 'upcoming') {
                                    $('.match-card.ev-'+v.id).removeClass('active');
                                }
                            }

                            if($('.match-card.ev-'+v.id).hasClass('live')) {
                                $('.match-card.ev-'+v.id).removeClass('live');
                            }

                            if($('.match-card.ev-'+v.id).hasClass('upcoming')) {
                                $('.match-card.ev-'+v.id).removeClass('upcoming');
                            }
                        } else if(v.type === 'UPCOMING') {
                            // desktop ver
                            if(!$('.match-card.ev-'+v.id).hasClass('past')) {
                                $('.match-card.ev-'+v.id).removeAttr('data-toggle','modal')
                                $('.match-card.ev-'+v.id).removeAttr('data-target','#past-event-notice')
                                $('.match-card.ev-'+v.id).removeClass('past');
                            }

                            if($('.match-card.ev-'+v.id).hasClass('live')) {
                                $('.match-card.ev-'+v.id).removeClass('live');
                            }

                            if(!$('.match-card.ev-'+v.id).hasClass('upcoming')) {
                                $('.match-card.ev-'+v.id).addClass('active');
                                $('.match-card.ev-'+v.id).addClass('upcoming');
                            }
                        }
                    })
                }
            })
        }
    </script>
@endsection
