@extends('layouts.admin.app')

@section('content')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Promo Detail</h3>
                    <div class="bcrumb">
                        <a href="{{ url('admin-tkmu/promos') }}">Promos</a> <i data-feather="chevron-right" class="bcrumb-icon"></i>
                        <a href="#" class="current">{{ $item->title }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            
            <div class="row mb-20">
                <div class="col-md-6 mb-20">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="o5 mb-20">Promo info</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $item->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Started</td>
                                        <td>{{ date('d M Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ended</td>
                                        <td>----</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>@if($item->active)<span class="text-success">Active</span>@else<span class="text-danger">Inactive</span>@endif</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>{!! $item->desc !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mb-20">
                <div class="col-md-6 mb-20">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="o5 mb-20">Unique stats</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td>Limit</td>
                                        <td class="text-right">No limit</td>
                                    </tr>
                                    <tr>
                                        <td>Limit remaining</td>
                                        <td class="text-right">No limit remaining</td>
                                    </tr>
                                    <tr>
                                        <td>Use count</td>
                                        <td class="text-right">{{ $total_used }}</td>
                                    </tr>
                                    @if($item->id === 1)
                                    <tr>
                                        <td>Total discount amount</td>
                                        <td class="text-right">Rp {{ number_format($total_amount, 0, '.', ',') }}</td>
                                    </tr>
                                    @elseif($item->id === 2)
                                    <tr>
                                        <td>Total BP given</td>
                                        <td class="text-right">{{ number_format($total_amount, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

<style type="text/css">
    /*page specific css*/

</style>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        
        // page specific scripts

    })
</script>
@endsection