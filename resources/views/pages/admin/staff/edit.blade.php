@extends('layouts.admin.app')

@section('content')
<style>
    .event, .transaction {
        display: none;
    }

    .event.active, .transaction.active {
        display: flex;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 mt-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Staff</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5>Add New Staff</h5> <br>
                            <form action="{{ route('admin.staffs.update', ['id' => $staff->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PATCH">
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="name" id="name" placeholder="Name" value="{{ $staff->username }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{ $staff->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <label for="address">Address</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="address" id="address" placeholder="Address" value="{{ $staff->address }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <label for="phone">Phone</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone Number" value="{{ $staff->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <label for="menu">Menu</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <select name="menu_id" id="menu" class="form-control">
                                                <option selected disabled>Choose Menu</option>
                                                @if(Auth::guard('admin')->user()->role_id === 1)
                                                <option value="1" @if($staff_menu_grants[0]->menu_id === 1) selected @endif>Admin</option>
                                                @endif
                                                <option value="2" data-type="event" @if($staff_menu_grants[0]->menu_id === 2) selected @endif>Event</option>
                                                <option value="3" data-type="transaction" @if($staff_menu_grants[0]->menu_id === 3) selected @endif>Transaction</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row event transaction @if($staff_menu_grants[0]->menu_id !== 1) active @endif">
                                    <div class="col-lg-3">
                                        <label>Access Grants</label>
                                    </div>
                                    <div class="col-lg-6 access-grants event @if($staff_menu_grants[0]->menu_id === 2) active @endif">
                                        <div class="form-group" style="padding-top: 10px;">
                                            <input type="checkbox" id="grants_event_1" name="grants[]" value="create" @if($staff_menu_grants->where('name', 'CREATE')->first()) checked @endif>
                                            <label for="grants_event_1" style="margin-right: 10px"> Create</label>
                                            <input type="checkbox" id="grants_event_2" name="grants[]" value="update" @if($staff_menu_grants->where('name', 'UPDATE')->first()) checked @endif>
                                            <label for="grants_event_2" style="margin-right: 10px"> Update</label>
                                            <input type="checkbox" id="grants_event_3" name="grants[]" value="delete" @if($staff_menu_grants->where('name', 'DELETE')->first()) checked @endif>
                                            <label for="grants_event_3" style="margin-right: 10px"> Delete</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 access-grants transaction @if($staff_menu_grants[0]->menu_id === 3) active @endif">
                                        <div class="form-group" style="padding-top: 10px;">
                                            <input type="checkbox" id="grants_transaction_1" name="grants[]" value="view" @if($staff_menu_grants->where('name', 'VIEW')->first()) checked @endif>
                                            <label for="grants_transaction_1" style="margin-right: 10px"> View</label>
                                            <input type="checkbox" id="grants_transaction_2" name="grants[]" value="approve" @if($staff_menu_grants->where('name', 'APPROVE')->first()) checked @endif>
                                            <label for="grants_transaction_2" style="margin-right: 10px"> Approve</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-1 align-items-end">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-fw fa-plus"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#menu').on('change', function(e) {
            e.preventDefault();
            
            var type = $(this).find(':selected').attr('data-type');

            if($('.access-grants').hasClass('active')) {
                $('.access-grants').removeClass('active');
            }

            $('.'+type).addClass('active');

        })
    </script>
@endsection