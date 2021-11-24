@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            
            <div class="row mb-20">
                <div class="col-md-6 mb-20">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="o5 mb-20">Live Events</h6>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin2/event-index" class="o5">View all</a>
                        </div>
                    </div>
                    <div class="event-card card mb-10">
                        <div class="card-body">
                            <span class="o5"><em>There are no live events currently</em></span>
                        </div>
                    </div>
                    <div class="event-card card mb-10 border-danger">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="upper">
                                        <span class="event-card-id-text">[#44]</span> RRQ vs AE <span class="event-card-live-text">LIVE</span>
                                    </div>
                                    <div class="lower">
                                        <span class="o5">26 Oct 2020 - 18.30</span>
                                        <span class="event-card-league-name">- MPL Season 6 PLAYOFFS</span>
                                        <span class="badge badge-success">15</span>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <a href="{{ url('admin2/event-performance') }}" class="btn btn-sm btn-light ml-2" target="_blank">View performance</a>
                                    <a href="{{ url('admin2/event-view') }}" class="btn btn-sm btn-success ml-2">View event</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-20">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="o5 mb-20">5 most recent events</h6>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin2/event-index" class="o5">View all</a>
                        </div>
                    </div>
                    <div class="event-card card mb-10">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="o5">[43]</span> <a href="/admin2/event-view">RRQ vs AE - 26 Oct 2020 - 18.30</a> <span class="badge badge-primary">Upcoming</span>
                                            
                                        </td>
                                    </tr>
                                    <?php for ($i=0; $i < 4; $i++): ?>
                                        <tr>
                                            <td>
                                                <span class="o5">[43]</span> <a href="/admin2/event-view">RRQ vs AE - 26 Oct 2020 - 18.30</a> <span class="badge badge-secondary">Past</span>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mb-20">
                <div class="col-md-4 mb-20">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="o5 mb-20">Members</h6>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#" class="o5">All members</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td><a href="#">Total members</a></td>
                                        <td class="text-right">100,000 <span class="o5">(20%)</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Verified by phone</a></td>
                                        <td class="text-right">80,000 <span class="o5">(20%)</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Registrations today</a></td>
                                        <td class="text-right">200</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Registrations this week</a></td>
                                        <td class="text-right">2,000</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Registrations this month</a></td>
                                        <td class="text-right">32,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="o5 mb-20">Loyalty Points <span class="o5">(LP)</span></h6>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#" class="o5">All transactions</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td><strong>Count</strong></td>
                                        <td><strong>Volume</strong></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Recharge today </a></td>
                                        <td class="text-right">24</td>
                                        <td class="text-right"> 200<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Recharge this week</a></td>
                                        <td class="text-right">24</td>
                                        <td class="text-right"> 2,000<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Recharge this month</a></td>
                                        <td class="text-right">24</td>
                                        <td class="text-right"> 32,000<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Recharge this year</a></td>
                                        <td class="text-right">24</td>
                                        <td class="text-right"> 132,000<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Total in all members' account</a></td>
                                        <td></td>
                                        <td class="text-right"> 125,000<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="o5 mb-20">Pending Top Ups</h6>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin2/topup-overview" class="o5">See topup stats</a>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td><strong>Product</strong></td>
                                        <td><strong>Count</strong></td>
                                        <td><strong>Total</strong></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">MLBB</a></td>
                                        <td class="text-right">25</td>
                                        <td class="text-right">Rp 12,234,567</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Freefire</a></td>
                                        <td class="text-right">25</td>
                                        <td class="text-right">Rp 12,234,567</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">PUBGB</a></td>
                                        <td class="text-right">25</td>
                                        <td class="text-right">Rp 12,234,567</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Telkomsel Kuota</a></td>
                                        <td class="text-right">25</td>
                                        <td class="text-right">Rp 12,234,567</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Telkomsel Pulsa</a></td>
                                        <td class="text-right">25</td>
                                        <td class="text-right">Rp 12,234,567</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">XL Kuota</a></td>
                                        <td class="text-right">25</td>
                                        <td class="text-right">Rp 12,234,567</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Tri Kuota</a></td>
                                        <td class="text-right">25</td>
                                        <td class="text-right">Rp 12,234,567</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Token PLN</a></td>
                                        <td class="text-right">25</td>
                                        <td class="text-right">Rp 12,234,567</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-20">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="o5 mb-20">Active Promos</h6>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin2/promo-index" class="o5">All promos</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td><strong>Promo name</strong></td>
                                        <td><strong>Status</strong></td>
                                        <td><strong>Limit</strong></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>Diskon 25% cash (game topup)</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="/admin2/promo-view-diskon25">View</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Active</td>
                                        <td>No limit</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>Cashback 10% BP</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="/admin2/promo-view-cashback10">View</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Active</td>
                                        <td>No limit</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-20">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="o5 mb-20">Quests</h6>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin2/quests" class="o5">All quests</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td><strong>Title</strong></td>
                                        <td><strong>Type</strong></td>
                                        <td><strong>Status</strong></td>
                                        <td><strong>Reward</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Verifikasi email</td>
                                        <td>ONCE</td>
                                        <td>Active</td>
                                        <td class="text-right">20<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Verifikasi nomor handphone</td>
                                        <td>ONCE</td>
                                        <td>Active</td>
                                        <td class="text-right">20<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Naik level</td>
                                        <td>REPEATABLE</td>
                                        <td>Active</td>
                                        <td class="text-right">20<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Naik level</td>
                                        <td>REPEATABLE</td>
                                        <td>Active</td>
                                        <td class="text-right">20<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Total pemberian prediksi 18 BP</td>
                                        <td>ONCE_PROGRESS</td>
                                        <td>Active</td>
                                        <td class="text-right">Unlock convert currency</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-20">
                <div class="col-12 mb-10">
                    <h6 class="o5">Status Toko (Game Top Up)</h6>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">MLBB <span class="text-success font-size-14 ml-1">(Open)</span></h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>2</td>
                                        <td class="text-right"><span class="o5">Rp</span> 2,000</td>
                                        <td><span class="text-danger">Inactive</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>20</td>
                                        <td class="text-right"><span class="o5">Rp</span> 12,000</td>
                                        <td><span class="text-danger">Inactive</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>100</td>
                                        <td class="text-right"><span class="o5">Rp</span> 22,000</td>
                                        <td><span class="text-danger">Inactive</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>140</td>
                                        <td class="text-right"><span class="o5">Rp</span> 32,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>210</td>
                                        <td class="text-right"><span class="o5">Rp</span> 42,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>355</td>
                                        <td class="text-right"><span class="o5">Rp</span> 52,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>720</td>
                                        <td class="text-right"><span class="o5">Rp</span> 62,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>860</td>
                                        <td class="text-right"><span class="o5">Rp</span> 122,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>1,075</td>
                                        <td class="text-right"><span class="o5">Rp</span> 2,000,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>Starlight Membership Plus</td>
                                        <td class="text-right"><span class="o5">Rp</span> 3,000,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>Freefire Member Mingguan</td>
                                        <td class="text-right"><span class="o5">Rp</span> 3,000,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Freefire <span class="text-danger font-size-14 ml-1">(Closed)</span></h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>2</td>
                                        <td class="text-right"><span class="o5">Rp</span> 2,000</td>
                                        <td><span class="text-danger">Inactive</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>20</td>
                                        <td class="text-right"><span class="o5">Rp</span> 12,000</td>
                                        <td><span class="text-danger">Inactive</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>100</td>
                                        <td class="text-right"><span class="o5">Rp</span> 22,000</td>
                                        <td><span class="text-danger">Inactive</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>140</td>
                                        <td class="text-right"><span class="o5">Rp</span> 32,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>210</td>
                                        <td class="text-right"><span class="o5">Rp</span> 42,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>355</td>
                                        <td class="text-right"><span class="o5">Rp</span> 52,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>720</td>
                                        <td class="text-right"><span class="o5">Rp</span> 62,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>860</td>
                                        <td class="text-right"><span class="o5">Rp</span> 122,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/mlbb-diamond.svg') }}"></span>1,075</td>
                                        <td class="text-right"><span class="o5">Rp</span> 2,000,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>Starlight Membership Plus</td>
                                        <td class="text-right"><span class="o5">Rp</span> 3,000,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>Freefire Member Mingguan</td>
                                        <td class="text-right"><span class="o5">Rp</span> 3,000,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">PUBGM <span class="text-danger font-size-14 ml-1">(Closed)</span></h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/uc.png') }}"></span>2</td>
                                        <td class="text-right"><span class="o5">Rp</span> 2,000</td>
                                        <td><span class="text-danger">Inactive</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/uc.png') }}"></span>20</td>
                                        <td class="text-right"><span class="o5">Rp</span> 12,000</td>
                                        <td><span class="text-danger">Inactive</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/uc.png') }}"></span>100</td>
                                        <td class="text-right"><span class="o5">Rp</span> 22,000</td>
                                        <td><span class="text-danger">Inactive</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/uc.png') }}"></span>140</td>
                                        <td class="text-right"><span class="o5">Rp</span> 32,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/uc.png') }}"></span>210</td>
                                        <td class="text-right"><span class="o5">Rp</span> 42,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/uc.png') }}"></span>355</td>
                                        <td class="text-right"><span class="o5">Rp</span> 52,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/uc.png') }}"></span>720</td>
                                        <td class="text-right"><span class="o5">Rp</span> 62,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/uc.png') }}"></span>860</td>
                                        <td class="text-right"><span class="o5">Rp</span> 122,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="money money-14 left"><img src="{{ asset('img/currencies/uc.png') }}"></span>1,075</td>
                                        <td class="text-right"><span class="o5">Rp</span> 2,000,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>Starlight Membership Plus</td>
                                        <td class="text-right"><span class="o5">Rp</span> 3,000,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>Freefire Member Mingguan</td>
                                        <td class="text-right"><span class="o5">Rp</span> 3,000,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-20">
                <div class="col-12 mb-10">
                    <h6 class="o5">Status Toko (Isi Pulsa & PLN)</h6>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Pulsa Telkomsel <span class="text-success font-size-14 ml-1">(Open)</span></h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <tbody>
                                    <tr>
                                        <td><span class="o5">Pulsa</span> IDR 20,000</td>
                                        <td class="text-right"><span class="o5">Rp</span> 25,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="o5">Pulsa</span> IDR 25,000</td>
                                        <td class="text-right"><span class="o5">Rp</span> 32,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="o5">Pulsa</span> IDR 30,000</td>
                                        <td class="text-right"><span class="o5">Rp</span> 38,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Flash Kuota Telkomsel <span class="text-success font-size-14 ml-1">(Open)</span></h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    <tr>
                                        <td>100MB <span class="o5">7 hari</span></td>
                                        <td class="text-right"><span class="o5">Rp</span> 6,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>250MB <span class="o5">7 hari</span></td>
                                        <td class="text-right"><span class="o5">Rp</span> 10,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>500MB <span class="o5">7 hari</span></td>
                                        <td class="text-right"><span class="o5">Rp</span> 16,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">XL Xtra Combo + Youtube <span class="text-success font-size-14 ml-1">(Open)</span></h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    <tr>
                                        <td>5GB</td>
                                        <td class="text-right"><span class="o5">Rp</span> 71,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>10GB</td>
                                        <td class="text-right"><span class="o5">Rp</span> 71,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>15GB</td>
                                        <td class="text-right"><span class="o5">Rp</span> 145,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>20GB</td>
                                        <td class="text-right"><span class="o5">Rp</span> 205,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Tri Kuota <span class="text-success font-size-14 ml-1">(Open)</span></h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    <tr>
                                        <td>5GB + Bonus Pulsa 2000</td>
                                        <td class="text-right"><span class="o5">Rp</span> 71,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>5GB + Bonus Pulsa 2000</td>
                                        <td class="text-right"><span class="o5">Rp</span> 71,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>5GB + Bonus Pulsa 2000</td>
                                        <td class="text-right"><span class="o5">Rp</span> 71,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>5GB + Bonus Pulsa 2000</td>
                                        <td class="text-right"><span class="o5">Rp</span> 71,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Token PLN <span class="text-success font-size-14 ml-1">(Open)</span></h5>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                <tbody>
                                    <tr>
                                        <td>20,000</td>
                                        <td class="text-right"><span class="o5">Rp</span> 26,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>20,000</td>
                                        <td class="text-right"><span class="o5">Rp</span> 26,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>20,000</td>
                                        <td class="text-right"><span class="o5">Rp</span> 26,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>20,000</td>
                                        <td class="text-right"><span class="o5">Rp</span> 26,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>20,000</td>
                                        <td class="text-right"><span class="o5">Rp</span> 26,000</td>
                                        <td><span class="text-success">Active</span></td>
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