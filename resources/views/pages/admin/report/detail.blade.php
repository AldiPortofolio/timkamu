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

                @if($event->type !== 'DONE')
                <div class="col-12 mb-10">
                    <h6>Report not available</h6>
                    <p>Event has not been moved to past.</p>
                </div>
                @else
                <div class="col-12 mb-10">
                    <h6>Summary</h6>
                    @if($event->league_game_id)
                    <div class="table-meta grey text-italic">Showing event <span class="black">{{ $event->name }}({{ $event->league_games->leagues->name }} - {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }})</span></div>
                    @else
                    <div class="table-meta grey text-italic">Showing event <span class="black">{{ $event->name }}({{ \Carbon\Carbon::parse($event->end_date)->format('d M Y H:i') }})</span></div>
                    @endif
                </div>

                <div class="col-6 mb-30">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="w-5"></th>
                                        <th class="w-10">BP Placed</th>
                                        <th class="w-10">Payout</th>
                                        <th class="w-10">Net</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>BP</td>
                                        <td class="text-right">{{ number_format($total_bp_place, 0, '.', '.') }}</td>
                                        <td class="text-right">{{ number_format($total_outcome, 0, '.', ',') }}</td>
                                        <td class="text-right">{{ number_format(($total_bp_place - $total_outcome), 0, '.', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rupiah</td>
                                        <td class="text-right">{{ number_format(($total_bp_place*1000), 0, '.', '.') }}</td>
                                        <td class="text-right">{{ number_format(($total_outcome*1000), 0, '.', '.') }}</td>
                                        <td class="text-right">{{ number_format((($total_bp_place - $total_outcome)*1000), 0, '.', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-6 mb-30">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th class="w-10">Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Total bets placed</td>
                                        <td class="text-right">{{ $total_bet }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    <h6>Category & Rule Breakdown</h6>
                    <div class="table-meta grey text-italic">Showing event <span class="black">{{ $event->name }}({{ $event->league_game_id ? $event->league_games->leagues->name.' - ' : '' }}{{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }})</span></div>
                </div>

                <div class="col-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Category - Rule</th>
                                        <th class="w-10">Bets Placed</th>
                                        <th class="w-10">True</th>
                                        <th class="w-10">Bonus</th>
                                        <th class="w-10">BP Placed</th>
                                        <th class="w-10">Payout</th>
                                        <th class="w-10">Profit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($array_product as $item)
                                        @if($item['total_bet'] > 0)
                                        <tr>
                                            <td>{{ $item['name'] }} (Result : {{ $event->result_winner }})</td>
                                            <td class="text-right">{{ number_format($item['total_bet'], 0, '.', ',') }}</td>
                                            <td class="@if($item['guess'] === 'Yes') table-success @else table-warning @endif">{{ $item['guess'] }}</td>
                                            <td class="text-right">{{ $item['bonus'] }}%</td>
                                            <td class="text-right">{{ number_format($item['total_bp'], 0, '.', ',') }}</td>
                                            <td class="text-right"><span class="o5"></span>{{ number_format($item['total_outcome'], 0, '.', ',') }}</td>
                                            <td class="text-right">{{ number_format(($item['total_bp'] - $item['total_outcome']), 0, '.', ',') }}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    <tr class="table-warning">
                                        <td>Total bets placed</td>
                                        <td class="text-right">{{ $total_bet }}</td>
                                        <td colspan="2">Total BP</td>
                                        <td class="text-right">{{ number_format($total_bp_place, 0, '.', ',') }}</td>
                                        <td class="text-right">{{ number_format($total_outcome, 0, '.', ',') }}</td>
                                        <td class="text-right">{{ number_format($total_bp_place - $total_outcome, 0, '.', ',') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif

                <div class="col-12 mb-10">
                    <h6>Event participants</h6>
                    @if($event->league_game_id)
                    <div class="table-meta grey text-italic">Showing event <span class="black">{{ $event->name }}({{ $event->league_games->leagues->name }} - {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }})</span></div>
                    @else
                    <div class="table-meta grey text-italic">Showing event <span class="black">{{ $event->name }}({{ \Carbon\Carbon::parse($event->end_date)->format('d M Y H:i') }})</span></div>
                    @endif
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Category Name</th>
                                        <th>Rule</th>
                                        <th>Bonus</th>
                                        <th>Status</th>
                                        <th>BP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data_user) > 0)
                                    @foreach (collect($data_user)->sortByDesc('value_detail.value') as $key => $item)
                                        <tr>
                                            <td><span class="o3 mr-1">[{{ $item['user_id'] }}]</span></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>{{ $item['user'] }}</span></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item user-detail-by-id-btn" href="#" data-toggle="modal" data-target="#member-stats" data-user="{{ $item['user_id'] }}">View quick stats</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/users/'.$item['user_id']) }}">View page</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/lp-transaction-member?username='.$item['user']) }}">View LP transactions</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/report-participants?username='.$item['user']) }}">View all bets</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/transactions-member?username='.$item['user']) }}">View all topups</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/transactions-historical-member?username='.$item['user']) }}">View historical</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item['category'] }}</td>
                                            <td>{{ $item['choose'] }}</td>
                                            <td class="text-right">{{ $item['value_detail']->bonus }}%</td>
                                            @if($item['type'] === 'WIN')
                                            <td class="table-success">Menang</td>
                                            @elseif($item['type'] === 'LOSS')
                                            <td class="table-warning">Kalah</td>
                                            @else
                                            <td>Not calculated</td>
                                            @endif
                                            <td class="text-right">{{ number_format($item['value_detail']->value, 0, '.', '.') }}</td>
                                        </tr>
                                    @endforeach
                                    <tr class="table-warning">
                                        <td colspan="6">Total</td>
                                        <td class="text-right">{{ number_format(($total_bp_all), 0, '.', '.') }}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td colspan="99"><em class="o5">no data</em></td>
                                    </tr>
                                    @endif
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
        // var table, rows, switching, i, x, y, shouldSwitch;
        // table = document.getElementById("table-bet-categories");
        // switching = true;
        // /*Make a loop that will continue until
        // no switching has been done:*/
        // while (switching) {
        //     //start by saying: no switching is done:
        //     switching = false;
        //     rows = table.rows;
        //     /*Loop through all table rows (except the
        //     first, which contains table headers):*/
        //     for (i = 1; i < (rows.length - 1); i++) {
        //     //start by saying there should be no switching:
        //         shouldSwitch = false;
        //         /*Get the two elements you want to compare,
        //         one from current row and one from the next:*/
        //         x = rows[i].getElementsByTagName("TD")[3];
        //         y = rows[i + 1].getElementsByTagName("TD")[3];

        //         xWords = x.innerHTML.replace(/[^0-9]/gi, '');
        //         yWords = y.innerHTML.replace(/[^0-9]/gi, '');

        //         //check if the two rows should switch place:
        //         if (parseInt(xWords, 10) < parseInt(yWords, 10)) {
        //             //if so, mark as a switch and break the loop:
        //             shouldSwitch = true;
        //             break;
        //         }
        //     }
        //     if (shouldSwitch) {
        //         /*If a switch has been marked, make the switch
        //         and mark that a switch has been done:*/
        //         rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        //         switching = true;
        //     }
        // }

    })
</script>
@endsection