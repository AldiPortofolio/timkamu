@extends('layouts.admin.app')

@section('content')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Member Historical Transactions</h3>
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

                            @if(!app('request')->input('username'))
                            <!-- kalau blm ada parameter username -->
                            <a href="#" class="btn btn-sm btn-block btn-light" data-toggle="modal" data-target="#search-user-by-username"><i data-feather="search" class="btn-icon left"></i>Search user</a>
                            @else

                            <!-- kalau sudah ada parameter username -->
                            <a href="#" class="btn btn-sm btn-block btn-light" data-toggle="modal" data-target="#search-user-by-username"><i data-feather="user" class="btn-icon left"></i>{{ $data_user->username }}</a>
                            @endif
                        </div>
                        <div class="form-group mb-0">
                            <input type="month" class="form-control form-control-sm" name="filter" id="filter-value" @if(app('request')->input('filter')) value="{{ app('request')->input('filter') }}" @else value="{{ \Carbon\Carbon::now()->format('Y-m') }}" @endif>
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success btn-filter">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    @if(app('request')->input('filter'))
                    <div class="table-meta grey text-italic">Showing <span class="black">All</span> transactions for user <span class="black">{{ $data_user->username }}</span> in the month of <span class="black">{{ \Carbon\Carbon::parse(app('request')->input('filter'))->format('M Y') }}</span></div>
                    @endif
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="w-20">Time</th>
                                        <th>Activity</th>
                                        <th class="w-10">LP</th>
                                        <th class="w-10">BP</th>
                                        <th class="w-10">Coin</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(!app('request')->input('username'))
                                    <!-- kalau blm ada parameter username -->
                                    <tr>
                                        <td colspan="99" class="o3"><em>No data. Please search for a user first.</em></td>
                                    </tr>

                                    @else
                                    <!-- kalau sudah ada parameter username -->
                                    <tr>
                                        @if(app('request')->input('filter'))
                                        <td>{{ \Carbon\Carbon::parse(app('request')->input('filter'))->firstOfMonth()->format('d M Y') }} <span class="o3">00.00</span></td>
                                        @else
                                        <td>{{ \Carbon\Carbon::now()->firstOfMonth()->format('d M Y') }} <span class="o3">00.00</span></td>
                                        @endif
                                        <td>Last month's balance</td>
                                        <td class="text-right">{{ number_format($total_lp_last_month, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                        <td class="text-right">{{ number_format($total_bp_last_month, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                        <td class="text-right">{{ number_format($total_coin_last_month, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    @php
                                        $total_lp_this_month = 0;
                                        $total_bp_this_month = 0;
                                        $total_coin_this_month = 0;
                                    @endphp
                                    @for ($i = 0; $i < count($items); $i++)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($items[$i]->created_at)->format('d M Y') }} <span class="o3">{{ \Carbon\Carbon::parse($items[$i]->created_at)->format('H:i') }}</span></td>
                                            @if(strpos($items[$i], 'Convert') > 0)
                                                <td>Conversion</td>
                                                @if($items[$i]->item_id === 1 || $items[$i+1]->item_id === 1) 
                                                <td class="text-right">
                                                    @if($items[$i]->item_id === 1)
                                                        @if($items[$i]->type === 'DB')
                                                            @php
                                                                $total_lp_this_month -= $items[$i]->value;
                                                            @endphp
                                                        - 
                                                        @else
                                                            @php
                                                                $total_lp_this_month += $items[$i]->value;
                                                            @endphp
                                                        @endif
                                                        {{ number_format($items[$i]->value, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span>
                                                    @elseif($items[$i+1]->item_id === 1) 
                                                        @if($items[$i+1]->type === 'DB')
                                                            @php
                                                                $total_lp_this_month -= $items[$i+1]->value;
                                                            @endphp
                                                        - 
                                                        @else
                                                            @php
                                                                $total_lp_this_month += $items[$i+1]->value;
                                                            @endphp
                                                        @endif
                                                    {{ number_format($items[$i+1]->value, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span>
                                                    @endif
                                                </td>
                                                @else
                                                <td></td>
                                                @endif

                                                @if($items[$i]->item_id === 2 || $items[$i+1]->item_id === 2)
                                                <td class="text-right">
                                                    @if($items[$i]->item_id === 2)
                                                        @if($items[$i]->type === 'DB')
                                                            @php
                                                                $total_bp_this_month -= $items[$i]->value;
                                                            @endphp
                                                        - 
                                                        @else
                                                            @php
                                                                $total_bp_this_month += $items[$i]->value;
                                                            @endphp
                                                        @endif
                                                    {{ number_format($items[$i]->value, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span>
                                                    @elseif($items[$i+1]->item_id === 2) 
                                                        @if($items[$i+1]->type === 'DB')
                                                            @php
                                                                $total_bp_this_month -= $items[$i+1]->value;
                                                            @endphp
                                                        - 
                                                        @else
                                                            @php
                                                                $total_bp_this_month += $items[$i+1]->value;
                                                            @endphp
                                                        @endif
                                                    {{ number_format($items[$i+1]->value, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span>
                                                    @endif
                                                </td>
                                                @else
                                                <td></td>
                                                @endif

                                                @if($items[$i]->item_id === 78 || $items[$i+1]->item_id === 78)
                                                <td class="text-right">
                                                    @if($items[$i]->item_id === 78)
                                                        @if($items[$i]->type === 'DB')
                                                            @php
                                                                $total_coin_this_month -= $items[$i]->value;
                                                            @endphp
                                                        - 
                                                        @else
                                                            @php
                                                                $total_coin_this_month += $items[$i]->value;
                                                            @endphp
                                                        @endif
                                                    {{ number_format($items[$i]->value, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span>
                                                    @elseif($items[$i+1]->item_id === 78)
                                                        @if($items[$i+1]->type === 'DB')
                                                            @php
                                                                $total_coin_this_month -= $items[$i+1]->value;
                                                            @endphp
                                                        - 
                                                        @else
                                                            @php
                                                                $total_coin_this_month += $items[$i+1]->value;
                                                            @endphp
                                                        @endif
                                                    {{ number_format($items[$i+1]->value, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span>
                                                    @endif
                                                </td>
                                                @else
                                                <td></td>
                                                @endif
                                                @php
                                                    $i++;
                                                @endphp
                                            @else
                                                @if($items[$i]->type === 'DB' && $items[$i]->item_id === 2 && (strpos($items[$i]->desc, 'Dukung Tim') > -1 || strpos($items[$i]->desc, 'Tebak') > -1 || strpos($items[$i]->desc, 'Skor Pertandingan') > -1) && strpos($items[$i]->desc, 'Place prediction') === -1)
                                                <td>Pemberian prediksi : {{ $items[$i]->desc }}</td>
                                                @else
                                                <td>{{ str_replace(']', '] ',$items[$i]->desc) }}</td>
                                                @endif

                                                @if($items[$i]->item_id === 1)
                                                <td class="text-right">
                                                    @if($items[$i]->type === 'DB')
                                                        @php
                                                            $total_lp_this_month -= $items[$i]->value;
                                                        @endphp
                                                    - 
                                                    @else
                                                        @php
                                                            $total_lp_this_month += $items[$i]->value;
                                                        @endphp
                                                    @endif
                                                    {{ number_format($items[$i]->value, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span>
                                                </td>
                                                @else
                                                <td></td>
                                                @endif

                                                @if($items[$i]->item_id === 2)
                                                <td class="text-right">
                                                    @if($items[$i]->type === 'DB')
                                                        @php
                                                            $total_bp_this_month -= $items[$i]->value;
                                                        @endphp
                                                    - 
                                                    @else
                                                        @php
                                                            $total_bp_this_month += $items[$i]->value;
                                                        @endphp
                                                    @endif
                                                    {{ number_format($items[$i]->value, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span>
                                                </td>
                                                @else
                                                <td></td>
                                                @endif

                                                @if($items[$i]->item_id === 78)
                                                <td class="text-right">
                                                    @if($items[$i]->type === 'DB')
                                                        @php
                                                            $total_coin_this_month -= $items[$i]->value;
                                                        @endphp
                                                    - 
                                                    @else
                                                        @php
                                                            $total_coin_this_month += $items[$i]->value;
                                                        @endphp
                                                    @endif
                                                    {{ number_format($items[$i]->value, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span>
                                                </td>
                                                @else
                                                <td></td>
                                                @endif
                                            @endif
                                        </tr> 
                                    @endfor
                                    <tr class="table-warning">
                                        <td colspan="2">Total</td>
                                        <td class="text-right">{{ number_format($total_lp_this_month + $total_lp_last_month, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                        <td class="text-right">{{ number_format($total_bp_this_month + $total_bp_last_month, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                        <td class="text-right">{{ number_format($total_coin_this_month + $total_coin_last_month, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
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

<section id="page-modals">

</section>

<style type="text/css">
    /*page specific css*/

</style>
@endsection
@section('js')
@if(app('request')->input('username'))
<script>
    $(document).ready(function() {
        
        $('body').on('click', '.btn-filter', function(e) {
            e.preventDefault();
            
            var filter = $('#filter-value').val();

            location.href = ("{{ url('admin-tkmu/transactions-historical-member?username='.$data_user->username) }}&filter="+filter).replace(/&amp;/g, '&');
        })

    })
</script>
@endif
@endsection