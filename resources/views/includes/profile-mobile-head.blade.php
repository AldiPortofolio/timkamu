<!-- profile submenus -->
<div class="mbtray tray--profile-submenu tray--colored">
    <a href="#" class="tray--close"><i data-feather="x" class="icon"></i>Close</a>
    <a href="{{ url('profile') }}"><i data-feather="user" class="icon"></i>Informasi Profil</a>
    <a href="{{ url('profile/edit?type=profile') }}"><i data-feather="edit" class="icon"></i>Ubah Password</a>
    <a href="{{ url('profile/system-mail') }}" class="menu-system-mail {{ $sys_email > 0 ? 'new' : '' }}">
        <i data-feather="mail" class="icon"></i>System Mail 
        <div class="menu-system-mail {{ $sys_email > 0 ? 'new' : '' }}"></div>
    </a>
    <!-- <a href="{{ url('profile/transaction?name=lp') }}"><img src="{{ asset('img/currencies/lp.svg') }}" class="icon">Transaksi LP</a>
    <a href="{{ url('profile/transaction?name=bp') }}"><img src="{{ asset('img/currencies/bp.svg') }}" class="icon">Transaksi BP</a> -->
    <a href="{{ url('profile/backpack') }}"><i data-feather="shopping-bag" class="icon"></i>Backpack</a>
    <!-- <a href="{{ url('profile/result') }}"><i data-feather="file-text" class="icon"></i>Hasil Pertandingan</a> -->
    <a href="https://tawk.to/chat/5f44fef2cc6a6a5947ae9ec1/default" target="_blank"><i data-feather="message-circle" class="icon"></i>Customer Service Chat</a>
    <a href="{{ url('sign-out') }}"><i data-feather="log-out" class="icon"></i>Log Out</a>
</div>

<div class="area-head">
    <input type="file" class="mobile-avatar-upload" style="display:none"> 
    <div class="area-head--propic"></div>
    <div class="area-head--name">
        <h3>{{ $user->username }}</h3>
    </div>
    <div class="area-head--meta">
        <div><img src="{{ asset('img/currencies/lp.svg') }}" class="icon"><span>{{ number_format($user->total_lp, 0, '.', ',') }}</span></div>
        <div><img src="{{ asset('img/currencies/bp.svg') }}" class="icon"><span>{{ number_format($user->total_bp, 0, '.', ',') }}</span></div>
    </div>
</div>

<style type="text/css">
    
    .mobile--profile-index,
    .mobile--profile-lp,
    .mobile--profile-bp,
    .mobile--profile-hasil,
    .mobile--profile-hasildetail,
    .mobile--profile-backpack {
        margin-top: 80px;
        padding-bottom: 100px;
        display: none;
    }
    .area-head {
        display: flex;
        flex-flow: column;
        align-items: center;
        justify-content: center;
        padding: 25px 0 40px 0;
    }
    .area-head--propic {
        width: 150px;
        height: 150px;
        background-image: url("<?php echo asset('img/avatars/1.jpg'); ?>");
        background-size: cover;
        background-position: center;
        border-radius: 250px;
        border: 5px solid rgba(255,255,255,1);
    }
    .area-head--name h3 {
        margin-top: 20px;
        font-family: 'Nunito Sans';
        font-weight: 100;
        font-size: 30px;
    }
    .area-head--meta {
        display: flex;
        align-items: center;
        width: 100%;
    }
    .area-head--meta > div {
        flex: 1 1 50%;
        text-align: left;
        font-family: 'Nunito Sans';
        font-weight: 800;
        position: relative;
        margin: 0 25px;
    }
    .area-head--meta > div span {
        opacity: 0.5;
    }
    .area-head--meta > div .icon {
        width: 16px;
        position: relative;
        top: -2px;
        margin-right: 8px;
    }
    .area-head--meta > div:first-child {
        text-align: right;
    }
    .area-head--meta > div:first-child:before {
        content: " ";
        position: absolute;
        right: -25px;
        top: 50%;
        transform: translate(0,-50%);
        height: 70%;
        border-right: 1px solid rgba(255,255,255,0.2);
    }
    .area-info {
        background: rgba(0,0,0,0.4);
    }
    .area-info--box {
        padding: 15px 25px;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .area-info--box .info-header {
        font-size: 12px;
    }
    .area-info--box span {
        font-size: 16px;
        font-family: 'Nunito Sans';
        font-weight: 800;
    }
    .mobile--profile--area-selector {
        background: #f50e52;
        padding: 20px 25px;
        font-family: 'Nunito Sans';
        font-weight: 800;
        font-size: 16px;
        position: relative;
    }
    .mobile--profile--area-selector .icon {
        width: 22px;
        stroke-width: 3px;
        margin-right: 10px;
        height: 22px;
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translate(0,-50%);
    }
    .mobile--profile--area-back {
        background: #673ab7;
        padding: 20px 25px;
        font-family: 'Nunito Sans';
        font-weight: 800;
        font-size: 16px;
        position: relative;
    }
    .mobile--profile--area-back .icon {
        width: 22px;
        stroke-width: 3px;
        margin-right: 10px;
        height: 22px;
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translate(0,-50%);
    }
    a .mobile--profile--area-back {
        color: rgba(255,255,255,0.7);
    }
</style>