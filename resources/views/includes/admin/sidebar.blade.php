<section id="sidebar">

    <div class="sidebar-logo">
        TimKamu<span class="o3">.com</span>
    </div>

    <div class="sidebar-link {{ Request::is('admin-tkmu') ? 'active' : '' }}">
        <a href="{{ url('admin-tkmu') }}">
            <i data-feather="home" class="icon"></i>
            Dashboard
        </a>
    </div>

    <div class="sidebar-link has-descendants
        {{
            Request::is('admin-tkmu/events') ||
            Request::is('admin-tkmu/events/*') ||
            Request::is('admin-tkmu/reports') ||
            Request::is('admin-tkmu/reports/*') ||
            Request::is('admin-tkmu/report-participants')
            ? 'active' : ''
        }}
    ">
        <a href="#">
            <i data-feather="airplay" class="icon"></i>
            <i data-feather="chevron-right" class="cue"></i>
            Events
        </a>
        <div class="sidebar-sub">
            <a class="{{ (Request::is('admin-tkmu/events') || Request::is('admin-tkmu/events/*')) && !Request::is('admin-tkmu/events/create') ? 'active' : '' }}" href="{{ url('admin-tkmu/events') }}">List</a>
            <a class="{{ Request::is('admin-tkmu/events/create') ? 'active' : '' }}" href="{{ url('admin-tkmu/events/create') }}">Create</a>
            <a class="{{ Request::is('admin-tkmu/reports/*') ? 'active' : '' }}" href="#" data-toggle="modal" data-target="#event-performance-select-modal">Event Performance</a>
            <a class="{{ Request::is('admin-tkmu/report-participants') ? 'active' : '' }}" href="#" data-toggle="modal" data-target="#event-betters-select-modal">Event Participants</a>
            <a class="{{ Request::is('admin-tkmu/reports') ? 'active' : '' }}" href="{{ url('admin-tkmu/reports') }}">Event Performance Range</a>
        </div>
    </div>

    <div class="sidebar-link has-descendants
        {{
            Request::is('admin-tkmu/users') ||
            Request::is('admin-tkmu/users/*') ||
            Request::is('admin-tkmu/users-overview') ||
            Request::is('admin-tkmu/users-traffics') ||
            Request::is('admin-tkmu/transactions-historical-member')
            ? 'active' : ''
        }}
    ">
        <a href="#">
            <i data-feather="users" class="icon"></i>
            <i data-feather="chevron-right" class="cue"></i>
            Members
        </a>
        <div class="sidebar-sub">
            <a class="{{ Request::is('admin-tkmu/users') ? 'active' : '' }}" href="{{ url('admin-tkmu/users') }}">List</a>
            <a class="{{ Request::is('admin-tkmu/users-overview') ? 'active' : '' }}" href="{{ url('admin-tkmu/users-overview') }}">Overview</a>
            <a class="{{ Request::is('admin-tkmu/transactions-historical-member') ? 'active' : '' }}" href="{{ url('admin-tkmu/transactions-historical-member') }}">Historical</a>
            <a class="{{ Request::is('admin-tkmu/users-traffics') ? 'active' : '' }}" href="{{ url('admin-tkmu/users-traffics') }}">Trafic</a>
        </div>
    </div>

    <div class="sidebar-link has-descendants
        {{ Request::is('admin-tkmu/lp-transaction') ? 'active' : '' }}
        {{ Request::is('admin-tkmu/lp-recharge') ? 'active' : '' }}
        {{ Request::is('admin-tkmu/lp-transaction-member') ? 'active' : '' }}
        {{ Request::is('admin-tkmu/lp-circulation') ? 'active' : '' }}
    ">
        <a href="#">
            <i data-feather="dollar-sign" class="icon"></i>
            <i data-feather="chevron-right" class="cue"></i>
            Loyalty Points
        </a>
        <div class="sidebar-sub">
            <a class="{{ Request::is('admin-tkmu/lp-transaction') ? 'active' : '' }}" href="{{ url('admin-tkmu/lp-transaction') }}">Monthly Transactions</a>
            <a class="{{ Request::is('admin-tkmu/lp-transaction-member') ? 'active' : '' }}" href="{{ url('admin-tkmu/lp-transaction-member') }}">Transactions per member</a>
            <a class="{{ Request::is('admin-tkmu/lp-recharge') ? 'active' : '' }}" href="{{ url('admin-tkmu/lp-recharge') }}">Recharge Report</a>
            <a class="{{ Request::is('admin-tkmu/lp-circulation') ? 'active' : '' }}" href="{{ url('admin-tkmu/lp-circulation') }}">Circulation Report</a>
        </div>
    </div>

    <div class="sidebar-link has-descendants
        {{ Request::is('admin-tkmu/transactions-overview') ||
           Request::is('admin-tkmu/transactions-volume') ||
           Request::is('admin-tkmu/transactions-member') ||
           Request::is('admin-tkmu/transactions-detail') ||
           Request::is('admin-tkmu/transactions/game') ||
           Request::is('admin-tkmu/transactions/pulsa') ||
           Request::is('admin-tkmu/transactions/token') ? 'active' : '' }}
    ">
        <a href="#">
            <i data-feather="dollar-sign" class="icon"></i>
            <i data-feather="chevron-right" class="cue"></i>
            Top Ups
        </a>
        <div class="sidebar-sub">
            <a href="{{ url('admin-tkmu/transactions-overview') }}" class="{{ Request::is('admin-tkmu/transactions-overview') ? 'active' : '' }}">Overview</a>
            <a href="{{ url('admin-tkmu/transactions-member?username=') }}" class="{{ Request::is('admin-tkmu/transactions-member') ? 'active' : '' }}">Top Ups Per Member</a>
            <a href="{{ url('admin-tkmu/transactions/game?status=pending') }}"
                class="{{ (Request::is('admin-tkmu/transactions/game') ||
                        app('request')->input('type') === 'mlbb' ||
                        app('request')->input('type') === 'freefire' ||
                        app('request')->input('type') === 'pubgm') ? 'active' : '' }}">
                Game Topup @if($total_game > 0)<span class="badge badge-secondary">{{ $total_game }}</span>@endif
            </a>
            <a href="{{ url('admin-tkmu/transactions/pulsa?status=pending') }}" class="{{ Request::is('admin-tkmu/transactions/pulsa') ? 'active' : '' }}">Isi Pulsa @if($total_pulsa > 0)<span class="badge badge-secondary">{{ $total_pulsa }}</span>@endif</a>
            <a href="{{ url('admin-tkmu/transactions/token?status=pending') }}" class="{{ Request::is('admin-tkmu/transactions/token') ? 'active' : '' }}">PLN Token @if($total_token > 0)<span class="badge badge-secondary">{{ $total_token }}</span>@endif</a>
        </div>
    </div>

    <div class="sidebar-link has-descendants
        {{ Request::is('admin-tkmu/stats') ? 'active' : '' }}
        {{ Request::is('admin-tkmu/quests') ? 'active' : '' }}
        {{ (Request::is('admin-tkmu/promos') || Request::is('admin-tkmu/promos/*')) ? 'active' : '' }}
        {{ (Request::is('/admin-tkmu/tournaments') || Request::is('/admin-tkmu/tournaments/*')) ? 'active' : '' }}
    ">
        <a href="#">
            <i data-feather="codepen" class="icon"></i>
            <i data-feather="chevron-right" class="cue"></i>
            Other data
        </a>
        <div class="sidebar-sub">
            <a href="{{ url('admin-tkmu/stats') }}" class="{{ Request::is('admin-tkmu/stats') ? 'active' : '' }}">Key Stats</a>
            <a href="{{ url('admin-tkmu/promos') }}"  class="{{ Request::is('admin-tkmu/promos') ? 'active' : '' }}">Promos</a>
            <a href="{{ url('admin-tkmu/quests') }}"  class="{{ Request::is('admin-tkmu/quests') ? 'active' : '' }}">Quests</a>
            <a href="{{ url('admin-tkmu/tournaments') }}" class="{{ Request::is('admin-tkmu/tournaments') || Request::is('admin-tkmu/tournaments/*') ? 'active' : '' }}">Tournaments</a>
        </div>
    </div>

    <div class="sidebar-link {{ Request::is('admin-tkmu/exports') ? 'active' : '' }}">
        <a href="/admin-tkmu/exports">
            <i data-feather="download" class="icon"></i>
            Data Export
        </a>
    </div>

    <div class="nav-wedge"></div>

    <div class="sidebar-link">
        <a href="#" data-toggle="modal" data-target="#search-user-by-username">
            <i data-feather="search" class="icon"></i>
            Search user
        </a>
    </div>

    <div class="sidebar-link">
        <a href="{{ route('admin.logout') }}">
            <i data-feather="log-out" class="icon"></i>
            Sign Out
        </a>
    </div>

</section>

<style type="text/css">
    #sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 220px;
        height: 100%;
        border-right: 1px solid rgb(0 0 0 / .125);
        background: rgb(255 255 255 / 1);
    }
    .sidebar-logo {
        padding: 20px 30px;
        font-weight: 700;
        font-size: 20px;
    }
    .sidebar-link {
        position: relative;
        border-left: 4px solid #fff;
    }
    .sidebar-link.active,
    .sidebar-link:hover {
        border-left: 4px solid #00BCD4;
    }
    .sidebar-link > a {
        display: block;
        padding: 12px 30px 12px 52px;
    }
    .sidebar-link a.active {
        /*background: rgb(0 0 0 / .04);*/
    }
    .sidebar-link a:active,
    .sidebar-link a:focus,
    .sidebar-link a:hover {
        color: rgb(0 0 0 / 1);
    }
    .sidebar-link .icon {
        position: absolute;
        left: 28px;
        top: 11px;
        width: 14px;
        opacity: .3;
    }
    .sidebar-link .cue {
        position: absolute;
        right: 24px;
        top: 10px;
        width: 14px;
        opacity: 0.3;
        transition: all 0.1s ease-in-out;
    }
    .sidebar-link.active .cue {
        transform: rotate(90deg);
    }
    .sidebar-sub {
        background: rgb(0 0 0 / .04);
        display: none;
    }
    .sidebar-link.active .sidebar-sub {
        display: block;
    }
    .sidebar-sub > a {
        display: block;
        padding: 12px 30px 12px 52px;
    }
    .sidebar-sub > a.active,
    .sidebar-sub > a:hover {
        background: rgb(0 0 0 / .04);
    }
    .nav-wedge {
        height: 1px;
        background: rgb(0 0 0 / .075);
        margin: 14px 0 10px 0;
    }
</style>
