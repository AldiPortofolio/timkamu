@extends('layouts.admin.app')

@section('content')

@php
    $currentUrl = substr(\Request::getRequestUri(), strpos(\Request::getRequestUri(), request()->path()));
    $url = $currentUrl;
    $page = app('request')->input('page') ?? 1;
    if(strpos($currentUrl, '&page') > 0) {
        $url = substr($currentUrl, 0, strpos($currentUrl, '&page'));
    }
@endphp

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
                    @if($tournaments->total() > 10)
                    <div class="table-meta grey text-italic">Showing <span class="black">10</span> out of <span class="black">{{ $tournaments->total() }}</span> promos</div>
                    @elseif(count($tournaments) >  0)
                    <div class="table-meta grey text-italic">Showing <span class="black">{{ $tournaments->total() }}</span> out of <span class="black">{{ $tournaments->total() }}</span> promos</div>
                    @else
                    <div class="table-meta grey text-italic">Showing <span class="black">0</span> out of <span class="black">0</span> promos</div>
                    @endif
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
                                @foreach($tournaments as $tournament)
                                    <tr>
                                        <td><span class="o3 mr-1">[{{$tournament->id}}]</span></td>
                                        <td>{{\Carbon\Carbon::parse($tournament->tournament_start)->format('d M Y H:i')}} WIB</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>{{$tournament->name}}</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('admin.tournament.show', $tournament->id)}}">View</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$tournament->teams_count . ' / '.  $tournament->slot}}</td>
                                        <td class="text-right">{{$tournament->membership}}</td>
                                        <td class="text-right">Rp {{number_format($tournament->admission_fee * $tournament->membership, 0,'.',',')}}</td>
                                        <td><span class="text-success">{{$tournament->status}}</span></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12 ">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            @if(count($tournaments) > 0)
                            <li class="page-item"><a class="page-link" href="@if((int)$page === 1)#@else{{ url($url.'&page='.(($page) - 1)) }}@endif">Previous</a></li>
                            @for ($i = 1; $i <= $tournaments->lastPage(); $i++)
                                <li class="page-item @if((int)($page) === $i || (!$page && $i === 1)) active @endif"><a class="page-link" href="{{ url($url.'&page='.$i) }}">{{ $i }}</a></li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="@if((int)($page) === (int)$tournaments->lastPage())#@else{{ url($url.'&page='.(($page) + 1)) }}@endif">Next</a></li>
                            @else
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            @endif
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
