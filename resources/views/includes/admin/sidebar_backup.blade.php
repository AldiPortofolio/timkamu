<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin-tkmu') }}">
        <img src="{{ asset('img/logo-emblem.svg?v=2') }}" class="sidebar-brand-logo"><div class="sidebar-brand-text"></div>
    </a>

    <hr class="sidebar-divider mt-2 mb-3">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin-tkmu') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin-tkmu') }}">
            <i data-feather="home" class="icon-sidebar"></i>
            <span>Dashboard</span>
        </a>
    </li>

    @if($role === 1 || $role === 2)
    <li class="nav-item {{ (Request::is('admin-tkmu/league-games') || Request::is('admin-tkmu/league-games/*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin-tkmu/league-games') }}">
            <i data-feather="grid" class="icon-sidebar"></i>
            <span>Leagues & Games</span>
        </a>
    </li>
    @endif

    @if($role === 1 || $role === 2 || $menu_grant === 'EVENT')
    <li class="nav-item {{ Request::is('admin-tkmu/items') ? 'active' : '' }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#sidebar-dropdown-events">
            <i data-feather="airplay" class="icon-sidebar"></i>
            <span>Events</span>
        </a>
        <div id="sidebar-dropdown-events" class="collapse">
            <div class="py-2 collapse-inner sidebar-dropdown-tray">
                <a class="collapse-item" href="{{ url('admin-tkmu/events') }}">Event Index</a>
                @if(($role === 1 || $role === 2) || $menu_permission->where('name', 'CREATE')->first())
                <a class="collapse-item" href="{{ url('admin-tkmu/events/create') }}">Create New</a>
                @endif
                @if(($role === 1 || $role === 2) || $menu_permission->where('name', 'UPDATE')->first()) 
                <a class="collapse-item" href="#" data-toggle="modal" data-target="#event-update-id-selection">Update</a>
                @endif
            </div>
        </div>
    </li>
    @endif


    @if($role === 1 || $role === 2)
    <li class="nav-item {{ Request::is('admin-tkmu/items') ? 'active' : '' }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#sidebar-dropdown-reports">
            <i data-feather="box" class="icon-sidebar"></i>
            <span>Reports</span>
        </a>
        <div id="sidebar-dropdown-reports" class="collapse">
        <div class="py-2 collapse-inner sidebar-dropdown-tray">
            <a class="collapse-item" href="#" data-toggle="modal" data-target="#event-performance-per-event">Event Performance</a>
            <a class="collapse-item" href="#" data-toggle="modal" data-target="#event-performance-date-range">Event Performance Range</a>
        </div>
        </div>
    </li>
    @endif

    @if($role === 1 || $role === 2 || $menu_grant === 'TRANSACTION')
    <li class="nav-item {{ Request::is('admin-tkmu/transactions') || Request::is('admin-tkmu/transactions/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin-tkmu/transactions?status=paid') }}">
            <i data-feather="repeat" class="icon-sidebar"></i>
            <span>Top-Up Transactions</span>
        </a>
    </li>
    @endif

    <hr class="sidebar-divider mt-3 mb-3">

    @if($role === 1 || $role === 2)
    <li class="nav-item {{ (Request::is('admin-tkmu/staffs') || Request::is('admin-tkmu/staffs/*')) ? 'active' : '' }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#sidebar-dropdown-staffs">
            <i data-feather="airplay" class="icon-sidebar"></i>
            <span>Staffs</span>
        </a>
        <div id="sidebar-dropdown-staffs" class="collapse">
            <div class="py-2 collapse-inner sidebar-dropdown-tray">
                <a class="collapse-item" href="{{ url('admin-tkmu/staffs') }}">Staff Index</a>
                <a class="collapse-item" href="{{ url('admin-tkmu/staffs/create')}}">Create New</a>
                <a class="collapse-item" href="#" data-toggle="modal" data-target="#staff-update-selection">Update</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::is('admin-tkmu/items') ? 'active' : '' }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#sidebar-dropdown-items">
            <i data-feather="box" class="icon-sidebar"></i>
            <span>Items</span>
        </a>
        <div id="sidebar-dropdown-items" class="collapse {{ app('request')->input('name') !== null ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner sidebar-dropdown-tray">
            <a class="collapse-item {{ app('request')->input('name') === 'general' ? 'active' : '' }}" href="{{ url('admin-tkmu/items?name=general') }}">General</a>
            <a class="collapse-item {{ app('request')->input('name') === 'mlbb' ? 'active' : '' }}" href="{{ url('admin-tkmu/items?name=mlbb') }}">MLBB</a>
            <a class="collapse-item {{ app('request')->input('name') === 'freefire' ? 'active' : '' }}" href="{{ url('admin-tkmu/items?name=freefire') }}">Free Fire</a>
            <a class="collapse-item {{ app('request')->input('name') === 'pubgm' ? 'active' : '' }}" href="{{ url('admin-tkmu/items?name=pubgm') }}">PUBGM</a>
            <a class="collapse-item {{ app('request')->input('name') === 'telkomsel' ? 'active' : '' }}" href="{{ url('admin-tkmu/items?name=telkomsel') }}">Telkomsel</a>
            <a class="collapse-item {{ app('request')->input('name') === 'xl' ? 'active' : '' }}" href="{{ url('admin-tkmu/items?name=xl') }}">XL</a>
            <a class="collapse-item {{ app('request')->input('name') === 'tri' ? 'active' : '' }}" href="{{ url('admin-tkmu/items?name=tri') }}">TRI</a>
            <a class="collapse-item {{ app('request')->input('name') === 'token' ? 'active' : '' }}" href="{{ url('admin-tkmu/items?name=token') }}">Token PLN</a>
        </div>
        </div>
    </li>

    <li class="nav-item {{ (Request::is('admin-tkmu/users') || Request::is('admin-tkmu/users/*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin-tkmu/users') }}">
            <i data-feather="user" class="icon-sidebar"></i>
            <span>User</span>
        </a>
    </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.logout') }}">
            <i data-feather="log-out" class="icon-sidebar"></i>
            <span>Log out</span>
        </a>
    </li>

    
</ul>
<!-- End of Sidebar -->


<!-- sidebar modals -->
<div class="sidebar-modals">
    <div class="modal" tabindex="-1" role="dialog" id="event-performance-per-event">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Event Performance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Enter event ID</label>
                        <input type="number" name="event_id" id="ep_event_id" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sbmt-epbyid">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="event-performance-date-range">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Event Performance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Enter start date</label>
                        <input type="date" name="start_date" id="ep_filter_startdate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Enter end date</label>
                        <input type="date" name="end_date" id="ep_filter_enddate" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sbmt-epbyfltr">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="event-update-id-selection">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Enter event ID</label>
                        <input type="number" name="awdawd" id="awdawd" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sbmt-uebyid">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="staff-update-selection">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Choose staff</label>
                        <select class="form-control select2-show-search" name="staff_id" id="staff_id">
                            <option selected disabled>Choose staff</option>
                            @foreach ($data_staff as $item)
                                <option value="{{ $item->id }}">{{ $item->username }}</option>
                            @endforeach
                        </select>
                        <span id="error-msg-staff" style="display: none; color: red">*Pilih salah satu staff</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sbmt-usbynm">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>