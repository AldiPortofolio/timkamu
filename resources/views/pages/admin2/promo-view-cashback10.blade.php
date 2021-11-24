@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Promo Detail</h3>
                    <div class="bcrumb">
                        <a href="/admin2/promo-index">Promos</a> <i data-feather="chevron-right" class="bcrumb-icon"></i>
                        <a href="#" class="current">Cashback 10% BP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            
            <div class="row mb-20">
                <div class="col-md-6 mb-20">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="o5 mb-20">Promo info</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>Cashback 10% BP</td>
                                    </tr>
                                    <tr>
                                        <td>Started</td>
                                        <td>20 Nov 2020 18:30</td>
                                    </tr>
                                    <tr>
                                        <td>Ended</td>
                                        <td>----</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>
                                            <p>Dapatkan cashback 10% <span class="money money-14 right money-inline fw-400 white-10">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> setiap kali kamu recharge LP.</p>
                                            <p>
                                                Besar <span class="money money-14 right money-inline fw-400 white-10">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> adalah 10% x <span class="money money-14 right money-inline fw-400 white-10">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span> jumlah recharge.<br>
                                                Cashback <span class="money money-14 right money-inline fw-400 white-10">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> di bawah .7 akan round down <br>
                                                Cashback <span class="money money-14 right money-inline fw-400 white-10">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> di atas .8 akan round up
                                            </p>
                                            <p>
                                                Contoh: recharge 1 LP, cashback = 0 BP (10% = 0.1) <br>
                                                Contoh: recharge 7 LP, cashback = 0 BP (10% = 0.7) <br>
                                                Contoh: recharge 8 LP, cashback = 1 BP (10% = 0.8) <br>
                                                Contoh: recharge 15 LP, cashback = 1 BP (10% = 1.5) <br>
                                                Contoh: recharge 66 LP, cashback = 6 BP (10% = 6.6) <br>
                                                Contoh: recharge 200 LP, cashback = 20 BP (10% = 20)
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mb-20">
                <div class="col-md-6 mb-20">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="o5 mb-20">Unique stats</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td>Limit</td>
                                        <td class="text-right">No limit</td>
                                    </tr>
                                    <tr>
                                        <td>Limit remaining</td>
                                        <td class="text-right">No limit remaining</td>
                                    </tr>
                                    <tr>
                                        <td>Use count</td>
                                        <td class="text-right">44</td>
                                    </tr>
                                    <tr>
                                        <td>Total BP given</td>
                                        <td class="text-right"><span class="money money-14 right money-inline fw-400 white-10">1,234<img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
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

    })
</script>
@endsection