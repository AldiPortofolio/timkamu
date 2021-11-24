<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'item_id',
        'value'
    ];

    public function users()
    {
        return $this->belongsTo('App\Http\Models\User', 'user_id');
    }

    public function items()
    {
        return $this->belongsTo('App\Http\Models\Item', 'item_id');
    }
}
