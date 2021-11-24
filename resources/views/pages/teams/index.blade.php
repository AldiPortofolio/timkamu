@extends('layouts.mana-ui')

@section('page_title', "TimKamu (PTS) - Tempat nongkrongnya anak e-sports")
@section('body_class', 'mana-ui team-index')


@section('content')
    @include('includes.mana-ui.nav')
    @include('includes.mana-ui.effects')

    <!-- page content -->
    <section id="page-content">

        <!-- page header -->
        <div id="page-title">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="section-title position-relative">
                            <h1 class="rajdhani-bold">Esport Teams</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- page section -->
        <div id="team-view-header" class="mb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">

                        <div class="event-index-filter-select">
                            <select class="custom-select team-index-filter">
                                <option value="fans" selected>20 teams with most fans</option>
                                <option value="lp">20 teams with most LP support</option>
                                <option value="name">Sort by name A-Z</option>
                            </select>
                        </div>

                        <div class="form-group mana-control">
                            <form id="search-team">
                                <div class="row">
                                    <div class="col-8 pr-1">
                                        <input type="text" name="team_name" class="form-control mana-control search-team-name" placeholder="Cari nama tim...">
                                    </div>
                                    <div class="col-4 pl-1">
                                        <a href="#" class="mana-btn-54 inline-search mana-btn-red has-spinner mb-15 team-search-go">
                                            <span class="default-text">Search</span>
                                            <div class="spinner-border hw24"></div>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="search-result-area">
                            <p class="grey-10">Menampilkan <span class="white-10 total-paginate-team">{{$returnTeams->count()}}</span> tim dari <span class="white-10 total-all-team">{{$totalTeam}}</span> total tim</p>

                            <div class="row search-container">
                                @foreach($returnTeams as $team)
                                    <div class="col-6 col-md-4 mb-20 team-col">
                                        <a href="{{route('teams.detail')}}?name={{str_replace('img/team-logos/','',$team->logo.'-'.$team->id)}}">
                                            <div class="team-item">
                                                <div class="thumb">
                                                    <img src="{{$team->logo.'-200.png'}}" class="w-100">
                                                </div>
                                                <div class="name">
                                                    {{$team->name}}
                                                </div>
                                                <div class="meta">
                                                    @if(in_array(request()->sort_by,['fans', 'name']))
                                                        <img src="/icons/heart-red.svg" class="icon"> <span>{{$team->team_fans_count}}</span>
                                                    @elseif(request()->sort_by === 'lp')
                                                        <img src="/img/currencies/lp.svg" class="icon lp"> <span>{{$team->total_donation}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <p class="o3 ml-1 mr-1 search-disclaimer d-none text-center">Menampilkan maksimal 10 tim. Persempit pencarian kamu jika tim tidak ditemukan.</p>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="page-modals">
        <div class="modal mana-ui slim-card" tabindex="-1" role="dialog" id="validation-input-search">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    @include('includes.mana-ui.modal-top')
                    <div class="modal-about rajdhani-bold font-size-32">
                        Error
                    </div>
                    <div class="modal-mid grey-10">
                        <p>Masukan minimal 3 huruf</p>
                    </div>
                    <div class="modal-actions d-flex flex-column">
                        <a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    @include('includes.mana-ui.modals')
    @include('includes.mana-ui.footer')
    <div class="col-6 col-md-4 mb-20" id="init-team-col" style="display: none">
        <a href="#">
            <div class="team-item">
                <div class="thumb">
                    <img src="#" class="w-100">
                </div>
                <div class="name">
                </div>
                <div class="meta">
                    <img src="#" class="icon"> <span></span>
                </div>
            </div>
        </a>
    </div>

    <style type="text/css">
        /*page specific*/
        .search-container {
            margin-right: -10px;
            margin-left: -10px;
        }
        .team-col {
            padding-right: 10px;
            padding-left: 10px;
        }
        .mana-btn-54.inline-search {
            line-height: 48px;
            height: 48px;
            font-size: 14px;
        }
        .team-item {
            border-radius: 20px;
            background: rgb(0 0 0 / .2);
            padding: 15px;
            cursor: pointer;
            height: 100%;
        }
        .team-item:hover {
            background: rgb(0 0 0 / .4);
        }
        .team-item .name {
            font-family: 'Rajdhani-Bold';
            font-size: 18px;
            line-height: 20px;
            text-align: center;
        }
        .team-item {transition: all 0.1s ease-in-out;}
        .team-item:active {transform: scale(1.05) !important;}

        .team-item .meta {
            margin-top: 5px;
            font-size: 14px;
            text-align: center;
        }
        .team-item .meta span {
            opacity: .5;
        }
        .team-item .meta .icon {
            height: 14px;
            width: 14px;
            position: relative;
            top: -1px;
            opacity: .8;
        }
        .team-item .meta .icon.lp {
            top: -2px;
        }
    </style>
    <style type="text/css">
        /*media*/

    </style>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            let currentSort = new URLSearchParams(window.location.search);

            if(currentSort.get('sort_by') == null){
                var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?sort_by=fans';
                window.history.pushState({path:newurl},'',newurl);
                $('.team-index-filter').val('fans');
            }

            // page specific scripts

            $('.search-team-name').val(currentSort.get('team_name'));
            currentSort.delete('team_name')

            let form = $('#search-team');
            let teamContainer = $('.search-container');
            let teamCol = $('#init-team-col');
            $('body').on('click', '.team-search-go', function(e) {
                e.preventDefault();
                form.submit();

            });

            $('#search-team').on('submit', function (e){
                e.preventDefault();
                let team_name = $('.search-team-name').val();
                if(team_name.length < 3){
                    $('#validation-input-search').modal('show');
                    return false;
                }
                $('.team-search-go').addClass('loading');
                let currentLocation = window.origin+'/teams';
                let currentSort = new URLSearchParams(window.location.search).get('sort_by');
                currentSort = currentSort !== null ? currentSort : 'fans';
                $.ajax({
                    type : 'GET',
                    url : '{{route('teams.search.name')}}?sort_by='+currentSort+'&team_name='+team_name
                }).done(function (response){
                    teamContainer.find('.team-col').remove();
                    $('.total-paginate-team').text(response.teams.length);
                    $('.total-all-team').text(response.total);
                    $.each(response.teams, function (index, team){
                        console.log(team.alias);
                        let clone = teamCol.clone().removeAttr('id').addClass('team-col');
                        let idTeam = team.logo.replace('img/team-logos/', '')+'-'+team.id;
                        clone.find('a').attr('href', "{{route('teams.detail')}}?name="+idTeam)
                        clone.find('.thumb>img').attr('src', team.logo+'-200.png');
                        clone.find('.name').text(team.name);
                        if(currentSort === 'fans'){
                            clone.find('.meta>img').attr('src','/icons/heart-red.svg');
                            clone.find('.meta>span').text(team.team_fans_count);
                        }else if(currentSort === 'lp'){
                            clone.find('.meta>img').attr('src','/img/currencies/lp.svg');
                            clone.find('.meta>span').text(team.total_donation);
                        }
                        clone.show();
                        teamContainer.append(clone);
                    });
                    $('.team-search-go').removeClass('loading');
                })
            })

            $('.team-index-filter').val('{{request()->sort_by}}');

            $('.team-index-filter').on('change', function (e){
                let val = $(this).val();
                window.location = '{{route('teams.index')}}?sort_by='+val;
            })
        })
    </script>
@endsection
