<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventBetRule extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'event_bet_category_id',
        'event_id',
        'active',
        'value_detail'
    ];

    public function event_bet_categories()
    {
        return $this->belongsTo('App\Http\Models\EventBetCategory', 'event_bet_category_id');
    }

    public function events()
    {
        return $this->belongsTo('App\Http\Models\Event', 'event_id');
    }

//    public function getValueDetailAttribute($value)
//    {
//        return json_decode($value);
//    }
}
