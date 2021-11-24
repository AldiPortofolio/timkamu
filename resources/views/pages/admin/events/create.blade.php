@extends('layouts.admin.app')

@section('content')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Create New Event</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="flex-page-filter">
                        @if(app('request')->input('game') === 'pubgm')
                        <div class="form-group">
                            <a href="{{ url('admin-tkmu/events/create?game=mlbb') }}" class="btn btn-sm btn-light">Create MLBB</a>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin-tkmu/events/create?game=freefire') }}" class="btn btn-sm btn-light">Create Freefire</a>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin-tkmu/events/create?game=outright') }}" class="btn btn-sm btn-light">Create Outright</a>
                        </div>
                        @elseif(app('request')->input('game') === 'freefire')
                        <div class="form-group">
                            <a href="{{ url('admin-tkmu/events/create?game=mlbb') }}" class="btn btn-sm btn-light">Create MLBB</a>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin-tkmu/events/create?game=pubgm') }}" class="btn btn-sm btn-light">Create PUBGM</a>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin-tkmu/events/create?game=outright') }}" class="btn btn-sm btn-light">Create Outright</a>
                        </div>
                        @elseif(app('request')->input('game') === 'outright')
                        <div class="form-group">
                            <a href="{{ url('admin-tkmu/events/create?game=mlbb') }}" class="btn btn-sm btn-light">Create MLBB</a>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin-tkmu/events/create?game=pubgm') }}" class="btn btn-sm btn-light">Create PUBGM</a>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin-tkmu/events/create?game=freefire') }}" class="btn btn-sm btn-light">Create Freefire</a>
                        </div>
                        @else
                        <div class="form-group">
                            <a href="{{ url('admin-tkmu/events/create?game=pubgm') }}" class="btn btn-sm btn-light">Create PUBGM</a>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin-tkmu/events/create?game=freefire') }}" class="btn btn-sm btn-light">Create Freefire</a>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin-tkmu/events/create?game=outright') }}" class="btn btn-sm btn-light">Create Outright</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @if(app('request')->input('game') === 'outright')
            <div class="row">

                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <form action="{{ route('admin.events.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Event name</label>
                                    <input type="text" class="form-control form-control-sm first-focus" name="name" id="name">
                                </div> 
                                <div class="form-group">
                                    <label>Event start</label>
                                    <input type="datetime-local" class="form-control form-control-sm first-focus" name="start_date" id="start_date">
                                </div>
                                <div class="form-group">
                                    <label>Event end</label>
                                    <input type="datetime-local" class="form-control form-control-sm first-focus" name="end_date" id="end_date">
                                </div>
                                <div class="form-group">
                                    <label>Description detail</label>
                                    <textarea class="form-control form-control-sm" rows="3" name="card_detail" id="card_detail"></textarea>
                                </div>
                                <div class="form-group mt-30 mb-0">
                                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="row">

                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <form action="{{ route('admin.events.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Event name</label>
                                    <input type="text" class="form-control form-control-sm first-focus" name="name" id="name">
                                </div> 
                                <div class="form-group">
                                    <label>Event start</label>
                                    <input type="datetime-local" class="form-control form-control-sm first-focus" name="start_date" id="start_date">
                                </div> 
                                <div class="form-group">
                                    <label>League</label>
                                    <select name="league_game_id" id="league_game_id" class="form-control form-control-sm">
                                        <option @if(old('league_game_id') === null) selected @endif disabled>Choose League</option>
                                        @foreach ($league_games as $lg)
                                            <option value="{{ $lg->id }}" @if($lg->id === old('league_game_id')) selected @endif data-games="{{ $lg->games->id }}">{{ $lg->leagues->name }} - {{ $lg->games->name }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                @if(app('request')->input('game') === 'pubgm' || app('request')->input('game') === 'freefire')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Teams</label>
                                            <select name="teams[]" id="teams" class="form-control form-control-sm" multiple>
                                                @foreach ($teams as $tl)
                                                    <option value="{{ $tl->id }}" @if($tl->id === old('team_left_id')) selected @endif>{{ $tl->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Team A</label>
                                            <select name="team_left_id" id="team_left_id" class="form-control form-control-sm">
                                                <option @if(old('team_left_id') === null) selected @endif disabled>Choose Team Left</option>
                                                @foreach ($teams as $tl)
                                                    <option value="{{ $tl->id }}" @if($tl->id === old('team_left_id')) selected @endif>{{ $tl->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Team B</label>
                                            <select name="team_right_id" id="team_right_id" class="form-control form-control-sm">
                                                <option @if(old('team_right_id') === null) selected @endif disabled>Choose Team Right</option>
                                                @foreach ($teams as $tr)
                                                    <option value="{{ $tr->id }}" @if($tr->id === old('team_right_id')) selected @endif>{{ $tr->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Card detail</label>
                                    <textarea class="form-control form-control-sm" rows="3" name="card_detail" id="card_detail"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Streaming embed</label>
                                    <textarea class="form-control form-control-sm" rows="3" name="streaming_link" id="streaming_link"><iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe></textarea>
                                </div>
                                <div class="form-group mt-30 mb-0">
                                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
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