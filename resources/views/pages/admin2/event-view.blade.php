@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')
<?php

$category_options = '
    <div class="btn-group" role="group">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Lock</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-category-reorder">Reorder</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-category-rename">Rename</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-category-delete">Delete/Refund</a>
        </div>
    </div>
';

$rule_options = '
    <div class="btn-group" role="group">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Lock</a>
            <a class="dropdown-item" href="#">Lock all</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-category-delete">Delete/Refund</a>
        </div>
    </div>
';

$rule_options_skor = '
    <div class="btn-group btn-block" role="group">
        <a href="#" class="btn btn-sm btn-light btn-block dropdown-toggle" data-toggle="dropdown">Options</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Lock</a>
            <a class="dropdown-item" href="#">Lock all</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-category-delete">Delete/Refund</a>
        </div>
    </div>
';

?>
<section id="content">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Event Detail <span class="o3">#43</span></h3>
                </div>
                <div class="col-6 text-right">
                    <h3 class="mb-0 o5">18 Oct 2020 <span class="o5">18:30</span></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">

                <div class="col-6">
                    <div class="flex-page-filter">
                        <div class="form-group">
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#event-confirmation-enable-chat">Enable chat</button>
                            <!-- <button type="button" class="btn btn-sm btn-danger">Disable chat</button> -->
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#event-confirmation-go-live">Go live</button>
                            <!-- <button type="button" class="btn btn-sm btn-danger">Unlive</button> -->
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#event-update-modal">Update info</button>
                        </div>
                        <div class="form-group">
                            <a href="/admin2/event-performance" target="_blank" class="btn btn-sm btn-light">View performance</a>
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-sm btn-light">View page</a>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="flex-page-filter justify-content-end">
                        <div class="form-group">
                            <button type="button" class="btn btn-sm btn-primary btn-block" data-toggle="modal" data-target="#batch-calculate">Calculate & Broadcast</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-sm btn-light btn-block" data-toggle="modal" data-target="#event-confirmation-move-to-past">Move to past</button>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-12">
                    <div class="video-stream-container mb-20">
                        <iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>
                    </div>
                </div> -->

                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <textarea class="form-control form-control-sm w-100" rows="4"><div class="event-card cursor-ptr bg020 bd20" onclick="location.href='/mana/event-view';">
                                    <div class="event-card-meta d-flex flex-column justify-content-center position-relative">
                                        <div class="event-card-meta-date font-size-16 font-weight-bold">Fri, 20 Sept</div>
                                        <div class="event-card-meta-league">MPL Regular Season 2020</div>
                                        <div class="event-card-meta-time">15.30</div>
                                    </div>
                                    <div class="event-card-bottom d-flex bg020 bd20">
                                        <div class="col event-card-bottom-left d-flex flex-column align-items-center">
                                            <img src="{{ asset('img/team-logos/onic-200.png') }}" class="event-card-bottom-right-teampic">
                                            <div class="event-card-bottom-team-name rajdhani-bold font-size-14">ONIC</div>
                                        </div>
                                        <div class="col event-card-bottom-mid bg020 bd20 d-flex justify-content-center align-items-center">
                                            <span class="rajdhani-bold font-size-28 o5">0&nbsp;&nbsp;-&nbsp;&nbsp;0</span>
                                        </div>
                                        <div class="col event-card-bottom-right d-flex flex-column align-items-center">
                                            <img src="{{ asset('img/team-logos/evos-200.png') }}" class="event-card-bottom-right-teampic">
                                            <div class="event-card-bottom-team-name rajdhani-bold font-size-14">EVOS</div>
                                        </div>
                                    </div>
                                </div>
                            </textarea>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-sm btn-light btn-block">Update card</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-8">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <p>
                                        <span class="o3">Created on</span> <br>
                                        17 Oct 2020 21:51:49
                                    </p>
                                    <p>
                                        <span class="o3">Created by</span> <br>
                                        admin
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p>
                                        <span class="o3">Event name</span> <br>
                                        RRQ VS AE
                                    </p>
                                    <p>
                                        <span class="o3">League</span> <br>
                                        MPL Season 6 PLAYOFFS
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="mb-0">
                                        <span class="o3">Embed</span> <br>
                                        <code>&lt;iframe src=&quot;https://www.nimo.tv/embed/5348200&quot; frameborder=&quot;0&quot; scrolling=&quot;false&quot; allow=&quot;autoplay; fullscreen&quot; width=&quot;100%&quot; height=&quot;100%&quot; id=&quot;ininimotv&quot;&gt;&lt;/iframe&gt;</code>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20" id="odds-panel">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="flex-page-filter justify-content-end">
                        <div class="form-group">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown">
                                    New Bet Category
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-new-bet-category-winlose">Win Lose</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-new-bet-category-tebak">Tebak Skor</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-new-bet-category-overunder">Over Under</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown">
                                    New Rules
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-new-bet-rule-winlose">Benar/Salah ML</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-new-bet-rule-tebak">Skor Pertandingan ML</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-new-bet-rule-overunder">Waktu Map #1</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#event-new-bet-rule-overunder">Waktu Map #2</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="/admin2/event-betters" target="_blank" class="btn btn-sm btn-light">
                                View betters
                            </a>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-sm btn-light has-spinner refresh-bp">
                                <div class="info-container">Refresh BP data</div>
                                <div class="spinner-container">
                                    <div class="spinner-border"></div>
                                </div>
                            </button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#event-confirmation-lock-all">Lock all categories</button>
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="tab-nav-container">
                        <a href="#" class="tab-vert-item active" data-target="panel-bet-categories">Bet Categories <span class="badge badge-secondary">12</span></a>
                        <a href="#" class="tab-vert-item" data-target="panel-benar-salah">Benar/Salah ML</a>
                        <a href="#" class="tab-vert-item" data-target="panel-skor-pertandingan">Skor Pertandingan ML</a>
                        <a href="#" class="tab-vert-item" data-target="panel-under-over">Waktu Map #1</a>
                    </div>
                </div>

                <div class="col-10">

                    <div class="vert-panel-target panel-bet-categories active">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="btn-group" role="group">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options</a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Sort by highest BP</a>
                                                <a class="dropdown-item" href="#">Sort by order</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 text-right">
                                        <div class="table-meta grey text-italic mb-10">Showing all categories for <span class="black">AE VS BTR(MPL Season 6 PLAYOFFS - 18 Oct 2020 13:00)</span></div>
                                    </div>
                                </div>
                                
                                <table class="table table-sm table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>[Order] Rule - Category</th>
                                            <th class="w-10">Tools</th>
                                            <th class="w-10">Bets Placed</th>
                                            <th class="w-10">BP Placed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-warning">
                                            <td><span class="o3">[10]</span> Benar Salah - Win/Lose</td>
                                            <td><?php echo $category_options; ?></td>
                                            <td class="text-right">21</td>
                                            <td class="text-right">250</td>
                                        </tr>
                                        <tr>
                                            <td><span class="o3">[20]</span> Waktu Map #1 - Under/Above</td>
                                            <td><?php echo $category_options; ?></td>
                                            <td class="text-right">15</td>
                                            <td class="text-right">250</td>
                                        </tr>
                                        <tr>
                                            <td><span class="o3">[30]</span> Waktu Map #2 - Under/Above</td>
                                            <td><?php echo $category_options; ?></td>
                                            <td class="text-right">15</td>
                                            <td class="text-right">250</td>
                                        </tr>
                                        <tr class="table-warning">
                                            <td colspan="2">Total</td>
                                            <td class="text-right">60</td>
                                            <td class="text-right">2550</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="vert-panel-target panel-benar-salah">
                        
                        <div class="row mb-20">
                            <div class="col-12">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <p><img src="{{ asset('img/team-logos/alter-50.png') }}" class="bet-panel-team-thumb">AE - Current value: 1</p>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-sm btn-block btn-light radio-set-winner">Set as winner</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <!-- <button type="button" class="btn btn-sm btn-block btn-light">Lock</button> -->
                                                            <button type="button" class="btn btn-sm btn-block btn-warning">Locked</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-sm btn-block btn-light" disabled>29 bets - 450 BP (45%)</button>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm" value="30%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <p><img src="{{ asset('img/team-logos/rrq-50.png') }}" class="bet-panel-team-thumb">RRQ - Current value:  2</p>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-sm btn-block btn-light radio-set-winner">Set as winner</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-sm btn-block btn-light">Lock</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-sm btn-block btn-light" disabled>13 bets - 550 BP (55%)</button>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm" value="30%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <button type="button" class="btn btn-sm btn-block btn-light">Update Bonus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        
                                    </div>
                                    <div class="col-8 text-right">
                                        <div class="table-meta grey text-italic mb-10">Showing <span class="black">Benar Salah</span> for <span class="black">AE VS BTR(MPL Season 6 PLAYOFFS - 18 Oct 2020 13:00)</span></div>
                                    </div>
                                </div>
                                <table class="table table-sm table-bordered table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>[Rule ID] - Status</th>
                                            <th class="w-10">RRQ</th>
                                            <th class="w-10">AE</th>
                                            <th class="w-10">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-secondary">
                                            <td><span class="o3">[35]</span> Deleted/Refunded</td>
                                            <td>30%</td>
                                            <td>30%</td>
                                            <td><?php echo $rule_options; ?></td>
                                        </tr>
                                        <tr class="table-warning">
                                            <td><span class="o3">[37]</span> Active</td>
                                            <td>30%</td>
                                            <td>30%</td>
                                            <td><?php echo $rule_options; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="o3">[39]</span> Active</td>
                                            <td>30%</td>
                                            <td>30%</td>
                                            <td><?php echo $rule_options; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="vert-panel-target panel-skor-pertandingan">
                        
                        <div class="row mb-20">
                            <div class="col-12 mb-20">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <p>Skor Pertandingan</p>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group mb-0">
                                                    <button type="button" class="btn btn-sm btn-block btn-light" disabled>Total 300 bets</button>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group mb-0">
                                                    <button type="button" class="btn btn-sm btn-block btn-light" disabled>Total 1,250 BP</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mb-20">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <p>
                                            <img src="{{ asset('img/team-logos/alter-50.png') }}" class="bet-panel-team-thumb">AE 0
                                            - 2 RRQ <img src="{{ asset('img/team-logos/rrq-50.png') }}" class="bet-panel-team-thumb right">
                                        </p>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light" disabled>30 bets (75%)</button>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light" disabled>250 BP (75%)</button>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm" value="50%">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light">Update</button>
                                        </div>
                                        <div class="form-group mb-0">
                                            <?php echo $rule_options_skor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mb-20">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <p>
                                            <img src="{{ asset('img/team-logos/alter-50.png') }}" class="bet-panel-team-thumb">AE 1
                                            - 2 RRQ <img src="{{ asset('img/team-logos/rrq-50.png') }}" class="bet-panel-team-thumb right">
                                        </p>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light" disabled>30 bets (75%)</button>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light" disabled>250 BP (75%)</button>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm" value="30%">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light">Update</button>
                                        </div>
                                        <div class="form-group mb-0">
                                            <?php echo $rule_options_skor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mb-20">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <p>
                                            <img src="{{ asset('img/team-logos/alter-50.png') }}" class="bet-panel-team-thumb">AE 2
                                            - 0 RRQ <img src="{{ asset('img/team-logos/rrq-50.png') }}" class="bet-panel-team-thumb right">
                                        </p>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light" disabled>30 bets (75%)</button>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light" disabled>250 BP (75%)</button>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm" value="100%">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light">Update</button>
                                        </div>
                                        <div class="form-group mb-0">
                                            <?php echo $rule_options_skor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mb-20">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <p>
                                            <img src="{{ asset('img/team-logos/alter-50.png') }}" class="bet-panel-team-thumb">AE 2
                                            - 1 RRQ <img src="{{ asset('img/team-logos/rrq-50.png') }}" class="bet-panel-team-thumb right">
                                        </p>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light" disabled>30 bets (75%)</button>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light" disabled>250 BP (75%)</button>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm" value="60%">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light">Update</button>
                                        </div>
                                        <div class="form-group mb-0">
                                            <?php echo $rule_options_skor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mb-20">
                                <div class="card h-100 border-warning">
                                    <div class="card-body">
                                        <p>
                                            <img src="{{ asset('img/team-logos/alter-50.png') }}" class="bet-panel-team-thumb">AE 2
                                            - 1 RRQ <img src="{{ asset('img/team-logos/rrq-50.png') }}" class="bet-panel-team-thumb right">
                                            <span class="o3">[locked]</span>
                                        </p>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light" disabled>30 bets (75%)</button>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light" disabled>250 BP (75%)</button>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm" value="60%" disabled>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light">Update</button>
                                        </div>
                                        <div class="form-group mb-0">
                                            <?php echo $rule_options_skor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mb-20">
                                <div class="card h-100 bg-light">
                                    <div class="card-body">
                                        <p>
                                            <img src="{{ asset('img/team-logos/alter-50.png') }}" class="bet-panel-team-thumb">AE 2
                                            - 1 RRQ <img src="{{ asset('img/team-logos/rrq-50.png') }}" class="bet-panel-team-thumb right">
                                            <span class="o3">[inactive]</span>
                                        </p>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light" disabled>30 bets (75%)</button>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-block btn-light" disabled>250 BP (75%)</button>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm" value="60%" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="vert-panel-target panel-under-over">
                        
                        <div class="row mb-20">
                            <div class="col-12">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-3">
                                                <p>Waktu Map #1</p>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-sm btn-block btn-light" disabled>Total 250 bets</button>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-sm btn-block btn-light" disabled>Total 1,250 BP</button>
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" class="form-control form-control-sm" value="1655">
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-sm btn-block btn-light">Update rule & bonus</button>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <p>Under</p>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-sm btn-block btn-light" disabled>30 bets (75%)</button>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-sm btn-block btn-light" disabled>250 BP (75%)</button>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-sm" value="30%">
                                                </div>
                                                <div class="form-group mb-0">
                                                    <button type="button" class="btn btn-sm btn-block btn-light radio-set-winner-2">Set as winner</button>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <p>Over</p>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-sm btn-block btn-light" disabled>30 bets (75%)</button>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-sm btn-block btn-light" disabled>250 BP (75%)</button>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-sm" value="30%">
                                                </div>
                                                <div class="form-group mb-0">
                                                    <button type="button" class="btn btn-sm btn-block btn-light radio-set-winner-2">Set as winner</button>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <p>Result Value</p>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-sm btn-block btn-light" disabled>For display only</button>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-sm btn-block btn-light" disabled>Affects nothing</button>
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" class="form-control form-control-sm" value="1245">
                                                </div>
                                                <div class="form-group mb-0">
                                                    <button type="button" class="btn btn-sm btn-block btn-light">Update result</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <table class="table table-sm table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="w-10">Rule ID</th>
                                            <th class="w-10">Status</th>
                                            <th class="w-10">Value</th>
                                            <th class="w-10">Under</th>
                                            <th class="w-10">Over</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-secondary">
                                            <td><span class="o3">[39]</span></td>
                                            <td>Refunded</td>
                                            <td>1655</td>
                                            <td>20%</td>
                                            <td>20%</td>
                                            <td><?php echo $rule_options; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="o3">[39]</span></td>
                                            <td>Active</td>
                                            <td>1655</td>
                                            <td>10%</td>
                                            <td>10%</td>
                                            <td><?php echo $rule_options; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</section>

<section id="page-modals">

    <div class="modal" id="event-new-bet-category-winlose">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create new win lose category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control form-control-sm first-focus" value="Benar Salah">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="event-new-bet-category-tebak">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create new tebak score category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control form-control-sm first-focus" value="Skor Pertandingan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="event-new-bet-category-overunder">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create new over under category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <div class="form-group">
                        <label>Category #1</label>
                        <input type="text" class="form-control form-control-sm first-focus" value="Waktu Map #1">
                    </div>
                    <div class="form-group">
                        <label>Category #2</label>
                        <input type="text" class="form-control form-control-sm" value="Waktu Map #2">
                    </div>
                    <div class="form-group">
                        <label>Category #3</label>
                        <input type="text" class="form-control form-control-sm" value="Waktu Map #3">
                    </div>
                    <div class="form-group">
                        <label>Category #4</label>
                        <input type="text" class="form-control form-control-sm" value="Waktu Map #4">
                    </div>
                    <div class="form-group">
                        <label>Category #5</label>
                        <input type="text" class="form-control form-control-sm" value="Waktu Map #5">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="event-new-bet-rule-winlose">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create new win lose rule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <div class="form-group">
                        <label>RRQ</label>
                        <input type="text" class="form-control form-control-sm first-focus" value="30%">
                    </div>
                    <div class="form-group">
                        <label>AE</label>
                        <input type="text" class="form-control form-control-sm" value="30%">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="event-new-bet-rule-tebak">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create new tebak score rule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <div class="form-group">
                        <label>Score RRQ</label>
                        <input type="text" class="form-control form-control-sm first-focus" value="1">
                    </div>
                    <div class="form-group">
                        <label>Score AE</label>
                        <input type="text" class="form-control form-control-sm" value="0">
                    </div>
                    <div class="form-group">
                        <label>Bonus</label>
                        <input type="text" class="form-control form-control-sm" value="30%">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="event-new-bet-rule-overunder">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create new over under rule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <div class="form-group">
                        <label>Rule</label>
                        <input type="text" class="form-control form-control-sm first-focus" value="1">
                    </div>
                    <div class="form-group">
                        <label>Under</label>
                        <input type="text" class="form-control form-control-sm" value="25%">
                    </div>
                    <div class="form-group">
                        <label>Over</label>
                        <input type="text" class="form-control form-control-sm" value="30%">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="event-category-reorder">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reorder category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <div class="form-group">
                        <input type="number" class="form-control form-control-sm first-focus" value="10">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="event-category-rename">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rename category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm first-focus" value="Waktu Map #2">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="event-update-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm first-focus" placeholder="Event name">
                    </div>
                    <div class="form-group">
                        <input type="datetime-local" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-sm">
                            <option disabled>League</option>
                            <option>MPL Season 6 PLAYOFFS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-sm">
                            <option disabled>League</option>
                            <option>RRQ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-sm">
                            <option disabled>League</option>
                            <option>AE</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control form-control-sm" rows="3"><iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="category-value-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update bet category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm first-focus" placeholder="Category name" value="Waktu Map #1">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm " placeholder="Category value" value="1522">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="event-confirmation-enable-chat">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enable chat?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <p>Are you sure you want enable chat?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="event-confirmation-go-live">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Go live?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <p>Are you sure you want to go live?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="event-confirmation-move-to-past">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Move to past?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <p>Are you sure you want to move to past?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="event-confirmation-lock-all">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lock all categories?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <p>Are you sure you want to lock all categories?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="event-category-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete category?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <p>Are you sure you want to delete this category?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="batch-calculate">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Batch calculations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <p>Total bets: 459. Batch size: 100</p>
                    <table class="table table-sm table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Batch</th>
                                <th class="w-20">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1-100</td>
                                <td><a href="#">Calculate</a></td>
                            </tr>
                            <tr class="table-success">
                                <td>101-200</td>
                                <td><a href="#">Done</a></td>
                            </tr>
                            <tr>
                                <td>201-300</td>
                                <td><a href="#">Calculate</a></td>
                            </tr>
                            <tr>
                                <td>301-400</td>
                                <td><a href="#">Calculate</a></td>
                            </tr>
                            <tr>
                                <td>401-500</td>
                                <td><a href="#">Calculate</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</section>

<style type="text/css">
    /*page specific css*/
    .bet-category-td > a {
        margin-right: 15px;
        opacity: 0.5;
    }
    .tab-vert-item {
        display: block;
        padding: 6px 0;
        opacity: 0.5;
    }
    .tab-vert-item:hover,
    .tab-vert-item.active {
        opacity: 1;
    }
    .vert-panel-target {
        display: none;
    }
    .vert-panel-target.active {
        display: block;
    }
    @media (min-width: 992px) {
        .video-stream-container {
            position: relative;
            /*padding-bottom: 56.25%;*/ /* 16:9 */
            padding-bottom: 45%;
            height: 0;
        }
        .video-stream-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    }
</style>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        
        // page specific scripts

        // vert nav btns
        $('body').on('click', '.tab-vert-item', function(e) {
            e.preventDefault();

            obj = $(this);
            obj2 = $('.tab-vert-item');
            obj3 = obj.attr('data-target');
            obj4 = $('.vert-panel-target');
            obj5 = $('.vert-panel-target.'+obj3);

            // do logic
            obj2.removeClass('active');
            obj.addClass('active');
            obj4.removeClass('active');
            obj5.addClass('active');
        });

        // benar salah radio
        $('body').on('click', '.radio-set-winner', function(e) {
            e.preventDefault();

            obj = $(this);
            obj2 = $('.radio-set-winner');

            // resets
            obj2.removeClass('btn-success');
            obj2.html('Set as winner');
            obj.removeClass('btn-light');
            obj.addClass('btn-success');
            obj.addClass('active');
            obj.html('Winner');
        });

        // benar salah radio
        $('body').on('click', '.radio-set-winner-2', function(e) {
            e.preventDefault();

            obj = $(this);
            obj2 = $('.radio-set-winner-2');

            // resets
            obj2.removeClass('btn-success');
            obj2.html('Set as winner');
            obj.removeClass('btn-light');
            obj.addClass('btn-success');
            obj.addClass('active');
            obj.html('Winner');
        });

        // reload bp data
        $('body').on('click', '.refresh-bp', function () {
            spinnerOnClick($(this),refreshBp,1000);
        });
        function refreshBp(){
            // do db work here
        }
        

    })
</script>
@endsection