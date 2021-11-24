@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')

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

                            <!-- kalau blm ada parameter username -->
                            <!-- <a href="#" class="btn btn-sm btn-block btn-light" data-toggle="modal" data-target="#search-user-by-username"><i data-feather="search" class="btn-icon left"></i>Search user</a> -->

                            <!-- kalau sudah ada parameter username -->
                            <a href="#" class="btn btn-sm btn-block btn-light" data-toggle="modal" data-target="#search-user-by-username"><i data-feather="user" class="btn-icon left"></i>brosot7</a>
                        </div>
                        <div class="form-group mb-0">
                            <input type="month" class="form-control form-control-sm h-100" value="2020-10">
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    <div class="table-meta grey text-italic">Showing <span class="black">All</span> transactions for user <span class="black">brosot7</span> in the month of <span class="black">Oct 2020</span></div>
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

                                    <!-- kalau blm ada parameter username -->
                                    <!-- <tr>
                                        <td colspan="99" class="o3"><em>No data. Please search for a user first.</em></td>
                                    </tr> -->

                                    <!-- kalau sudah ada parameter username -->
                                    <tr>
                                        <td>01 Oct 2020 <span class="o3">00.00</span></td>
                                        <td>Last month's balance</td>
                                        <td class="text-right">150<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                        <td class="text-right">150<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                        <td class="text-right">150<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    <!-- <tr>
                                        <td>23 Oct 2020 <span class="o3">18.30</span></td>
                                        <td>Registration</td>
                                        <td class="text-right">26<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                        <td class="text-right"></td>
                                        <td class="text-right"></td>
                                    </tr> -->
                                    <tr>
                                        <td>23 Oct 2020 <span class="o3">18.30</span></td>
                                        <td>Verify phone</td>
                                        <td class="text-right"></td>
                                        <td class="text-right"></td>
                                        <td class="text-right">10<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>23 Oct 2020 <span class="o3">18.40</span></td>
                                        <td>Verify email</td>
                                        <td class="text-right"></td>
                                        <td class="text-right"></td>
                                        <td class="text-right">10<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>23 Oct 2020 <span class="o3">17.40</span></td>
                                        <td>LP recharge</td>
                                        <td class="text-right">90<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                        <td class="text-right"></td>
                                        <td class="text-right"></td>
                                    </tr>
                                    <tr>
                                        <td>23 Oct 2020 <span class="o3">17.55</span></td>
                                        <td>Quest award "Naik Level"</td>
                                        <td class="text-right"></td>
                                        <td class="text-right"></td>
                                        <td class="text-right">10<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>23 Oct 2020 <span class="o3">17.50</span></td>
                                        <td>Conversion</td>
                                        <td class="text-right">-27<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                        <td class="text-right">27<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                        <td class="text-right"></td>
                                    </tr>
                                    <tr>
                                        <td>23 Oct 2020 <span class="o3">17.55</span></td>
                                        <td>Place prediction on "[43] RRQ vs AE 30 Oct 2020 16.30"</td>
                                        <td class="text-right"></td>
                                        <td class="text-right">-27<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                        <td class="text-right"></td>
                                    </tr>
                                    <tr>
                                        <td>23 Oct 2020 <span class="o3">17.55</span></td>
                                        <td>Quest award "Berikan prediksi 27 BP"</td>
                                        <td class="text-right"></td>
                                        <td class="text-right"></td>
                                        <td class="text-right">10<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>24 Oct 2020 <span class="o3">13.10</span></td>
                                        <td>Hasil event "[43] RRQ vs AE 30 Oct 2020 16.30"</td>
                                        <td class="text-right"></td>
                                        <td class="text-right">50<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                        <td class="text-right"></td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td colspan="2">Total</td>
                                        <td class="text-right">160<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                        <td class="text-right">160<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                        <td class="text-right">160<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
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

</section>

<style type="text/css">
    /*page specific css*/

</style>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        
        // page specific scripts

    })
</script>
@endsection