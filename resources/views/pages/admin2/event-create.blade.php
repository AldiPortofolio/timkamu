@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Create New Event</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Event name</label>
                                <input type="text" class="form-control form-control-sm first-focus">
                            </div> 
                            <div class="form-group">
                                <label>Event start</label>
                                <input type="datetime-local" class="form-control form-control-sm first-focus">
                            </div> 
                            <div class="form-group">
                                <label>League</label>
                                <select class="form-control form-control-sm">
                                    <option>MPL Season 6</option>
                                    <option>MPL Season 7</option>
                                    <option>MPL Season 8</option>
                                </select>
                            </div> 
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Team A</label>
                                        <select class="form-control form-control-sm">
                                            <option>RRQ</option>
                                            <option>ONIC</option>
                                            <option>AE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Team B</label>
                                        <select class="form-control form-control-sm">
                                            <option>RRQ</option>
                                            <option>ONIC</option>
                                            <option>AE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Streaming embed</label>
                                <textarea class="form-control form-control-sm" rows="3"><iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe></textarea>
                            </div>
                            <div class="form-group mt-30 mb-0">
                                <button type="button" class="btn btn-sm btn-primary">Create</button>
                            </div>
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