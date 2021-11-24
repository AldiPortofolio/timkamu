@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')

<?php 

$row_options = '
    <div class="btn-group" role="group">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options</a>
        <div class="dropdown-menu">
            <a href="/admin2/event-betters" class="dropdown-item" href="#">See all bets from this member (this event)</a>
            <a href="/admin2/event-betters" class="dropdown-item" href="#">See all bets from this member (all event)</a>
        </div>
    </div>
';

?>

<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Event Performance</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">


                <!-- <div class="col-12 mb-10">
                    <h6>Report not available</h6>
                    <p>Event has not been moved to past.</p>
                </div> -->

                <div class="col-12 mb-10">
                    <h6>Summary</h6>
                    <div class="table-meta grey text-italic">Showing event <span class="black">AE VS BTR(MPL Season 6 PLAYOFFS - 18 Oct 2020 13:00)</span></div>
                </div>

                <div class="col-6 mb-30">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Slip Menang</th>
                                        <th>Slip Kalah</th>
                                        <th>Net</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>BP</td>
                                        <td class="text-right">200</td>
                                        <td class="text-right">300</td>
                                        <td class="text-right">100</td>
                                    </tr>
                                    <tr>
                                        <td>Rp</td>
                                        <td class="text-right">200,000</td>
                                        <td class="text-right">300,000</td>
                                        <td class="text-right">100,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-6 mb-30">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th class="w-10">Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Total bets placed</td>
                                        <td class="text-right">150</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    <h6>Category & Rule Breakdown</h6>
                    <div class="table-meta grey text-italic">Showing event <span class="black">AE VS BTR(MPL Season 6 PLAYOFFS - 18 Oct 2020 13:00)</span></div>
                </div>

                <div class="col-12 mb-30">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Category - Rule</th>
                                        <th class="w-10">Bets Placed</th>
                                        <th class="w-10">True</th>
                                        <th class="w-10">Bonus</th>
                                        <th class="w-10">BP Placed</th>
                                        <th class="w-10">Payout</th>
                                        <th class="w-10">Profit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Benar Salah - RRQ</td>
                                        <td class="text-right">30</td>
                                        <td class="table-success">Yes</td>
                                        <td class="text-right">30%</td>
                                        <td class="text-right">100</td>
                                        <td class="text-right">130</td>
                                        <td class="text-right">-30</td>
                                    </tr>
                                    <tr>
                                        <td>Benar Salah - AE</td>
                                        <td class="text-right">30</td>
                                        <td class="table-warning">No</td>
                                        <td class="text-right">30%</td>
                                        <td class="text-right">200</td>
                                        <td class="text-right"><span class="o5">0</span></td>
                                        <td class="text-right">200</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Map #1 (Rule 1655 - Result 1405) - Under</td>
                                        <td class="text-right">30</td>
                                        <td class="table-success">Yes</td>
                                        <td class="text-right">50%</td>
                                        <td class="text-right">100</td>
                                        <td class="text-right">150</td>
                                        <td class="text-right">-50</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Map #1 (Rule 1655 - Result 1405) - Over</td>
                                        <td class="text-right">30</td>
                                        <td class="table-warning">No</td>
                                        <td class="text-right">50%</td>
                                        <td class="text-right">1,000</td>
                                        <td class="text-right"><span class="o5">0</span></td>
                                        <td class="text-right">1,000</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Map #2 (Rule 1655 - Result 1700) - Under</td>
                                        <td class="text-right">30</td>
                                        <td class="table-warning">No</td>
                                        <td class="text-right">75%</td>
                                        <td class="text-right">200</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">250</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Map #2 (Rule 1655 - Result 1700) - Over</td>
                                        <td class="text-right">30</td>
                                        <td class="table-success">Yes</td>
                                        <td class="text-right">75%</td>
                                        <td class="text-right">500</td>
                                        <td class="text-right">875</td>
                                        <td class="text-right">-275</td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td>Total bets placed</td>
                                        <td class="text-right">150</td>
                                        <td colspan="2">Total BP</td>
                                        <td class="text-right">2,100</td>
                                        <td class="text-right">1,155</td>
                                        <td class="text-right">1,095</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    <h6>Event participants</h6>
                    <div class="table-meta grey text-italic">Showing event <span class="black">AE VS BTR(MPL Season 6 PLAYOFFS - 18 Oct 2020 13:00)</span></div>
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>[ID] Username</th>
                                        <th>Category Name</th>
                                        <th>Rule</th>
                                        <th>Bonus</th>
                                        <th>Status</th>
                                        <th>BP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="o3">[554]</span></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>Rayhan Hakiki</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#member-stats">View quick stats</a>
                                                    <a class="dropdown-item" href="/admin2/member-view">View page</a>
                                                    <a class="dropdown-item" href="#">View LP transactions</a>
                                                    <a class="dropdown-item" href="#">View all bets</a>
                                                    <a class="dropdown-item" href="#">View all bets (this event)</a>
                                                    <a class="dropdown-item" href="#">View all topups</a>
                                                </div>
                                            </div> 
                                        </td>
                                        <td>Game Total</td>
                                        <td>Under</td>
                                        <td>90%</td>
                                        <td>Not calculated</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">[554]</span></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>Rayhan Hakiki</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#member-stats">View quick stats</a>
                                                    <a class="dropdown-item" href="/admin2/member-view">View page</a>
                                                    <a class="dropdown-item" href="#">View LP transactions</a>
                                                    <a class="dropdown-item" href="#">View all bets</a>
                                                    <a class="dropdown-item" href="#">View all bets (this event)</a>
                                                    <a class="dropdown-item" href="#">View all topups</a>
                                                </div>
                                            </div> 
                                        </td>
                                        <td>Game Total</td>
                                        <td>Under</td>
                                        <td>90%</td>
                                        <td class="table-success">Menang</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">[554]</span></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>Rayhan Hakiki</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#member-stats">View quick stats</a>
                                                    <a class="dropdown-item" href="/admin2/member-view">View page</a>
                                                    <a class="dropdown-item" href="#">View LP transactions</a>
                                                    <a class="dropdown-item" href="#">View all bets</a>
                                                    <a class="dropdown-item" href="#">View all bets (this event)</a>
                                                    <a class="dropdown-item" href="#">View all topups</a>
                                                </div>
                                            </div> 
                                        </td>
                                        <td>Game Total</td>
                                        <td>Under</td>
                                        <td>90%</td>
                                        <td class="table-warning">Kalah</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Total</td>
                                        <td>190</td>
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