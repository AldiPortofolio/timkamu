@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Event Performance (Event ID {{ $event->id }})</h6>
                    <i style="font-size: 12px">Event name: {{ $event->name }}({{ $event->league_games->leagues->name }} - {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }})</i>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <p><b>Summary</b></p>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">BP</th>
                                        <th class="text-center">RP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>A - Our Profit</td>
                                        <td>{{ number_format($total_income, 0, '.', '.') }}</td>
                                        <td>{{ number_format(($total_income*1000), 0, '.', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>B - Our Expense</td>
                                        <td>{{ number_format($total_outcome, 0, '.', '.') }}</td>
                                        <td>{{ number_format(($total_outcome*1000), 0, '.', '.') }}</td>
                                    </tr>
                                    <tr style="background: #ebdbb2;">
                                        <td><b>A - B (Net Profit)</b></td>
                                        <td><b>{{ number_format(($total_income - $total_outcome), 0, '.', '.') }}</b></td>
                                        <td><b>{{ number_format((($total_income - $total_outcome)*1000), 0, '.', '.') }}</b></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    {{-- <div class="row">
                        @foreach ($array_product->sortByDesc('total_bp') as $apw)
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $apw['name'] }}</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $apw['total_bp'] }} <span class="card-info-adds">Total BP</span><br>
                                                    {{ $apw['total_user'] }} <span class="card-info-adds">Total Users</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i data-feather="dollar-sign" class="feather-card-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> --}}
                    <br>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <p><b>Slip Menang</b></p>
                        </div>
                    </div>
                    {{-- <div class="row">
                        @foreach ($array_product_win as $apw)
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $apw['name'] }}</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $apw['total_bp'] }} <span class="card-info-adds">Total BP</span><br>
                                                    {{ $apw['total_outcome'] }} <span class="card-info-adds">Total Outcome</span><br>
                                                    {{ $apw['total_user'] }} <span class="card-info-adds">Total Users</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i data-feather="dollar-sign" class="feather-card-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Dukungan</th>
                                        <th class="text-center">Nilai</th>
                                        <th class="text-center">Bonus</th>
                                        <th class="text-center">Menang</th>
                                        <th class="text-center">Total Hasil</th>
                                        <th class="text-center">Our Expense (BP)</th>
                                        <th class="text-center">Our Expense (RP)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_user_win as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->user }}</td>
                                            @php
                                                $product = '';
                                                if($item->category_id === '1') {
                                                    $product = $event->{$item->value_detail->type}->name;
                                                } else if($item->category_id === '2') {
                                                    if ($item->value_detail->type === 'under') {
                                                        $product = 'Dibawah '.$item->value_detail_betrule->total;
                                                    } else {
                                                        $product = 'Diatas '.$item->value_detail_betrule->total;
                                                    }
                                                } else if($item->category_id === '3') {
                                                    $decode = json_decode($item->event_bet_rules->value_detail);
                                                    $product = $event->team_left->name . " " . $decode->team_left . " - " . $decode->team_right . " " . $event->team_right->name;
                                                }
                                            @endphp
                                            <td>{{ $item->category }} - {{ $product }}</td>
                                            <td>{{ number_format($item->value_detail->value, 0, '.', '.') }}</td>
                                            <td>{{ number_format($item->value_detail->bonus, 0, '.', '.') }}</td>
                                            <td>Ya</td>
                                            <td>{{ $item->value_detail->win }}</td>
                                            <td>{{ number_format($item->value_detail->win - $item->value_detail->value, 0, '.', '.') }}</td>
                                            <td>{{ number_format(($item->value_detail->win - $item->value_detail->value) * 1000, 0, '.', '.') }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6"></td>
                                        <td style="background: #ebdbb2;"><b>Total</b></td>
                                        <td style="background: #ebdbb2;"><b>{{ number_format($total_outcome, 0, '.', '.') }}</b></td>
                                        <td style="background: #ebdbb2;"><b>{{ number_format(($total_outcome*1000), 0, '.', '.') }}</b></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <p><b>Slip Kalah</b></p>
                        </div>
                    </div>
                    {{-- <div class="row">
                        @foreach ($array_product_loss as $apl)
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $apl['name'] }}</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $apl['total_bp'] }} <span class="card-info-adds">Total BP</span><br>
                                                    {{ $apl['total_income'] }} <span class="card-info-adds">Total Outcome</span><br>
                                                    {{ $apl['total_user'] }} <span class="card-info-adds">Total Users</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i data-feather="dollar-sign" class="feather-card-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Dukungan</th>
                                        <th class="text-center">Nilai</th>
                                        <th class="text-center">Bonus</th>
                                        <th class="text-center">Menang</th>
                                        <th class="text-center">Total Hasil</th>
                                        <th class="text-center">Our Profit (BP)</th>
                                        <th class="text-center">Our Profit (RP)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_user_lose as $key => $item)
                                        @php
                                            $product = '';
                                            if($item->category_id === '1') {
                                                $product = $event->{$item->value_detail->type}->name;
                                            } else if($item->category_id === '2') {
                                                if ($item->value_detail->type === 'under') {
                                                    $product = 'Dibawah '.$item->value_detail_betrule->total;
                                                } else {
                                                    $product = 'Diatas '.$item->value_detail_betrule->total;
                                                }
                                            } else if($item->category_id === '3') {
                                                $decode = json_decode($item->event_bet_rules->value_detail);
                                                $product = $event->team_left->name . " " . $decode->team_left . " - " . $decode->team_right . " " . $event->team_right->name;
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->user }}</td>
                                            <td>{{ $item->category }} - {{ $product }}</td>
                                            <td>{{ number_format($item->value_detail->value, 0, '.', '.') }}</td>
                                            <td>{{ number_format($item->value_detail->bonus, 0, '.', '.') }}</td>
                                            <td>Tidak</td>
                                            <td>{{ $item->value_detail->win }}</td>
                                            <td>{{ number_format($item->value_detail->value, 0, '.', '.') }}</td>
                                            <td>{{ number_format(($item->value_detail->value * 1000), 0, '.', '.') }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6"></td>
                                        <td style="background: #ebdbb2;"><b>Total</b></td>
                                        <td style="background: #ebdbb2;"><b>{{ number_format($total_income, 0, '.', '.') }}</b></td>
                                        <td style="background: #ebdbb2;"><b>{{ number_format(($total_income*1000), 0, '.', '.') }}</b></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Event Participant (Event ID {{ $event->id }}) - report as per {{ \Carbon\Carbon::now()->format('D, d M Y H:i') }}</h6>
                    <i style="font-size: 12px">Event name: {{ $event->name }}({{ $event->league_games->leagues->name }} - {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }})</i>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p><b>Event Participant</b></p>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Time of purchase</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Slip name</th>
                                        <th class="text-center">Bonus</th>
                                        <th class="text-center">BP</th>
                                        <th class="text-center">BP + Bonus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $data_incoming =  collect(array_merge((array) $data_user_lose, (array) $data_user_win));
                                        $idx = 0;
                                    @endphp
                                    @foreach ($data_incoming->sortBy('created_at') as $key => $item)
                                        <tr>
                                            <td>{{ $idx+1 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}</td>
                                            <td>{{ $item->user }}</td>
                                            <td>{{ $item->user_email}}</td>
                                            <td>{{ $item->category }}</td>
                                            <td>{{ number_format($item->value_detail->bonus, 0, '.', '.') }}</td>
                                            <td>{{ number_format($item->value_detail->value, 0, '.', '.') }}</td>
                                            <td>{{ number_format($item->value_detail->win, 0, '.', '.') }}</td>
                                        </tr>
                                        @php
                                            $idx++;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="5"></td>
                                        <td style="background: #ebdbb2;"><b>Total</b></td>
                                        <td style="background: #ebdbb2;"><b>{{ number_format(($total_income), 0, '.', '.') }}</b></td>
                                        <td style="background: #ebdbb2;"><b>{{ number_format($total_bonus, 0, '.', '.') }}</b></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection