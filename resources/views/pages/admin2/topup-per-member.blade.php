@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')

<?php 

$row_options = '
    <div class="btn-group" role="group">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Approve</a>
        </div>
    </div>
';

?>

<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Top Ups Per Member</h3>
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
                            <button type="button" class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#search-user-by-username"><i data-feather="search" class="btn-icon left"></i>Search users</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    <div class="table-meta grey text-italic">Showing <span class="black">20</span> out of <span class="black">344</span> transactions</div>
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="w-20">Date</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th>Method</th>
                                        <th class="w-10">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>16-10-2020 17:20</td>
                                        <td>fjahja</td>
                                        <td>123123123</td>
                                        <td>Gopay</td>
                                        <td>20<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>16-10-2020 17:20</td>
                                        <td>fjahja</td>
                                        <td>123123123</td>
                                        <td>Gopay</td>
                                        <td>20<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                    
                                    <tr class="table-warning">
                                        <td colspan="4">Total</td>
                                        <td>40<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
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