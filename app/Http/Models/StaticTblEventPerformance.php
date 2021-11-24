<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticTblEventPerformance extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'event_id',
        'payout',
        'bp_placed',
        'our_net',
        'our_net_rp',
    ];

    public function events()
    {
        return $this->belongsTo('App\Http\Models\Event', 'event_id');
    }
}
