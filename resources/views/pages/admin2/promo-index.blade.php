@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')

<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Promos</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 mb-10">
                    <div class="table-meta grey text-italic">Showing <span class="black">10</span> out of <span class="black">344</span> promos</div>
                </div>

                <div class="col-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="w-10">Promo ID</th>
                                        <th class="w-10">Started</th>
                                        <th>Promo name</th>
                                        <th>Promo description</th>
                                        <th>Limit</th>
                                        <th>Limit remaining</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cursor-ptr">
                                        <td><span class="o3 mr-1">[12]</span></td>
                                        <td>2020-09-26</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>Registrasi dapat 26 LP</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">View</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Untuk setiap registrasi baru (dengan nomor telefon yang terverifikasi), akan langsung mendapatkan gratis 26 LP.</td>
                                        <td>5000 registrasi</td>
                                        <td class="text-right">0</td>
                                        <td><span class="text-danger">Inactive</span></td>
                                    </tr>
                                    <tr class="cursor-ptr">
                                        <td><span class="o3 mr-1">[12]</span></td>
                                        <td>2020-09-26</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>Referral Event 2020</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">View</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p>Untuk setiap member baru (referee) yang mencantumkan kode referral dan nomor telfon yang valid , akan mendapat 8 BP gratis.</p>

                                            <p>Untuk setiap member pemilik kode referral (referrer), setiap kali kode referral nya terpakai dan pemakai kode telah melakukan top up sebesar 9 LP, pemilik kode akan mendapat 9 LP.</p>

                                            <p>Penggunaan referral code dibatasi 5,000. Pemakaian satu code referral tidak dibatasi. Satu code referral dapat dipakai berkali-kali.</p>
                                        </td>
                                        <td>Referral usage 5000</td>
                                        <td class="text-right">3789</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr class="cursor-ptr">
                                        <td><span class="o3 mr-1">[12]</span></td>
                                        <td>2020-09-26</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>Diskon 25% cash (game topup)</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="/admin2/promo-view-diskon25">View</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p>Potongan 25% untuk setiap pembelian Game Diamonds menggunakan uang tunai (GoPay, OVOV etc) di TimKamu.com.</p>
                                        </td>
                                        <td>No limit</td>
                                        <td class="text-right">0</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr class="cursor-ptr">
                                        <td><span class="o3 mr-1">[12]</span></td>
                                        <td>2020-09-26</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>Cashback 10% BP</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="/admin2/promo-view-cashback10">View</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p>Dapatkan cashback 10% <span class="money money-14 right money-inline fw-400 white-10">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> setiap kali kamu recharge LP.</p>
                                            <p>
                                                Besar <span class="money money-14 right money-inline fw-400 white-10">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> adalah 10% x <span class="money money-14 right money-inline fw-400 white-10">LP<img src="{{ asset('img/currencies/lp.svg') }}"></span> jumlah recharge.<br>
                                                Cashback <span class="money money-14 right money-inline fw-400 white-10">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> di bawah .7 akan round down <br>
                                                Cashback <span class="money money-14 right money-inline fw-400 white-10">BP<img src="{{ asset('img/currencies/bp.svg') }}"></span> di atas .8 akan round up
                                            </p>
                                            <p>
                                                Contoh: recharge 1 LP, cashback = 0 BP (10% = 0.1) <br>
                                                Contoh: recharge 7 LP, cashback = 0 BP (10% = 0.7) <br>
                                                Contoh: recharge 8 LP, cashback = 1 BP (10% = 0.8) <br>
                                                Contoh: recharge 15 LP, cashback = 1 BP (10% = 1.5) <br>
                                                Contoh: recharge 66 LP, cashback = 6 BP (10% = 6.6) <br>
                                                Contoh: recharge 200 LP, cashback = 20 BP (10% = 20)
                                            </p>
                                        </td>
                                        <td>No limit</td>
                                        <td class="text-right">0</td>
                                        <td><span class="text-success">Active</span></td>
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