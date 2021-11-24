@extends('layouts.app')

@section('body_class', 'bg1')
@section('content')
@include('includes.menu')
@include('includes.teams.'.$alias.'.mobile')

<div class="tmb1 root">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <style type="text/css">
                    
                </style>

                <div class="team-tray">
                    <div class="left">


                        <style type="text/css">
                            .teams-detail-join {
                                position: absolute;
                                bottom: 30px;
                                left: 0;
                                width: 100%;
                                font-family: 'Nunito Sans';
                                font-weight: 800;
                                font-size: 12px;
                                display: flex;
                                align-content: center;
                                justify-content: center;
                            }
                            .teams-detail-join span {
                                padding: 4px 24px 5px 24px;
                                border-radius: 50px;
                                background: #ff0057;
                                cursor: pointer;
                            }
                            .teams-detail-join span:hover {
                                background: #e91e63;
                            }
                            .teams-detail-join span .icon {
                                width: 14px;
                                position: relative;
                                top: -1px;
                                margin-right: 6px;
                                stroke-width: 3px;
                                opacity: 0.7;
                            }
                        </style>
                        
                        <div class="tmw-logo">
                            <img src="{{ asset('img/team-logos/onic.png') }}">
                            <div class="rajdhani-bold font-30 text-uppercase">ONIC Esports</div>
                            <div class="teams-detail-join">
                                <span data-toggle="modal" data-target="#join-team-confirm"><i data-feather="heart" class="icon"></i>Menjadi Fans ONIC</span>
                            </div>
                        </div>

                        

                        <div class="links">
                            <div class="title">Current Sponsors</div>
                            <div class="inner">
                                <div class="sponsor"><img src="{{ asset('img/sponsors/sponsors-01.png') }}"></div>
                                <div class="sponsor"><img src="{{ asset('img/sponsors/sponsors-02.png') }}"></div>
                                <div class="sponsor"><img src="{{ asset('img/sponsors/sponsors-03.png') }}"></div>
                                <div class="sponsor"><img src="{{ asset('img/sponsors/sponsors-04.png') }}"></div>
                                <div class="sponsor"><img src="{{ asset('img/sponsors/sponsors-05.png') }}"></div>
                            </div>
                        </div>

                        <div class="links">
                            <div class="title">External Links</div>
                            <div class="inner">
                                <a href="#" traget="_blank">Youtube</a>
                                <a href="#" traget="_blank">Facebook</a>
                                <a href="#" traget="_blank">Instagram</a>
                                <a href="#" traget="_blank">Tokopedia</a>
                            </div>
                        </div>

                        <a href="{{ url('teams') }}" class="back"><i data-feather="arrow-up-left" class="icon"></i>Team list</a>
                    </div>

                    <div class="right">

                        <div class="upper">
                            <div class="info-item">
                                <div class="inside">
                                    <h5>Founded</h5>
                                    <p>2018-07-26</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="inside">
                                    <h5>Highest Achievement</h5>
                                    <p>1st Winner MPL Season 6</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="inside">
                                    <h5>Total Timkamu Fans</h5>
                                    <p>47,904</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="inside">
                                    <h5>Total Incoming Support</h5>
                                    <p>22,240 <img src="{{ asset('img/currencies/lp.svg') }}" class="curr-icon"></p>
                                </div>
                            </div>
                        </div>

                        @include('includes.teams.'.$alias.'.gifts')

                        <div class="team-tabs">
                            <div class="item active" data-target="video">
                                Team Profile
                            </div>
                            <div class="item" data-target="members">
                                Team Members
                            </div>
                            <div class="item" data-target="supporters">
                                Supporters
                            </div>
                            <div class="item" data-target="merchandise">
                                Store
                            </div>
                            <div class="item" data-target="photos">
                                Photo Gallery
                            </div>
                        </div>


                        <div class="posrel">
                            @include('includes.teams.'.$alias.'.video')
                            @include('includes.teams.'.$alias.'.members')
                            @include('includes.teams.'.$alias.'.merch')
                            @include('includes.teams.'.$alias.'.supporters')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="join-team-confirm" class="modal metro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h3 class="colored">Menjadi Fans</h3>
            <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
            <div class="modal-body posrel">
                <div class="message">
                    <p>Yakin mau bergabung dengan ONIC Esports?</p>
                </div>
            </div>
            <div class="nwcls">
                <a href="#" data-dismiss="modal" class="ctagp" data-toggle="modal" data-target="#spinner">Confirm</a>
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

    .team-tray {
        background: rgba(0,0,0,0.2);
        display: flex;
        margin-bottom: 200px;
    }
    .team-tray .left {
        flex: 0 0 250px;
    }
    .team-tray .right {
        width: 100%;
    }
    .tmw-logo {
        padding: 50px 30px 100px 30px;
        text-align: center;
        background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url("{{ ('img/t.jpg') }}");
        background-size: cover;
        background-position: center;
        position: relative;
    }
    .tmw-logo img {
        width: 80%;
    }
    .links .title {
        height: 50px;
        background: rgba(0,0,0,0.4);
        line-height: 50px;
        font-family: 'Nunito Sans';
        font-weight: 800;
        font-size: 12px;
        padding: 0 30px;
        text-align: center;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .team-tray .left .back {
        height: 50px;
        background: rgba(0,0,0,0.4);
        line-height: 50px;
        font-family: 'Nunito Sans';
        font-weight: 800;
        font-size: 12px;
        padding: 0 30px;
        text-align: center;
        display: block;
        border-bottom: 1px solid rgba(255,255,255,0.1);
        color: white;
    }
    .team-tray .left .back:hover {
        background: #ff0057;
    }
    .team-tray .left .back .icon {
        width: 16px;
        position: relative;
        top: -1px;
        margin-right: 6px;
    }
    .links .inner {
        display: flex;
        flex-wrap: wrap;
    }
    .links a {
        flex: 0 0 50%;
        line-height: 70px;
        padding: 0 30px;
        display: block;
        border-right: 1px solid rgba(255,255,255,0.1);
        border-bottom: 1px solid rgba(255,255,255,0.1);
        color: white;
        font-size: 12px;
        text-align: center;
    }
    .links a:hover {
        background: rgba(0,0,0,0.4);
    }
    .sponsor {
        flex: 0 0 50%;
        text-align: center;
        padding: 0 30px;
        line-height: 70px;
        background: #ffffffdd;
        border-right: 1px solid rgba(0,0,0,0.1);
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }
    .sponsor:hover {
        background: #fff;
    }
    .sponsor img {
        width: 100%;
        transition: all 0.1s ease-in;
    }
    .sponsor:hover img {
        transform: scale(1.2);
    }
    .right .upper {
        display: flex;
    }
    .right .upper .info-item {
        flex: 0 0 25%;
        height: 100px;
        border-right: 1px solid rgba(255,255,255,0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 20px;
    }
    .right .upper .info-item h5 {
        font-size: 10px;
        opacity: 0.5;
        color: white;
        text-transform: uppercase;
        line-height: initial;
        margin: 0;
    }
    .right .upper .info-item p {
        font-size: 14px;
        margin: 0;
    }
    .right .upper .info-item .curr-icon {
        width: 16px;
        position: relative;
        top: -2px;
    }
    .team-tabs {
        display: flex;
    }
    .team-tabs .item {
        flex: 0 0 20%;
        background: rgba(0,0,0,0.4);
        line-height: 60px;
        text-align: center;
        border-right: 1px solid rgba(255,255,255,0.1);
        cursor: pointer;
        transition: all 0.1s ease-in;
        font-family: 'Nunito Sans';
        font-weight: 800;
        font-size: 12px;
    }
    .team-tabs .item.active,
    .team-tabs .item:hover {
        border-right: 1px solid rgba(255,255,255,0.1);
        background: #ff0057;
    }
    .tmw-pane {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
    }
    .tmw-pane.active {
        display: block;
        position: relative;
    }
</style>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {

        $(".team-tabs .item").on('click', function(event) {

            event.preventDefault();

            var paneTarget = $(this).attr('data-target');

            $('.team-tabs .item, .tmw-pane').removeClass('active');
            
            $('.'+paneTarget).addClass('active');
            $(this).addClass('active');
        });

        $(document).on('click', ".video-list .item", function() {

            var vidTarget = $(this).attr('data-target');

            $('.video-list .item').removeClass('active');
            $(this).addClass('active');

            $('.vid-wrapper .item').removeClass('active');
            $('.'+vidTarget).addClass('active');
            for(var i = 0; i < 5; i++){
                $('iframe')[i].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
            }
        });

        $(document).on('click', ".opk .item", function() {

            var vidTarget = $(this).attr('data-target');

            $('.opk .item, .ijk').removeClass('active');
            $(this).addClass('active');
            $('.'+vidTarget).addClass('active');
        });

        $(document).on('click', ".mtm-expand", function() {

            $('.mtm-sections').removeClass('active');

            if ($(this).hasClass('active')){
                $(this).removeClass('active');
                $('.mtm-sections').removeClass('active');
            } else {
                $(this).addClass('active');
                $('.mtm-sections').addClass('active');
            }
        });

        $(document).on('click', ".mtm-sections a", function(event) {

            event.preventDefault();

            var sectionTarget = $(this).attr('data-target');

            $('.mtm-sections, .mtm-expand, .mtm-sections a, .sca').removeClass('active');
            $(this).addClass('active');
            $('.'+sectionTarget).addClass('active');
        });

    });
</script>
@endsection