<section id="nav">
	<div class="logo">
		<a href="{{ url('/') }}">
			<img src="{{ asset('img/logo-emblem.svg') }}">
		</a>
	</div>

	<div class="survey-menu-button cursor-ptr" data-toggle="modal" data-target="#surveys">
		<img src="{{ asset('img/currencies/coin-survey.svg') }}">
	</div>

	<div class="video-menu-button cursor-ptr heartbeat">
		<img src="{{ asset('icons/live-fire-white.svg') }}">
	</div>

	<div class="mobile-menu-button cursor-ptr">
		<img src="{{ asset('icons/menu-white-jagged.svg') }}">
	</div>
</section>

<style type="text/css">
	.nav-profile {
		background: rgb(0 0 0 / 10%);
		margin-bottom: 20px;
	}
	.nav-profile-inner {
		padding: 70px 35px 25px 35px;
	}
	.nav-profile-rank {
		height: 50px;
		width: 50px;
		position: absolute;
		left: 30px;
		top: 15px;
		opacity: 1;
	}
</style>

<section id="nav-tray" class="d-flex flex-column @guest guest @endguest">

	<div class="nav-tray-close d-flex align-items-center justify-content-center scale-onclick pos"><i data-feather="arrow-right" class="icon cursor-ptr"></i></div>

	<!-- if member -->
	@auth
	<div class="nav-profile">
		<a href="{{ url('profile') }}">
			<div class="nav-tray-profile-link d-flex align-items-center justify-content-center scale-onclick pos"><i data-feather="user" class="icon cursor-ptr"></i></div>
		</a>
		<div class="nav-profile-inner position-relative">
			<div class="nav-profile-name rajdhani-bold font-size-28">
				{{ $user->username }}
			</div>
			<div class="nav-profile-moneys">
				<span class="money money-14 right mr-2"><span class="amt-lp">{{ number_format($total_lp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/lp.svg') }}" class="top-m1"></span>
				<span class="money money-14 right"><span class="amt-bp">{{ number_format($total_bp, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/bp.svg') }}" class="top-m1"></span>
				<span class="money money-14 right"><span class="amt-coin">{{ number_format($total_coin, 0, '.', ',') }}</span><img src="{{ asset('img/currencies/coin.svg') }}" class="top-m1"></span>
			</div>
			<div class="nav-profile-rank">
				@if($current_rank->logo)<a href="{{ url('faq') }}"><img src="{{ asset($current_rank->logo) }}" class="h-100"></a>@endif
			</div>
			<div class="nav-profile-vip" data-toggle="modal" data-target="#vip-help">
				@if($user->type === 'VIP' || $user->type === 'VVIP')<a href="{{ url('faq') }}"><img src="{{ $user->type === 'VIP' ? asset('img/ranks/vip1.png') : asset('img/ranks/vip2.png') }}" class="h-100"></a>@endif
			</div>
		</div>
	</div>
	@endauth

	<a href="{{ url('purchase/detail?name=lp') }}" class="nav-tray-link scale-onclick"><i data-feather="zap" class="icon"></i>Recharge LP<i data-feather="chevron-right" class="nav-helper"></i></a>

	<a href="{{ url('events') }}" class="nav-tray-link scale-onclick"><i data-feather="airplay" class="icon"></i>Games Event<i data-feather="chevron-right" class="nav-helper"></i></a>

	<a href="{{ url('purchase/detail?name=diamond') }}" class="nav-tray-link scale-onclick"><i data-feather="dollar-sign" class="icon"></i>Top Up<i data-feather="chevron-right" class="nav-helper"></i></a>

    <a href="{{ url('purchase/detail?name=pulsa') }}" class="nav-tray-link scale-onclick"><i data-feather="smartphone" class="icon"></i>Isi Pulsa<i data-feather="chevron-right" class="nav-helper"></i></a>

    <a href="{{ url('promotions') }}" class="nav-tray-link scale-onclick"><i data-feather="shopping-bag" class="icon"></i>Promos<i data-feather="chevron-right" class="nav-helper"></i></a>

    <a href="{{route('teams.index')}}?sort_by=fans" class="nav-tray-link scale-onclick"><i data-feather="heart" class="icon"></i>Teams<i data-feather="chevron-right" class="nav-helper"></i></a>

    <a href="{{route('tournaments.index')}}" class="nav-tray-link scale-onclick"><i data-feather="award" class="icon"></i>Tournaments<i data-feather="chevron-right" class="nav-helper"></i></a>



	<div class="nav-wedge"><hr></div>

	@guest
	<a href="{{ url('faq') }}" class="nav-tray-link scale-onclick"><i data-feather="help-circle" class="icon"></i>FAQs<i data-feather="chevron-right" class="nav-helper"></i></a>
	<a href="{{ url('sign-in') }}" class="nav-tray-link scale-onclick"><i data-feather="log-in" class="icon"></i>Sign In</a>
	@if(ENV('APP_ENV') === 'local' || ENV('APP_ENV') === 'dev')
	<a href="{{ url('sign-up') }}" class="nav-tray-link scale-onclick"><i data-feather="x" class="icon"></i>Register</a>
	@endif


	@else
	<a href="#" class="nav-tray-link scale-onclick my-profile-modal-trigger" data-toggle="modal" data-target="#my-quests"><i data-feather="gift" class="icon"></i>My Quests<i data-feather="chevron-right" class="nav-helper"></i></a>
	<a href="#" class="nav-tray-link scale-onclick my-profile-modal-trigger" data-toggle="modal" data-target="#convert-modal"><i data-feather="repeat" class="icon"></i>Convert<i data-feather="chevron-right" class="nav-helper"></i></a>
	<a href="{{ url('faq') }}" class="nav-tray-link scale-onclick"><i data-feather="help-circle" class="icon"></i>FAQs<i data-feather="chevron-right" class="nav-helper"></i></a>
	<a href="{{ url('profile/system-mail') }}" class="nav-tray-link scale-onclick"><i data-feather="mail" class="icon"></i>System Mail <i data-feather="chevron-right" class="nav-helper"></i></a>
	<a href="{{ url('sign-out') }}" class="nav-tray-link scale-onclick"><i data-feather="log-out" class="icon"></i>Log Out</a>
	@endguest

</section>

<section id="games-tray">

	<div class="games-nav-tray-close d-flex align-items-center justify-content-center scale-onclick pos"><i data-feather="arrow-right" class="icon cursor-ptr"></i></div>

	<div class="nav-profile">
		<div class="games-nav-profile-inner position-relative">
			<div class="nav-profile-name rajdhani-bold font-size-22">
				Featured Matches
			</div>
		</div>
	</div>
	<div id="feature-matches">
		@foreach ($array_event as $key => $itemEvent)
			@if($key === 'np' && count($itemEvent) > 0)
			<div class="nav-games-segment mb-20 d-flex flex-column">
				<div class="nav-section-header">Now Playing</div>
				@foreach ($itemEvent as $item)
					<a href="{{ url('events/'.$item->slug) }}" class="games-nav-tray-link scale-onclick">
						{{ $item->name }}
					</a>
				@endforeach
			</div>
			@elseif($key === 'mlbb' && count($itemEvent) > 0)
			<div class="nav-games-segment mb-20 d-flex flex-column">
				<div class="nav-section-header">Mobile Legends</div>
				@foreach ($itemEvent as $item)
					<a href="{{ url('events/'.$item->slug) }}" class="games-nav-tray-link scale-onclick">
						{{ $item->name }}
					</a>
				@endforeach
			</div>
			@elseif($key === 'freefire' && count($itemEvent) > 0)
			<div class="nav-games-segment mb-20 d-flex flex-column">
				<div class="nav-section-header">Free fire</div>
				@foreach ($itemEvent as $item)
					<a href="{{ url('events/'.$item->slug) }}" class="games-nav-tray-link scale-onclick">
						{{ $item->name }}
					</a>
				@endforeach
			</div>
			@elseif($key === 'pubgm' && count($itemEvent) > 0)
			<div class="nav-games-segment mb-20 d-flex flex-column">
				<div class="nav-section-header">PUBGM</div>
				@foreach ($itemEvent as $item)
					<a href="{{ url('events/'.$item->slug) }}" class="games-nav-tray-link scale-onclick">
						{{ $item->name }}
					</a>
				@endforeach
			</div>
			@elseif($key === 'lol' && count($itemEvent) > 0)
			<div class="nav-games-segment mb-20 d-flex flex-column">
				<div class="nav-section-header">League of Legends</div>
				@foreach ($itemEvent as $item)
					<a href="{{ url('events/'.$item->slug) }}" class="games-nav-tray-link scale-onclick">
						{{ $item->name }}
					</a>
				@endforeach
			</div>
			@endif
		@endforeach

	</div>
</section>

<section id="scrolled-nav">
	<div class="scroll-nav-item active scrolled-survey-btn @auth order-4 @else order-3 @endauth cursor-ptr" data-toggle="modal" data-target="#surveys">
		<img src="{{ asset('img/currencies/coin-survey.svg') }}" class="live-video-scrolled">
	</div>
	<div class="scroll-nav-item active scrolled-match-btn @auth order-3 @else order-2 @endauth cursor-ptr heartbeat">
		<img src="{{ asset('icons/live-fire-white.svg') }}" class="live-video-scrolled">
	</div>
	@auth
	<div class="scroll-nav-item active scrolled-quest-btn @auth order-2 @endauth cursor-ptr" data-toggle="modal" data-target="#my-quests">
		<img src="{{ asset('icons/award-white.svg') }}">
	</div>
	@endauth
	<div class="scroll-nav-item active scrolled-menu-btn order-1 cursor-ptr">
		<img src="{{ asset('icons/menu-white-jagged.svg') }}">
	</div>
</section>
<style type="text/css">
	.scroll-nav-item {
		display: none;
	}
	.scroll-nav-item.active {
		display: flex;
	}
	.nav-dot {
		position: absolute;
	    right: -2px;
	    top: -1px;
	    width: 14px;
	    height: 14px;
	    border-radius: 100px;
	    background: rgb(233 33 90 / 100%);
	    border: 2px solid rgb(255 255 255);
	    opacity: 0.9;
	}
	.video-menu-button .nav-dot {
	    right: 3px;
        top: 2px;
	}
	.heartbeat {
		-webkit-animation: heartbeat 1.5s ease-in-out infinite both;
        animation: heartbeat 1.5s ease-in-out infinite both;
	}
	@-webkit-keyframes heartbeat {
	  from {
	    -webkit-transform: scale(1);
	            transform: scale(1);
	    -webkit-transform-origin: center center;
	            transform-origin: center center;
	    -webkit-animation-timing-function: ease-out;
	            animation-timing-function: ease-out;
	  }
	  10% {
	    -webkit-transform: scale(0.91);
	            transform: scale(0.91);
	    -webkit-animation-timing-function: ease-in;
	            animation-timing-function: ease-in;
	  }
	  17% {
	    -webkit-transform: scale(0.98);
	            transform: scale(0.98);
	    -webkit-animation-timing-function: ease-out;
	            animation-timing-function: ease-out;
	  }
	  33% {
	    -webkit-transform: scale(0.87);
	            transform: scale(0.87);
	    -webkit-animation-timing-function: ease-in;
	            animation-timing-function: ease-in;
	  }
	  45% {
	    -webkit-transform: scale(1);
	            transform: scale(1);
	    -webkit-animation-timing-function: ease-out;
	            animation-timing-function: ease-out;
	  }
	}
	@keyframes heartbeat {
	  from {
	    -webkit-transform: scale(1);
	            transform: scale(1);
	    -webkit-transform-origin: center center;
	            transform-origin: center center;
	    -webkit-animation-timing-function: ease-out;
	            animation-timing-function: ease-out;
	  }
	  10% {
	    -webkit-transform: scale(0.91);
	            transform: scale(0.91);
	    -webkit-animation-timing-function: ease-in;
	            animation-timing-function: ease-in;
	  }
	  17% {
	    -webkit-transform: scale(0.98);
	            transform: scale(0.98);
	    -webkit-animation-timing-function: ease-out;
	            animation-timing-function: ease-out;
	  }
	  33% {
	    -webkit-transform: scale(0.87);
	            transform: scale(0.87);
	    -webkit-animation-timing-function: ease-in;
	            animation-timing-function: ease-in;
	  }
	  45% {
	    -webkit-transform: scale(1);
	            transform: scale(1);
	    -webkit-animation-timing-function: ease-out;
	            animation-timing-function: ease-out;
	  }
	}
	#scrolled-nav {
		display: none;
	}
	#scrolled-nav.active {
		display: block;
	}


	.scrolled-menu-btn {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 44px;
		height: 44px;
		padding: 9px;
		border-radius: 100px;
		position: absolute;
		top: 15px;
		position: fixed;
		background: linear-gradient(180deg, rgba(233,30,99,1) 0%, #ad1457 100%);
		box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2);
		transform: scaleX(-1);
		border: 3px solid #ffffffcc;
	}
	.scrolled-menu-btn img {
		width: 100%;
		opacity: 0.9;
	}


	.scrolled-match-btn {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 44px;
		height: 44px;
		padding: 9px;
		border-radius: 100px;
		position: absolute;
		top: 15px;
		position: fixed;
		background: linear-gradient(180deg, rgba(233,30,99,1) 0%, #ad1457 100%);
		box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2);
		border: 3px solid #ffffffcc;
	}
	.scrolled-match-btn img {
		width: 100%;
	}


	.scrolled-survey-btn {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 44px;
		height: 44px;
		padding: 9px;
		border-radius: 100px;
		position: absolute;
		top: 15px;
		position: fixed;
		background: linear-gradient(180deg, #9c27b0 0%, #3f51b5 100%);
		box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2);
		border: 3px solid #ffffffcc;
	}
	.scrolled-survey-btn img {
		width: 100%;
	}


	.scrolled-quest-btn {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 44px;
		height: 44px;
		padding: 9px;
		border-radius: 100px;
		position: absolute;
		top: 15px;
		position: fixed;
		background: linear-gradient(180deg, rgba(233,30,99,1) 0%, #ad1457 100%);
		box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2);
		border: 3px solid #ffffffcc;
	}
	.scrolled-quest-btn img {
		width: 100%;
	}

	#scrolled-nav .order-1 {
		right: 15px;
    	top: 15px;
	}
	#scrolled-nav .order-2 {
		right: 70px;
    	top: 15px;
	}
	#scrolled-nav .order-3 {
		right: 125px;
    	top: 15px;
	}
	@media (min-width: 900px) {
		#scrolled-nav .order-1 {
			right: 45px;
	    	top: 28px;
		}
		#scrolled-nav .order-2 {
	    	right: 100px;
	    	top: 28px;
		}
		#scrolled-nav .order-3 {
	    	right: 155px;
	    	top: 28px;
		}
		#scrolled-nav .order-4 {
	    	right: 210px;
	    	top: 28px;
		}
	}
</style>
<style type="text/css">
	.nav-section-header {
		padding: 6px 20px;
	    font-family: rajdhani-bold;
	    opacity: 0.5;
	}
	.nav-wedge {
		padding: 25px;
	}
	.nav-wedge hr {
		margin: 0;
		border-top: 1px solid rgba(255 255 255 / 0.2);
	}
	#nav-tray {
		position: fixed;
		right: 0;
		top: 0;
		height: 100%;
		width: 300px;
		background: #26184D;
		background-image: linear-gradient(#E91E63, #880e4f);
		transform: translate(200%,0);
		transition: all 0.1s ease-in-out;
		padding: 0 0 70px 0;
		overflow-y: auto;
	}
	#nav-tray.guest {
		padding: 70px 0 70px 0;
	}
	#nav-tray.active {
		transform: translate(0,0);
	}

	.nav-tray-close {
		position: absolute;
	    right: 15px;
	    top: 19px;
	    background: rgb(255 255 255 / 20%);
	    border-radius: 50px;
	    width: 44px;
	    height: 44px;
	}
	.nav-tray-close:hover {
	    background: rgb(255 255 255 / 30%);
	}
	.nav-tray-close:active {
	    background: rgb(255 255 255 / 50%);
	}
	.nav-tray-close .icon {
	    opacity: 0.9;
	    height: 20px;
	    width: 20px;
	}

	.nav-tray-profile-link {
		position: absolute;
	    right: 70px;
	    top: 19px;
	    width: 30px;
	    background: rgb(255 255 255 / 20%);
	    border-radius: 50px;
	    width: 44px;
	    height: 44px;
	}
	.nav-tray-profile-link:hover {
	    background: rgb(255 255 255 / 30%);
	}
	.nav-tray-profile-link:active {
	    background: rgb(255 255 255 / 50%);
	}
	.nav-tray-profile-link .icon {
	    opacity: 0.9;
		height: 20px;
		width: 20px;
	}

	.nav-tray-link {
		padding: 10px 25px;
	    border-radius: 10px;
	    margin: 5px 10px;
	    position: relative;
	}
	a.nav-tray-link:hover,
	a.nav-tray-link:active,
	a.nav-tray-link:focus,
	a.nav-tray-link:visited {
		background: rgb(255 255 255 / 20%);
		color: rgb(255 255 255 / 100%);
	}

	.nav-tray-link .icon {
		width: 16px;
		position: relative;
		top: -2px;
		opacity: 0.5;
		margin-right: 14px;
	}
	.nav-helper {
		position: absolute;
		right: 15px;
		top: 50%;
		transform: translate(0,-50%);
		opacity: 0.5;
		transition: all 0.1s ease-in-out;
	}
	a.nav-tray-link:hover .nav-helper,
	a.nav-tray-link:active .nav-helper,
	a.nav-tray-link:focus .nav-helper,
	a.nav-tray-link:visited .nav-helper {
		opacity: 0.9;
	}



	#games-tray {
		position: fixed;
		right: 0;
		top: 0;
		height: 100%;
		width: 300px;
		background: #26184D;
		background-image: linear-gradient(#512DA8, #7B1FA2);
		transform: translate(200%,0);
		transition: all 0.1s ease-in-out;
		padding: 0 0 70px 0;
		overflow-y: auto;
	}
	#games-tray.active {
		transform: translate(0,0);
	}
	.games-nav-profile-inner {
		padding: 22px 35px 18px 20px;
	}
	.games-nav-tray-close {
		position: absolute;
	    right: 20px;
	    top: 21px;
	    width: 30px;
	    background: rgb(255 255 255 / 20%);
	    border-radius: 50px;
	    width: 35px;
        height: 35px;
	}
	.games-nav-tray-close:hover {
	    background: rgb(255 255 255 / 30%);
	}
	.games-nav-tray-close:active {
	    background: rgb(255 255 255 / 50%);
	}
	.games-nav-tray-close .icon {
	    opacity: 0.9;
	    height: 20px;
	    width: 20px;
	}
	.games-nav-tray-link {
	    padding: 14px 20px;
	    border-radius: 10px;
	    margin: 5px 20px;
	    position: relative;
	    background: rgb(255 255 255 / 0.1);
	    font-size: 14px;
	}
	.games-nav-tray-link.live {
	    /*background: rgb(233 30 99 / 1);*/
	}
	.scrolled-match-btn img.live-video-scrolled {
		width: 120%;
	    height: 120%;
	    position: relative;
	    top: -2px;
	}
</style>
