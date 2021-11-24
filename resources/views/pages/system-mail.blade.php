@extends('layouts.app')

@section('body_class', "bg1")
@section('content')

@include('includes.menu')

<div class="root desktop-system-mail">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="rajdhani-bold font-30 text-uppercase color-white mb-4">System Mail</h2>
                <div class="system-msg-wrapper">
                    <div class="system-msg-list">

                        <div class="system-msg-item opened active" data-target="hasil">
                            <div class="left">
                                <i data-feather="mail" class="icon"></i>
                            </div>
                            <div class="right">
                                <div class="system-mgs-preview-title">
                                    Hasil Games Event
                                </div>
                                <div class="system-mgs-preview-date">
                                    24 Sept 2020
                                </div>
                            </div>
                        </div>

                        <div class="system-msg-item" data-target="game-currency-success">
                            <div class="left">
                                <i data-feather="mail" class="icon"></i>
                            </div>
                            <div class="right">
                                <div class="system-mgs-preview-title">
                                    Game Currency (Success)
                                </div>
                                <div class="system-mgs-preview-date">
                                    22 Sept 2020
                                </div>
                            </div>
                        </div>

                        <div class="system-msg-item" data-target="game-currency-pending">
                            <div class="left">
                                <i data-feather="mail" class="icon"></i>
                            </div>
                            <div class="right">
                                <div class="system-mgs-preview-title">
                                    Game Currency (Pending)
                                </div>
                                <div class="system-mgs-preview-date">
                                    22 Sept 2020
                                </div>
                            </div>
                        </div>

                        <div class="system-msg-item" data-target="beli-lp">
                            <div class="left">
                                <i data-feather="mail" class="icon"></i>
                            </div>
                            <div class="right">
                                <div class="system-mgs-preview-title">
                                    Pembelian LP
                                </div>
                                <div class="system-mgs-preview-date">
                                    21 Sept 2020
                                </div>
                            </div>
                        </div>

                        <div class="system-msg-item" data-target="konversi-lp-ke-bp">
                            <div class="left">
                                <i data-feather="mail" class="icon"></i>
                            </div>
                            <div class="right">
                                <div class="system-mgs-preview-title">
                                    Konversi LP ke BP
                                </div>
                                <div class="system-mgs-preview-date">
                                    15 Sept 2020
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- message hasil game betting -->
                    <div class="system-msg-content active" data-tag="hasil">
                        <!-- begin data from db -->
                        <div class="system-msg-db-data">
                            <div class="system-msg-content-head">
                                <div class="system-msg-content-title">
                                    Hasil Games Event
                                </div>
                                <div class="system-msg-content-message">
                                    <p class="opacity-05">[Order ID: 0042442312]</p>
                                    <p>Terima kasih atas dukungan yang kamu sudah berikan untuk event <span class="system-mail-color-1">ONIC vs ALTEREGO 07 September 2020 18:30 WIB</span>.</p>
                                </div>
                            </div>
                            <div class="system-msg-content-additional">
                                <div class="system-msg-content-additional-title">
                                    Rincian konversi
                                </div>
                                <div class="system-msg-content-additional-message">
                                    <table class="system-mail-table-rincian">
                                        <thead>
                                            <tr>
                                                <th>Dukungan</th>
                                                <th>Nilai Dukungan</th>
                                                <th>Bonus</th>
                                                <th>Benar</th>
                                                <th>Hasil</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Benar/Salah</td>
                                                <td class="text-right">400 <img src="{{ asset('img/currencies/bp.svg') }}" class="c14 right"></td>
                                                <td>30%</td>
                                                <td>Ya</td>
                                                <td class="text-right">520 <img src="{{ asset('img/currencies/bp.svg') }}" class="c14 right"></td>
                                            </tr>
                                            <tr>
                                                <td>Turtle Kills</td>
                                                <td class="text-right">100 <img src="{{ asset('img/currencies/bp.svg') }}" class="c14 right"></td>
                                                <td>25%</td>
                                                <td>Tidak</td>
                                                <td class="text-right">0 <img src="{{ asset('img/currencies/bp.svg') }}" class="c14 right"></td>
                                            </tr>
                                            <tr class="result">
                                                <td>Total dukungan yang diberikan</td>
                                                <td class="text-right">500 <img src="{{ asset('img/currencies/bp.svg') }}" class="c14 right"></td>
                                                <td></td>
                                                <td>Total BP yang didapat</td>
                                                <td class="text-right">520 <img src="{{ asset('img/currencies/bp.svg') }}" class="c14 right"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Support item</td>
                                                <td class="text-right">100 <img src="{{ asset('img/items/items-01.png') }}" class="c14 right"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                        </div>
                    </div>

                    <!-- message beli diamonds mlbb -->
                    <div class="system-msg-content" data-tag="game-currency-success">
                        <div class="system-msg-content-head">
                            <div class="system-msg-content-title">
                                Pembelian Game Currency (Pending)
                            </div>
                            <div class="system-msg-content-message">
                                <p class="opacity-05">[Order ID: 0042442312]</p>
                                <p>Terima kasih, pembelian game currency kamu sudah selesai.. </p>
                            </div>
                        </div>
                        <div class="system-msg-content-additional">
                            <div class="system-msg-content-additional-title">
                                Rincian pembelian
                            </div>
                            <div class="system-msg-content-additional-message">
                                <table class="system-msg-table">
                                    <tr>
                                        <td>Status pembelian</td>
                                        <td>Selesai</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu pembelian</td>
                                        <td>02 September 2020 18.33 WIB</td>
                                    </tr>
                                    <tr>
                                        <td>Game</td>
                                        <td>Mobile Legends: Bang Bang</td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>12412312312 (445522)</td>
                                    </tr>
                                    <tr>
                                        <td>Phone number</td>
                                        <td>+62 817246781</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah yang dibeli</td>
                                        <td>2,500</td>
                                    </tr>
                                    <tr>
                                        <td>Dibayar dengan</td>
                                        <td>Rupiah</td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td>Rp 50,000</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- message beli diamonds mlbb -->
                    <div class="system-msg-content" data-tag="game-currency-pending">
                        <div class="system-msg-content-head">
                            <div class="system-msg-content-title">
                                Pembelian Game Currency (Pending)
                            </div>
                            <div class="system-msg-content-message">
                                <p class="opacity-05">[Order ID: 0042442312]</p>
                                <p>Terima kasih atas pembelian game currency di Timkamu. Pesanan kamu sedang diproses.</p>
                            </div>
                        </div>
                        <div class="system-msg-content-additional">
                            <div class="system-msg-content-additional-title">
                                Rincian pembelian
                            </div>
                            <div class="system-msg-content-additional-message">
                                <table class="system-msg-table">
                                    <tr>
                                        <td>Status pembelian</td>
                                        <td>Pembayaran diterima</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu pembelian</td>
                                        <td>02 September 2020 18.33 WIB</td>
                                    </tr>
                                    <tr>
                                        <td>Game</td>
                                        <td>Mobile Legends: Bang Bang</td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>12412312312 (445522)</td>
                                    </tr>
                                    <tr>
                                        <td>Phone number</td>
                                        <td>+62 817246781</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah yang dibeli</td>
                                        <td>2,500</td>
                                    </tr>
                                    <tr>
                                        <td>Dibayar dengan</td>
                                        <td>Rupiah</td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td>Rp 50,000</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- message beli LP / BP -->
                    <div class="system-msg-content" data-tag="beli-lp">
                        <div class="system-msg-content-head">
                            <div class="system-msg-content-title">
                                Pembelian LP
                            </div>
                            <div class="system-msg-content-message">
                                <p class="opacity-05">[Order ID: 009294185]</p>
                                <p>Terima kasih atas pemebelian Loyalty Points dari Timkamu. </p>
                            </div>
                        </div>
                        <div class="system-msg-content-additional">
                            <div class="system-msg-content-additional-title">
                                Rincian item yang dibeli
                            </div>
                            <div class="system-msg-content-additional-message">
                                <div class="system-mail-item-group">
                                    <div class="system-msg-item-box">
                                        <img src="{{ asset('img/currencies/lp.svg') }}" class="icon">
                                        <span>250</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- message konversi-lp-ke-bp -->
                    <div class="system-msg-content" data-tag="konversi-lp-ke-bp">
                        <div class="system-msg-content-head">
                            <div class="system-msg-content-title">
                                Konversi LP ke BP
                            </div>
                            <div class="system-msg-content-message">
                                <p class="opacity-05">[Order ID: 0088758273]</p>
                                <p>Konversi Loyalty Points ke Battle Points kamu berhasil dengan nilai tukar 1 LP = 1 BP. </p>
                            </div>
                        </div>
                        <div class="system-msg-content-additional">
                            <div class="system-msg-content-additional-title">
                                Rincian konversi
                            </div>
                            <div class="system-msg-content-additional-message">
                                <div class="system-mail-item-group">
                                    <div class="system-msg-item-box">
                                        <img src="{{ asset('img/currencies/lp.svg') }}" class="icon">
                                        <span>65</span>
                                    </div>
                                    <div class="system-msg-item--convert-to">
                                        <i data-feather="chevrons-right" class="icon"></i>
                                    </div>
                                    <div class="system-msg-item-box">
                                        <img src="{{ asset('img/currencies/bp.svg') }}" class="icon">
                                        <span>65</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="system-msg-no-mail">
                    Kamu belum memiliki pesan
                </div> -->
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .desktop-system-mail .system-msg-no-mail {
        min-height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgb(0 0 0 / 20%);
    }
    .system-mail-color-1 {
        color: #FFEB3B;
        font-weight: 800;
    }
    .system-mail-table-rincian th,
    .system-mail-table-rincian td {
        padding: 10px 15px;
    }
    .system-mail-table-rincian thead tr {
        background: rgb(0 0 0 / 30%);
    }
    .system-mail-table-rincian tbody tr:nth-child(odd) {
        background: rgb(0 0 0 / 20%);
    }
    .system-mail-table-rincian tbody tr:nth-child(even) {
        background: rgb(0 0 0 / 10%);
    }
    .system-mail-table-rincian tr.result {
        border-top: 1px solid rgb(255 255 255 / 40%);
    }
    .system-msg-table td {
        padding: 10px 15px;
    }
    .system-msg-table tr:nth-child(odd) {
        background: rgb(0 0 0 / 20%);
    }
    .system-msg-table tr:nth-child(even) {
        background: rgb(0 0 0 / 10%);
    }
    .system-msg-item--convert-to {
        flex: 0 0 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .system-msg-item--convert-to .icon {
        height: 50px;
        width: 50px;
        opacity: 0.3;
    }
    .system-mail-item-group {
        display: flex;
        flex-wrap: wrap;
    }
    .system-msg-item-box {
        background: rgb(0 0 0 / 40%);
        border: 2px solid rgb(255 255 255 / 20%);
        border-radius: 10px;
        flex: 0 0 60px;
        height: 60px;
        padding: 10px;
        position: relative;
        margin: 5px;
    }
    .system-msg-item-box span {
        position: absolute;
        right: 6px;
        bottom: 2px;
        font-weight: 800;
        font-style: italic;
    }
    .desktop-system-mail .system-msg-content-title {
        font-size: 20px;
        font-weight: 800px;
    }
    .system-msg-content-additional-title {
        font-size: 20px;
    }
    .desktop-system-mail .system-msg-content-message {
        margin-top: 20px;
    }
    .system-msg-content-additional-message {
        margin-top: 20px;
    }
    .system-msg-item {
        padding: 20px 0;
        background: rgb(0 0 0 / 40%);
        border-bottom: 1px solid rgb(255 255 255 / 20%);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .desktop-system-mail .system-msg-item.no-mail {
        padding: 80px 15px;
    }
    .mb-system-mail .system-msg-item.no-mail {
        padding: 80px 15px;
        border-bottom: 0px;
    }
    .system-msg-item.opened {
        background: rgb(0 0 0 / 20%);
    }
    .system-msg-item:hover {
        background: rgb(0 0 0 / 30%);
    }
    .system-msg-item.active {
        background: rgb(233 30 99);
    }
    .system-msg-item .left {
        flex: 0 0 76px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .system-msg-item .left .icon {
        opacity: 0.5;
    }
    .system-msg-item .right {
        flex: 1;
        display: flex;
        flex-direction: column;
        text-align: left;
    }
    .system-mgs-preview-title {
        font-size: 14px;
        font-weight: 800;
    }
    .system-mgs-preview-date {
        opacity: 0.5;
    }
    .system-msg-wrapper {
        display: flex;
        line-height: initial;
    }
    .system-msg-list {
        flex: 0 0 300px;
        max-height: 700px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
    }
    /* width */
    .system-msg-list::-webkit-scrollbar {
      width: 10px;
    }
    /* Track */
    .system-msg-list::-webkit-scrollbar-track {
      background: rgb(0 0 0 / 20%);
    }
    /* Handle */
    .system-msg-list::-webkit-scrollbar-thumb {
      background: rgb(0 0 0 / 40%);
    }
    /* Handle on hover */
    .system-msg-list::-webkit-scrollbar-thumb:hover {
      background: rgb(0 0 0 / 40%);
    }
    .system-msg-content {
        flex: 1;
        background: rgb(0 0 0 / 20%);
        margin-left: 10px;
        flex-direction: column;
        display: none;
    }
    .system-msg-content.active {
        display: block;
    }
    .desktop-system-mail .system-msg-content-head {
        padding: 25px;
        min-height: 150px;
        border-bottom: 1px solid rgb(255 255 255 / 10%);
    }
    .mb-system-mail .system-msg-content-head {
        border-bottom: 1px solid rgb(255 255 255 / 10%);
    }
    .desktop-system-mail .system-msg-content-additional {
        padding: 25px;
        padding-bottom: 75px;
        min-height: 150px;
    }
    .mb-system-mail .system-msg-content-additional {
        padding: 15px;
        padding-bottom: 75px;
    }
    .mb-system-mail-page-title {
        font-family:'Rajdhani-Bold';
        font-size: 20px;
        text-transform: uppercase;
        padding: 10px 15px;
        background: rgb(0 0 0 / 60%);
        margin: 0;
    }
    .mb-mail-controls-back {
        padding: 15px;
        background: rgb(0 0 0 / 20%);
        position: relative;
    }
    .mb-mail-controls-back span {
        position: absolute;
        right: 15px;
        opacity: 0.5;
    }
    .mb-system-mail-back {
        height: 14px;
        width: 14px;
        opacity: 0.5;
        position: relative;
        top: -2px;
        margin-right: 5px;
    }
    .mb-mail-content {
        background: rgb(0 0 0 / 20%);
    }
    .mb-mail-content-additional {
        border-top: 1px solid rgb(255 255 255 / 20%);
    }
</style>

<div class="root mb-system-mail">
    <div class="mb-system-mail-wrapper">

        <h2 class="mb-system-mail-page-title">System Mail</h2>
        <div class="mb-mail-list">
            <!-- <div class="system-msg-item no-mail">
                Kamu belum memiliki pesan
            </div> -->
            <div class="system-msg-item" data-target="hasil">
                <div class="left">
                    <i data-feather="mail" class="icon"></i>
                </div>
                <div class="right">
                    <div class="system-mgs-preview-title">
                        Hasil Games Event
                    </div>
                    <div class="system-mgs-preview-date">
                        24 Sept 2020
                    </div>
                </div>
            </div>

            <div class="system-msg-item" data-target="game-currency-success">
                <div class="left">
                    <i data-feather="mail" class="icon"></i>
                </div>
                <div class="right">
                    <div class="system-mgs-preview-title">
                        Game Currency (Success)
                    </div>
                    <div class="system-mgs-preview-date">
                        22 Sept 2020
                    </div>
                </div>
            </div>

            <div class="system-msg-item" data-target="game-currency-pending">
                <div class="left">
                    <i data-feather="mail" class="icon"></i>
                </div>
                <div class="right">
                    <div class="system-mgs-preview-title">
                        Game Currency (Pending)
                    </div>
                    <div class="system-mgs-preview-date">
                        22 Sept 2020
                    </div>
                </div>
            </div>

            <div class="system-msg-item" data-target="beli-lp">
                <div class="left">
                    <i data-feather="mail" class="icon"></i>
                </div>
                <div class="right">
                    <div class="system-mgs-preview-title">
                        Pembelian LP
                    </div>
                    <div class="system-mgs-preview-date">
                        21 Sept 2020
                    </div>
                </div>
            </div>

            <div class="system-msg-item" data-target="konversi-lp-ke-bp">
                <div class="left">
                    <i data-feather="mail" class="icon"></i>
                </div>
                <div class="right">
                    <div class="system-mgs-preview-title">
                        Konversi LP ke BP
                    </div>
                    <div class="system-mgs-preview-date">
                        15 Sept 2020
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-mail-content">
            <div class="mb-mail-controls-back">
                <i data-feather="corner-up-left" class="mb-system-mail-back"></i> back
                <span>27 Sept 2020</span>
            </div>

            <!-- begin data from db -->
            <div class="system-msg-db-data">
                <div class="system-msg-content-head">
                    <div class="system-msg-content-title">
                        Hasil Games Event
                    </div>
                    <div class="system-msg-content-message">
                        <p class="opacity-05">[Order ID: 0042442312]</p>
                        <p>Terima kasih atas dukungan yang kamu sudah berikan untuk event <span class="system-mail-color-1">ONIC vs ALTEREGO 07 September 2020 18:30 WIB</span>.</p>
                    </div>
                </div>
                <div class="system-msg-content-additional">
                    <div class="system-msg-content-additional-title">
                        Rincian konversi
                    </div>
                    <div class="system-msg-content-additional-message">
                        <table class="system-mail-table-rincian">
                            <thead>
                                <tr>
                                    <th>Dukungan</th>
                                    <th>Nilai Dukungan</th>
                                    <th>Bonus</th>
                                    <th>Benar</th>
                                    <th>Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Benar/Salah</td>
                                    <td class="text-right">400 <img src="{{ asset('img/currencies/bp.svg') }}" class="c14 right"></td>
                                    <td>30%</td>
                                    <td>Ya</td>
                                    <td class="text-right">520 <img src="{{ asset('img/currencies/bp.svg') }}" class="c14 right"></td>
                                </tr>
                                <tr>
                                    <td>Turtle Kills</td>
                                    <td class="text-right">100 <img src="{{ asset('img/currencies/bp.svg') }}" class="c14 right"></td>
                                    <td>25%</td>
                                    <td>Tidak</td>
                                    <td class="text-right">0 <img src="{{ asset('img/currencies/bp.svg') }}" class="c14 right"></td>
                                </tr>
                                <tr class="result">
                                    <td>Total dukungan yang diberikan</td>
                                    <td class="text-right">500 <img src="{{ asset('img/currencies/bp.svg') }}" class="c14 right"></td>
                                    <td></td>
                                    <td>Total BP yang didapat</td>
                                    <td class="text-right">520 <img src="{{ asset('img/currencies/bp.svg') }}" class="c14 right"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Support item</td>
                                    <td class="text-right">100 <img src="{{ asset('img/items/items-01.png') }}" class="c14 right"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>

        </div>
        
    </div>
</div>


<style type="text/css">
    .mb-system-msg-additional-title {
        font-size: 16px;
        font-weight: 100;
        padding-bottom: 10px;
    }
    .mb-mail-content-additional {
        padding: 15px;
        padding-bottom: 10px;
    }
    .mb-system-mail .system-msg-content-title {
        padding: 15px;
        padding-bottom: 10px;
        font-size: 26px;
        font-weight: 100;
    }
    .mb-system-mail .system-msg-content-message {
        padding: 15px;
        padding-top: 10px;
    }
    .mb-mail-list.hidden {
        display: none;
    }
    .root.mb-system-mail {
        padding-top: 70px;
    }
    .mb-system-mail {
        display: none;
        line-height: initial;
    }
    .mb-mail-content {
        display: none;
        padding-bottom: 80px;
    }
    .mb-mail-content.opened {
        display: flex;
        flex-direction: column;
    }
    @media (max-width: 768px) {
        .desktop-system-mail {
            display: none;
        }
        .mb-system-mail {
            display: block
        }
        .system-mail-table-rincian th,
        .system-mail-table-rincian td {
            padding: 10px;
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
    .root p {
        text-align: left !important;
    }
</style>
<style type="text/css">
    @media (max-width: 992px) {
        body.bg1 {
            background-image: linear-gradient(#EC1866, #033C62);
            background-repeat: no-repeat;
            background-size: cover;
        }
    }
</style>

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {

        $('body').on('click', '.desktop-system-mail .system-msg-item', function(e){
            e.preventDefault();

            var dataTarget = $(this).attr('data-target');
            
            $('.system-msg-item').removeClass('active');
            $(this).addClass('opened active');
            $('#spinner').modal('show');

            // ini hanya code sementara, nanti keshia ganti sama yang ajax call ke db msg
            setTimeout(function(){

                $('.system-msg-content').removeClass('active');
                $('.system-msg-content[data-tag="'+dataTarget+'"]').addClass('active');
                $('#spinner').modal('hide');

            }, 500);
        });

        $('body').on('click', '.mb-system-mail .system-msg-item', function(e){
            e.preventDefault();

            $(this).addClass('opened');
            $('.mb-mail-list').addClass('hidden');
            $('.mb-mail-content').addClass('opened');
        });

        $('body').on('click', '.mb-mail-controls-back', function(e){
            e.preventDefault();

            $('.mb-mail-list').removeClass('hidden');
            $('.mb-mail-content').removeClass('opened');
        });
        
    });
</script>
@endsection