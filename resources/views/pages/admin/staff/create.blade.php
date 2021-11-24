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
                            <form action="{{ route('admin.staffs.store') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <label for="address">Address</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="address" id="address" placeholder="Address" value="{{ old('address') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <label for="phone">Phone</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone Number" value="{{ old('phone') }}">
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
                                                <option value="1">Admin</option>
                                                @endif
                                                <option value="2" data-type="event">Event</option>
                                                <option value="3" data-type="transaction">Transaction</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row event transaction">
                                    <div class="col-lg-3">
                                        <label>Access Grants</label>
                                    </div>
                                    <div class="col-lg-6 access-grants event">
                                        <div class="form-group" style="padding-top: 10px;">
                                            <input type="checkbox" id="grants_event_1" name="grants[]" value="create">
                                            <label for="grants_event_1" style="margin-right: 10px"> Create</label>
                                            <input type="checkbox" id="grants_event_2" name="grants[]" value="update">
                                            <label for="grants_event_2" style="margin-right: 10px"> Update</label>
                                            <input type="checkbox" id="grants_event_3" name="grants[]" value="delete">
                                            <label for="grants_event_3" style="margin-right: 10px"> Delete</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 access-grants transaction">
                                        <div class="form-group" style="padding-top: 10px;">
                                            <input type="checkbox" id="grants_transaction_1" name="grants[]" value="view">
                                            <label for="grants_transaction_1" style="margin-right: 10px"> View</label>
                                            <input type="checkbox" id="grants_transaction_2" name="grants[]" value="approve">
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