@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-00">Topup Overview</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h6 class="o5 mb-20">Number of topups</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-20">
                    <div class="flex-page-filter">
                        <div class="form-group mb-0">
                            <input type="date" class="form-control form-control-sm h-100" value="2020-10-01">
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-light" disabled>to</button>
                        </div>
                        <div class="form-group mb-0">
                            <input type="date" class="form-control form-control-sm h-100" value="2020-10-31">
                        </div>
                        <div class="form-group mb-0">
                            <select class="form-control form-control-sm">
                                <option>Game Topups</option>
                                <option>Pulsa</option>
                                <option>PLN</option>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-sm btn-block btn-success">Apply</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                

                <div class="col-md-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td colspan="2">MLBB</td>
                                        <td colspan="2">Free Fire</td>
                                        <td colspan="2">PUBG</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <?php for ($i=0; $i < 3; $i++): ?>
                                            <td>Count</td>
                                            <td>Total</td>
                                        <?php endfor ?>
                                        
                                    </tr>
                                    <tr>
                                        <td>Pending</td>
                                        <?php for ($i=0; $i < 6; $i++): ?>
                                            <td class="text-right"></td>
                                        <?php endfor ?>
                                    </tr>
                                    <tr>
                                        <td>Approved</td>
                                        <?php for ($i=0; $i < 6; $i++): ?>
                                            <td class="text-right"></td>
                                        <?php endfor ?>
                                    </tr>
                                    <tr>
                                        <td>Rejected</td>
                                        <?php for ($i=0; $i < 6; $i++): ?>
                                            <td class="text-right"></td>
                                        <?php endfor ?>
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

    })
</script>
@endsection