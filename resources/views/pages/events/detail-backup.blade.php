@extends('layouts.app')

@section('body_class', "bg1")
@section('content')

@include('includes.menu')

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
                    <a href="{{ url('events') }}" class="stream-meta-back-link"><i data-feather="chevron-left" class="stream-meta-back-icon"></i></a>
                    <div class="event-game-title">
                        {{ $event->name }} <span>{{ $event->league_games->leagues->name }}</span>
                    </div>
                </div>
                <div class="stream-main-window bg-00-02">
                    <div class="live-stream-feed">
                        <img src="<?php echo asset('img/thumb.PNG'); ?>" class="img-temp">
                    </div>
                    <div class="live-stream-scores">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                </div>
                <div class="stream-meta-bottom bg-00-06">
                    <div class="item stream-meta-bottom-title">
                        <div id="data-user">@if(Auth::user() && Auth::user()->ranks->logo)<img src="{{ asset(Auth::user()->ranks->logo) }}" class="icon">&nbsp;&nbsp;@endif{{ Auth::user()->username ?? 'guest'}}</div>
                    </div>
                    <div class="item curr stream-meta-bottom-lp">
                        <img src="<?php echo asset('img/currencies/lp.svg'); ?>" class="icon"> <span id="total-lp">{{ number_format($total_lp, 0, '.', ',') }}</span>
                    </div>
                    <div class="item curr stream-meta-bottom-bp">
                        <img src="<?php echo asset('img/currencies/bp.svg'); ?>" class="icon"> <span id="total-bp">{{ number_format($total_bp, 0, '.', ',') }}</span>
                    </div>
                    <a href="{{ url('purchase/detail?name=lp') }}" target="_blank" class="item stream-meta-bottom-recharge">Recharge LP</a>
                    <a href="{{ url('ranks') }}" onclick="window.open(this.href, 'mywin','left=20,top=60,width=1200,height=600,toolbar=0,resizable=0'); return false;"  class="item stream-meta-bottom-ranks">Ranks</a>
                    <div class="trigger-all-items" data-toggle="modal" data-target="#give-item-selection">
                        <i data-feather="gift" class="icon"></i>
                    </div>
                </div>

                <!------------------------------------
                BINGOS
                -------------------------------------->
                
                <div id="bingo-rules">
                    @foreach ($event_bingo as $key => $value)
                        <div class="bingo-section">
                            <div class="bingo-title bg-00-06">
                                {{ $value['name'] }}
                            </div>
                            <table class="bingo-table bg-00-02">
                                @if($value['type'] === '1')
                                <thead>
                                    <tr class="bg-00-02">
                                        <th>{{ $event->team_left->name}}</th>
                                        <th>{{ $event->team_right->name}}</th>
                                    </tr>
                                </thead>
                                @elseif($value['type'] === '2')
                                <thead>
                                    <tr class="bg-00-02">
                                        <th>Total</th>
                                        <th>Diatas</th>
                                        <th>Dibawah</th>
                                    </tr>
                                </thead>
                                @endif
                                <tbody>
                                    @php
                                        $idx = 0;
                                    @endphp
                                    @foreach ($value['items'] as $item)
                                    <tr>
                                        @if($item->event_bet_categories->type === '1')

                                            @if(json_decode($item->value_detail)->team_left_locked === '1')
                                            <td class="locked-market"><i data-feather="lock" class="icon"></i></td>
                                            @else
                                            <td class="bingo-item js-event-detail-0001" data-value="{{ json_decode($item->value_detail)->team_left }}" data-idbingo="{{ $item->id }}" data-typebingo="team_left" data-title="{{ strtoupper($event->team_left->alias) }}" data-subtitle="Winner" data-id="{{ ($key+1).'-'.($idx+1)}}">{{ json_decode($item->value_detail)->team_left }}%</td>
                                            @endif

                                            @if(json_decode($item->value_detail)->team_right_locked === '1')
                                            <td class="locked-market"><i data-feather="lock" class="icon"></i></td>
                                            @else
                                            <td class="bingo-item js-event-detail-0001" data-value="{{ json_decode($item->value_detail)->team_right }}" data-idbingo="{{ $item->id }}" data-typebingo="team_right" data-title="{{ strtoupper($event->team_right->alias) }}" data-subtitle="Winner" data-id="{{ ($key+1).'-'.($idx+2)}}">{{ json_decode($item->value_detail)->team_right }}%</td>
                                            @endif
                                        @else
                                            <td>{{ json_decode($item->value_detail)->total }}</td>

                                            @if(json_decode($item->value_detail)->under_locked === '1')
                                            <td class="locked-market"><i data-feather="lock" class="icon"></i></td>
                                            @else
                                            <td class="bingo-item js-event-detail-0001" data-value="{{ json_decode($item->value_detail)->under }}" data-idbingo="{{ $item->id }}" data-typebingo="under" data-title="under {{ json_decode($item->value_detail)->total }}" data-subtitle="{{ $value['name'] }}" data-id="{{ ($key+1).'-'.($idx+1)}}">{{ json_decode($item->value_detail)->under }}%</td>
                                            @endif

                                            @if(json_decode($item->value_detail)->above_locked === '1')
                                            <td class="locked-market"><i data-feather="lock" class="icon"></i></td>
                                            @else
                                            <td class="bingo-item js-event-detail-0001" data-value="{{ json_decode($item->value_detail)->above }}" data-idbingo="{{ $item->id }}" data-typebingo="above" data-title="above {{ json_decode($item->value_detail)->total }}" data-subtitle="{{ $value['name'] }}" data-id="{{ ($key+1).'-'.($idx+2)}}">{{ json_decode($item->value_detail)->above }}%</td>
                                            @endif
                                        @endif
                                    </tr>
                                    @php
                                        $idx = $idx+2;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
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
                                <div id="data-chats">{!! $chats !!}</div>
                            </div>
                            <div class="event-chat-controls">
                                <input type="text" class="event-chat-input" placeholder="{{ $user ? 'Type something nice...' : 'You need to sign in' }}" {{ $user ?? 'disabled' }}>
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
                                    <div class="event-slip-preview-item-amount">
                                        <span id="total-nominal-bp">0</span> <img src="{{ asset('img/currencies/bp.svg') }}" class="icon">
                                    </div>
                                </div>
                                <div class="event-slip-preview-item">
                                    <div class="event-slip-preview-item-title">
                                        Total potensi hasil
                                    </div>
                                    <div class="event-slip-preview-item-amount">
                                        <span id="total-bonus-bp">0</span> <img src="{{ asset('img/currencies/bp.svg') }}" class="icon">
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user())
                            <div class="event-slip-cta" id="btn-dukungan">
                                Berikan dukungan
                            </div>
                            @else
                            <a href="{{ url('sign-in') }}">
                                <div class="event-slip-cta">
                                Sign In dan berikan dukungan
                                </div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br><br><br><br>
        <br><br><br><br><br>
        <br><br><br><br><br>
        <br><br><br><br><br>

        <br><br><br><br><br>
        <br><br><br><br><br>
        <br><br><br><br><br>
        <br><br><br><br><br>

    </div>
</div>

<div class="js-templates--events-slip-item">
    <div class="event-slip-item">
        <div class="event-slip-item-title">
            {{ $event->team_left->name }} vs {{ $event->team_right->name }} <br><span>{{ \Carbon\Carbon::parse($event->start_date)->format('d F, H:i') }}</span>
            <i data-feather="x" class="icon js-remove-slip-item"></i>
        </div>
        <div class="event-slip-item-body">
            <div class="item event-slip-item-bonus">
                <span class="value"></span>
            </div>
            <div class="item event-slip-item-type">
                <span class="title"></span> <span class="subtitle"></span>
            </div>
            <div class="item event-slip-item-cta">
                <!-- <img src="<?php echo asset('img/currencies/bp.svg'); ?>" class="icon"> 450 -->
                <span class="event-slip-item-cta-nominal js-event-detail-0002">NOMINAL <i data-feather="chevron-down" class="more-icon"></i></span>
                <div class="event-slip-item-cta-nominal-choice">
                   <div class="nominal-choice-item">
                       <input type="number" placeholder="enter BP amount..." class="event-slip-item-nominal-input">
                   </div> 
                   <div class="nominal-input-control">
                       <div class="nominal-input-add"><i data-feather="chevron-up" class="icon"></i></div>
                       <div class="nominal-input-substract"><i data-feather="chevron-down" class="icon"></i></div>
                   </div>
                   <div class="nominal-submit">
                       DUKUNG
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="give-item-selection" class="modal metro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h3 class="colored">Beri Dukungan Item</h3>
            <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
            <div class="modal-body posrel">
                <div class="item-selection-container">
                    @foreach ($items as $key => $item)
                        <div class="tci--item gifts" data-toggle="modal" data-target="{{ Auth::user() ? '#give-item-choose-team' : '#dukungan-require-sign-in' }}" data-dismiss="modal" data-item="{{ $item->child_id }}" data-itemName="{{ $item->childs->name }}" data-itemlogo="{{ asset($item->childs->logo) }}" data-itemcurrencies="{{ number_format($item->value, 0, '.', ',') }}">
                            <img src="{{ asset($item->childs->logo) }}" class="item-img" data-toggle="tooltip" data-placement="top" title="{{ $item->childs->name }}">
                            <div class="cost">
                                <img src="{{ asset('img/currencies/lp.svg') }}" class="curr">
                                {{ number_format($item->value, 0, '.', ',') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div id="give-item-choose-team" class="modal metro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h3 class="colored">Beri Dukungan Item</h3>
            <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
            <div class="modal-body posrel p-0">

                <div class="tci--item">
                    <img src="#" class="item-img item-img-selected" id="item-img-selected" data-toggle="tooltip" data-placement="top" title="Bola Kristal">
                    <div class="cost">
                        <img src="{{ asset('img/currencies/lp.svg') }}" class="curr">
                        <span id="item-currencies"></span>
                    </div>
                    <p>Berikan item ini kepada:</p>
                </div>

                <div class="team-choose-container">
                    <div class="team-choose-item btn-donate-item" data-toggle="modal" data-target="{{ Auth::user() ? '#give-item-confirm' : '#dukungan-require-sign-in' }}" data-dismiss="modal" data-team="{{ $event->team_left->id }}" data-teamname="{{ $event->team_left->name }}">
                        <img src="{{ asset($event->team_left->logo) }}" class="tci--tx">
                        <p class="tci--tp">{{ $event->team_left->name }}</p>
                    </div>
                    <div class="team-choose-item btn-donate-item" data-toggle="modal" data-target="{{ Auth::user() ? '#give-item-confirm' : '#dukungan-require-sign-in' }}" data-dismiss="modal" data-team="{{ $event->team_right->id }}" data-teamname="{{ $event->team_right->name }}">
                        <img src="{{ asset($event->team_right->logo) }}" class="tci--tx">
                        <p class="tci--tp">{{ $event->team_right->name }}</p>
                    </div>
                </div>
                <div class="nwcls">
                    <a href="#" data-toggle="modal" data-target="#give-item-selection" data-dismiss="modal">Daftar Item</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="give-item-confirm" class="modal metro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h3 class="colored">Dukungan Tim</h3>
            <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
            <div class="modal-body posrel text-center">
                <p>Are you sure you want to give this item to this team?</p>
            </div>
            <div class="nwcls">
                <a href="#" data-dismiss="modal">Batal</a>
                <a href="#" data-toggle="modal" data-target="#give-item-selection" data-dismiss="modal">Daftar Item</a>
                <a href="#" data-dismiss="modal" data-toggle="modal" class="ctagp" id="btn-confirm-donate">Confirm</a>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
    .team-choose-container {
        display: flex;
    }
    .team-choose-container .team-choose-item {
        flex: 0 0 50%;
        text-align: center;
        cursor: pointer;
        border-right: 1px solid rgba(255,255,255,0.1);
        text-align: center;
        padding: 10px 70px;
        font-family: 'Nunito Sans';
        font-weight: 800;
        font-size: 12px;
        border-top: 1px solid rgba(255,255,255,0.1);
    }
    .team-choose-container .team-choose-item:hover {
        background: rgba(0,0,0,0.2);
    }
    .team-choose-container .team-choose-item:last-child {
        border-right: 0px;
    }
    img.tci--tx {
        width: 100%;
    }
    .team-choose-container .team-choose-item p.tci--tp {
        text-align: center;
    }
    .tci--tp .icon {
        width: 14px;
        position: relative;
        top: -1px;
        margin-right: 7px;
        stroke-width: 3px;
        opacity: 0.5;
    }
    #give-item-choose-team .tci--item {
        padding: 30px 0 10px 0;
        font-family: 'Nunito Sans';
        font-weight: 800;
        font-size: 12px;
    }
    #give-item-choose-team .tci--item img.item-img {
        width: 60px;
        height: 60px;
    }
    #give-item-choose-team .tci--item .cost {
        width: 70px;
    }
    #give-item-choose-team .tci--item p {
        margin: 10px 0 0 0;
    }

    .item-selection-container {
        display: flex;
        flex-flow: row wrap;
        padding: 20px 0;
    }
    .tci--item {
        flex: 0 0 16%;
        margin-right: 9px;
        display: flex;
        align-items: center;
        flex-flow: column nowrap;
        margin-left: 9px;
        margin-bottom: 26px;
        cursor: pointer;
    }
    .tci--item img.item-img {
        width: 60px;
        height: 60px;
        border: 2px solid rgba(255,255,255,0.2);
        padding: 8px;
        border-radius: 10px;
    }
    .tci--item:hover img.item-img {
        border: 2px solid rgba(255,255,255,0.6);
    }
    .tci--item .cost {
        font-family: 'Nunito Sans';
        font-weight: 800;
        font-size: 12px;
        margin-top: 10px;
        background: rgba(255,255,255,0.05);
        border-radius: 10px;
        padding: 2px 0px 2px 2px;
        width: 100%;
        text-align: center;
        position: relative;
    }
    .tci--item:hover .cost {
        background: rgba(255,255,255,0.2);
    }
    .tci--item .cost img.curr {
        width: 16px;
        position: absolute;
        left: -3px;
        top: 50%;
        transform: translate(0,-50%);
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

    .event-chat-bubble .rank {
        height: 28px;
        position: relative;
        top: -2px;
        margin-right: 5px;
    }
    .event-chat-bubble .team-name {
        font-family: 'Nunito Sans';
        font-weight: 800;
        font-size: 12px;
        text-transform: uppercase;
        background: rgba(0,0,0,0.6);
        padding: 2px 8px 3px 8px;
        border-radius: 7px;
    }
    .event-chat-bubble .auth.bordered {
        border: 1px solid #ffffffaa;
        border-radius: 50px;
        padding: 4px 10px 3px 10px;
    }
    .event-chat-bubble .auth.bordered.yellow {
        color: #FFEB3B;
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

    .event-chat-bubble.gift .body .inchat-item {
        width: 5%;
        position: relative;
        top: -2px;
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
    .nominal-submit {
        background: rgba(255,0,87,1);
        padding: 10px;
    }
    .nominal-input-control {
        display: flex;
    }
    .nominal-input-control > div {
        flex: 1 1 50%;
        padding: 5px;
        text-align: center;
        background: rgba(0,0,0,0.8);
    }
    .nominal-input-control > div:hover {
        background: rgba(0,0,0,1);
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
    .event-slip-item-nominal-input {
        width: 100%;
        border: 0;
        padding: 10px;
    }
    .event-slip-item-cta-nominal-choice {
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
    .event-slip-item-cta-nominal-choice.active {
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
    .locked-market {
        cursor: not-allowed;
    }
    .locked-market .icon {
        height: 12px;
        opacity: 0.5;
    }
    .event-slip-cta {
        padding: 20px;
        background: rgba(255,0,87,1);
        text-align: center;
        font-weight: 800;
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
    .event-slip-item-type span.subtitle {
        opacity: 0.5;
    }
    .event-slip-item-cta {
        background: rgba(0,0,0,0.2);
        cursor: pointer;
        position: relative;
        padding: 0 !important;
    }
    .event-slip-item-cta .icon {
        width: 10px;
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
</style>
<style type="text/css">
    @media (max-width: 1600px) {
        .vxt5--1600 {
            display: none !important;
        }
    }
    @media (max-width: 1400px) {
        .vxt5--1400 {
            display: none !important;
        }
    }
    @media (max-width: 1300px) {
        .vxt5--1300 {
            display: none !important;
        }
    }
    @media (max-width: 1250px) {
        .vxt5--1250 {
            display: none !important;
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
        padding-bottom: 100px;
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

        // main BINGO cell click
        $('body').on('click', '.js-event-detail-0001', function(e) {
            e.preventDefault();
            var itemId = $(this).attr('data-id');
            var valueBonus = $(this).attr('data-value');
            var idBingo = $(this).attr('data-idbingo');
            var typeBingo = $(this).attr('data-typebingo');
            var title = $(this).attr('data-title');
            var subtitle = $(this).attr('data-subtitle');

            // modify the template data-id
            // copy template
            $('.js-templates--events-slip-item .event-slip-item').attr('data-id',itemId);
            $('.event-slip-item[data-id="'+itemId+'"]').find('.event-slip-item-body .item.event-slip-item-cta .event-slip-item-nominal-input').attr('data-bonus',valueBonus);
            $('.event-slip-item[data-id="'+itemId+'"]').find('.event-slip-item-body .item.event-slip-item-cta .event-slip-item-nominal-input').attr('data-id',idBingo);
            $('.event-slip-item[data-id="'+itemId+'"]').find('.event-slip-item-body .item.event-slip-item-cta .event-slip-item-nominal-input').attr('data-type',typeBingo);
            $('.event-slip-item[data-id="'+itemId+'"]').find('.event-slip-item-body .item.event-slip-item-bonus .value').text(valueBonus+'%');
            $('.event-slip-item[data-id="'+itemId+'"]').find('.event-slip-item-body .item.event-slip-item-type .title').text(title);
            $('.event-slip-item[data-id="'+itemId+'"]').find('.event-slip-item-body .item.event-slip-item-type .subtitle').text(subtitle);
            var tmplate = $('.js-templates--events-slip-item').html();

            // open slip tab panel
            $('.event-right-tab-item, .event-right-content-panel').removeClass('active');
            $('.event-right-content-panel.slip, .tab-slip').addClass('active');

            // close all nominal choice dropdowns
            $('.event-slip-item-cta-nominal-choice, .js-event-detail-0002').removeClass('active');

            // show/hide clicked effect
            if ($(this).hasClass('active')){

                $('.event-slip-item-container .event-slip-item[data-id="'+itemId+'"]').remove();
                $(this).removeClass('active');

            } else {

                $(this).addClass('active');

                // paste the template to slip container
                $('.event-slip-item-container').append(tmplate);
            }
        });

        // close button on slip item
        $('body').on('click', '.js-remove-slip-item', function(e) {
            e.preventDefault();
            var itemId = $(this).parents('.event-slip-item').attr('data-id');
            $('.js-event-detail-0001[data-id="'+itemId+'"]').removeClass('active');
            $(this).parents('.event-slip-item').remove();

            var nominalBP = 0;
            var nominalPotensiBP = 0;
            $('.
                var value = $(this).val() || 0;
                var bonus = $(this).data('bonus') || 0;
                nominalBP = parseInt(nominalBP) + parseInt(value);
                if(bonus !== 0){
                    nominalPotensiBP = parseInt(nominalPotensiBP) + parseInt(value) * (1 + (parseInt(bonus) / 100));
                }
            })

            $('#total-nominal-bp').text(nominalBP);
            $('#total-bonus-bp').text(nominalPotensiBP);
        });

        // choose nominal on slip item
        $('body').on('click', '.js-event-detail-0002', function(e) {
            e.preventDefault();

            // show/hide clicked effect
            if ($(this).hasClass('active')){

                $(this).parents('.event-slip-item-cta').find('.event-slip-item-cta-nominal-choice').removeClass('active');
                $(this).removeClass('active');

                // close all nominal choice dropdowns
                $('.event-slip-item-cta-nominal-choice, .js-event-detail-0002').removeClass('active');

            } else {

                // close all nominal choice dropdowns
                $('.event-slip-item-cta-nominal-choice, .js-event-detail-0002').removeClass('active');

                $(this).addClass('active');
                $(this).parents('.event-slip-item-cta').find('.event-slip-item-cta-nominal-choice').addClass('active');
                $(this).parents('.event-slip-item-cta').find('.event-slip-item-nominal-input').focus();
            }
        });

        // set max height for slip container to match viewport height
        fixSlipContainerHeight();
        function fixSlipContainerHeight(){
            const windowVh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);
            const slipContainerHeight = windowVh - 310;
            const chatContainerHeight = windowVh - 250;
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

        // auto scroll to bottom of chat on page load
        $('.event-chat-container').scrollTop(1000000);    
        
        // btn-add and btn-subs for nominal
        $('body').on('click', '.nominal-input-add', function(e) {
            e.preventDefault();

            var nominal = $(this).closest('.event-slip-item-cta-nominal-choice').find('.event-slip-item-nominal-input').val() || 0;
            var nominalBonus = $(this).closest('.event-slip-item-cta-nominal-choice').find('.event-slip-item-nominal-input').data('bonus');

            nominal = parseInt(nominal) + 100;

            if(nominal > 2000) {
                nominal = 2000;
            }

            $(this).closest('.event-slip-item-cta-nominal-choice').find('.event-slip-item-nominal-input').val(nominal);
            countTotalBingo();
        });

        $('body').on('click', '.nominal-input-substract', function(e) {
            e.preventDefault();

            var nominal = $(this).closest('.event-slip-item-cta-nominal-choice').find('.event-slip-item-nominal-input').val() || 0;
            var nominalBonus = $(this).closest('.event-slip-item-cta-nominal-choice').find('.event-slip-item-nominal-input').data('bonus');

            nominal = parseInt(nominal) - 100;

            if(nominal < 0) {
                nominal = 0;
            }

            $(this).closest('.event-slip-item-cta-nominal-choice').find('.event-slip-item-nominal-input').val(nominal);
            countTotalBingo();
        });

        // btn-submit
        $('body').on('click', '.nominal-submit', function(e) {
            e.preventDefault();

            var nominal = $(this).closest('.event-slip-item-cta-nominal-choice').find('.event-slip-item-nominal-input').val() || 0;
            var nominalBonus = $(this).closest('.event-slip-item-cta-nominal-choice').find('.event-slip-item-nominal-input').data('bonus');
            var id = $(this).closest('.event-slip-item-cta-nominal-choice').find('.event-slip-item-nominal-input').data('id');
            var type = $(this).closest('.event-slip-item-cta-nominal-choice').find('.event-slip-item-nominal-input').data('type');
        });

        // input nominal
        $('body').on('keyup', '.event-slip-item-nominal-input', function(e) {
            countTotalBingo();
        });
        
    });

    function countTotalBingo() {
        var nominalBP = 0;
        var nominalPotensiBP = 0;
        $('.
            var value = $(this).val() || 0;
            var bonus = $(this).data('bonus') || 0;
            nominalBP = parseInt(nominalBP) + parseInt(value);
            if(bonus !== 0){
                nominalPotensiBP = parseInt(nominalPotensiBP) + parseInt(value) * (1 + (parseInt(bonus) / 100));
            }
        })
        
        $('#total-nominal-bp').text(nominalBP);
        $('#total-bonus-bp').text(nominalPotensiBP);
    }
</script>

<script>
    $(document).ready(function() {
        var ranksLogo = '';
        var ranks = '';
        var ranksChat = '';
        var eventStatus = "{{ $event->type }}";

        // scroll to the bottom of chat
        $('.chats').scrollTop(100000);

        var itemId = '';
        var teamId = '';

        // donate item
        $('.gifts').on('click', function(event) {
            itemId = $(this).data('item');
            itemName = $(this).data('itemName')
            itemLogo = $(this).data('itemlogo');
            var itemCurrencies = $(this).data('itemcurrencies');

            $('.item-img-selected').attr('src', itemLogo);
            $('#item-img-selected').prop('title', itemName);
            $('#item-currencies').text(itemCurrencies);
        })

        $('.btn-donate-item').on('click', function(event) {
            event.preventDefault();

            teamId = $(this).data('team');
            teamName = $(this).data('teamname');
        });

        $('#btn-confirm-donate').on('click', function(event) {
            ranksLogo = "{{ (Auth::user() && Auth::user()->rank_id >= $silver_rank) ? asset(Auth::user()->ranks->logo) : ''}}";
            if(ranksLogo !== '') {
                ranks = "<img src='" + ranksLogo + "' class='rank'>"
                ranksChat = "<img src='" + ranksLogo + "' class='rank' data-toggle='tooltip' data-placement='top' title='Gold I'>";
            }
            
            event.preventDefault();

            var msg = '<div class="event-chat-bubble gift">' +
                '<span class="auth">' + 
                    ranksChat +
                    '{{ Auth::user()->username ?? "guest" }}'+
                '</span>'+
                '<span class="body"> supported <span class="team-name">'
                    +teamName+
                '</span> ' +
                'with <img src='+itemLogo+' class="inchat-item">' +
                '</span>' +
            '</div>';

            var msgToDB = '<span class="body"> supported <span class="team-name">'
                    +teamName+
                '</span> ' +
                'with <img src='+itemLogo+' class="inchat-item">' +
                '</span>';

            $('#spinner').modal('show');

            setTimeout(function(){

                $.ajax({
                    url: "{{ url('ajax/donate-items/'.$event->id) }}",
                    method: 'post',
                    data : {
                        item_id : itemId,
                        team_id : teamId,
                        message : msgToDB
                    },
                    succ
                        if(result.status === 'error') {
                            $('#spinner').modal('hide');
                            $('#donate-failed').modal('show');
                            $('.donate-message').text(result.message);
                        } else {
                            $('#spinner').modal('hide');
                            $('#donate-success').modal('show');
                            $('#total-lp').text(result.total_lp);
                            $('.donate-message').text('Terimakasih');
                            $('#data-chats').append(msg).scrollTop(100000);
                        }
                    }
                })

            }, 500);
        })

        // chats
        $('.event-chat-enter').on('click', function(event) {
            ranksLogo = "{{ (Auth::user() && Auth::user()->rank_id >= $silver_rank) ? asset(Auth::user()->ranks->logo) : ''}}";
            if(ranksLogo !== '') {
                ranks = "<img src='" + ranksLogo + "' class='rank'>"
                ranksChat = "<img src='" + ranksLogo + "' class='rank' data-toggle='tooltip' data-placement='top' title='Gold I'>";
            }

            var inputVal = $('.event-chat-input').val();
            if (inputVal.length != 0) {
                var msg = '<div class="event-chat-bubble"><span class="auth">' + ranksChat + '{{ Auth::user()->username ?? "guest" }}:</span> <span class="body">'+inputVal+'</span></div>';
                var msgToDB = '<span class="body">'+inputVal+'</span>';
                $('#data-chats').append(msg).scrollTop(100000);
                $('.event-chat-input').val('').focus();

                $.ajax({
                    url: "{{ url('ajax/event-chats/'.$event->id) }}",
                    method: 'post',
                    data: {
                        message: msgToDB
                    },
                    succ
                        if(result.status === 'success') {
                            getAllDataEventDetail(eventStatus);
                        }
                    }
                })
            }
        });

        $('.event-chat-input').keypress(function(e){
            if(e.which == 13){
                $('.event-chat-enter').click();//Trigger search button click event
            }
        });

        setInterval(
            function(){
                getAllDataEventDetail(eventStatus);
            }, 3000
        );
    });

    function getAllDataEventDetail(eventStatus) {
        $.ajax({
            url: "{{ url('ajax/get-data-event-detail/'.$event->id) }}",
            method: 'get',
            success: function(result) {
                if(result.event_type != eventStatus) {
                    location.reload();
                }

                $('#data-user').html(result.user)
                $('#data-chats').html(result.chats)
                // $('.team-left-score').text(result.team_left_score)
                // $('.team-right-score').text(result.team_right_score)

                $('#total-lp').text(result.total_lp);
                $('.top-cta #total-lp-menu').text(result.total_lp);
                $('#total-bp').text(result.total_bp);   

                $('#bingo-rules').html(result.event_bingo);
            }
        })
    }
</script>
    
@endsection