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
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Account Number</th>
                                            <th>User Detail</th>
                                            <th>Grants</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $user->account_number }}</td>
                                                <td>
                                                    <table class="table-detail">
                                                        <tr>
                                                            <td><b>Name</b></td>
                                                            <td><span>:</span>{{ $user->username }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Email</b></td>
                                                            <td><span>:</span>{{ $user->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Address</b></td>
                                                            <td><span>:</span>{{ $user->address }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Phone</b></td>
                                                            <td><span>:</span>{{ $user->phone }}</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <table class="table-detail">
                                                        Menu {{ ucwords(strtolower($user->grants->first()->menus->name)) }}
                                                        @foreach ($user->grants as $item)
                                                            <li><b>{{ ucwords(strtolower($item->name)) }}</b></li>
                                                        @endforeach
                                                    </table>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.staffs.edit', ['id' => $user->id]) }}" class="btn btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                                    {{-- <a href="#" class="btn btn-danger" data-url="{{ "><i class="fas fa-fw fa-trash"></i></a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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

            alert(type);

            $('.'+type).addClass('active');

        })
    </script>
@endsection