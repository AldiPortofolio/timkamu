@extends('layouts.admin.app')

@section('content')

<section id="content">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Data Exports</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">

            <div class="row mb-20">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Member list (with currency balance)</h5>
                            <p>The complete database export of our member table.</p>
                            <a href="/admin-tkmu/member-export" class="btn btn-sm btn-success">Export .xlsx</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-20">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Member historical transactions</h5>
                            <p>Database export of all member transactions</p>
                            <a href="/admin-tkmu/member-historical-export" class="btn btn-sm btn-success">Export .xlsx</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-20">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">All checkout</h5>
                            <p>Database export of all store checkout and their status</p>
                            <a href="/admin-tkmu/allcheckout-export" class="btn btn-sm btn-success">Export .xlsx</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-20">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-size-16">Visitor log</h5>
                            <p>Visitor log database export</p>
                            <a href="/admin-tkmu/stats-export" class="btn btn-sm btn-success">Export .xlsx</a>
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
