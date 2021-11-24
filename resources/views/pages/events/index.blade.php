@extends('layouts.mana-ui')

@section('page_title', "TimKamu - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui event-index')


@section('content')
    @include('includes.mana-ui.effects')
    @include('includes.mana-ui.nav')
    @include('includes.mana-ui.match-info')

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

        <!-- page section -->
        <div id="tournament-game-select" class="mb-30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">

                        <!-- Slider main container -->
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide tournament-game-choice active" data-target="all">
                                    <a href="#">
                                        <img src="/img/game-thumbs/new-default.jpg" class="shop-item-thumb">
                                    </a>
                                    <div class="loading-content">
                                        <div class="game-name">All Games</div>
                                    </div>
                                    <div class="loading-loader">
                                        <div class="spinner-border hw24"></div>
                                    </div>
                                </div>
                                <div class="swiper-slide tournament-game-choice" data-target="mlbb">
                                    <a href="#">
                                        <img src="/img/game-thumbs/new-mlbb.jpg" class="shop-item-thumb">
                                    </a>
                                    <div class="loading-content">
                                        <div class="game-name">Mobile Legends</div>
                                    </div>
                                    <div class="loading-loader">
                                        <div class="spinner-border hw24"></div>
                                    </div>
                                </div>
                                <div class="swiper-slide tournament-game-choice" data-target="freefire">
                                    <a href="#">
                                        <img src="{{ asset('img/game-thumbs/new-freefire.jpg') }}" class="shop-item-thumb">
                                    </a>
                                    <div class="loading-content">
                                        <div class="game-name">Free Fire</div>
                                    </div>
                                    <div class="loading-loader">
                                        <div class="spinner-border hw24"></div>
                                    </div>
                                </div>
                                <div class="swiper-slide tournament-game-choice" data-target="pubgm">
                                    <a href="#">
                                        <img src="{{ asset('img/game-thumbs/new-pubgm.jpg') }}" class="shop-item-thumb">
                                    </a>
                                    <div class="loading-content">
                                        <div class="game-name">PUBGM</div>
                                    </div>
                                    <div class="loading-loader">
                                        <div class="spinner-border hw24"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- event index table -->
        <div class="event-index-table">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="mb-20">
                            <span id="total-all-events">{{$total}}</span>  upcoming events
                        </div>
                        <div id="wrapper-events-list">
                            @foreach($events as $event)
                                @if(in_array($event->game_id, [1,4]))
                                    <div class="match-card active view-match-info @if($event->type === 'ONGOING' || $event->type === 'UPCOMING') @if($event->type === 'ONGOING') live @endif active @elseif($event->type === 'DONE') past @endif ev-{{ $event->id }} games-{{ $event->game_id }}"
                                         @if(!in_array($event->type, ['UPCOMING', 'ONGOING']))
                                         data-toggle="modal" data-target="#past-event-notice" @endif
                                         data-event_id="{{$event->id}}">
                                        <div class="title">
                                            <div class="game-thumb">
                                                <img src="{{ asset($event->game_logo) }}">
                                            </div>
                                            <div class="middle">
                                                <div class="game-name">{{ $event->team_left->name }} <span class="vs-word">vs</span> {{ $event->team_right->name }}</div>
                                                <div class="league-name">{{ $event->league_games_name }}</div>
                                            </div>
                                            <div class="title-date">
                                                <div class="game-date">{{ $event->formatted_date.' '. $event->formatted_month }}</div>
                                                <div class="game-time">{{ $event->formatted_time }} WIB</div>
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
                                @elseif(in_array($event->game_id, [2,3]))
                                    <div class="match-card active view-match-info @if($event->type === 'ONGOING' || $event->type === 'UPCOMING') @if($event->type === 'ONGOING') live @endif active @elseif($event->type === 'DONE') past @endif ev-{{ $event->id }} games-{{ $event->game_id }}"
                                         @if(!in_array($event->type, ['UPCOMING', 'ONGOING']))
                                         data-toggle="modal" data-target="#past-event-notice" @endif
                                         data-event_id="{{$event->id}}">
                                        <div class="title">
                                            <div class="game-thumb">
                                                <img src="{{ asset($event->game_logo) }}">
                                            </div>
                                            <div class="middle">
                                                <div class="game-name">{{ $event->name }}</div>
                                                <div class="league-name">{{ $event->league_games_name }}</div>
                                            </div>
                                            <div class="title-date">
                                                <div class="game-date">{{ $event->formatted_date.' '. $event->formatted_month }}</div>
                                                <div class="game-time">{{ $event->formatted_time }} WIB</div>
                                            </div>
                                        </div>
                                        <div class="teams many">
                                            @foreach ($event->teams as $team)
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
                        </div>

                        <style type="text/css">
                            .game-event-select {
                                background: rgb(0 0 0 / .4);
                                border-radius: 20px;
                                cursor: pointer;
                                transition: all 0.1s ease-in-out;
                            }
                            .game-event-select:hover {
                                background: rgb(0 0 0 / .6);
                            }
                            .game-event-select:active {
                                transform: scale(1.05) !important;
                            }
                            .game-event-select .thumb {
                                width: 100%;
                                border-radius: 20px;
                                overflow: hidden;
                            }
                            .game-event-select .thumb img {
                                width: 100%;
                            }
                            .game-event-select .title {
                                font-weight: 800;
                                padding: 12px 20px;
                                position: relative;
                                padding-right: 60px;
                            }
                            .game-event-select .title .icon {
                                height: 22px;
                                width: 22px;
                                position: absolute;
                                right: 20px;
                                opacity: .5;
                                top: 50%;
                                transform: translate(0,-50%);
                            }
                            .match-row {
                                background: rgb(0 0 0 / .2);
                                margin-bottom: 20px;
                                cursor: pointer;
                                border-radius: 20px;
                                font-size: 14px;
                                position: relative;
                                transition: all 0.1s ease-in-out;
                                padding: 12px 20px 12px 75px;
                            }
                            .match-row:hover {
                                background: rgb(0 0 0 / .4);
                            }
                            .match-row:active {
                                transform: scale(1.05) !important;
                            }
                            .match-row .title {
                                font-weight: 800;
                            }
                            .match-row .meta {
                                opacity: .3;
                            }
                            .match-row .left {
                                text-align: center;
                                position: absolute;
                                left: 25px;
                                top: 25px;
                            }
                            .match-row .left .upper {
                                font-family: 'Rajdhani-Bold';
                                font-size: 22px;
                                line-height: 0px;
                                margin-bottom: 8px;
                            }
                            .match-row .left .lower {
                                opacity: .3;
                                font-weight: 800;
                            }
                        </style>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="page-modals">
        <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="past-event-notice">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">
                    @include('includes.mana-ui.modal-top')
                    <div class="modal-about rajdhani-bold font-size-32">
                        Pertandingan sudah selesai
                    </div>
                    <div class="modal-mid font-size-16 o5">
                        Pertandingan ini sudah selesai.
                    </div>
                    <div class="modal-actions d-flex flex-column">
                        <a href="{{route('events')}}" class="mana-btn-54 mana-btn-red scale-onclick">Lihat games upcoming</a>
                        <a href="#" class="mana-btn-54 mana-btn-opaque scale-onclick" data-dismiss="modal">Okay</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.mana-ui.footer')
    @include('includes.mana-ui.modals')

    <style type="text/css">
        /*page specific*/
        .tournament-game-choice {
            position: relative;
        }
        .tournament-game-choice .game-name {
            position: absolute;
            bottom: 0px;
            left: 0px;
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-family: 'Rajdhani-Bold';
            cursor: pointer;
            text-shadow: 1px 1px 15px black;
        }
        .tournament-game-choice.loading .loading-content {
            display: none;
        }
        .tournament-game-choice .loading-content {
            display: block;
        }
        .tournament-game-choice .loading-loader {
            position: absolute;
            bottom: 0px;
            left: 0px;
            height: 100%;
            width: 100%;
            align-items: center;
            justify-content: center;
            display: none;
        }
        .tournament-game-choice.loading .loading-loader {
            display: flex;
        }
        .tournament-game-choice:hover .olay {
            background: rgb(0 0 0 / .2);
        }
        #tournament-game-select .swiper-container {
            width: 100%;
        }
        #tournament-game-select .swiper-slide {
            width: 220px;
            margin-right: 15px;
            opacity: .5;
            transition: all 0.1s ease-in-out;
        }
        #tournament-game-select .swiper-slide:hover {
        }
        #tournament-game-select .swiper-slide.active {
            opacity: 1 !important;
        }

        #isi-pulsa .swiper-container {
            width: 100%;
        }
        #isi-pulsa .swiper-slide {
            width: 110px;
            margin-right: 15px;
        }

        #rumah-tangga .swiper-container {
            width: 100%;
        }
        #rumah-tangga .swiper-slide {
            width: 110px;
            margin-right: 15px;
        }
        .home-welcome-container {
            padding: 40px 20px;
        }
        .shop-gallery-container {
            margin-left: -10px;
            margin-right: -10px;
        }
        .shop-item {
            padding: 15px;
            flex: 0 0 50%;
            align-content: center;
            justify-content: center;
        }

        @media (min-width: 768px) {
            .shop-item {
                padding: 15px;
                flex: 0 0 25%;
                align-content: center;
                justify-content: center;
            }
        }
        .shop-item-inner {
            width: 100%;
            display: flex;
            position: relative;
            flex-direction: column;
            align-content: center;
            justify-content: center;
        }
        .shop-item-thumb {
            border-radius: 15px;
            width: 100%;
        }
        .shop-item-name {
            font-size: 14px;
        }
        margin-top: -2px;
        }
        .section-title-meta-link:hover,
        .section-title-meta-link:active {
            opacity: 1;
        }
    </style>
    <style type="text/css">
        /*media*/

    </style>
@endsection

@section('js')
    <script type="text/javascript">
        var mySwiper = new Swiper('#tournament-game-select .swiper-container', {
            direction: 'horizontal',
            loop: false,
            slidesPerView: 'auto',
        })
    </script>
    <script>

        $(document).ready(function() {

            // page specific scripts
            $('body').on('click', '.tournament-game-choice', function(e) {
                e.preventDefault();

                var loc1 = $(this);
                var loc2 = $('.tournament-game-choice');

                if (!loc1.hasClass('active')) {
                    loc1.addClass('loading');

                    loc2.removeClass('active');
                    loc1.addClass('active');

                    setTimeout(function() {
                        loc1.removeClass('loading');
                    }, 500);
                }
            });


            let wrapperEvent = $('#wrapper-events-list');
            let totalAllEvent = $("#total-all-events");

            $('.tournament-game-choice').on('click', function (e){
                e.preventDefault();
                let game = $(this).data('target');
                setTimeout(function() {
                    if(game === 'mlbb'){
                        wrapperEvent.find('.match-card').removeClass('active');
                        let total = $('body').find('.games-1').length;
                        totalAllEvent.text(total);
                        $('.games-1').addClass('active');
                    }else if(game === 'freefire'){
                        wrapperEvent.find('.match-card').removeClass('active');
                        let total = $('body').find('.games-2').length;
                        totalAllEvent.text(total);
                        $('.games-2').addClass('active');
                    }else if(game === 'pubgm'){
                        wrapperEvent.find('.match-card').removeClass('active');
                        let total = $('body').find('.games-3').length;
                        totalAllEvent.text(total);
                        $('.games-3').addClass('active');
                    }else{
                        wrapperEvent.find('.match-card').addClass('active');
                        let total = $('body').find('.match-card').length;
                        totalAllEvent.text(total);
                    }
                }, 500);
            });

            // match info
            let matchInfo = $('#match-info');
            $('body').on('click', '.view-match-info', function(e) {
                let eventId = $(this).data('event_id');
                matchInfo.find('.tray-game-title, .tray-game-title, .info-event-start-date, .info-event-total-team, .info-event-total-prediksi').text('');
                $.ajax({
                    url : '{{route('events.show.json', ':id')}}'.replace(':id', eventId),
                    type : 'GET'
                }).done(function (response){
                    matchInfo.find('.tray-game-title').text(response.name);
                    matchInfo.find('.tray-game-meta').text(response.league_games_name);
                    matchInfo.find('.info-event-start-date').text(response.formatted_start_date);
                    matchInfo.find('.info-event-total-team').text(response.total_teams);
                    matchInfo.find('.info-event-total-prediksi').text(response.bet_categories_count);
                    matchInfo.find('.event-view-btn').data('event_slug', response.slug);
                    matchInfo.find('.event-view-btn').data('event_type', response.type);
                })
            });

            $('body').on('click', '.event-view-btn', function (e){
                let slug = $(this).data('event_slug');
                let type = $(this).data('event_type');
                if(type === 'DONE'){
                    $(this).removeClass('loading');
                    $('#past-event-notice').modal('show');
                }else{
                    window.location = '{{route('events.detail', ':slug')}}'.replace(":slug", slug);
                }
            });

            setInterval(
                function(){
                    let ids =[];
                    $('body').find('.match-card').each(function (index){
                        let eventId = $(this).data('event_id');
                        ids.push(eventId);
                    });
                    let checkStatus = '{{route('events.check.status')}}?ids='+ids;
                    $.get(checkStatus, function (events){
                        $.each(events,function (index, item){
                            if(item.type === 'ONGOING') {
                                $('body').find('.ev-' + item.id).addClass('live');
                            }else if (item.type === 'DONE'){
                                $('body').find('.ev-' + item.id).addClass('past');
                            }else {
                                $('body').find('.ev-'+item.id).removeClass('live');
                            }
                        })
                    })
                }, 3000
            );
        })
    </script>
@endsection
