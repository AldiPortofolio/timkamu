<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventBetCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'event_id',
        'name',
        'type',
        'order_list',
        'active',
        'display'
    ];

    public function events()
    {
        return $this->belongsTo('App\Http\Models\Event', 'event_id');
    }

    public function rules()
    {
        return $this->hasMany(EventBetRule::class, 'event_bet_category_id');
    }


}
