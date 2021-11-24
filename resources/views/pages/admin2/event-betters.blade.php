@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')

<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Event Participants</h3>
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
                            <input type="text" class="form-control form-control-sm h-100 first-focus" placeholder="username">
                        </div>
                        <div class="form-group mb-0">
                            <select class="form-control form-control-sm h-100">
                                <option selected>All events</option>
                                <option disabled>--- 20 most recent events ---</option>
                                <option>[#43] RRQ vs AE - 24 Oct 2020 18.00 - MPL Season 6</option>
                                <option>[#43] RRQ vs AE - 24 Oct 2020 18.00 - MPL Season 6</option>
                                <option>[#43] RRQ vs AE - 24 Oct 2020 18.00 - MPL Season 6</option>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-4 mb-0">
                            <div class="table-meta grey text-italic">Showing <span class="black">100</span> out of <span class="black">344</span> transactions</div>
                        </div>

                        <div class="col-8 mb-00 text-right">
                            <div class="table-meta grey text-italic mb-10">Showing betters for <span class="black">AE VS BTR(MPL Season 6 PLAYOFFS - 18 Oct 2020 13:00)</span></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Username</th>
                                        <th>[Event ID] Event Name</th>
                                        <th>Category Name</th>
                                        <th>Rule</th>
                                        <th>Bonus</th>
                                        <th>Status</th>
                                        <th>BP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-10"><span class="o3">554</span></td>
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
                                        </td>
                                        <td><span class="o3">[43]</span> RRQ vs ONIC</td>
                                        <td>Game Total</td>
                                        <td>Under</td>
                                        <td>100%</td>
                                        <td>Not calculated</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td class="w-10"><span class="o3">554</span></td>
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
                                        </td>
                                        <td><span class="o3">[43]</span> RRQ vs ONIC</td>
                                        <td>Game Total</td>
                                        <td>Under</td>
                                        <td>100%</td>
                                        <td class="table-success">Menang</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td class="w-10"><span class="o3">554</span></td>
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
                                        </td>
                                        <td><span class="o3">[43]</span> RRQ vs ONIC</td>
                                        <td>Game Total</td>
                                        <td>Under</td>
                                        <td>100%</td>
                                        <td class="table-warning">Kalah</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">Total</td>
                                        <td>160</td>
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