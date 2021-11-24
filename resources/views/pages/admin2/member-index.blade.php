@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')

<?php 

$row_options = '
    <div class="btn-group" role="group">
        <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>brosot7</span></a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#member-stats">View quick stats</a>
            <a class="dropdown-item" href="/admin2/member-view">View page</a>
            <a class="dropdown-item" href="#">View LP transactions</a>
            <a class="dropdown-item" href="#">View all bets</a>
            <a class="dropdown-item" href="#">View all topups</a>
            <a class="dropdown-item" href="/admin2/member-historical">View historical</a>
        </div>
    </div>
';

?>
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Members</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="flex-page-filter">
                        <div class="form-group">
                            <button type="button" class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#search-user-by-username"><i data-feather="search" class="btn-icon left"></i>Search users</button>
                        </div>
                        <div class="form-group">
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-sm btn-block btn-light dropdown-toggle" data-toggle="dropdown">Sort by</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Highest LP</a>
                                    <a class="dropdown-item" href="#">Highest BP</a>
                                    <a class="dropdown-item" href="#">Highest Coin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    <div class="table-meta grey text-italic">Showing <span class="black">100</span> out of <span class="black">344</span> members</div>
                </div>

                <div class="col-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="w-10">ID</th>
                                        <th>Username</th>
                                        <th class="w-20">Phone</th>
                                        <th class="w-20">Email</th>
                                        <th class="w-5">LP</th>
                                        <th class="w-5">BP</th>
                                        <th class="w-5">Coins</th>
                                        <th class="w-20">Registration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cursor-ptr">
                                        <td><span class="o3 mr-1">[554]</span></td>
                                        <td><?php echo $row_options; ?></td>
                                        <td><span class="verify-indicator red"></span>08137829487</td>
                                        <td><span class="verify-indicator green"></span>test1@email.com</td>
                                        <td>26</td>
                                        <td>55</td>
                                        <td>120</td>
                                        <td>2020-09-26 04:43:15</td>
                                    </tr>
                                    <tr class="cursor-ptr">
                                        <td><span class="o3 mr-1">[554]</span></td>
                                        <td><?php echo $row_options; ?></td>
                                        <td><span class="verify-indicator green"></span>33244512354</td>
                                        <td><span class="verify-indicator green"></span>test2@email.com</td>
                                        <td>11</td>
                                        <td>555</td>
                                        <td>1210</td>
                                        <td>2020-09-26 04:43:15</td>
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