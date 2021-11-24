<div class="topmenu2">
	<div class="left">
		<a href="{{ url('/home') }}">
			<img src="{{ asset('img/mana-ui/logo.svg') }}" class="logo">
		</a>
	</div>
	<div class="right">
		<ul class="lst p-0 m-0">
			<li class="hamburger menu-system-mail {{ $sys_email > 0 ? 'new' : '' }}"><i data-feather="menu" class="icon"></i></li>
			@guest
				<li class="top-cta red hide--1330"><a href="{{ url('sign-in') }}" class="font-14 fw-800">Sign In</a></li>
				<li class="top-cta blank hide--1330"><a href="{{ url('purchase/detail?name=lp') }}"><img src="{{ asset('img/currencies/lp.svg') }}" class="curr-icon">Recharge</a></li>
			@else
				<li class="top-cta red hide--1330 desktop-profile-menu-trigger menu-system-mail {{ $sys_email > 0 ? 'new' : '' }}"><a href="#" class="font-14 fw-800">{{ $user->username }}<i data-feather="chevron-down" class="icon"></i></a></li>
			@endguest
			@auth
			<li class="top-cta blank hide--820"><a href="{{ url('purchase/detail?name=lp') }}" target="_blank"><img src="{{ asset('img/currencies/lp.svg') }}" class="curr-icon"><span class="total-lp-menu">{{ number_format($user->total_lp, 0, '.', ',') }}</span></a></li>
			@endauth
			<li class="hide--1050"><a href="{{ url('events') }}"><i data-feather="airplay" class="icon"></i>Game Events</a></li>
			<li class="hide--1050"><a href="{{ url('purchase/detail?name=diamond') }}"><i data-feather="star" class="icon"></i>Top-Up</a></li>
		</ul>
	</div>
</div>

<style type="text/css">
	.hamburger.new:after {
		content: " ";
		width: 12px;
		height: 12px;
		background: #e91e63;
		border-radius: 50px;
		position: absolute;
		top: -5px;
		right: -5px;
		border: 1px solid rgb(255 255 255 /90%);
		box-shadow: 0px 1px 2px 0px rgb(0 0 0 / 50%);
	}
	.top-cta.new {
		position: relative;
	}
	.top-cta.new:after {
		content: " ";
		width: 12px;
		height: 12px;
		background: #e91e63;
		border-radius: 50px;
		position: absolute;
		top: -5px;
		right: -1px;
		border: 1px solid rgb(255 255 255 /90%);
		box-shadow: 0px 1px 2px 0px rgb(0 0 0 / 50%);
	}
	.main-nav-submenu {
		position: absolute;
		right: 45px;
		top: 80px;
		background: #9c27b0;
		width: 300px;
		line-height: initial;
		transform: translate(0,-200%);
		transition: all 0.1s ease-in-out;
		border-radius: 15px;
	}
	.main-nav-submenu.active {
		transform: translate(0,0);
	}
	.main-nav-submenu-overlay {
		position: fixed;
		background: rgba(0,0,0,0.8);
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		display: none;
	}
	.main-nav-submenu-overlay.active {
		display: block;
	}
	.main-nav-submenu .area-head {
	    display: flex;
	    flex-flow: column;
	    align-items: center;
	    justify-content: center;
	    padding: 20px 0 20px 0;
	    background: url(<?php echo asset('img/desktop-profile-dropdown-bg.jpg'); ?>);
	    background-size: cover;
		border-top-left-radius: 15px;
		border-top-right-radius: 15px;
	}
	.main-nav-submenu .area-head--name h3 {
	    margin-top: 10px;
	    font-family: 'Nunito Sans';
	    font-weight: 100;
	    font-size: 18px;
	}
	.main-nav-submenu .area-head--meta {
	    display: flex;
	    align-items: center;
	    width: 100%;
	}
	.main-nav-submenu .area-head--meta > div {
	    flex: 1 1 50%;
	    text-align: left;
	    font-family: 'Nunito Sans';
	    font-weight: 800;
	    position: relative;
	    margin: 0 25px;
	}
	.main-nav-submenu .area-head--meta > div span {
	    opacity: 0.5;
	}
	.main-nav-submenu .area-head--meta > div .icon {
	    width: 16px;
	    position: relative;
	    top: -2px;
	    margin-right: 8px;
	}
	.main-nav-submenu .area-head--meta > div:first-child {
	    text-align: right;
	}
	.main-nav-submenu .area-head--meta > div:first-child:before {
	    content: " ";
	    position: absolute;
	    right: -25px;
	    top: 50%;
	    transform: translate(0,-50%);
	    height: 70%;
	    border-right: 1px solid rgba(255,255,255,0.2);
	}
	.main-nav-submenu .area-links {
        padding: 20px;
        padding-bottom: 14px;
	}
	.main-nav-submenu .area-links a {
	    color: rgba(255,255,255,0.8);
        display: block;
        padding: 5px 0;
        position: relative;
	}
	.main-nav-submenu .area-links a:hover {
	    color: rgba(255,255,255,1);
	}
	.main-nav-submenu .area-links a .icon {
	    width: 14px;
        position: relative;
        top: -1px;
        margin-right: 10px;
        opacity: 0.7;
	}
	.area-exp {
		height: 100px;
		display: flex;
		background: #444162;
		flex-direction: column;
		padding: 25px;
		cursor: pointer;
	}
	.area-exp:hover {
		background: #535073;
	}
	.area-exp-icons {
		display: flex;
	}
	.area-exp-icons .side {
		flex: 0 0 50%;
	}
	.area-exp-icons .side.right {
		text-align: right;
	}
	.exp-icons-img {
		width: 16px;
		position: relative;
		top: -1px;
	}
	.area-exp-bar {
		position: relative;
		background: rgba(0,0,0,0.4);
		border-radius: 50px;
		height: 20px;
		margin-top: 10px;
		text-align: center;
	}
	.area-exp-bar:before {
	    content: " ";
	    height: 100%;
	    position: absolute;
	    left: 0;
	    top: 0;
	    background: #8bc34a;
	    border-radius: 50px;
	}
	.area-exp-bar span {
	    line-height: 20px;
        position: relative;
        text-shadow: 1px 1px 5px #000;
        font-style: italic;
	}
	.area-head--profile-pic-container {
		position: relative;
    	width: 100%;
		display: flex;
	    align-items: center;
	    justify-content: center;
	}
	.area-head--profile-pic-container .area-head--propic {
	    flex: 0 0 70px;
        height: 70px;
        background-image: url(<?php echo asset('img/avatars/1.jpg'); ?>);
        background-size: cover;
        background-position: center;
        border-radius: 250px;
        border: 3px solid rgba(255,255,255,1);
        margin-right: -10px;
        position: relative;
		transition: all 0.1s ease-in-out;
	}
	.area-head--profile-pic-container .area-head--fanpic {
	    flex: 0 0 70px;
        height: 70px;
        background: rgb(0 0 0 / 80%);
        border-radius: 250px;
        border: 0px;
        margin-left: -10px;
		display: flex;
	    align-items: center;
	    justify-content: center;
	    position: relative;
	    transition: all 0.1s ease-in-out;
	    cursor: pointer;
	}
	.area-head--fanpic.no-team {
        border: 3px dashed rgba(255,255,255,1);
        opacity: 0.5;
        cursor: pointer;
	}
	.area-head--fanpic.no-team .icon {
        width: 40px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
	    transition: all 0.1s ease-in-out;
	}
	.area-head--fanpic.no-team .show-on-hover {
        opacity: 0;
	}
	.area-head--fanpic.no-team:hover {
        opacity: 0.8;
	}
	.area-head--fanpic.no-team:hover .hide-on-hover {
        opacity: 0;
	}
	.area-head--fanpic.no-team:hover .show-on-hover {
        opacity: 1;
	}
	.area-head--fanpic img {
	    width: 75%;
	}
	.area-head--text-loyal {
		opacity: 0;
		pointer-events: none;
		position: absolute;
		width: 70px;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		text-align: center;
	    transition: all 0.1s ease-in-out;
	}
	.area-head--profile-pic-container:hover .area-head--fanpic {
        margin-left: 110px;
	}
	.area-head--profile-pic-container:hover .area-head--text-loyal {
		opacity: 1;
	}
	.area-links a.new:after {
		content: " ";
		width: 10px;
		height: 10px;
		background: #e91e63;
		border-radius: 50px;
		position: absolute;
		top: 6px;
	    left: -4px;
		border: 1px solid rgb(255 255 255 /90%);
		box-shadow: 0px 1px 2px 0px rgb(0 0 0 / 50%);
	}
</style>

@auth
<div class="main-nav-submenu-group">
	<div class="main-nav-submenu-overlay"></div>
	<div class="main-nav-submenu">
		<div class="area-head">
		    <div class="area-head--profile-pic-container">
		    	<div class="sides area-head--propic"></div>
		    	
				<!-- if member is already a fan of a team -->
				@if($user->fans_team_id)
		    	<div class="sides area-head--fanpic"><img src="<?php echo asset('img/team-logos/onic.png'); ?>"></div>
				<div class="area-head--text-loyal">You are a loyal fans of ONIC</div>
				@else

				<!-- if member is not a fan of any team -->
		    	<div class="sides area-head--fanpic no-team" onClick="window.location='/teams'">
		    		<i data-feather="users" class="icon hide-on-hover"></i>
		    		<i data-feather="user-plus" class="icon show-on-hover"></i>
		    	</div>
		    	<div class="area-head--text-loyal">You are not a fan of any team</div>
				@endif

		    </div>
		    <div class="area-head--name">
		        <h3>{{ $user->username }}</h3>
		    </div>
		    <div class="area-head--meta">
		        <div><img src="{{ asset('img/currencies/lp.svg') }}" class="icon"><span class="total-lp-menu">{{ number_format($user->total_lp, 0, '.', ',') }}</span></div>
		        <div><img src="{{ asset('img/currencies/bp.svg') }}" class="icon"><span class="total-bp-menu">{{ number_format($user->total_bp, 0, '.', ',') }}</span></div>
		    </div>
		</div>
		<div class="area-exp" onClick="window.location.href = '/ranks';">
			<div class="area-exp-icons">
				<div class="side left">
					@if($current_rank->logo)<img src="{{ asset($current_rank->logo) }}" class="exp-icons-img">@endif
					{{ $current_rank->name }}
				</div>
				@if($total_exp - $current_rank->value < $next_rank->value - $current_rank->value)
				<div class="side right">
					<img src="{{ asset($next_rank->logo) }}" class="exp-icons-img">
					{{ $next_rank->name }}
				</div>
				@endif
			</div>
			<div class="area-exp-bar">
				<span>
					@if($total_exp - $current_rank->value > $next_rank->value - $current_rank->value)
					1000 / 1000
					@else
					{{ $total_exp - $current_rank->value }} / {{ $next_rank->value - $current_rank->value  }}
					@endif
				</span>
			</div>
		</div>
		<div class="area-links">
			<a href="{{ url('profile') }}"><img src="{{ asset('icons/user-white.svg') }}" class="icon">Profil Saya</a>
			@if($user->fans_team_id)
			<a href="{{ url('teams/detail?name=onic') }}"><i data-feather="award" class="icon"></i>ONIC Fan Page</a>
			@endif
			<a href="{{ url('profile/system-mail') }}" class="menu-system-mail {{ $sys_email > 0 ? 'new' : '' }}">
				<img src="{{ asset('icons/mail-white.svg') }}" class="icon">System Mail 
				<div class="menu-system-mail {{ $sys_email > 0 ? 'new' : '' }}"></div>
			</a>
		    <a href="{{ url('profile/backpack') }}"><i data-feather="shopping-bag" class="icon"></i>Backpack</a>
		</div>
	</div>
</div>
@endauth
<style type="text/css">
	.tray--colored > a.new:after {
		content: " ";
		width: 10px;
		height: 10px;
		background: #e91e63;
		border-radius: 50px;
		position: absolute;
		top: 17px;
		left: 22px;
		border: 1px solid rgb(255 255 255 /90%);
		box-shadow: 0px 1px 2px 0px rgb(0 0 0 / 50%);
	}
</style>
<!-- mobile -->
<div class="container--mobile-menu">
	<div class="mboverlay"></div>

	<div class="mbtray tray--main tray--colored">
		<a href="#" class="tray--close"><img src="{{ asset('icons/x-white.svg') }}" class="icon">Close</a>
		@auth
		<a href="#" class="tray--trigger" data-target="tray--profile"><i data-feather="user" class="icon"></i>Profil Saya<img src="{{ asset('icons/chevron-right-white.svg') }}" class="tray--right-side-icon"></a>
		@endauth
		<a href="{{ url('events') }}"><i data-feather="airplay" class="icon"></i>Games Event</a>
		<a href="{{ url('purchase/detail?name=lp') }}"><i data-feather="zap" class="icon"></i>Loyalty Points</a>
		<a href="{{ url('purchase/detail?name=diamond') }}"><i data-feather="star" class="icon"></i>Game Diamonds</a>
		@guest
		<a href="{{ url('sign-in') }}"><i data-feather="log-in" class="icon"></i></i>Sign in</a>
		@endguest
	</div>

	@auth
	<div class="mbtray tray--profile tray--colored">
		<a href="#" class="tray--close"><img src="{{ asset('icons/x-white.svg') }}" class="icon">Close</a>
		<a href="#" class="tray--trigger tray--back" data-target="tray--main"><img src="{{ asset('icons/arrow-up-left-white.svg') }}" class="icon">Back</a>

		<div class="mb-profile-snap">
			<div class="mb-snap-profile-pic">
				<div class="sides mb-snap-propic"></div>

				<!-- if member is already a fan of a team -->
				@if($user->fans_team_id)
		    	<div class="sides mb-snap-fanpic"><img src="<?php echo asset('img/team-logos/onic.png'); ?>"></div>
				<div class="mb-snap-text-loyal">You are a loyal fans of ONIC</div>
				@else
				<!-- if member is not a fan of any team -->
				<div class="sides mb-snap-fanpic no-team">
					<i data-feather="users" class="icon hide-on-hover"></i>
					<i data-feather="user-plus" class="icon show-on-hover"></i>
				</div>
				<div class="mb-snap-text-loyal">You are not a fan of any team</div>
				@endif

			</div>
			<div class="mb-snap-username">
				<h3>{{ $user->username }}</h3>
			</div>
			<div class="mb-snap-meta">
				<div><img src="{{ asset('img/currencies/lp.svg') }}" class="icon"><span>{{ number_format($user->total_lp, 0, '.', ',') }}</span></div>
		        <div><img src="{{ asset('img/currencies/bp.svg') }}" class="icon"><span>{{ number_format($user->total_bp, 0, '.', ',') }}</span></div>
			</div>
		</div>
		<div class="mb-exp-snap" onClick="window.location.href = '/ranks';">
			<div class="mb-exp-snap-icons">
				<div class="side left">
					@if($current_rank->logo)<img src="{{ asset($current_rank->logo) }}" class="mb-exp-snap-icons-img">@endif
					{{ $current_rank->name }}
				</div>
				<div class="side right">
					<img src="{{ asset($next_rank->logo) }}" class="mb-exp-snap-icons-img">
					{{ $next_rank->name }}
				</div>
			</div>
			<div class="mb-exp-snap-exp-bar">
				<span>{{ $total_exp }} / {{ $next_rank->value }}</span>
			</div>
		</div>

		<a href="{{ url('profile') }}"><img src="{{ asset('icons/user-white.svg') }}" class="icon"></i>Halaman Profil<img src="{{ asset('icons/chevron-right-white.svg') }}" class="tray--right-side-icon"></a>
		<a href="{{ url('profile/system-mail') }}" class="menu-system-mail {{ $sys_email > 0 ? 'new' : '' }}">
			<img src="{{ asset('icons/mail-white.svg') }}" class="icon">System Mail 
			<div class="menu-system-mail {{ $sys_email > 0 ? 'new' : '' }}"></div>
			<img src="{{ asset('icons/chevron-right-white.svg') }}" class="tray--right-side-icon">
		</a>

		<!-- <div class="mb-horizontal-tray-menu">
			<a href="{{ url('profile') }}"><i data-feather="user" class="icon"></i>Informasi Profil</a>
			<a href="{{ url('profile/system-mail') }}" class="menu-system-mail {{ $sys_email > 0 ? 'new' : '' }}"><i data-feather="mail" class="icon"></i>System Mail</a>
			<a href="{{ url('profile/backpack') }}"><i data-feather="shopping-bag" class="icon"></i>Backpack</a>
			<a href="https://tawk.to/chat/5f44fef2cc6a6a5947ae9ec1/default" target="_blank"><i data-feather="message-circle" class="icon"></i>Customer Service Chat</a>
			<a href="{{ url('sign-out') }}"><i data-feather="log-out" class="icon"></i>Sign Out</a>
		</div> -->
		
	</div>
	@endauth

<style type="text/css">
	.mb-horizontal-tray-menu {
		display: flex;
		flex-wrap: wrap;
	}
	.mb-horizontal-tray-menu > a {
		flex: 0 0 50%;
		padding: 16px;
		background: #444162;
		color: rgba(255,255,255,0.8);
		border-bottom: 1px solid rgb(0 0 0 / 20%);
		display: flex;
		flex-direction: column;
		justify-content: center;
	}
	.mb-horizontal-tray-menu > a + a {
		border-left: 1px solid rgb(0 0 0 / 20%);
	}
	.mb-horizontal-tray-menu a .icon {
		width: 16px;
	    position: relative;
	    top: -2px;
	    margin-right: 12px;
	}
	.mb-exp-snap {
		height: 100px;
		display: flex;
		background: #30303c;
		flex-direction: column;
		padding: 25px;
	}
	.mb-exp-snap-icons {
		display: flex;
	}
	.mb-exp-snap-icons .side {
		flex: 0 0 50%;
	}
	.mb-exp-snap-icons .side.right {
		text-align: right;
	}
	.mb-exp-snap-icons-img {
		width: 16px;
		position: relative;
		top: -1px;
	}
	.mb-exp-snap-exp-bar {
		position: relative;
		background: rgba(0,0,0,0.4);
		border-radius: 50px;
		height: 20px;
		margin-top: 10px;
		text-align: center;
	}
	.mb-exp-snap-exp-bar:before {
	    content: " ";
	    height: 100%;
	    position: absolute;
	    left: 0;
	    top: 0;
	    background: #8bc34a;
	    border-radius: 50px;
	}
	.mb-exp-snap-exp-bar span {
	    line-height: 20px;
        position: relative;
        text-shadow: 1px 1px 5px #000;
        font-style: italic;
	}
	.mb-profile-snap {
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		/*background: #30303c;*/
		padding: 30px 25px 25px 25px;
		background: url(<?php echo asset('img/desktop-profile-dropdown-bg.jpg'); ?>);
		background-size: cover;
	}
	.mb-snap-profile-pic {
		position: relative;
    	width: 100%;
		display: flex;
	    align-items: center;
	    justify-content: center;
	}
	.mb-snap-propic {
	    flex: 0 0 70px;
        height: 70px;
        background-image: url(<?php echo asset('img/avatars/1.jpg'); ?>);
        background-size: cover;
        background-position: center;
        border-radius: 250px;
        border: 3px solid rgba(255,255,255,1);
        margin-right: -10px;
        position: relative;
		transition: all 0.1s ease-in-out;
	}
	.mb-snap-fanpic {
	    flex: 0 0 70px;
        height: 70px;
        background: rgb(0 0 0 / 80%);
        border-radius: 250px;
        border: 0px;
        margin-left: -10px;
		display: flex;
	    align-items: center;
	    justify-content: center;
	    position: relative;
	    transition: all 0.1s ease-in-out;
	    cursor: pointer;
	}
	.mb-snap-fanpic.no-team {
        border: 3px dashed rgba(255,255,255,1);
        opacity: 0.5;
        cursor: pointer;
	}
	.mb-snap-fanpic.no-team .icon {
        width: 40px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
	    transition: all 0.1s ease-in-out;
	}
	.mb-snap-fanpic.no-team .show-on-hover {
        opacity: 0;
	}
	.mb-snap-fanpic.no-team:hover {
        opacity: 0.8;
	}
	.mb-snap-fanpic.no-team:hover .hide-on-hover {
        opacity: 0;
	}
	.mb-snap-fanpic.no-team:hover .show-on-hover {
        opacity: 1;
	}
	.mb-snap-fanpic img {
	    width: 75%;
	}
	.mb-snap-text-loyal {
		opacity: 0;
		pointer-events: none;
		position: absolute;
		width: 70px;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		text-align: center;
	    transition: all 0.1s ease-in-out;
	}
	.mb-snap-profile-pic:hover .mb-snap-fanpic {
        margin-left: 110px;
	}
	.mb-snap-profile-pic:hover .mb-snap-text-loyal {
		opacity: 1;
	}
	.mb-snap-username h3 {
	    margin-top: 10px;
	    font-family: 'Nunito Sans';
	    font-weight: 100;
	    font-size: 18px;
	}
	.mb-snap-meta {
	    display: flex;
	    align-items: center;
	    width: 100%;
	}
	.mb-snap-meta > div {
	    flex: 1 1 50%;
	    text-align: left;
	    font-family: 'Nunito Sans';
	    font-weight: 800;
	    position: relative;
	    margin: 0 25px;
	}
	.mb-snap-meta > div span {
	    opacity: 0.5;
	}
	.mb-snap-meta > div .icon {
	    width: 16px;
	    position: relative;
	    top: -2px;
	    margin-right: 8px;
	}
	.mb-snap-meta > div:first-child {
	    text-align: right;
	}
	.mb-snap-meta > div:first-child:before {
	    content: " ";
	    position: absolute;
	    right: -25px;
	    top: 50%;
	    transform: translate(0,-50%);
	    height: 70%;
	    border-right: 1px solid rgba(255,255,255,0.2);
	}
</style>

	<div class="mbtray tray--topup tray--colored">
		<a href="#" class="tray--close"><img src="{{ asset('icons/x-white.svg') }}" class="icon">Close</a>
		<a href="#" class="tray--trigger tray--back" data-target="tray--main"><i data-feather="arrow-up-left" class="icon"></i>Back</a>
		
		<a href="{{ url('purchase/detail?name=lp') }}"><i data-feather="zap" class="icon"></i>Loyalty Points</a>
		<a href="{{ url('purchase/detail?name=diamond') }}"><i data-feather="star" class="icon"></i>Game Diamonds</a>
		<a href="{{ url('purchase/detail?name=pulsa') }}"><i data-feather="smartphone" class="icon"></i>Isi Pulsa</a>
	</div>


	<div class="mbtray tray--lphelp tray--colored">
		<a href="#" class="tray--close"><img src="{{ asset('icons/x-white.svg') }}" class="icon">Close</a>
		<a href="#" class="tray--trigger tray--back" data-target="tray--profile"><i data-feather="arrow-up-left" class="icon"></i>Back</a>
		<div class="tray--content">
			<h3>Loyalty Points</h3>
			<p>Loyalty Points (LP) hanya dapat dibeli di website Timkamu.com.</p>
			<p>Setiap LP yang dibeli akan memberikan member EXP.</p>
			<p>EXP diperlukan untuk meningkatkan <a href="{{ url('ranks') }}" onclick="window.open(this.href, 'mywin','left=20,top=60,width=1200,height=600,toolbar=0,resizable=0'); return false;">level member</a>.</p>
			<p>Nilai LP saat ini adalah Rp 1,000 untuk setiap 1 LP.</p>
			<p>Berikan dukungan berupa item-item menarik untuk tim kamu dengan menggunakan LP.</p>
			<p>Battle Points (BP) dapat didapatkan dengan menukarkan LP.</p>
		</div>
	</div>


	<div class="mbtray tray--bphelp tray--colored">
		<a href="#" class="tray--close"><img src="{{ asset('icons/x-white.svg') }}" class="icon">Close</a>
		<a href="#" class="tray--trigger tray--back" data-target="tray--profile"><i data-feather="arrow-up-left" class="icon"></i>Back</a>
		<div class="tray--content">
			<h3>Battle Points</h3>
			<p>Battle Points (BP) dapat didapatkan dengan menukarkan LP.</p>
			<p>Nilai tukar LP ke BP saat ini adalah 1:1.</p>
			<p>LP hanya dapat ditukar menjadi BP dengan kelipatan 9.</p>
			<p>BP digunakan untuk mendukung tim kamu di event-event tertentu.</p>
			<p>Dukungan BP untuk tim yang benar akan menghasilkan lebih banyak BP.</p>
			<p>Dukungan BP untuk tim yang salah akan digantikan dengan clan items.</p>
		</div>
	</div>
</div>

<style type="text/css">
	.topmenu2 .right ul li.top-cta a .icon {
		margin: 0;
		margin-left: 5px;
		transition: all 0.1s ease-in-out;
		stroke-width: 4px;
		width: 14px;
	    opacity: 0.5;
	}
	.topmenu2 .right ul li.top-cta.active a .icon {
		transform: rotate(180deg);
	}
	.tray--right-side-icon {
		width: 16px;
		position: absolute;
		right: 25px;
		top: 50%;
		transform: translate(0,-50%);
		stroke-width: 3px;
		opacity: 0.8;
	}
	.mboverlay {
		position: fixed;
		background: rgba(0,0,0,0.8);
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		display: none;
	}
	.mboverlay.active {
		display: block;
	}
	.mbtray {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		transform: translate(0,-1500px);
        transition: all 0.1s ease-in-out;
	}
	.mbtray.active {
		transform: translate(0,0);
	}
	.tray--main {
		
	}
	.tray--colored > a {
		padding: 16px 25px;
		background: #444162;
		color:rgba(255,255,255,0.8);
		display: block;
		position: relative;
		border-bottom: 1px solid rgba(0,0,0,0.2);
	}
	.tray--content {
		padding: 20px 25px 16px 25px;
		background: #444162;
		color:rgba(255,255,255,0.8);
		display: block;
		position: relative;
		border-bottom: 1px solid rgba(0,0,0,0.2);
	}
	.tray--content > h3 {
        font-family: 'Nunito Sans';
        font-weight: 800;
	}
	.tray--content > p {
		text-align: left;
		line-height: initial;
	}
	.tray--colored > a .icon {
		width: 16px;
	    position: relative;
	    top: -2px;
	    margin-right: 12px;
	}
	.tray--colored > a .curr-icon {
		width: 16px;
	    position: relative;
	    top: -2px;
	    margin-left: 6px;
	}
	.tray--colored > a .rlg {
		width: 16px;
	    position: relative;
	    top: -2px;
	    margin-right: 12px;
	}
	.tray--colored > a.tray--close {
		background: #f50e52;
	}
	.tray--colored > a.tray--back {
		background: #673ab7;
	}
	.hamburger {
		margin-left: 20px;
		cursor: pointer;
	    transition: all 0.1s ease-in;
        display: none;
        position: relative;
	}
	.hamburger .icon {
		opacity: 0.8;
	    position: relative;
	    top: -3px;
	    width: 28px;
	    height: 28px;
	}
    @media (max-width: 1330px) {
        .hide--1330 {
            display: none;
        }
		.hamburger {
			display: block;
		}
    }
    @media (max-width: 1050px) {
        .hide--1050 {
            display: none;
        }
    }
    @media (max-width: 820px) {
        .hide--820 {
            display: none;
        }
        .topmenu2 {
        	top: 20px;
        }
        .topmenu2 .left {
        	padding-left: 20px;
        }
        .topmenu2 .right {
        	padding-right: 20px;
        }
    }
</style>