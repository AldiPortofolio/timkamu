@extends('layouts.admin.app')

@section('content')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Loyalty Points Circulation Report</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6 mb-10">
                    {{-- <div class="flex-page-filter">
                        <div class="form-group mb-0">
                            <input type="month" class="form-control form-control-sm" name="filter" id="filter-value" @if(app('request')->input('filter')) value="{{ app('request')->input('filter') }}" @else value="2020-10" @endif>
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success btn-filter">Apply</button>
                        </div>
                    </div> --}}
                </div>

                <div class="col-md-6 mb-10">
                    <div class="flex-page-filter justify-content-end">
                        <div class="form-group mb-0 ">
                            <a href="{{ url('admin-tkmu/lp-recharge') }}" class="btn btn-sm btn-block btn-light">View LP recharge report</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Total LP beredar saat ini (circulating currency)</h5>
                            <p class="mb-0">{{ number_format($total_lp_beredar, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></p>
                            <p class="o5 mb-0">Rp {{ number_format($total_lp_beredar*1000, 0, '.', ',') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-10 mt-20">
                    <h6 class="font-size-18 o5">LP Sources</h6>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Source</th>
                                        <th class="w-10">LP</th>
                                        <th class="w-10">Rp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Member Recharge</td>
                                        <td class="text-right">{{ number_format($total_recharge, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                        <td class="text-right">{{ number_format($total_recharge*1000, 0, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Marketing: Gratis 54 BP 10-11 Oct 2020</td>
                                        <td class="text-right">{{ number_format($total_marketing_batch_one, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                        <td class="text-right">{{ number_format($total_marketing_batch_one*1000, 0, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Marketing: Gratis 26 BP 12 Oct 2020</td>
                                        <td class="text-right">{{ number_format($total_marketing_batch_two, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                        <td class="text-right">{{ number_format($total_marketing_batch_two*1000, 0, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Convert from BP</td>
                                        <td class="text-right">{{ number_format($total_member_bp_convert, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                        <td class="text-right">{{ number_format($total_member_bp_convert*1000, 0, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Convert from Coins</td>
                                        <td class="text-right">{{ number_format($total_member_coin_convert/10, 0, '.', ',') }}<span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
                                        <td class="text-right">{{ number_format($total_member_coin_convert*100, 0, '.', ',') }}</td>
                                    </tr>
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
        $('body').on('click', '.btn-filter', function(e) {
            e.preventDefault();
            
            var filter = $('#filter-value').val();

            location.href = "{{ url('admin-tkmu/lp-circulation') }}?filter="+filter;
        })

    })
</script>
@endsection