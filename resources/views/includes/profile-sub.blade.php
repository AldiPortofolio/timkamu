<div class="profile-sub-container">
	<a href="{{ url('profile') }}" class="profile-sub-item {{ Request::is('profile') ? 'active' : '' }}">My Information</a>
	<a href="{{ url('profile/edit?type=profile') }}" class="profile-sub-item {{ (Request::is('profile/edit') && (app('request')->input('type') === 'profile')) ? 'active' : '' }}">Change Password</a>
</div>

<style type="text/css">
	.profile-sub-container {
		display: flex;
	}
	.profile-sub-item {
	    flex: 1 1 50%;
	    display: block;
	    line-height: 60px;
	    text-align: center;
	    color: #ffffffaa;
	    background: rgba(0,0,0,0.4);
	    font-weight: 800;
	    font-size: 12px;
    	font-family: 'Nunito Sans';
		border-right: 1px solid rgba(255,255,255,0.1);
		border-bottom: 1px solid rgba(255,255,255,0.1);
	}
	.profile-sub-item:hover {
	    background: rgba(0,0,0,0.2);
	    color: #ffffff;
	}
	.profile-sub-item.active {
		border-right: 0px;
	    background: rgba(0,0,0,0);
	    color: #ffffff;
	}
</style>