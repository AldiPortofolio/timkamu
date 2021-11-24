<section id="sidebar">

    <div class="sidebar-logo">
        TimKamu<span class="o3">.com</span>
    </div>

    <div class="sidebar-link {{ Request::is('admin2/dashboard') ? 'active' : '' }}">
        <a href="/admin2/dashboard">
            <i data-feather="home" class="icon"></i>
            Dashboard
        </a>
    </div>

    <div class="sidebar-link has-descendants
        {{ Request::is('admin2/event-index') ? 'active' : '' }}
        {{ Request::is('admin2/event-view') ? 'active' : '' }}
        {{ Request::is('admin2/event-create') ? 'active' : '' }}
        {{ Request::is('admin2/event-betters') ? 'active' : '' }}
        {{ Request::is('admin2/event-performance') ? 'active' : '' }}
        {{ Request::is('admin2/event-performance-range') ? 'active' : '' }}
    ">
        <a href="#">
            <i data-feather="airplay" class="icon"></i>
            <i data-feather="chevron-right" class="cue"></i>
            Events
        </a>
        <div class="sidebar-sub">
            <a class="{{ Request::is('admin2/event-index') ? 'active' : '' }}" href="/admin2/event-index">List</a>
            <a class="{{ Request::is('admin2/event-create') ? 'active' : '' }}" href="/admin2/event-create">Create</a>
            <a class="{{ Request::is('admin2/event-performance') ? 'active' : '' }}" href="#" data-toggle="modal" data-target="#event-performance-select-modal">Event Performance</a>
            <a class="{{ Request::is('admin2/event-betters') ? 'active' : '' }}" href="#" data-toggle="modal" data-target="#event-betters-select-modal">Event Participants</a>
            <a class="{{ Request::is('admin2/event-performance-range') ? 'active' : '' }}" href="/admin2/event-performance-range">Event Performance Range</a>
        </div>
    </div>

    <div class="sidebar-link has-descendants
        {{ Request::is('admin2/member-index') ? 'active' : '' }}
        {{ Request::is('admin2/member-view') ? 'active' : '' }}
        {{ Request::is('admin2/report-member-overview') ? 'active' : '' }}
        {{ Request::is('admin2/member-historical') ? 'active' : '' }}
    ">
        <a href="#">
            <i data-feather="users" class="icon"></i>
            <i data-feather="chevron-right" class="cue"></i>
            Members
        </a>
        <div class="sidebar-sub">
            <a class="{{ Request::is('admin2/member-index') ? 'active' : '' }}" href="/admin2/member-index">List</a>
            <a class="{{ Request::is('admin2/report-member-overview') ? 'active' : '' }}" href="/admin2/report-member-overview">Overview</a>
            <a class="{{ Request::is('admin2/member-historical') ? 'active' : '' }}" href="/admin2/member-historical">Historical</a>
        </div>
    </div>

    <div class="sidebar-link has-descendants
        {{ Request::is('admin2/report-lp') ? 'active' : '' }}
        {{ Request::is('admin2/report-lp-transactions') ? 'active' : '' }}
        {{ Request::is('admin2/report-lp-circulation') ? 'active' : '' }}
        {{ Request::is('admin2/report-lp-per-member') ? 'active' : '' }}
    ">
        <a href="#">
            <i data-feather="dollar-sign" class="icon"></i>
            <i data-feather="chevron-right" class="cue"></i>
            Loyalty Points
        </a>
        <div class="sidebar-sub">
            <a class="{{ Request::is('admin2/report-lp-transactions') ? 'active' : '' }}" href="/admin2/report-lp-transactions">Monthly Transactions</a>
            <a class="{{ Request::is('admin2/report-lp-per-member') ? 'active' : '' }}" href="/admin2/report-lp-per-member">Transactions per member</a>
            <a class="{{ Request::is('admin2/report-lp') ? 'active' : '' }}" href="/admin2/report-lp">Recharge Report</a>
            <a class="{{ Request::is('admin2/report-lp-circulation') ? 'active' : '' }}" href="/admin2/report-lp-circulation">Circulation Report</a>
        </div>
    </div>

    <div class="sidebar-link has-descendants
        {{ Request::is('admin2/report-topups') ? 'active' : '' }}
        {{ Request::is('admin2/report-overview') ? 'active' : '' }}
        {{ Request::is('admin2/topup-overview') ? 'active' : '' }}
        {{ Request::is('admin2/topup-per-member') ? 'active' : '' }}
    ">
        <a href="#">
            <i data-feather="dollar-sign" class="icon"></i>
            <i data-feather="chevron-right" class="cue"></i>
            Top Ups
        </a>
        <div class="sidebar-sub">
            <a href="/admin2/topup-overview" class="{{ Request::is('admin2/topup-overview') ? 'active' : '' }}">Overview</a>
            <a href="/admin2/topup-per-member" class="{{ Request::is('admin2/topup-per-member') ? 'active' : '' }}">Topups per member</a>
            <a href="/admin2/report-topups">Game Topup <span class="badge badge-secondary">15</span></a>
            <a href="/admin2/report-topups">Isi Pulsa <span class="badge badge-secondary">22</span></a>
            <a href="/admin2/report-topups">PLN Token <span class="badge badge-secondary">1</span></a>
        </div>
    </div>

    <div class="sidebar-link has-descendants
        {{ Request::is('admin2/stats') ? 'active' : '' }}
        {{ Request::is('admin2/promo-index') ? 'active' : '' }}
        {{ Request::is('admin2/quests') ? 'active' : '' }}
        {{ Request::is('admin2/tournament-index') ? 'active' : '' }}
    ">
        <a href="#">
            <i data-feather="codepen" class="icon"></i>
            <i data-feather="chevron-right" class="cue"></i>
            Other data
        </a>
        <div class="sidebar-sub">
            <a class="{{ Request::is('/admin2/stats') ? 'active' : '' }}" href="/admin2/stats">Key Stats</a>
            <a class="{{ Request::is('/admin2/promo-index') ? 'active' : '' }}" href="/admin2/promo-index">Promos</a>
            <a class="{{ Request::is('/admin2/quests') ? 'active' : '' }}" href="/admin2/quests">Quests</a>
            <a class="{{ Request::is('/admin2/tournament-index') ? 'active' : '' }}" href="/admin2/tournament-index">Tournaments</a>
        </div>
    </div>

    <div class="sidebar-link {{ Request::is('admin2/exports') ? 'active' : '' }}">
        <a href="/admin2/exports">
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
        <a href="#">
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
        font-size: 26px;
        font-family: 'Rajdhani-Bold';
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