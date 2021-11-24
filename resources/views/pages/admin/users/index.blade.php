@extends('layouts.admin.app')

@php
    $currentUrl = substr(\Request::getRequestUri(), strpos(\Request::getRequestUri(), request()->path()));
    $url = $currentUrl;
    if(strpos($currentUrl, '&page') > 0) {
        $url = substr($currentUrl, 0, strpos($currentUrl, '&page'));
    }
@endphp

@section('content')
<section id="content">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Members</h3>
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
                            <button type="button" class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#search-user-by-username"><i data-feather="search" class="btn-icon left"></i>Search users</button>
                        </div>
                        <div class="form-group">
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-sm btn-block btn-light dropdown-toggle" data-toggle="dropdown">Sort by</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('admin-tkmu/users?filter=lp') }}">Highest LP</a>
                                    <a class="dropdown-item" href="{{ url('admin-tkmu/users?filter=bp') }}">Highest BP</a>
                                    <a class="dropdown-item" href="{{ url('admin-tkmu/users?filter=coin') }}">Highest Coin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    @if(count($users) > 0)
                    <div class="table-meta grey text-italic">Showing <span class="black">{{ count($users->items()) }}</span> out of <span class="black">{{ $users->total() }}</span> members</div>
                    @else
                    <div class="table-meta grey text-italic">Showing <span class="black">0</span> out of <span class="black">0</span> members</div>
                    @endif
                </div>

                <div class="col-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0 dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th class="w-20">Phone</th>
                                        <th class="w-20">Email</th>
                                        <th class="w-5">LP</th>
                                        <th class="w-5">BP</th>
                                        <th class="w-5">Coins</th>
                                        <th class="w-20">Registration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $item)
                                        <tr class="cursor-ptr">
                                            <td><span class="o3 mr-1">[{{ $item->id }}]</span></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>{{ $item->username }}</span></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item user-detail-by-id-btn" href="#" data-toggle="modal" data-target="#member-stats" data-user="{{ $item->id }}">View quick stats</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/users/'.$item->id) }}">View page</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/lp-transaction-member?username='.$item->username) }}">View LP transactions</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/report-participants?username='.$item->username) }}">View all bets</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/transactions-member?username='.$item->username) }}">View all topups</a>
                                                        <a class="dropdown-item" href="{{ url('admin-tkmu/transactions-historical-member?username='.$item->username) }}">View historical</a>
                                                    </div>
                                                </div>
                                            </td>
                                            @if($item->phone_verified)
                                            <td><span class="verify-indicator green"></span>{{ $item->phone ? '0'.$item->phone : 'not set' }}</td>
                                            @else
                                            <td><span class="verify-indicator red"></span>{{ $item->phone ? '0'.$item->phone : 'not set' }}</td>
                                            @endif

                                            @if($item->email_verified)
                                            <td><span class="verify-indicator green"></span>{{ $item->email }}</td>
                                            @else
                                            <td><span class="verify-indicator red"></span>{{ $item->email }}</td>
                                            @endif

                                            <td class="text-right">{{ number_format($item->total_lp, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                            <td class="text-right">{{ number_format($item->total_bp, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                            <td class="text-right">{{ number_format($item->total_coin, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i:s') }}</td>
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
                            @if(count($users) > 0)
                            @if(app('request')->input('filter'))
                            <li class="page-item"><a class="page-link" href="@if($users->currentPage() === 1)#@else{{ url($url.'&page='.($users->currentPage() - 1)) }}@endif">Previous</a></li>
                            @foreach ($users->links()->elements as $pg)
                                @if(is_array($pg))
                                @foreach ($pg as $idx => $itmpg)
                                    <li class="page-item @if($users->currentPage() === $idx) active @endif"><a class="page-link" href="{{ url($url.'&page='.$idx) }}">{{ $idx }}</a></li>
                                @endforeach
                                @elseif(is_string($pg))
                                <li class="page-item"><a class="page-link" href="#">{{ $pg }}</a></li>
                                @endif
                            @endforeach
                            <li class="page-item"><a class="page-link" href="@if($users->currentPage() === $users->lastPage())#@else{{ url($url.'&page='.($users->currentPage() + 1)) }}@endif">Next</a></li>
                            @else
                            <li class="page-item"><a class="page-link" href="@if($users->currentPage() === 1)#@else{{ url($url.'&page='.($users->currentPage() - 1)) }}@endif">Previous</a></li>
                            @foreach ($users->links()->elements as $pg)
                                @if(is_array($pg))
                                @foreach ($pg as $idx => $itmpg)
                                    <li class="page-item @if($users->currentPage() === $idx) active @endif"><a class="page-link" href="{{ url('admin-tkmu/users?page='.$idx) }}">{{ $idx }}</a></li>
                                @endforeach
                                @elseif(is_string($pg))
                                <li class="page-item"><a class="page-link" href="#">{{ $pg }}</a></li>
                                @endif
                            @endforeach
                            <li class="page-item"><a class="page-link" href="@if($users->currentPage() === $users->lastPage())#@else{{ url('admin-tkmu/users?page='.($users->currentPage() + 1)) }}@endif">Next</a></li>
                            @endif
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
            if(username !== '') {
                location.href = ("{{ url('admin-tkmu/users') }}?username="+username).replace(/&amp;/g, '&');
            }
        })

    })
</script>
@endsection