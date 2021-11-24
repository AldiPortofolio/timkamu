@extends('layouts.app')

@section('body_class', "bg1")
@section('content')

@include('includes.menu')
<div class="root profile-hasildetail">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="rajdhani-bold font-30 text-uppercase color-white mb-0">My Account</h2>
                <h5 class="color-white opacity-05 font-14 mb-5 game-name">Manage my account</h5>

                <div class="profile-wrapper">
                    
                    @include('includes.profile-left')

                    <style type="text/css">
                        .hsldb {
                            font-family: 'Nunito Sans';
                            font-weight: 800;
                            font-size: 12px;
                            display: flex;
                        }
                        .hsldb table {
                            flex: 0 0 100%;
                        }
                        .hsldb table td {
                            text-transform: capitalize;
                            font-weight: 400;
                        }
                        .hsldb table .curr {
                            width: 16px;
                            position: relative;
                            top: -1px;
                        }
                        .hsldb table .curr.items {
                            top: -2px;
                        }
                        .hsldb table thead th {
                            border-bottom: 1px solid rgba(255,255,255,0.2);
                            background: rgba(0,0,0,0.1);
                            padding: 10px 20px;
                        }
                        .hsldb table tbody td {
                            padding: 10px 20px;
                            border-bottom: 1px solid rgba(255,255,255,0.1);
                        }
                        .hsldb table tr.result td {
                            background: rgba(0,0,0,0.1);
                            border-bottom: 0px;
                            vertical-align: top;
                        }
                        .hsldb table tr.items td {
                            background: rgba(0,0,0,0.1);
                        }
                        .jdkls {
                            background: rgba(0,0,0,0.4);
                            display: flex;
                        }
                        .jdkls .bck {
                            background: #e91e63;
                            padding: 20px;
                            color: #ffffffdd;
                            font-family: 'Nunito Sans';
                            font-weight: 800;
                            font-size: 12px;
                            text-transform: uppercase;
                        }
                        .jdkls .bck .icon {
                            width: 16px;
                            position: relative;
                            top: -2px;
                            stroke-width: 3px;
                        }
                        .jdkls .bck:hover {
                            background: #ff0057;
                            color: #fff;
                        }
                        .nwcls .ctagp:hover {
                        }
                        .jdkls .inf {
                            flex: 1;
                            padding: 20px;
                        }
                    </style>

                    <div class="right">

                        <div class="jdkls">
                            <a href="{{ url('profile/result') }}" class="bck">
                                <i data-feather="arrow-up-left" class="icon"></i> back
                            </a>
                            <div class="inf">
                                {{ $event->team_left->name . ' (' . $event->team_left_score . ') '}} vs {{ $event->team_right->name . ' (' . $event->team_right_score . ') '}} - ({{ \Carbon\Carbon::parse($event->start_date)->format('d F Y H:i')}} WIB)&nbsp;&nbsp;<span class="opacity-05">{{ $event->league_games->leagues->name }}</span>
                            </div>
                        </div>

                        <div class="hsldb">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Team</th>
                                        <th>Nilai Dukungan</th>
                                        <th>Bonus</th>
                                        <th>Menang</th>
                                        <th>Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($event->type === 'DONE')
                                        @if($event_transaction->team_left > 0)
                                        <tr>
                                            <td>{{ $event->team_left->name}}</td>
                                            <td>{{ $event_transaction->team_left }} <img src="{{ asset('img/currencies/bp.svg') }}" class="curr"></td>
                                            <td>30%</td>
                                            <td>{{ $event->team_left_score > $event->team_right_score ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $event->team_left_score > $event->team_right_score ? '+'.number_format(($event_transaction->team_left * 130/100), 0, '.', ',') : '-'.number_format($event_transaction->team_left, 0, '.', ',') }}<img src="{{ asset('img/currencies/bp.svg') }}" class="curr"></td>
                                        </tr>
                                        @endif
                                        @if($event_transaction->team_right > 0)
                                        <tr>
                                            <td>{{ $event->team_right->name}}</td>
                                            <td>{{ $event_transaction->team_right }} <img src="{{ asset('img/currencies/bp.svg') }}" class="curr"></td>
                                            <td>30%</td>
                                            <td>{{ $event->team_left_score < $event->team_right_score ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $event->team_left_score < $event->team_right_score ? '+'.number_format(($event_transaction->team_right * 130/100), 0, '.', ',') : '-'.number_format($event_transaction->team_right, 0, '.', ',') }}<img src="{{ asset('img/currencies/bp.svg') }}" class="curr"></td>
                                        </tr>
                                        @endif
                                        <tr class="result">
                                            <td>Total BP keluar</td>
                                            <td>{{ number_format($event_transaction->team_left + $event_transaction->team_right, 0, '.', ',') }} <img src="{{ asset('img/currencies/bp.svg') }}" class="curr"></td>
                                            <td></td>
                                            <td>
                                                Total hasil BP <br>
                                                Clan Items
                                            </td>
                                            <td>
                                                @if($event->team_left_score > $event->team_right_score)
                                                    {{ '+'.number_format(($event_transaction->team_left * 130/100), 0, '.', ',')}}
                                                @else
                                                    {{ '+'.number_format(($event_transaction->team_right * 130/100), 0, '.', ',')}}
                                                @endif <img src="{{ asset('img/currencies/bp.svg') }}" class="curr"> <br>

                                                @if($event->team_left_score > $event->team_right_score)
                                                    {{ '+'.number_format(($event_transaction->team_right), 0, '.', ',')}}
                                                @else
                                                    {{ '+'.number_format(($event_transaction->team_left), 0, '.', ',')}}
                                                @endif
                                                <img src="{{ asset('img/items/items-01.png') }}" alt="Apel Potong" class="curr items">
                                            </td>
                                        </tr>
                                    @else
                                        @if($event_transaction->team_left > 0)
                                        <tr>
                                            <td>{{ $event->team_left->name}}</td>
                                            <td>{{ $event_transaction->team_left }} <img src="{{ asset('img/currencies/bp.svg') }}" class="curr"></td>
                                            <td>30%</td>
                                            <td>N/A</td>
                                            <td>N/a</td>
                                            {{-- <img src="{{ asset('img/currencies/bp.svg') }}" class="curr"> --}}
                                        </tr>
                                        @endif
                                        @if($event_transaction->team_right > 0)
                                        <tr>
                                            <td>{{ $event->team_right->name}}</td>
                                            <td>{{ $event_transaction->team_right }} <img src="{{ asset('img/currencies/bp.svg') }}" class="curr"></td>
                                            <td>30%</td>
                                            <td>N/A</td>
                                            <td>N/A</td>
                                        </tr>
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>


            </div>
            
        </div>
    </div>
</div>

<style type="text/css">
    .hasildetail-table {
        background: rgba(0,0,0,0.4);
    }
    .hasildetail-table-head {
        background: rgba(0,0,0,0.4);
        padding: 25px;
        font-family: 'Nunito Sans';
    }
    .hasildetail-table-item {
        padding: 25px;
        display: flex;
    }
    .hasildetail-table-item .left,
    .hasildetail-table-item .right {
        flex: 1 1 50%;
    }
    .hasildetail-table-item .right {
        display: flex;
        align-items: center;
        text-align: right;
    }
    .hasildetail-table-item:nth-child(even) {
        background: rgba(0,0,0,0.2);
    }
    .hasildetail-table-item .icon {
        width: 16px;
        position: relative;
        top: -2px;
        margin-right: 5px;
    }
    .hasildetail-table-item.results {
        background: rgba(0,0,0,0.4);
    }
    .hasildetail-table-item.results .right {
        align-items: baseline;
        flex-flow: column;
    }
    .hasildetail-table-item .info-box {
        margin-bottom: 20px;
    }
    .hasildetail-table-item .icon.clan-items {
        margin-left: 5px;
    }
</style>

<div class="mobile--profile-hasildetail">
    
    @include('includes.profile-mobile-head')

    <div class="mobile--profile--area-selector">
        <i data-feather="more-vertical" class="icon"></i>Hasil Pertandingan
    </div>

    <a href="{{ url('profile/result') }}">
        <div class="mobile--profile--area-back">
            <i data-feather="arrow-up-left" class="icon"></i>Back
        </div>
    </a>

    <div class="hasildetail-table">
        <div class="hasildetail-table-head">
            EVOS (3) vs RRQ (2) - (20 July 2020 20.30 WIB)
        </div>
        <div class="hasildetail-table-item">
            <div class="left">
                ONIC Esports
                <br>
                <img src="{{ asset('img/currencies/bp.svg') }}" class="icon"> 400
                <br>
                30%
                <br>
                Menang
            </div>
            <div class="right">
                <div class="w100">
                    <img src="{{ asset('img/currencies/bp.svg') }}" class="icon"> +520
                </div>
            </div>
        </div>
        <div class="hasildetail-table-item">
            <div class="left">
                EVOS
                <br>
                <img src="{{ asset('img/currencies/bp.svg') }}" class="icon"> 200
                <br>
                30%
                <br>
                Kalah
            </div>
            <div class="right">
                <div class="w100">
                    <img src="{{ asset('img/currencies/bp.svg') }}" class="icon"> -200
                </div>
            </div>
        </div>
        <div class="hasildetail-table-item results">
            <div class="left">
                <div class="info-box">
                    Total BP Keluar
                </div>
                <div class="info-box">
                    Total BP yang didapat
                </div>
                <div class="info-box">
                    Clan items
                </div>
            </div>
            <div class="right">
                <div class="info-box w100">
                    <img src="{{ asset('img/currencies/bp.svg') }}" class="icon"> 600
                </div>
                <div class="info-box w100">
                    <img src="{{ asset('img/currencies/bp.svg') }}" class="icon"> 320
                </div>
                <div class="info-box w100">
                    +1 <img src="img/items/items-07.png" class="icon clan-items"> <br>
                    +1 <img src="img/items/items-02.png" class="icon clan-items"> <br>
                    +10 <img src="img/items/items-01.png" class="icon clan-items"> <br>
                </div>
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
    
    
</style>
<style type="text/css">
    @media (max-width: 992px) {
        .root.profile-hasildetail {
            display: none;
        }
        .mobile--profile-hasildetail {
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