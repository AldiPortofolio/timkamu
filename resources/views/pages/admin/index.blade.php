@extends('layouts.admin.app')

@section('content')
<section id="content">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">

            <div class="row mb-20">
                <div class="col-md-6 mb-20">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="o5 mb-20">Live Events</h6>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ url('admin-tkmu/events') }}" class="o5">View all</a>
                        </div>
                    </div>
                    @if(count($live_events) === 0)
                    <div class="event-card card mb-10">
                        <div class="card-body">
                            <span class="o5"><em>There are no live events currently</em></span>
                        </div>
                    </div>
                    @else
                    @foreach ($live_events as $liveItm)
                        <div class="event-card card mb-10 border-danger">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="upper">
                                            <span class="event-card-id-text">[#{{ $liveItm->id }}]</span> {{ $liveItm->name }} <span class="event-card-live-text">LIVE</span>
                                        </div>
                                        <div class="lower">
                                            <span class="o5">{{ \Carbon\Carbon::parse($liveItm->start_date)->format('d M Y - H:i') }}</span>
{{--                                            <span class="event-card-league-name">- {{ $liveItm->league_games->leagues->name }}</span>--}}
                                            @if($liveItm->odds > 0)<span class="badge badge-success">{{ $liveItm->odds }}</span>@endif
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex align-items-center justify-content-end">
                                        <a href="{{ url('admin-tkmu/reports/'.$liveItm->id) }}" class="btn btn-sm btn-light ml-2" target="_blank">View performance</a>
                                        <a href="{{ url('admin-tkmu/events/'.$liveItm->id) }}" class="btn btn-sm btn-success ml-2">View event</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
                <div class="col-md-6 mb-20">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="o5 mb-20">5 most recent events</h6>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ url('admin-tkmu/events') }}" class="o5">View all</a>
                        </div>
                    </div>
                    <div class="event-card card mb-10">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    @foreach ($recent_events as $recentItm)
                                    <tr>
                                        <td>
                                            <span class="o5">[{{ $recentItm->id }}]</span>
                                            <a href="{{ url('admin-tkmu/events/'.$recentItm->id) }}">{{ $recentItm->name }} - {{ \Carbon\Carbon::parse($recentItm->start_date)->format('d M Y - H:i') }}</a>
                                            @if($recentItm->type === 'UPCOMING')
                                            <span class="badge badge-primary">Upcoming</span>
                                            @elseif($recentItm->type === 'DONE')
                                            <span class="badge badge-secondary">Past</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-20">
                <div class="col-md-4 mb-20">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="o5 mb-20">Members</h6>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ url('admin-tkmu/users') }}" class="o5">All members</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td><a href="#">Total members</a></td>
                                        <td class="text-right">{{ number_format($total_users, 0, '.', ',') }} <span class="o5">(100%)</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Verified by phone</a></td>
                                        <td class="text-right">{{ number_format($total_user_verified, 0, '.', ',') }} <span class="o5">({{ round(($total_user_verified)/$total_users * 100) }}%)</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Registrations today</a></td>
                                        <td class="text-right">{{ number_format($total_user_registered_today, 0, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Registrations this week</a></td>
                                        <td class="text-right">{{ number_format($total_user_registered_week, 0, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Registrations this month</a></td>
                                        <td class="text-right">{{ number_format($total_user_registered_month, 0, '.', ',') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="o5 mb-20">Loyalty Points <span class="o5">(LP)</span></h6>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ url('admin-tkmu/lp-recharge') }}" class="o5">All transactions</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td><strong>Count</strong></td>
                                        <td><strong>Volume</strong></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Recharge today</a></td>
                                        <td class="text-right"> {{ number_format(count($total_recharge_lp_today), 0, '.', ',') }}</td>
                                        <td class="text-right"> {{ number_format($total_recharge_lp_today->sum('total'), 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Recharge last 7 days</td>
                                        <td class="text-right">{{ number_format(count($total_recharge_lp_week), 0, '.', ',') }}</td>
                                        <td class="text-right"> {{ number_format($total_recharge_lp_week->sum('total'), 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Recharge this month</a></td>
                                        <td class="text-right">{{ number_format(count($total_recharge_lp_month), 0, '.', ',') }}</td>
                                        <td class="text-right"> {{ number_format($total_recharge_lp_month->sum('total'), 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Recharge this year</a></td>
                                        <td class="text-right">{{ number_format(count($total_recharge_lp_year), 0, '.', ',') }}</td>
                                        <td class="text-right"> {{ number_format($total_recharge_lp_year->sum('total'), 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Total in all members' account</a></td>
                                        <td></td>
                                        <td class="text-right">{{ number_format($total_recharge_lp, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <h6 class="o5 mb-20">Pending Top Ups</h6>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td><strong>Product</strong></td>
                                        <td><strong>Count</strong></td>
                                        <td><strong>Total</strong></td>
                                    </tr>
                                    @foreach ($total_pending_topup as $itTopup)
                                        <tr>
                                            <td><a href="#">{{ $itTopup['name'] }}</a></td>
                                            <td class="text-right">{{ number_format($itTopup['total'], 0, '.', ',') }}</td>
                                            <td class="text-right">Rp {{ number_format($itTopup['total_income'], 0, '.', ',') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-20">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="o5 mb-20">Active Promos</h6>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ url('admin-tkmu/promos') }}" class="o5">All promos</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td><strong>Promo name</strong></td>
                                        <td><strong>Status</strong></td>
                                        <td><strong>Limit</strong></td>
                                    </tr>
                                    @foreach ($all_promos as $promo)
                                        <tr>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>{{ $promo->title }}</span></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/promos/'.$promo->id) }}">View</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>@if($promo->active)<span class="text-success">Active</span>@else<span class="text-danger">Inactive</span>@endif</td>
                                            <td>{{ $promo->limit }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-20">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="o5 mb-20">Quests</h6>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ url('admin-tkmu/quests') }}" class="o5">All quests</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td><strong>Title</strong></td>
                                        <td><strong>Type</strong></td>
                                        <td><strong>Status</strong></td>
                                        <td><strong>Reward</strong></td>
                                    </tr>
                                    @foreach ($all_quests as $quest)
                                        @php
                                            $valueDetail = json_decode($quest->value_detail);
                                        @endphp
                                        <tr>
                                            <td>{{ $quest->title }}</td>
                                            <td>{{ str_replace('_', ' ', $quest->type )}}</td>

                                            @if($quest->active === '1')
                                            <td>Active</td>
                                            @else
                                            <td><span class="text-danger">Inactive</span></td>
                                            @endif

                                            @if(is_numeric($valueDetail->value))
                                            <td class="text-right">{{ $valueDetail->value }}<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                            @else
                                            <td class="text-right">{{ $valueDetail->value }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-20">
                <div class="col-12 mb-10">
                    <h6 class="o5">Status Toko (Game Top Up)</h6>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">MLBB @if($data_shops->where('alias', 'mlbb')->first()->active === '1')<span class="text-success font-size-14 ml-1">(Open)</span>@else<span class="text-danger font-size-14 ml-1">(Closed)</span>@endif</h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    @foreach ($data_mlbb as $mlbbItm)
                                        <tr>
                                            <td>
                                                @if(strpos($mlbbItm['name'], ' Diamond'))
                                                <span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}">{{ number_format((str_replace(' Diamond', '', $mlbbItm['name'])), 0, '.', ',') }}</span>
                                                @elseif(strpos($mlbbItm['name'], ' UC'))
                                                <span class="money money-14 left"><img src="{{ asset('img/currencies/uc.png') }}">{{ number_format((str_replace(' UC', '', $mlbbItm['name'])), 0, '.', ',') }}</span>
                                                @else
                                                {{ $mlbbItm['name'] }}
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <span class="o5">Rp</span> {{ number_format($mlbbItm['price'], 0, '.', ',') }}
                                            </td>
                                            <td>
                                                @if($mlbbItm['active'] === '0')
                                                <span class="text-danger">Inactive</span>
                                                @else
                                                <span class="text-success">Active</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Freefire @if($data_shops->where('alias', 'freefire')->first()->active === '1')<span class="text-success font-size-14 ml-1">(Open)</span>@else<span class="text-danger font-size-14 ml-1">(Closed)</span>@endif</h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    @foreach ($data_freefire as $freefireItm)
                                        <tr>
                                            <td>
                                                @if(strpos($freefireItm['name'], ' Diamond'))
                                                <span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}">{{ number_format((str_replace(' Diamond', '', $freefireItm['name'])), 0, '.', ',') }}</span>
                                                @else
                                                {{ $freefireItm['name'] }}
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <span class="o5">Rp</span> {{ number_format($freefireItm['price'], 0, '.', ',') }}
                                            </td>
                                            <td>
                                                @if($freefireItm['active'] === '0')
                                                <span class="text-danger">Inactive</span>
                                                @else
                                                <span class="text-success">Active</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">PUBGM @if($data_shops->where('alias', 'pubgm')->first()->active === '1')<span class="text-success font-size-14 ml-1">(Open)</span>@else<span class="text-danger font-size-14 ml-1">(Closed)</span>@endif</h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    @foreach ($data_pubgm as $pubgmItm)
                                        <tr>
                                            <td>
                                                <span class="money money-14 left"><img src="{{ asset('img/currencies/uc.png') }}">{{ number_format((str_replace(' UC', '', $pubgmItm['name'])), 0, '.', ',') }}</span>
                                            </td>
                                            <td class="text-right">
                                                <span class="o5">Rp</span> {{ number_format($pubgmItm['price'], 0, '.', ',') }}
                                            </td>
                                            <td>
                                                @if($pubgmItm['active'] === '0')
                                                <span class="text-danger">Inactive</span>
                                                @else
                                                <span class="text-success">Active</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Valorant @if($data_shops->where('alias', 'valorant')->first()->active === '1')<span class="text-success font-size-14 ml-1">(Open)</span>@else<span class="text-danger font-size-14 ml-1">(Closed)</span>@endif</h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    @foreach ($data_valorant as $valorantItm)
                                        <tr>
                                            <td>
                                                @if(strpos($valorantItm['name'], ' Points'))
                                                <span class="money money-14 left"><img src="{{ asset('img/currencies/valorant-points.svg') }}">{{ number_format((str_replace(' Points', '', $valorantItm['name'])), 0, '.', ',') }}</span>
                                                @else
                                                {{ $valorantItm['name'] }}
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <span class="o5">Rp</span> {{ number_format($valorantItm['price'], 0, '.', ',') }}
                                            </td>
                                            <td>
                                                @if($valorantItm['active'] === '0')
                                                <span class="text-danger">Inactive</span>
                                                @else
                                                <span class="text-success">Active</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Ragnarok @if($data_shops->where('alias', 'ragnarok')->first()->active === '1')<span class="text-success font-size-14 ml-1">(Open)</span>@else<span class="text-danger font-size-14 ml-1">(Closed)</span>@endif</h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    @foreach ($data_ragnarok as $ragnarokItm)
                                        <tr>
                                            <td>
                                                @if(strpos($ragnarokItm['name'], ' BCC'))
                                                <span class="money money-14 left"><img src="{{ asset('img/currencies/bcc.png') }}"></span>{{ number_format((str_replace(' BCC', '', $ragnarokItm['name'])), 0, '.', ',') }}</span>
                                                @else
                                                {{ $ragnarokItm['name'] }}
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <span class="o5">Rp</span> {{ number_format($ragnarokItm['price'], 0, '.', ',') }}
                                            </td>
                                            <td>
                                                @if($ragnarokItm['active'] === '0')
                                                <span class="text-danger">Inactive</span>
                                                @else
                                                <span class="text-success">Active</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-20">
                <div class="col-12 mb-10">
                    <h6 class="o5">Status Toko (Isi Pulsa & PLN)</h6>
                </div>
                @foreach ($data_shops->where('type', '<>', 'game')->where('meta', '<>', 'Coming Soon') as $item)
                @if($item->alias === 'telkomsel')
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Pulsa Telkomsel @if($item->active === '1')<span class="text-success font-size-14 ml-1">(Open)</span>@else<span class="text-danger font-size-14 ml-1">(Closed)</span>@endif</h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    @foreach (collect($data_items)->where('type', $item->alias) as $product)
                                    @php
                                        if(strpos($product['name'], 'Hari')) {
                                            continue;
                                        }
                                    @endphp
                                    <tr>
                                        <td>
                                            <span class="o5">Pulsa</span> {{ $product['name'] }}
                                        </td>
                                        <td class="text-right">
                                            <span class="o5">Rp</span> {{ number_format($product['price'], 0, '.', ',') }}
                                        </td>
                                        <td>
                                            @if($product['active'] === '0')
                                            <span class="text-danger">Inactive</span>
                                            @else
                                            <span class="text-success">Active</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Flash Kuota Telkomsel @if($item->active === '1')<span class="text-success font-size-14 ml-1">(Open)</span>@else<span class="text-danger font-size-14 ml-1">(Closed)</span>@endif</h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    @foreach (collect($data_items)->where('type', $item->alias) as $product)
                                    @php
                                        if(strpos($product['name'], 'IDR ') === 0) {
                                            continue;
                                        }
                                        $explode = explode('Hari', $product['name']);
                                        $days = str_replace(' ', ' Hari', $explode[0]);
                                        $paket = str_replace(' ', '', $explode[1]);
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $paket }} <span class="o5">{{ $days }}</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="o5">Rp</span> {{ number_format($product['price'], 0, '.', ',') }}
                                        </td>
                                        <td>
                                            @if($product['active'] === '0')
                                            <span class="text-danger">Inactive</span>
                                            @else
                                            <span class="text-success">Active</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">{{ $item->name }} @if($item->active === '1')<span class="text-success font-size-14 ml-1">(Open)</span>@else<span class="text-danger font-size-14 ml-1">(Closed)</span>@endif</h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    @foreach (collect($data_items)->where('type', $item->alias) as $product)
                                    @php
                                        $days = '';
                                        $paket = '';
                                        if(strpos($product['name'], 'Hari') && $item->alias === 'telkomsel') {
                                            $explode = explode('Hari', $product['name']);
                                            $days = str_replace(' ', ' Hari', $explode[0]);
                                            $paket = str_replace(' ', '', $explode[1]);
                                        }
                                    @endphp
                                    <tr>
                                        <td>
                                            @if(strpos($product['name'], 'Hari') && $item->alias === 'telkomsel')
                                            {{ $paket }} <span class="o5">{{ $days }}</span>
                                            @elseif(strpos($product['name'], 'IDR ') === 0)
                                            <span class="o5">Pulsa</span> {{ $product['name'] }}
                                            @else
                                                @if($item->alias === 'token')
                                                {{ number_format($product['name'], 0, '.', ',') }}
                                                @else
                                                {{ $product['name'] }}
                                                @endif
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <span class="o5">Rp</span> {{ number_format($product['price'], 0, '.', ',') }}
                                        </td>
                                        <td>
                                            @if($product['active'] === '0')
                                            <span class="text-danger">Inactive</span>
                                            @else
                                            <span class="text-success">Active</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>

</section>

<style type="text/css">
    /*page specific css*/

</style>
@endsection
@section('js')
<script>
    $(document).ready(function() {

        // page specific scripts

    })
</script>
@endsection
