<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'content',
        'sent',
        'sent_date'
    ];
}
