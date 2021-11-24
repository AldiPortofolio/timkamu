@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')

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
                    <div class="table-meta grey text-italic">Showing <span class="black">4</span> quests</div>
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
                                    <tr>
                                        <td>Verifikasi email</td>
                                        <td>ONCE</td>
                                        <td>Active</td>
                                        <td class="text-right">20<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Verifikasi nomor handphone</td>
                                        <td>ONCE</td>
                                        <td>Active</td>
                                        <td class="text-right">20<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Naik level</td>
                                        <td>REPEATABLE</td>
                                        <td>Active</td>
                                        <td class="text-right">20<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Total pemberian prediksi 18 BP</td>
                                        <td>ONCE_PROGRESS</td>
                                        <td>Active</td>
                                        <td class="text-right">Unlock convert currency</td>
                                    </tr>
                                    <tr>
                                        <td>Naik level</td>
                                        <td>REPEATABLE</td>
                                        <td><span class="text-danger">Inactive</span></td>
                                        <td class="text-right">20<span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
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