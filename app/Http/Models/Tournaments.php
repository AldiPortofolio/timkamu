<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournaments extends Model
{
    use SoftDeletes;
    protected $table = 'tournaments';
    protected $fillable = [
        'registration_start',
        'tournament_start',
        'slot',
        'location',
        'rewards',
        'description',
        'rules',
        'membership',
        'schedule',
        'id_game',
        'admission_fee',
        'banner',
        'contact_person',
        'registration_end',
        'prize_pool',
        'url_tournament',
        'url_live_streaming',
        'organized_by',
        'prize_thumb'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'id_game');
    }

    public function teams()
    {
        return $this->hasMany(Team::class, 'id_tournament');
    }

    public function reward()
    {
        return $this->hasMany(TournamentRewards::class, 'id_tournament','id');
    }
}
