@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Members Overview</h3>
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
                            GRAPH: new registrations phone verified this month (1 month graph, with month select) <br>
                            Graph title: New registrations (phone verified) <br>
                            Line chart, x-axis: days, y-axis: number of registrations
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-md-12 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Registrations</h5>
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td class="w-20">Phone Verified</td>
                                        <td class="w-10">Total</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Registrations today</a></td>
                                        <td class="text-right">20 <span class="o3">(23%)</span></td>
                                        <td class="text-right">200</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Registrations last 7 days</a></td>
                                        <td class="text-right">1,000 <span class="o3">(23%)</span></td>
                                        <td class="text-right">2,000</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Registrations this month</a></td>
                                        <td class="text-right">12,000 <span class="o3">(23%)</span></td>
                                        <td class="text-right">32,000</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Registrations this year</a></td>
                                        <td class="text-right">22,000 <span class="o3">(23%)</span></td>
                                        <td class="text-right">32,000</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Total</a></td>
                                        <td class="text-right">232,000 <span class="o3">(23%)</span></td>
                                        <td class="text-right">322,000</td>
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