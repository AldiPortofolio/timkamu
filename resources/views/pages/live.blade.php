@extends('layouts.app')

@section('body_class', "bg1")
@section('content')

@include('includes.menu')

<?php 
    $nominals = [
         25,
         50,
         100,
         250,
         500,
         1000,
         1500,
         2000
    ]; 
?>

<div class="root event-live-detail">
    <div class="container-fluid">
        
        <div class="live-wrapper">
            
            <!------------------------------------
            --------------------------------------
            LEFT SECTION
            --------------------------------------
            -------------------------------------->
            <div class="area event-live-left">
                <div class="stream-meta-head bg-00-06">
                    <a href="#" class="stream-meta-back-link"><i data-feather="chevron-left" class="stream-meta-back-icon"></i></a>
                    <div class="event-game-title">
                        ONIC vs AE <span>MPL Regular Season 2020</span>
                    </div>
                </div>
                <div class="stream-main-window bg-00-02">
                    <div class="live-stream-feed">
                        <img src="<?php echo asset('img/thumb.PNG'); ?>" class="img-temp">
                    </div>

                    <!-- live event use this code -->
                    <!-- <div class="live-stream-scores mlbb-scores live-scores">
                        <div class="sides stream-score-top">
                            <img src="<?php echo asset('img/team-logos/onic.png'); ?>" class="score-team-icon">
                            <span class="score-team-name">ONIC</span>
                        </div>
                        <div class="sides stream-score-mid">
                            <div class="score-side score-side-a">
                                3
                            </div>
                            <div class="score-side-mid">
                                <span class="live-icon">live</span>
                                <span class="live-timer">13:42</span>
                            </div>
                            <div class="score-side score-side-b">
                                0
                            </div>
                        </div>
                        <div class="sides stream-score-bottom">
                            <img src="<?php echo asset('img/team-logos/aura.png'); ?>" class="score-team-icon">
                            <span class="score-team-name">AURA</span>
                        </div>
                    </div> -->

                    <!-- upcoming event use this code -->
                    <div class="live-stream-scores mlbb-scores upcoming-scores">
                        <div class="sides stream-score-top">
                            <img src="<?php echo asset('img/team-logos/onic.png'); ?>" class="score-team-icon">
                            <span class="score-team-name">ONIC</span>
                        </div>
                        <div class="sides stream-score-mid">
                            <div class="score-side-mid">
                                <span class="score-event-start">28 Aug 18:30</span>
                                <span class="score-event-countdown" id="upcoming-countdown">13:42</span>
                            </div>
                        </div>
                        <div class="sides stream-score-bottom">
                            <img src="<?php echo asset('img/team-logos/aura.png'); ?>" class="score-team-icon">
                            <span class="score-team-name">AURA</span>
                        </div>
                    </div>

                    <!-- past event use this code -->
                    <!-- <div class="live-stream-scores mlbb-scores upcoming-scores">
                        <div class="sides stream-score-top">
                            <img src="<?php echo asset('img/team-logos/onic.png'); ?>" class="score-team-icon">
                            <span class="score-team-name">ONIC</span>
                        </div>
                        <div class="sides stream-score-mid">
                            <div class="score-side score-side-a">
                                3
                            </div>
                            <div class="score-side-mid">
                                <span class="live-icon finished">05 Aug 18:30</span>
                                <span class="live-timer">This event has finished</span>
                            </div>
                            <div class="score-side score-side-b">
                                0
                            </div>
                        </div>
                        <div class="sides stream-score-bottom">
                            <img src="<?php echo asset('img/team-logos/aura.png'); ?>" class="score-team-icon">
                            <span class="score-team-name">AURA</span>
                        </div>
                    </div> -->

                </div>
                <div class="stream-meta-bottom bg-00-06">
                    <div class="item stream-meta-bottom-title">
                        <img src="<?php echo asset('img/ranks/ranks-10.png'); ?>" class="icon">
                        Username
                    </div>
                    <div class="item curr stream-meta-bottom-lp">
                        <img src="<?php echo asset('img/currencies/lp.svg'); ?>" class="icon"> 2,500
                    </div>
                    <div class="item curr stream-meta-bottom-bp">
                        <img src="<?php echo asset('img/currencies/bp.svg'); ?>" class="icon"> 450
                    </div>
                    <a href="{{ url('purchase/detail?name=lp') }}" target="_blank" class="item stream-meta-bottom-recharge">Recharge LP</a>
                    <a href="{{ url('ranks') }}" onclick="window.open(this.href, 'mywin','left=20,top=60,width=1200,height=600,toolbar=0,resizable=0'); return false;"  class="item stream-meta-bottom-ranks">Ranks</a>
                    <div class="trigger-all-items" data-toggle="modal" data-target="#give-item-selection">
                        <i data-feather="gift" class="icon"></i>
                    </div>
                </div>
                <div class="trigger-all-items-mobile" data-toggle="modal" data-target="#give-item-selection">
                    <i data-feather="gift" class="icon"></i> Dukung dengan gifts
                </div>

                <!------------------------------------
                BINGOS
                -------------------------------------->
                <div class="bingo-section">
                    <div class="bingo-title bg-00-06">
                        Benar / Salah
                    </div>
                    <table class="bingo-table bg-00-02">
                        <thead>
                            <tr class="bg-00-02">
                                <th>Aura</th>
                                <th>ONIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="bingo-item js-event-detail-0001" data-id="1-1" data-bonus="30">30%</td>
                                <td class="bingo-item js-event-detail-0001" data-id="1-2" data-bonus="30">30%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bingo-section">
                    <div class="bingo-title bg-00-06">
                        Lord Kills
                    </div>
                    <table class="bingo-table bg-00-02">
                        <thead>
                            <tr class="bg-00-02">
                                <th>Total</th>
                                <th>Diatas</th>
                                <th>Dibawah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0.5</td>
                                <td class="bingo-item js-event-detail-0001" data-id="2-1" data-bonus="20">20%</td>
                                <td class="bingo-item js-event-detail-0001" data-id="2-2" data-bonus="20">20%</td>
                            </tr>
                            <tr>
                                <td>2.5</td>
                                <td class="bingo-item js-event-detail-0001" data-id="3-1" data-bonus="30">30%</td>
                                <td class="bingo-item js-event-detail-0001" data-id="3-2" data-bonus="30">30%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bingo-section">
                    <div class="bingo-title bg-00-06">
                        Turtle Kills
                    </div>
                    <table class="bingo-table bg-00-02">
                        <thead>
                            <tr class="bg-00-02">
                                <th>Total</th>
                                <th>Diatas</th>
                                <th>Dibawah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0.5</td>
                                <td class="bingo-item js-event-detail-0001" data-id="4-1" data-bonus="20">20%</td>
                                <td class="bingo-item js-event-detail-0001" data-id="4-2" data-bonus="20">20%</td>
                            </tr>
                            <tr>
                                <td>2.5</td>
                                <td class="bingo-item js-event-detail-0001" data-id="5-1" data-bonus="50">50%</td>
                                <td class="bingo-item js-event-detail-0001" data-id="5-2" data-bonus="50">50%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bingo-section">
                    <div class="bingo-title bg-00-06">
                        Locked Market Example
                    </div>
                    <table class="bingo-table bg-00-02">
                        <thead>
                            <tr class="bg-00-02">
                                <th>Total</th>
                                <th>Diatas</th>
                                <th>Dibawah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0.5</td>
                                <td class="locked-market"><i data-feather="lock" class="icon"></i></td>
                                <td class="locked-market"><i data-feather="lock" class="icon"></i></td>
                            </tr>
                            <tr>
                                <td>2.5</td>
                                <td class="locked-market"><i data-feather="lock" class="icon"></i></td>
                                <td class="locked-market"><i data-feather="lock" class="icon"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!------------------------------------
            --------------------------------------
            RIGHT SECTION
            --------------------------------------
            -------------------------------------->
            <div class="area event-live-right js-event-detail-0004">
                <div class="fixed-box">
                    <div class="event-right-tabs">
                        <div class="event-right-tab-item js-event-detail-0005 tab-chat active" data-target="livechat">
                            Livechat
                        </div>
                        <div class="event-right-tab-item js-event-detail-0005 tab-slip" data-target="slip">
                            Slip Pertandingan
                        </div>
                    </div>
                    <div class="event-right-content">

                        <!------------------------------------
                        LIVE CHAT
                        -------------------------------------->
                        <div class="event-right-content-panel bg-00-03 livechat active">
                            <div class="event-chat-container js-resize-01">
                                <div class="event-chat-bubble sys">
                                    <span class="auth">[System Message]</span> <span class="body">Timkamu officially promotes green livestreams and conducts 24-hour online inspections of live content. Any misconduct that violates the law, violations, vulgarity, violence, etc. will be suspended. Do not transfer money in private for fear of being cheated.</span>
                                </div>
                                <?php for ($i=0; $i < 35; $i++): ?>
                                    <div class="event-chat-bubble">
                                        <span class="auth">Test User 1:</span> 
                                        <span class="body">test</span>
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <div class="event-chat-controls">
                                <input type="text" class="event-chat-input" placeholder="Type something nice..." >
                                <div class="event-chat-enter">
                                    Kirim
                                </div>
                            </div>
                        </div>

                        <!------------------------------------
                        BINGO SLIPS
                        -------------------------------------->
                        <div class="event-right-content-panel bg-00-03 slip">
                            <div class="event-slip-item-container js-event-detail-0003">
                                <!-- to be filled with slip template via js -->
                            </div>
                            <div class="event-slip-preview bg-00-06">
                                <div class="event-slip-preview-item">
                                    <div class="event-slip-preview-item-title">
                                        Total dukungan
                                    </div>
                                    <div class="event-slip-preview-item-amount bet-slip-subtotal">
                                        <span>0</span> <img src="<?php echo asset('img/currencies/bp.svg'); ?>" class="icon">
                                    </div>
                                </div>
                                <div class="event-slip-preview-item">
                                    <div class="event-slip-preview-item-title">
                                        Total potensi hasil
                                    </div>
                                    <div class="event-slip-preview-item-amount bet-slip-total">
                                        <span>0</span> <img src="<?php echo asset('img/currencies/bp.svg'); ?>" class="icon">
                                    </div>
                                </div>
                            </div>
                            <div class="event-slip-cta">
                                Berikan Dukungan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style type="text/css">
    .mb-panel-triggers {
        display: none;
        position: fixed;
        bottom: 0;
        left: 0;
        font-family:'Nunito Sans';
        font-size: 12px;
        width: 100%;
        height: 60px;
        line-height: 60px;
    }
    .mb-triggers-tab {
        text-align: center;
        flex: 1 1 50%;
        background: #444162;
    }
    .mb-triggers-tab.active {
        background: #633F6B;
    }
    .mb-triggers-tab + div {
        border-left: 1px solid rgba(255,255,255,0.1);
    }
    .mb-triggers-tab .new {
        width: 12px;
        height: 12px;
        background: #e91e63;
        border-radius: 50px;
        position: absolute;
        top: -5px;
        right: -6px;
        display: none;
    }
    .mb-triggers-tab.new .new {
        display: block;
    }
</style>

<div class="mb-panel-triggers">
    <div class="mb-triggers-tab livechat" data-target="livechat">
        <span class="posrel">
            Livechat&nbsp;<i data-feather="message-square" class="c14 right"></i>
            <div class="new"></div>
        </span>
    </div>
    <div class="mb-triggers-tab slips" data-target="slips">
        <span class="posrel">
            Slip Pertandingan&nbsp;<i data-feather="clipboard" class="c14 right"></i>
            <div class="new"></div>
        </span>
    </div>
</div>

<style type="text/css">
    .mb-right-panel {
        position: fixed;
        width: 100%;
        background: #22203a;
        bottom: 60px;
        transform: translate(0,1000px);
        transition: all 0.1s ease-in-out;
    }
    .mb-right-panel .mb-event-close {
        padding: 16px 25px;
        background: #f50e52;
        color: rgba(255,255,255,0.8);
        display: block;
        position: relative;
        border-bottom: 1px solid rgba(0,0,0,0.2);
    }
    .mb-right-panel .mb-event-close .icon {
        width: 16px;
        position: relative;
        top: -2px;
        margin-right: 12px;
    }
    .mb-right-panel.active {
        transform: translate(0,0);
    }
    .mb-event-overlay {
        position: fixed;
        background: rgba(0,0,0,0.8);
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        display: none;
    }
    .mb-event-overlay.active {
        display: block;
    }
    .mb-right-panel.livechat .event-chat-bubble {
        padding: 6px 25px;
    }
    .mb-event-chat-container {
        padding: 20px 0;
        max-height: 450px;
        overflow-y: auto;
    }
    .mb-event-slip-container {
        max-height: 320px;
        overflow-y: auto;
    }
    .mb-event-slip-container .event-slip-item {
        line-height: initial;
    }
    .mb-slip-placeholder {
        padding: 25px;
        display: none;
    }
    .mb-slip-placeholder.active {
        display: block;
    }
    .mb-event-slip-preview {
        padding: 25px;
        background: #0d0a2f;
    }
    .mb-nominal-input {
        width: 100%;
        padding: 10px;
        border: 0px;
    }
    .mb-nominal-selections {
        display: flex;
        flex-wrap: wrap;
    }
    .mb-nominal-selections .slip-selection-item {
        flex: 1 1 25%;
    }
    .slip-purchase-icon {
        display: none;
        position: absolute;
        right: 25px;
        top: 50%;
        transform: translate(0px, -50%);
    }
    .event-slip-item.purchased .slip-purchase-icon {
        display: block;
    }
</style>

<div class="mb-event-overlay"></div>
<div class="mb-right-panel livechat">
    <div class="mb-event-close"><i data-feather="x" class="icon"></i>Close</div>
    <div class="mb-event-chat-container">
        <div class="event-chat-bubble sys">
            <span class="auth">[System Message]</span> <span class="body">Timkamu officially promotes green livestreams and conducts 24-hour online inspections of live content. Any misconduct that violates the law, violations, vulgarity, violence, etc. will be suspended. Do not transfer money in private for fear of being cheated.</span>
        </div>
        <?php for ($i=0; $i < 35; $i++): ?>
            <div class="event-chat-bubble">
                <span class="auth">Test User 1:</span> 
                <span class="body">test</span>
            </div>
        <?php endfor; ?>
    </div>
    <div class="mb-event-chat-enter">
        <input type="text" class="mb-chat-input event-chat-input" placeholder="Type something nice..." >
        <div class="mb-chat-enter event-chat-enter">
            <i data-feather="send" class="icon"></i>
        </div>
    </div>
</div>


<div class="mb-right-panel slips">
    <div class="mb-event-close"><i data-feather="x" class="icon"></i>Close</div>
    <div class="mb-event-slip-container">
        <!-- slip items from template goes here -->
        <div class="mb-slip-placeholder active">
            Tidak ada slip pertandingan
        </div>
    </div>
    <div class="mb-event-slip-preview">
        <div class="event-slip-preview-item">
            <div class="event-slip-preview-item-title">
                Total dukungan
            </div>
            <div class="event-slip-preview-item-amount bet-slip-subtotal">
                <span>0</span> <img src="<?php echo asset('img/currencies/bp.svg'); ?>" class="icon">
            </div>
        </div>
        <div class="event-slip-preview-item">
            <div class="event-slip-preview-item-title">
                Total potensi hasil
            </div>
            <div class="event-slip-preview-item-amount bet-slip-total">
                <span>0</span> <img src="<?php echo asset('img/currencies/bp.svg'); ?>" class="icon">
            </div>
        </div>
    </div>
    <div class="event-slip-cta">
        Berikan Dukungan
    </div>
</div>

<div class="js-templates--events-slip-item">
    <div class="event-slip-item unconfirmed" data-bonus="30">
        <div class="event-slip-item-title">
            ONIC vs AE <br><span>18 August, 18.30</span>
            <i data-feather="x" class="icon js-remove-slip-item"></i>
            <div class="slip-purchase-icon">PURCHASED</div>
        </div>
        <div class="event-slip-item-body">
            <div class="item event-slip-item-bonus">
                <span>30</span>%
            </div>
            <div class="item event-slip-item-type">
                ONIC <span>Winner</span>
            </div>
            <div class="item event-slip-item-cta">
                Jumlah BP <i data-feather="chevron-down" class="more-icon"></i>
            </div>
        </div>
    </div>
</div>

<div class="js-templates--nominal-value">
    <img src="<?php echo asset('img/currencies/bp.svg'); ?>" class="icon"> <span class="slip-item-bp-amount" data-value="0">0</span>
</div>

<!----------------
------------------
------------------
modals 
------------------
------------------
----------------->

<div id="min-dukungan-amount" class="modal metro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h3 class="colored">Dukungan Tim</h3>
            <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
            <div class="modal-body posrel">
                <div class="message">
                    <p>Jumlah dukungan minimum adalah 1<img src="<?php echo asset('img/currencies/bp.svg'); ?>" class="c14 right"></p>
                </div>
            </div>
            <div class="nwcls">
                <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#nominal-choice">Okay</a>
            </div>
        </div>
    </div>
</div>

<div id="max-dukungan-amount" class="modal metro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h3 class="colored">Dukungan Tim</h3>
            <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
            <div class="modal-body posrel">
                <div class="message">
                    <p>Jumlah dukungan maksimum adalah 2000<img src="<?php echo asset('img/currencies/bp.svg'); ?>" class="c14 right"></p>
                </div>
            </div>
            <div class="nwcls">
                <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#nominal-choice">Okay</a>
            </div>
        </div>
    </div>
</div>

<div id="error-empty-slip" class="modal metro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h3 class="colored">Dukungan Tim</h3>
            <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
            <div class="modal-body posrel">
                <div class="message">
                    <p>Kamu belum memiliki slip dukungan pertandingan.</p>
                </div>
            </div>
            <div class="nwcls">
                <a href="#" data-dismiss="modal">Okay</a>
            </div>
        </div>
    </div>
</div>

<div id="error-empty-bp-amt" class="modal metro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h3 class="colored">Dukungan Tim</h3>
            <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
            <div class="modal-body posrel">
                <div class="message">
                    <p>Kamu belum mengisi semua nominal dukungan BP.</p>
                </div>
            </div>
            <div class="nwcls">
                <a href="#" data-dismiss="modal">Okay</a>
            </div>
        </div>
    </div>
</div>

<div id="nominal-choice" class="modal metro nominal-choice-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body posrel">
                <input type="number" name="" placeholder="masukkan jumlah BP" value="10" class="nominal-input">
                <div class="nominal-selections">
                    <?php foreach ($nominals as $key => $value): ?>
                     <div class="slip-selection-item" data-value="<?php echo $value; ?>"><?php echo number_format($value); ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="nwcls">
                <a href="#" data-dismiss="modal">Cancel</a>
                <a href="#" data-dismiss="modal" class="ctagp nominal-submit">Dukung</a>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .mb-right-panel .event-slip-cta {
        padding: 16px 25px;
        background: #201b54;
    }
    .mb-right-panel .event-slip-cta:hover,
    .mb-right-panel .event-slip-cta:focus,
    .mb-right-panel .event-slip-cta:active {
        background: #201b54;
    }
    .mb-slip-container {
        display: none;
    }
    .trigger-all-items-mobile {
        display: none;
        background: #e91e63;
        text-align: center;
        color: rgba(255,255,255,0.7);
        height: 50px;
        line-height: 50px;
    }
    .trigger-all-items-mobile .icon {
        width: 14px;
        position: relative;
        top: -2px;
        opacity: 0.8;
        margin-right: 5px;
    }
    .score-event-start {
        font-size: 10px;
        background: #9c27b0;
        padding: 2px 5px;
        border-radius: 3px;
        text-transform: uppercase;
        font-weight: 800;
        margin-bottom: 10px;
    }
    .score-event-countdown {
        text-transform: uppercase;
        font-size: 16px;
        margin-bottom: 10px;
        font-weight: 800;
    }
    .score-event-countdown span {
        font-size: 10px;
        font-weight: 100;
        text-transform: none;
    }
    .live-icon {
        font-size: 9px;
        background: #e91e63;
        padding: 2px 5px;
        border-radius: 3px;
        text-transform: uppercase;
    }
    .live-icon.finished {
        background: rgba(0,0,0,0.4);
    }
    .live-timer {
        font-size: 10px;
        opacity: 0.5;
        margin-top: 5px;
    }
    .live-stream-scores {
        display: flex;
        flex-direction: column;
    }
    .live-stream-scores .sides {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        position: relative;
    }
    .score-team-icon {
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }
    .score-team-name {
        font-family:'Rajdhani-Bold';
        text-transform: uppercase;
        font-size: 16px;
    }
    .sides.stream-score-mid {
        display: flex;
        flex-direction: column;
    }
    .score-side {
        font-family:'Rajdhani-Bold';
        text-transform: uppercase;
        font-size: 34px;
        position: relative;
    }
    .score-side-a {
        margin-bottom: 30px;
    }
    .score-side-b {
        margin-top: 30px;
    }
    .stream-score-top {
        margin-bottom: 20px;
    }
    .stream-score-bottom {
        margin-top: 20px;
    }
    .stream-score-top:before,
    .stream-score-top:after {
        content: " ";
        width: 50%;
        border-bottom: 1px solid rgba(255,255,255,0.2);
        position: absolute;
        bottom: 10px;
    }
    .stream-score-top:before {
        left: 0;
        transform: skew(0, 10deg);
    }
    .stream-score-top:after {
        right: 0;
        transform: skew(0, -10deg);
    }
    .stream-score-bottom:before,
    .stream-score-bottom:after {
        content: " ";
        width: 50%;
        border-top: 1px solid rgba(255,255,255,0.2);
        position: absolute;
        top: 10px;
    }
    .stream-score-bottom:before {
        left: 0;
        transform: skew(0, -10deg);
    }
    .stream-score-bottom:after {
        right: 0;
        transform: skew(0, 10deg);
    }
    .score-side-mid {
        display: flex;
        flex-direction: column;
    }
    .event-slip-item.purchased .js-remove-slip-item {
        display: none;
    }
    .nominal-selections {
        display: flex;
        flex-wrap: wrap;
    }
    .slip-selection-item {
        flex: 1 1 25%;
        padding: 10px;
        cursor: pointer;
        text-align: center;
        border: 1px solid rgba(255,255,255,0.1);
        background: rgba(0,0,0,0.8);
    }
    .slip-selection-item:hover {
        background: #9C27B0;
    }
    .nominal-commit-value {
        display: none;
    }
    .nominal-commit-value.chosen {
        display: block;
    }
    .js-templates--events-slip-item .event-slip-item,
    .js-templates--nominal-value {
        display: none;
    }
    .event-chat-container {
        padding: 15px 25px;
        overflow-y: auto;
    }
    /* width */
    .event-chat-container::-webkit-scrollbar {
      width: 10px;
    }
    /* Track */
    .event-chat-container::-webkit-scrollbar-track {
      background: #00000033;
    }
    /* Handle */
    .event-chat-container::-webkit-scrollbar-thumb {
      background: #00000099;
    }
    /* Handle on hover */
    .event-chat-container::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
    .event-chat-bubble {
        color: #ffffffee;
        display: block;
        width: 100%;
        line-height: initial;
        padding: 2px 0;
    }
    .event-chat-bubble .auth {
        color: #ff5722;
    }
    .event-chat-bubble.sys .auth {
        color: #00bcd4;
    }
    .event-chat-bubble.sys .body {
        opacity: 0.5;
    }
    .event-chat-input {
        height: 50px;
        line-height: 50px;
        flex: 1;
        border: 0px;
        background: rgba(0,0,0,0.1);
        padding: 0 25px;
        color: rgba(255,255,255,0.5);
    }
    .event-chat-enter {
        background: #2196f3;
        height: 50px;
        line-height: 50px;
        flex: 0 0 90px;
        text-align: center;
    }
    .event-chat-controls {
        background: rgba(0,0,0,0.6);
        display: flex;
    }
    .event-right-content-panel.livechat.active {
        display: flex;
        flex-direction: column;
    }
    .nominal-cancel {
        background: rgba(0,0,0,0.8);
        padding: 15px;
        cursor: pointer;
    }
    .nominal-submit {
        background: rgba(255,0,87,1);
        padding: 15px;
        cursor: pointer;
    }
    .nominal-input-control {
        display: flex;
    }
    .nominal-input-control > div {
        flex: 1 1 50%;
        padding: 5px;
        text-align: center;
        background: rgba(0,0,0,0.8);
        cursor: pointer;
    }
    .nominal-input-control > div:hover {
        background: #9C27B0;
    }
    .nominal-input-control > div + div {
        border-left: 1px solid rgba(255,255,255,0.1);
    }
    .nominal-input-control > div .icon {
        width: 20px;
        opacity: 0.7;
    }
    .nominal-input-control > div:hover .icon {
        opacity: 1;
    }
    .nominal-input {
        width: 100%;
        border: 0;
        padding: 10px;
    }
    .cta-nominal-choice {
        display: none;
        position: absolute;
        width: 100%;
        top: 100%;
    }
    .nominal-choice-item {
        text-align: left;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .nominal-choice-item + div {
        border-top: 1px solid rgba(255,255,255,0.1);
    }
    .cta-nominal-choice.active {
        display: block;
    }
    .event-slip-item-cta-nominal {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }
    .event-slip-item-cta-nominal.active,
    .event-slip-item-cta-nominal:hover {
        background: rgba(0,0,0,0.4);
    }
    .event-slip-item-cta-nominal.chosen {
        display: none;
    }
    .locked-market {
        cursor: not-allowed;
    }
    .locked-market .icon {
        height: 12px;
        opacity: 0.5;
    }
    .event-slip-cta {
        padding: 20px;
        background: #E91E63;
        text-align: center;
        font-weight: 800;
        cursor: pointer;
        opacity: 0.5;
    }
    .event-slip-cta.active {
        opacity: 1;
    }
    .event-slip-preview-item {
        display: flex;
    }
    .event-slip-preview-item-title,
    .event-slip-preview-item-amount {
        flex: 1 1 50%;
    }
    .event-slip-preview-item-amount {
        text-align: right;
    }
    .event-slip-preview-item .icon {
        width: 14px;
        position: relative;
        top: -1px; 
        margin-left: 3px;
    }
    .event-slip-item-container {
        min-height: 300px;
        overflow-y: auto;
    }
    .event-slip-preview {
        padding: 25px 15px;
    }
    .event-slip-item-type {
        background: rgba(255,255,255,0.2);
        flex-flow: column;
    }
    .event-slip-item-type span {
        opacity: 0.5;
    }
    .event-slip-item-cta {
        background: rgba(0,0,0,0.2);
        cursor: pointer;
        position: relative;
        padding: 0 !important;
    }
    .event-slip-item-cta:hover {
        background: rgba(0,0,0,0.4);
    }
    .event-slip-item-cta .icon {
        width: 9px;
        position: relative;
        top: -1px;
        margin-right: 3px;
    }
    .event-slip-item-cta .more-icon {
        width: 14px;
        opacity: 0.5;
        stroke-width: 3px;
        margin-left: 1px;
        position: relative;
        top: -1px;
        transition: all 0.1s ease-in-out;
    }
    .js-event-detail-0002.active .more-icon {
        transform: rotate(180deg);
    }
    .event-slip-item-body {
        display: flex;
        text-align: center;
        position: relative;
    }
    .event-slip-item-body .item {
        flex: 1;
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .event-slip-item-body .event-slip-item-bonus {
        background: #1f61b2;
        font-weight: 800;
        flex: 0 0 25%;
    }
    .event-slip-item {
        font-size: 10px;
    }
    .event-slip-item-title {
        padding: 10px;
        background: rgba(255,255,255,0.3);
        position: relative;
    }
    .event-slip-item-title span {
        opacity: 0.5;
    }
    .event-slip-item-title .icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translate(0,-50%);
        opacity: 0.5;
        cursor: pointer;
    }
    .event-slip-item-title .icon:hover {
        opacity: 1;
    }
    .bingo-item {
        cursor: pointer;
    }
    /*.bingo-item:hover {
        background: rgba(0,0,0,0.4);
    }*/
    .bingo-item.active {
        background: #2196f3;
    }
    .bingo-section {
        margin-top: 25px;
    }
    .bingo-title {
        padding: 15px;
        text-align: center;
    }
    .bingo-table {
        width: 100%;
    }
    .bingo-table td,
    .bingo-table th {
        padding: 10px 15px;
        text-align: center;
    }
    .bingo-table td + td,
    .bingo-table th + th {
        border-left: 1px solid rgba(255,255,255,0.1);
    }
    .bingo-table tr + tr {
        border-top: 1px solid rgba(255,255,255,0.1);
    }
    .event-right-content-panel {
        display: none;
    }
    .event-right-content-panel.active {
        display: block;
    }
    .stream-meta-bottom .trigger-all-items {
        position: absolute;
        right: 0;
        top: 0;
        background: rgba(255,0,87,0.8);
        display: flex;
        align-items: center;
        width: 60px;
        height: 100%;
        justify-content: center;
        cursor: pointer;
    }
    .stream-meta-bottom .trigger-all-items .icon {
        width: 20px;
        opacity: 0.9;
        margin: 0;
    }
    .stream-meta-bottom .trigger-all-items:hover {
        background: rgba(255,0,87,1);
    }
    .stream-meta-bottom .trigger-all-items:hover .icon {
        opacity: 1;
    }
    .stream-meta-bottom .trigger-all-items .icon {
        max-width: 100px;
        text-align: center;
        max-height: 100px;
    }
    .stream-meta-bottom-ranks {
        background: #03a9f4;
        border: 1px solid #03a9f4;
        color: #fff;
        padding: 2px 10px;
        border-radius: 50px;
    }
    .stream-meta-bottom-recharge {
        background: #ff9800;
        border: 1px solid #ff9800;
        color: #fff;
        padding: 2px 10px;
        border-radius: 50px;
    }
    .stream-meta-bottom-ranks:hover,
    .stream-meta-bottom-recharge:hover {
        color: #fff;
    }
    .stream-meta-bottom {
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }
    .stream-meta-bottom .item + .item {
        margin-left: 25px;
    }
    .stream-meta-bottom .curr + .curr {
        margin-left: 10px;
    }
    .stream-meta-bottom .icon,
    .stream-meta-bottom-title .icon {
        width: 14px;
        position: relative;
        top: -1px; 
        margin-right: 3px;
    }
    .event-right-tabs {
        display: flex;
    }
    .event-right-tab-item {
        flex: 0 0 50%;
        text-align: center;
        cursor: pointer;
        height: 50px;
        padding: 0 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(0,0,0,0.2);
        font-weight: 800;
    }
    .event-right-tab-item.active {
        background: rgba(0,0,0,0.6);
    }
    .event-game-title span {
        opacity: 0.5;
        margin-left: 10px;
    }
    .stream-meta-back-icon {
        height: 20px;
        opacity: 0.5;
        margin-right: 15px;
        color: #ffffff;
    }
    .stream-meta-back-link:hover .stream-meta-back-icon {
        opacity: 1;
    }
    .stream-meta-head {
        display: flex;
        align-items: center;
        padding: 0 15px;
        font-weight: 800;
        height: 50px;
    }
    .event-game-icon {
        width: 30px;
        margin-right: 10px;
    }
    .stream-main-window {
        display: flex;
    }
    .live-stream-feed {
        flex: 1;
        background: rgba(0,0,0,1);
    }
    .live-stream-scores {
        flex: 0 0 300px;
    }
    .img-temp {
        width: 100%;
    }
    .live-wrapper {
        display: flex;
        font-family:'Nunito Sans';
        font-size: 12px;
        line-height: initial;
    }
    .live-wrapper .area {
        margin: 0 5px;
        position: relative;
    }
    .event-live-left {
        flex: 1;
    }
    .event-live-right {
        flex: 0 0 330px;
    }
    .event-live-right.scrolled .fixed-box {
        position: fixed;
        width: 330px;
        right: 20px;
        top: 20px;
    }
    .mb-event-chat-enter {
        display: flex;
    }
    .mb-event-chat-enter .mb-chat-input {
        flex: 1;
        background: rgb(0 0 0 / 40%);
    }
    .mb-event-chat-enter .mb-chat-enter {
        flex: 0 0 70px;
    }
</style>
<style type="text/css">
    @media (max-width: 992px) {
        html body .event-live-right {
            display: none;
        }
        .mb-panel-triggers {
            display: flex;
        }
    }
    @media (max-width: 576px) {
        .live-stream-scores {
            display: none;
        }
        .stream-meta-bottom .trigger-all-items {
            display: none;
        }
        .trigger-all-items-mobile {
            display: block;
        }
    }
    @media (max-width: 470px) {
        .stream-meta-bottom-recharge {
            display: none;
        }
        .stream-meta-bottom-ranks {
            display: none;
        }
    }
</style>

<style type="text/css">
    body.bg1 {
        background-image: url("{{ asset('img/f1a.jpg') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    .root {
        padding-top: 100px;
        padding-bottom: 300px;
    }
</style>

@endsection

@section('js')

<!-- scrollmagic -->
<script src="{{ asset('vendors/scrollmagic/TweenMax.min.js') }}"></script>
<script src="{{ asset('vendors/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('vendors/scrollmagic/animation.gsap.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('.js-event-detail-0005').on('click', function(e) {
            e.preventDefault();
            var tgt = $(this).attr('data-target');

            $('.event-right-tab-item, .event-right-content-panel').removeClass('active');
            $('.event-right-content-panel.'+tgt).addClass('active');
            $(this).addClass('active');
        });

        // -----------------------
        // -----------------------
        // -----------------------
        // main BINGO cell click
        // -----------------------
        // -----------------------
        // -----------------------
        $('body').on('click', '.js-event-detail-0001', function(e) {
            e.preventDefault();
            var thisId = $(this).attr('data-id');
            var thisBonus = $(this).attr('data-bonus');

            // modify the template data-id
            // and then copy the template
            $('.js-templates--events-slip-item .event-slip-item').attr('data-id',thisId);
            $('.js-templates--events-slip-item .event-slip-item').attr('data-bonus',thisBonus);
            $('.js-templates--events-slip-item .event-slip-item .event-slip-item-bonus span').html(thisBonus);
            var tmplate = $('.js-templates--events-slip-item').html();

            // open slip tab panel
            $('.event-right-tab-item, .event-right-content-panel').removeClass('active');
            $('.event-right-content-panel.slip, .tab-slip').addClass('active');

            // show/hide clicked effect
            if ($(this).hasClass('active')){

                // remove from mobile and desktop
                removeBingoItemFromContainers(thisId);

            } else {

                $(this).addClass('active');

                // paste to desktop and mobile
                $('.event-slip-item-container').append(tmplate);
                $('.mb-event-slip-container').append(tmplate);
            }

            // calculate slip subtotal & total
            calculateSlipTotalCost();
            calculateSlipTotal();

            // mobile tab alert
            showTabNewContentAlert();
        });

        // close button on slip item
        $('body').on('click', '.unconfirmed .js-remove-slip-item', function(e) {
            e.preventDefault();
            var thisId = $(this).parents('.event-slip-item').attr('data-id');

            removeBingoItemFromContainers(thisId);

            // calculate slip subtotal & total
            calculateSlipTotalCost();
            calculateSlipTotal();

            // mobile tab alert
            showTabNewContentAlert();
        });

        // choose BP amount
        $('body').on('click', '.unconfirmed .event-slip-item-cta', function(e) {
            e.preventDefault();

            var dataId = $(this).parents('.event-slip-item').attr('data-id');

            $('#nominal-choice').modal('show').find('.nominal-input').attr('data-id',dataId);
        });

        // commit BP amount
        $('body').on('click', '.nominal-submit', function(e) {
            e.preventDefault();

            // get the bet val
            var betVal = $('.nominal-input').val();
            var dataId = $('.nominal-input').attr('data-id');

            // modify the template value first
            $('.js-templates--nominal-value').find('.slip-item-bp-amount').attr('data-value',betVal).html(betVal);

            // copy and paste it to the destination doms
            var tmplate = $('.js-templates--nominal-value').html();
            $('.event-slip-item-container .event-slip-item[data-id="'+dataId+'"] .event-slip-item-cta').html('').append(tmplate); // desktop
            $('.mb-event-slip-container .event-slip-item[data-id="'+dataId+'"] .event-slip-item-cta').html('').append(tmplate); // mobile

            // calculate slip subtotal & total
            calculateSlipTotalCost();
            calculateSlipTotal();

        });

        // enter = submit
        $('body').on('keypress', '.nominal-input', function(e) {
            if(e.which == 13){
                $('.nominal-submit').click();
            }
        });

        // nominal input keyup
        $('body').on('keyup', '.nominal-input', function(e) {
            e.preventDefault();

            var curVal = $(this).val();

            if(+curVal > 2000){
                var curVal = 2000;
                $('#max-dukungan-amount').modal('show');
                $('#nominal-choice').modal('hide');
            }

            $(this).val(curVal);
        });

        // nominal selections
        $('body').on('click', '.nominal-selections .slip-selection-item', function(e) {
            e.preventDefault();
            var thisVal = $(this).attr('data-value');
            $('.nominal-input').val(thisVal).focus();
        });

        // final checkout button
        $('body').on('click', '.event-slip-cta.active', function(e) {
            e.preventDefault();

            var slips = 0;
            var incompleteBpAmt = 0;
            var bpBalance = 0;
            var totalBpCost = calculateSlipTotalCost();

            // if at least one slip item is present, change var slip to 1
            $('.event-slip-item-container .event-slip-item').each(function(){
                slips = 1;
                var bpAmtDiv = $(this).find('.slip-item-bp-amount');
                if (bpAmtDiv.length == 0){
                    incompleteBpAmt = incompleteBpAmt + 1;
                }
            });

            if (slips == 0){
                $('#error-empty-slip').modal('show');
                return;
            }

            if (incompleteBpAmt > 0){
                $('#error-empty-bp-amt').modal('show');
                return;
            }

            $('#spinner').modal('show');

            setTimeout(function() {
                $('.event-slip-item-container .event-slip-item, .mb-event-slip-container .event-slip-item').each(function(){

                    // do db work here
                    // ....

                    $(this).removeClass('unconfirmed').addClass('purchased');

                    // remove all data-id from all .event-slip-item, so people can buy multiple of the same item
                    $('.event-slip-item').removeAttr('data-id');

                    // remove all bingo items, so people can buy multiple of the same item
                    $('.bingo-item').removeClass('active');

                    $('#spinner').modal('hide');
                });
            }, 500);

            
        });

        // mobile bottom nav for slips and livechat
        $('body').on('click', '.mb-triggers-tab', function(e) {
            e.preventDefault();

            var target = $(this).attr('data-target');

            if ($(this).hasClass('active')){
                $('.mb-triggers-tab, .mb-event-overlay, .mb-right-panel').removeClass('active');
            } else {
                $('.mb-triggers-tab, .mb-event-overlay, .mb-right-panel').removeClass('active');
                $(this).addClass('active');
                $('.mb-event-overlay, .mb-right-panel.'+target).addClass('active');
            }
            
            // close main nav
            $('.tray--close').click();
        });

        // mobile bottom nav close
        $('body').on('click', '.mb-right-panel .mb-event-close', function(e) {
            e.preventDefault();
            $('.mb-triggers-tab, .mb-event-overlay, .mb-right-panel').removeClass('active');
        });

        // final calculations
        function calculateSlipTotalCost(){

            var bpCost = 0;
            var allBpCostSet = 1;

            $('.event-slip-item-container .event-slip-item').each(function(){
                var bpCostContainer = $(this).find('.slip-item-bp-amount');
                if (bpCostContainer.length != 0){
                   var eachVal = bpCostContainer.attr('data-value');
                   bpCost = +bpCost + +eachVal; 
                } else {
                    // if at least one doesnt have value, deactivate the checkout button
                    allBpCostSet = 0;
                }
            });

            var totalBpCostNumberFormat = Intl.NumberFormat().format(bpCost);
            $('.bet-slip-subtotal span').html(totalBpCostNumberFormat);

            // if no event-slip-item detected, deactivate the checkout button
            if ($('.event-slip-item-container .event-slip-item').length == 0){
                allBpCostSet = 0;
            };
            
            // turn on checkout button
            if (allBpCostSet == 1) {
                $('.event-slip-cta').addClass('active');
            } else {
                $('.event-slip-cta').removeClass('active');
            }

            return bpCost;
        }
        function calculateSlipTotal(){
            var total = 0;
            $('.event-slip-item-container .event-slip-item').each(function(){
                //check if div exist
                var dataDiv = $(this).find('.slip-item-bp-amount');
                if (dataDiv.length != 0){
                    var bonus = $(this).attr('data-bonus');
                    var bpAmt = dataDiv.attr('data-value');
                    var amtPlusBonus = (+bonus * +bpAmt / 100);
                    total = +total + +bpAmt + +amtPlusBonus;
                    total = Math.floor(total);
                }
            });
            var totalNumberFormat = Intl.NumberFormat().format(total);
            $('.bet-slip-total span').html(totalNumberFormat);
            return total;
        }

        // set max height for slip container to match viewport height
        fixSlipContainerHeight();
        function fixSlipContainerHeight(){
            const windowVh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);
            const slipContainerHeight = windowVh - 380;
            const chatContainerHeight = windowVh - 300;
            $('.js-event-detail-0003').css('height', slipContainerHeight);
            $('.js-resize-01').css('height', chatContainerHeight);
        }

        // chat area fix when scrolled
        fixChatArea();
        function fixChatArea(){
            var controller = new ScrollMagic.Controller();
            new ScrollMagic.Scene({
                offset: 80
            })
                .setClassToggle(".js-event-detail-0004","scrolled")
                .addTo(controller);
        }

        // chat area fix when scrolled
        function showTabNewContentAlert(){
            var total = 0;
            $('.mb-event-slip-container .event-slip-item').each(function(){
                total = 1;
            });
            if (total != 0){
                $('.mb-triggers-tab.slips').addClass('new');
                $('.mb-slip-placeholder').removeClass('active');
                return;
            }
            $('.mb-triggers-tab.slips').removeClass('new');
            $('.mb-slip-placeholder').addClass('active');
        }

        // all purpose countdown
        generalCountdown("Aug 28, 2020 18:30:00");
        function generalCountdown(futureDate){
            // Set the date we're counting down to
            var countDownDate = new Date(futureDate).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

              // Get today's date and time
              var now = new Date().getTime();

              // Find the distance between now and the count down date
              var distance = countDownDate - now;

              // Time calculations for days, hours, minutes and seconds
              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
              var seconds = Math.floor((distance % (1000 * 60)) / 1000);

              // Display the result in the element with id="demo"
              document.getElementById("upcoming-countdown").innerHTML = days + " <span>days</span> " + hours + " <span>hrs</span> "
              + minutes + " <span>min</span> " + seconds + " <span>sec</span> ";

              // If the count down is finished, write some text
              if (distance < 0) {
                clearInterval(x);
                document.getElementById("upcoming-countdown").innerHTML = "This event has finished";
              }
            }, 1000);
        }

        // remove bingo from mobile and desktop
        function removeBingoItemFromContainers(itemId){
            // make bingo cell inactive
            $('.bingo-item[data-id="'+itemId+'"]').removeClass('active');
            // remove from containers
            $('.event-slip-item-container .event-slip-item[data-id="'+itemId+'"]').remove();
            $('.mb-event-slip-container .event-slip-item[data-id="'+itemId+'"]').remove();
        }

        // auto scroll to bottom of chat on page load
        $('.event-chat-container, .mb-event-chat-container').scrollTop(1000000);

        
    });
</script>
    
@endsection