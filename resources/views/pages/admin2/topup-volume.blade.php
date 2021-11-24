@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Topup Volume</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h6 class="o5 mb-20">Number of topups</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-10">
                    <div class="flex-page-filter">
                        <div class="form-group mb-0">
                            <input type="month" class="form-control form-control-sm" value="2020-10">
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            GRAPH: multi line chart showing the 7 different colors for each product <br>
                            x-axis: days <br>
                            y-axis: number of purchase request
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Toups today</h5>
                            <p class="mb-0">15</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Toups this week</h5>
                            <p class="mb-0">600</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Toups this month</h5>
                            <p class="mb-0">12,600</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Toups this year</h5>
                            <p class="mb-0">12,600</p>
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