<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamLeagueGame extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'team_id',
        'league_game_id',
    ];

    public function teams()
    {
        return $this->belongsTo('App\Http\Models\Team', 'team_id');
    }

    public function league_games()
    {
        return $this->belongsTo('App\Http\Models\LeagueGame', 'league_game_id');
    }
}
