@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')
<section id="content">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Game Events</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="flex-page-filter">
                        <div class="form-group">
                            <select class="form-control form-control-sm">
                                <option selected>Upcoming games</option>
                                <option>Past games</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-10">
                    <div class="table-meta grey text-italic">Showing <span class="black">20</span> out of <span class="black">344</span> events</div>
                </div>

                <div class="col-12 mb-20">
                    <div class="event-card card mb-10 border-danger">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="upper">
                                        <span class="event-card-id-text">[#44]</span> RRQ vs AE <span class="event-card-live-text">LIVE</span>
                                    </div>
                                    <div class="lower">
                                        <span class="o5">26 Oct 2020 - 18.30</span>
                                        <span class="event-card-league-name">- MPL Season 6 PLAYOFFS</span>
                                        <span class="event-card-odds">15</span>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <a href="{{ url('admin2/event-performance') }}" class="btn btn-sm btn-light ml-2" target="_blank">View performance</a>
                                    <a href="{{ url('admin2/event-view') }}" class="btn btn-sm btn-success ml-2">View event</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php for ($i=0; $i < 3; $i++): ?>
                        <div class="event-card card mb-10">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="upper">
                                            <a href="{{ url('admin2/event-view') }}"><span class="event-card-id-text">[#44]</span> RRQ vs AE</a>
                                        </div>
                                        <div class="lower">
                                            <span class="o5">26 Oct 2020 - 18.30</span>
                                            <span class="event-card-league-name">- MPL Season 7</span>
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex align-items-center justify-content-end">
                                    <a href="{{ url('admin2/event-performance') }}" class="btn btn-sm btn-light ml-2" target="_blank">View performance</a>
                                        <a href="{{ url('admin2/event-view') }}" class="btn btn-sm btn-success ml-2">View event</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                    <div class="event-card card mb-10 bg-light">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="upper">
                                        <span class="event-card-id-text">[#44]</span> RRQ vs AE <span class="event-card-past-text">Past Event</span>
                                    </div>
                                    <div class="lower">
                                        <span class="o5">26 Oct 2020 - 18.30</span>
                                        <span class="event-card-league-name">- MPL Season 6 PLAYOFFS</span>
                                        <span class="event-card-odds">7</span>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <a href="{{ url('admin2/event-performance') }}" class="btn btn-sm btn-light ml-2" target="_blank">View performance</a>
                                    <a href="{{ url('admin2/event-view') }}" class="btn btn-sm btn-success ml-2">View event</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="event-card card mb-10 cursor-ptr border-light">
                        <div class="card-body">
                            <div class="upper">
                                <em>no event</em>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 ">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
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