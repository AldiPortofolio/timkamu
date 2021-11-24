@extends('layouts.admin.app')

@section('content')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Topup Overview</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h6 class="o5 mb-20">Number of topups</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-20">
                    <div class="flex-page-filter">
                        <div class="form-group mb-0">
                            <input type="date" class="form-control form-control-sm h-100" id="ep_filter_startdate" @if(app('request')->input('start_date')) value="{{ app('request')->input('start_date') }}" @else value="{{ \Carbon\Carbon::now()->firstOfMonth()->format('Y-m-d') }}"@endif>
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-light" disabled>to</button>
                        </div>
                        <div class="form-group mb-0">
                            <input type="date" class="form-control form-control-sm h-100" id="ep_filter_enddate" @if(app('request')->input('end_date')) value="{{ app('request')->input('end_date') }}" @else value="{{ \Carbon\Carbon::now()->lastOfMonth()->format('Y-m-d') }}"@endif>
                        </div>
                        <div class="form-group mb-0">
                            <select class="form-control form-control-sm" id="filter-type">
                                <option value="game" @if(app('request')->input('type') === 'game' || !app('request')->input('type')) selected @endif>Game Topups</option>
                                <option value="pulsa" @if(app('request')->input('type') === 'pulsa') selected @endif>Pulsa</option>
                                <option value="token" @if(app('request')->input('type') === 'token') selected @endif>PLN</option>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success btn-filter">Apply</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        @foreach ($type_topup as $item)
                                            <td colspan="2">{{ $item }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td></td>
                                        @foreach ($type_topup as $item)
                                            <td>Count</td>
                                            <td>Total</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>Pending</td>
                                        @foreach ($data_transactions as $dt)
                                            <td class="text-right">{{ number_format($dt['pending']['count'], 0, '.', ',') }}</td>
                                            <td class="text-right">Rp {{ number_format($dt['pending']['total'], 0, '.', ',') }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>Approved</td>
                                        @foreach ($data_transactions as $dt)
                                            <td class="text-right">{{ number_format($dt['approve']['count'], 0, '.', ',') }}</td>
                                            <td class="text-right">Rp {{ number_format($dt['approve']['total'], 0, '.', ',') }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>Rejected</td>
                                        @foreach ($data_transactions as $dt)
                                            <td class="text-right">{{ number_format($dt['rejected']['count'], 0, '.', ',') }}</td>
                                            <td class="text-right">Rp {{ number_format($dt['rejected']['total'], 0, '.', ',') }}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
        $('.btn-filter').on('click', function(e) {
            e.preventDefault();
            var startDate = $('#ep_filter_startdate').val();
            var endDate = $('#ep_filter_enddate').val();
            var type = $('#filter-type').val();

            var startDay = new Date(startDate);
            var endDay = new Date(endDate);
            var millisecondsPerDay = 1000 * 60 * 60 * 24;

            var millisBetween = endDay.getTime() - startDay.getTime();
            var days = millisBetween / millisecondsPerDay;

            // if(days > 30) {
            //     $('#invalid-range').modal('show');
            // } else {
                var urlString = ("{{ url('admin-tkmu/transactions-overview') }}?start_date="+startDate+"&end_date="+endDate+"&type="+type).replace(/&amp;/g, '&');
                location.href = urlString;
            // }
        })

    })
</script>
@endsection