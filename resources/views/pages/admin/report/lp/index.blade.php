@extends('layouts.admin.app')

@section('content')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">LP Recharge</h3>
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
                            <input type="month" class="form-control form-control-sm h-100" name="filter" id="filter-value" @if(app('request')->input('filter')) value="{{ app('request')->input('filter') }}" @else value="{{ \Carbon\Carbon::now()->format('Y-m') }}" @endif>
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success btn-filter">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    <div class="table-meta grey text-italic">Showing <span class="black">{{ count($transactions->items()) }}</span> out of <span class="black">{{ $transactions->total() }}</span> transactions</div>
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="w-20">Date</th>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th>Method</th>
                                        <th class="w-10">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $item)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                                            <td><span class="o3 mr-1">[{{ $item->users->id }}]</span></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>{{ $item->users->username }}</span></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item user-detail-by-id-btn" href="#" data-toggle="modal" data-target="#member-stats" data-user="{{ $item->users->id }}">View quick stats</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/users/'.$item->users->id) }}">View page</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/lp-transaction-member?username='.$item->users->username) }}">View LP transactions</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/report-participants?username='.$item->users->username) }}">View all bets</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/transactions-member?username='.$item->users->username) }}">View all topups</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/transactions-historical-member?username='.$item->users->username) }}">View historical</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item->users->phone }}</td>
                                            <td>{{ $item->payment_type }}</td>
                                            <td class="text-right">{{ $item->total }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12 ">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="@if($transactions->currentPage() === 1)#@else{{ url('admin-tkmu/lp-transaction?filter='.app('request')->input('filter').'&page='.($transactions->currentPage() - 1)) }}@endif">Previous</a></li>
                            @for ($i = 1; $i <= $transactions->lastPage(); $i++)
                                <li class="page-item @if($transactions->currentPage() === $i) active @endif"><a class="page-link" href="{{ url('admin-tkmu/lp-transaction?filter='.app('request')->input('filter').'&page='.$i) }}">{{ $i }}</a></li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="@if($transactions->currentPage() === $transactions->lastPage())#@else{{ url('admin-tkmu/lp-transaction?filter='.app('request')->input('filter').'&page='.($transactions->currentPage() + 1)) }}@endif">Next</a></li>
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
        
        $('body').on('click', '.btn-filter', function(e) {
            e.preventDefault();
            
            var filter = $('#filter-value').val();

            location.href = "{{ url('admin-tkmu/lp-transaction') }}?filter="+filter;
        })

    })
</script>
@endsection