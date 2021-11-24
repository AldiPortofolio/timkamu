@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')

<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">LP Recharge</h3>
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
                            <input type="month" class="form-control form-control-sm h-100 lp-transactions-user-search-input" value="2020-10">
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success">Apply</button>
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
                                        <th class="w-10">ID</th>
                                        <th>Username</th>
                                        <th class="w-10">Tools</th>
                                        <th>Phone</th>
                                        <th>Method</th>
                                        <th class="w-10">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>21-10-2020 18:14</td>
                                        <td><span class="o3 mr-1">[554]</span></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>brosot7</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#member-stats">View quick stats</a>
                                                    <a class="dropdown-item" href="/admin2/member-view">View page</a>
                                                    <a class="dropdown-item" href="#">View LP transactions</a>
                                                    <a class="dropdown-item" href="#">View all bets</a>
                                                    <a class="dropdown-item" href="#">View all topups</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>8812781958</td>
                                        <td>Gopay</td>
                                        <td>27</td>
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