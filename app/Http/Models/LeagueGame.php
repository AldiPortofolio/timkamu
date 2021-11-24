<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeagueGame extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'league_id',
        'game_id'
    ];

    public function leagues()
    {
        return $this->belongsTo('App\Http\Models\League', 'league_id');
    }

    public function games()
    {
        return $this->belongsTo('App\Http\Models\Game', 'game_id');
    }
}
