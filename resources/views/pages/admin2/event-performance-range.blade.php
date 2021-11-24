@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')

<?php 

$row_options = '
    <div class="btn-group" role="group">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">See all bets from this member (this event)</a>
            <a class="dropdown-item" href="#">See all bets from this member (all event)</a>
        </div>
    </div>
';

?>

<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Event Performance - Date Range</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 mb-20">
                    <div class="flex-page-filter">
                        <div class="form-group mb-0">
                            <input type="date" class="form-control form-control-sm h-100" value="2020-10-01">
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-light" disabled>to</button>
                        </div>
                        <div class="form-group mb-0">
                            <input type="date" class="form-control form-control-sm h-100" value="2020-10-31">
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    <div class="row">
                        <div class="col-4">
                            <div class="table-meta grey text-italic">Showing <span class="black">0</span> events</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>[ID] - Date - Match name</th>
                                        <th>Slip Menang</th>
                                        <th>Slip Kalah</th>
                                        <th>Our Net</th>
                                        <th>Our Net Rp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- default page state (after user click from side menu) -->
                                    <tr>
                                        <td colspan="99" class="o3 text-italic">Please select the date range above</td>
                                    </tr>

                                    <!-- when there is data -->
                                    <tr>
                                        <td><span class="o3">[45]</span> - 23 Oct 2020 - RRQ vs AE</td>
                                        <td class="text-right">350</td>
                                        <td class="text-right">200</td>
                                        <td class="text-right">-150</td>
                                        <td class="text-right">-150,000</td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">[45]</span> - 23 Oct 2020 - RRQ vs AE</td>
                                        <td class="text-right">350</td>
                                        <td class="text-right">200</td>
                                        <td class="text-right">-150</td>
                                        <td class="text-right">-150,000</td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">[45]</span> - 23 Oct 2020 - RRQ vs AE</td>
                                        <td class="text-right">350</td>
                                        <td class="text-right">200</td>
                                        <td class="text-right">-150</td>
                                        <td class="text-right">-150,000</td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td>Total</td>
                                        <td class="text-right">350</td>
                                        <td class="text-right">200</td>
                                        <td class="text-right">-150</td>
                                        <td class="text-right">-150,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12 ">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
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