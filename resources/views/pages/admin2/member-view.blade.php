@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Member Detail <span class="o3">#43</span></h3>
                </div>
                <div class="col-6 text-right">
                    <h3 class="mb-0 o5">brosot7</h3>
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
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#confirm-disable-login">Disable login</button>
                            <!-- <button type="button" class="btn btn-sm btn-danger">Login disabled</button> -->
                        </div>
                        <div class="form-group">
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Options</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">View LP transactions</a>
                                    <a class="dropdown-item" href="#">View all bets</a>
                                    <a class="dropdown-item" href="#">View all topups</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td>Username</td>
                                        <td class="text-right">brosot7</td>
                                    </tr>
                                    <tr>
                                        <td>Registration</td>
                                        <td class="text-right">2020-09-26 04:43:15</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td class="text-right">test1@gmail.com<span class="verify-indicator right red"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td class="text-right">02931248129<span class="verify-indicator right green"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Total LP</td>
                                        <td class="text-right">2,125<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Total BP</td>
                                        <td class="text-right">125<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Total Coin</td>
                                        <td class="text-right">50<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Total EXP</td>
                                        <td class="text-right">12,680</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td>Total LP recharge (count)</td>
                                        <td class="text-right">34</td>
                                    </tr>
                                    <tr>
                                        <td>Total LP recharge (amount)</td>
                                        <td class="text-right">2,125<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-4 mb-20">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td>Total slips</td>
                                        <td class="text-right">125</td>
                                    </tr>
                                    <tr>
                                        <td>Total win slips</td>
                                        <td class="text-right">30 <span class="o3">(30%)</span></td>
                                    </tr>
                                    <tr>
                                        <td>Total lose slips</td>
                                        <td class="text-right">70 <span class="o3">(70%)</span></td>
                                    </tr>
                                    <tr>
                                        <td>Avg bet amount</td>
                                        <td class="text-right">120<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Biggest win </td>
                                        <td class="text-right">2426<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Biggest lose</td>
                                        <td class="text-right">35<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
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

<section id="page-modals">

    <div class="modal" id="confirm-disable-login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Disable login?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <p>Are you sure you want to disable login for this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-primary">Confirm</button>
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

            console.log(obj3);
        });

    })
</script>
@endsection