@extends('layouts.admin.app')

@section('content')
<section id="content">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Game Events</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="flex-page-filter">
                        <div class="form-group">
                            <select class="form-control form-control-sm" id="filter-events">
                                <option value="upcoming" @if(app('request')->input('type') === 'upcoming') selected @endif>Upcoming games</option>
                                <option value="past" @if(app('request')->input('type') === 'past') selected @endif>Past games</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    <div class="table-meta grey text-italic">Showing <span class="black">{{ count($events->items()) }}</span> out of <span class="black">{{ $events->total() }}</span> events</div>
                </div>

                <div class="col-12 mb-20">
                    @if(count($events) > 0)
                    @foreach ($events as $key => $event)
                    <div class="event-card card mb-10 @if($event->type === 'ONGOING') border-danger @endif">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="upper">
                                        <span class="event-card-id-text">[#{{ $event->id }}]</span> {{ $event->name }} @if($event->type === 'ONGOING')<span class="event-card-live-text">LIVE</span>@elseif($event->type === 'DONE')<span class="event-card-past-text">Past Event</span>@elseif($event->type === 'DRAFT')<span class="event-card-past-text">Draft</span>@endif
                                    </div>
                                    <div class="lower">
                                        <span class="o5">{{ \Carbon\Carbon::parse($event->start_date)->format('d M Y - H:i') }}</span>
                                        @if($event->league_game_id)<span class="event-card-league-name">- {{ $event->league_games->leagues->name }}</span>@endif
                                        @if($event->odds > 0)<span class="event-card-odds">{{ $event->odds }}</span>@endif
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <a href="{{ url('admin-tkmu/reports/'.$event->id) }}" class="btn btn-sm btn-light ml-2" target="_blank">View performance</a>
                                    <a href="{{ url('admin-tkmu/events/'. $event->id) }}" class="btn btn-sm btn-success ml-2">View event</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="event-card card mb-10 cursor-ptr border-light">
                        <div class="card-body">
                            <div class="upper">
                                <em>no event</em>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="col-12 ">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="@if($events->currentPage() === 1)#@else{{ url('admin-tkmu/events?type='.app('request')->input('type').'&page='.($events->currentPage() - 1)) }}@endif">Previous</a></li>
                            @for ($i = 1; $i <= $events->lastPage(); $i++)
                                <li class="page-item @if($events->currentPage() === $i) active @endif"><a class="page-link" href="{{ url('admin-tkmu/events?type='.app('request')->input('type').'&page='.$i) }}">{{ $i }}</a></li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="@if($events->currentPage() === $events->lastPage())#@else{{ url('admin-tkmu/events?type='.app('request')->input('type').'&page='.($events->currentPage() + 1)) }}@endif">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</section>

<section id="page-modals">
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

    $('#filter-events').on('change', function(e) {
        e.preventDefault();

        var type = $(this).val();

        location.href = "{{ url('admin-tkmu/events?type=') }}"+type;
    })
</script>
@endsection
