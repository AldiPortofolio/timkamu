@extends('layouts.admin2')

@section('content')
@include('includes.admin2.nav')
<section id="content">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Tournament Detail</h3>
                    <div class="bcrumb">
                        <a href="/admin2/tournament-index">Tournaments</a> <i data-feather="chevron-right" class="bcrumb-icon"></i>
                        <a href="#" class="current">Timkamu MLBB Opening Tournament</a>
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
                                        <td>Timkamu MLBB Opening Tournament</td>
                                    </tr>
                                    <tr>
                                        <td>Dimulai</td>
                                        <td>20 Nov 2020 18:30</td>
                                    </tr>
                                    <tr>
                                        <td>Ended</td>
                                        <td>----</td>
                                    </tr>
                                    <tr>
                                        <td>Hadiah</td>
                                        <td>
                                            1st - Rp 5,000,000 <br>
                                            2nd - Rp 3,000,000 <br>
                                            3rd - Rp 1,000,000
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Biaya pendaftaran</td>
                                        <td>Rp 200,000</td>
                                    </tr>
                                    <tr>
                                        <td>Members per team</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Admission per member</td>
                                        <td>Rp 40,000</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><span class="text-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>
                                            <p>Ditengah pandemi Covid-19 yang telah masuk ke Indonesia sejak bulan Maret hingga sekarang telah merenggut kebebasan beraktivitas kebanyakan orang. Melihat situasi yang seperti ini untuk memberikan hiburan serta mengajak masyarakat untuk tetap #KompakWalauBerjarak, maka AXIS berkolaborasi dengan Yamisok untuk mengadakan AXIS Daily Tournament.</p>

                                            <p>Ada 3 Game yang akan dipertandingkan dalam turnamen yaitu Mobile Legends , Free Fire dan PUBGM .Axis Daily Tournament akan dibuka pendaftarannya sejak hari ini, 30 November 2020, dan turnamen akan dimulai tanggal 07 Desember - 13 Desember 2020.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jadwal turnamen</td>
                                        <td>
                                            Jadwal Tournament: <br>
                                            1. Round 1 -(128 besar) : 28 Maret 2020 Lobby Up Pukul 12.30 WIB, Start: 13:00 WIB <br>
                                            2. Round 2 -(64 besar) : A.S.A.P <br>
                                            3. Round 3 -(32 besar) : A.S.A.P <br>
                                            4. Round 4 -(16 besar) : A.S.A.P <br>
                                            5. Round 5 -(8 besar) : 29 Maret 2020 lobby Up pukul 12.30 WIB, Start: 13.00 WIB <br>
                                            6. Round 6 -(4 besar) : A.S.A.P <br>
                                            7. Round 7 -( FINAL) (BO3) : A.S.A.P <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Peraturan turnamen</td>
                                        <td>
                                            1. Format: 1v1, Best of One (BO1) <br>
                                            2. Game Format: mulai dari babak penyisihan dimainkan dengan format BO1. dan Final dimainkan dengan BO3 <br>
                                            3. Game Mode: 1v1 Solo Mid (Player yang terlebih dahulu menghancurkan tower pertama atau mendapatkan 2 kill adalah pemenangnya)
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
                            <span class="">5 teams alread registered</span>
                        </div>
                    </div>
                    <div class="card mb-20">
                        <div class="card-body">
                            <div class="row no-gutters mb-20">
                                <div class="col-6">
                                    <span class="o3">Team name</span> <br>
                                    ONIC Esports Prodigy
                                </div>
                                <div class="col-6">
                                    <span class="o3">Admission completion</span> <br>
                                    3 / 5 members paid
                                </div>
                            </div>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <tbody>
                                    <tr>
                                        <td><span class="o3">Member #1 (team leader)</span></td>
                                        <td>Dedi Budi - SurprisedOtter</td>
                                        <td><span class="text-success">admission paid</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">Member #2</span></td>
                                        <td>Rosa Rumiati - InGameUserID</td>
                                        <td><span class="text-danger">admission not paid</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">Member #3</span></td>
                                        <td>Shelly - InGameUserID</td>
                                        <td><span class="text-danger">admission not paid</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">Member #4</span></td>
                                        <td>Shelly - InGameUserID</td>
                                        <td><span class="text-danger">admission not paid</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">Member #5</span></td>
                                        <td>Shelly - InGameUserID</td>
                                        <td><span class="text-danger">admission not paid</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-20">
                        <div class="card-body">
                            <div class="row no-gutters mb-20">
                                <div class="col-6">
                                    <span class="o3">Team name</span> <br>
                                    ONIC Esports Prodigy
                                </div>
                                <div class="col-6">
                                    <span class="o3">Admission completion</span> <br>
                                    3 / 5 members paid
                                </div>
                            </div>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <tbody>
                                    <tr>
                                        <td><span class="o3">Member #1 (team leader)</span></td>
                                        <td>Dedi Budi - SurprisedOtter</td>
                                        <td><span class="text-success">admission paid</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">Member #2</span></td>
                                        <td>Rosa Rumiati - InGameUserID</td>
                                        <td><span class="text-danger">admission not paid</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">Member #3</span></td>
                                        <td>Shelly - InGameUserID</td>
                                        <td><span class="text-danger">admission not paid</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">Member #4</span></td>
                                        <td>Shelly - InGameUserID</td>
                                        <td><span class="text-danger">admission not paid</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">Member #5</span></td>
                                        <td>Shelly - InGameUserID</td>
                                        <td><span class="text-danger">admission not paid</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-20">
                        <div class="card-body">
                            <div class="row no-gutters mb-20">
                                <div class="col-6">
                                    <span class="o3">Team name</span> <br>
                                    ONIC Esports Prodigy
                                </div>
                                <div class="col-6">
                                    <span class="o3">Admission completion</span> <br>
                                    3 / 5 members paid
                                </div>
                            </div>
                            <table class="table table-sm table-bordered table-hover mb-0">
                                <tbody>
                                    <tr>
                                        <td><span class="o3">Member #1 (team leader)</span></td>
                                        <td>Dedi Budi - SurprisedOtter</td>
                                        <td><span class="text-success">admission paid</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">Member #2</span></td>
                                        <td>Rosa Rumiati - InGameUserID</td>
                                        <td><span class="text-danger">admission not paid</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">Member #3</span></td>
                                        <td>Shelly - InGameUserID</td>
                                        <td><span class="text-danger">admission not paid</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">Member #4</span></td>
                                        <td>Shelly - InGameUserID</td>
                                        <td><span class="text-danger">admission not paid</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="o3">Member #5</span></td>
                                        <td>Shelly - InGameUserID</td>
                                        <td><span class="text-danger">admission not paid</span></td>
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