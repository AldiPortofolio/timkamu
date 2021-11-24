@extends('layouts.app')

@section('body_class', "bg1")
@section('content')

@include('includes.menu')
<div class="root profile-hasil">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="rajdhani-bold font-30 text-uppercase color-white mb-0">My Account</h2>
                <h5 class="color-white opacity-05 font-14 mb-5 game-name">Manage my account</h5>

                <div class="profile-wrapper">
                    
                    @include('includes.profile-left')

                    <div class="right">

                        @foreach($event as $evnt)
                            <div class="tlpx">
                                <a href="{{ url('profile/result/detail/'.$evnt->events->id) }}" class="tyrs">{{ $evnt->events->team_left->name . ' (' . $evnt->events->team_left_score . ') '}} vs {{ $evnt->events->team_right->name . ' (' . $evnt->events->team_right_score . ') '}} - ({{ \Carbon\Carbon::parse($evnt->events->start_date)->format('d F Y H:i')}} WIB)&nbsp;&nbsp;<span class="opacity-05">{{ $evnt->events->league_games->leagues->name }}</span></a>
                                <a href="{{ url('profile/result/detail/'.$evnt->events->id) }}" class="txkls"><i data-feather="arrow-right" class="icon"></i></a>
                            </div>
                        @endforeach
                        
                    </div>
                </div>


            </div>
            
        </div>
    </div>
</div>

<style type="text/css">
    .hasil-table {
        background: rgba(0,0,0,0.4);
    }
    .hasil-table--item {
        padding: 20px 25px 25px 25px;
        line-height: initial;
    }
    .hasil-table--item a {
        color: white;
    }
    .hasil-table--item:nth-child(even) {
        background: rgba(0,0,0,0.2);
    }
    .hasil-table--item-league {
        opacity: 0.5;
        font-style: italic;
    }
</style>

<div class="mobile--profile-hasil">
    
    @include('includes.profile-mobile-head')

    <div class="mobile--profile--area-selector">
        <i data-feather="more-vertical" class="icon"></i>Hasil Pertandingan
    </div>

    <div class="hasil-table">
        @foreach($event as $evnt)
            <div class="hasil-table--item">
                <a href="{{ url('profile/result/detail/'.$evnt->events->id) }}">
                    <div class="hasil-table--item-league">{{ $evnt->events->league_games->leagues->name }}</div>
                    {{ $evnt->events->team_left->name . ' (' . $evnt->events->team_left_score . ') '}} vs {{ $evnt->events->team_right->name . ' (' . $evnt->events->team_right_score . ') '}} - ({{ \Carbon\Carbon::parse($evnt->events->start_date)->format('d F Y H:i')}} WIB)
                </a>
            </div>
        @endforeach
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

    .tlpx {
        background: rgba(0,0,0,0.2);
        display: flex;
    }
    .tlpx a {
        font-size: 12px;
        color: #ffffffdd;
    }
    .tlpx:nth-child(even) {
        background: rgba(0,0,0,0.3);
    }
    a.tyrs {
        flex: 1;
        padding: 10px 20px;
    }
    a.tyrs:hover {
        background: rgba(0,0,0,0.4);
    }
    a.txkls {
        flex: 0 0 60px;
        text-align: center;
        align-items: center;
        justify-content: center;
        display: flex;
        opacity: 0.3;
    }
    a.txkls .icon {
        width: 16px;
        position: relative;
        top: -2px;
        stroke-width: 3px;
    }
    .tlpx:hover a.txkls {
        opacity: 1;
        background: #e91e63;
    }
</style>
<style type="text/css">
    @media (max-width: 992px) {
        .root.profile-hasil {
            display: none;
        }
        .mobile--profile-hasil {
            display: block;
            padding-bottom: 100px;
        }
    }
</style>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        
        mobileProfileSubmenu();

    });
</script>
@endsection