@extends('layouts.admin.app')

@section('content')
<section id="content">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Tournament Detail</h3>
                    <div class="bcrumb">
                        <a href="/admin2/tournament-index">Tournaments</a> <i data-feather="chevron-right" class="bcrumb-icon"></i>
                        <a href="#" class="current">{{$tournament->name}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section padded-10 mb-20">
        <div class="container-fluid">

            <div class="row mb-20">
                <div class="col-md-12 mb-20">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="o5 mb-20">Tournament info</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{$tournament->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Dimulai</td>
                                        <td>{{\Carbon\Carbon::parse($tournament->tournament_start)->format('d M Y H:i')}} WIB</td>
                                    </tr>
                                    <tr>
                                        <td>Ended</td>
                                        <td>----</td>
                                    </tr>
                                    <tr>
                                        <td>Hadiah</td>
                                        <td>
                                            {!! $tournament->rewards !!}
                                    </tr>
                                    <tr>
                                        <td>Biaya pendaftaran</td>
                                        <td>Rp. {{number_format($tournament->admission_fee * $tournament->membership)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Members per team</td>
                                        <td>{{$tournament->membership}}</td>
                                    </tr>
                                    <tr>
                                        <td>Admission per member</td>
                                        <td>Rp. {{number_format($tournament->admission_fee)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><span class="text-success">{{$tournament->status}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>
                                            {!!$tournament->description!!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jadwal turnamen</td>
                                        <td>
                                            {!!$tournament->schedule!!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Peraturan turnamen</td>
                                        <td>
                                            {!!$tournament->rules!!}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-20">
                <div class="col-md-8 mb-20">
                    <div class="row mb-20">
                        <div class="col-12">
                            <h6 class="o5 mb-10">Team Registrations</h6>
                            <span class="">{{ $tournament->teams_count }} teams alread registered</span>
                        </div>
                    </div>
                    @foreach ($team_tournament as $item)

                    <div class="card mb-20">
                        <div class="card-body">
                            <div class="row no-gutters mb-20">
                                <div class="col-6">
                                    <span class="o3">Team name</span> <br>
                                    {{ $item->name }}
                                </div>
                                <div class="col-6">
                                    <span class="o3">Admission completion</span> <br>
                                    {{ count($item->team_member->whereNotNull('id_user')) }} / {{ count($item->team_member) }} members paid
                                </div>
                            </div>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <tbody>
                                    @foreach ($item->team_member as $key => $member)
                                        <tr>
                                            <td><span class="o3">Member #{{ $key+1 }} @if($key === 0)(team leader)@endif</span></td>
                                            <td>
                                                <span class='o3 mr-1'>{{$member->name .' - '.$member->username.' - '.$member->phone_number}}</span>
                                            @if($member->id_user)
                                                    &nbsp; - &nbsp; <div class='btn-group' role='group'>
                                                        <a href='#' class='user-drop' data-toggle='dropdown'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-arrow-down-right user-more left'><line x1='7' y1='7' x2='17' y2='17'></line><polyline points='17 7 17 17 7 17'></polyline></svg>
                                                            <span>{{$member->user->username}}</span></a>
                                                        <div class='dropdown-menu'>
                                                            <a class='dropdown-item user-detail-by-id-btn' href='#' data-toggle='modal' data-target='#member-stats' data-user='{{$member->id_user}}'>View quick stats</a>
                                                            <a class='dropdown-item' href='{{url('admin-tkmu/users/' . $member->id_user)}}'>View info</a>
                                                            <a class='dropdown-item' href='{{url('admin-tkmu/lp-transaction-member?username=' . $member->user->username)}}'>View LP transactions</a>
                                                            <a class='dropdown-item' href='{{url('admin-tkmu/lp-transaction-member?username=' . $member->user->username)}}'>View all bets</a>
                                                            <a class='dropdown-item' href='{{url('admin-tkmu/lp-transaction-member?username=' . $member->user->username)}}'>View all topups</a>
                                                            <a class='dropdown-item' href='{{url('admin-tkmu/lp-transaction-member?username=' . $member->user->username)}}'>View historical</a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            @if($member->id_user)
                                            <td><span class="text-success">admission paid</span></td>
                                            @else
                                            <td><span class="text-danger">admission not paid</span></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endforeach
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
