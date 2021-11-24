@extends('layouts.admin.app')

@section('content')
<style>
    .mlbb, .pubg.freefire {
        display: none;
    }
    .mlbb.active, .pubg.freefire.active {
        display: flex;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Events</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5>Edit Event</h5> <br>
                            <form id="event-update-form" action="{{ url('admin-tkmu/events/'.$event->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="patch">
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <label for="name">Event name</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="name" id="name" placeholder="Event Name" value="{{ $event->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <label for="league_game_id">Choose League</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <select name="league_game_id" id="league_game_id" class="form-control">
                                                <option @if($event->league_game_id === null) selected @endif disabled>Choose League</option>
                                                @foreach ($league_games as $lg)
                                                    <option value="{{ $lg->id }}" @if($lg->id === $event->league_game_id) selected @endif>{{ $lg->leagues->name }} - {{ $lg->games->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mlbb @if($event->league_games->game_id === 1) active @endif">
                                    <div class="col-lg-3">
                                        <label for="team_left_id">Choose team left</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <select name="team_left_id" id="team_left_id" class="form-control">
                                                <option @if($event->team_left_id === null) selected @endif disabled>Choose Team Left</option>
                                                @foreach ($teams as $tl)
                                                    <option value="{{ $tl->id }}" @if($tl->id === $event->team_left_id) selected @endif>{{ $tl->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mlbb @if($event->league_games->game_id === 1) active @endif">
                                    <div class="col-lg-3">
                                        <label for="team_right_id">Choose team right</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <select name="team_right_id" id="team_right_id" class="form-control">
                                                <option @if($event->team_right_id === null) selected @endif disabled>Choose Team Right</option>
                                                @foreach ($teams as $tr)
                                                    <option value="{{ $tr->id }}" @if($tr->id === $event->team_right_id) selected @endif>{{ $tr->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row pubg freefire @if($event->league_games->game_id !== 1) active @endif">
                                    <div class="col-lg-3">
                                        <label for="teams">Choose team</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <select name="teams[]" id="teams" class="form-control" multiple>
                                                @foreach ($teams as $tr)
                                                    <option value="{{ $tr->id }}" @if(in_array($tr->id, $event->team_detail)) selected @endif>{{ $tr->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <label for="start_date">Event start date</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="{{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d') }}T{{ \Carbon\Carbon::parse($event->start_date)->format('H:i') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <label for="streaming_link">Streaming link</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="streaming_link" id="streaming_link" placeholder="Embed link" value="{{ $event->streaming_link }}">
                                            <p>*Please add '<b style="color: red"><u>autoplay;</u></b>', ex: &lt;iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="<b style="color: red"><u>autoplay;</u></b> fullscreen" width="100%" height="100%" id="ininimotv"&gt;&lt;/iframe&gt; </p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col-lg-2">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="{{ url('admin-tkmu/events') }}" type="button" class="btn btn-secondary btn-block">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection