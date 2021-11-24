@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')

<?php 

$row_options = '
    <div class="btn-group" role="group">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Mark as done</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#top-up-reject-modal">Reject</a>
            <a class="dropdown-item" href="#">Check all purchase by this Member</a>
            <a class="dropdown-item" href="#">Check all purchase for this Player ID</a>
        </div>
    </div>
';

?>

<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">All Top Ups</h3>
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
                            <select class="form-control form-control-sm">
                                <option selected>Game Topups</option>
                                <option>Isi Pulsa</option>
                                <option>Token PLN</option>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <select class="form-control form-control-sm">
                                <option>Pending</option>
                                <option>Done</option>
                                <option>Rejected</option>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <input type="month" class="form-control form-control-sm h-100" value="2020-10">
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    <div class="table-meta grey text-italic">Page <span class="black">1</span> out of <span class="black">12</span></div>
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Tools</th>
                                        <th>Status</th>
                                        <th>[ID] Purchase Date</th>
                                        <th>Order ID</th>
                                        <th>Buyer Info (Member)</th>
                                        <th>Purchase Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row_options; ?></td>
                                        <td>Pending</td>
                                        <td><span class="o3">[10]</span> 21-10-2020 18:14</td>
                                        <td>20102114432985</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>Rayhan Hakiki</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#member-stats">View quick stats</a>
                                                    <a class="dropdown-item" href="/admin2/member-view">View page</a>
                                                    <a class="dropdown-item" href="#">View LP transactions</a>
                                                    <a class="dropdown-item" href="#">View all bets</a>
                                                    <a class="dropdown-item" href="#">View all topups</a>
                                                </div>
                                            </div>
                                            (08137809248)<br>
                                            <span class="o3">fjahjatimkamu@dev.com</span>
                                        </td>
                                        <td>
                                            Freefire Member Mingguan (Free Fire) <br>
                                            <span class="o3">Buy using</span> Rp 20,000 DANA
                                        </td>
                                    </tr>
                                    <tr class="table-success">
                                        <td><?php echo $row_options; ?></td>
                                        <td>Done</td>
                                        <td><span class="o3">[10]</span> 21-10-2020 18:14</td>
                                        <td>20102114432985</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>Rayhan Hakiki</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#member-stats">View quick stats</a>
                                                    <a class="dropdown-item" href="/admin2/member-view">View page</a>
                                                    <a class="dropdown-item" href="#">View LP transactions</a>
                                                    <a class="dropdown-item" href="#">View all bets</a>
                                                    <a class="dropdown-item" href="#">View all topups</a>
                                                </div>
                                            </div>
                                            (08137809248)<br>
                                            <span class="o3">fjahjatimkamu@dev.com</span>
                                        </td>
                                        <td>
                                            26 MLBB Diamond<br>
                                            <span class="o3">Buy using</span> 38 LP
                                        </td>
                                    </tr>
                                    <tr class="table-danger">
                                        <td><?php echo $row_options; ?></td>
                                        <td>Rejected <br> Reason: double topup</td>
                                        <td><span class="o3">[10]</span> 21-10-2020 18:14</td>
                                        <td>20102114432985</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>Rayhan Hakiki</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#member-stats">View quick stats</a>
                                                    <a class="dropdown-item" href="/admin2/member-view">View page</a>
                                                    <a class="dropdown-item" href="#">View LP transactions</a>
                                                    <a class="dropdown-item" href="#">View all bets</a>
                                                    <a class="dropdown-item" href="#">View all topups</a>
                                                </div>
                                            </div> 
                                            (08137809248)<br>
                                            <span class="o3">fjahjatimkamu@dev.com</span>
                                        </td>
                                        <td>
                                            26 MLBB Diamond<br>
                                            <span class="o3">Buy using</span> 38 LP
                                        </td>
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
    <div class="modal" id="top-up-reject-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reject Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <div class="form-group">
                        <label>Reason for rejecting this purchase:</label>
                        <input type="text" class="form-control form-control-sm first-focus">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary">Confirm</button>
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