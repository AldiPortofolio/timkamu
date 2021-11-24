@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <style>
        .input-value, .preview-value, .btn-action.btn-edit, .btn-action-update.btn-save, .btn-action-update.btn-cancel {
            display: none;
        }

        .input-value.active, .preview-value.active, .btn-action.btn-edit.active, .btn-action-update.btn-save.active, .btn-action-update.btn-cancel.active {
            display: inline-flex;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10">
                            <h6 class="m-0 font-weight-bold text-primary">Items</h6>
                        </div>
                        @if($shop)
                        <div class="col-lg-2 text-right">
                            <a href="@if($shop->active === '1')#@else{{ url('admin-tkmu/update-shop/'.$itcat) }}@endif" class="btn btn-block {{ ($shop->active === '0') ? 'btn-success' : 'btn-danger' }}" @if($shop->active === '1') data-toggle="modal" data-target="#close-shop" @endif>{{ ($shop->active === '0') ? 'Open Shop' : 'Close Shop'}}</a>
                            {{-- <a href="#" class="btn btn-block btn-success">Open</a> --}}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    {{-- @if($itcat !== 'general')
                    <div class="row">
                        <div class="col-lg-12">
                            <h5>Add New Item for {{ $itcat === 'freefire' ? 'Free Fire' : strtoupper($itcat) }}</h5> <br>
                            <form action="{{ route('admin.items.create') }}" method="post">
                                @csrf
                                <input type="hidden" name="type" value="{{ $itcat }}">
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="name" id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <select name="type" id="type" class="form-control">
                                                <option selected disabled>Choose Currencies</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="value" id="value" placeholder="Value">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 align-items-end">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-fw fa-plus"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr class="divider">
                    @endif --}}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Value</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $idx = 0;
                                        @endphp
                                        @foreach ($items as $key => $it)
                                            @foreach ($it as $item)
                                                <tr>
                                                    <td>{{ ++$idx }}</td>
                                                    <td>
                                                        <span class="preview-value name active">{{ $item->childs->name }}</span>
                                                        <input class="input-value name form-control" type="text" name="name" value="{{ $item->childs->name }}" readonly>
                                                    </td>
                                                    <td>
                                                        <span class="preview-value value active"><span class="text-value">{{ number_format($item->value, 0, '.', ',') }}</span>&nbsp;{{ $item->parents->name }}</span>
                                                        <input class="input-value value form-control" type="number" name="value" value="{{ $item->value }}" readonly>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="btn btn-action btn-edit btn-warning active"><i class="fas fa-fw fa-edit"></i></a>

                                                        <a href="#" class="btn btn-primary btn-action-update btn-save" data-id="{{ $item->id }}"><i class="fas fa-fw fa-check"></i></a>
                                                        <a href="#" class="btn btn-secondary btn-action-update btn-cancel"><i class="fas fa-fw fa-times"></i></a>

                                                        <a href="{{ url('admin-tkmu/update-shop/'.$itcat.'?id='.$item->id) }}" class="btn @if($item->childs->active === '0') btn-danger @else btn-success @endif active" style="display: inline-flex"><i class="fas fa-fw @if($item->childs->active === '0') fa-lock @else fa-unlock @endif"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
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

    <div class="modal" tabindex="-1" role="dialog" id="close-shop">
        <div class="modal-dialog" role="document">
            <form action="{{ url('admin-tkmu/update-shop/'.$itcat) }}" method="get">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Close Shop</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Reasons</label>
                            <input type="text" name="reason" id="reason_shop" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Open Date</label>
                            <input type="datetime-local" name="open_date" id="opend_shop" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
@endsection

@section('js')
    <script>
        $('.btn-action.btn-edit').on('click', function(e) {
            e.preventDefault();
            
            $(this).closest('tr').find('.btn-action-update.btn-save').addClass('active');
            $(this).closest('tr').find('.btn-action-update.btn-cancel').addClass('active');
            $(this).closest('tr').find('.input-value').addClass('active');
            $(this).closest('tr').find('.input-value').prop('readonly', false);

            $(this).removeClass('active');
            $(this).closest('tr').find('.preview-value').removeClass('active');
        });

        $('.btn-action-update.btn-cancel').on('click', function(e) {
            e.preventDefault();

            $(this).closest('tr').find('.btn-action-update.btn-save').removeClass('active');
            $(this).removeClass('active');
            $(this).closest('tr').find('.input-value').removeClass('active');
            $(this).closest('tr').find('.input-value').prop('readonly', true);

            $(this).closest('tr').find('.btn-action.btn-edit').addClass('active');
            $(this).closest('tr').find('.preview-value').addClass('active');
        });

        $('.btn-action-update.btn-save').on('click', function(e){
            e.preventDefault();

            var divBtnSave = $(this);

            var id = $(this).data('id');

            var divValue = $(this).closest('tr').find('input[name="value"]');
            var divName = $(this).closest('tr').find('input[name="name"]');

            var value = divValue.val();
            var name = divName.val();

            $.ajax({
                url: "{{ url('admin-tkmu/items') }}/"+id,
                method: 'post',
                data: {
                    name: name,
                    value: value
                },
                success: function(result) {
                    if(result.status === 'success') {
                        divValue.val(value)
                        divName.val(name)

                        divBtnSave.closest('tr').find('.preview-value.value .text-value').text(convertToRupiah(value))
                        divBtnSave.closest('tr').find('.preview-value.name').text(name)
                    }

                    divBtnSave.closest('tr').find('.btn-action-update.btn-cancel').removeClass('active');
                    divBtnSave.removeClass('active');
                    divBtnSave.closest('tr').find('.input-value').removeClass('active');
                    divBtnSave.closest('tr').find('.input-value').prop('readonly', true);

                    divBtnSave.closest('tr').find('.btn-action.btn-edit').addClass('active');
                    divBtnSave.closest('tr').find('.preview-value').addClass('active');

                    $('#alertMessage').modal('show');
                    $('#exampleAlertTitleModalLabel').text((result.status).toUpperCase());
                    $('#exampleAlertBodyModalLabel').text(result.message)
                }
            })
        })
    </script>

    <script>
        $('.btn-sbmt-csbyt').on('click', function(e) {
            e.preventDefault();
            var id = $('#ep_event_id').val();

            var urlString = "{{ url('admin-tkmu/update-shop/'.$itcat) }}";
            location.href = urlString;
        })
    </script>
@endsection