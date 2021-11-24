@extends('layouts.app')

@section('page_title', "Ranks")
@section('body_class', "bg1")
@section('content')

@include('includes.menu')

<div class="root ranks-index">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="rank-tbl">
                    <a href="#" class="tkbtn help dark" data-toggle="modal" data-target="#ranks-help"><i data-feather="help-circle" class="icon"></i>Help</a>
                    <div class="item first">
                        <div class="tier">
                            01
                        </div>
                        <div class="emblem">
                            <div class="unit">
                                <img src="{{ asset('img/ranks/ranks-01.png') }}">
                                <p>Bronze I</p>
                            </div>
                            <div class="unit">
                                <img src="{{ asset('img/ranks/ranks-02.png') }}">
                                <p>Bronze II</p>
                            </div>
                            <div class="unit">
                                <img src="{{ asset('img/ranks/ranks-03.png') }}">
                                <p>Bronze III</p>
                            </div>
                        </div>
                        <div class="priv">
                        </div>
                    </div>
                    <div class="item second">
                        <div class="tier">
                            02
                        </div>
                        <div class="emblem">
                            <div class="unit">
                                <img src="{{ asset('img/ranks/ranks-04.png') }}">
                                <p>Silver I</p>
                            </div>
                            <div class="unit">
                                <img src="{{ asset('img/ranks/ranks-05.png') }}">
                                <p>Silver II</p>
                            </div>
                            <div class="unit">
                                <img src="{{ asset('img/ranks/ranks-06.png') }}">
                                <p>Silver III</p>
                            </div>
                        </div>
                        <div class="priv">
                            <div>
                                <a href="#" data-toggle="modal" data-target="#priv1">Rank icon next to name in event chat</a>
                            </div>
                        </div>
                    </div>
                    <div class="item third">
                        <div class="tier">
                            03
                        </div>
                        <div class="emblem">
                            <div class="unit">
                                <img src="{{ asset('img/ranks/ranks-07.png') }}">
                                <p>Gold I</p>
                            </div>
                            <div class="unit">
                                <img src="{{ asset('img/ranks/ranks-08.png') }}">
                                <p>Gold II</p>
                            </div>
                            <div class="unit">
                                <img src="{{ asset('img/ranks/ranks-09.png') }}">
                                <p>Gold III</p>
                            </div>
                        </div>
                        <div class="priv">
                            <div>
                                <a href="#" data-toggle="modal" data-target="#priv1">Rank icon next to name in event chat</a>
                            </div>
                            <div>
                                <a href="#" data-toggle="modal" data-target="#priv2">Special border on name in event chat</a>
                            </div>
                        </div>
                    </div>
                    <div class="item fourth">
                        <div class="tier">
                            04
                        </div>
                        <div class="emblem">
                            <div class="unit">
                                <img src="{{ asset('img/ranks/ranks-10.png') }}">
                                <p>Star I</p>
                            </div>
                            <div class="unit">
                                <img src="{{ asset('img/ranks/ranks-11.png') }}">
                                <p>Star II</p>
                            </div>
                            <div class="unit">
                                <img src="{{ asset('img/ranks/ranks-12.png') }}">
                                <p>Star III</p>
                            </div>
                        </div>
                        <div class="priv">
                            <div>
                                <a href="#" data-toggle="modal" data-target="#priv1">Rank icon next to name in event chat</a>
                            </div>
                            <div>
                                <a href="#" data-toggle="modal" data-target="#priv2">Special border on name in event chat</a>
                            </div>
                            <div>
                                <a href="#" data-toggle="modal" data-target="#priv3">Unique color & border on name in event chat</a>
                            </div>
                        </div>
                    </div>
                    <div class="item fifth">
                        <div class="tier">
                            05
                        </div>
                        <div class="emblem">
                            <div class="unit">
                                <img src="{{ asset('img/ranks/ranks-13.png') }}">
                                <p>Diamond</p>
                            </div>
                        </div>
                        <div class="priv">
                            <div>
                                <a href="#" data-toggle="modal" data-target="#priv1">Rank icon next to name in event chat</a>
                            </div>
                            <div>
                                <a href="#" data-toggle="modal" data-target="#priv2">Special border on name in event chat</a>
                            </div>
                            <div>
                                <a href="#" data-toggle="modal" data-target="#priv3">Unique color & border on name in event chat</a>
                            </div>
                            <div>
                                <a href="#" data-toggle="modal" data-target="#priv4">2% discount on buying LP</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            
        </div>
    </div>
</div>

<div class="ranks-modals">
    <div id="priv1" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h3 class="colored">Privilege Info</h3>
                <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                <div class="modal-body posrel">
                    <div class="message">
                        <p class="mt-5"><img src="{{ asset('img/illu1.jpg') }}" class="w100"></p>
                        <p>Rank icon next to name in event chat.</p>
                        <div class="clearfix mt-5"></div>
                    </div>
                </div>
                <div class="nwcls">
                    <a href="#" data-dismiss="modal">Okay</a>
                </div>
            </div>
        </div>
    </div>

    <div id="priv2" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body posrel">
                    <div class="message">
                        <h3>Privilege Info</h3>
                        <p class="mt-5"><img src="{{ asset('img/illu2.jpg') }}" class="w100"></p>
                        <p>Special border on name in event chat.</p>
                        <div class="clearfix mt-5"></div>
                        <a href="#" class="tkbtn outline-white float-right" data-dismiss="modal">Okay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="priv3" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body posrel">
                    <div class="message">
                        <h3>Privilege Info</h3>
                        <p class="mt-5"><img src="{{ asset('img/illu3.jpg') }}" class="w100"></p>
                        <p>Unique color & border on name in event chat.</p>
                        <div class="clearfix mt-5"></div>
                        <a href="#" class="tkbtn outline-white float-right" data-dismiss="modal">Okay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="priv4" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body posrel">
                    <div class="message">
                        <h3>Privilege Info</h3>
                        <p class="mt-5"><img src="{{ asset('img/illu4.jpg') }}" class="w100"></p>
                        <p>2% discount on buying LP.</p>
                        <div class="clearfix mt-5"></div>
                        <a href="#" class="tkbtn outline-white float-right" data-dismiss="modal">Okay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="ranks-help" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h3 class="colored">Timkamu Ranks</h3>
                <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                <div class="modal-body posrel">
                    <div class="message">
                        <p>Mengenai ranks di Timkamu.com:</p>
                        <ol class="pl-3">
                            <li>Setiap LP yang dibeli akan memberikan member EXP.</li>
                            <li>EXP diperlukan untuk meningkatkan level member.</li>
                            <li>Semakin tinggi level member, semakin banyak promosi dan keunggulan lain nya.</li>
                            <li>Berikan dukungan berupa item-item menarik untuk tim kamu dengan menggunakan LP.</li>
                            <li>Battle Points (BP) dapat didapatkan dengan menukarkan LP.</li>
                        </ol>
                    </div>
                </div>
                <div class="nwcls">
                    <a href="#" data-dismiss="modal">Okay</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-ranks-index">
    <div class="mobile-ranks-help" data-toggle="modal" data-target="#ranks-help">
        <i data-feather="help-circle" class="icon"></i>Ranks Help
    </div>
    <div class="mobile-ranks-tier tier1">
        <div class="sides rank-icons">
            <div class="mobile-ranks-item">
                <img src="{{ asset('img/ranks/ranks-01.png') }}" class="mobile-ranks-item-img">
                <span class="mobile-ranks-item-title">Bronze I</span>
            </div>
            <div class="mobile-ranks-item">
                <img src="{{ asset('img/ranks/ranks-02.png') }}" class="mobile-ranks-item-img">
                <span class="mobile-ranks-item-title">Bronze II</span>
            </div>
            <div class="mobile-ranks-item">
                <img src="{{ asset('img/ranks/ranks-03.png') }}" class="mobile-ranks-item-img">
                <span class="mobile-ranks-item-title">Bronze III</span>
            </div>
        </div>
        <div class="sides benefits">
            <div class="mobile-ranks-benefits-header">
                Tier Benefits
            </div>
            <div class="no-benefits">
                Tier ini belum mendapatkan benefits
            </div>
        </div>
    </div>
    <div class="mobile-ranks-tier tier2">
        <div class="sides rank-icons">
            <div class="mobile-ranks-item">
                <img src="{{ asset('img/ranks/ranks-04.png') }}" class="mobile-ranks-item-img">
                <span class="mobile-ranks-item-title">Silver I</span>
            </div>
            <div class="mobile-ranks-item">
                <img src="{{ asset('img/ranks/ranks-05.png') }}" class="mobile-ranks-item-img">
                <span class="mobile-ranks-item-title">Silver II</span>
            </div>
            <div class="mobile-ranks-item">
                <img src="{{ asset('img/ranks/ranks-06.png') }}" class="mobile-ranks-item-img">
                <span class="mobile-ranks-item-title">Silver III</span>
            </div>
        </div>
        <div class="sides benefits">
            <div class="mobile-ranks-benefits-header">
                Tier Benefits
            </div>
            <div class="mobile-ranks-benefit-item" data-toggle="modal" data-target="#priv1">
                Chat Rank Icon
            </div>
        </div>
    </div>
    <div class="mobile-ranks-tier tier3">
        <div class="sides rank-icons">
            <div class="mobile-ranks-item">
                <img src="{{ asset('img/ranks/ranks-07.png') }}" class="mobile-ranks-item-img">
                <span class="mobile-ranks-item-title">Gold I</span>
            </div>
            <div class="mobile-ranks-item">
                <img src="{{ asset('img/ranks/ranks-08.png') }}" class="mobile-ranks-item-img">
                <span class="mobile-ranks-item-title">Gold II</span>
            </div>
            <div class="mobile-ranks-item">
                <img src="{{ asset('img/ranks/ranks-09.png') }}" class="mobile-ranks-item-img">
                <span class="mobile-ranks-item-title">Gold III</span>
            </div>
        </div>
        <div class="sides benefits">
            <div class="mobile-ranks-benefits-header">
                Tier Benefits
            </div>
            <div class="mobile-ranks-benefit-item" data-toggle="modal" data-target="#priv1">
                Chat Rank Icon
            </div>
            <div class="mobile-ranks-benefit-item" data-toggle="modal" data-target="#priv2">
                Chat Name Border
            </div>
        </div>
    </div>
    <div class="mobile-ranks-tier tier4">
        <div class="sides rank-icons">
            <div class="mobile-ranks-item">
                <img src="{{ asset('img/ranks/ranks-10.png') }}" class="mobile-ranks-item-img">
                <span class="mobile-ranks-item-title">Star I</span>
            </div>
            <div class="mobile-ranks-item">
                <img src="{{ asset('img/ranks/ranks-11.png') }}" class="mobile-ranks-item-img">
                <span class="mobile-ranks-item-title">Star II</span>
            </div>
            <div class="mobile-ranks-item">
                <img src="{{ asset('img/ranks/ranks-12.png') }}" class="mobile-ranks-item-img">
                <span class="mobile-ranks-item-title">Star III</span>
            </div>
        </div>
        <div class="sides benefits">
            <div class="mobile-ranks-benefits-header">
                Tier Benefits
            </div>
            <div class="mobile-ranks-benefit-item" data-toggle="modal" data-target="#priv1">
                Chat Rank Icon
            </div>
            <div class="mobile-ranks-benefit-item" data-toggle="modal" data-target="#priv2">
                Chat Name Border
            </div>
            <div class="mobile-ranks-benefit-item" data-toggle="modal" data-target="#priv3">
                Chat Name Color
            </div>
        </div>
    </div>
    <div class="mobile-ranks-tier tier5">
        <div class="sides rank-icons">
            <div class="mobile-ranks-item">
                <img src="{{ asset('img/ranks/ranks-13.png') }}" class="mobile-ranks-item-img">
                <span class="mobile-ranks-item-title">Diamond</span>
            </div>
        </div>
        <div class="sides benefits">
            <div class="mobile-ranks-benefits-header">
                Tier Benefits
            </div>
            <div class="mobile-ranks-benefit-item" data-toggle="modal" data-target="#priv1">
                Chat Rank Icon
            </div>
            <div class="mobile-ranks-benefit-item" data-toggle="modal" data-target="#priv2">
                Chat Name Border
            </div>
            <div class="mobile-ranks-benefit-item" data-toggle="modal" data-target="#priv3">
                Chat Name Color
            </div>
            <div class="mobile-ranks-benefit-item" data-toggle="modal" data-target="#priv4">
                2% LP Discount
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .mobile-ranks-help {
        background: rgb(0 0 0 / 40%);
        padding: 25px;
        font-family: 'Nunito Sans';
        font-weight: 800;
        font-size: 14px;
    }
    .mobile-ranks-help .icon {
        width: 16px;
        position: relative;
        top: -2px;
        margin-right: 5px;
        opacity: 0.5;
    }
    .mobile-ranks-benefits-header {
        font-family:'Rajdhani-Bold' !important;
        text-transform: uppercase;
        font-size: 16px;
        text-align: center;
        margin-bottom: 15px;
    }
    .mobile-ranks-benefit-item {
        font-family: 'Nunito Sans';
        font-weight: 800;
        font-size: 10px;
        text-transform: uppercase;
        padding: 12px 5px;
        border-radius: 50px;
        background: rgba(0,0,0,0.6);
        width: 100%;
        line-height: initial;
        text-align: center;
        margin-bottom: 10px;
        border: 2px solid rgba(255,255,255,0.3);
    }
    .mobile-ranks-index {
        display: none;
        background: rgba(0,0,0,0.2);
        margin-top: 70px;
    }
    .mobile-ranks-tier {
        display: flex;
    }
    .mobile-ranks-tier .sides {
        flex: 1 1 50%;
        padding: 30px 15px;
    }
    .mobile-ranks-tier .sides.rank-icons {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .mobile-ranks-tier .sides.benefits {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .mobile-ranks-tier .sides.benefits .no-benefits {
        line-height: initial;
        text-align: center;
        font-family: 'Nunito Sans';
        font-size: 12px;
        opacity: 0.5;
    }
    .mobile-ranks-tier .sides.benefits {
        background: rgba(0,0,0,0.1);
    }
    .mobile-ranks-tier.tier2 {
        background: rgba(0,0,0,0.2);   
    }
    .mobile-ranks-tier.tier3 {
        background: rgba(0,0,0,0.4);   
    }
    .mobile-ranks-tier.tier4 {
        background: rgba(0,0,0,0.5);   
    }
    .mobile-ranks-tier.tier4 {
        background: rgba(0,0,0,0.6);   
    }
    .mobile-ranks-tier.tier5 {
        background: rgba(0,0,0,0.7);   
    }
    .mobile-ranks-item {
        text-align: center;
        margin-bottom: 20px;
    }
    .mobile-ranks-item-img {
        height: 60px;
    }
    .mobile-ranks-item-title {
        display: block;
        font-family: 'Nunito Sans';
        font-weight: 800;
        font-size: 12px;
        margin-top: -10px;
    }
    @media (max-width: 992px) {
        .root.ranks-index {
            display: none;
        }
        .mobile-ranks-index {
            display: block;
        }
    }
</style>

<style type="text/css">
    body.bg1 {
        background-image: url(img/f1a.jpg);
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    .root {
        padding-top: 100px;
        padding-bottom: 100px;
    }

    .rank-tbl .tkbtn .icon {
        width: 16px;
        position: relative;
        top: -2px;
        margin-right: 8px;
    }
    .rank-tbl .tkbtn.dark {
        background: rgba(0,0,0,0.2);
        color: #ffffffdd;
        border: 0px;
        position: absolute;
        top: 20px;
        right: 20px;
        padding: 6px 20px 6px 18px;
    }
    .rank-tbl .tkbtn.dark:hover {
        background: rgba(0,0,0,0.4);
    }
    .rank-tbl {
        display: flex;
        flex-flow: column nowrap;

        background: rgba(0,0,0,0.2);
        position: relative;
    }
    .rank-tbl .item {
        height: 130px;

        display: flex;
    }
    .rank-tbl .item.first {background: rgba(0,0,0,0.1);}
    .rank-tbl .item.first .tier {background: #8F3A74;}

    .rank-tbl .item.second {background: rgba(0,0,0,0.2);}
    .rank-tbl .item.second .tier {background: #633F6B;}

    .rank-tbl .item.third {background: rgba(0,0,0,0.3);}
    .rank-tbl .item.third .tier {background: #444162;}

    .rank-tbl .item.fourth {background: rgba(0,0,0,0.4);}
    .rank-tbl .item.fourth .tier {background: #263D55;}

    .rank-tbl .item.fifth {background: rgba(0,0,0,0.5);}
    .rank-tbl .item.fifth .tier {background: #22384B;}

    .rank-tbl .item .tier {
        height: 130px;
        position: relative;

        flex: 0 0 100px;
        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 30px;
        font-family: 'Nunito Sans';
        font-weight: 100;
        color: #ffffff66;
    }
    .rank-tbl .item .tier:after {
        content: " ";
        width: 0; 
        height: 0; 
        border-left: 50px solid transparent;
        border-right: 50px solid transparent;
        border-top: 20px solid #f00;
        position: absolute;
        bottom: -20px;
        left: 0;
        z-index: 80;
    } 
    .rank-tbl .item:last-child .tier:after {
        content: none;
    } 
    .rank-tbl .item.first .tier:after {border-top: 20px solid #8F3A74;}
    .rank-tbl .item.second .tier:after {border-top: 20px solid #633F6B;}
    .rank-tbl .item.third .tier:after {border-top: 20px solid #444162;}
    .rank-tbl .item.fourth .tier:after {border-top: 20px solid #263D55;}

    .rank-tbl .item .emblem {
        height: 130px;

        flex: 0 0 370px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .emblem .unit {
        width: 80px;
        text-align: center;
        margin-right: 38px;
    }
    .emblem .unit:last-child {
        margin-right: 0;
    }
    .emblem .unit img {
        height: 60px;
    }
    .emblem .unit p {
        margin: 0;
        margin-top: -10px;

        font-family: 'Nunito Sans';
        font-weight: 800;
        font-size: 12px;
        text-align: center;
        color: #ffffff99;
    }
    .rank-tbl .item .priv {
        height: 130px;
        background: rgba(0,0,0,0.1);

        flex: 1;
        display: flex;
        align-items: center;
        justify-content: left;
    }
    .rank-tbl .item .priv > div {
        flex: 0 0 20%;
        padding: 20px;
        font-family: 'Nunito Sans';
        font-size: 12px;
        line-height: initial;
    }
    .rank-tbl .item .priv > div a {
        color: #ffffffaa;
    }
    .rank-tbl .item .priv > div a:hover {
        color: #fff;
    }
</style>
@endsection