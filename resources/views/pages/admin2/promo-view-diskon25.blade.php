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
                        <a href="#" class="current">Diskon 25% cash (game topup)</a>
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
                                        <td>Diskon 25% cash (game topup)</td>
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
                                        <td>Potongan 25% untuk setiap pembelian Game Diamonds menggunakan uang tunai (GoPay, OVOV etc) di TimKamu.com.</td>
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
                                        <td>Total discount amount</td>
                                        <td class="text-right">Rp 1,234</td>
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