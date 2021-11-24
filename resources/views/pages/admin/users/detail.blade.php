@extends('layouts.admin.app')

@section('content')
<section id="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Member Detail <span class="o3">#{{ $data->id }}</span></h3>
                </div>
                <div class="col-6 text-right">
                    <h3 class="mb-0 o5">{{ $data->username }}</h3>
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
                             @if($data->active)
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#confirm-disable-login">Disable login</button>
                            @else
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirm-enable-login">Login disabled</button>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Options</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item user-detail-by-id-btn" href="#" data-toggle="modal" data-target="#member-stats" data-user="{{ $data->id }}">View quick stats</a>
                                    <a class="dropdown-item" href="{{ url('admin-tkmu/users/'.$data->id) }}">View page</a>
                                    <a class="dropdown-item" href="{{ url('admin-tkmu/lp-transaction-member?username='.$data->username) }}">View LP transactions</a>
                                    <a class="dropdown-item" href="{{ url('admin-tkmu/report-participants?username='.$data->username) }}">View all bets</a>
                                    <a class="dropdown-item" href="{{ url('admin-tkmu/transactions-member?username='.$data->username) }}">View all topups</a>
                                    <a class="dropdown-item" href="{{ url('admin-tkmu/transactions-historical-member?username='.$data->username) }}">View historical</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td>Username</td>
                                        <td class="text-right">{{ $data->username }}</td>
                                    </tr>
                                    <tr>
                                        <td>Registration</td>
                                        <td class="text-right">{{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        @if($data->email_verified)
                                        <td class="text-right">{{ $data->email }}<span class="verify-indicator right green"></span></td>
                                        @else
                                        <td class="text-right">{{ $data->email }}<span class="verify-indicator right red"></span></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        @if($data->phone_verified)
                                        <td class="text-right">{{ $data->phone ? '0'.$data->phone : 'not set' }}<span class="verify-indicator right green"></span></td>
                                        @else
                                        <td class="text-right">{{ $data->phone ? '0'.$data->phone : 'not set' }}<span class="verify-indicator right red"></span></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Total LP</td>
                                        <td class="text-right">{{ number_format($data->total_lp, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Total BP</td>
                                        <td class="text-right">{{ number_format($data->total_bp, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Total Coin</td>
                                        <td class="text-right">{{ number_format($data->total_coin, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Total EXP</td>
                                        <td class="text-right">{{ number_format($data->total_exp, 0, '.', ',') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td>Total LP recharge (count)</td>
                                        <td class="text-right">{{ number_format(count($data_transactions), 0, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total LP recharge (amount)</td>
                                        <td class="text-right">{{ number_format($data_transactions->sum('total'), 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td>Total slips</td>
                                        <td class="text-right">{{ number_format(count($data_event_transactions), 0, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total win slips</td>
                                        <td class="text-right">{{ number_format($data_event_transactions_win, 0, '.', ',') }} <span class="o3">({{ $percentage_win }}%)</span></td>
                                    </tr>
                                    <tr>
                                        <td>Total lose slips</td>
                                        <td class="text-right">{{ number_format($data_event_transactions_loss, 0, '.', ',') }} <span class="o3">({{ $percentage_loss }}%)</span></td>
                                    </tr>
                                    <tr>
                                        <td>Avg bet amount</td>
                                        <td class="text-right">{{ number_format($avg_amount, 2, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Biggest win </td>
                                        <td class="text-right">{{ number_format($biggest_win, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Biggest lose</td>
                                        <td class="text-right">{{ number_format($biggest_loss, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
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

<section id="page-modals">

    <div class="modal" id="confirm-disable-login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Disable login?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <p>Are you sure you want to disable login for this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="{{ url('admin-tkmu/users/'.$data->id.'/update-login') }}" class="btn btn-sm btn-primary">Confirm</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="confirm-enable-login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enable login?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <p>Are you sure you want to enable login for this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="{{ url('admin-tkmu/users/'.$data->id.'/update-login') }}" class="btn btn-sm btn-primary">Confirm</a>
                </div>
            </div>
        </div>
    </div>

</section>

<style type="text/css">
    /*page specific css*/
    .bet-category-td > a {
        margin-right: 15px;
        opacity: 0.5;
    }
    .tab-vert-item {
        display: block;
        padding: 6px 0;
        opacity: 0.5;
    }
    .tab-vert-item:hover,
    .tab-vert-item.active {
        opacity: 1;
    }
    .vert-panel-target {
        display: none;
    }
    .vert-panel-target.active {
        display: block;
    }
</style>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        
        // page specific scripts

        // vert nav btns
        $('body').on('click', '.tab-vert-item', function(e) {
            e.preventDefault();

            obj = $(this);
            obj2 = $('.tab-vert-item');
            obj3 = obj.attr('data-target');
            obj4 = $('.vert-panel-target');
            obj5 = $('.vert-panel-target.'+obj3);

            // do logic
            obj2.removeClass('active');
            obj.addClass('active');
            obj4.removeClass('active');
            obj5.addClass('active');

            console.log(obj3);
        });

    })
</script>
@endsection