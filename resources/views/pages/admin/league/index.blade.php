@extends('layouts.admin.app')

@section('content')
<style>
    button.btn-action {
        display: none;
    }
    button.btn-action.active {
        display: inline-flex;
    }

    .value-preview, .value-input {
        display: none;
    }
    .value-preview.active, .value-input.active {
        display: block;
    }

    .imgpreview {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .new-imgpreview {
        display: none;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Games</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5>Add New Games</h5> <br>
                            <form action="{{ route('admin.games.create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="game_name" id="game_name" placeholder="Game Name" value="{{ old('game_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <input class="form-control new-img" type="file" name="logo"><br>
                                            <img src="#" class="new-imgpreview">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 align-items-end">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-fw fa-plus"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr class="divider">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center cell-width-01">No.</th>
                                        <th class="text-center">Game</th>
                                        <th class="text-center">Logo</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($games as $key => $game)
                                        <tr>
                                            <form action="{{ route('admin.games.edit', ['id' => $game->id]) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="_method" value="patch">
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td>
                                                    <span class="value-preview active">{{ $game->name }}</span>
                                                    <input type="text" class="value-input form-control" value="{{ $game->name }}" name="game_name">
                                                </td>
                                                <td>
                                                    <input type="file" class="value-input form-control logo" name="logo">
                                                    <img src="{{ asset($game->logo) }}" class="imgpreview">
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-warning btn-edit btn-action active"><i class="fas fa-fw fa-edit"></i></button>

                                                    {{-- <button type="button" class="btn btn-secondary btn-delete-data btn-action active" data-url="{{ route('admin.games.delete', ['id' => $item->id]) }}"><i class="fas fa-fw fa-trash"></i></button> --}}
                                                    <button type="button" class="btn btn-primary btn-save btn-action"><i class="fas fa-fw fa-check"></i></button>
                                                    <button type="button" class="btn btn-secondary btn-cancel btn-action"><i class="fas fa-fw fa-times"></i></button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">League</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5>Add New Leagues</h5> <br>
                            <form action="{{ route('admin.leagues.create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="league_name" id="league_name" placeholder="League Name" value="{{ old('league_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 align-items-end">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-fw fa-plus"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr class="divider">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center cell-width-01">No.</th>
                                        <th class="text-center">League</th>
                                        <th class="text-center">Logo</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leagues as $key => $league)
                                        <tr>
                                            <form action="{{ route('admin.leagues.edit', ['id' => $league->id]) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="_method" value="patch">
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td>
                                                    <span class="value-preview active">{{ $league->name }}</span>
                                                    <input type="text" class="value-input form-control" name="league_name" value="{{ $league->name }}">
                                                </td>
                                                <td>
                                                    <input type="file" class="value-input form-control logo" name="logo">
                                                    <img src="{{ asset($league->logo) }}" class="imgpreview">
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-warning btn-edit btn-action active"><i class="fas fa-fw fa-edit"></i></button>

                                                    {{-- <button type="button" class="btn btn-secondary btn-delete-data btn-action active" data-url="{{ route('admin.games.delete', ['id' => $item->id]) }}"><i class="fas fa-fw fa-trash"></i></button> --}}
                                                    <button type="button" class="btn btn-primary btn-save btn-action"><i class="fas fa-fw fa-check"></i></button>
                                                    <button type="button" class="btn btn-secondary btn-cancel btn-action"><i class="fas fa-fw fa-times"></i></button>
                                                </td>
                                            </form> 
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">League - Games</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5>Add New League Game</h5> <br>
                            <form action="{{ route('admin.league-games.create') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <select name="league_id" id="league_id" class="form-control">
                                                <option @if(old('league_id') === null) selected @endif disabled>Choose League</option>
                                                @foreach ($leagues as $dl)
                                                    <option value="{{ $dl->id }}" @if(old('league_id') === $dl->id) selected @endif>{{ $dl->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <select name="game_id" id="game_id" class="form-control">
                                                <option @if(old('game_id') === null) selected @endif disabled>Choose Game</option>
                                                @foreach ($games as $dg)
                                                    <option value="{{ $dg->id }}" @if(old('game_id') === $dg->id) selected @endif>{{ $dg->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 align-items-end">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-fw fa-plus"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr class="divider">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center cell-width-01">No.</th>
                                        <th class="text-center">League</th>
                                        <th class="text-center">Game</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($league_games as $key => $lgg)
                                        <tr>
                                            <form action="{{ route('admin.league-games.edit', ['id' => $lgg->id]) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="patch">
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td>
                                                    <span class="value-preview active">{{ $lgg->leagues->name }}</span>
                                                    <select name="league_id" class="value-input form-control">
                                                        @foreach ($leagues as $il)
                                                            <option value="{{ $il->id }}" @if($lgg->league_id === $il->id) selected @endif>{{ $il->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <span class="value-preview active">{{ $lgg->games->name }}</span>
                                                    <select name="game_id" class="value-input form-control">
                                                        @foreach ($games as $ig)
                                                            <option value="{{ $ig->id }}" @if($lgg->game_id === $ig->id) selected @endif>{{ $ig->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-warning btn-edit btn-action active"><i class="fas fa-fw fa-edit"></i></button>

                                                    {{-- <button type="button" class="btn btn-secondary btn-delete-data btn-action active" data-url="{{ route('admin.games.delete', ['id' => $item->id]) }}"><i class="fas fa-fw fa-trash"></i></button> --}}
                                                    <button type="button" class="btn btn-primary btn-save btn-action"><i class="fas fa-fw fa-check"></i></button>
                                                    <button type="button" class="btn btn-secondary btn-cancel btn-action"><i class="fas fa-fw fa-times"></i></button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
    <script>
        $('.btn-edit').on('click', function(e) {
            e.preventDefault();
            
            $(this).closest('tr').find('.value-preview').removeClass('active');
            $(this).closest('tr').find('.value-input').addClass('active');
            $(this).closest('tr').find('.value-input').focus();

            $(this).removeClass('active');
            $(this).closest('tr').find('button.btn-save').addClass('active');
            $(this).closest('tr').find('button.btn-cancel').addClass('active');
        })

        $('.btn-cancel').on('click', function(e) {
            e.preventDefault();
            
            $(this).closest('tr').find('.value-preview').addClass('active');
            $(this).closest('tr').find('.value-input').removeClass('active');

            $(this).removeClass('active');
            $(this).closest('tr').find('button.btn-save').removeClass('active');
            $(this).closest('tr').find('button.btn-edit').addClass('active');
        })

        $('.btn-save').on('click', function(e) {
            e.preventDefault();
            
            $(this).closest('tr').find('form').submit();
        })

        $(".value-input.logo").on('change', function() {
            var element = $(this);
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    element.closest('td').find('.imgpreview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
            $(this).next('.custom-file-label').html($(this).val());
        });

        $(".new-img").on('change', function() {
            var element = $(this);
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    element.closest('div.form-group').find('.new-imgpreview').attr('src', e.target.result);
                    element.closest('div.form-group').find('.new-imgpreview').show();
                }

                reader.readAsDataURL(this.files[0]);
            }
            $(this).next('.custom-file-label').html($(this).val());
        });
    </script>
@endsection