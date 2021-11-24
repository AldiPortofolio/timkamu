@extends('layouts.admin.app')

@section('content')

@php
    $currentUrl = substr(\Request::getRequestUri(), strpos(\Request::getRequestUri(), request()->path()));
    $url = $currentUrl;
    $page = app('request')->input('page') ?? 1;
    if(strpos($currentUrl, '&page') > 0) {
        $url = substr($currentUrl, 0, strpos($currentUrl, '&page'));
    }
@endphp

<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Event Participants</h3>
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
                            <input type="text" class="form-control form-control-sm h-100 first-focus" id="username" placeholder="username" value="{{ app('request')->input('username') }}">
                        </div>
                        <div class="form-group mb-0">
                            <select class="form-control form-control-sm h-100" id="event">
                                <option @if(app('request')->input('event') === null) selected @endif>All events</option>
                                <option disabled>--- 20 most recent events ---</option>
                                @foreach ($all_events->sortByDesc('id') as $itm)
                                <option value="{{ $itm->id }}" @if((int)app('request')->input('event') === $itm->id) selected @endif>[#{{ $itm->id }}] {{ $itm->name }} - {{ \Carbon\Carbon::parse($itm->start_date)->format('D M Y H:i') }} {{ $itm->league_game_id ? '- '.$itm->league_games->leagues->name : '' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success btn-filter">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-4 mb-0">
                            <div class="table-meta grey text-italic">Showing <span class="black">{{ count($data_user) }}</span> out of <span class="black">{{ $total_data }}</span> transactions</div>
                        </div>

                        <div class="col-8 mb-00 text-right">
                            <div class="table-meta grey text-italic mb-10">Showing betters for <span class="black">@if(($current_events)) {{ $current_events->name }}({{ $current_events->league_game_id ? $current_events->league_games->leagues->name.' - ' : '' }}{{ \Carbon\Carbon::parse($current_events->start_date)->format('d M Y H:i') }}) @else All Event @endif</span> </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>[Event ID] Event Name</th>
                                        <th>Category Name</th>
                                        <th>Rule</th>
                                        <th>Bonus</th>
                                        <th>Status</th>
                                        <th>BP Placed</th>
                                        <th>Payout</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_payout = 0;
                                    @endphp
                                    @if(count($data_user) > 0)
                                    @foreach ($data_user as $key => $item)
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
                                            <td>
                                                {!! $item['event'] !!}
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

                                            @if($item['type'] === 'WIN')
                                            @php
                                                $total_payout += $item['value_detail']->win;
                                            @endphp
                                            <td class="text-right">{{ number_format($item['value_detail']->win, 0, '.', '.') }}</td>
                                            @elseif($item['type'] === 'LOSS')
                                            <td class="text-right">0</td>
                                            @else
                                            <td>Not calculated</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    <tr class="table-warning">
                                        <td colspan="7">Total</td>
                                        <td class="text-right">{{ number_format(($total_bp_all), 0, '.', '.') }}</td>
                                        <td class="text-right">{{ number_format(($total_payout), 0, '.', '.') }}</td>
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

                <div class="col-12 ">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            @if(count($data_user) > 0)
                            <li class="page-item"><a class="page-link" href="@if((int)app('request')->input('page') === 1)#@else{{ url($url.'&page='.((app('request')->input('page')) - 1)) }}@endif">Previous</a></li>
                            @for ($i = 1; $i <= $total_pages; $i++)
                                <li class="page-item @if((int)(app('request')->input('page')) === $i) active @endif"><a class="page-link" href="{{ url($url.'&page='.$i) }}">{{ $i }}</a></li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="@if((int)(app('request')->input('page')) === (int)$total_pages)#@else{{ url($url.'&page='.((app('request')->input('page')) + 1)) }}@endif">Next</a></li>
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
        
        // page specific scripts
        $('body').on('click', '.btn-filter', function(e) {
            e.preventDefault();
            
            var username = $('#username').val();
            var event = $('#event').val();

            if(username !== '' && event !== '' && event !== 'All events') {
                location.href = ("{{ url('admin-tkmu/report-participants') }}?event="+event+"&username="+username).replace(/&amp;/g, '&');
            } else if(username !== '' && event === 'All events') {
                location.href = ("{{ url('admin-tkmu/report-participants') }}?username="+username).replace(/&amp;/g, '&');
            } else if(username === '' && event !== '' && event !== 'All events' ) {
                location.href = ("{{ url('admin-tkmu/report-participants') }}?event="+event).replace(/&amp;/g, '&');
            } else if(username === '' && event !== 'All events') {
                return false;
            }
        })

    })
</script>
@endsection