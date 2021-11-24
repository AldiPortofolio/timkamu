@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Loyalty Points Circulation Report</h3>
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
                            <a href="{{ url('admin2/report-lp') }}" class="btn btn-sm btn-block btn-light">View LP recharge report</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            GRAPH: Total LP beredar bulan ini (1 month graph, with month select) <br>
                            Graph title: Total LP beredar bulan ini <br>
                            Line chart, x-axis: days, y-axis: lp amount
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Total LP beredar saat ini (circulating currency)</h5>
                            <p class="mb-0">293,094</p>
                            <p class="o5 mb-0">Rp 293,094,000</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-10 mt-20">
                    <h6 class="font-size-18 o5">LP Sources</h6>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Source</th>
                                        <th class="w-10">LP</th>
                                        <th class="w-10">Rp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Member Recharge</td>
                                        <td class="text-right">70,778</td>
                                        <td class="text-right">70,778,000</td>
                                    </tr>
                                    <tr>
                                        <td>Marketing: Gratis 56 BP 10-11 Oct 2020</td>
                                        <td class="text-right">5,908</td>
                                        <td class="text-right">5,908,000</td>
                                    </tr>
                                    <tr>
                                        <td>Marketing: Gratis 26 BP 12 Oct 2020</td>
                                        <td class="text-right">18.900</td>
                                        <td class="text-right">18,900,000</td>
                                    </tr>
                                    <tr>
                                        <td>Convert from BP</td>
                                        <td class="text-right">2,400</td>
                                        <td class="text-right">2,400,000</td>
                                    </tr>
                                    <tr>
                                        <td>Convert from Coins</td>
                                        <td class="text-right">400</td>
                                        <td class="text-right">400,000</td>
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