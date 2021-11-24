<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemMail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'subject',
        'title',
        'message',
        'status'
    ];

    public function users()
    {
        return $this->belongsTo('App\Http\Models\User', 'user_id');
    }
}
