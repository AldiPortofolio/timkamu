<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\Http\Models\User', 'user_id');
    }
}
