<?php


namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class TournamentRewards extends Model
{
    protected $table = 'tournament_rewards';

    protected $fillable = [
        'amount',
        'id_tournament'
    ];
    public function tournament()
    {
        return $this->belongsTo(Tournaments::class, 'id_tournament');
    }

}
