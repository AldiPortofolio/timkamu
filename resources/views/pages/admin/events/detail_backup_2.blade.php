@extends('layouts.admin.app')

@section('content')
    <section id="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-0">Event Detail <span class="o3">#{{ $event->id }}</span></h3>
                    </div>
                    <div class="col-6 text-right">
                        <h3 class="mb-0 o5">{{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }} <span class="o5">{{ \Carbon\Carbon::parse($event->start_date)->format('H:i') }}</span></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-section padded-10 mb-20">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-6">
                        <div class="flex-page-filter">
                            <div class="form-group">

                                <button type="button" class="btn btn-sm btn-chat @if($event->enable_chat === '0') btn-success @else btn-danger @endif" data-toggle="modal" @if($event->enable_chat === '0') data-target="#event-confirmation-enable-chat" @else data-target="#event-confirmation-disable-chat" @endif>
                                    @if($event->enable_chat === '0')
                                        Enable chat
                                    @else
                                        Disable chat
                                    @endif
                                </button>
                            </div>
                            <div class="form-group">
                                @if(($event->type === 'UPCOMING' || $event->type === 'DONE'))
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#event-confirmation-go-live">Go live</button>
                                @else
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#event-confirmation-go-live">Unlive</button>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#event-update-modal">Update info</button>
                            </div>
                            <div class="form-group">
                                <a href="{{ url('admin-tkmu/reports/'.$event->id) }}" target="_blank" class="btn btn-sm btn-light">View performance</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="flex-page-filter justify-content-end">
                            <div class="form-group">
                                <button type="button" class="btn btn-sm btn-primary btn-block" data-toggle="modal" @if($event->type !== 'DONE') data-target="#batch-calculate-error" @else data-target="#batch-calculate" @endif>Calculate & Broadcast</button>
                            </div>
                            @if($event->type !== 'DONE')
                                <div class="form-group">
                                    <button type="button" class="btn btn-sm btn-light btn-block" data-toggle="modal" data-target="#event-confirmation-move-to-past">Move to past</button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ url('admin-tkmu/update-score/'.$event->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <p><img src="{{ asset($event->team_left->logo.'-200.png') }}" class="bet-panel-team-thumb">{{ $event->team_left->name }} - <span id="team-left-score">{{ $event->team_left_score }}</span></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="number" class="form-control form-control-sm" name="team_left" id="input_team_left_score" value="{{ $event->team_left_score }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><img src="{{ asset($event->team_right->logo.'-200.png') }}" class="bet-panel-team-thumb">{{ $event->team_right->name }} - <span id="team-right-score">{{ $event->team_right_score }}</span></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="number" class="form-control form-control-sm" name="team_right" id="input_team_right_score" value="{{ $event->team_right_score }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-light btn-block">Update score</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <p>
                                            <span class="o3">Created on</span> <br>
                                            {{ \Carbon\Carbon::parse($event->created_at)->format('d M Y H:i:s') }}
                                        </p>
                                        <p class="mb-0">
                                            <span class="o3">Created by</span> <br>
                                            {{ $event->creates->username }}
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            <span class="o3">Event name</span> <br>
                                            {{ $event->name }}
                                        </p>
                                        <p class="mb-0">
                                            <span class="o3">League</span> <br>
                                            {{ $event->league_games->leagues->name }}
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p class="mb-0">
                                            <span class="o3">Embed</span> <br>
                                            <code>{{ $event->streaming_link }}</code>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-section padded-10 mb-20">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">
                        <div class="flex-page-filter justify-content-end">
                            <div class="form-group">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown">
                                        New Bet Category
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-new-bet-category-winlose">Win Lose</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-new-bet-category-tebak">Tebak Skor</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-new-bet-category-overunder">Over Under</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown">
                                        New Rules
                                    </button>
                                    <div class="dropdown-menu">
                                        @foreach ($event_bet as $value)
                                            @if($value['type'] === '1')
                                                <a class="dropdown-item btn-new-rules" href="#" data-toggle="modal" data-id="{{ $value['id'] }}" data-target="#event-new-bet-rule-winlose">{{ $value['name'] }}</a>
                                            @elseif($value['type'] === '2')
                                                <a class="dropdown-item btn-new-rules" href="#" data-toggle="modal" data-id="{{ $value['id'] }}" data-target="#event-new-bet-rule-overunder">{{ $value['name'] }}</a>
                                            @elseif($value['type'] === '3')
                                                <a class="dropdown-item btn-new-rules" href="#" data-toggle="modal" data-id="{{ $value['id'] }}" data-target="#event-new-bet-rule-tebak">{{ $value['name'] }}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="{{ url('admin-tkmu/report-participants?event='.$event->id) }}" target="_blank" class="btn btn-sm btn-light">
                                    View betters
                                </a>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-sm btn-light has-spinner refresh-bp">
                                    <div class="info-container">Refresh BP data</div>
                                    <div class="spinner-container">
                                        <div class="spinner-border"></div>
                                    </div>
                                </button>
                            </div>
                            <div class="form-group">
                                @if($is_all_lock)
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#event-confirmation-unlock-all">Unlock all categories</button>
                                @else
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#event-confirmation-lock-all">Lock all categories</button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="tab-nav-container">
                            <a href="#" class="tab-vert-item active" data-target="panel-bet-categories">Bet Categories <span class="badge badge-secondary">{{ count($event_bet) }}</span></a>
                            @foreach ($event_bet_categories as $item)
                                <a href="#" class="tab-vert-item" data-target="panel-{{ $item->id }}">{{ $item->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-10">

                        <div class="vert-panel-target panel-bet-categories active">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="btn-group" role="group">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options</a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item btn-sort-bp" href="#">Sort by highest BP</a>
                                                    <a class="dropdown-item btn-sort-order" href="#">Sort by order</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8 text-right">
                                            <div class="table-meta grey text-italic mb-10">Showing all categories for <span class="black">{{ $event->name }}({{ $event->league_games->leagues->name }} - {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }})</span></div>
                                        </div>
                                    </div>

                                    <table class="table table-sm table-bordered table-hover" id="table-bet-categories">
                                        <thead>
                                        <tr>
                                            <th id="order-list">[Order] Rule - Category</th>
                                            <th class="w-10">Tools</th>
                                            <th class="w-10">Bets Placed</th>
                                            <th class="w-10" id="order-bp">BP Placed</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($event_bet as $ebc)
                                            <tr class="@if($ebc['locked'] === '1') table-warning @endif {{$ebc['locked']}}" id="row-{{ $ebc['id'] }}">
                                                <td><span class="o3">[{{ $ebc['order'] }}]</span> {{ $ebc['name'] }} - {{ $ebc['type_name'] }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options</a>
                                                        <div class="dropdown-menu">
                                                            @if(is_string($ebc['locked']))
                                                                <a class="dropdown-item btn-lock" href="#" data-url="{{ route('admin.events.bet-categories.lock', ['id' => $ebc['id']]) }}">@if($ebc['locked'] === '0') Lock @else Unlock @endif</a>
                                                            @endif
                                                            <a class="dropdown-item btn-reorder" href="#" data-toggle="modal" data-target="#event-category-reorder" data-url="{{ route('admin.events.bet-categories.reorder', ['id' => $ebc['id']]) }}">Reorder</a>
                                                            <a class="dropdown-item btn-rename" href="#" data-toggle="modal" data-target="#event-category-rename" data-url="{{ route('admin.events.bet-categories.rename', ['id' => $ebc['id']]) }}">Rename</a>
                                                            <a class="dropdown-item btn-delete" href="#" data-toggle="modal" data-target="#event-category-delete" data-url="{{ route('admin.events.bet-categories.delete', ['id' => $ebc['id']]) }}">Delete/Refund</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right bets">{{ number_format($ebc['bets'], 0, '.', ',') }}</td>
                                                <td class="text-right bp-place">{{ number_format($ebc['bp_place'], 0, '.', ',') }}</td>
                                            </tr>
                                        @endforeach
                                        <tr class="table-warning">
                                            <td colspan="2">Total</td>
                                            <td class="text-right">{{ number_format($total_bet, 0, '.', ',') }}</td>
                                            <td class="text-right" id="total-all-bp-placed">{{ number_format($total_bp_place, 0, '.', ',') }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        @foreach ($event_bet as $item)
                            @if($item['type'] === '1')
                                <div class="vert-panel-target panel-{{ $item['id'] }}">
                                    <div class="row mb-20">
                                        <div class="col-12">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    @if($item['item_active'] != null)
                                                        <form action="{{ route('admin.events.bet-rules.edit', ['id' => $item['item_active']->id]) }}" method="post">
                                                            @else
                                                                <form action="{{ route('admin.events.bet-rules') }}" method="post">
                                                                    @endif
                                                                    @csrf
                                                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                                    <input type="hidden" name="event_bet_category_id" value="{{ $item['id'] }}">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <p><img src="{{ asset($event->team_left->logo.'-200.png') }}" class="bet-panel-team-thumb">{{ $event->team_left->name }}</p>
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <div class="form-group">
                                                                                        <a href="{{ url('admin-tkmu/update-winner-winlose/'.$item['id'].'/left') }}" class="btn btn-sm btn-block @if($item['value'] === $event->team_left_id) btn-success @else btn-light @endif radio-set-winner">@if($item['value'] === $event->team_left_id) Winner @else Set as winner @endif</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="form-group">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-block btn-lock @if($item['item_active'] != null && json_decode($item['item_active']->value_detail)->team_left_locked === '1') btn-warning @else btn-light @endif"
                                                                                                @if($item['item_active'] != null)
                                                                                                data-id="{{ $item['item_active']->id }}"
                                                                                                data-type="team_left"
                                                                                                data-url="{{ route('admin.events.bet-rules.lock', ['id' => $item['item_active']->id]) }}"
                                                                                            @endif>
                                                                                            @if($item['item_active'] != null && json_decode($item['item_active']->value_detail)->team_left_locked === '1') Locked @else Lock @endif
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                @if($item['bp_place'] > 0)
                                                                                    <button type="button" class="btn btn-sm btn-block btn-light" id="row-detail-left-{{ $item['id'] }}" disabled>{{ $item['team_left_total_bets'] }} bets ({{ round($item['team_left_total_bets'] * 100 / $item['bets'], 2) }} %) - {{ number_format((json_decode($item['item_active']->bp_placed)->team_left ?? 0), 0, '.', ',') }} BP ({{ round((json_decode($item['item_active']->bp_placed)->team_left ?? 0) * 100 / $item['bp_place'], 2) }}%)</button>
                                                                                @else
                                                                                    <button type="button" class="btn btn-sm btn-block btn-light" id="row-detail-left-{{ $item['id'] }}" disabled>0 bets (0%) - {{ $item['team_left_total_bp'] }} BP (0%)</button>
                                                                                @endif
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <input type="text" class="form-control form-control-sm" name="value_left" @if($item['item_active'] != null) value="{{ json_decode($item['item_active']->value_detail)->team_left }}%" @endif>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p><img src="{{ asset($event->team_right->logo.'-200.png') }}" class="bet-panel-team-thumb">{{ $event->team_right->name }}</p>
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <div class="form-group">
                                                                                        <a href="{{ url('admin-tkmu/update-winner-winlose/'.$item['id'].'/right') }}" class="btn btn-sm btn-block @if($item['value'] === $event->team_right_id) btn-success @else btn-light @endif radio-set-winner" data-team="right" data-id="{{ $item['id'] }}">@if($item['value'] === $event->team_right_id) Winner @else Set as winner @endif</a>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="form-group">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-block btn-lock @if($item['item_active'] != null && json_decode($item['item_active']->value_detail)->team_right_locked === '1') btn-warning @else btn-light @endif"
                                                                                                @if($item['item_active'] != null)
                                                                                                data-id="{{ $item['item_active']->id }}"
                                                                                                data-type="team_right"
                                                                                                data-url="{{ route('admin.events.bet-rules.lock', ['id' => $item['item_active']->id]) }}"
                                                                                            @endif>
                                                                                            @if($item['item_active'] != null && json_decode($item['item_active']->value_detail)->team_right_locked === '1') Locked @else Lock @endif
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                @if($item['bp_place'] > 0)
                                                                                    <button type="button" class="btn btn-sm btn-block btn-light" id="row-detail-right-{{ $item['id'] }}" disabled>{{ $item['team_right_total_bets'] }} bets ({{ round($item['team_right_total_bets'] * 100 / $item['bets'], 2) }} %) - {{ number_format((json_decode($item['item_active']->bp_placed)->team_right ?? 0), 0, '.', ',') }} BP ({{ round((json_decode($item['item_active']->bp_placed)->team_right ?? 0) * 100 / $item['bp_place'], 2) }}%)</button>
                                                                                @else
                                                                                    <button type="button" class="btn btn-sm btn-block btn-light" id="row-detail-right-{{ $item['id'] }}" disabled>0 bets (0%) - {{ $item['team_right_total_bp'] }} BP (0%)</button>
                                                                                @endif
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <input type="text" class="form-control form-control-sm" name="value_right" @if($item['item_active'] != null) value="{{ json_decode($item['item_active']->value_detail)->team_right }}%" @endif>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-0">
                                                                        <button type="submit" class="btn btn-sm btn-block btn-light">Update</button>
                                                                    </div>
                                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">

                                                </div>
                                                <div class="col-8 text-right">
                                                    <div class="table-meta grey text-italic mb-10">Showing <span class="black">{{ $item['name'] }}</span> for <span class="black">{{ $event->name }}({{ $event->league_games->leagues->name }} - {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }})</span></div>
                                                </div>
                                            </div>
                                            <table class="table table-sm table-bordered table-hover mb-0">
                                                <thead>
                                                <tr>
                                                    <th>[Rule ID] - Status</th>
                                                    <th class="w-10">{{ $event->team_left->name }}</th>
                                                    <th class="w-10">{{ $event->team_right->name }}</th>
                                                    <th class="w-10">Options</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($item['items']->sortByDesc('active')->sortBy('deleted_at') as $itm)
                                                    <tr class="@if($itm->active === '0') table-secondary @elseif(json_decode($itm->value_detail)->team_left_locked === '1' && json_decode($itm->value_detail)->team_right_locked === '1') table-warning @endif">
                                                        <td><span class="o3">[{{ $itm->id }}]</span>@if($itm->deleted_at) Deleted/Refunded @elseif($itm->active === '0') Inactive @else Active @endif</td>
                                                        <td>{{ json_decode($itm->value_detail)->team_left }}%</td>
                                                        <td>{{ json_decode($itm->value_detail)->team_right }}%</td>
                                                        <td>
                                                            @if(!$itm->deleted_at)
                                                                <div class="btn-group" role="group">
                                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options</a>
                                                                    <div class="dropdown-menu">
                                                                        @if($itm->active === '1')
                                                                            <a class="dropdown-item btn-lock" href="#" data-url="{{ route('admin.events.bet-categories.lock', ['id' => $item['id']]) }}">Lock</a>
                                                                        @endif
                                                                        <a class="dropdown-item btn-delete" href="#" data-url="{{ route('admin.events.bet-rules.delete', ['id' => $itm->id]) }}" data-toggle="modal" data-target="#event-rules-delete">Delete/Refund</a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @elseif($item['type'] === '2')
                                <div class="vert-panel-target panel-{{ $item['id'] }}">

                                    <div class="row mb-20">
                                        <div class="col-12">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <p>{{ $item['name'] }}</p>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-sm btn-block btn-light" id="" disabled>Total {{ number_format(($item['under_total_bets'] + $item['above_total_bets'] ), 0, '.', ',') }} bets</button>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-sm btn-block btn-light" id="" disabled>Total {{ number_format($item['bp_place'], 0, '.', ',') }} BP</button>
                                                            </div>
                                                            @if($item['item_active'] != null)
                                                                <form action="{{ route('admin.events.bet-rules.edit', ['id' => $item['item_active']->id]) }}" method="post" id="update-rules-{{ $item['id'] }}">
                                                                    @else
                                                                        <form action="{{ route('admin.events.bet-rules') }}" method="post" id="update-rules-{{ $item['id'] }}">
                                                                            @endif
                                                                            @csrf
                                                                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                                            <input type="hidden" name="event_bet_category_id" value="{{ $item['id'] }}">
                                                                            <input type="hidden" class="form-control form-control-sm" name="value_under" id="input-value-under-{{ $item['id'] }}" value="{{ $item['under'] ?? 0 }}">
                                                                            <input type="hidden" class="form-control form-control-sm" name="value_above" id="input-value-above-{{ $item['id'] }}" value="{{ $item['above'] ?? 0 }}">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control form-control-sm" name="total" value="{{ $item['total'] ?? '' }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="button" class="btn btn-sm btn-block btn-light btn-update-rule" data-id="{{ $item['id'] }}">Update rule & bonus</button>
                                                                            </div>
                                                                        </form>
                                                        </div>

                                                        <div class="col-3">
                                                            <p>Under</p>
                                                            @if($item['bp_place'] > 0)
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-sm btn-block btn-light" id="row-detailbet-under-{{ $item['id'] }}" disabled>{{ $item['under_total_bets'] }} bets ({{ round($item['under_total_bets'] * 100 / $item['bets'], 2) }}%)</button>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-sm btn-block btn-light" id="row-detail-under-{{ $item['id'] }}" disabled>{{ number_format((json_decode($item['item_active']->bp_placed)->under ?? 0), 0, '.', ',') }} BP ({{ round((json_decode($item['item_active']->bp_placed)->under ?? 0) * 100 / $item['bp_place'], 2) }}%)</button>
                                                                </div>
                                                            @else
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-sm btn-block btn-light" id="row-detailbet-under-{{ $item['id'] }}" disabled>0 bets (0%)</button>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-sm btn-block btn-light" id="row-detail-under-{{ $item['id'] }}" disabled>0 bets (0%) - 0 BP (0%)</button>
                                                                </div>
                                                            @endif
                                                            <div class="form-group">
                                                                <input type="text" class="form-control form-control-sm value-under-{{ $item['id'] }}" value="{{ $item['under'] ?? 0 }}%">
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <a href="{{ url('admin-tkmu/update-winner-winlose/'.$item['id'].'/under') }}" class="btn btn-sm btn-block @if($item['value'] === 1) btn-success @else btn-light @endif radio-set-winner" data-team="right" data-id="{{ $item['id'] }}">@if($item['value'] === 1) Winner @else Set as winner @endif</a>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <p>Over</p>
                                                            @if($item['bp_place'] > 0)
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-sm btn-block btn-light" id="row-detailbet-over-{{ $item['id'] }}" disabled>{{ $item['above_total_bets'] }} bets ({{ round($item['above_total_bets'] * 100 / $item['bets'], 2) }}%)</button>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-sm btn-block btn-light" id="row-detail-over-{{ $item['id'] }}" disabled>{{ number_format((json_decode($item['item_active']->bp_placed)->above ?? 0), 0, '.', ',') }} BP ({{ round((json_decode($item['item_active']->bp_placed)->above ?? 0) * 100 / $item['bp_place'], 2) }}%)</button>
                                                                </div>
                                                            @else
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-sm btn-block btn-light" id="row-detail-over-{{ $item['id'] }}" disabled>0 bets (0%)</button>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-sm btn-block btn-light" id="row-detail-over-{{ $item['id'] }}" disabled>0 BP (0%)</button>
                                                                </div>
                                                            @endif
                                                            <div class="form-group">
                                                                <input type="text" class="form-control form-control-sm  value-above-{{ $item['id'] }}" value="{{ $item['above'] ?? 0 }}%">
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <a href="{{ url('admin-tkmu/update-winner-winlose/'.$item['id'].'/above') }}" class="btn btn-sm btn-block @if($item['value'] === 2) btn-success @else btn-light @endif radio-set-winner" data-team="right" data-id="{{ $item['id'] }}">@if($item['value'] === 2) Winner @else Set as winner @endif</a>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <p>Result Value</p>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-sm btn-block btn-light" disabled>For display only</button>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-sm btn-block btn-light" disabled>Affects nothing</button>
                                                            </div>
                                                            <form action="{{ route('admin.events.bet-categories.edit', ['id' => $item['id']]) }}" method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control form-control-sm" name="display" value="{{ $item['display'] }}">
                                                                </div>
                                                                <div class="form-group mb-0">
                                                                    <button type="submit" class="btn btn-sm btn-block btn-light">Update result</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-sm table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th class="w-10">Rule ID</th>
                                                    <th class="w-10">Status</th>
                                                    <th class="w-10">Value</th>
                                                    <th class="w-10">Under</th>
                                                    <th class="w-10">Over</th>
                                                    <th>Tools</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($item['items']->sortByDesc('active')->sortBy('deleted_at') as $itm)
                                                    <tr class="@if($itm->deleted_at || $itm->active === '0') table-secondary @elseif(json_decode($itm->value_detail)->under_locked === '1' && json_decode($itm->value_detail)->above_locked === '1') table-warning @endif">
                                                        <td><span class="o3">[{{ $itm->id}}]</span></td>
                                                        <td>@if($itm->deleted_at) Deleted/Refunded @elseif($itm->active === '0') Inactive @else Active @endif</td>
                                                        <td>{{ json_decode($itm->value_detail)->total }}</td>
                                                        <td>{{ json_decode($itm->value_detail)->under }}%</td>
                                                        <td>{{ json_decode($itm->value_detail)->above }}%</td>
                                                        <td>
                                                            @if(!$itm->deleted_at)
                                                                <div class="btn-group" role="group">
                                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options</a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item btn-lock" href="#" data-url="{{ route('admin.events.bet-rules.lock', ['id' => $itm->id]) }}">Lock all</a>
                                                                        <a class="dropdown-item btn-delete" href="#" data-toggle="modal" data-target="#event-category-delete" data-url="{{ route('admin.events.bet-rules.delete', ['id' => $itm->id]) }}">Delete/Refund</a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            @elseif($item['type'] === '3')
                                <div class="vert-panel-target panel-{{ $item['id'] }}">


                                    <div class="row mb-20">
                                        <div class="col-12 mb-20">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <p>{{ $item['name'] }}</p>
                                                    <div class="form-group mb-0">
                                                        <button type="button" class="btn btn-sm btn-block btn-light" id="row-detail-bonus-{{ $item['id'] }}" disabled>Total {{ number_format($item['bp_place'], 0, '.', ',') }} BP</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($item['items']->sortByDesc('active')->sortBy('deleted_at') as $itm)
                                            <div class="col-4 mb-20">
                                                <div class="card h-100 @if($itm->active === '1') card-tebak-score-active @endif @if(json_decode($itm->value_detail)->bonus_locked === '1' && $itm->active === '1') border-warning @endif">
                                                    <div class="card-body">
                                                        <p>
                                                            <img src="{{ asset($event->team_left->logo.'-200.png') }}" class="bet-panel-team-thumb">{{ $event->team_left->name }} {{ json_decode($itm->value_detail)->team_left }}
                                                            - {{ json_decode($itm->value_detail)->team_right }} {{ $event->team_right->name }} <img src="{{ asset($event->team_right->logo.'-200.png') }}" class="bet-panel-team-thumb right">
                                                            @if(json_decode($itm->value_detail)->bonus_locked === '1' && $itm->active === '1')
                                                                <span class="o3">[locked]</span>
                                                            @elseif($itm->deleted_at)
                                                                <span class="o3">[deleted/refunded]</span>
                                                            @elseif($itm->active === '0')
                                                                <span class="o3">[inactive]</span>
                                                            @else
                                                                <span class="o3"></span>
                                                            @endif
                                                        </p>
                                                        <div class="form-group">
                                                            @if($item['bp_place'] > 0)
                                                                <button type="button" class="btn btn-sm btn-block btn-light" id="card-detail-{{ $itm->id }}" disabled>{{ $itm->bets }} bets ({{ round($itm->bets * 100 / $item['bets'], 2) }} %) - {{ number_format(json_decode($itm->value_detail)->bonus_income, 0, '.', ',') }} BP ({{ round((json_decode($itm->value_detail)->bonus_income * 100 / $item['bp_place']), 2) }} %)</button>
                                                            @else
                                                                <button type="button" class="btn btn-sm btn-block btn-light" id="card-detail-{{ $itm->id }}" disabled>0 bets (0%) - 0 BP (0%)</button>
                                                            @endif
                                                        </div>
                                                        @if($item['item_active'] != null)
                                                            <form action="{{ route('admin.events.bet-rules.edit', ['id' => $item['item_active']->id]) }}" method="post">
                                                                @else
                                                                    <form action="{{ route('admin.events.bet-rules') }}" method="post">
                                                                        @endif
                                                                        @csrf
                                                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                                        <input type="hidden" name="event_bet_category_id" value="{{ $item['id'] }}">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control form-control-sm" name="bonus" value="{{ json_decode($itm->value_detail)->bonus }}%">
                                                                        </div>
                                                                        @if($itm->active === '1')
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-sm btn-block btn-light">Update</button>
                                                                            </div>
                                                                            <div class="form-group mb-0">
                                                                                <div class="btn-group btn-block" role="group">
                                                                                    <a href="#" class="btn btn-sm btn-light btn-block dropdown-toggle" data-toggle="dropdown">Options</a>
                                                                                    <div class="dropdown-menu">
                                                                                        <a class="dropdown-item" href="{{ route('admin.events.bet-rules.lock', ['id' => $itm->id]) }}">@if(json_decode($itm->value_detail)->bonus_locked) Unlock @else Lock @endif</a>
                                                                                        <a class="dropdown-item" href="{{ route('admin.events.bet-categories.lock', ['id' => $item['id']]) }}">@if($item['locked']) Unlock all @else Lock all @endif</a>
                                                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-category-delete">Delete/Refund</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

    </section>

    <section id="page-modals">

        <div class="modal" id="event-new-bet-category-winlose">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create new win lose category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.events.bet-categories') }}" method="post">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <input type="hidden" name="type" value="1">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Category #1</label>
                                <input type="text" name="categories[]" class="form-control form-control-sm first-focus">
                            </div>
                            <div class="form-group">
                                <label>Category #2</label>
                                <input type="text" name="categories[]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label>Category #3</label>
                                <input type="text" name="categories[]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label>Category #4</label>
                                <input type="text" name="categories[]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label>Category #5</label>
                                <input type="text" name="categories[]" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="event-new-bet-category-tebak">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create new tebak score category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.events.bet-categories') }}" method="post">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <input type="hidden" name="type" value="3">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control form-control-sm first-focus" name="name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="event-new-bet-category-overunder">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create new over under category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.events.bet-categories') }}" method="post">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <input type="hidden" name="type" value="2">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Category #1</label>
                                <input type="text" name="categories[]" class="form-control form-control-sm first-focus">
                            </div>
                            <div class="form-group">
                                <label>Category #2</label>
                                <input type="text" name="categories[]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label>Category #3</label>
                                <input type="text" name="categories[]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label>Category #4</label>
                                <input type="text" name="categories[]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label>Category #5</label>
                                <input type="text" name="categories[]" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="event-new-bet-rule-winlose">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create new win lose rule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.events.bet-rules') }}" method="post">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <input type="hidden" name="event_bet_category_id" class="event_bet_category_id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>{{ $event->team_left->name }} (bonus %)</label>
                                <input type="text" class="form-control form-control-sm first-focus"  name="value_left">
                            </div>
                            <div class="form-group">
                                <label>{{ $event->team_right->name }} (bonus %)</label>
                                <input type="text" class="form-control form-control-sm"  name="value_right">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="event-new-bet-rule-tebak">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create new tebak score rule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.events.bet-rules') }}" method="post">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <input type="hidden" name="event_bet_category_id" class="event_bet_category_id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Score {{ $event->team_left->name }}</label>
                                <input type="text" class="form-control form-control-sm first-focus" name="value_left_ts">
                            </div>
                            <div class="form-group">
                                <label>Score {{ $event->team_right->name }}</label>
                                <input type="text" class="form-control form-control-sm" name="value_right_ts">
                            </div>
                            <div class="form-group">
                                <label>Bonus</label>
                                <input type="text" class="form-control form-control-sm" name="bonus">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="event-new-bet-rule-overunder">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create new over under rule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.events.bet-rules') }}" method="post">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <input type="hidden" name="event_bet_category_id" class="event_bet_category_id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Rule</label>
                                <input type="text" class="form-control form-control-sm first-focus" name="total">
                            </div>
                            <div class="form-group">
                                <label>Under</label>
                                <input type="text" class="form-control form-control-sm"  name="value_under">
                            </div>
                            <div class="form-group">
                                <label>Over</label>
                                <input type="text" class="form-control form-control-sm"  name="value_above">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="event-category-reorder">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Reorder category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" method="get">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="number" class="form-control form-control-sm first-focus" name="order">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="event-category-rename">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Rename category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" method="get">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm first-focus" name="name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="event-update-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="event-update-form" action="{{ url('admin-tkmu/events/'.$event->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="patch">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm first-focus" name="name" id="name" placeholder="Event name" value="{{ $event->name }}">
                            </div>
                            <div class="form-group">
                                <input type="datetime-local" class="form-control form-control-sm" name="start_date" id="start_date" value="{{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d') }}T{{ \Carbon\Carbon::parse($event->start_date)->format('H:i') }}">
                            </div>
                            <div class="form-group">
                                <select name="league_game_id" id="league_game_id" class="form-control form-control-sm">
                                    <option @if($event->league_game_id === null) selected @endif disabled>Choose League</option>
                                    @foreach ($league_games as $lg)
                                        <option value="{{ $lg->id }}" @if($lg->id === $event->league_game_id) selected @endif>{{ $lg->leagues->name }} - {{ $lg->games->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="team_left_id" id="team_left_id" class="form-control form-control-sm">
                                    <option @if($event->team_left_id === null) selected @endif disabled>Choose Team Left</option>
                                    @foreach ($teams as $tl)
                                        <option value="{{ $tl->id }}" @if($tl->id === $event->team_left_id) selected @endif>{{ $tl->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="team_right_id" id="team_right_id" class="form-control form-control-sm">
                                    <option @if($event->team_right_id === null) selected @endif disabled>Choose Team Right</option>
                                    @foreach ($teams as $tr)
                                        <option value="{{ $tr->id }}" @if($tr->id === $event->team_right_id) selected @endif>{{ $tr->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="streaming_link" id="streaming_link" class="form-control form-control-sm" rows="3">{{ $event->streaming_link }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="category-value-update">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update bet category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm first-focus" placeholder="Category name" value="Waktu Map #1">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm " placeholder="Category value" value="1522">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-sm btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="event-confirmation-enable-chat">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Enable chat?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want enable chat?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-sm btn-primary btn-action-chat">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="event-confirmation-disable-chat">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Disable chat?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want disable chat?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-sm btn-primary btn-action-chat">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="event-confirmation-go-live">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Go live?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to go live?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="{{ url('admin-tkmu/update-type?event='.$event->id) }}" type="button" class="btn btn-sm btn-primary">Confirm</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="event-confirmation-un-live">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Un live?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to un live?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="{{ url('admin-tkmu/update-type?event='.$event->id) }}" type="button" class="btn btn-sm btn-primary">Confirm</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="event-confirmation-move-to-past">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Move to past?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to move to past?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="{{ url('admin-tkmu/update-type?event='.$event->id.'&type=past') }}" type="button" class="btn btn-sm btn-primary">Confirm</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="event-confirmation-lock-all">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Lock all categories?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('admin-tkmu/events/bet-rules-lock-all/'.$event->id) }}" method="get">
                        @csrf
                        <input type="hidden" name="type" value="lock">
                        <div class="modal-body">
                            <p>Are you sure you want to lock all categories?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="event-confirmation-unlock-all">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Unlock all categories?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('admin-tkmu/events/bet-rules-lock-all/'.$event->id) }}" method="get">
                        @csrf
                        <input type="hidden" name="type" value="unlock">
                        <div class="modal-body">
                            <p>Are you sure you want to unlock all categories?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="event-confirmation-calculate">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Calculate all predictions?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to calculate all predictions?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="{{ url('admin-tkmu/calculating-bet?event='.$event->id) }}" type="button" class="btn btn-sm btn-primary">Confirm</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="event-category-delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete category?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" method="get">
                        @csrf
                        <div class="modal-body">
                            <p>Are you sure you want to delete this category?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="event-rules-delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete rules?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" method="get">
                        @csrf
                        <div class="modal-body">
                            <p>Are you sure you want to delete this rules?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-primary btn-delete-confirm">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="modal-error">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="modal-error-msg"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Okay</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="batch-calculate">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Batch calculations</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Batch size: 100 Users</p>
                        <table class="table table-sm table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>Batch</th>
                                <th class="w-20">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $idx = 0;
                            @endphp
                            @foreach ($done_calculate as $dcx => $dc)
                                <tr @if($dc === 'done')class="table-success"@endif>
                                    <td>{{ $dcx }}</td>
                                    <td><a href="@if($dc === 'done') # @else {{ url('admin-tkmu/calculating-bet?event='.$event->id.'&batch='.$idx) }} @endif">{{ ucwords($dc) }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="batch-calculate-error">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Event is still ongoing, please move it to past first. Then you can proceed calculate & broadcast</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Okay</button>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <style type="text/css">
        /*page specific css*/
        .bet-category-td > a {
            margin-right: 15px;
            opacity: 0.5;
        }
        .tab-vert-item {
            display: block;
            padding: 6px 0;
            opacity: 0.5;
        }
        .tab-vert-item:hover,
        .tab-vert-item.active {
            opacity: 1;
        }
        .vert-panel-target {
            display: none;
        }
        .vert-panel-target.active {
            display: block;
        }
        @media (min-width: 992px) {
            .video-stream-container {
                position: relative;
                /*padding-bottom: 56.25%;*/ /* 16:9 */
                padding-bottom: 45%;
                height: 0;
            }
            .video-stream-container iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        }
    </style>
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            // page specific scripts

            // vert nav btns
            $('body').on('click', '.tab-vert-item', function(e) {
                e.preventDefault();

                obj = $(this);
                obj2 = $('.tab-vert-item');
                obj3 = obj.attr('data-target');
                obj4 = $('.vert-panel-target');
                obj5 = $('.vert-panel-target.'+obj3);

                // do logic
                obj2.removeClass('active');
                obj.addClass('active');
                obj4.removeClass('active');
                obj5.addClass('active');

                console.log(obj3);
            });

            $('body').on('click', '.btn-lock', function(e) {
                e.preventDefault();

                obj = $(this);
                var url = obj.attr('data-url');
                var type = obj.attr('data-type');

                if(type) {
                    url = url+'?type='+type;
                }

                // alert(url);
                location.href = url;

                // $.ajax({
                //     url: url,
                //     method: 'get',
                //     data: {
                //         type: type
                //     },
                //     success: function(result) {
                //         if(result.status === 'success') {
                //             if(type === undefined) {
                //                 var closestTR = obj.closest('tr')
                //                 if (closestTR.hasClass('table-warning')) {
                //                     closestTR.removeClass('table-warning')
                //                     obj.text('Lock')
                //                 } else {
                //                     closestTR.addClass('table-warning')
                //                     obj.text('Unlock')
                //                 }
                //             } else {
                //                 if(obj.hasClass('btn-warning')) {
                //                     obj.removeClass('btn-warning');
                //                     obj.addClass('btn-light');
                //                     obj.text('Lock')
                //                 } else if(obj.hasClass('btn-light')) {
                //                     obj.removeClass('btn-light');
                //                     obj.addClass('btn-warning');
                //                     obj.text('Locked')
                //                 }
                //             }
                //         } else if(result.status === 'error') {
                //             $('#modal-error').modal('show').find('p#modal-error-msg').text(result.message);
                //         }
                //     }
                // })
            })

            $('body').on('click', '.btn-new-rules', function(e) {
                e.preventDefault();

                obj = $(this);
                var target = obj.attr('data-target');
                console.log(target);
                var idCategory = obj.attr('data-id');

                $(target).find('.event_bet_category_id').val(idCategory);
            });

            $('body').on('click', '.btn-action-chat', function(e) {
                e.preventDefault();

                obj = $(this);
                obj2 = obj.closest('div.modal');


                $.ajax({
                    url: "{{ url('admin-tkmu/update-chat/'.$event->id) }}",
                    method: 'get',
                    success: function(result) {
                        if(result.status === 'success') {
                            obj2.modal('hide');

                            if($('.btn-chat').hasClass('btn-danger')){
                                $('.btn-chat').removeClass('btn-danger')
                                $('.btn-chat').addClass('btn-success')
                            } else {
                                $('.btn-chat').addClass('btn-danger')
                                $('.btn-chat').removeClass('btn-success')
                            }
                            if($('.btn-chat').text() === 'Enable chat'){
                                $('.btn-chat').text('Disable chat')
                            } else {
                                $('.btn-chat').text('Enable chat')
                            }
                        }
                    }
                })
            })

            $('body').on('click', '.btn-update-score', function(e) {
                e.preventDefault();

                var teamLeftScore = $('#input_team_left_score');
                var teamRightScore = $('#input_team_right_score');

                $.ajax({
                    url: "{{ url('admin-tkmu/update-score/'.$event->id) }}",
                    method: 'get',
                    data : {
                        team_left : teamLeftScore.val(),
                        team_right: teamRightScore.val()
                    },
                    success: function(result) {
                        if(result.status === 'success') {
                            teamLeftScore.val(result.team_left_score);
                            $('span#team-left-score').text(result.team_left_score);
                            teamRightScore.val(result.team_right_score);
                            $('span#team-right-score').text(result.team_right_score);
                        } else if(result.status === 'error') {
                            $('#modal-error').modal('show').find('p#modal-error-msg').text(result.message);
                        }
                    }
                })
            })

            // $('body').on('click', '.radio-set-winner', function(e) {
            //     e.preventDefault();

            //     obj = $(this);
            //     obj2 = $('.radio-set-winner');

            //     var team = obj.attr('data-team');
            //     var id = obj.attr('data-id');

            //     $.ajax({
            //         url: "{{ url('admin-tkmu/update-winner-winlose') }}/" + id,
            //         method: 'get',
            //         data : {
            //             winner : team
            //         },
            //         success: function(result) {
            //             if(result.status === 'success') {
            //                 obj2.removeClass('btn-success');
            //                 obj2.addClass('btn-light');
            //                 obj2.text('Set as winner');

            //                 obj.removeClass('btn-light');
            //                 obj.addClass('btn-success');
            //                 obj.text('Winner')
            //                 $('#modal-success').modal('show').find('p#modal-success-msg').text(result.message);
            //             } else if(result.status === 'error') {
            //                 $('#modal-error').modal('show').find('p#modal-error-msg').text(result.message);
            //             }
            //         }
            //     })
            // });

            $('body').on('click', '.btn-delete', function(e) {
                e.preventDefault();

                obj = $(this);
                var url = obj.attr('data-url');
                var target = obj.attr('data-target');

                $(target).find('form').attr('action', url);
            })

            $('body').on('click', '.btn-lock-score', function(e) {
                e.preventDefault();

                obj = $(this);
                var element = obj.closest('div.card');
                var url = obj.attr('data-url');

                $.ajax({
                    url: url,
                    method: 'get',
                    success: function(result) {
                        if(result.status === 'success') {
                            if(element.hasClass('border-warning')) {
                                element.removeClass('border-warning');
                                element.find('p span.o3').text('')
                                obj.text('Lock');
                            } else {
                                element.addClass('border-warning');
                                element.find('p span.o3').text('[locked]')
                                obj.text('Unlock');
                            }
                        } else if(result.status === 'error') {
                            $('#modal-error').modal('show').find('p#modal-error-msg').text(result.message);
                        }
                    }
                })
            })

            $('body').on('click', '.btn-lock-all-score', function(e) {
                e.preventDefault();

                obj = $(this);
                var element = $('.card-tebak-score-active');
                var url = obj.attr('data-url');

                $.ajax({
                    url: url,
                    method: 'get',
                    success: function(result) {
                        console.log(result);
                        if(result.status === 'success') {
                            if(result.lock === false) {
                                element.removeClass('border-warning');
                                element.find('p span.o3').text('')
                                obj.text('Lock all');
                            } else {
                                element.addClass('border-warning');
                                element.find('p span.o3').text('[locked]')
                                obj.text('Unlock all');
                            }
                        } else if(result.status === 'error') {
                            $('#modal-error').modal('show').find('p#modal-error-msg').text(result.message);
                        }
                    }
                })
            })

            $('body').on('click', '.btn-reorder', function(e) {
                e.preventDefault();

                obj = $(this);
                var url = obj.attr('data-url');
                var target = obj.attr('data-target');

                $(target).find('form').attr('action', url);
            })

            $('body').on('click', '.btn-rename', function(e) {
                e.preventDefault();

                obj = $(this);
                var url = obj.attr('data-url');
                var target = obj.attr('data-target');

                $(target).find('form').attr('action', url);
            })

            // reload bp data
            $('body').on('click', '.refresh-bp', function () {
                spinnerOnClick($(this),refreshBp,1000);
            });
            function refreshBp(obj){
                var table = $("#table-bet-categories");
                var totalAllBPPlaced = 0;

                $.ajax({
                    url: "{{ url('admin-tkmu/events/bet-categories-reload/'. $event->id) }}",
                    method: 'get',
                    success: function(result) {
                        console.log(result);
                        $.each(result, function(k, v) {
                            var detailItems = v.items;
                            var id = v.id;
                            var bpPlace = v.bp_place;
                            var bets = v.bets;
                            totalAllBPPlaced += v.bp_place;

                            $('#row-'+id).find('.bets').text(bets);
                            $('#row-'+id).find('.bp-place').text(convertToRupiah(bpPlace));

                            if(v.type === '1') {
                                if(v.bp_place) {
                                    var bpPlacedDetail = JSON.parse(v.item_active.bp_placed);
                                    var leftPercent = (parseInt(bpPlacedDetail.team_left) / parseInt(v.bp_place)*100).toFixed(2);
                                    var rightPercent = (parseInt(bpPlacedDetail.team_right) / parseInt(v.bp_place)*100).toFixed(2);

                                    var leftBetPercent = (parseInt(v.team_left_total_bets) / parseInt(v.bets)*100).toFixed(2);
                                    var rightBetPercent = (parseInt(v.team_right_total_bets) / parseInt(v.bets)*100).toFixed(2);

                                    $('#row-detail-left-'+id).text(v.team_left_total_bets+' bets ('+leftBetPercent+'%) - '+(convertToRupiah(bpPlacedDetail.team_left))+' BP ('+leftPercent+'%)')
                                    $('#row-detail-right-'+id).text(v.team_right_total_bets+' bets ('+rightBetPercent+'%) - '+(convertToRupiah(bpPlacedDetail.team_right))+' BP ('+rightPercent+'%)')
                                }
                            } else if(v.type === '2') {
                                if(v.bp_place > 0) {
                                    var bpPlacedDetail = JSON.parse(v.item_active.bp_placed);
                                    var underPercent = (parseInt(bpPlacedDetail.under) / parseInt(v.bp_place)*100).toFixed(2);
                                    var abovePercent = (parseInt(bpPlacedDetail.above) / parseInt(v.bp_place)*100).toFixed(2);

                                    $('#row-detail-under-'+id).text(convertToRupiah(bpPlacedDetail.under)+' BP ('+underPercent+'%)')
                                    $('#row-detail-over-'+id).text(convertToRupiah(bpPlacedDetail.above)+' BP ('+abovePercent+'%)')

                                    var underBetPercent = (parseInt(v.under_total_bets) / parseInt(v.bets)*100).toFixed(2);
                                    var aboveBetPercent = (parseInt(v.above_total_bets) / parseInt(v.bets)*100).toFixed(2);

                                    $('#row-detailbet-under-'+id).text(v.under_total_bets+' bets ('+underBetPercent+'%)')
                                    $('#row-detailbet-over-'+id).text(v.above_total_bets+' bets ('+aboveBetPercent+'%)')
                                }
                            } else if(v.type === '3') {
                                if(v.bonus_total_bp > 0) {
                                    $('#row-detail-bonus-'+id).text('Total '+v.bonus_total_bp+' BP')
                                    $.each(detailItems, function(id, it) {
                                        var detail = JSON.parse(it.value_detail);
                                        var persen = (parseInt(detail.bonus_income) / parseInt(v.bonus_total_bp)*100).toFixed(2)

                                        var persenBets = (parseInt(it.bets) / parseInt(v.bonus_total_bets)*100).toFixed(2)
                                        $('#card-detail-'+it.id).text(it.bets+' bets ('+persenBets+' %) - '+detail.bonus_income+' BP ('+persen+' %)');
                                    })
                                }
                            }
                        })

                        table.find('#total-all-bp-placed').text(convertToRupiah(totalAllBPPlaced));
                    },
                    complete: function (data) {
                        obj.removeClass('loading');
                    }
                })
            }

            $('body').on('click', '.btn-update-rule', function(e) {
                e.preventDefault();

                obj = $(this);
                var id = obj.attr('data-id');
                var under = $('.value-under-'+id).val();
                var above = $('.value-above-'+id).val();

                var form = $('#update-rules-'+id);
                form.find('#input-value-under-'+id).val(under);
                form.find('#input-value-above-'+id).val(above);

                form.submit();
            })
        })


        $('body').on('click', '.btn-sort-bp', function(e) {
            e.preventDefault();

            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("table-bet-categories");
            switching = true;
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare,
                    one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("TD")[3];
                    y = rows[i + 1].getElementsByTagName("TD")[3];

                    xWords = x.innerHTML.replace(/[^0-9]/gi, '');
                    yWords = y.innerHTML.replace(/[^0-9]/gi, '');

                    //check if the two rows should switch place:
                    if (parseInt(xWords, 10) < parseInt(yWords, 10)) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        });

        $('body').on('click', '.btn-sort-order', function(e) {
            e.preventDefault();

            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("table-bet-categories");
            switching = true;
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare,
                    one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("TD")[0];
                    y = rows[i + 1].getElementsByTagName("TD")[0];
                    xWords = x.innerHTML.replace(/[^0-9]/gi, '');
                    yWords = y.innerHTML.replace(/[^0-9]/gi, '');

                    //check if the two rows should switch place:
                    if (parseInt(xWords, 10) > parseInt(yWords, 10)) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        });

    </script>
@endsection
