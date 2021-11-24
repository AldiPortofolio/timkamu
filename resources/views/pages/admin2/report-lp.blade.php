@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Loyalty Points Recharge Report</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6 mb-10">
                    <div class="flex-page-filter">
                        <div class="form-group mb-0">
                            <input type="month" class="form-control form-control-sm" value="1">
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-10">
                    <div class="flex-page-filter justify-content-end">
                        <div class="form-group mb-0 ">
                            <a href="{{ url('admin2/report-lp-circulation') }}" class="btn btn-sm btn-block btn-light">View LP circulation report</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            GRAPH: LP recharge this month (1 month graph, with month select) <br>
                            Graph title: LP recharge this month <br>
                            Line chart, x-axis: days, y-axis: lp amount
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">LP recharge today</h5>
                            <p class="mb-0">15<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
                            <p class="o5 mb-0">Count: 12</p>
                            <p class="o5 mb-0">Rp 15,000</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">LP recharge last 7 days</h5>
                            <p class="mb-0">600<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
                            <p class="o5 mb-0">Count: 12</p>
                            <p class="o5 mb-0">Rp 600,000</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">LP recharge this month</h5>
                            <p class="mb-0">12,600<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
                            <p class="o5 mb-0">Count: 12</p>
                            <p class="o5 mb-0">Rp 12,600,000</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">LP recharge this year</h5>
                            <p class="mb-0">12,600<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
                            <p class="o5 mb-0">Rp 12,600,000</p>
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