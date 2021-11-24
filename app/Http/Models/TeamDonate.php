<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamDonate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'team_id',
        'item_id',
        'user_id',
        'value',
        'item_conversion_id'
    ];

    public function teams()
    {
        return $this->belongsTo('App\Http\Models\Team', 'team_id');
    }

    public function items()
    {
        return $this->belongsTo('App\Http\Models\Item', 'item_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Http\Models\User', 'user_id');
    }

    public function itemConversions()
    {
        return $this->belongsTo(ItemConversion::class, 'item_conversion_id');
    }
}
