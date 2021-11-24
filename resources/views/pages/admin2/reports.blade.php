@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Reports Center</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3 mb-20">
                    <h6 class="o5">Members</h6>
                    <ul>
                        <li><a href="{{ url('admin2/report-member-overview') }}">Overview</a></li>
                        <li><a href="#" class="o5">Predictions per member</a></li>
                        <li><a href="#" class="o5">Top-ups per member</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-20">
                    <h6 class="o5">Events</h6>
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#event-performance-by-id-modal">Event performance</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#" class="o5">Event performance (range)</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-20">
                    <h6 class="o5">Loyalty Points</h6>
                    <ul>
                        <li><a href="{{ url('admin2/report-lp') }}">LP recharge report</a></li>
                        <li><a href="{{ url('admin2/report-lp-circulation') }}">LP circulation report</a></li>
                        <li><a href="#" class="o5">LP transactions</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-20">
                    <h6 class="o5">Battle Points</h6>
                    <ul>
                        <li><a href="#" class="o5">BP circulation report</a></li>
                        <li><a href="#" class="o5">BP transactions</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-20">
                    <h6 class="o5">Shops</h6>
                    <ul>
                        <li><a href="{{ url('admin2/report-topups') }}">All Top Ups</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</section>

<section id="page-modals">
    <div class="modal" id="event-performance-by-id-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Check event performance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <div class="form-group">
                        <label>Select from 20 most recent events</label>
                        <select class="form-control form-control-sm">
                            <option>RRQ vs AE - 18 Oct 2020 18.30</option>
                            <option>RRQ vs AE - 18 Oct 2020 18.30</option>
                            <option>RRQ vs AE - 18 Oct 2020 18.30</option>
                            <option>RRQ vs AE - 18 Oct 2020 18.30</option>
                            <option>RRQ vs AE - 18 Oct 2020 18.30</option>
                            <option>RRQ vs AE - 18 Oct 2020 18.30</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary">Go</button>
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