@extends('layouts.admin.app')

@section('content')
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
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center cell-width-01">No.</th>
                                        <th class="text-center">Event ID</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Time</th>
                                        <th class="text-center">Team </th>
                                        <th class="text-center">League</th>
                                        @if(Auth::guard('admin')->user()->role_id === 1 || Auth::guard('admin')->user()->role_id === 2 || ($menu_grants !== '' && $menu_grants->where('name', 'DELETE')->first()))
                                        <th class="text-center">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $key => $event)
                                        <tr>
                                            <td class="text-center">{{ $key+1 }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.events.detail', ['id' => $event->id]) }}">E{{ $event->id }}</a>
                                                
                                            </td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($event->start_date)->format('H:i') }}</td>
                                            @if($event->league_games->game_id === 1)
                                                <td class="text-center">{{ $event->team_left->name }} vs {{ $event->team_right->name }}</td>
                                            @else
                                                <td class="text-center">{{ $event->teams }}</td>
                                            @endif
                                            <td class="text-center">{{ $event->league_games->leagues->name }}</td>
                                            @if(Auth::guard('admin')->user()->role_id === 1 || Auth::guard('admin')->user()->role_id === 2 || ($menu_grants !== '' && $menu_grants->where('name', 'DELETE')->first()))
                                            <td class="text-center">
                                                <a href="#" class="btn btn-danger btn-delete-data" data-url="{{ route('admin.events.delete', ['id' => $event->id]) }}"><i class="fas fa-fw fa-trash"></i></a>
                                            </td>
                                            @endif
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
</div>
@endsection