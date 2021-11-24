<div class="left">
	<div class="propic">
		<div class="propic-change-wrapper">
			<input type="file" class="avatar-upload" style="display:none"> 
			<!-- <button class="propic-change">Change Avatar <i data-feather="edit" class="icon"></i></button> -->
		</div>
	</div>
	<a href="{{ url('profile') }}" class="{{ Request::is('profile') || Request::is('profile/edit') ? 'active' : '' }}">
		<i data-feather="user" class="icon"></i>Profil Saya
	</a>
	<!-- <a href="{{ url('profile/transaction?name=lp') }}" class="{{ Request::is('profile/transaction') && app('request')->input('name') === 'lp' ? 'active' : '' }}">
		<img src="{{ asset('img/currencies/lp.svg') }}" class="curr-icon">Transaksi LP
	</a>
	<a href="{{ url('profile/transaction?name=bp') }}" class="{{ Request::is('profile/transaction') && app('request')->input('name') === 'bp' ? 'active' : '' }}">
		<img src="{{ asset('img/currencies/bp.svg') }}" class="curr-icon">Transaksi BP
	</a> -->
	<a href="{{ url('profile/system-mail') }}">
		<i data-feather="mail" class="icon"></i>System Mail
	</a>
	<a href="{{ url('profile/backpack') }}" class="{{ Request::is('profile/backpack') ? 'active' : '' }}">
		<i data-feather="shopping-bag" class="icon"></i>Backpack
	</a>
	<a href="{{ url('sign-out') }}">
		<i data-feather="log-out" class="icon"></i>Log Out
	</a>
</div>



<style type="text/css">
	/*
		shared css for profile pages
	*/
	.profile-wrapper {
		display: flex;
		background: rgba(0,0,0,0.4);
	}
	.profile-wrapper .left {
		width: 225px;
		border-right: 1px solid rgba(255,255,255,0.1);
	}
	.profile-wrapper .left .propic {
		width: 225px;
		height: 225px;
		background-image: url("<?php echo asset('img/avatars/1.jpg'); ?>");
		background-size: cover;
		background-position: center;
		position: relative;
	}
	.propic-change-wrapper {
		position: absolute;
		display: flex;
		height: 100%;
		width: 100%;
		align-items: center;
		justify-content: center;
	}
	.propic-change {
		background: rgba(0,0,0,0.6);
		border-radius: 50px;
		padding: 7px 18px;
		line-height: initial;
		margin-top: auto;
		margin-bottom: 20px;
		cursor: pointer;
		border: 0px;
	    color: #fff;
	}
	.propic-change:hover {
		background: rgba(0,0,0,0.8);
	}
	.propic-change .icon {
		width: 13px;
	    height: 14px;
	    position: relative;
	    top: -2px;
	    margin-left: 4px;
	    opacity: 0.5;
	}
	.profile-wrapper .left a {
		display: block;
		width: 100%;
		padding: 15px 20px;
		color: #ffffffdd;
		border-bottom: 1px solid rgba(255,255,255,0.1);
	}
	.profile-wrapper .left a:hover,
	.profile-wrapper .left a.active {
		background: rgba(255,0,87,0.8);
	}
	.profile-wrapper .left a .icon {
		width: 16px;
		margin-right: 12px;
		position: relative;
	    top: -2px;
	}
	.profile-wrapper .left a .curr-icon {
		width: 16px;
		margin-right: 12px;
	}

	.profile-wrapper .right {
		color: white;
		width: 100%;
	}
</style>