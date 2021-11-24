@extends('layouts.admin.app')

@section('content')

<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Quests</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 mb-10">
                    <div class="table-meta grey text-italic">Showing <span class="black">{{ $all_quests->count() }}</span> quests</div>
                </div>

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td><strong>Title</strong></td>
                                        <td><strong>Type</strong></td>
                                        <td><strong>Status</strong></td>
                                        <td><strong>Reward</strong></td>
                                    </tr>
                                    @foreach ($all_quests as $quest)
                                        @php
                                            $valueDetail = json_decode($quest->value_detail);
                                        @endphp
                                        <tr>
                                            <td>{{ $quest->title }}</td>
                                            <td>{{ str_replace('_', ' ', $quest->type )}}</td>

                                            @if($quest->active === '1')
                                            <td>Active</td>
                                            @else
                                            <td><span class="text-danger">Inactive</span></td>
                                            @endif

                                            @if(is_numeric($valueDetail->value))
                                            <td class="text-right">{{ $valueDetail->value }}<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                            @else
                                            <td class="text-right">{{ $valueDetail->value }}</td>
                                            @endif
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

</section>

<section id="page-modals">

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