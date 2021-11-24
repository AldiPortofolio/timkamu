@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')

<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Timkamu Tournaments</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 mb-10">
                    <div class="table-meta grey text-italic">Showing <span class="black">10</span> out of <span class="black">344</span> promos</div>
                </div>

                <div class="col-12 mb-20">
                    <div class="card h-100">
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="w-10">Tournament ID</th>
                                        <th class="w-10">Dimulai</th>
                                        <th>Tournament name</th>
                                        <th>Team slots</th>
                                        <th>Members per team</th>
                                        <th>Biaya pendaftaran</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="o3 mr-1">[12]</span></td>
                                        <td>22 Nov 2020 - 17:00 WIB</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>Timkamu MLBB Opening Tournament</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="/admin2/tournament-view">View</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>4/12</td>
                                        <td class="text-right">5</td>
                                        <td class="text-right">Rp 2,000,000</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                </tbody>
                            </table>
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