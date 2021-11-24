@extends('layouts.admin.app')

@php
    $currentUrl = substr(\Request::getRequestUri(), strpos(\Request::getRequestUri(), request()->path()));
    $url = $currentUrl;
    $page = app('request')->input('page') ?? 1;
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
                    <h3 class="mb-00">All Top Ups</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 mb-20">
                    <div class="flex-page-filter">
                        <div class="form-group mb-0">
                            <select class="form-control form-control-sm" id="filter-type">
                                <option value="game" @if(Request::is('admin-tkmu/transactions/game')) selected @endif>Game Topups</option>
                                <option value="pulsa" @if(Request::is('admin-tkmu/transactions/pulsa')) selected @endif>Isi Pulsa</option>
                                <option value="token" @if(Request::is('admin-tkmu/transactions/token')) selected @endif>Token PLN</option>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <select class="form-control form-control-sm" id="filter-status">
                                <option value="pending" @if(!app('request')->input('status') || app('request')->input('status') === 'pending') selected @endif>Pending</option>
                                <option value="done" @if(app('request')->input('status') === 'done') selected @endif>Done</option>
                                <option value="rejected" @if(app('request')->input('status') === 'rejected') selected @endif>Rejected</option>
                                <option value="refund" @if(app('request')->input('status') === 'refund') selected @endif>Refund</option>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success btn-filter">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    <div class="table-meta grey text-italic">Showing <span class="black">{{ $page ?? 1 }}</span> out of <span class="black">{{ $total_pages ?? 0 }}</span> pages</div>
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Tools</th>
                                        <th>Status</th>
                                        <th>[ID] Purchase Date</th>
                                        <th>Order ID</th>
                                        <th>Buyer Info (Member)</th>
                                        <th>ID Player/ Pelanggan</th>
                                        <th>Purchase Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $key => $item)
                                    @php
                                        $detail = json_decode($item['desc']);
                                        $userInfo = '-';
                                        if(isset($detail->user_id)) {
                                            $userInfo = $detail->user_id.'('.$detail->server_id.')';
                                            if($item['type'] === 'pubgm' || $item['type'] === 'freefire' || $item['type'] === 'valorant' || $item['type'] === 'ragnarok') {
                                                $userInfo = $detail->id_pemain ?? '';
                                            }
                                        } else if(isset($detail->id_pemain)) {
                                            $userInfo = $detail->id_pemain;
                                        } else if(isset($detail->id_pelanggan)) {
                                            $userInfo = $detail->id_pelanggan;
                                        }

                                        $userPhone = $item['phone'];
                                        if($item['phone'] === null) {
                                            $userPhone = $item['user_phone'];
                                        }

                                        $type = strtoupper($item['type']);
                                        if($item['type'] === 'freefire') {
                                            $type = 'Free Fire';
                                        } else if($item['type'] === 'google-play') {
                                            $type = 'Google Play';
                                        }
                                        $product = $detail->product ?? $item['name'].'('.$type.')';
                                    @endphp
                                    <tr class="@if($item['status'] === 'DONE') table-success @elseif($item['status'] === 'REFUND') table-warning @elseif($item['status'] === 'REJECTED') table-danger @endif" id="transaction-{{ $item['id'] }}">
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options</a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item btn-approve" href="#" data-url="{{ url('admin-tkmu/transactions/'.$item['id']) }}">Mark as done</a>
                                                    <a class="dropdown-item btn-reject" href="#" data-toggle="modal" data-target="#top-up-reject-modal" data-url="{{ url('admin-tkmu/transactions/'.$item['id']) }}">Reject</a>
                                                    <a class="dropdown-item btn-refund" href="#" data-url="{{ url('admin-tkmu/transactions/'.$item['id']) }}">Refund</a>
                                                    <a class="dropdown-item" href="{{ url('admin-tkmu/transactions-member?username='.$item['username']) }}">Check all purchase by this Member</a>
                                                    <a class="dropdown-item" href="{{ url('admin-tkmu/transactions-detail?type='.$item['type'].'&data='.($userInfo === '-' ? $userPhone : $userInfo)) }}">Check all purchase for this Player ID</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="item-status">
                                            @if($item['status'] === 'DONE') Done
                                            @elseif($item['status'] === 'PAID') Pending
                                            @elseif($item['status'] === 'REFUND') Refund
                                            @elseif($item['status'] === 'REJECTED') Rejected<br>Reason: {{ $item['reason'] }}
                                            @endif
                                        </td>
                                        <td><span class="o3">[{{ $item['id'] }}]</span> {{ \Carbon\Carbon::parse($item['created_at'])->format('d-m-Y H:i') }}</td>
                                        <td>{{ $item['transaction_number'] }}</td>
                                        @if($item['username'])
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>{{ $item['username'] }} </span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item user-detail-by-id-btn" href="#" data-toggle="modal" data-target="#member-stats" data-user="{{ $item['user_id'] }}">View quick stats</a>
                                                    <a class="dropdown-item" href="{{ url('admin-tkmu/users/'.$item['user_id']) }}">View page</a>
                                                    <a class="dropdown-item" href="{{ url('admin-tkmu/lp-transaction-member?username='.$item['username']) }}">View LP transactions</a>
                                                    <a class="dropdown-item" href="{{ url('admin-tkmu/report-participants?username='.$item['username']) }}">View all bets</a>
                                                    <a class="dropdown-item" href="{{ url('admin-tkmu/transactions-member?username='.$item['username']) }}">View all topups</a>
                                                    <a class="dropdown-item" href="{{ url('admin-tkmu/transactions-historical-member?username='.$item['username']) }}">View historical</a>
                                                </div>
                                            </div>
                                            @if($item['user_phone'])({{ '0'.$item['user_phone'] }})@endif<br>
                                            <span class="o3">{{ $item['email'] }}</span>
                                        </td>
                                        @else
                                        <td>Guest - {{ '0'.$userPhone }}</td>
                                        @endif
                                        <td>
                                            @if($item['type'] === 'telkomsel' || $item['type'] === 'xl' || $item['type'] === 'tri' || $item['type'] === 'google-play')
                                            {{ '0'.$userPhone }}
                                            @else
                                            {{ $userInfo }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $product }} <br>
                                            <span class="o3">Buy using</span>
                                            @if($item['payment_type'] === 'LP')
                                            {{ number_format($item['total_price'], 0, '.', ',') }} <span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span>
                                            @elseif($item['payment_type'] === 'DANA' || $item['payment_type'] === 'GOPAY' || $item['payment_type'] === 'OVO' || $item['payment_type'] === 'SHOPEE')
                                            Rp {{ number_format($item['total_price'], 0, '.', ',') }} {{ $item['payment_type'] }}
                                            @endif
                                        </td>
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
                            @if(count($items) > 0)
                            <li class="page-item"><a class="page-link" href="@if((int)$page === 1)#@else{{ url($url.'&page='.(($page) - 1)) }}@endif">Previous</a></li>
                            @for ($i = 1; $i <= $total_pages; $i++)
                                <li class="page-item @if((int)($page) === $i || (!$page && $i === 1)) active @endif"><a class="page-link" href="{{ url($url.'&page='.$i) }}">{{ $i }}</a></li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="@if((int)($page) === (int)$total_pages)#@else{{ url($url.'&page='.(($page) + 1)) }}@endif">Next</a></li>
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

<section class="page-modals">
    <div class="modal" id="top-up-reject-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reject Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Reason for rejecting this purchase:</label>
                        <input type="text" name="reason" id="input-reason" class="form-control form-control-sm first-focus">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary" id="btn-confirm-reject">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script>
        var status = "{{ app('request')->input('status') }}"
        $('.btn-approve').on('click', function(e){
            e.preventDefault();

            var url = $(this).data('url');
            var btnUpdate = $(this)

            $.ajax({
                url: url,
                method: 'post',
                data : {
                    status : 'approve'
                },
                success: function(result) {
                    if(result.status === 'success') {
                        btnUpdate.removeClass('active');
                        btnUpdate.closest('tr').find('.item-status').text('Done');
                        btnUpdate.closest('tr').addClass('table-success');
                    }                
                }
            })
        })

        $('.btn-refund').on('click', function(e){
            e.preventDefault();

            var url = $(this).data('url');
            var btnUpdate = $(this)

            $.ajax({
                url: url,
                method: 'post',
                data : {
                    status : 'refund'
                },
                success: function(result) {
                    if(result.status === 'success') {
                        btnUpdate.removeClass('active');
                        btnUpdate.closest('tr').find('.item-status').text('Refunded');
                        btnUpdate.closest('tr').addClass('table-warning');
                    }                
                }
            })
        })


        var urlReject = '';
        var rowDetailReject = '';
        $('.btn-reject').on('click', function(e){
            e.preventDefault();

            var btnUpdate = $(this);
            urlReject = $(this).data('url');
            rowDetailReject = btnUpdate.closest('tr').attr('id');
        })

        $('body').on('click', '#btn-confirm-reject', function(e) {
            e.preventDefault();

            var reason = $('#input-reason').val();
            var target = $('#top-up-reject-modal');

            $.ajax({
                url: urlReject,
                method: 'post',
                data : {
                    status : 'rejected',
                    reason : reason
                },
                success: function(result) {
                    console.log(result);
                    target.modal('hide');
                    if(result.status === 'success') {
                        $('#'+rowDetailReject).find('.item-status').html('Rejected<br>Reason: '+ reason);
                        $('#'+rowDetailReject).addClass('table-danger');
                    }                
                }
            })
        })

        $('.btn-filter').on('click', function(e) {
            e.preventDefault();

            var type = $('#filter-type').val();
            var status = $('#filter-status').val();

            location.href = "{{ url('admin-tkmu/transactions') }}/"+type+"?status="+status;
        })
    </script>
@endsection