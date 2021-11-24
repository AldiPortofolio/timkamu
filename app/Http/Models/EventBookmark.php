<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventBookmark extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'event_id',
        'user_id',
    ];

    public function events()
    {
        return $this->belongsTo('App\Http\Models\Event', 'event_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Http\Models\User', 'user_id');
    }
}
