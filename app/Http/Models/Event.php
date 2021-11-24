<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'league_game_id',
        'team_left_id',
        'team_right_id',
        'team_left_score',
        'team_right_score',
        'start_date',
        'streaming_link',
        'enable_support',
        'enable_chat',
        'type',
        'created_by',
        'updated_by',
        'status'
    ];

    public function league_games()
    {
        return $this->belongsTo('App\Http\Models\LeagueGame', 'league_game_id');
    }

    public function team_left()
    {
        return $this->belongsTo('App\Http\Models\Team', 'team_left_id');
    }

    public function team_right()
    {
        return $this->belongsTo('App\Http\Models\Team', 'team_right_id');
    }

    public function creates()
    {
        return $this->belongsTo('App\Http\Models\AdminAccount', 'created_by');
    }

    public function updates()
    {
        return $this->belongsTo('App\Http\Models\AdminAccount', 'updated_by');
    }

    public function betCategories()
    {
        return $this->hasMany(EventBetCategory::class, 'event_id');
    }
}
