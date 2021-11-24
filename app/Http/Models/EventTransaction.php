<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventTransaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'event_id',
        'event_bet_id',
        'user_id',
        'transaction_number',
        'value_detail',
        'type',
        'status'
    ];

    public function events()
    {
        return $this->belongsTo('App\Http\Models\Event', 'event_id');
    }

    public function event_bet_rules()
    {
        return $this->belongsTo('App\Http\Models\EventBetRule', 'event_bet_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Http\Models\User', 'user_id');
    }
}
