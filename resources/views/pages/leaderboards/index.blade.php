@extends('layouts.app')

@section('body_class', "bg1")
@section('content')

@include('includes.menu')

<div class="root leaderboards">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="hide--992 rajdhani-bold font-30 text-uppercase color-white mb-0">Leaderboards</h2>
                <h5 class="hide--992 color-white opacity-05 font-14 mb-5 game-name">Urutan leaderboard</h5>

                <div class="wrapper">

                    <div class="board">
                        <div class="head coins">
                            Most Loyal Members <i data-feather="info" class="icon" data-toggle="tooltip" data-placement="top" title="Total lifetime LP spending"></i>
                        </div>
                        <!-- <div class="control">
                            <div class="side active" data-target="today">
                                Today
                            </div>
                            <div class="side" data-target="week">
                                Past 7 days
                            </div>
                        </div> -->
                        <div class="body posrel">
                            <div class="pane today active">
                                @foreach ($most_loyal_members_today as $idx => $item)
                                    <div class="item posrel">
                                        <span class="index">{{ $idx + 1 }}</span>
                                        <div class="propic"></div>
                                        <p>{{ $item->users->name }}</p>
                                        <div class="wealth"><span>{{ number_format($item->total_value, 0, '.', ',') }}</span> <img src="{{ asset('img/currencies/lp.svg') }}" class="curr-icon"></div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pane week">
                                @foreach ($most_loyal_members_pastsevendays as $idx => $item)
                                    <div class="item posrel">
                                        <span class="index">{{ $idx + 1 }}</span>
                                        <div class="propic user"></div>
                                        <p>{{ $item->users->name }}</p>
                                        <div class="wealth"><span>{{ number_format($item->total_value, 0, '.', ',') }}</span> <img src="{{ asset('img/currencies/lp.svg') }}" class="curr-icon"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="board">
                        <div class="head bp">
                            Members With Most BP <i data-feather="info" class="icon" data-toggle="tooltip" data-placement="top" title="Total lifetime BP spending"></i>
                        </div>
                        <!-- <div class="control">
                            <div class="side active" data-target="today">
                                Today
                            </div>
                            <div class="side" data-target="week">
                                Past 7 days
                            </div>
                        </div> -->
                        <div class="body posrel">
                            <div class="pane today active">
                                <?php for ($i=1; $i < 11; $i++): ?>
                                    <div class="item posrel">
                                        <span class="index"><?php echo $i; ?></span>
                                        <div class="propic user"></div>
                                        <p>Michel Doe</p>
                                        <div class="wealth"><span>2,520</span> <img src="{{ asset('img/currencies/bp.svg') }}" class="curr-icon"></div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <div class="pane week">
                                <?php for ($i=1; $i < 11; $i++): ?>
                                    <div class="item posrel">
                                        <span class="index"><?php echo $i; ?></span>
                                        <div class="propic user"></div>
                                        <p>John Doe</p>
                                        <div class="wealth"><span>12,520</span> <img src="{{ asset('img/currencies/bp.svg') }}" class="curr-icon"></div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>

                    <div class="board">
                        <div class="head team">
                            Teams With Most LP <i data-feather="info" class="icon" data-toggle="tooltip" data-placement="top" title="Total donations to the team in terms of LP value"></i>
                        </div>
                        <!-- <div class="control">
                            <div class="side active" data-target="today">
                                Today
                            </div>
                            <div class="side" data-target="week">
                                Past 7 days
                            </div>
                        </div> -->
                        <div class="body posrel">
                            <div class="pane today active">
                                @foreach ($most_lp_teams_today as $idx => $item)
                                    <div class="item posrel">
                                        <span class="index">{{ $idx + 1 }}</span>
                                        <div class="team"><img src="{{ asset($item->teams->logo.'-50.png') }}"></div>
                                        <p>{{ $item->teams->name }}</p>
                                        <div class="wealth"><span>{{ number_format($item->total_value, 0, '.', ',') }}</span> <img src="{{ asset('img/currencies/lp.svg') }}" class="curr-icon"></div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pane week">
                                @foreach ($most_lp_teams_pastsevendays as $idx => $item)
                                    <div class="item posrel">
                                        <span class="index">{{ $idx + 1 }}</span>
                                        <div class="team"><img src="{{ asset($item->teams->logo.'-50.png') }}"></div>
                                        <p>{{ $item->teams->name }}</p>
                                        <div class="wealth"><span>{{ number_format($item->total_value, 0, '.', ',') }}</span> <img src="{{ asset('img/currencies/lp.svg') }}" class="curr-icon"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
</div>

<style type="text/css">
    body.bg1 {
        background-image: url(img/f1a.jpg);
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    .root {
        padding-top: 100px;
    }

    .wrapper {
        display: flex;
    }
    .board {
        background: rgba(0,0,0,0.4);
        flex: 1 1 33.33%;
        border-right: 1px solid rgba(255,255,255,0.1);
        margin-bottom: 200px;
    }
    .board:last-child {
        border-right: 0px;
    }
    .head {
        line-height: 50px;
        color: white;
        padding: 20px;
        font-size: 18px;
        font-weight: 800;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        font-family:'Nunito Sans';
    }
    .head.coins {
        background-image: url(https://www.nimo.tv/nms/images/top-bg-anchor-gift.70847cc11b69ef5ec5082a42d4aa751b.png);
    }
    .head.lp {
        background-image: url(https://www.nimo.tv/nms/images/top-bg-new-anchor.d0cb1361a3b5ea84e6ca4ec203b46d08.png);
    }
    .head.bp {
        background-image: url(https://www.nimo.tv/nms/images/top-bg-rich.f9c10a5f681c509a4512f66039aef31e.png);
    }
    .head.team {
        background-image: url("{{ asset('img/leaderboard/3.jpg') }}");
    }
    .control {
        display: flex;
    }
    .control .side {
        width: 50%;
        text-align: center;
        padding: 10px;
        color: white;
        cursor: pointer;
        background: rgba(0,0,0,0.2);
        opacity: 0.9;
        font-size: 12px;
        text-transform: uppercase;
    }
    .control .side:hover ,
    .control .side.active {
        /*background: rgba(255,0,87,0.8);*/
        background: rgba(0,0,0,0.4);
    }
    .board .body {
        color: white;
    }
    .board .body .pane {
        display: none;
        width: 100%;
        transition: all 0.1s ease-in-out;
        pointer-events: none;
    }
    .board .body .pane .item:nth-child(even) {
        background: rgba(0,0,0,0.2);
    }
    .board .body .pane .item:nth-child(1) {
        background: linear-gradient(45deg, #FFC107dd, #ff8100);
    }
    .board .body .pane .item:nth-child(2) {
        background: linear-gradient(45deg, #ded4b5, #00dcffba);
    }
    .board .body .pane .item:nth-child(3) {
        background: linear-gradient(45deg, #bb5316, #ff9887ba);
    }
    .board .body .pane.active {
        display: block;
        pointer-events: auto;
    }
    .pane .item {
        padding: 15px 25px 15px 60px;
    }
    .pane .item span.index {
        font-size: 20px;
        font-family: 'Rajdhani-Bold';
        opacity: 0.5;
        position: absolute;
        left: 30px;
        top: 15px;
        text-align: center;
    }
    .pane .item .propic {
        width: 24px;
        height: 24px;
        background-image: url("{{ asset('img/propic.jpg') }}");
        background-size: cover;
        background-position: center;
        float: left;
        border-radius: 50px;
        position: relative;
        top: 1px;
        margin-right: 10px;
    }
    .pane .item .team img {
        width: 24px;
        height: 24px;
        float: left;
        position: relative;
        top: 1px;
        margin-right: 10px;
    }
    .pane .item .propic.user {
        background-image: url("{{ asset('img/profile1.jpg') }}");
    }
    .pane .item .wealth {
        position: absolute;
        right: 30px;
        top: 15px;
        font-size: 12px;
    }
    .pane .item .wealth .curr-icon {
        width: 18px;
        position: relative;
        top: -1px;
    }
    .pane .item .wealth span {
        opacity: 0.7;
    }
    .pane .item p {
        margin: 0;
        padding: 0;
    }
    .head .icon {
        width: 15px;
        position: relative;
        top: -1px;
        opacity: 0.5;
        cursor: pointer;
    }
</style>
<style type="text/css">
    @media (max-width: 992px) {
        .hide--992 {
            display: none;
        }
        .root.leaderboards .wrapper {
            flex-wrap: wrap;
        }
        .root.leaderboards .board {
            flex: 1 1 100%;
            margin-bottom: 50px;
        }
    }
</style>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {

        $('.control .side').on('click', function(event) {

            event.preventDefault();

            var target = $(this).attr('data-target');

            $(this).parents('.board').find('.side, .pane').removeClass('active');

            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
                $(this).parents('.board').find('.'+target).addClass('active');
            }
        });

    });
</script>
@endsection