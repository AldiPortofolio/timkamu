@extends('layouts.admin.app')

@section('content')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Event Performance</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mb-20">
                    <div class="flex-page-filter">
                        <div class="form-group mb-0">
                            <input type="date" class="form-control form-control-sm h-100" id="ep_filter_startdate" @if(app('request')->input('start_date')) value="{{ app('request')->input('start_date') }}"@endif>
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-light" disabled>to</button>
                        </div>
                        <div class="form-group mb-0">
                            <input type="date" class="form-control form-control-sm h-100" id="ep_filter_enddate" @if(app('request')->input('end_date')) value="{{ app('request')->input('end_date') }}"@endif>
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success btn-filter">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    <div class="row">
                        <div class="col-4">
                            @if(count($events) > 0)
                            <div class="table-meta grey text-italic">Showing <span class="black">{{ count($events) }}</span> out of <span class="black">{{ $events->total() }}</span> events</div>
                            @else
                            <div class="table-meta grey text-italic">Showing <span class="black">0</span> out of <span class="black">0</span> events</div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>[ID] - Date - Match name</th>
                                        <th>BP Placed</th>
                                        <th>Payout</th>
                                        <th>Our Net</th>
                                        <th>Our Net Rp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- default page state (after user click from side menu) -->
                                    @if(app('request')->input('start_date') === null && app('request')->input('end_date') === null)
                                    <tr>
                                        <td colspan="99" class="o3 text-italic">Please select the date range above</td>
                                    </tr>

                                    @elseif(count($events) > 0)
                                    <!-- when there is data -->
                                    @foreach ($events as $key => $item)
                                    <tr>
                                        <td><span class="o3">[{{ $item->event_id }}]</span> - {{ \Carbon\Carbon::parse($item->events->start_date)->format('d M Y H:i') }} - {{ $item->events->name }}</td>
                                        <td class="text-right">{{ number_format($item->bp_placed, 0, '.', '.') }}</td>
                                        <td class="text-right">{{ number_format($item->payout, 0, '.', '.') }}</td>
                                        <td class="text-right">{{ number_format($item->our_net, 0, '.', '.') }}</td>
                                        <td class="text-right">{{ number_format($item->our_net_rp, 0, '.', '.') }}</td>
                                    </tr>
                                    @endforeach
                                    <tr class="table-warning">
                                        <td>Total</td>
                                        <td class="text-right">{{ number_format($events->sum('bp_placed'), 0, '.', '.') }}</td>
                                        <td class="text-right">{{ number_format($events->sum('payout'), 0, '.', '.') }}</td>
                                        <td class="text-right">{{ number_format($events->sum('our_net'), 0, '.', '.') }}</td>
                                        <td class="text-right">{{ number_format($events->sum('our_net_rp'), 0, '.', '.') }}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td colspan="99" class="o3 text-italic">no data</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12 ">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            @if(count($events) > 0)
                            <li class="page-item"><a class="page-link" href="@if($events->currentPage() === 1)#@else{{ url('admin-tkmu/reports?start_date='.app('request')->input('start_date').'&end_date='.app('request')->input('end_date').'&page='.($events->currentPage() - 1)) }}@endif">Previous</a></li>
                            @for ($i = 1; $i <= $events->lastPage(); $i++)
                                <li class="page-item @if($events->currentPage() === $i) active @endif"><a class="page-link" href="{{ url('admin-tkmu/reports?start_date='.app('request')->input('start_date').'&end_date='.app('request')->input('end_date').'&page='.$i) }}">{{ $i }}</a></li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="@if($events->currentPage() === $events->lastPage())#@else{{ url('admin-tkmu/reports?start_date='.app('request')->input('start_date').'&end_date='.app('request')->input('end_date').'&page='.($events->currentPage() + 1)) }}@endif">Next</a></li>
                            @else
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            @endif
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

        // invalid-range
        
        // page specific scripts
        $('.btn-filter').on('click', function(e) {
            e.preventDefault();
            var startDate = $('#ep_filter_startdate').val();
            var endDate = $('#ep_filter_enddate').val();

            var startDay = new Date(startDate);
            var endDay = new Date(endDate);
            var millisecondsPerDay = 1000 * 60 * 60 * 24;

            var millisBetween = endDay.getTime() - startDay.getTime();
            var days = millisBetween / millisecondsPerDay;

            // if(days > 30) {
            //     $('#invalid-range').modal('show');
            // } else {
                var urlString = ("{{ url('admin-tkmu/reports') }}?start_date="+startDate+"&end_date="+endDate).replace(/&amp;/g, '&');
                location.href = urlString;
            // }
        })

    })
</script>
@endsection