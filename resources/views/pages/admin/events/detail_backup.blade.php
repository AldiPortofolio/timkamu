@extends('layouts.admin.app')

@section('content')
<style>
    .bet-category {
        display: none;
    }

    .bet-category.active {
        display: block;
    }

    select {
        width: 100%;
    }

    button.btn-action {
        display: none;
    }
    button.btn-action.active {
        display: inline-flex;
    }

    .value-preview, .value-input {
        display: none;
    }
    .value-preview.active, .value-input.active {
        display: block;
    }

    .data-event-preview, .data-event-input {
        display: none;
    }
    .data-event-preview.active, .data-event-input.active {
        display: inline-flex;
    }
</style>
<div class="container-fluid">
    @if($event->league_games->game_id === 1)
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="@if($event->type !== 'DONE') col-lg-5 @else col-lg-7 @endif">
                            <h6 class="m-0 font-weight-bold text-primary">Event Detail</h6>
                        </div>
                        <div class="col-lg-2 text-right">
                            <a href="#" class="btn btn-block {{ $event->enable_chat === '1' ? 'btn-danger' : 'btn-success' }} btn-action-chat" data-url="{{ url('admin-tkmu/update-chat/'.$event->id) }}">{{ $event->enable_chat === '1' ? 'DISABLE CHAT' : 'ENABLE CHAT'}}</a>
                        </div>
                        <div class="col-lg-2 text-right">
                            <a href="{{ url('admin-tkmu/calculating-bet?event='.$event->id) }}" class="btn btn-block btn-success">Calculate Bet & Broadcast</a>
                        </div>
                        <div class="col-lg-1 text-right">
                            <a href="{{ url('admin-tkmu/update-type?event='.$event->id) }}" class="btn btn-block {{ ($event->type === 'UPCOMING' || $event->type === 'DONE') ? 'btn-success' : 'btn-danger' }}">{{ ($event->type === 'UPCOMING' || $event->type === 'DONE') ? 'Go Live' : 'Un-live'}}</a>
                        </div>
                        @if($event->type !== 'DONE')
                        <div class="col-lg-2 text-right">
                            <a href="{{ url('admin-tkmu/update-type?event='.$event->id.'&type=past') }}" class="btn btn-block {{ ($event->type !== 'DONE') ? 'btn-success' : '' }}">Move to Past</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 text-right">
                            @if($event->team_left->alias === 'na')
                            <h2>NA</h2>
                            @else
                            <img src="{{ asset($event->team_left->logo.'-200.png') }}" alt="{{ $event->team_left->alias }}" width="30%">
                            @endif
                        </div>
                        <div class="col-lg-4 text-center d-flex align-items-center">
                            <style>
                                .event-detail td {
                                    padding: 15px;
                                }
                            </style>
                            <table class="event-detail" width="100%">
                                <tr>
                                    <td>
                                        <h1>
                                            <a href="{{ url('admin-tkmu/sub-score?event='.$event->id.'&team='.$event->team_left_id) }}" class="btn btn-danger"><i class="fas fa-fw fa-caret-down"></i></a>
                                            {{ $event->team_left_score }}
                                            <a href="{{ url('admin-tkmu/add-score?event='.$event->id.'&team='.$event->team_left_id) }}" class="btn btn-primary"><i class="fas fa-fw fa-caret-up"></i></a>
                                        </h1>
                                        <h3>{{ $event->team_left->name }}</h3>
                                    </td>
                                    <td><h1>:</h1></td>
                                    <td>
                                        <h1>
                                            <a href="{{ url('admin-tkmu/sub-score?event='.$event->id.'&team='.$event->team_right_id) }}" class="btn btn-danger"><i class="fas fa-fw fa-caret-down"></i></a>
                                            {{ $event->team_right_score }}
                                            <a href="{{ url('admin-tkmu/add-score?event='.$event->id.'&team='.$event->team_right_id) }}" class="btn btn-primary"><i class="fas fa-fw fa-caret-up"></i></a>
                                        </h1>
                                        <h3>{{ $event->team_right->name }}</h3>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-4 text-left">
                            @if($event->team_right->alias === 'na')
                            <h2>NA</h2>
                            @else
                            <img src="{{ asset($event->team_right->logo.'-200.png') }}" alt="{{ $event->team_right->alias }}" width="30%">
                            @endif
                        </div>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ url('admin-tkmu/events/'.$event->id.'/edit') }}" type="button" style="float:right" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td><b>Created on</b></td>
                                            <td>{{ \Carbon\Carbon::parse($event->created_at)->format('d M Y H:i:s') }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Created by</b></td>
                                            <td>{{ $event->creates->username }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td>
                                                {{ $event->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Team Left</b></td>
                                            <td>
                                                {{ $event->team_left->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Team Right</b></td>
                                            <td>
                                                {{ $event->team_right->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>League</b></td>
                                            <td>
                                                {{ $event->league_games->leagues->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Game</b></td>
                                            <td>
                                                {{ $event->league_games->games->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Start on</b></td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i:s') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Embed Iframe</b></td>
                                            <td>
                                                {{ $event->streaming_link }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="@if($event->type !== 'DONE') col-lg-5 @else col-lg-7 @endif">
                            <h6 class="m-0 font-weight-bold text-primary">Event Detail</h6>
                        </div>
                        <div class="col-lg-2 text-right">
                            <a href="#" class="btn btn-block {{ $event->enable_chat === '1' ? 'btn-danger' : 'btn-success' }} btn-action-chat" data-url="{{ url('admin-tkmu/update-chat/'.$event->id) }}">{{ $event->enable_chat === '1' ? 'DISABLE CHAT' : 'ENABLE CHAT'}}</a>
                        </div>
                        <div class="col-lg-2 text-right">
                            <a href="{{ url('admin-tkmu/calculating-bet?event='.$event->id) }}" class="btn btn-block btn-success">Calculate Bet & Broadcast</a>
                        </div>
                        <div class="col-lg-1 text-right">
                            <a href="{{ url('admin-tkmu/update-type?event='.$event->id) }}" class="btn btn-block {{ ($event->type === 'UPCOMING' || $event->type === 'DONE') ? 'btn-success' : 'btn-danger' }}">{{ ($event->type === 'UPCOMING' || $event->type === 'DONE') ? 'Go Live' : 'Un-live'}}</a>
                        </div>
                        @if($event->type !== 'DONE')
                        <div class="col-lg-2 text-right">
                            <a href="{{ url('admin-tkmu/update-type?event='.$event->id.'&type=past') }}" class="btn btn-block {{ ($event->type !== 'DONE') ? 'btn-success' : '' }}">Move to Past</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h4>Teams Participated</h4>
                            @foreach ($event->team_detail as $evt)
                                <img src="{{ asset($evt->logo.'-200.png') }}" alt="{{ $evt->alias }}" width="10%">
                            @endforeach
                        </div>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ url('admin-tkmu/events/'.$event->id.'/edit') }}" type="button" style="float:right" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td><b>Created on</b></td>
                                            <td>{{ \Carbon\Carbon::parse($event->created_at)->format('d M Y H:i:s') }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Created by</b></td>
                                            <td>{{ $event->creates->username }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td>
                                                {{ $event->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Teams</b></td>
                                            <td>
                                                {{ $event->teams_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>League</b></td>
                                            <td>
                                                {{ $event->league_games->leagues->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Game</b></td>
                                            <td>
                                                {{ $event->league_games->games->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Start on</b></td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i:s') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Embed Iframe</b></td>
                                            <td>
                                                {{ $event->streaming_link }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Event Bet Category</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <h5>Add New Category</h5>
                            <form action="{{ route('admin.events.bet-categories') }}" method="post">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <select name="type" id="type" class="form-control">
                                                <option @if(old('type') === null)selected @endif disabled>Choose Type</option>
                                                <option value="1" @if(old('type') === '1') selected @endif>Win/Lose</option>
                                                <option value="2" @if(old('type') === '2') selected @endif>Under/Above</option>
                                                <option value="3" @if(old('type') === '3') selected @endif>Tebak Score</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-2 align-items-end">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-fw fa-plus"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <a href="#" class="btn btn-danger btn-block btn-lock-all-categories"><i class="fas fa-lock"></i>&nbsp;Lock All Category</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Value</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($event_bet_categories as $key => $item)
                                            <tr>
                                                <form action="{{ route('admin.events.bet-categories.edit', ['id' => $item->id]) }}" method="post">
                                                @csrf
                                                    <td class="text-center">{{ $key+1 }}</td>
                                                    <td class="text-center">
                                                        <span class="value-preview active">{{ $item->name }}</span>
                                                        <input class="value-input form-control" type="text" name="name" value="{{ $item->name }}">
                                                    </td>
                                                    <td class="text-center">
                                                        @if($item->type === '1')
                                                        Win/Lose
                                                        @elseif($item->type === '2')
                                                        Under/Above
                                                        @elseif($item->type === '3')
                                                        Tebak Score
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($item->type === '1')
                                                        <span class="value-preview active">{{ $item->teams }}</span>
                                                        <select class="value-input form-control" name="teams">
                                                            <option value="{{ $event->team_left_id }}">{{ $event->team_left->name }}</option>
                                                            <option value="{{ $event->team_right_id }}">{{ $event->team_right->name }}</option>
                                                        </select>
                                                        @elseif($item->type === '2')
                                                        <span class="value-preview active">{{ $item->value }}</span>
                                                        <input class="value-input form-control" type="number" name="total" value="{{ $item->value }}">
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-danger btn-lock btn-action active btn-lock-row-bet-category row-bet-category-{{ $item->id }}" data-target="category-id-{{ $item->id }}" data-url="{{ route('admin.events.bet-categories.lock', ['id' => $item->id]) }}"><i class="fas fa-fw fa-lock"></i></button>

                                                        <button type="button" class="btn btn-warning btn-edit btn-action active"><i class="fas fa-fw fa-edit"></i></button>
                                                        <button type="submit" class="btn btn-primary btn-save btn-action"><i class="fas fa-fw fa-check"></i></button>
                                                        <button type="button" class="btn btn-secondary btn-cancel btn-action"><i class="fas fa-fw fa-times"></i></button>

                                                        <button type="button" class="btn btn-secondary btn-delete-data btn-action active" data-url="{{ route('admin.events.bet-categories.delete', ['id' => $item->id]) }}"><i class="fas fa-fw fa-trash"></i></button>
                                                    </td>
                                                </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Event Bet Rules</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5>Add New Rules</h5>
                            <form action="{{ route('admin.events.bet-rules') }}" method="post">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <select name="event_bet_category_id" id="event_bet_category_id" class="form-control">
                                                <option @if(old('event_bet_category_id') === null)selected @endif disabled>Choose Category</option>
                                                @foreach ($event_bet_categories as $item)
                                                    <option value="{{ $item->id }}" @if(old('event_bet_category_id') === $item->id) selected @endif data-value="{{ $item->type === '1' ? 'win-lose' : ( $item->type === '2' ? 'under-above' : 'tebak-score') }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if($event->league_games->game_id === 1)
                                    <div class="col-lg-2 bet-category win-lose">
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="value_left" id="value_left-add" placeholder="Value {{ $event->team_left->name }} Percentage" value="{{ old('value_left') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 bet-category win-lose">
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="value_right" id="value_right-add" placeholder="Value {{ $event->team_right->name }} Percentage" value="{{ old('value_right') }}">
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-lg-2 bet-category under-above">
                                        <div class="form-group">
                                            <input class="form-control" type="number" step="0.01" name="total" id="total" placeholder="Total" value="{{ old('total') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 bet-category under-above">
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="value_under" id="value_under" placeholder="Value Under Percentage" value="{{ old('value_under') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 bet-category under-above">
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="value_above" id="value_above" placeholder="Value Above Percentage" value="{{ old('value_above') }}">
                                        </div>
                                    </div>

                                    @if($event->league_games->game_id === 1)
                                    <div class="col-lg-2 bet-category tebak-score">
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="value_left_ts" id="value_left_tebak-score-add" placeholder="Score {{ $event->team_left->name }}" value="{{ old('value_left') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 bet-category tebak-score">
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="value_right_ts" id="value_right_tebak-score-add" placeholder="Score {{ $event->team_right->name }}" value="{{ old('value_right') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 bet-category tebak-score">
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="bonus" id="bonus" placeholder="Bonus Percentage" value="{{ old('bonus') }}">
                                        </div>
                                    </div>
                                    @endif
                                    
                                    <div class="col-lg-1 align-items-end">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-fw fa-plus"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @foreach ($event_bet as $value)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable dataTable-bet-rules {{ $value['type'] === '1' ? 'win-lose' : 'under-above' }} category-id-{{ $value['id'] }}" id="dataTable" width="100%" cellspacing="0" data-id="{{ $value['id'] }}">
                                @if($value['type'] === '1')
                                <thead>
                                    <tr>
                                        <th colspan="4" class="text-center">{{ $value['name'] }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">{{ $event->team_left->name }}</th>
                                        <th class="text-center">{{ $event->team_right->name }}</th>
                                        <th class="text-center" width="15%">Action</th>
                                    </tr>
                                </thead>
                                @elseif($value['type'] === '2')
                                <thead>
                                    <tr>
                                        <th colspan="5" class="text-center">{{ $value['name'] }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Under</th>
                                        <th class="text-center">Above</th>
                                        <th class="text-center" width="15%">Action</th>
                                    </tr>
                                </thead>
                                @elseif($value['type'] === '3')
                                <thead>
                                    <tr>
                                        <th colspan="5" class="text-center">{{ $value['name'] }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">{{ $event->team_left->name }}</th>
                                        <th class="text-center">{{ $event->team_right->name }}</th>
                                        <th class="text-center">Bonus</th>
                                        <th class="text-center" width="15%">Action</th>
                                    </tr>
                                </thead>
                                @endif
                                <tbody>
                                    @php
                                        $idx = 0;
                                    @endphp
                                    @foreach ($value['items']->sortByDesc('active') as $key => $item)
                                        <tr @if($item->active === '0') style="background: #ddd" @endif data-type="{{ $item->event_bet_categories->type }}">
                                            <form action="{{ route('admin.events.bet-rules.edit', ['id' => $item->id]) }}" method="post">
                                            @csrf
                                            <td class="text-center">{{ $idx+1 }}</td>
                                            @if($item->event_bet_categories->type === '1')
                                            <td>
                                                <span class="value-preview active">
                                                    {{ json_decode($item->value_detail)->team_left }}%
                                                    @if($item->active === '1')
                                                    <button type="button" class="btn btn-{{ json_decode($item->value_detail)->team_left_locked === '0' ? 'success' : 'danger' }} btn-lock btn-action active" style="float:right" data-id="{{ $item->id }}" data-type="team_left" data-url="{{ route('admin.events.bet-rules.lock', ['id' => $item->id]) }}">
                                                        <i class="fas fa-fw {{ json_decode($item->value_detail)->team_left_locked === '0' ? 'fa-unlock' : 'fa-lock' }}"></i>
                                                    </button>
                                                    @endif
                                                </span>
                                                @if(json_decode($item->value_detail)->team_left_locked === '0')
                                                <input class="value-input form-control" type="number" name="value_left" value="{{ json_decode($item->value_detail)->team_left }}">
                                                @else
                                                <span class="value-input">{{ json_decode($item->value_detail)->team_left }}%</span>
                                                @endif

                                                <br>
                                                <span id="team-left-income-{{ $item->id }}">{{ json_decode($item->value_detail)->team_left_income }}</span>&nbsp;BP
                                            </td>
                                            <td>
                                                <span class="value-preview active">
                                                    {{ json_decode($item->value_detail)->team_right }}%
                                                    @if($item->active === '1')
                                                    <button type="button" class="btn btn-{{ json_decode($item->value_detail)->team_right_locked === '0' ? 'success' : 'danger' }} btn-lock btn-action active" style="float:right" data-id="{{ $item->id }}" data-type="team_right" data-url="{{ route('admin.events.bet-rules.lock', ['id' => $item->id]) }}">
                                                        <i class="fas fa-fw {{ json_decode($item->value_detail)->team_right_locked === '0' ? 'fa-unlock' : 'fa-lock' }}"></i>
                                                    </button>
                                                    @endif
                                                </span>
                                                <input class="value-input form-control" type="number" name="value_right" value="{{ json_decode($item->value_detail)->team_right }}">

                                                <br>
                                                <span id="team-right-income-{{ $item->id }}">{{ json_decode($item->value_detail)->team_right_income }}</span>&nbsp;BP
                                            </td>
                                            @elseif($item->event_bet_categories->type === '2')
                                            <td>
                                                <span class="value-preview active">{{ json_decode($item->value_detail)->total }}</span>
                                                <input class="value-input form-control" type="number" name="total" value="{{ json_decode($item->value_detail)->total }}">
                                            </td>
                                            <td>
                                                <span class="value-preview active">
                                                    {{ json_decode($item->value_detail)->under }}%
                                                    @if($item->active === '1')
                                                    <button type="button" class="btn btn-{{ json_decode($item->value_detail)->under_locked === '0' ? 'success' : 'danger' }} btn-lock btn-action active" style="float:right" data-id="{{ $item->id }}" data-type="under" data-url="{{ route('admin.events.bet-rules.lock', ['id' => $item->id]) }}">
                                                        <i class="fas fa-fw {{ json_decode($item->value_detail)->under_locked === '0' ? 'fa-unlock' : 'fa-lock' }}"></i>
                                                    </button>
                                                    @endif
                                                </span>
                                                <input class="value-input form-control" type="number" name="value_under" value="{{ json_decode($item->value_detail)->under }}">

                                                <br>
                                                <span id="under-income-{{ $item->id }}">{{ json_decode($item->value_detail)->under_income }}</span>&nbsp;BP
                                            </td>
                                            <td>
                                                <span class="value-preview active">
                                                    {{ json_decode($item->value_detail)->above }}%
                                                    @if($item->active === '1')
                                                    <button type="button" class="btn btn-{{ json_decode($item->value_detail)->above_locked === '0' ? 'success' : 'danger' }} btn-lock btn-action active" style="float:right" data-id="{{ $item->id }}" data-type="above" data-url="{{ route('admin.events.bet-rules.lock', ['id' => $item->id]) }}">
                                                        <i class="fas fa-fw {{ json_decode($item->value_detail)->above_locked === '0' ? 'fa-unlock' : 'fa-lock' }}"></i>
                                                    </button>
                                                    @endif
                                                </span>
                                                <input class="value-input form-control" type="number" name="value_above" value="{{ json_decode($item->value_detail)->above }}">

                                                <br>
                                                <span id="above-income-{{ $item->id }}">{{ json_decode($item->value_detail)->above_income }}</span>&nbsp;BP
                                            </td>
                                            @elseif($item->event_bet_categories->type === '3')
                                            <td class="text-center">
                                                {{ json_decode($item->value_detail)->team_left }}
                                            </td>
                                            <td class="text-center">
                                                {{ json_decode($item->value_detail)->team_right }}
                                            </td>
                                            <td>
                                                <span class="value-preview active">
                                                    {{ json_decode($item->value_detail)->bonus }}%
                                                    {{-- @if($item->active === '1')
                                                    <button type="button" class="btn btn-{{ json_decode($item->value_detail)->bonus_locked === '0' ? 'success' : 'danger' }} btn-lock btn-action active" style="float:right" data-id="{{ $item->id }}" data-type="bonus" data-url="{{ route('admin.events.bet-rules.lock', ['id' => $item->id]) }}">
                                                        <i class="fas fa-fw {{ json_decode($item->value_detail)->bonus_locked === '0' ? 'fa-unlock' : 'fa-lock' }}"></i>
                                                    </button>
                                                    @endif --}}
                                                </span>
                                                <input class="value-input form-control" type="number" name="bonus" value="{{ json_decode($item->value_detail)->bonus }}">

                                                <br>
                                                <span id="bonus-income-{{ $item->id }}">{{ json_decode($item->value_detail)->bonus_income }}</span>&nbsp;BP
                                            </td>
                                            @endif
                                            <td class="text-center btn-action">
                                                @if($item->active === '1')                                                
                                                    @if($item->event_bet_categories->type === '3')
                                                    <button type="button" class="btn btn-{{ json_decode($item->value_detail)->bonus_locked === '0' ? 'success' : 'danger' }} btn-lock btn-action active btn-lock-row" data-id="{{ $item->id }}" data-url="{{ route('admin.events.bet-rules.lock', ['id' => $item->id]) }}">
                                                        <i class="fas fa-fw {{ json_decode($item->value_detail)->bonus_locked === '0' ? 'fa-unlock' : 'fa-lock' }}"></i>
                                                    </button>
                                                    @else
                                                    <button type="button" class="btn btn-success btn-lock btn-action active btn-lock-row" data-id="{{ $item->id }}" data-url="{{ route('admin.events.bet-rules.lock', ['id' => $item->id]) }}">
                                                        <i class="fas fa-fw fa-unlock"></i>
                                                    </button>
                                                    @endif
                                                <button type="button" class="btn btn-warning btn-edit btn-action active"><i class="fas fa-fw fa-edit"></i></button>
                                                <button type="button" class="btn btn-secondary btn-delete-data btn-action active" data-url="{{ route('admin.events.bet-rules.delete', ['id' => $item->id]) }}"><i class="fas fa-fw fa-trash"></i></button>
                                                <button type="submit" class="btn btn-primary btn-save btn-action"><i class="fas fa-fw fa-check"></i></button>
                                                <button type="button" class="btn btn-secondary btn-cancel btn-action"><i class="fas fa-fw fa-times"></i></button>
                                                @else
                                                <button type="button" class="btn btn-secondary btn-delete-data btn-action active" data-url="{{ route('admin.events.bet-rules.delete', ['id' => $item->id]) }}">Delete and Refund</button>
                                                @endif
                                            </td>
                                        </form>
                                    </tr>
                                    @php
                                        $idx++;
                                    @endphp
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('#event_bet_category_id').on('change', function(e) {
        e.preventDefault();
        
        if($('.bet-category').hasClass('active')) {
            $('.bet-category').removeClass('active');
        }

        var type = $(this).children("option:selected").data('value');
        $('.'+type).addClass('active');
    })

    $('.btn-edit').on('click', function(e) {
        e.preventDefault();

        $(this).removeClass('active');
        $(this).closest('tr').find('button.btn-lock').removeClass('active');
        $(this).closest('tr').find('button.btn-delete-data').removeClass('active');
        $(this).closest('tr').find('button.btn-save').addClass('active');
        $(this).closest('tr').find('button.btn-cancel').addClass('active');

        $(this).closest('tr').find('.value-preview').removeClass('active');
        $(this).closest('tr').find('.value-input').addClass('active');
    })

    $('.btn-cancel').on('click', function(e) {
        e.preventDefault();

        $(this).removeClass('active');
        $(this).closest('tr').find('button.btn-save').removeClass('active');
        $(this).closest('tr').find('button.btn-delete-data').addClass('active');
        $(this).closest('tr').find('button.btn-edit').addClass('active');

        $(this).closest('tr').find('.value-preview').addClass('active');
        $(this).closest('tr').find('.value-input').removeClass('active');
    })

    $(document).ready(function() {
        fetchData();

        // setInterval(
        //     function(){
        //         getDataDetail();
        //     }, 3000
        // );
    })

    $('.btn-action-chat').on('click', function(e) {
        e.preventDefault();

        var thisBtn = $(this);
        var url = thisBtn.attr('data-url');

        $.ajax({
            url: url,
            method: 'get',
            success: function(result) {
                if(result.status === 'success') {
                    if(thisBtn.hasClass('btn-danger')){
                        thisBtn.removeClass('btn-danger')
                        thisBtn.addClass('btn-success')
                    } else {
                        thisBtn.addClass('btn-danger')
                        thisBtn.removeClass('btn-success')
                    }

                    if(thisBtn.text() === 'ENABLE CHAT'){
                        thisBtn.text('DISABLE CHAT')
                    } else {
                        thisBtn.text('ENABLE CHAT')
                    }
                }
            }
        })
    })

    $('.btn-lock').on('click', function(e) {
        e.preventDefault();

        var url = ($(this).data('url')).replace(/&amp;/g, '&');
        var id = $(this).data('id');
        var type = $(this).data('type');
        var btnLock = $(this)

        $.ajax({
            url: url,
            method: 'get',
            data: {
                type: type
            },
            success: function(result) {
                if(result.status === 'success') {
                    if(type === undefined) {
                        if(btnLock.hasClass('btn-lock-row-bet-category')) {
                            var target = btnLock.attr('data-target');
                            if(btnLock.hasClass('btn-danger')) {
                                if($('table.'+target+' .value-preview button').find('.fas').hasClass('fa-lock')) {
                                    $('table.'+target+' .value-preview button').find('.fas').removeClass('fa-lock');
                                    $('table.'+target+' .value-preview button').find('.fas').addClass('fa-unlock');

                                    $('table.'+target+' .value-preview button').removeClass('btn-danger');
                                    $('table.'+target+' .value-preview button').addClass('btn-success');
                                }
                            } else {
                                if($('table.'+target+' .value-preview button').find('.fas').hasClass('fa-unlock')) {
                                    $('table.'+target+' .value-preview button').find('.fas').removeClass('fa-unlock');
                                    $('table.'+target+' .value-preview button').find('.fas').addClass('fa-lock');

                                    $('table.'+target+' .value-preview button').removeClass('btn-success');
                                    $('table.'+target+' .value-preview button').addClass('btn-danger');
                                }
                            }
                        } else if(btnLock.hasClass('btn-lock-row')) {
                            if(btnLock.hasClass('btn-success')) {
                                btnLock.closest('tr').find('.value-preview .btn-lock').removeClass('btn-success')
                                btnLock.closest('tr').find('.value-preview .btn-lock').addClass('btn-danger')

                                btnLock.closest('tr').find('.value-preview .btn-lock').find('.fas').removeClass('fa-unlock')
                                btnLock.closest('tr').find('.value-preview .btn-lock').find('.fas').addClass('fa-lock')

                                btnLock.removeClass('btn-success');
                                btnLock.addClass('btn-danger');
                                btnLock.find('.fas').removeClass('fa-unlock')
                                btnLock.find('.fas').addClass('fa-lock')
                            } else {
                                btnLock.closest('tr').find('.value-preview .btn-lock').removeClass('btn-danger')
                                btnLock.closest('tr').find('.value-preview .btn-lock').addClass('btn-success')

                                btnLock.closest('tr').find('.value-preview .btn-lock').find('.fas').removeClass('fa-lock')
                                btnLock.closest('tr').find('.value-preview .btn-lock').find('.fas').addClass('fa-unlock')

                                btnLock.removeClass('btn-danger');
                                btnLock.addClass('btn-success');
                                btnLock.find('.fas').removeClass('fa-lock');
                                btnLock.find('.fas').addClass('fa-unlock')
                            }
                        }
                    } else {
                        if(btnLock.find('.fas').hasClass('fa-lock')) {
                            btnLock.find('.fas').removeClass('fa-lock');
                            btnLock.find('.fas').addClass('fa-unlock');
                        } else {
                            btnLock.find('.fas').removeClass('fa-unlock');
                            btnLock.find('.fas').addClass('fa-lock');
                        }

                        if(btnLock.hasClass('btn-danger')) {
                            btnLock.removeClass('btn-danger');
                            btnLock.addClass('btn-success');
                        } else {
                            btnLock.removeClass('btn-success');
                            btnLock.addClass('btn-danger');
                        }
                    }

                    fetchData();
                } else {
                    $('#alertMessage').modal('show');
                    $('#exampleAlertTitleModalLabel').text((result.status).toUpperCase());
                    $('#exampleAlertBodyModalLabel').text(result.message)
                }
            }
        })
    })

    $('.btn-lock-all-categories').on('click', function(e) {
        e.preventDefault();

        if($(this).hasClass('btn-danger')) {
            $(this).removeClass('btn-danger');
            $(this).addClass('btn-success');
            $(this).html('<i class="fas fa-fw fa-unlock"></i>Unlock All Category');

            $.ajax({
                url: "{{ url('admin-tkmu/events/bet-rules-lock-all/'.$event->id) }}",
                method: 'get',
                data : {
                    type : 'lock'
                },
                success: function(result) {
                    if(result.status === 'success') {
                        lockAll();
                    } else {
                        $('#alertMessage').modal('show');
                        $('#exampleAlertTitleModalLabel').text((result.status).toUpperCase());
                        $('#exampleAlertBodyModalLabel').text(result.message)
                    }
                }
            })
        } else {
            $(this).removeClass('btn-success');
            $(this).addClass('btn-danger');
            $(this).html('<i class="fas fa-fw fa-lock"></i>Lock All Category');

            $.ajax({
                url: "{{ url('admin-tkmu/events/bet-rules-lock-all/'.$event->id) }}",
                method: 'get',
                data : {
                    type : 'unlock'
                },
                success: function(result) {
                    if(result.status === 'success') {
                        unlockAll();
                    } else {
                        $('#alertMessage').modal('show');
                        $('#exampleAlertTitleModalLabel').text((result.status).toUpperCase());
                        $('#exampleAlertBodyModalLabel').text(result.message)
                    }
                }
            })
        }
    })

    function fetchData() {
        $('table.dataTable-bet-rules').each(function() {
            var value = $(this);
            var rulesLocked = '';
            var target = value.attr('data-id');
            var rowExist = value.find('tbody tr');

            if(!rowExist.find('td').hasClass('dataTables_empty')) {
                if(rowExist.length > 0) {
                    rowExist.each(function() {
                        $trTyp = $(this).data('type');
                        if($trTyp != 3) {
                            if($(this).find('td .value-preview.active button i.fas.fa-unlock').length > 0) {
                                $(this).find('td.btn-action').find('.btn-lock .fas').removeClass('fa-lock')
                                $(this).find('td.btn-action').find('.btn-lock .fas').addClass('fa-unlock')
                            } else {
                                $(this).find('td.btn-action').find('.btn-lock .fas').removeClass('fa-unlock')
                                $(this).find('td.btn-action').find('.btn-lock .fas').addClass('fa-lock')
                            }

                            if($(this).find('td .value-preview.active button.btn-success').length > 0) {
                                $(this).find('td.btn-action').find('.btn-lock').removeClass('btn-danger')
                                $(this).find('td.btn-action').find('.btn-lock').addClass('btn-success')
                            } else {
                                $(this).find('td.btn-action').find('.btn-lock').removeClass('btn-success')
                                $(this).find('td.btn-action').find('.btn-lock').addClass('btn-danger')
                            }
                        }
                    })
                    
                    rulesUnlocked = value.find('.fa-unlock').length;
                    
                }

                if(rulesUnlocked > 0) {
                    if($('.row-bet-category-'+target).find('.fas').hasClass('fa-lock')) {
                        $('.row-bet-category-'+target).find('.fas').removeClass('fa-lock')
                        $('.row-bet-category-'+target).find('.fas').addClass('fa-unlock')
                    }

                    if($('.row-bet-category-'+target).hasClass('btn-danger')) {
                        $('.row-bet-category-'+target).removeClass('btn-danger')
                        $('.row-bet-category-'+target).addClass('btn-success')
                    }
                } else {
                    if($('.row-bet-category-'+target).find('.fas').hasClass('fa-unlock')) {
                        $('.row-bet-category-'+target).find('.fas').removeClass('fa-unlock')
                        $('.row-bet-category-'+target).find('.fas').addClass('fa-lock')
                    }

                    if($('.row-bet-category-'+target).hasClass('btn-success')) {
                        $('.row-bet-category-'+target).removeClass('btn-success')
                        $('.row-bet-category-'+target).addClass('btn-danger')
                    }
                }
            }
        })
    }

    function lockAll() {
        $('table.dataTable-bet-rules').each(function() {
            var value = $(this);
            var rulesLocked = '';
            var target = value.attr('data-id');
            var rowExist = value.find('tbody tr');

            if(!rowExist.find('td').hasClass('dataTables_empty')) {
                if(rowExist.length > 0) {
                    rowExist.each(function() {
                        $(this).find('td .value-preview').find('button .fas').removeClass('fa-unlock')
                        $(this).find('td .value-preview').find('button .fas').addClass('fa-lock')
                        
                        $(this).find('td .value-preview').find('button').removeClass('btn-success')
                        $(this).find('td .value-preview').find('button').addClass('btn-danger')


                        $(this).find('td.btn-action').find('.btn-lock .fas').removeClass('fa-unlock')
                        $(this).find('td.btn-action').find('.btn-lock .fas').addClass('fa-lock')
                        
                        $(this).find('td.btn-action').find('.btn-lock').removeClass('btn-success')
                        $(this).find('td.btn-action').find('.btn-lock').addClass('btn-danger')
                    })
                    
                }

                if($('.row-bet-category-'+target).find('.fas').hasClass('fa-unlock')) {
                    $('.row-bet-category-'+target).find('.fas').removeClass('fa-unlock')
                    $('.row-bet-category-'+target).find('.fas').addClass('fa-lock')
                }

                if($('.row-bet-category-'+target).hasClass('btn-success')) {
                    $('.row-bet-category-'+target).removeClass('btn-success')
                    $('.row-bet-category-'+target).addClass('btn-danger')
                }
            }
        })
    }

    function unlockAll() {
        $('table.dataTable-bet-rules').each(function() {
            var value = $(this);
            var rulesLocked = '';
            var target = value.attr('data-id');
            var rowExist = value.find('tbody tr');

            if(!rowExist.find('td').hasClass('dataTables_empty')) {
                if(rowExist.length > 0) {
                    rowExist.each(function() {
                        $(this).find('td .value-preview').find('button .fas').removeClass('fa-lock')
                        $(this).find('td .value-preview').find('button .fas').addClass('fa-unlock')
                        
                        $(this).find('td .value-preview').find('button').removeClass('btn-danger')
                        $(this).find('td .value-preview').find('button').addClass('btn-success')


                        $(this).find('td.btn-action').find('.btn-lock .fas').removeClass('fa-lock')
                        $(this).find('td.btn-action').find('.btn-lock .fas').addClass('fa-unlock')
                        
                        $(this).find('td.btn-action').find('.btn-lock').removeClass('btn-danger')
                        $(this).find('td.btn-action').find('.btn-lock').addClass('btn-success')
                    })
                    
                }

                if($('.row-bet-category-'+target).find('.fas').hasClass('fa-lock')) {
                    $('.row-bet-category-'+target).find('.fas').removeClass('fa-lock')
                    $('.row-bet-category-'+target).find('.fas').addClass('fa-unlock')
                }

                if($('.row-bet-category-'+target).hasClass('btn-danger')) {
                    $('.row-bet-category-'+target).removeClass('btn-danger')
                    $('.row-bet-category-'+target).addClass('btn-success')
                }
            }
        })
    }

    function getDataDetail() {
        $.ajax({
            url: "{{ url('admin-tkmu/get-data-events/'.$event->id) }}",
            method: 'get',
            success: function(result) {
                $.each(result, function(k, v) {
                    var detailItems = v.items;
                    var type = v.type;
                    $.each(detailItems, function(id, it) {
                        var id = it.id
                        var detail = JSON.parse(it.value_detail);

                        if(type === '1') {
                            $('#team-left-income-'+id).text(detail.team_left_income);
                            $('#team-right-income-'+id).text(detail.team_right_income);
                        } else {
                            $('#under-income-'+id).text(detail.under_income);
                            $('#above-income-'+id).text(detail.above_income);
                        }
                    })
                })
            }
        })
    }
</script>
@endsection